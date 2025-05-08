@props([
    'defaultValue' => 'false'
])

<div x-data="{ expanded: {{ $defaultValue }} }" role="region" {{ $attributes }}>
    {{ $slot }}
</div>
