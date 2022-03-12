@extends('layouts/contentLayoutMaster')

@section('title', 'Order Invoice')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset('css/pages/invoice.css') }}">
@endsection
@section('page-style')
    <!-- Page css files -->

@endsection

@section('content')
    <!-- invoice page -->
    <section class="card invoice-page">
        <div id="invoice-template" class="card-body">
            <!-- Invoice Company Details -->
            <div id="invoice-company-details" class="row">
                <div class="col-sm-6 col-12 text-left pt-1">
                    <div class="media pt-1">
                        <img src="{{ asset('images/logo.png') }}" style="height: 60px" alt="company logo" />
                    </div>
                </div>
                <div class="col-sm-6 col-12 text-right">
                    <h1>Invoice</h1>
                    <div class="invoice-details mt-2">
                        <h6>INVOICE NO.</h6>
                        <p>{{ sprintf("%'.05d", $order->id) }}/{{ date('Y') }}</p>
                        <h6 class="mt-2">INVOICE DATE</h6>
                        <p>{{ date('d M Y', strtotime($order->created_at)) }}</p>
                    </div>
                </div>
            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div id="invoice-customer-details" class="row pt-2">
                <div class="col-sm-6 col-12 text-left">
                    <h5>Recipient</h5>
                    <div class="recipient-info my-2">
                        <p>{{ $customer->shipping_address->full_name }}</p>
                        <p>{{ $customer->shipping_address->house_no }}, {{ $customer->shipping_address->land_mark }}</p>
                        <p>{{ $customer->shipping_address->city }}, {{ $customer->shipping_address->state }}</p>
                        <p>{{ $customer->shipping_address->zipcode }}</p>
                    </div>
                    <div class="recipient-contact pb-2">
                        <p>
                            <i class="feather icon-mail"></i>
                            {{ $customer->email }}
                        </p>
                        <p>
                            <i class="feather icon-phone"></i>
                            +88 {{ $customer->shipping_address->phone }}
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
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>
                                            <img style="height: 60px" src="{{ $item->product->image_small }}"
                                                alt="{{ $item->product->title }}">
                                        </td>
                                        <th>{{ $item->product->title }}</th>
                                        <td>{{ $item->quantity }} </td>
                                        <td>{{ number_format($item->price, 2) }} </td>
                                        <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                @endforeach
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
                                        <td>{{ number_format($order->price, 2) }}</td>
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
@endsection

@section('vendor-script')

@endsection
@section('page-script')
    <script src="{{ asset('js/scripts/pages/invoice') }}"></script>
@endsection
