<li class="nav-item">
    <a href="" class="nav-link active">
        <i {{ $attributes->merge(['class' => 'nav-icon fas fa-tachometer-alt']) }}></i>
        <p>
            {{ $slot }}
        </p>
    </a>
</li>
