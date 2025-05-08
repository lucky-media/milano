<button {{ $attributes }} @click="expanded = ! expanded">
    {{ $slot }}
    <div :class="{ 'rotate-180': expanded }" class="transition duration-300 ease-in-out ml-2">
        <div x-show="!expanded">
            {!! Statamic::tag('svg')->src('plus-bold')->class('shrink-0 text-primary-950 fill-current w-6 h-6') !!}
        </div>
        <div x-show="expanded" x-cloak>
            {!! Statamic::tag('svg')->src('minus-bold')->class('shrink-0 text-primary-950 fill-current w-6 h-6') !!}
        </div>
    </div>
</button>
