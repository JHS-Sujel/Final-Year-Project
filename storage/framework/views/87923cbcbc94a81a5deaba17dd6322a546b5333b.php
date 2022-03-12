<?php $__env->startSection('title', 'Create A New Brand'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vendor css files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('brands.store')); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="">Name <strong class="text-danger">*</strong></label>
                                    <input type="text" value="<?php echo e(old('name')); ?>" name="name" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-success" type="submit"><i class="feather icon-file"></i>
                                        Store</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//brands/create.blade.php ENDPATH**/ ?>