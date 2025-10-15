<!DOCTYPE html>
<html lang="en">
<head>
    <x-head title="Register" />
</head>
<body>

    <x-navbar-logo/>

    <div class="login-form shadow p-4 pt-4 rounded" style="width: 500px">
        <h1 class="mb-4 text-center text-black">Sign Up</h1>
        
        @if(session('success'))
            <p style="color:green">{{session ('success') }}</p>
        @endif

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="row mx-auto fs-9" style="width: 400px" action="{{ route('register.submit') }}" method="POST">
            @csrf
            <div class="mb-3 fs-7">
                <label class="form-label">Full name</label>
                <input class="form-control fs-7" type="text" name="fullname" id="formGroupExampleInput" placeholder="Full name" >
            </div>
            <div class="mb-3 fs-7"  style="width: 50%">
                <label class="form-label">Phone number</label>
                <input class="form-control fs-7" type="text" name="phone_number" id="formGroupExampleInput" placeholder="Phone number">
            </div>
            <div class="mb-3 fs-7" style="width: 50%">
                <label class="form-label">Gender</label>
                <select class="form-select fs-8" name="gender">
                    <option value="">Select</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="mb-3 fs-7">
                <label for="dob" class="form-label">Birthday</label>
                <select class="form-select fs-8 mb-3" name="dob_month" data-size="10" required>
                    <option value="">Month</option>
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}">{{ date('F', mktime(0,0,0,$m,1)) }}</option>
                    @endfor
                </select>

                <select class="form-select fs-8" name="dob_date" data-size="10" required>
                    <option value="">Day</option>
                    @for ($d = 1; $d <= 31; $d++)
                        <option value="{{ $d }}">{{ $d }}</option>
                    @endfor
                </select>
            </div>
            <div class="mb-3 fs-7" >
                <label class="form-label">Email</label>
                <input class="form-control fs-7" type="email" name="email" placeholder="Email" required>
            </div>
           <div class="mb-3 fs-7">
                <label class="form-label">Password</label>
                <input class="form-control fs-7" type="password" name="password" placeholder="Password" required>
            </div>
            <p class="text-center text-muted fs-11">By clicking Agree & Join, you agree to the Connexa User Agreement, Privacy Policy, and Cookie Policy.</p>
            <button class="btn btn-primary w-100 py-2-5 rounded-pill fw-bold" type="submit">Agree & Join</button>
        </form>
    </div>
    <p class="mt-5 text-center ">
        Already on Connexa?
        <a href="{{ route('login.form') }}" class="register-link fw-bold text-primary m-2">Sign In</a>
    </p>

    <x-footer-thin :fixedBottom="true" />

</body>
</html>