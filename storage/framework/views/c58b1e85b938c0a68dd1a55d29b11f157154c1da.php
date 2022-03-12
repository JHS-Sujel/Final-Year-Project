<?php $__env->startSection('title', 'Messages'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vendor css files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-content">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Messages</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($loop->index + 1); ?></th>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->message); ?></td>
                                            <td>
                                                <span
                                                    class="badge <?php echo e($item->status == 1 ? 'badge-success' : 'badge-primary'); ?>"><?php echo e($item->status == 0 ? 'New' : 'Viewed'); ?></span>
                                            </td>
                                            <td>
                                                <?php echo e($item->created_at->diffForHumans(null, false, true)); ?>

                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                    href="<?php echo e(route('messages.show', $item->id)); ?>"><i
                                                        class="feather icon-eye"></i> View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ecommerce-pagination">
        <div class="row">
            <div class="col-sm-12">
                <nav>
                    <?php echo e($messages->render()); ?>

                </nav>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//messages/index.blade.php ENDPATH**/ ?>