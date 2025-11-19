<!DOCTYPE html>
<html lang="en">
    <x-head title="Business" />
<body class="bg-main">
    <x-navbar-main/>
    <div class="mt-10">
        <div class="d-flex bg-white rounded py-4 px-4">
            <h2 class="fs-5 w-25 mb-0">Access Management</h2>
            <div class="d-flex justify-content-between w-75">
                <p class="mb-0"><strong>Total Page:</strong>{{$companies->count()}}</p>
                <p class="mb-0"><strong>Total Page:</strong>{{$companies->count()}}</p>
                <p class="mb-0"><strong>Total Page:</strong>{{$companies->count()}}</p>
                <p class="mb-0"><strong>Total Page:</strong>{{$companies->count()}}</p>
            </div>
        </div>
        <div class="d-flex" style="margin-top: 10px">
            <div class="row g-2 align-items-center justify-content-start mx-auto">
                @foreach ($companies as $company)
                    <div class="col-6 col-md-5 ms-2 bg-white rounded py-3 px-3">
                        <a href="{{route('manage.show', $company->company_id)}}">
                            <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" width="100">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div id="overlay" aria-hidden="true"></div>
</body>
</html>
