<div class="flex items-center justify-center">
  <div class="card w-full max-w-md bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title"><?=$bd_info['title']?></h2>
      <p><?=$bd_info['category']?></p>
      <p><?=$bd_info['content']?></p>
      <div class="card-actions justify-end">
        <button class="btn btn-error">삭제하기</button>
        <button class="btn btn-primary">답글달기</button>
      </div>
    </div>
  </div>
</div>