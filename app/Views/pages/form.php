<div class="flex justify-center items-center mt-6">
  <form class="max-w-xl w-full p-6 border rounded-2xl flex flex-col gap-3" method="post" action="<?=BASE?>register">
    <label class="input input-bordered flex items-center gap-2">
      Title
      <input type="text" class="grow" name="title" placeholder="Title" value="<?=isset($bd_info['title'])?esc($bd_info['title']):""?>" />
    </label>
    <textarea 
      style="resize:none;" 
      name="content" 
      class="h-32 textarea textarea-bordered" 
      placeholder="content" 
    ><?=isset($bd_info['content'])?esc($bd_info['content']):""?></textarea>
    
    <div class="card-actions justify-around flex">
      <?php if(!isset($bd_info['idx'])){?>
        <button class="btn btn-outline flex-grow">작성하기</button>
      <?php }else{ ?>
        <input type="hidden" name="idx" value="<?=$bd_info['idx']?>"/>
        <button class="btn btn-outline flex-grow btn-primary">수정하기</button>
      <?php }?>
    </div>
  </form>
</div>