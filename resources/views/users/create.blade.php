@extends("layouts.dashboard")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">
                <div class="card">
                    <div class="card-header ">
                        <h4>إضافة مدرسة  جديدة
                        </h4>
                        </div>

                    <div class="card-body font-weight-bold">
                    <form method="POST" action="{{ route('users.store') }} ">
                        @csrf

                        @if($user->id > 0)
                            <input type="hidden" name="id" value="{{ $user->id }}">
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('اسم المدرسة') }}</label>

                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       value="{{ old('name') }}"
                                       class="form-control"
                                       name="name" autofocus>

                                @if($errors->has("name"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("name") }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('اسم  المستخدم') }}</label>

                            <div class="col-md-6">
                                <input id="username"
                                       type="text"
                                       value="{{ old('username') }}"
                                       class="form-control"
                                       name="username">

                                @if($errors->has("username"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("username") }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('البريد الإلكتروني') }}</label>

                            <div class="col-md-6">
                                <input id="email"
                                       type="email"
                                       value="{{ old('email') }}"
                                       class="form-control"
                                       name="email">

                                @if($errors->has("email"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("email") }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="form-control"
                                       name="password">

                                @if($errors->has("password"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("password") }}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation">

                                @if($errors->has("password_confirmation"))
                                    <div class="text-danger font-weight-bold">
                                        {{ $errors->first("password_confirmation") }}
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