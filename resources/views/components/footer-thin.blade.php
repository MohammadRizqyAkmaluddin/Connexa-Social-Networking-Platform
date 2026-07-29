@props(['fixedBottom' => false])

<div class="w-100 text-center mx-auto px-3 overflow-hidden @if($fixedBottom) fixed-bottom py-2 bg-white bg-opacity-75 backdrop-blur @endif">
    <div class="d-flex flex-wrap gap-2 gap-sm-3 my-3 text-center align-items-center justify-content-center fs-11 text-muted">
        <span class="d-inline-flex align-items-center me-2">
            <img src="{{ asset('IMG/logos/connexa5.png') }}" alt="Connexa" class="me-1" style="width: 65px">
            <span class="small">© 2025</span>
        </span>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">User Agreement</a>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">Privacy Policy</a>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">Community Guidelines</a>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">Cookie Policy</a>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">Copyright Policy</a>
        <a href="#" class="text-muted text-decoration-none hover-underline px-1">Send Feedback</a>
    </div>
</div>

