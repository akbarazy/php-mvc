<?php
// class controller disini bisa diakses karena (class ini diakses di App.php dan App.php diakses di init.php lalu Controller.php juga diakses di init.php)
class Friend extends Controller
{
    public function index()
    {
        // jika url method nya (property method nya) index maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'Friends';
        $data['friends'] = $this->model('Friend_model')->getAllFriends();

        $this->view('templates/header', $data);
        $this->view('friend/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        // jika url method nya (property method nya) detail maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'Friends Details';
        $data['friends'] = $this->model('Friend_model')->getFriendsById($id);

        $this->view('templates/header', $data);
        $this->view('friend/detail', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        // akses file Friend_model.php dengan method model di Controller.php dan panggil method addFriend nya dengan mengirimkan nilai $_POST modal friend/index
        if ($this->model('Friend_model')->addFriend($_POST) > 0) {
            // jika berhasil tampilkan notifikasi berhasil ditambahkan di class Flasher dengan method setFlash
            Flasher::setFlash('Successfully', 'Added', 'success');

            // lalu pindahkan user friend/index
            header('location: ' . BASEURL . '/friend');
            exit;
        } else {
            // jika gagal tampilkan notifikasi nya
            Flasher::setFlash('Failed', 'Added', 'danger');

            // lalu pindahkan user friend/index
            header('location: ' . BASEURL . '/friend');
            exit;
        }
    }

    public function delete($id)
    {
        // akses file Friend_model dan panggil method deleteFriend dengan mengirimkan id nya
        if ($this->model('Friend_model')->deleteFriend($id) > 0) {
            // tampilkan notif dan pindahkan user
            Flasher::setFlash('Successfully', 'Delete', 'success');

            header('location: ' . BASEURL . '/friend');
            exit;
        } else {
            // jika gagal tampilkan notif dan pindahkan user
            Flasher::setFlash('Failed', 'Delete', 'danger');

            header('location: ' . BASEURL . '/friend');
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model('Friend_model')->getFriendsById($_POST['id']));
    }

    public function edit()
    {
        // akses file Friend_model dan panggil method editFriend dengan mengirimkan id nya
        if ($this->model('Friend_model')->editFriend($_POST) > 0) {
            // tampilkan notif dan pindahkan user
            Flasher::setFlash('Successfully', 'Edited', 'success');

            header('location: ' . BASEURL . '/friend');
            exit;
        } else {
            // jika gagal // tampilkan notif dan pindahkan user
            Flasher::setFlash('Failed', 'Edited', 'danger');

            header('location: ' . BASEURL . '/friend');
            exit;
        }
    }

    public function search()
    {
        // jika url method nya (property method nya) search maka akses file yang ada didalam direktory views dengan method view di Controller.php
        $data['title'] = 'Friends';
        $data['friends'] = $this->model('Friend_model')->searchFriends();

        $this->view('templates/header', $data);
        $this->view('friend/index', $data);
        $this->view('templates/footer');
    }
}
