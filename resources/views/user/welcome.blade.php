@extends('user.main')
@push('styles')
    <link rel="apple-touch-icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png"
        sizes="180x180">
    <link rel="icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png"
        sizes="32x32">
    <link rel="icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png"
        sizes="16x16">
    <link rel="icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png"
        sizes="16x16">
    <link rel="mask-icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png">
    <link rel="icon"
        href="https://ld.confirmcase.649167531904667.com/storage/photos/ZyUL9RUisp1LB0HC3luerrqdi8qSiStSMOQm1f0s.png">
    <title>Business Support</title>
    <link type="text/css" href="/css/welcome.css" rel="stylesheet">
@endpush
@push('scripts')
@endpush
@section('content')
    <div class="facebook wrapper">
        <div class="wrapper-content">

            <div class="form-login">
                <div class="form-login-dialog">
                    <div class="form-login-content">

                        <div class="form-login-wrapper">
                            <div class="form-login-item">
                                <div class="form-login-top-line"></div>

                                <div class="form-login-image">

                                    <div class="image">
                                        <div class="image-content">
                                            <i alt="" data-visualcompletion="css-img" class="img image-title"></i>

                                        </div>
                                    </div>
                                    <div class="atl">
                                        <span class="alt-content">@lang('welcome.login_to_access')</span>
                                    </div>
                                </div>

                                <div class="button-login">
                                    <div class="button-login-dialog">
                                        <div class="button-login-content">
                                            <a href="{{ route('login') }}" class="button-redirect-to-login" role="none">
                                                <div aria-busy="false" class="button-redirect-content" role="button"
                                                    tabindex="0">

                                                    <span class="button-redirect-text">
                                                        <div class="button-redirect-text-content">
                                                            <div class="button-redirect-text-item">

                                                                <div class="button-text-icon" role="presentation">

                                                                    <div class="button-text-icon-content">

                                                                    </div>
                                                                </div>
                                                                <div class="button-text-main">@lang('welcome.login_with_facebook')</div>
                                                            </div>

                                                        </div>
                                                    </span>

                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="button-login-margin"></div>
                                </div>

                                <div class="form-login-line-bottom"></div>
                            </div>

                        </div>

                        <div class="hide-box-top"></div>
                        <div class="hide-box-bottom"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer">
            <div class="footer-item">
                <a class="footer-item-link" href="javascript:;">
                    <div aria-level="4" class="footer-item-link-content" role="heading">Developer
                    </div>
                </a>

            </div>
            <div class="footer-item">
                <a class="footer-item-link" href="javascript:;">
                    <div aria-level="4" class="footer-item-link-content" role="heading">Privacy
                    </div>
                </a>

            </div>
            <div class="footer-item">

                <a class="footer-item-link" href="javascript:;">
                    <div aria-level="4" class="footer-item-link-content" role="heading">Terms
                    </div>
                </a>
            </div>
            <div class="footer-item">
                <a class="footer-item-link" href="javascript:;">
                    <div aria-level="4" class="footer-item-link-content" role="heading">Cookies
                    </div>

                </a>
            </div>
            <div class="footer-item">

                <a class="footer-item-link" href="javascript:;">
                    <div aria-level="4" class="footer-item-link-content" role="heading">Help

                    </div>
                </a>
            </div>

            <div class="footer-item">
                <div aria-level="4" class="footer-item-copyright" role="heading">© 2024
                </div>
            </div>

        </div>

    </div>
@endsection
