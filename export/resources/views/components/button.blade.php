@props([
    'variant' => 'primary',
    'size' => 'base',
    'as' => 'button',
    'url' => null,
    'icon' => null,
    'base' => [
        'group',
        'font-medium uppercase rounded-[64px]',
        'w-full inline-flex items-center justify-center',
        'transition ease-in-out duration-200'
    ],
    'variants' => [
        'primary' => 'bg-primary-950 text-white border-2 border-transparent hover:bg-transparent hover:backdrop-blur-md hover:border-primary-950 hover:text-primary-950',
        'outline' => 'bg-transparent backdrop-blur-md border-2 border-primary-950 text-primary-950 hover:bg-primary-950 hover:text-white',
        'outline-white' => 'bg-transparent backdrop-blur-md border-2 border-white text-white hover:bg-white hover:text-primary-950',
        'underline' => 'border-b border-primary-950 text-primary-950 rounded-none w-max',
    ],
    'sizes' => [
        'xs' => 'py-3 px-4',
        'sm' => 'px-2 py-1',
        'base' => 'px-4 py-3',
        'md' => 'py-5 px-8',
        'lg' => 'py-4 px-10',
    ],
    'icons' => [
        'primary' => 'text-primary-950 bg-white group-hover:bg-primary-950 group-hover:text-white',
        'outline' => 'text-white bg-primary-950 group-hover:bg-white group-hover:text-primary-950',
        'outline-white' => 'text-primary-950 bg-white group-hover:bg-primary-950 group-hover:text-white',
        'underline' => 'text-primary-950 bg-white group-hover:bg-primary-950 group-hover:text-white'
    ]
])

@php
    $classes = implode(' ', $base) . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

@if($url)
    <a href="{{ $url }}" {{ $attributes->twMerge(["class" => $classes]) }}>
        {{ $slot }}

        @if($icon)
            <div class="p-2 rounded-full ml-3 {{ $icons[$variant] }}">
                {!! Statamic::tag('svg')->src('top-right-arrow')->class('w-4 h-4 shrink-0 fill-current') !!}
            </div>
        @endif
    </a>
@else
    <{{ $as }} {{ $attributes->twMerge(["class" => $classes]) }}>
        {{ $slot }}

        @if($icon)
            <div class="p-2 rounded-full ml-3 {{ $icons[$variant] }}">
                {!! Statamic::tag('svg')->src('top-right-arrow')->class('w-4 h-4 shrink-0 fill-current') !!}
            </div>
        @endif
    </{{ $as }}>
@endif
