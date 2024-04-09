<div class="flex justify-center items-center mt-6">
  <form class="max-w-xl w-full p-6 border rounded-2xl flex flex-col gap-3" method="post" action="<?=BASE?>register">
    <label class="input input-bordered flex items-center gap-2">
      Title
      <input type="text" class="grow" name="title" placeholder="Title" />
    </label>
    <textarea style="resize:none;" name="content" class="h-32 textarea textarea-bordered" placeholder="Bio"></textarea>
    
    <div class="card-actions justify-around flex">
      <button class="btn btn-outline flex-grow">작성하기</button>
      <?php if(false):?>
      <button class="btn btn-outline flex-grow btn-primary">수정하기</button>
      <button class="btn btn-outline flex-grow btn-secondary">삭제하기</button>
      <?php endif?>
    </div>
  </form>
</div>