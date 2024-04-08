<div class="overflow-x-auto p-6">
  <table class="table table-zebra md:table hidden border">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=0; foreach($bd_list as $key => $row): ?>
      <tr>
        <th><?=$i+1?></th>
        <td><?=$row['title']?></td>
        <td><?=mb_substr($row['content'], 0, 5, 'utf-8')?>...</td>
        <td><?=$row['category']?></td>
      </tr>
      <?php $i++; endforeach ?>
    </tbody>
  </table>
  <ul class="md:hidden flex flex-col gap-3 items-center pt-3">
    <?php foreach($bd_list as $key => $row): ?>
    <li class="card w-96 bg-base-100 shadow-xl">
      <div class="card-body">
        <h2 class="card-title"><?=$row['title']?></h2>
        <p><?=mb_substr($row['content'], 0, 5, 'utf-8')?>...</p>
        <div class="card-actions justify-end">
          <button class="btn btn-accent btn-sm">Read</button>
        </div>
      </div>
    </li>
    <?php endforeach ?>
  </ul>
</div>