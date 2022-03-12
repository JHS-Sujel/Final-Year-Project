<?php $__env->startSection('title', 'Order Invoice'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vendor css files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/invoice.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- invoice page -->
    <section class="card invoice-page">
        <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-sm-6 col-12 text-left pt-1">
                    <div class="media pt-1">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" style="height: 60px" alt="company logo" />
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h1>Invoice</h1>
                    <div class="invoice-details mt-2">
                        <h6>INVOICE NO.</h6>
                        <p><?php echo e(sprintf("%'.05d", $order->id)); ?>/<?php echo e(date('Y')); ?></p>
                        <h6 class="mt-2">INVOICE DATE</h6>
                        <p><?php echo e(date('d M Y', strtotime($order->created_at))); ?></p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-6 col-12 text-left">
                    <h5>Recipient</h5>
                    <div class="recipient-info my-2">
                        <p><?php echo e($customer->shipping_address->full_name); ?></p>
                        <p><?php echo e($customer->shipping_address->house_no); ?>, <?php echo e($customer->shipping_address->land_mark); ?></p>
                        <p><?php echo e($customer->shipping_address->city); ?>, <?php echo e($customer->shipping_address->state); ?></p>
                        <p><?php echo e($customer->shipping_address->zipcode); ?></p>
                    </div>
                    <div class="recipient-contact pb-2">
                        <p>
                            <i class="feather icon-mail"></i>
                            <?php echo e($customer->email); ?>

                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +88 <?php echo e($customer->shipping_address->phone); ?>

                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h5>Fasion Online Shop Ltd.</h5>
                    <div class="company-info my-2">
                        <p>18B, Main Point</p>
                        <p>Amborkhana, Sylhet</p>
                        <p>3030</p>
                    </div>
                    <div class="company-contact">
                        <p>
                            <i class="feather icon-mail"></i>
                            jabedhossainsujel79@gmail.com
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +88 01796624224
                        </p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Recipient Details -->

            <!-- Invoice Items Details -->
            <div id="invoice-items-details" class="pt-1 invoice-items-table">
                <div class="row">
                    <div class="table-responsive col-12">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>IMAGE</th>
                                    <th>TITLE</th>
                                    <th>QUANTITY</th>
                                    <th>AMOUNT</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <img style="height: 60px" src="<?php echo e($item->product->image_small); ?>"
                                                alt="<?php echo e($item->product->title); ?>">
                                        </td>
                                        <th><?php echo e($item->product->title); ?></th>
                                        <td><?php echo e($item->quantity); ?> </td>
                                        <td><?php echo e(number_format($item->price, 2)); ?> </td>
                                        <td><?php echo e(number_format($item->quantity * $item->price, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="invoice-total-details" class="invoice-total-table">
                <div class="row">
                    <div class="col-7 offset-5">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>TOTAL</th>
                                        <td><?php echo e(number_format($order->price, 2)); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Footer -->
            <div id="invoice-footer" class="text-right pt-3">
                <p>Transfer the amounts to the business amount below. Please include invoice number on your check.
            </div>
            <!--/ Invoice Footer -->

        </div>
    </section>
    <!-- invoice page end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('js/scripts/pages/invoice')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//orders/show.blade.php ENDPATH**/ ?>