@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row  d-flex justify-content-center">
            <div class="col-10 col-sm-8 col-md-8">
                <div class="card">
                    <div class="card-body p-1 ">
                        <img src="/img/1.png" class="w-100">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="h6">
                                    همکار گرامی؛ به مرکز مراقبت های ویژه ثمین خوش آمدید، لطفا مراحل ورود به سیستم را انجام دهید تا وارد سیستم شوید.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <crm-entrance token="{{ $token }}"></crm-entrance> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
