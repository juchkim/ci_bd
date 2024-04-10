<div class="flex items-center justify-center mt-6">
  <div class="card w-full max-w-md bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title"><?=$bd_info['title']?></h2>
      <p><?=$bd_info['content']?></p>
      <?php if($isLogin && "로그인 하고 내것이면 나오게 하기" && $owner){?>
        <div class="card-actions justify-end">
          <button class="btn btn-error" type="button" onclick="handleDelete(<?=$bd_info['idx']?>)">삭제하기</button>
          <button class="btn btn-default"  type="button" onclick="handleEdit(<?=$bd_info['idx']?>)">수정하기</button>
        </div>
      <?php } ?>
      <?php if($isLogin && "로그인 하고 내것이 아니면 나오게 하기" && false){?>
        <div class="p-3">
          <div class="collapse bg-base-200">
            <input type="checkbox" /> 
            <div class="collapse-title text-lg font-medium">
              댓글을 작성하시오
            </div>
            <div class="collapse-content flex gap-3 items-center"> 
              <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
              <button class="btn btn-outline btn-info">Submit</button>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="p-3">
      <div class="collapse bg-base-200">
        <input type="checkbox" /> 
        <div class="collapse-title text-lg font-medium">
          댓글을 보려면 클릭하세요.
        </div>
        <div class="collapse-content"> 
          <p>- hello</p>
        </div>
      </div>
    </div>
  </div>
</div>