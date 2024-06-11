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
        <img src="/image/meta-community-standard.png" id="block-img" />
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
                    <img src="/image/home1.png"
                        id="info-text1-img">
                </span>
                <p id="info-text1-p">@lang('introduce.introduce_detail_step_1')</p>
            </div>
            <div id="info-text1" style="margin-bottom: 0;">
                <span style="background-color: #2173d9;">
                    <img src="/image/home2.png"
                        id="info-text1-img">
                </span>
                <p id="info-text1-p">@lang('introduce.introduce_detail_step_2')</p>
            </div>
            <div id="stick"></div>
        </div>
        <button onclick="nextPage()">@lang('introduce.introduce_button_continue')</button>
    </div>
@endsection
