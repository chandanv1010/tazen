@extends('frontend.homepage.layout')

@section('content')
    <div id="prd-catalogue" class="page-body">
        <div class="cat-hero-section" style="background-image: url('/vendor/frontend/img/project/breadcrumb.png');">
            <div class="cat-hero-overlay"></div>
            <div class="cat-hero-shapes">
                <div class="shape shape-left"></div>
                <div class="shape shape-right"></div>
            </div>
            <div class="uk-container uk-container-center cat-hero-container">
                <h1 class="cat-hero-title">{{ $productCatalogue->name }}</h1>
                <ul class="uk-list uk-clearfix uk-flex uk-flex-middle uk-flex-center cat-hero-breadcrumbs">
                    <li><a href="/">Trang chủ</a></li>
                    @if(!is_null($breadcrumb))
                        @foreach($breadcrumb as $key => $val)
                            @php
                                $name = $val->languages->first()->pivot->name;
                                $canonical = write_url($val->languages->first()->pivot->canonical, true, true);
                            @endphp
                            <li class="separator">&raquo;</li>
                            <li><a href="{{ $canonical }}">{{ $name }}</a></li>
                        @endforeach
                    @endif
                </ul>
                @if(!empty($productCatalogue->description))
                    <div class="cat-hero-desc" style="font-size: 17px;">
                        {!! $productCatalogue->description !!}
                    </div>
                @endif
            </div>
        </div>

        <div class="uk-container uk-container-center uk-container uk-margin-large-top">
            <div class="prd-catalogue-wrapper">
                <div class="uk-grid uk-grid-large">
                    <div class="uk-width-large-1-4">
                    <div class="sidebar-filter uk-panel" id="sticky-sidebar">
                            <!-- Hidden product catalogue ID for AJAX filter -->
                            <input type="hidden" class="product_catalogue_id" value="{{ $productCatalogue->id }}">
                            <!-- Search -->
                            <div class="filter-block filter-search uk-margin-bottom">
                                <h4 class="filter-heading">TÌM KIẾM</h4>
                                <div class="uk-form-icon">
                                    <i class="uk-icon-search"></i>
                                    <input type="text" class="uk-form-small uk-width-1-1"
                                        placeholder="Nhập tên sản phẩm...">
                                </div>
                            </div>
                            <div class="filter-section">

                                <h3 class="filter-heading">DANH MỤC SẢN PHẨM</h3>

                                @include('frontend.product.catalogue.component.product-catalogue-tree', [
                                    'items' => $productCatalogues,
                                ])


                                @if (isset($filters) && count($filters))
                                    @foreach ($filters as $filter)
                                        @php
                                            $catName = $filter->languages->first()->pivot->name;
                                            $catId = $filter->id;
                                        @endphp
                                        <!-- REGION -->
                                        <h3 class="filter-heading">{{ $catName }}</h3>
                                        @if (isset($filter->attributes))
                                            <ul class="uk-nav filter-list">
                                                @foreach ($filter->attributes as $attribute)
                                                    @php
                                                        $name = $attribute->languages->first()->pivot->name;
                                                        $id = $attribute->id;
                                                        $count = $attribute->product_variants->count();
                                                    @endphp
                                                    <li><label><input value="{{ $id }}"
                                                                class="filtering filterAttribute"
                                                                data-group="{{ $catId }}" type="checkbox">
                                                            {{ $name }} <span
                                                                class="count">({{ $count }})</span></label></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                @endif

                            </div>

                        </div>
                    </div>
                    <div class="uk-width-large-3-4">
                        <div class="prd-catalogue">
                            <div class="prd-grid-header uk-flex uk-flex-middle uk-flex-space-between uk-margin-bottom">
                                <div class="results-count">Hiển thị <span class="count-num">{{ $products->total() }}</span> kết quả</div>
                                <div class="prd-sort">
                                    <select class="sort-select" name="sortType" id="sortType">
                                        <option value="">Sắp xếp</option>
                                        <option value="price-asc">Giá tăng dần</option>
                                        <option value="price-desc">Giá giảm dần</option>
                                        <option value="name-asc">Tên A-Z</option>
                                        <option value="name-desc">Tên Z-A</option>
                                    </select>
                                </div>
                            </div>

                            <div class="product-list">
                                @if (!is_null($products) && count($products))
                                    <ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-1-1 uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3">
                                        @foreach ($products as $keyPost => $valPost)
                                            @php
                                                $title = $valPost->languages->first()->pivot->name;
                                                $canonical = write_url($valPost->languages->first()->pivot->canonical);
                                                $image = $valPost->image;
                                            @endphp

                                            <li class="uk-margin-bottom">
                                                <div class="premium-product-card">
                                                    <a href="{{ $canonical }}" class="card-image-link img-scaledown img-zoomin">
                                                        <img src="{{ $image }}" alt="{{ $title }}" class="card-image">
                                                    </a>
                                                    <div class="card-overlay">
                                                        <div class="card-info-left">
                                                            <span class="card-category">{{ $productCatalogue->name }}</span>
                                                            <h3 class="card-title">
                                                                <a href="{{ $canonical }}" title="{{ $title }}">{{ $title }}</a>
                                                            </h3>
                                                            <div class="card-price">
                                                                Giá: <span class="price-val">Liên hệ</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-action-right">
                                                            <a href="{{ $canonical }}" class="btn-contact">
                                                                Liên hệ <span class="arrow">&rarr;</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="no-products uk-text-center uk-margin-large-top uk-margin-large-bottom">
                                        <p>Không tìm thấy sản phẩm nào trong danh mục này.</p>
                                    </div>
                                @endif
                            </div>

                            <div class="uk-flex uk-flex-center">
                                @include('frontend.component.pagination', ['model' => $products])
                            </div>

                            @if(!empty($productCatalogue->content))
                                <div class="bottom-category-content uk-margin-large-top">
                                    <h2 class="bottom-content-title">Thông tin sản phẩm</h2>
                                    <div class="bottom-content-body">
                                        {!! $productCatalogue->content !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
