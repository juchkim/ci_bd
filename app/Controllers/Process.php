<?php

namespace App\Controllers;

class Process extends BaseController
{
    protected $request;
    
    public function __construct()
    {
        $this->request = service('request');
    }

    public function index(): string
    {
       
    }

    public function login(): void
    {
        $id = $this->request->getPost('id');
        $pwd = $this->request->getPost('pwd');
        if($id=="admin" && $pwd=="admin"):
          $expiry = time() + 120;
          $data = ["id" => $id, "pwd"=> $pwd];
          $cookieData = ["data" => $data, "expiry" => $expiry];
          setcookie( "accessToken", json_encode( $cookieData ), $expiry );
          echo "<script>location.href='".BASE."'</script>";
        endif;
    }

    public function logout(): void
    {
      setcookie("accessToken", "쿠키값", time()-100);
      echo "<script>location.href='".BASE."'</script>";
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
