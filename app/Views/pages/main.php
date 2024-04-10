<div class="overflow-x-auto p-6 w-full max-w-6xl mx-auto">
  <?php if(count($bd_list)==0){?>
    <div class="w-full border rounded-2xl p-16 flex align-center justify-center">
      <a class="w-full max-w-lg border p-16 rounded-2xl text-xl text-center hover:bg-gray-200 duration-500" href="<?=BASE?>form">Create new Question</a>
    </div>
  <?php }else{ ?>
    <table class="table table-zebra md:table hidden border">
      <!-- head -->
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Job</th>
          <th>등록일</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($bd_list as $key => $row): ?>
        <tr>
          <th><?=$startNum++?></th>
          <td><a href="<?=BASE?>read/<?=$row['idx']?>"><?=$row['title']?></a></td>
          <td><?=mb_substr($row['content'], 0, 10, 'utf-8')?>...</td>
          <td><?=$row['regdate']?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <ul class="md:hidden flex flex-col gap-3 items-center pt-3">
      <?php foreach($bd_list as $key => $row): ?>
      <li class="card w-96 bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title"><?=$row['title']?></h2>
          <p><?=mb_substr($row['content'], 0, 5, 'utf-8')?>...</p>
          <div class="card-actions justify-end">
            <button type="button" onclick="location.href=`<?=BASE?>read/<?=$row['idx']?>`" class="btn btn-accent btn-sm">Read</button>
          </div>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  <?php } ?>
  <div class="flex justify-center mt-3">
    <div class="join">
      <?php if($page>1){?>
        <button class="join-item btn btn-sm" onclick="pageNove(<?=$page-1?>)">«</button>
        <button class="join-item btn btn-sm" onclick="pageNove(<?=$prevPage?>)"><?=$prevPage?></button>
      <?php } ?>
      <button class="join-item btn btn-active btn-sm"><?=$page?></button>
      <?php if($page<$totalPage){?>
        <button class="join-item btn btn-sm"  onclick="pageNove(<?=$nextPage?>)"><?=$nextPage?></button>
        <button class="join-item btn btn-sm" onclick="pageNove(<?=$page+1?>)">»</button>
      <?php } ?>
    </div>
  </div>
</div>
<script>
  const pageNove = (page)=>{
    const {origin, pathname} = location;
    location.href = `${origin}${pathname}?page=${page}`;
  }
</script>