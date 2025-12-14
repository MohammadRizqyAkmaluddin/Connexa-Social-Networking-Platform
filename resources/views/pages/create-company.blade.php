@extends('layouts.app')

@section('title', 'Create Page')

@section('content')
<div class="mt-15 text-center" style="width: 1000px">
    <h2 class="fw-light fs-1">Create your Company Page</h2>
    <p class="fs-8">Connect with clients, employees, and the Connexa community. To get started, choose a page type.</p>
    <ul class="nav nav-pills mb-3 mt-10 gap-7" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active border bg-white shadow-hover2" style="width: 300px; height:230px;" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                <img src="{{asset('IMG/asset/company.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Company</h2>
                <p class="fs-8 fw-light">Small, medium, and large bussiness</p>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border bg-white shadow-hover2" id="pills-profile-tab" style="width: 300px; height:230px;" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                <img src="{{asset('IMG/asset/subsidiary.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Subsidiary Company</h2>
                <p class="fs-8 fw-light">Sub-pages associated with an existing page</p>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border bg-white shadow-hover2" id="pills-contact-tab" style="width: 300px; height:230px;" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                <img src="{{asset('IMG/asset/educational.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Educational Institution</h2>
                <p class="fs-8 fw-light">Schools and universities</p>
            </button>
        </li>
    </ul>
    <div class="tab-content text-start mt-5" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white border px-5 py-3 rounded">
                <img src="{{asset('IMG/asset/company.png')}}" width="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started with a few details about your company</h2>
            </div>
            <div class="d-flex mt-4 gap-3">
                <div class="d-block bg-white border p-4 rounded mb-8" style="width: 500px">
                    <form action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                        <input type="hidden" name="page_id" value="COM">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Name</label>
                            <input type="text" class="form-control fs-8" name="name" id="nameInput" placeholder="Add your organization's name" required>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label fs-7">Sector</label>
                        <div class="d-flex mb-3 gap-3">
                            <input type="radio" class="btn-check" name="sector" id="option5" value="Private Company" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option5">
                                <img src="{{asset('IMG/asset/swasta.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark">Private Company</h2>
                            </label>

                            <input type="radio" class="btn-check" name="sector" id="option6" value="State-Owned Enterprise (SOE)" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option6">
                                <img src="{{asset('IMG/asset/bumn.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark">State-Owned Enterprise</h2>
                            </label>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label fs-7">Industry</label>
                        <select name="industry" id="industrySelect" class="form-select " required>
                            <option  value="">Select Industry</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->industry }}">
                                    {{ $industry->industry }}
                                </option>
                            @endforeach
                        </select>

                        <label for="exampleFormControlInput1" class="form-label fs-7 mt-3">Organization size</label>
                        <select name="employee" class="form-select " required>
                            <option  value="">Select size</option>
                            <option  value="0-1">0-1 Employees</option>
                            <option  value="2-10">2-10 Employees</option>
                            <option  value="11-50">11-50 Employees</option>
                            <option  value="51-200">51-200 Employees</option>
                            <option  value="201-500">201-500 Employees</option>
                            <option  value="501-1000">501-1000 Employees</option>
                            <option  value="1001-5000">1001-5000 Employees</option>
                            <option  value="5001-10000">5001-10000 Employees</option>
                            <option  value="10000+">10000+ Employees</option>
                        </select>

                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Established Date <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="date" class="form-control fs-8" name="established_date" id="exampleFormControlInput1">
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100">
                                <label for="exampleFormControlInput1" class="form-label fs-7">Country</label>
                                <input type="text" class="form-control fs-8" name="country" id="exampleFormControlInput1" placeholder="Ex: United States" required>
                            </div>
                            <div class="w-100">
                                <label for="exampleFormControlInput1" class="form-label fs-7">City</label>
                                <input type="text" class="form-control fs-8" name="city" id="exampleFormControlInput1" placeholder="Ex: California" required>
                            </div>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Website URL <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="text" class="form-control fs-8" name="website" id="exampleFormControlInput1" placeholder="Ex: https://www.connexa.co.id/">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fs-7">Company Logo</label>
                            <input type="file" class="form-control fs-8"
                                name="logo" id="logoInput" accept="image/*">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Tagline <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="text" class="form-control fs-8" name="tagline" id="taglineInput" placeholder="Ex: Empowering everyone to start and grow">
                            <p class="fs-11 text-muted">Use your tagline to briefly describe what your organization does.</p>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input rounded-0" type="checkbox" value="" id="defaultCheck1" required>
                            <label class="form-check-label fs-8" for="defaultCheck1">
                                I confirm that the information provided is accurate and I agree to Connexa’s Terms & Conditions and Privacy Policy.
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary fw-semibold rounded-pill">Create Page</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="d-block rounded" style="width: 490px">
                    <div class="d-block bg-white rounded">
                        <h2 class="fs-7 py-3 ps-3 mb-0 border rounded-top">Page preview</h2>
                        <div class="bg-brokenWhite2 border px-4 pt-4 pb-6 rounded-bottom">
                            <div class="d-block bg-white rounded border p-5 text-start">
                                <img src="{{ asset('IMG/asset/basic-logo.png') }}" class="" id="logoPreview"
                                    style="width:120px; height:120px; object-fit:contain;">
                                <h3 id="namePreview" class="fs-5 mb-1">Company Name</h3>
                                <p id="taglinePreview" class="fs-7 mb-1 mt-3">
                                    Company tagline will be displayed here
                                </p>
                                <p id="industryPreview" class="fs-7 text-muted mb-0">
                                    Industry
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white px-5 py-3 rounded">
                <img src="{{asset('IMG/asset/subsidiary.png')}}" width="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started by associating your existing company page</h2>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white px-5 py-3 rounded w-100">
                <img src="{{asset('IMG/asset/educational.png')}}" width="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started with a few details about your educational institute</h2>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#industrySelect').select2();
    });

    document.getElementById('logoInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('logoPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    const nameInput = document.getElementById('nameInput');
    const taglineInput = document.getElementById('taglineInput');

    nameInput.addEventListener('input', () => {
        document.getElementById('namePreview').textContent =
            nameInput.value || 'Company Name';
    });

    taglineInput.addEventListener('input', () => {
        document.getElementById('taglinePreview').textContent =
            taglineInput.value || 'Company tagline goes here';
    });

    $(document).ready(function () {

    $('#industrySelect').on('select2:select', function (e) {
        const selectedText = e.params.data.text;

        $('#industryPreview').text(
            selectedText !== 'Select Industry'
                ? selectedText
                : 'Industry'
        );
    });

});
</script>



@endsection
