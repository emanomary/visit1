@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 mb-4">

            <!--search filter -->
            <div class="d-flex justify-content-rifht mb-3">

                <form class="form-inline" action="{{ route('visits.search') }}" method="get" style="float: left;">     
                    @csrf
                    @auth
                    @if(auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                    <select name="user_id" class="form-control mr-2" style="font-size: 14px;">
                        <option value="">اختر اسم المدرسة</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
                @endauth
                    <select name="visitor_id" class="form-control mr-2" style="font-size: 14px;">
                        <option value="">اختر اسم الزائر</option>
                        @foreach($visitors as $visitor)
                            <option value="{{ $visitor->id }}">
                                {{ $visitor->visitor_name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="mr-1">من</label>
                    <input type="date" class="form-control mr-2" id="visit_date"
                            name="visit_date1" style="font-size: 14px;width:auto;height: auto;">

                    <label class="mr-1">إلى</label>
                    <input type="date" class="form-control mr-2" id="visit_date"
                            name="visit_date2" style="font-size: 14px;width:auto;height: auto;">

                   <button class="btn btn-primary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>     
                </form>
            </div>

            <div class="d-flex justify-content-right mb-3">
                <h4>الزيارات</h4>
                @auth
                @if(!auth()->user()->hasRole('admin'))
                    <a href="{{ route('visits.create') }}" class="btn btn-success ml-3 mr-3"> 
                       <i class="fa fa-plus"></i> <img src="{{ asset('img/collaboration.png') }}">
                    </a>
                @endif
                @endauth
            </div>


                @if(request()->session()->has("success"))
                    <div class="alert alert-success">
                        {{ request()->session()->get("success") }}
                        <button type="button" class="close float-right" data-dismiss="alert" 
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(request()->session()->has("error"))
                    <div class="alert alert-error">
                        {{ request()->session()->get("error") }}
                        <button type="button" class="close float-right" data-dismiss="alert" 
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($visits->count()>0)
                    <table class="table table-striped bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المدرسة</th>
                            <th scope="col">اسم الزائر</th>
                            <th scope="col">هدف الزيارة</th>
                            <th scope="col">تاريخ الزيارة</th>
                            <th scope="col">وقت الزيارة</th>
                            <th scope="col">وقت انتهاء الزيارة</th>
                            @auth
                            @if(!auth()->user()->hasRole('admin'))
                                <th scope="col">الإجراءات</th>
                            @endif
                            @endauth

                            @auth
                            @if(auth()->user()->hasRole('admin') && auth()->user()->hasRole('user') || auth()->user()->hasRole('superadmin'))

                                <th scope="col">الإجراءات</th>
                            @endif
                            @endauth
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits as $index=>$visit)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $visit->name }}</td>
                                <td>{{ $visit->visitor_name }}</td>
                                <td>{{ $visit->visit_goal }}</td>
                                <td>{{ $visit->visit_date }}</td>
                                <td>{{ $visit->start_time }}</td>
                                <td>{{ $visit->end_time }}</td>
                                @auth
                                @if(!auth()->user()->hasRole('admin'))
                                    <td>
                                        <a href="{{ route('visits.edit',['id'=>$visit->id]) }}" 
                                            class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" 
                                            data-id="{{ $visit->id }}"
                                            class="btn btn-danger" id="delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                @endif
                                @endauth

                                @auth
                                @if(auth()->user()->hasRole('admin') && auth()->user()->hasRole('user') || auth()->user()->hasRole('superadmin'))
                                    <td>
                                        <a href="{{ route('visits.edit',['id'=>$visit->id]) }}" 
                                            class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" 
                                            data-id="{{ $visit->id }}"
                                            class="btn btn-danger" id="delete">
                                            <i class="fa fa-trash-alt"></i>
                                        </a>
                                    </td>
                                @endif
                                @endauth
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $visits->links() }}
                @else
                    <div class="alert alert-success">
                        {{ __('لا يوجد زيارات') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!------------------------------------------------------>
    @include('includes.message')

    <script type="text/javascript">
       
        $('body').on('click', '#delete', function () 
             {
                var visit_id = $(this).data("id");
                $('#confirmModal').modal('show');
                $('#ok_button').click(function()
                {
                    $.ajax({
                        type: "get",
                        url: "visits/destroy/"+visit_id,
                        success: function (data) 
                        {
                            //open success message
                            $('#successModal').modal('show');
                            
                            setTimeout(function()
                            {
                                //close cuccess message after time
                                $('#successModal').modal('hide');
                            },2000); 

                            $('#confirmModal').modal('hide');
                            
                            location.reload(true);  
                        },
                        error: function (data) 
                        {
                            //open error message
                            $('#errorModal').modal('show');
                            setTimeout(function()
                            {
                                //close cuccess message after time
                                $('#errorModal').modal('hide');
                            },2000);
                        }
                    });
                });
            });
    </script>

@endsection