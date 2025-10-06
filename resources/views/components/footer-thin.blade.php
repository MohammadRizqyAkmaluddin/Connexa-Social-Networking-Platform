@props(['fixedBottom' => false])

<div class="w-75 text-center mx-auto @if($fixedBottom) fixed-bottom py-2 @endif">
    <div class="d-flex gap-5 mt-3 text-center align-items-center justify-content-center fs-10">
        <p class="fs-10">
            <img src="{{ asset('IMG/logos/connexa5.png') }}" alt="" class="me-2 mb-1" style="width: 80px">
            © 2025
        </p>
        <p>User Agreement</p>
        <p>Privacy Policy</p>
        <p>Community Guidelines</p>
        <p>Cookie Policy</p>
        <p>Copyright Policy</p>
        <p>Send Feedback</p>
    </div>
</div>
