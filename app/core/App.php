<?php
class App
{
    // property mvc default
    protected
        $controller = 'Home',
        $method = 'index',
        $parameter = [];


    public function __construct()
    {
        // ambil array url yang sudah bersih
        $url = $this->clearUrl();

        // jika ada file yang nama nya sama seperti array url index 0 (controller) ubah property controller jadi array url index 0 dan hapus array url index 0 nya
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // hubungkan file yang nama nya sama seperti property controller nya di direktory controllers (lanjutan nya ada difile nya)
        require_once '../app/controllers/' . $this->controller . '.php';

        // ubah isi property controller dengan class yang nama nya sama dengan controller (array url index 0) nya
        $this->controller = new $this->controller;

        // jika array url nya punya index ke-1 (method)
        if (isset($url[1])) {

            // jika ada method yang nama nya sama dengan array url index 1 didalam property class controller maka ubah property method nya dengan array url index 1
            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                // lalu hapus array url index 1
                unset($url[1]);
            }
        }

        // kalo array url nya nggak kosong maka isi parameter dengan array url
        if (!empty($url)) {
            $this->parameter = array_values($url);
        }

        // jalankan method yang nama method nya sama seperti property method dengan parameter method nya adalah (property parameter) yang method nya ada 
        // di dalam property class controller (meskipun property parameter nya lebih banyak daripada parameter di method maka tetap tidak akan error)
        call_user_func_array([$this->controller, $this->method], $this->parameter);
    }

    public function clearUrl()
    {
        // variabel get disini dimulai dari directory public/
        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $clearUrl = filter_var($url, FILTER_SANITIZE_URL);
            $clearUrl = explode('/', $clearUrl);

            // simpan url array yang sudah bersih
            return $clearUrl;
        }

        // jika tidak ada get url maka set controller menjadi default (Home)
        return [$this->controller];
    }
}
