<?php
    $configData = Helper::applClasses();
?>
<div class="main-menu menu-fixed <?php echo e(($configData['theme'] === 'light') ? "menu-light" : "menu-dark"); ?> menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/admin">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">OOS</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($menu->navheader)): ?>
                    <li class="navigation-header">
                        <span><?php echo e($menu->navheader); ?></span>
                    </li>
                <?php else: ?>
                  
                  <?php
                    $custom_classes = "";
                    if(isset($menu->classlist)) {
                      $custom_classes = $menu->classlist;
                    }
                    $translation = "";
                    if(isset($menu->i18n)){
                        $translation = $menu->i18n;
                    }
                  ?>
                  <li class="nav-item <?php echo e((request()->is($menu->url)) ? 'active' : ''); ?> <?php echo e($custom_classes); ?>">
                        <a href="<?php echo e($menu->url); ?>">
                            <i class="<?php echo e($menu->icon); ?>"></i>
                            <span class="menu-title" data-i18n="<?php echo e($translation); ?>"><?php echo e($menu->name); ?></span>
                            <?php if(isset($menu->badge)): ?>
                                <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                <span class="<?php echo e(isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest'); ?> "><?php echo e($menu->badge); ?></span>
                            <?php endif; ?>
                        </a>
                        <?php if(isset($menu->submenu)): ?>
                            <?php echo $__env->make('panels/submenu', ['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<?php /**PATH C:\xampp\htdocs\onlineordering\resources\views/panels/sidebar.blade.php ENDPATH**/ ?>