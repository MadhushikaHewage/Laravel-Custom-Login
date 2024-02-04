<?php $__env->startSection('title', 'Forget Password'); ?>
<?php $__env->startSection('content'); ?>
<main>
    <div style="width: 500px;" class="ms-auto me-auto">

        <form action="<?php echo e(route('forget-password')); ?>" method="POST">
            <h1 class="mt-3 mb-3">Forget Password</h1>
            <p>We'll send a link to your email, use that link to reset the password.</p>
            <div class="mt-5">
                <?php if($errors->all()): ?>
                <div class="col-md-12 mx-auto">
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
            <?php echo csrf_field(); ?>
            <div class="mb-3 ">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Sandun\Downloads\Laravel\custom_login\resources\views/forget-password.blade.php ENDPATH**/ ?>