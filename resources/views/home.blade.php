@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            به پنل مرکز پرستاری ثمین خوش آمدید

            <div class="col-md-4">
                @if (Route::has('login'))
                <a href="{{url('/client/form')}}">جهت ویرایش اطلاعات خود کلیک کنید</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
