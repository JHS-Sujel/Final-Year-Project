    <body class="vertical-layout vertical-menu-modern 2-columns <?php echo e($configData['blankPageClass']); ?> <?php echo e($configData['bodyClass']); ?>  <?php echo e(($configData['theme'] === 'light') ? '' : $configData['theme']); ?>  <?php echo e($configData['navbarType']); ?> <?php echo e($configData['sidebarClass']); ?> <?php echo e($configData['footerType']); ?>" data-menu="vertical-menu-modern" data-col="2-columns"  data-layout="<?php echo e($configData['theme']); ?>">
        
        <?php echo $__env->make('panels.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <!-- BEGIN: Header-->
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>

            
            <?php echo $__env->make('panels.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(!empty($configData['contentLayout'])): ?>
                <div class="content-area-wrapper">
                    <div class="<?php echo e($configData['sidebarPositionClass']); ?>">
                        <div class="sidebar">
                            
                            <?php echo $__env->yieldContent('content-sidebar'); ?>
                        </div>
                    </div>
                    <div class="<?php echo e($configData['contentsidebarClass']); ?>">
                        <div class="content-wrapper">
                            <div class="content-body">
                                
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="content-wrapper">
                    
                    <?php if($configData['pageHeader'] == true): ?>
                        <?php echo $__env->make('panels.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <div class="content-body">
                        
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
        <!-- End: Content-->

        <?php if($configData['blankPage'] == false): ?>
            <?php echo $__env->make('pages/customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        
        <?php echo $__env->make('panels/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <?php echo $__env->make('panels/scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/layouts/verticalLayoutMaster.blade.php ENDPATH**/ ?>