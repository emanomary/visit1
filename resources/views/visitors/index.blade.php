@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 mb-4">
            <div class="d-flex justify-content-right mb-3">
                <h4>الزوار</h4>
                <a href="{{ route('visitors.create') }}" class="btn btn-success ml-3"> 
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

                @if($visitors->count()>0)
                    <table class="table table-striped bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الزائر</th>
                            <th scope="col">المسمى الوظيفي</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visitors as $index=>$visitor)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $visitor->visitor_name }}</td>
                                <td>{{ $visitor->job }}</td>
                                <td>
                                    <a href="{{ route('visitors.edit',$visitor->id) }}" 
                                        class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-toggle="tooltip" 
                                        data-id="{{ $visitor->id }}"
                                        class="btn btn-danger" id="delete">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $visitors->links() }}
                @else
                    <div class="alert alert-success">
                        {{ __('لا يوجد زوار مضافين') }}
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
            var visitor_id = $(this).data("id");
            $('#confirmModal').modal('show');
            $('#ok_button').click(function()
            {
                $.ajax({
                    type: "get",
                    url: "visitors/destroy/"+visitor_id,
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