<div class="overflow-x-auto p-6">
  <table class="table table-zebra md:table hidden border">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Job</th>
        <th>Favorite Color</th>
        <th class="w-64"></th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<5;$i++){?>
      <tr>
        <th><?=$i+1?></th>
        <td>Cy Ganderton</td>
        <td>Quality Control Specialist</td>
        <td>Blue</td>
        <td>
          <div class="card-actions justify-around">
            <button class="btn btn-accent btn-sm">Edit</button>
            <button class="btn btn-neutral btn-sm">Reply</button>
            <button class="btn btn-error btn-sm">Delete</button>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <ul class="md:hidden flex flex-col gap-3 items-center pt-3">
    <?php for($i=0;$i<5;$i++){?>
    <li class="card w-96 bg-base-100 shadow-xl">
      <div class="card-body">
        <h2 class="card-title">Card title!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad minima consequatur nam ea atque quaerat labore laborum maiores </p>
        <div class="card-actions justify-end">
          <button class="btn btn-accent">Edit</button>
          <button class="btn btn-neutral">Reply</button>
          <button class="btn btn-error">Delete</button>
        </div>
      </div>
    </li>
    <?php }?>
  </ul>
</div>