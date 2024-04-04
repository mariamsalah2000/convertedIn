<?php $__env->startSection('content'); ?>
    <h1>All Tasks</h1>
    <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(\Session::get('success')); ?>

        </div>
    <?php elseif(\Session::has('errors')): ?>
        <div class="alert alert-danger">
            <?php echo e(\Session::get('errors')); ?>

        </div>
    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned By</th>
                <th>Assigned To</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($task->title); ?></td>
                    <td><?php echo e($task->description); ?></td>
                    <td><?php echo e($task->admin ? $task->admin->name : '-'); ?></td>
                    <td><?php echo e($task->user ? $task->user->name : '-'); ?></td>
                    <td><?php echo e($task->created_at->toDateString()); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        <?php echo e($tasks->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ConvertedInNew\resources\views/tasks/index.blade.php ENDPATH**/ ?>