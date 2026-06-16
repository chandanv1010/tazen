<header class="tazen-header">
    @include('components.top-search')

    <!-- MAIN HEADER -->
    <div class="header-main-bar">
        <div class="uk-container uk-container-center header-container">
            <div class="uk-flex uk-flex-middle uk-flex-space-between main-bar-flex">
                <!-- Logo -->
                <div class="logo">
                    <a href="/" title="{{ $system['homepage_brand'] ?? 'Tazen' }}">
                        <img src="{{ $system['homepage_logo'] ?? '' }}" alt="{{ $system['homepage_brand'] ?? 'Tazen' }}">
                    </a>
                </div>

                <!-- Navigation Menu Desktop -->
                <nav class="desktop-navigation uk-visible-large">
                    <ul class="main-menu uk-flex uk-flex-middle uk-list uk-clearfix">
                        {!! $menu['main-menu'] ?? '' !!}
                    </ul>
                </nav>

                <!-- Header Utilities (Language, Hotline, Search) -->
                <div class="header-right uk-visible-large uk-flex uk-flex-middle">
                    <!-- Search Button -->
                    <div class="header-search-wrapper">
                        <a href="#" class="search-toggle open-search" title="Tìm kiếm">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                    
                    <!-- Hotline Button -->
                    <div class="header-hotline">
                        <a href="tel:{{ $system['contact_hotline'] ?? '' }}" class="hotline-link uk-flex uk-flex-middle">
                            <i class="fa fa-phone"></i>
                            <span class="hotline-num">{{ $system['contact_hotline'] ?? '' }}</span>
                        </a>
                    </div>

                    <!-- Language Switcher -->
                    @if(isset($languages) && count($languages))
                        <div class="language-dropdown-wrapper">
                            @php
                                $currentLocale = app()->getLocale();
                                $currentLangObj = $languages->where('canonical', $currentLocale)->first() ?? $languages->first();
                                $currentLangName = $currentLangObj ? strtoupper($currentLangObj->canonical) : 'VN';
                                $currentLangFlag = $currentLangObj ? image($currentLangObj->image) : '';
                            @endphp
                            <div class="current-language uk-flex uk-flex-middle">
                                @if($currentLangFlag)
                                    <img src="{{ $currentLangFlag }}" alt="{{ $currentLangName }}" class="flag-icon">
                                @endif
                                <span class="lang-text">{{ $currentLangName }}</span>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <ul class="language-list uk-list">
                                @foreach($languages as $language)
                                    @if($language->canonical !== $currentLocale)
                                        <li>
                                            <a href="{{ route('language.switch', $language->id) }}" class="uk-flex uk-flex-middle">
                                                <img src="{{ image($language->image) }}" alt="{{ $language->name }}" class="flag-icon">
                                                <span>{{ strtoupper($language->canonical) }}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- Mobile Menu Button -->
                <a class="mobile-menu-btn uk-hidden-large" href="#offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu Offcanvas -->
<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip mobile-menu-offcanvas">
        <button class="uk-offcanvas-close mobile-menu-close" type="button">
            <i class="fa fa-times"></i>
        </button>
        
        <div class="mobile-menu-header">
            <div class="mobile-menu-logo">
                <a href="/" title="Logo">
                    <img src="{{ $system['homepage_logo'] ?? '' }}" alt="Logo" />
                </a>
            </div>
        </div>

        <nav class="mobile-menu-nav">
            <ul class="uk-nav uk-nav-offcanvas mobile-menu-list">
                {!! $menu['main-menu'] ?? '' !!}
            </ul>
        </nav>
    </div>
</div>