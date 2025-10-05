@php
    $icons = [
        'google' => 'IMG/icons/google.png',
        'microsoft' => 'IMG/icons/microsoft.png',
        'apple' => 'IMG/icons/apple.png',
        'connexa' => 'IMG/logos/connexa4.png',
    ];
@endphp

<button {{ $attributes->merge(['class' => 'btn py-2 rounded-pill button-main w-100 mb-2']) }}>
    <img src="{{ asset($icons[$provider]) }}" alt="{{ $provider }}" style="width:25px" class="me-2">
    Sign in with {{ ucfirst($provider) }}
</button>
