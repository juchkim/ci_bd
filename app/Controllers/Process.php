<?php

namespace App\Controllers;

class Process extends BaseController
{
    protected $request;
    protected $boardModel;

    public function __construct()
    {
        $this->request = service('request');
        $this->boardModel = model('App\Models\Board');
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

    public function form(): void
    {
      $title = strip_tags($this->request->getPost('title'));
      $content = strip_tags($this->request->getPost('content'));
      if(!isset($_COOKIE[ "accessToken" ])){
        echo "<script>alert('쿠키가 만료 되었습니다.'); location.href='".BASE."'</script>";
        return;
      }
      $cookie = json_decode($_COOKIE[ "accessToken" ], true);
      $reg_id = $cookie['data']['id'];
      $data = [
        'title' => $title,
        'content' => $content,
        'reg_id' => $reg_id,
      ];
      $tb_name = "bd_tb";
      try {
        $this->boardModel->insertData($tb_name, $data);
        echo "<script>location.href='".BASE."'</script>";
      } catch (ErrorException $e) {
        
      }
    }

    public function delete($id):void
    {
      try {
        $tb_name = "bd_tb";
        $data = [
          "is_deleted" => 'y',
        ];
        $this->boardModel->updateData($tb_name, $data, $id);
        echo "<script>location.href='".BASE."'</script>";
      } catch (ErrorException $e) {
        
      }
    }
}
