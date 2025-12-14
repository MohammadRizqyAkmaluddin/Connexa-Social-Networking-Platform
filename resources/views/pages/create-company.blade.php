@extends('layouts.app')

@section('title', 'Create Page')

@section('content')
<div class="mt-15 text-center" style="width: 1000px">
    <h2 class="fw-light fs-1">Create your Company Page</h2>
    <p class="fs-8">Connect with clients, employees, and the Connexa community. To get started, choose a page type.</p>
    <ul class="nav nav-pills mb-3 mt-10 gap-7" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active border bg-white shadow-hover2" style="width: 300px; height:230px;" id="pills-company-tab" data-bs-toggle="pill" data-bs-target="#pills-company" type="button" role="tab" aria-controls="pills-company" aria-selected="true">
                <img src="{{asset('IMG/asset/company.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Company</h2>
                <p class="fs-8 fw-light">Small, medium, and large bussiness</p>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border bg-white shadow-hover2" id="pills-subsidiary-tab" style="width: 300px; height:230px;" data-bs-toggle="pill" data-bs-target="#pills-subsidiary" type="button" role="tab" aria-controls="pills-subsidiary" aria-selected="false">
                <img src="{{asset('IMG/asset/subsidiary.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Subsidiary Company</h2>
                <p class="fs-8 fw-light">Sub-pages associated with an existing page</p>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link border bg-white shadow-hover2" id="pills-university-tab" style="width: 300px; height:230px;" data-bs-toggle="pill" data-bs-target="#pills-university" type="button" role="tab" aria-controls="pills-university" aria-selected="false">
                <img src="{{asset('IMG/asset/educational.png')}}" width="100">
                <h2 class="fs-5 mb-0 mt-3 text-dark">Educational Institution</h2>
                <p class="fs-8 fw-light">Schools and universities</p>
            </button>
        </li>
    </ul>
    <div class="tab-content text-start mt-5" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white border px-5 py-3 rounded">
                <img src="{{asset('IMG/asset/company.png')}}" width="40" height="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started with a few details about your company</h2>
            </div>
            <div class="d-flex mt-3 gap-3">
                <div class="d-block bg-white border p-4 rounded mb-8" style="width: 500px">
                    <form action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                        <input type="hidden" name="page_id" value="COM">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Name</label>
                            <input type="text" class="form-control fs-8" name="name" id="nameInput" placeholder="Add your organization's name" required>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label fs-7">Ownership-based</label>
                        <div class="d-flex mb-3 gap-3">
                            <input type="radio" class="btn-check" name="sector" id="option5" value="Private Company" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option5">
                                <img src="{{asset('IMG/asset/swasta.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">Private Company</h2>
                            </label>

                            <input type="radio" class="btn-check" name="sector" id="option6" value="State-Owned Enterprise (SOE)" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option6">
                                <img src="{{asset('IMG/asset/bumn.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">State-Owned Enterprise</h2>
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
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Company Logo <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="file" class="form-control fs-8"
                                name="logo" id="logoInput" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Overview</label>
                            <input type="text" class="form-control fs-8" name="overview" placeholder="Company overview" required>
                            <p class="fs-11 text-muted">Maximum 250 character</p>
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
        <div class="tab-pane fade" id="pills-subsidiary" role="tabpanel" aria-labelledby="pills-subsidiary-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white border px-5 py-3 rounded">
                <img src="{{asset('IMG/asset/subsidiary.png')}}" width="40" height="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started by associating your existing company page</h2>
            </div>
            <div class="d-flex mt-3 gap-3">
                <div class="d-block bg-white border p-4 rounded mb-8" style="width: 500px">
                    <form action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                        <input type="hidden" name="page_id" value="COM">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Name</label>
                            <input type="text" class="form-control fs-8" name="name" id="nameInput2" placeholder="Add your organization's name" required>
                        </div>

                        <label for="companySelect" class="form-label fs-7">Subsidiary Of</label>
                        <select name="subsidiary" id="companySelect2" class="form-select fs-8" required>
                            <option  value="">Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->company_id }}">
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="exampleFormControlInput1" class="form-label fs-7 mt-3">Ownership-based</label>
                        <div class="d-flex mb-3 gap-3">
                            <input type="radio" class="btn-check" name="sector" id="option7" value="Private Company" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option7">
                                <img src="{{asset('IMG/asset/swasta.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">Private Company</h2>
                            </label>

                            <input type="radio" class="btn-check" name="sector" id="option8" value="State-Owned Enterprise (SOE)" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option8">
                                <img src="{{asset('IMG/asset/bumn.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">State-Owned Enterprise</h2>
                            </label>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label fs-7">Industry</label>
                        <select name="industry" id="industrySelect2" class="form-select fs-8" required>
                            <option  value="">Select Industry</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->industry }}">
                                    {{ $industry->industry }}
                                </option>
                            @endforeach
                        </select>

                        <label for="exampleFormControlInput1" class="form-label fs-7 mt-3">Organization size</label>
                        <select name="employee" class="form-select fs-8" required>
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
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Company Logo <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="file" class="form-control fs-8"
                                name="logo" id="logoInput2" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Overview</label>
                            <input type="text" class="form-control fs-8" name="overview" placeholder="Company overview" required>
                            <p class="fs-11 text-muted">Maximum 250 character</p>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Tagline <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="text" class="form-control fs-8" name="tagline" id="taglineInput2" placeholder="Ex: Empowering everyone to start and grow">
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

                </div>
                <div class="d-block rounded" style="width: 490px">
                    <div class="d-block bg-white rounded">
                        <h2 class="fs-7 py-3 ps-3 mb-0 border rounded-top">Page preview</h2>
                        <div class="bg-brokenWhite2 border px-4 pt-4 pb-6 rounded-bottom">
                            <div class="d-block bg-white rounded border p-5 text-start">
                                <img src="{{ asset('IMG/asset/basic-logo.png') }}" class="" id="logoPreview2"
                                    style="width:120px; height:120px; object-fit:contain;">
                                <h3 id="namePreview2" class="fs-5 mb-1">Company Name</h3>
                                <p id="taglinePreview2" class="fs-7 mb-1 mt-3">
                                    Company tagline will be displayed here
                                </p>
                                <p id="industryPreview2" class="fs-7 text-muted mb-0">
                                    Industry
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-university" role="tabpanel" aria-labelledby="pills-university-tab" tabindex="0">
            <div class="d-flex align-items-center gap-3 bg-white border px-5 py-3 rounded">
                <img src="{{asset('IMG/asset/educational.png')}}" width="40" height="40">
                <h2 class="fs-6 mb-0 fw-normal">Let’s get started with a few details about your educational institute</h2>
            </div>
            <div class="d-flex mt-3 gap-3">
                <div class="d-block bg-white border p-4 rounded mb-8" style="width: 500px">
                    <form action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                        <input type="hidden" name="page_id" value="EDU">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Name</label>
                            <input type="text" class="form-control fs-8" name="name" id="nameInput3" placeholder="Add your institution's name" required>
                        </div>

                        <label for="exampleFormControlInput1" class="form-label fs-7">Ownership-based</label>
                        <div class="d-flex mb-3 gap-3">
                            <input type="radio" class="btn-check" name="sector" id="option9" value="Private Company" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option9">
                                <img src="{{asset('IMG/asset/swasta.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">Private Company</h2>
                            </label>

                            <input type="radio" class="btn-check" name="sector" id="option10" value="State-Owned Enterprise (SOE)" autocomplete="off">
                            <label class="btn btn-outline-light shadow-hover2 border" for="option10">
                                <img src="{{asset('IMG/asset/bumn.png')}}" width="180">
                                <h2 class="fs-6 mb-0 fw-semibold text-dark border-top py-1">State-Owned Enterprise</h2>
                            </label>
                        </div>

                        <label for="industrySelect3" class="form-label fs-7">Industry</label>
                        <select name="industry" id="industrySelect3" class="form-select " required>
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
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Company Logo <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="file" class="form-control fs-8"
                                name="logo" id="logoInput3" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7">Overview</label>
                            <input type="text" class="form-control fs-8" name="overview" placeholder="Company overview" required>
                            <p class="fs-11 text-muted">Maximum 250 character</p>
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="exampleFormControlInput1" class="form-label fs-7 d-flex gap-1">Tagline <p class="mb-0 text-muted fw-light">(optional)</p></label>
                            <input type="text" class="form-control fs-8" name="tagline" id="taglineInput3" placeholder="Ex: Empowering everyone to start and grow">
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
                                <img src="{{ asset('IMG/asset/basic-logo.png') }}" class="" id="logoPreview3"
                                    style="width:120px; height:120px; object-fit:contain;">
                                <h3 id="namePreview3" class="fs-5 mb-1">Company Name</h3>
                                <p id="taglinePreview3" class="fs-7 mb-1 mt-3">
                                    Company tagline will be displayed here
                                </p>
                                <p id="industryPreview3" class="fs-7 text-muted mb-0">
                                    Industry
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

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
    $(document).ready(function () {
        $('#industrySelect2').select2({
            width: '100%'
        });
    });
    $(document).ready(function () {
        $('#industrySelect3').select2({
            width: '100%'
        });
    });
    $(document).ready(function () {
        $('#companySelect2').select2({
            width: '100%'
        });
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
    document.getElementById('logoInput2').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('logoPreview2').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
    document.getElementById('logoInput3').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('logoPreview3').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    const nameInput = document.getElementById('nameInput');
    const nameInput2 = document.getElementById('nameInput2');
    const nameInput3 = document.getElementById('nameInput3');
    const taglineInput = document.getElementById('taglineInput');
    const taglineInput2 = document.getElementById('taglineInput2');
    const taglineInput3 = document.getElementById('taglineInput3');

    nameInput.addEventListener('input', () => {
        document.getElementById('namePreview').textContent =
            nameInput.value || 'Company Name';
    });
    nameInput2.addEventListener('input', () => {
        document.getElementById('namePreview2').textContent =
            nameInput2.value || 'Company Name';
    });
    nameInput3.addEventListener('input', () => {
        document.getElementById('namePreview3').textContent =
            nameInput3.value || 'Company Name';
    });

    taglineInput.addEventListener('input', () => {
        document.getElementById('taglinePreview').textContent =
            taglineInput.value || 'Company tagline goes here';
    });
    taglineInput2.addEventListener('input', () => {
        document.getElementById('taglinePreview2').textContent =
            taglineInput2.value || 'Company tagline goes here';
    });
    taglineInput3.addEventListener('input', () => {
        document.getElementById('taglinePreview3').textContent =
            taglineInput3.value || 'Company tagline goes here';
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
    $(document).ready(function () {

        $('#industrySelect2').on('select2:select', function (e) {
            const selectedText = e.params.data.text;

            $('#industryPreview2').text(
                selectedText !== 'Select Industry'
                    ? selectedText
                    : 'Industry'
            );
        });

    });
    $(document).ready(function () {

        $('#industrySelect3').on('select2:select', function (e) {
            const selectedText = e.params.data.text;

            $('#industryPreview3').text(
                selectedText !== 'Select Industry'
                    ? selectedText
                    : 'Industry'
            );
        });

    });
</script>



@endsection
