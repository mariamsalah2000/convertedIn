<?php $__env->startSection('content'); ?>
    <h1>All Statistics</h1>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Number Of Tasks</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($stat->user->name); ?></td>
                    <td><?php echo e($stat->tasks_no); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        <?php echo e($statistics->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ConvertedInNew\resources\views/statistics/index.blade.php ENDPATH**/ ?>