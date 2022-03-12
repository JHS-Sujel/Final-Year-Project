<?php $__env->startSection('title', 'Update Product'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- vendor css files -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <!-- Page css files -->
    <style>
        .ck-content {
            height: 250px;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?php echo e(route('products.update', $product->id)); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <?php echo method_field("PUT"); ?>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Title <strong class="text-danger">*</strong></label>
                                        <input type="text" value="<?php echo e($product->title); ?>" name="title" placeholder="Title"
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Sub Title <strong class="text-danger">*</strong></label>
                                        <input type="text" value="<?php echo e($product->sub_title); ?>" name="sub_title"
                                            placeholder="Sub Title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Category <strong class="text-danger">*</strong></label>
                                        <select name="product_type_id" id="" class="form-control">
                                            <option value="">Select ...</option>
                                            <?php $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e($product->product_type_id == $item->id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Brand <strong class="text-danger">*</strong></label>
                                        <select name="brand_id" id="" class="form-control">
                                            <option value="">Select ...</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e($product->brand_id == $item->id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo e($product->image_small); ?>" style="width: 150px" alt="">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="" class="d-block">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Price <strong class="text-danger">*</strong></label>
                                        <input type="text" value="<?php echo e($product->price); ?>" name="price" placeholder="Price"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">Description</label>
                                    <textarea id="details" name="details"><?php echo e($product->details); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php echo e($product->status == 1 ? 'selected' : ''); ?>>Active
                                        </option>
                                        <option value="0" <?php echo e($product->status == 0 ? 'selected' : ''); ?>>Inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-success" type="submit"><i class="feather icon-file"></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('js/scripts/editors/ckeditor.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script>
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\onlineordering\resources\views//products/edit.blade.php ENDPATH**/ ?>