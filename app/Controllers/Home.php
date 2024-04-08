<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return 
        view('common/header').
        view('common/nav').
        view('pages/main').
        view('common/footer');
    }

    public function login(): string
    {
        return 
        view('common/header').
        view('pages/login').
        view('common/footer');
    }

    public function form(): string
    {
        return 
        view('common/header').
        view('common/nav').
        view('pages/form').
        view('common/footer');
    }
}
