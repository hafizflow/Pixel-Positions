@props(['tag', 'size' => 'base'])

@php
    $classes = "bg-white/10 hover:bg-white/20 rounded-xl font-medium transition-colors duration-300";
    if($size === 'base') {
        $classes .= " px-5 py-1 text-sm ";
    } elseif ($size === 'small') {
        $classes .= " px-3 py-1 text-xs ";
    }
@endphp


<a href="/tags/{{ strtolower($tag->name) }}" class="{{ $classes }}">{{ $tag->name }}</a>
