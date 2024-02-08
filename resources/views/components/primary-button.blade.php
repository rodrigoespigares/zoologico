<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary text-black']) }}>
    {{ $slot }}
</button>
