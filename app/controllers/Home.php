<?php
// class controller disini bisa diakses karena (class ini diakses di App.php dan App.php diakses di init.php lalu Controller.php juga diakses di init.php)
class Home extends Controller
{
    public function index()
    {
        // jika url method nya (property method nya) index maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'Home';
        $data['name'] = $this->model('User_model')->getUser();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
