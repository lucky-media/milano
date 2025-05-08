@props([
    'color' => 'dark',
    'size' => 'md',
    'weight' => 'normal',
    'as' => 'p',
    'colors' => [
        'dark' => 'text-primary-950',
        'light' => 'text-primary-700',
        'white' => 'text-white',
        'black' => 'text-black',
    ],
    'sizes' => [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'base' => 'text-base',
        'md' => 'text-md',
        'lg' => 'text-lg',
        'xl' => 'text-xl',
    ],
    'weights' => [
        'extralight' => 'font-extralight',
        'light' => 'font-light',
        'normal' => 'font-normal',
        'medium' => 'font-medium',
        'semibold' => 'font-semibold',
        'bold' => 'font-bold',
    ],
])

@php
    $classes =  $colors[$color] . ' ' . $sizes[$size] . ' ' . $weights[$weight];
@endphp

<{{ $as }} {{ $attributes->twMerge(["class" => $classes]) }}>
{{ $slot }}
</{{ $as }}>
