<div class="flex items-center justify-center mt-6">
  <div class="card w-full max-w-md bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="card-title"><?=$bd_info['title']?></h2>
      <p><?=$bd_info['content']?></p>
      <?php if($isLogin && $owner){?>
        <div class="card-actions justify-end">
          <button class="btn btn-error" type="button" onclick="handleDelete(<?=$bd_info['idx']?>)">삭제하기</button>
          <button class="btn btn-default"  type="button" onclick="handleEdit(<?=$bd_info['idx']?>)">수정하기</button>
        </div>
      <?php } ?>
      <?php if($isLogin && !$owner){?>
        <div class="p-3">
          <div class="collapse bg-base-200">
            <input type="checkbox" /> 
            <div class="collapse-title text-lg font-medium">
              댓글을 작성하시오
            </div>
            <form action="<?=BASE?>reply" method="post" class="collapse-content flex gap-3 items-center"> 
              <input type="hidden" name="bd_idx" value="<?=$bd_info['idx']?>">
              <input type="text" name="reply" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
              <button class="btn btn-outline btn-info">Submit</button>
            </form>
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
        <div class="collapse-content flex flex-col gap-1"> 
          <?php $i=0; foreach($reply as $key => $row){ $i++;?>
            <!-- <p><?=$row['reg_id']?> : <?=$row['reply_context']?></p> -->
          <?php } ?>
          <?php $i=0; foreach($reply as $key => $row){ $i++;?>
            <div class="chat chat-start">
              <div class="chat-header">
                <?=$row['reg_id']?>
              </div>
              <div class="chat-bubble"><?=$row['reply_context']?></div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  const handleDelete = (id)=>{
    location.href=`<?=BASE?>delete/${id}`;
  }
  const handleEdit = (id)=>{
    location.href=`<?=BASE?>form/${id}`;
  }
</script>