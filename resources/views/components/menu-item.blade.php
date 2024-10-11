@php
    $active = $isActive();
    $hasSubmenu = $hasSubmenu;
    $classes = 'menu-item';
    if ($active) {
        $classes .= ' active open';
    }
@endphp

<li class="{{ $classes }}">
    <a href="{{ $route !== '#' ? route($route) : 'javascript:void(0);' }}"
        class="menu-link {{ $hasSubmenu ? 'menu-toggle' : '' }}">
        <i class="menu-icon tf-icons {{ $icon }}"></i>
        <div data-i18n="{{ $label }}">{{ __($label) }}</div>
    </a>
    @if ($hasSubmenu)
        <ul class="menu-sub">
            @foreach ($submenu as $sub)
                <x-menu-item :route="$sub['route'] ?? '#'" :icon="$sub['icon'] ?? 'bx bx-circle'" :label="$sub['label']" :activeRoutes="$sub['activeRoutes'] ?? []"
                    :submenu="$sub['submenu'] ?? null" />
            @endforeach
        </ul>
    @endif
</li>
