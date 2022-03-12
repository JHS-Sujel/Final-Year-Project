@extends('layouts/contentLayoutMaster')

@section('title', 'Orders')

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
                                        <th>SN</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            <td>{{ isset($item->user) ? $item->user->full_name : '' }}</td>
                                            <td>{{ number_format($item->price, 2) }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->status_class }}">{{ $item->status_text }}</span>
                                            </td>
                                            <td>
                                                {{ $item->created_at->diffForHumans(null, false, true) }}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('orders.edit', $item->id) }}"><i
                                                        class="feather icon-edit"></i> Edit</a>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('orders.show', $item->id) }}"><i
                                                        class="feather icon-file"></i> Invoice</a>
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
                    {{ $orders->render() }}
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
