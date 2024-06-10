@push('icons')
    <link rel="apple-touch-icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="16x16">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}" sizes="16x16">
    <link rel="mask-icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}">
    <link rel="icon" href="{{ asset('assets/img/language-svgrepo-com.svg') }}">
@endpush
@push('styles')
    <link rel="stylesheet" href="/css/index.css">
    <title>Account</title>
@endpush
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date();
            var monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            var day = today.getDate();
            var monthIndex = today.getMonth();
            var year = today.getFullYear();
            var formattedDate = monthNames[monthIndex] + ' ' + day + ', ' + year;
            var date = document.getElementById('date');
            date.innerHTML = formattedDate;
        });

        function nextPage() {
            window.location.href = '/home';
            // document.getElementById('loading-gif').style.display = 'flex';
            // setTimeout(function () {
            // }, 4000);
        }

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
    </script>
@endpush
@extends('layouts.main')
@section('content')
    <header>
        <img src="" id="meta-img">
    </header>
    <div id="block">
        <img src="/image/index.jpg" id="block-img" />
        <h2 id="block-title">@lang('introduce.introduce_welcome')</h2>
        <p>@lang('introduce.introduce_notice')<b id="date">@lang('introduce.introduce_date')</b></p>
        <div class="info-text">
            <br>
            <b class="info-text">@lang('introduce.introduce_detail')</b>
            <br>
        </div>
        <div id="info-text">
            <div id="info-text1">
                <span>
                    <img src="data:image/png;base64,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"
                        id="info-text1-img">
                </span>
                <p id="info-text1-p">@lang('introduce.introduce_detail_step_1')</p>
            </div>
            <div id="info-text1" style="margin-bottom: 0;">
                <span style="background-color: #2173d9;">
                    <img src="data:image/png;base64,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"
                        id="info-text1-img">
                </span>
                <p id="info-text1-p">@lang('introduce.introduce_detail_step_2')</p>
            </div>
            <div id="stick"></div>
        </div>
        <button onclick="nextPage()">@lang('introduce.introduce_button_continue')</button>
    </div>
@endsection
