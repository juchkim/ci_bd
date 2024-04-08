<div class="drawer">
  <input id="my-drawer-3" type="checkbox" class="drawer-toggle" /> 
  <div class="drawer-content flex flex-col">
    <!-- Navbar -->
    <div class="w-full navbar bg-base-300">
      <div class="flex-none lg:hidden">
        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </label>
      </div> 
      <div class="flex-1 px-2 mx-2">Navbar</div>
      <div class="flex-none hidden lg:block">
        <ul class="menu menu-horizontal">
          <!-- Navbar menu content here -->
          <?php if($is_login){ ?>
            <li><a href="<?=BASE?>logout">로그아웃</a></li>
            <li><a href="<?=BASE?>form">글 작성</a></li>
          <?php }else { ?>
            <li><a href="<?=BASE?>login">로그인</a></li>
          <?php  }; ?>          
          <li><a href="<?=BASE?>">글 리스트</a></li>
        </ul>
      </div>
    </div>