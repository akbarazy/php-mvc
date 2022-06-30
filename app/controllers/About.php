<?php
// class controller disini bisa diakses karena (class ini diakses di App.php dan App.php diakses di init.php lalu Controller.php juga diakses di init.php)
class About extends Controller
{
    public function index($name = 'Name')
    {
        // jika url method nya (property method nya) index maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'About';
        $data['name'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page($name = 'Name')
    {
        // jika url method nya (property method nya) index maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'About';
        $data['name'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer');
    }
}
