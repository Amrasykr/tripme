<li>
    <a {{ $attributes->merge(['class' => 'inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md text-secondary hover:bg-second_white hover:text-tertiary']) }}>
        {{ $icon ?? '' }}
        <span>{{ $slot }}</span>
    </a>
</li>
