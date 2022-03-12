        
        <script src="<?php echo e(asset(mix('vendors/js/vendors.min.js'))); ?>"></script>
        <script src="<?php echo e(asset(mix('vendors/js/ui/prism.min.js'))); ?>"></script>
        <?php echo $__env->yieldContent('vendor-script'); ?>
        
        <script src="<?php echo e(asset(mix('js/core/app-menu.js'))); ?>"></script>
        <script src="<?php echo e(asset(mix('js/core/app.js'))); ?>"></script>
        <script src="<?php echo e(asset(mix('js/scripts/components.js'))); ?>"></script>
<?php if($configData['blankPage'] == false): ?>
        <script src="<?php echo e(asset(mix('js/scripts/customizer.js'))); ?>"></script>
        <script src="<?php echo e(asset(mix('js/scripts/footer.js'))); ?>"></script>
<?php endif; ?>
        
        <?php echo $__env->yieldContent('page-script'); ?>
        
<?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/panels/scripts.blade.php ENDPATH**/ ?>