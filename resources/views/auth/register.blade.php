<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh; box-sizing: border-box;">
        <div class="col-xl-5 col-lg-6 col-md-7 rounded" style="width: 500px; border: solid 1px; padding: 30px;">
            <form method="POST" action="{{ route('register') }}">
                <img src="{{ asset('image/logo.jpg') }}" alt="" width="100%">
                @csrf

                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name') <small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small> @enderror
                </div>

                <div>
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')<small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>@enderror
                </div>

                <div>
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                    @error('password')<small class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></small>@enderror
                </div>

                <div>
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Register') }}</button>
                </div>
                <div class="mt-3 text-center">
                    Already have account? <a class="text-decoration-none" href="login">Login </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
