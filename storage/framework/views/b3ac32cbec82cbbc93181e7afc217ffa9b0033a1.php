<?php if(isset($pageConfigs)): ?>
    <?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-textdirection="<?php echo e(env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr'); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">

        
        <?php echo $__env->make('panels/styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </head>

    
    <?php
    $configData = Helper::applClasses();
    ?>

    <body class="vertical-layout vertical-menu-modern 1-column <?php echo e($configData['blankPageClass']); ?> <?php echo e($configData['bodyClass']); ?> <?php echo e(($configData['theme'] === 'light') ? '' : $configData['theme']); ?> data-menu="vertical-menu-modern" data-col="1-column"  data-layout="<?php echo e($configData['theme']); ?>">

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-body">

                    
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </div>
        </div>
        <!-- End: Content-->

        
        <?php echo $__env->make('panels/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/layouts/fullLayoutMaster.blade.php ENDPATH**/ ?>