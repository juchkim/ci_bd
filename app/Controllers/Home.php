<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $boardModel;
    protected $isLogin;
    protected $userInfo;
    
    public function __construct()
    {
        $this->boardModel = model('App\Models\Board');
    }

    private function cookieCheck()
    {
        if(isset($_COOKIE[ "accessToken" ])){
            $cookie = json_decode($_COOKIE[ "accessToken" ], true);
            $this->isLogin = true;
            $this->userInfo = $cookie;
        }else{
            $this->isLogin = false;
            $this->userInfo = [];
        }
    }

    public function index()
    {
        
        $page = $this->request->getGet('page');
        if($page==null){
            $page=1;
        }
        $perPage = 10;
        $startPage = ($page-1)*$perPage;
        $result = $this->boardModel->gets($startPage, $perPage);
        
        $count = $this->boardModel->getBdAllCount();
        $totalPage = ceil($count / $perPage);
        $startNum = (($page-1) * $perPage) + 1;

        $prevPage = 0;
        $nextPage = 0;

        if($page>1){
            $prevPage = $page-1;
        }
        if($page<$totalPage){
            $nextPage = $page+1;
        }

        $mainParam = [
            'bd_list' => $result,
            'totalPage' => $totalPage,
            'startNum' => $startNum,
            'prevPage' => $prevPage,
            'nextPage' => $nextPage,
            'page' => $page,
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
        $this->cookieCheck();
        if(!$this->isLogin){
            echo "<script>alert('회원전용 권한입니다');history.back();</script>";
            return;
        }
        $path = 'pages/form';
        return $this->common($path);
    }

    public function edit_form($num)
    {
        $this->cookieCheck();
        if(!$this->isLogin){
            echo "<script>alert('회원전용 권한입니다');history.back();</script>";
            return;
        }
        $row = $this->boardModel->get($num);
        $readParam = [
            'bd_info' => $row
        ];
        $path = 'pages/form';
        return $this->common($path, $readParam);
    }
    

    public function read($num):string
    {
        $this->cookieCheck();
        $path = 'pages/read';
        $row = $this->boardModel->get($num);
        if(!isset($row['reg_id'])){
            echo "<script>alert('삭제된 게시물 입니다.');location.href='".BASE."';</script>";
            return "";
        }
        $userInfo = $this->userInfo;
        if(!isset($userInfo['data'])){
            $userInfo['data']['id'] = "";
        }

        $res = $this->boardModel->reply_get($num);

        $readParam = [
            'bd_info' => $row,
            'isLogin' => $this->isLogin,
            "owner" => $userInfo['data']['id'] == $row['reg_id'],
            'reply' => $res,
        ];
        return $this->common($path, $readParam);
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
