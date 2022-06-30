<?php
class Controller
{
    public function view($view, $data = [])
    {
        // akses file berdasarkan parameter dari file yang nama nya sama kayak controller nya
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
