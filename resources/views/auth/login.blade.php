@extends('layouts.raw')

@section('raw-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card rounded shadow-sm">

                <div class="card-header text-center bg-white">                
                    <div class="mb-1 p-3">
                        <img src="{{ asset('storage\limu_logo\limu_icon.png') }}" class="img-fluid" alt="Image">
                    </div>
                </div>

                <div class="card-body">

                    <!-- NAME OF THE SYSTEM -->
                    <div class="text-center bg-light rounded border p-1 mb-3">
                        <h5>منظومة الموردين</h5>
                    </div>
                    <!-- END OF THE SYSTEM NAME -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-right fw-bold">{{ __('البريد الألكتروني') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-right fw-bold">{{ __('كلمة السر') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <span class="fw-bold">{{ __('تذكرني') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
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
