@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 mb-4">
            <div class="d-flex justify-content-right mb-3">
                <h4>المستخدمون</h4>
                <a href="{{ route('users.create') }}" class="btn btn-success ml-3"> 
                    <i class="fas fa-user-plus"></i>
                </a>
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
                        <button type="button" class="close float-left" data-dismiss="alert" 
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($users->count()>0)
                    <table class="table table-striped bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المدرسة</th>
                            <th scope="col">اسم المستخدم</th>
                            <th scope="col">البريد الإلكتروني</th>
                            <th scope="col">الأذونات</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index=>$user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @foreach($user->roles as $index=>$role)
                                    {{ $role->display_name }} {{ $index+1 < $user->roles->count() ? ',':'' }}
                                @endforeach
                                </td>
                                <td>

                                @if(!$user->hasRole('super_admin'))
                                <a href="{{ route('users.edit',['id'=>$user->id]) }}" 
                                    class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" data-toggle="tooltip" 
                                    data-id="{{ $user->id }}"
                                    class="btn btn-danger" id="delete">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                                @endif
                            </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $users->links() }}
                @else
                    <div class="alert alert-success">
                        {{ __('لا يوجد مستخدمون') }}
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
            var user_id = $(this).data("id");
            $('#confirmModal').modal('show');
            $('#ok_button').click(function()
            {
                $.ajax({
                    type: "get",
                    url: "users/destroy/"+user_id,
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