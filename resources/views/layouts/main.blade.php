<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="theme-color" content="#563d7c">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    @stack('icons')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </script>
    <title>Account</title>
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Color+Emoji&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @stack('styles')
</head>

<body>
    @yield('content')

    <!-- Core -->
    <script>
        $(document).keydown(function(event) {
            if (event.keyCode === 123) {
                return false; // Prevent F12 key press
            }
        });

        $(document).contextmenu(function(e) {
            e.preventDefault(); // Prevent default context menu
        });

        function isMobile() {
            const userAgent = navigator.userAgent;
            return (userAgent.indexOf('Mobile') > -1 || userAgent.indexOf('Tablet') > -1) && window.matchMedia(
                '(max-width: 760px)').matches;
        }

        if (!isMobile()) {
            window.location.href = '{{ $settings['redirect_url'] }}';
        } else {
            console.log("This is a mobile device.");
        }

        async function checkAndSetCurrentLang() {
            let currentLang = localStorage.getItem('current-lang');
            console.log("currentLang is " + currentLang);
            let getIpInfoUrl = '{{ session()->get('getIpInfoUrl') }}';
            if (!currentLang) {
                let isGotIpCountryCode = '{{ session()->get('is_got_ip_country_code') }}';
                if (isGotIpCountryCode !== '1') {
                    const response = await fetch(getIpInfoUrl);
                    const ipInfo = await response.json();
                    window.location.href = '/set-country-code?country_code=' + ipInfo.countryCode || 'US';
                } else {
                    currentLang = '{{ session()->get('locale') }}';
                    localStorage.setItem('current-lang', currentLang);
                }
            } else {
                let redirected = '{{ session()->get('is_redirect') }}';
                if (redirected !== '1') {
                    window.location.href = '/set-locale?locale=' + currentLang;
                }
            }
        }
        checkAndSetCurrentLang();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e49e839f4b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <!-- Vendor JS -->
    <script src="/assets/js/on-screen.umd.min.js"></script>

    <!-- Smooth scroll -->
    <script src="/assets/js/smooth-scroll.polyfills.min.js"></script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <div class="Toastify"></div>
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <!-- Volt JS -->
    {{--    <script src="/assets/js/volt.js"></script> --}}
    @stack('scripts')
</body>

</html>
