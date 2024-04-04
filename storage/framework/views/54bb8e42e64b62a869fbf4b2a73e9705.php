<!-- create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConvertedIn</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>

<body>

    <div class="sidenav">
        <a href="<?php echo e(route('tasks.index')); ?>">All Tasks</a>
        <a href="<?php echo e(route('tasks.create')); ?>">Create Task</a>
        <a href="<?php echo e(route('statistics.index')); ?>">Statistics</a>
    </div>
    <div class="container">
        <!-- Sidenav -->
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-9">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>


    </div>
</body>

</html>
<?php /**PATH D:\ConvertedInNew\resources\views/main.blade.php ENDPATH**/ ?>