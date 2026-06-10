<footer class="footer">
    <div class="uk-container uk-container-center">
        <!-- 4 Columns Grid -->
        <div class="uk-grid uk-grid-large footer-grid" data-uk-grid-margin>
            <!-- Column 1 -->
            <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-1-1">
                <div class="footer-col brand-col">
                    <div class="footer-logo">
                        <a href="/" title="{{ $system['homepage_brand'] ?? 'Tazen' }}">
                            <img src="{{ $system['homepage_logo'] ?? '' }}" alt="{{ $system['homepage_brand'] ?? 'Tazen' }}">
                        </a>
                    </div>
                    <p class="brand-desc">
                        Tazen chuyên cung cấp lavabo, vòi sen và thiết bị phòng tắm hiện đại, bền đẹp, phù hợp cho nhà ở, căn hộ, khách sạn và công trình.
                    </p>
                    <ul class="contact-details uk-list" style="margin-bottom: 20px;">
                        <li class="address"><strong>Địa chỉ:</strong> {{ $system['contact_address'] ?? '55 Main Street, 2nd block Malborne,' }}</li>
                        <li class="email"><strong>Email:</strong> <a href="mailto:{{ $system['contact_email'] ?? 'info@example.com' }}">{{ $system['contact_email'] ?? 'info@example.com' }}</a></li>
                        <li class="phone"><strong>Hotline:</strong> <a href="tel:{{ $system['contact_hotline'] ?? '' }}">{{ $system['contact_hotline'] ?? '+000 (123) 88 99' }}</a></li>
                    </ul>
                    <div class="social-links">
                        <a href="{{ $system['contact_facebook'] ?? '#' }}" target="_blank" class="social-btn"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="social-btn"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="social-btn"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="social-btn"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <!-- Column 2 (Sản phẩm) -->
            <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-1-1">
                <div class="footer-col links-col">
                    <h3 class="col-title">Sản phẩm</h3>
                    <ul class="col-links uk-list">
                        <li><a href="{{ write_url('san-pham') }}">Lavabo đặt bàn</a></li>
                        <li><a href="{{ write_url('san-pham') }}">Lavabo âm bàn</a></li>
                        <li><a href="{{ write_url('san-pham') }}">Lavabo treo tường</a></li>
                        <li><a href="{{ write_url('voi-lavabo') }}">Vòi lavabo</a></li>
                        <li><a href="{{ write_url('cay-sen-tam') }}">Sen cây tắm đứng</a></li>
                    </ul>
                </div>
            </div>

            <!-- Column 3 (Về chúng tôi) -->
            <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-1-1">
                <div class="footer-col links-col">
                    <h3 class="col-title">Về chúng tôi</h3>
                    <ul class="col-links uk-list">
                        <li><a href="{{ write_url('ve-chung-toi') }}">Giới thiệu</a></li>
                        <li><a href="{{ write_url('san-pham') }}">Sản phẩm</a></li>
                        <li><a href="{{ write_url('du-an-tieu-bieu') }}">Dự án thực tế</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="{{ route('contact.index') }}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>

            <!-- Column 4 (Fanpage) -->
            <div class="uk-width-large-1-4 uk-width-medium-1-2 uk-width-1-1">
                <div class="footer-col fanpage-col">
                    <h3 class="col-title">Fanpage Facebook</h3>
                    <div class="facebook-fanpage-wrapper">
                        <div id="fb-fanpage-lazy" data-href="{{ $system['social_facebook'] ?? ($system['contact_facebook'] ?? 'https://www.facebook.com/facebook') }}">
                            <div class="fb-placeholder">
                                <i class="fa fa-facebook-square"></i> Facebook Fanpage
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text">
                        Copyright © 2026 tazen. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>

        <!-- Big centered logo at the bottom -->
        <div class="footer-bottom-brand">
            <span class="brand-char">T</span>
            <span class="brand-char">A</span>
            <span class="brand-char accent-z">
                <svg class="z-svg" viewBox="5 15 90 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="z-blue-part" d="M 75,15 L 95,15 L 25,85 L 95,85 L 95,99 L 5,99 L 5,85 L 75,15 Z" />
                    <path class="z-orange-part" d="M 5,15 L 63,15 L 49,29 L 5,29 Z" />
                </svg>
            </span>
            <span class="brand-char">E</span>
            <span class="brand-char">N</span>
        </div>
    </div>
</footer>

<div id="fb-root"></div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll reveal for brand characters
        const brandContainer = document.querySelector('.footer-bottom-brand');
        if (brandContainer) {
            if ('IntersectionObserver' in window) {
                const brandObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            brandContainer.classList.add('reveal-active');
                            setTimeout(() => {
                                brandContainer.classList.add('reveal-complete');
                            }, 1500);
                            brandObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.15
                });
                brandObserver.observe(brandContainer);
            } else {
                brandContainer.classList.add('reveal-active', 'reveal-complete');
            }
        }

        const fbContainer = document.getElementById('fb-fanpage-lazy');
        if (!fbContainer) return;

        // Lazy load Facebook Fanpage on viewport proximity
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        observer.unobserve(entry.target);
                        loadFacebookSDK();
                    }
                });
            }, {
                rootMargin: '200px 0px'
            });
            observer.observe(fbContainer);
        } else {
            loadFacebookSDK();
        }

        function loadFacebookSDK() {
            const href = fbContainer.getAttribute('data-href');
            fbContainer.innerHTML = `
                <div class="fb-page" 
                     data-href="${href}" 
                     data-tabs="" 
                     data-small-header="false" 
                     data-adapt-container-width="true" 
                     data-hide-cover="false" 
                     data-show-facepile="true">
                     <blockquote cite="${href}" class="fb-xfbml-parse-ignore">
                          <a href="${href}">Facebook</a>
                     </blockquote>
                </div>
            `;

            if (!document.getElementById('facebook-jssdk-lazy')) {
                const script = document.createElement('script');
                script.id = 'facebook-jssdk-lazy';
                script.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0';
                script.async = true;
                script.defer = true;
                script.crossOrigin = 'anonymous';
                document.body.appendChild(script);
            } else {
                if (window.FB) {
                    window.FB.XFBML.parse(fbContainer);
                }
            }
        }
    });
</script>

