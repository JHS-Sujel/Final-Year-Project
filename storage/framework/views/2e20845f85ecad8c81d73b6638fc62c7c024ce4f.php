<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0"><?php echo $__env->yieldContent('title'); ?></h2>
                <div class="breadcrumb-wrapper col-12">
                    <?php if(@isset($breadcrumbs)): ?>
                        <ol class="breadcrumb">
                            
                            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="breadcrumb-item">
                                    <?php if(isset($breadcrumb['link'])): ?>
                                        <a href="<?php echo e($breadcrumb['link']); ?>"> <?php endif; ?><?php echo e($breadcrumb['name']); ?>

                                            <?php if(isset($breadcrumb['link'])): ?> </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
    <div class="form-group breadcrum-right">
        <?php if(isset($link)): ?>
            <a href="<?php echo e($link); ?>" class="btn-icon btn btn-primary btn-round btn-sm" type="button"><i
                    class="<?php echo e($link_icon); ?>"></i></a>

        <?php endif; ?>
    </div>
</div>
</div>
<?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/panels/breadcrumb.blade.php ENDPATH**/ ?>