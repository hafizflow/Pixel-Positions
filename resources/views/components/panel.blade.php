@php
    $classes = "p-4 bg-white/8 rounded-xl flex border border-transparent hover:border-blue-800 group transition-colors duration-300";
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>
