@props(['value'])

<label {{ $attributes->merge(['class' => 'text-primary']) }}>
    {{ $value ?? $slot }}
</label>
