<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $boardModel;
    protected $isLogin;
    
    public function __construct()
    {
        $this->boardModel = model('App\Models\Board');
    }

    private function cookieCheck()
    {
        if(isset($_COOKIE[ "accessToken" ])){
            $cookie = json_decode($_COOKIE[ "accessToken" ], true);
            $this->isLogin = true;
        }else{
            $this->isLogin = false;
        }
    }

    public function index()
    {
        $result = $this->boardModel->gets();
        $mainParam = [
            'bd_list' => $result
        ];
        $path = 'pages/main';
        return $this->common($path, $mainParam);
    }

    public function login()
    {
        $this->cookieCheck();
        if($this->isLogin){
            return redirect()->route('/');
        }
        return
        view('common/header').
        view('pages/login');
    }

    public function form()
    {
        $path = 'pages/form';
        return $this->common($path);
    }

    private function common($path, $param=[])
    {
        $this->cookieCheck();
        $headerParam = [
            'is_login' => $this->isLogin
        ];
        return 
        view('common/header', $headerParam).
        view('common/nav').
        view($path, $param).
        view('common/footer');
    }
}
