@props([
    'required' => false,
    'multiple' => false,
    'base' => [
        'p-4 w-full rounded-full',
        'border border-primary-400',
        'border border-primary-400',
        'placeholder:text-sm placeholder:text-primary-700',
        'transition duration-200 ease-in-out',
        'focus:outline-hidden',
    ]
])

@php
    $classes = implode(' ', $base);
@endphp

<select {{ $attributes->twMerge(["class" => $classes]) }} {{ $required ? 'required' : '' }} {{ $multiple ? 'multiple' : '' }}>
    {{ $slot }}
</select>
