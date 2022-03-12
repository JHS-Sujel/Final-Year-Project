@extends('layouts/contentLayoutMaster')

@section('title', 'Create A New Brand')

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
                            <form action="{{ route('brands.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Name <strong class="text-danger">*</strong></label>
                                    <input type="text" value="{{ old('name') }}" name="name" placeholder="Name" class="form-control">
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
