@extends("layouts.dashboard")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header ">
                        <h4>إضافة زيارة  جديدة
                        </h4>
                        </div>

                    <div class="card-body font-weight-bold">
                    <form method="POST" action="{{ route('visits.update',$visit->id) }} ">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                     

                        <div class="form-group row">
                            <label for="visitor_id" class="col-md-4 col-form-label text-md-right">
                            {{ __('اسم الزائر') }}</label>
                            <div class="col-md-6">
                                <select name="visitor_id" class="form-control" style="height: calc(2.25rem + 6px);">
                                    <option value="">اختر اسم الزائر</option>
                                    @foreach($visitors as $visitor)
                                        <option value="{{ $visitor->id }}" @if($visitor->id == $visit->visitor_id) selected @endif>
                                            {{ $visitor->visitor_name }}
                                        </option>
                                    @endforeach
                                </select>

                                @if($errors->has("visitor_id"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("visitor_id") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visit_goal" class="col-md-4 col-form-label text-md-right">{{ __('هدف الزيارة') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="visit_goal"
                                          id="visit_goal"
                                          cols="3" rows="3">{{ $visit->visit_goal }}
                                </textarea>

                                @if($errors->has("visit_goal"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("visit_goal") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visit_date" class="col-md-4 col-form-label text-md-right">{{ __('تاريخ الزيارة') }}</label>
                            <div class="col-md-4">
                                <input type="date"
                                       class="form-control"
                                       id="visit_date"
                                       name="visit_date"
                                       value="{{  $visit->visit_date }}">

                                @if($errors->has("visit_date"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("visit_date") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- start time -->
                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('وقت بالزيارة') }}</label>
                            <div class="col-md-4">
                                <input type="time"
                                       class="form-control"
                                       id="start_time"
                                       name="start_time"
                                       value="{{  $visit->start_time }}">

                                @if($errors->has("start_time"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("start_time") }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- start time -->
                        <div class="form-group row">
                            <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('وقت نهاية الزيارة') }}</label>
                            <div class="col-md-4">
                                <input type="time"
                                       class="form-control"
                                       id="end_time"
                                       name="end_time"
                                       value="{{  $visit->end_time }}">

                                @if($errors->has("end_time"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("end_time") }}
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