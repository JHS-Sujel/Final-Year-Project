        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
        <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/vendors.min.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('vendors/css/ui/prism.min.css'))); ?>">
        
        <?php echo $__env->yieldContent('vendor-style'); ?>
        
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/bootstrap.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/bootstrap-extended.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/colors.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/components.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/themes/dark-layout.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/themes/semi-dark-layout.css'))); ?>">

<?php
$configData = Helper::applClasses();
?>





<?php if($configData['mainLayoutType'] === 'horizontal'): ?>
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/core/menu/menu-types/horizontal-menu.css'))); ?>">
<?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/core/menu/menu-types/vertical-menu.css'))); ?>">
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/core/colors/palette-gradient.css'))); ?>">
        
        <?php echo $__env->yieldContent('page-style'); ?>

        <link rel="stylesheet" href="<?php echo e(asset(mix('css/custom-laravel.css'))); ?>">

<?php if($configData['direction'] === 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset(mix('css/custom-rtl.css'))); ?>">
<?php endif; ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/panels/styles.blade.php ENDPATH**/ ?>