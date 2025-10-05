<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Afacad:ital,wght@0,400..700;1,400..700&family=Amatic+SC:wght@400;700&family=Bebas+Neue&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=Covered+By+Your+Grace&family=Gabarito:wght@400..900&family=Gloock&family=Koulen&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <link rel="icon" href="{{ asset('IMG/logos/connexa1.png') }}" class="img-fluid" style="width:120px;" type="image/png">
    <title>Connexa</title>  
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="navbar">
        <img src="{{ asset('IMG/logos/connexa3.png') }}" alt="">
    </div>

    <div class="login-form shadow p-4 pt-4 rounded" style="width: 500px">
        <h1 class="mb-4 text-center">Sign Up</h1>
        
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
        <p class="mt-5 text-center">
            Already on Connexa?
        <a href="{{ route('login.form') }}" class="register-link fw-bold text-primary m-2">Sign In</a>
        </p>

</body>

</html>