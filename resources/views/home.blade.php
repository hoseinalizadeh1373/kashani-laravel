@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            به پنل مرکز پرستاری ثمین خوش آمدید
            <div class="col-md-4">
                @auth
                <a href="{{url('/client/form')}}">جهت ویرایش اطلاعات خود کلیک کنید</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
