@extends('layouts/contentLayoutMaster')

@section('title', 'Create A New Stock')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->

@endsection

@section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('stocks.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Name <strong class="text-danger">*</strong></label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == old('product_id') ? 'selected' : '' }}>{{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity <strong class="text-danger">*</strong></label>
                                    <input type="text" value="{{ old('quantity') }}" name="quantity"
                                        placeholder="Quantity" class="form-control">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-success" type="submit"><i class="feather icon-file"></i>
                                        Store</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
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

@endsection
@section('page-script')
@endsection
