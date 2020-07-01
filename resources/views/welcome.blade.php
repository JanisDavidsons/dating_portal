<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>

        @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

        *{
            margin: 0px;
            padding: 0px;
        }

        body{
            font-family: 'Exo', sans-serif;


                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        }


        .context {
            width: 100%;
            position: absolute;
            top:50vh;

        }

        .context h1{
            text-align: center;
            color: #fff;
            font-size: 50px;
        }


        .area{
            background: #4e54c8;
            background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
            width: 100%;
            height:100vh;


        }

        .circles{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li{
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1){
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2){
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3){
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4){
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5){
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6){
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7){
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8){
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9){
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10){
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }



        @keyframes animate {

            0%{
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100%{
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }

        /*html, body {*/
        /*    */
        /*    */
        /*    */
        /*    */
        /*    */
        /*    background-color: #aa1f1f;*/
        /*    color: #636b6f;*/
        /*    font-family: 'Nunito', sans-serif;*/
        /*    font-weight: 200;*/
        /*    height: 100vh;*/
        /*    margin: 0;*/
        /*}*/

        /*.full-height {*/
        /*    height: 100vh;*/
        /*}*/

        /*.flex-center {*/
        /*    align-items: center;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*}*/

        /*.position-ref {*/
        /*    position: relative;*/
        /*}*/

        /*.top-right {*/
        /*    position: absolute;*/
        /*    right: 10px;*/
        /*    top: 18px;*/
        /*}*/

        /*.content {*/
        /*    text-align: center;*/
        /*}*/

        /*.title {*/
        /*    font-size: 84px;*/
        /*}*/

        /*.links > a {*/
        /*    color: #636b6f;*/
        /*    padding: 0 25px;*/
        /*    font-size: 13px;*/
        /*    font-weight: 600;*/
        /*    letter-spacing: .1rem;*/
        /*    text-decoration: none;*/
        /*    text-transform: uppercase;*/
        /*}*/

        /*.m-b-md {*/
        /*    margin-bottom: 30px;*/
        /*}*/
    </style>
</head>
<body>
<div class="flex-center position-ref full-height area">

    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('profiles.show') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Welcome to Tinder
        </div>

        <div class="links">

        </div>
    </div>
</div>
</body>
</html>
