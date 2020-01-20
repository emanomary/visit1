
@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 mt-4 mb-4">
            
            <div class="d-flex justify-content-right mb-3">
                <h4 class="text-primary">نتيجة البحث </h4>
                {{--@if(!empty($visitor))--}}
                   <!-- <h4>نتيجة البحث عن : {{--$visitor->visitor_name--}} </h4>-->
               {{-- @endif--}}

               {{-- @if(!empty($user))--}}
                   <!-- <h4>نتيجة البحث عن : {{-- $user->name --}}</h4>-->
               {{-- @endif--}}
            </div>

            <small class="text-muted mb-3">
                <i class="fa fa-print text-muted pt-1 ml-2"> </i>
                <a href="javascript:void(0);" onclick="printPageArea('printableArea')" class="text-muted"> طباعة</a>
            </small>
            <div id="printableArea" class="mt-3">

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
                            <th scope="col">وقت نهاية الزيارة</th>
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
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @elseif($visits1->count()>0)
                    <table class="table table-striped bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المدرسة</th>
                            <th scope="col">اسم الزائر</th>
                            <th scope="col">هدف الزيارة</th>
                            <th scope="col">تاريخ الزيارة</th>
                            <th scope="col">وقت الزيارة</th>
                            <th scope="col">وقت نهاية الزيارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits1 as $index=>$visit1)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $visit1->name }}</td>
                                <td>{{ $visit1->visitor_name }}</td>
                                <td>{{ $visit1->visit_goal }}</td>
                                <td>{{ $visit1->visit_date }}</td>
                                <td>{{ $visit1->start_time }}</td>
                                <td>{{ $visit1->end_time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @elseif($visits2->count()>0)
                    <table class="table table-striped bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المدرسة</th>
                            <th scope="col">اسم الزائر</th>
                            <th scope="col">هدف الزيارة</th>
                            <th scope="col">تاريخ الزيارة</th>
                            <th scope="col">وقت الزيارة</th>
                            <th scope="col">وقت نهاية الزيارة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visits2 as $index=>$visit2)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $visit2->name }}</td>
                                <td>{{ $visit2->visitor_name }}</td>
                                <td>{{ $visit2->visit_goal }}</td>
                                <td>{{ $visit2->visit_date }}</td>
                                <td>{{ $visit2->start_time }}</td>
                                <td>{{ $visit2->end_time }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                   {{-- @if(!empty($visitor)) --}}
                    <div class="alert alert-danger">
                        <h4>عذراً لا يوجد نتائج  </h4>
                    </div>
                   {{-- @endif --}}

                   {{-- @if(!empty($user))--}}
                   <!-- <div class="alert alert-danger"> -->
                      <!--  <h4>لا يوجد نتائج عن : {{-- $user->name --}}</h4>-->
                   <!-- </div>-->
                   {{-- @endif --}}
                @endif
            </div>
        </div>
        </div>
    </div>

    <script type="text/javascript">
    function printPageArea(areaID) 
    {
        var printContents = document.getElementById(areaID).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection