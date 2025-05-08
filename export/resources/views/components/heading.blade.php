@props([
    'color' => 'dark',
    'size' => 'h3',
    'as' => null,
    'base' => 'leading-none uppercase',
    'colors' => [
        'dark' => 'text-primary-950',
        'light' => 'text-primary-700',
        'white' => 'text-white',
    ],
    'sizes' => [
        'h1' => 'md:text-[80px] text-5xl',
        'h2' => 'md:text-[68px] text-[40px]',
        'h3' => 'lg:text-[56px] text-[34px]',
        'h4' => 'md:text-[40px] text-[28px]',
        'h5' => 'md:text-[32px] text-2xl',
        'h6' => 'md:text-2xl text-xl',
    ],
])

@php
    $classes =  $base . ' ' . $colors[$color] . ' ' . $sizes[$size] . ' ';
@endphp

<{{ $as ?? 'h3' }} {{ $attributes->twMerge(["class" => $classes]) }}>
{{ $slot }}
</{{ $as ?? 'h3' }}>
