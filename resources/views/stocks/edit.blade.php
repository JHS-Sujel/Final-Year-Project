@extends('layouts/contentLayoutMaster')

@section('title', 'Update Stock')

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
                            <form action="{{ route('stocks.update', $stock->id) }}" method="post">
                                {{ csrf_field() }}
                                @method("PUT")
                                <div class="form-group">
                                    <label for="">Name <strong class="text-danger">*</strong></label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $stock->product_id ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Name <strong class="text-danger">*</strong></label>
                                    <input type="text" value="{{ $stock->quantity }}" name="quantity"
                                        placeholder="Quantity" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $stock->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $stock->status == 0 ? 'selected' : '' }}>Inactive
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
