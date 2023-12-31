@foreach($mainMenu as $menuItem)
    @php
        $hasParent = !empty($prevMenu['children']) && in_array($menuItem['id'], array_column($prevMenu['children'], 'id'))
    @endphp
    @if(!$hasParent && !empty($menuItem['children']))
        <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">
            <a href="{{ app('renderRoute')($menuItem['value']) }}" class="main-menu__link">
                {!! $menuItem['name'] !!}
                <svg width="7px" height="5px">
                    <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />
                </svg>
            </a>
            <div class="main-menu__submenu">
                <ul class="menu">
                    @include('redparts::common.partials.menus.main-menu-items', ['mainMenu' => $menuItem['children'], 'isChildren' => true, 'prevMenu' => $menuItem])
                </ul>
            </div>
        </li>
    @else
        <li class="{{ ($isChildren ?? false) ? "menu__item" : "main-menu__item"}}">
            <a href="{{ app('renderRoute')($menuItem['value']) }}" class="{{ ($isChildren ?? false) ? "menu__link" : "main-menu__link"}}" target="{{ $menuItem['target'] }}">
                {!! $menuItem['name'] !!}
                @if(($isChildren ?? false) && !empty($menuItem['children']))
                    <span class="menu__arrow">
                                <svg width="6px" height="9px">
                                    <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />
                                </svg>
                            </span>
                @endif
            </a>
            @if(($isChildren ?? false) && !empty($menuItem['children']))
                <div class="menu__submenu">
                    <ul class="menu">
                        @include('redparts::common.partials.menus.main-menu-items', ['mainMenu' => $menuItem['children'], 'isChildren' => true, 'prevMenu' => $menuItem])
                    </ul>
                </div>
            @endif
        </li>
    @endif
@endforeach