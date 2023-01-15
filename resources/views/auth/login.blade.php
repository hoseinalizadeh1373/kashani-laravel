@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ورود</div>
                <div class="card-body">
                    <login-form mode="{{$mode}}" contact-mobile="{!! $mobile !!}"></login-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
