<!DOCTYPE html>
<html lang="en">
<head>
    <x-head title="Login" />
</head>
<body>

    <x-navbar-logo/>
    <div class="login-form shadow p-4 pt-4 mt-8 rounded" style="width: 350px;">
        <h1 class="mb-4 text-center text-black">Sign In</h1>

        <div class="row mx-auto">
            <x-button-main provider="google" />
            <x-button-main provider="microsoft" />
            <x-button-main provider="apple" />
        </div>
        <div class="d-flex align-items-center mb-2">
            <hr class="flex-grow-1">
            <span class="mx-3 mb-1 text-muted">or</span>
            <hr class="flex-grow-1">
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" value="{{ old('email') }}" id="email" type="email" name="email"  placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2-5 rounded-pill fw-bold">Sign In</button>
        </form>
    </div>
    <p class="mt-5 text-center mb-17">
        New to Connexa?
        <a href="{{ route('register.form') }}" class="register-link fw-bold text-primary m-2">Join Now</a>
    </p>

    <x-footer-thin :fixedBottom="true" />

</body>
</html>