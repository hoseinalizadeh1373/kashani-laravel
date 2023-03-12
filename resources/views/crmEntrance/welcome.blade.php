@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        به پرتال مرکز پرستاری ثمین خوش آمدید
                    </div>
                    <div class="card-body">
                      <welcome token="{{ $token }}"></welcome> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
