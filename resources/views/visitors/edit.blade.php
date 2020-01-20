@extends("layouts.dashboard")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header ">
                        <h4>تعديل  بيانات الزائر  
                        </h4>
                        </div>

                    <div class="card-body font-weight-bold">
                    <form method="POST" action="{{ route('visitors.update', $visitor->id) }} ">
                        @csrf
                     
                        <div class="form-group row">
                            <label for="visitor_name" class="col-md-4 col-form-label text-md-right">{{ __('اسم الزائر') }}</label>

                            <div class="col-md-6">
                                <input id="visitor_name"
                                       type="text"
                                       value="{{ $visitor->visitor_name }}"
                                       class="form-control"
                                       name="visitor_name" autofocus>

                                @if($errors->has("visitor_name"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("visitor_name") }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('المسمى الوظيفي') }}</label>

                            <div class="col-md-6">
                                <input id="job"
                                       type="text"
                                       value="{{ $visitor->job }}"
                                       class="form-control"
                                       name="job" autofocus>

                                @if($errors->has("job"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("job") }}
                                    </div>
                                @endif

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('حفظ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection