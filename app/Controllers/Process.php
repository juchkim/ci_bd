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
        if(($id=="admin" && $pwd=="admin") || ($id=="test" && $pwd=="test")):
          $expiry = time() + 50000;
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
      $idx = $this->request->getPost('idx');
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
        if($idx!=""){
          $this->boardModel->updateData($tb_name, $data, $idx);
          echo "<script>location.href='".BASE."read/$idx'</script>";
        }else{
          $this->boardModel->insertData($tb_name, $data);
          echo "<script>location.href='".BASE."'</script>";
        }
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

    public function reply():void
    {
      $idx = $this->request->getPost('idx');
      $bd_idx = $this->request->getPost('bd_idx');
      $reply = strip_tags($this->request->getPost('reply'));
      if(!isset($_COOKIE[ "accessToken" ])){
        echo "<script>alert('쿠키가 만료 되었습니다.'); location.href='".BASE."'</script>";
        return;
      }
      $cookie = json_decode($_COOKIE[ "accessToken" ], true);
      $reg_id = $cookie['data']['id'];
      $data = [
        'bd_idx' => $bd_idx,
        'reply_context' => $reply,
        'reg_id' => $reg_id,
      ];
      $tb_name = "reply_tb";
      try {
        if($idx!=""){
          $this->boardModel->updateData($tb_name, $data, $idx);          
        }else{
          $this->boardModel->insertData($tb_name, $data);
        }
        echo "<script>location.href='".BASE."read/$bd_idx'</script>";
      } catch (ErrorException $e) {
        
      }
    }
}
