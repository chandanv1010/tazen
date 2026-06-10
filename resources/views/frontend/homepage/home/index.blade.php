@extends('frontend.homepage.layout')
@section('content')
    @include('frontend.component.slide')
    <div class="panel-commit">
        <div class="uk-container uk-container-center">
            @php
                $commit = $widgets['commit'] ?? null;
            @endphp
            @if(isset($commit->object) && !is_null($commit->object) && count($commit->object))
            <div class="uk-grid uk-grid-medium">
                @foreach($commit->object as $key => $val)
                @php
                    $name = $val->languages->name;
                    $image = $val->image;
                    $description = $val->languages->description;
                @endphp
                <div class="uk-width-1-1 uk-width-small-1-2 uk-width-medium-1-3">
                    <div class="commit-item">
                        <div class="icon">
                            <img src="{{ $image }}" alt="{{ $name }}">
                        </div>
                        <div class="info">
                            <div class="title">{{ $name }}</div>
                            <div class="description">
                                {!! $description !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div><!-- .commit -->
    @php
        $intro = $widgets['about-us'] ?? null;
        $name = strip_tags($intro->description[1]);
    @endphp
    @if(isset($intro->object) && !is_null($intro->object)  && count($intro->object))
    @foreach($intro->object as $key => $val)
    @php
        // dd($val);
        $catName = $val->languages->name;
        $description = $val->languages->description;
        $content = $val->languages->content;
        $canonical = write_url($val->languages->canonical);
        $image = $val->image;
    @endphp
    <div class="panel-intro">
        <div class="uk-container uk-container-center">
            <div class="panel-body">
                <div class="panel-intro__image">
                    <span class="image img"><img src="{{ $image }}" alt="{{ $name }}"></span>
                </div>
                <div class="panel-intro__info">
                    <div class="category-name">{{ $catName }}</div>
                    <div class="name"><span>Chào mừng bạn đến với</span><img src="/vendor/frontend/img/project/tazen.png" alt="TAZEN"></div>
                    <div class="description">{!! $description !!}</div>
                    <div class="content">{!! $content !!}</div>
                    <x-button-hotline 
                        name="Xem thêm" 
                        class="button-style-2" 
                        number="{{ $system['contact_hotline'] }}" 
                        canonical="{{ $canonical }}"
                    />
                </div> 
                
            </div>
        </div>
    </div>
    @endforeach
    @endif

     @php
        $marquee = $menu['marquee']
    @endphp
    @if(isset($marquee) && !is_null($marquee) && count($marquee))
    <div class="panel-marquee">
        <div class="marquee__inner">
            <!-- group 1 (thực tế) -->
            <div class="marquee__group">
                @foreach($marquee as $key => $val)
                @php
                    $name = $val['item']->languages->first()->pivot->name;
                    $canonical = write_url($val['item']->languages->first()->pivot->canonical);
                @endphp
                <a class="marquee__item" href="{{ $canonical }}"><i class="fa fa-diamond marquee-icon"></i>{{ $name }}</a>
                @endforeach
            </div>

            <div class="marquee__group" aria-hidden="true">
                @foreach($marquee as $key => $val)
                @php
                    $name = $val['item']->languages->first()->pivot->name;
                    $canonical = write_url($val['item']->languages->first()->pivot->canonical);
                @endphp
                <a class="marquee__item" href="{{ $canonical }}"><i class="fa fa-diamond marquee-icon"></i>{{ $name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @php
        $solutionWidget = $widgets['solution'] ?? null;
        $solutionCat = (isset($solutionWidget->object) && $solutionWidget->object->isNotEmpty()) ? $solutionWidget->object->first() : null;
        $solutionPosts = $solutionCat ? $solutionCat->posts : collect();
    @endphp

    @if($solutionPosts->isNotEmpty())
    <div class="panel-solution">
        <div class="uk-container uk-container-center">
            @php
                $widgetTitle = $solutionWidget->name ?? 'Một cánh cửa mở ra một hành trình ấn tượng';
                $widgetDesc = $solutionWidget->description[$config['language']] ?? ($solutionWidget->description[1] ?? 'Sứ mệnh tạo nên giá trị bền vững và tinh thần trách nhiệm từ tinh hoa công nghệ Nhật Bản, Thanh nhôm MAXPRO.JP hướng đến những giá trị vượt ra ngoài giới hạn của trải nghiệm vận hành');
            @endphp
            <div class="solution-header uk-text-center">
                <h2 class="solution-title">{{ $widgetTitle }}</h2>
                <p class="solution-subtitle">{!! $widgetDesc !!}</p>
            </div>
            
            <div class="solution-tabs-wrapper uk-text-center">
                <ul class="solution-tabs">
                    @foreach($solutionPosts as $index => $post)
                        @php
                            $lang = $post->languages->first();
                        @endphp
                        <li class="solution-tab-item @if($index === 0) active @endif" data-slide-index="{{ $index }}">
                            <span>{{ $lang->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="solution-slider-container">
            <div class="solution-slides-wrapper">
                @foreach($solutionPosts as $index => $post)
                    @php
                        $lang = $post->languages->first();
                    @endphp
                    <div class="solution-slide @if($index === 0) active @endif" data-slide-index="{{ $index }}" style="background-image: url('{{ $post->image }}?v={{ time() }}')">
                        <div class="uk-container uk-container-center solution-slide-inner">
                            <div class="solution-card-overlay">
                                <h3 class="solution-card-title">{{ $lang->description }}</h3>
                                <p class="solution-card-text">{{ $lang->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.solution-tab-item');
            const slides = document.querySelectorAll('.solution-slide');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetIndex = this.getAttribute('data-slide-index');
                    
                    // Update active tab
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update active slide
                    slides.forEach(slide => {
                        if (slide.getAttribute('data-slide-index') === targetIndex) {
                            slide.classList.add('active');
                        } else {
                            slide.classList.remove('active');
                        }
                    });
                });
            });
        });
    </script>
    @endif

    @php
        $productWidget = $widgets['solution-product'] ?? null;
        $productCat = (isset($productWidget->object) && $productWidget->object->isNotEmpty()) ? $productWidget->object->first() : null;
        $productChildren = $productCat ? collect($productCat->childrens) : collect();
    @endphp

    @if($productCat && $productChildren->isNotEmpty())
    <div class="panel-product-slider">
        <div class="uk-container uk-container-center">
            <div class="product-slider-grid">
                <div class="product-left-content">
                    <span class="tag">{{ $productWidget->description[$config['language']] ?? ($productWidget->description[1] ?? 'Dịch vụ của chúng tôi') }}</span>
                    <h2 class="title">{{ $productCat->languages->name }}</h2>
                    <div class="description">
                        {!! $productCat->languages->description !!}
                    </div>
                    <div class="navigation-controls">
                        <button class="nav-btn prev-btn"><i class="fa fa-angle-left"></i></button>
                        <button class="nav-btn next-btn"><i class="fa fa-angle-right"></i></button>
                    </div>
                    <div class="action-btn-wrapper">
                        <a href="{{ write_url($productCat->languages->canonical) }}" class="btn-xem-san-pham">
                            <span>Xem Sản phẩm</span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="product-right-slider">
                    <div class="swiper-container product-swiper">
                        <div class="swiper-wrapper">
                            @foreach($productChildren as $idx => $child)
                                <div class="swiper-slide product-slide-item">
                                    <a href="{{ write_url($child->languages->canonical) }}" class="product-card">
                                        <div class="card-image">
                                            <img src="{{ $child->image }}" alt="{{ $child->languages->name }}">
                                        </div>
                                        <div class="card-footer">
                                            <span class="card-title">{{ $child->languages->name }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productSwiper = new Swiper('.product-swiper', {
                slidesPerView: 3,
                spaceBetween: 15,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.next-btn',
                    prevEl: '.prev-btn',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 15
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 15
                    },
                    960: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });
        });
    </script>
    @endif

    @php
        $projectWidget = $widgets['featured-project'] ?? null;
        $projectCat = (isset($projectWidget->object) && $projectWidget->object->isNotEmpty()) ? $projectWidget->object->first() : null;
        $projectPosts = $projectCat ? $projectCat->posts : collect();
    @endphp

    @if($projectCat && $projectPosts->isNotEmpty())
    <div class="panel-featured-projects">
        <div class="uk-container uk-container-center">
            <div class="project-header">
                <span class="tag">{{ $projectWidget->description[$config['language']] ?? ($projectWidget->description[1] ?? 'Tiêu biểu của chúng tôi') }}</span>
                <h2 class="title">{{ $projectCat->languages->name }}</h2>
            </div>
        </div>
        <div class="swiper-container project-swiper">
            <div class="swiper-wrapper">
                @foreach($projectPosts as $post)
                    @php
                        $lang = $post->languages->first();
                    @endphp
                    <div class="swiper-slide project-slide-item">
                        <div class="project-card">
                            <a href="{{ write_url($lang->canonical) }}" class="card-image">
                                <img src="{{ $post->image }}" alt="{{ $lang->name }}">
                            </a>
                            <div class="card-body">
                                <div class="project-info-list">
                                    {!! $lang->description !!}
                                </div>
                                <a href="{{ write_url($lang->canonical) }}" class="btn-xem-them">XEM THÊM</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var projectSwiper = new Swiper('.project-swiper', {
                slidesPerView: 4,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1.2,
                        spaceBetween: 0
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 0
                    },
                    960: {
                        slidesPerView: 3,
                        spaceBetween: 0
                    },
                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 0
                    }
                }
            });
        });
    </script>
    @endif

    @php
        $partnerKeyword = App\Enums\SlideEnum::PARTNER;
        $partnerItems = $slides[$partnerKeyword]['item'] ?? [];
    @endphp

    @if(!empty($partnerItems))
    <div class="panel-partner">
        <div class="uk-container uk-container-center">
            <div class="partner-header uk-flex uk-flex-middle uk-flex-between">
                <h2 class="partner-title">KHÁCH HÀNG CỦA CHÚNG TÔI</h2>
                <p class="partner-description">
                    Tazen chuyên cung cấp lavabo, vòi sen và thiết bị phòng tắm hiện đại, bền đẹp, phù hợp cho nhà ở, căn hộ, khách sạn và công trình.
                </p>
            </div>
            
            <div class="swiper-container partner-swiper">
                <div class="swiper-wrapper">
                    @foreach($partnerItems as $item)
                        <div class="swiper-slide partner-slide-item">
                            <div class="partner-logo-card">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] ?? 'Partner' }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var partnerSwiper = new Swiper('.partner-swiper', {
                slidesPerView: 6,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 15
                    },
                    640: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    960: {
                        slidesPerView: 4,
                        spaceBetween: 25
                    },
                    1200: {
                        slidesPerView: 6,
                        spaceBetween: 30
                    }
                }
            });
        });
    </script>
    @endif

    @php
        $newsWidget = $widgets['homepage-news'] ?? null;
        $newsCat = (isset($newsWidget->object) && $newsWidget->object->isNotEmpty()) ? $newsWidget->object->first() : null;
        $newsPosts = $newsCat ? $newsCat->posts : collect();
        $featuredNews = $newsPosts->first();
        $listNews = $newsPosts->skip(1)->take(4);

        $videoWidget = $widgets['homepage-video'] ?? null;
        $videoCat = (isset($videoWidget->object) && $videoWidget->object->isNotEmpty()) ? $videoWidget->object->first() : null;
        $videoPosts = $videoCat ? $videoCat->posts : collect();
        $firstVideo = $videoPosts->first();
    @endphp

    @if($newsCat && $newsPosts->isNotEmpty() && $videoCat && $videoPosts->isNotEmpty())
    <div class="panel-news-video">
        <div class="uk-container uk-container-center">
            <div class="section-header uk-text-center">
                <h2 class="section-title">TIN TỨC NỔI BẬT</h2>
            </div>
            
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <!-- 1. Featured News (Left Column) -->
                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                    @if($featuredNews)
                        @php
                            $featuredLang = $featuredNews->languages->first();
                            $featuredDate = \Carbon\Carbon::parse($featuredNews->created_at)->format('d-m-y H:i');
                        @endphp
                        <a href="{{ write_url($featuredLang->canonical) }}" class="featured-news-card">
                            <div class="card-image">
                                <img src="{{ $featuredNews->image }}" alt="{{ $featuredLang->name }}">
                            </div>
                            <div class="card-date">
                                <span class="dot"></span>
                                {{ $featuredDate }}
                            </div>
                            <h3 class="card-title">{{ $featuredLang->name }}</h3>
                            <p class="card-desc">{{ $featuredLang->description }}</p>
                        </a>
                    @endif
                </div>

                <!-- 2. News List (Middle Column) -->
                <div class="uk-width-large-1-3 uk-width-medium-1-2">
                    <div class="news-list-wrapper">
                        @foreach($listNews as $post)
                            @php
                                $lang = $post->languages->first();
                                $postDate = \Carbon\Carbon::parse($post->created_at)->format('d-m-y H:i');
                            @endphp
                            <a href="{{ write_url($lang->canonical) }}" class="news-list-item">
                                <div class="item-thumb">
                                    <img src="{{ $post->image }}" alt="{{ $lang->name }}">
                                </div>
                                <div class="item-content">
                                    <h4 class="item-title">{{ $lang->name }}</h4>
                                    <div class="item-meta">
                                        <span class="item-date">
                                            <span class="dot"></span>
                                            {{ $postDate }}
                                        </span>
                                        <span class="btn-readmore">Đọc tiếp</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Video Column (Right Column) -->
                <div class="uk-width-large-1-3 uk-width-1-1">
                    @if($firstVideo)
                        <div class="video-gallery-wrapper">
                            <!-- Main Video Player -->
                            <div class="video-iframe-container" id="mainVideoPlayerContainer">
                                {!! $firstVideo->video !!}
                            </div>

                            <!-- Clickable Video Text List -->
                            <div class="video-text-list">
                                @foreach($videoPosts as $index => $post)
                                    @php
                                        $lang = $post->languages->first();
                                    @endphp
                                    <div class="video-text-item @if($index === 0) active @endif" 
                                         data-video-code="{{ $post->video }}">
                                        <i class="fa fa-play-circle video-icon"></i>
                                        <span class="video-title">{{ $lang->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Switcher -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoItems = document.querySelectorAll('.video-text-item');
            const playerContainer = document.getElementById('mainVideoPlayerContainer');

            videoItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Avoid redundant work if already active
                    if (this.classList.contains('active')) return;

                    // Remove active from all items, add to clicked
                    videoItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');

                    const newCode = this.getAttribute('data-video-code');

                    // Smooth transition effect
                    playerContainer.classList.add('switching');

                    setTimeout(() => {
                        playerContainer.innerHTML = newCode;
                        
                        // Small delay to allow iframe source to load before removing fade
                        setTimeout(() => {
                            playerContainer.classList.remove('switching');
                        }, 150);
                    }, 200);
                });
            });
        });
    </script>
    @endif
@endsection
