@extends('layouts/contentLayoutMaster')

@section('title', 'Products')

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
            <div class="col-lg-12 col-md-12 col-sm-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-content">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td><img style="width: 100px" src="{{ $item->image_small }}" alt=""></td>
                                            <th>
                                                <p class="mb-0">{{ $item->title }}</p>
                                                <small>{{ $item->sub_title }}</small>
                                                </td>
                                            <th class="text-right">{{ $item->price }}</th>
                                            <td>{{ $item->product_type->name }}</td>
                                            <td>{{ $item->brand->name }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status == 1 ? 'badge-success' : 'badge-danger' }}">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</span>
                                            </td>
                                            <td>
                                                {{ $item->created_at->diffForHumans(null, false, true) }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('products.edit', $item->id) }}"><i
                                                        class="feather icon-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                    {{ $products->render() }}
                </nav>
            </div>
        </div>
    </section>
    <!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')

@endsection
@section('page-script')
@endsection
