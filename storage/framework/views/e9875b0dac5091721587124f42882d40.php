<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="mt-5">
        <?php if($errors->all()): ?>
        <div class="col-md-6 mx-auto">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger"><?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <?php if(session()->has('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if(session()->has('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
    </div>
    <form action="<?php echo e(route('login')); ?>" method="POST" style="width: 500px;" class="ms-auto me-auto">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-5">
            <a href="<?php echo e(route('forget-password')); ?>" style="text-decoration: none; float:right;">Forgot Password</a>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sandun\Downloads\Laravel\custom_login\resources\views/login.blade.php ENDPATH**/ ?>