@extends('layouts/contentLayoutMaster')

@section('title', 'Message')

@section('vendor-style')
    <!-- vendor css files -->
@endsection
@section('page-style')
    <!-- Page css files -->

@endsection

@section('content')
    <style>
        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

    </style>
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
        <div class="card">
            <div class="card-body">
                <div class="profile">
                    <img src="/images/icons/doc.png" alt="" style="height: 50px" />
                    <div>
                        <h2>{{ $message->name }}</h2>
                        <h4>{{ $message->email }}</h4>
                        <p>
                            {{ $message->message }}
                        </p>
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
