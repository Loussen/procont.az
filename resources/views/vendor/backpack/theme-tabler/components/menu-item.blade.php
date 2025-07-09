@props(['badge' => null])

<li class="nav-item">
    <a {{ $attributes->merge(['class' => 'nav-link', 'href' => $link]) }}>
        @if ($icon != null)
            <i class="nav-icon {{ $icon }} d-block d-lg-none d-xl-block"></i>
        @endif

        @if ($title != null)
            <span>
                {{ $title }}
            </span>
        @endif

            @if ($badge)
                <span class="badge bg-danger" style="margin-right: 60px; margin-top: 12px;">{{ $badge }}</span>
            @endif
    </a>
</li>
