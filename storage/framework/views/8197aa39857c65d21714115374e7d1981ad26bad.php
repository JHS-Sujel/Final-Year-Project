<?php $__env->startSection('title', 'Message'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vendor css files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
    
    <section id="dashboard-analytics">
        <div class="card">
            <div class="card-body">
                <div class="profile">
                    <img src="/images/icons/doc.png" alt="" style="height: 50px" />
                    <div>
                        <h2><?php echo e($message->name); ?></h2>
                        <h4><?php echo e($message->email); ?></h4>
                        <p>
                            <?php echo e($message->message); ?>

                        </p>
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

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//messages/show.blade.php ENDPATH**/ ?>