@extends('layouts/contentLayoutMaster')

@section('title', 'Update Product')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->
    <style>
        .ck-content {
            height: 250px;
        }

    </style>
@endsection

@section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method("PUT")
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Title <strong class="text-danger">*</strong></label>
                                        <input type="text" value="{{ $product->title }}" name="title" placeholder="Title"
                                            class="form-control">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Sub Title <strong class="text-danger">*</strong></label>
                                        <input type="text" value="{{ $product->sub_title }}" name="sub_title"
                                            placeholder="Sub Title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Category <strong class="text-danger">*</strong></label>
                                        <select name="product_type_id" id="" class="form-control">
                                            <option value="">Select ...</option>
                                            @foreach ($product_types as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $product->product_type_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Brand <strong class="text-danger">*</strong></label>
                                        <select name="brand_id" id="" class="form-control">
                                            <option value="">Select ...</option>
                                            @foreach ($brands as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $product->brand_id == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $product->image_small }}" style="width: 150px" alt="">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="" class="d-block">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Price <strong class="text-danger">*</strong></label>
                                        <input type="text" value="{{ $product->price }}" name="price" placeholder="Price"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="">Description</label>
                                    <textarea id="details" name="details">{{ $product->details }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
    <script src="{{ asset('js/scripts/editors/ckeditor.js') }}"></script>
@endsection
@section('page-script')
    <script>
        ClassicEditor
            .create(document.querySelector('#details'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
