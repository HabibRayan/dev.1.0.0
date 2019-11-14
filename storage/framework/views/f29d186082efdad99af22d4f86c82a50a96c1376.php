<?php $__env->startSection('content'); ?>

    <div class="container-fluid app-body">
        <div class="row">

            <div class="col-sm-4">
                <div class="form-group">
                    <form>
                        <input type="text" class="form-control" id="searchdata" name="search">
                    </form>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">

                </div>
            </div>


            <div class="col-sm-4 form-group">
              <select>
                  <option>Select group</option>
                  <option>Content Upload</option>
                  <option>Select Curation </option>
                  <option>RSS  </option>
              </select>
            </div>



            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Group Name</th>
                    <th scope="col">Group Type</th>
                    <th scope="col">Account Name</th>
                    <th scope="col">Post Text </th>
                    <th scope="col">Time</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $paginates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data->groupInfo->name); ?></td>
                    <td><?php echo e($data->groupInfo->type); ?></td>
                    <td><?php echo e($data->accountInfo->name); ?></td>
                    <td><?php echo e($data->post_text); ?></td>
                    <td><?php echo e($data->sent_at); ?></td>
                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>

            <span><?php echo e($paginates->links()); ?></span>

        </div>
    </div>

    <script
            src="https://code.jquery.com/jquery-2.2.4.js"
            integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
            crossorigin="anonymous">

    </script>

    <script>
        $('#searchdata').on('keyup', function () {
            $search = $(this).val();
            $.ajax({
                method:'get',
                url: "<?php echo e(route('history.search')); ?>",
                data: { 'search' : $search },
                success:function (data) {
                    console.log(data);
                    $('tbody').html(data);
                },
                error:function (err) {
                    console.log(err);
                }
            })
        });
    </script>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>