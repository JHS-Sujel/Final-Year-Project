@extends('layouts.fullLayoutMaster')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Put your verification code here') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification code has been sent to your email address and contact no.') }}
                    </div>
                    @endif
                    <div>
                        <form class="form-inline" action="{{ route('verify') }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="sr-only">Code</label>
                                <input type="text" name="code" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Verify</button>
                        </form>
                    </div>
                    {{ __('Before proceeding, please check your email/contact no for a verification code.') }}
                    {{ __('If you did not receive the code') }}, <a href="{{ route('verify.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection