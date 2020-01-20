@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <!--<div class="card  mt-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">-->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--grid for dashboard-->
                    @auth
                    @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card text-white mb-3" style="max-width: 50rem;max-height: 50rem;">
                                        <div class="card-header bg-danger" style="font-size: 20px;">المستخدمون</div>
                                        <div class="card-body">
                                            <h1 class="card-title text-center font-weight-bold" style="color: #333;">{{ $user_count }} مستخدم</h1>
                                        </div>
                                    </div>
                                </div>
                    @endif
                    @endauth           
                                <div class="col-sm">
                                    <div class="card text-white mb-3" style="max-width: 50rem;max-height: 50rem;font-size: 18px;">
                                        <div class="card-header bg-success" style="font-size: 20px;">الزيارات</div>
                                        <div class="card-body">
                                            <h1 class="card-title text-center font-weight-bold" style="color: #333;">{{ $visit_count }} زيارة</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                   <!--/end grid-->
                <!--</div>
            </div>-->
        </div>
    </div>
</div>

@endsection
