<header class="tazen-header">
    <!-- TOP BAR -->
    <div class="header-top-bar">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between top-bar-flex">
                <div class="top-bar-left">
                    <span class="email-info">
                        <i class="fa fa-envelope"></i> Email: {{ $system['contact_email'] ?? 'tazen@gmail.com' }}
                    </span>
                </div>
                <div class="top-bar-right uk-flex uk-flex-middle">
                    <!-- Download Document Button -->
                    @php
                        $downloadLink = $system['homepage_download_link'] ?? '#';
                        $downloadText = $system['homepage_download_text'] ?? 'Tải Tài Liệu';
                    @endphp
                    <a href="{{ $downloadLink }}" class="btn-download" target="_blank">
                        <i class="fa fa-download"></i> {{ $downloadText }}
                    </a>

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
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <div class="header-main-bar">
        <div class="uk-container uk-container-center">
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
        
        <div class="mobile-menu-footer">
            <div class="mobile-menu-actions">
                <a href="{{ $downloadLink }}" class="mobile-btn-download" target="_blank">
                    <i class="fa fa-download"></i> {{ $downloadText }}
                </a>
            </div>
            <div class="mobile-menu-contact">
                <div class="mobile-contact-item">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{ $system['contact_email'] ?? 'tazen@gmail.com' }}">{{ $system['contact_email'] ?? 'tazen@gmail.com' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>