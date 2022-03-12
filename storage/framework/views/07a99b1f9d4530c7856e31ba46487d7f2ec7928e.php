<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Put your verification code here')); ?></div>

                <div class="card-body">
                    <?php if(session('resent')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(__('A fresh verification code has been sent to your email address and contact no.')); ?>

                    </div>
                    <?php endif; ?>
                    <div>
                        <form class="form-inline" action="<?php echo e(route('verify')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-2">
                                <label class="sr-only">Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Verify</button>
                        </form>
                    </div>
                    <?php echo e(__('Before proceeding, please check your email/contact no for a verification code.')); ?>

                    <?php echo e(__('If you did not receive the code')); ?>, <a href="<?php echo e(route('verify.resend')); ?>"><?php echo e(__('click here to request another')); ?></a>.
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fullLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/auth/verify.blade.php ENDPATH**/ ?>