<?php $__env->startSection('title', 'Shop'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- Vendor css files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->
    <link rel="stylesheet" href="<?php echo e(asset(mix('css/pages/app-ecommerce-shop.css'))); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <home></home>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <!-- Vendor js files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <!-- Page js files -->
    <script src="<?php echo e(asset(mix('js/scripts/pages/app-ecommerce-shop.js'))); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//frontend/home.blade.php ENDPATH**/ ?>