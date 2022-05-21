<?php
    require_once(__DIR__.'/modules/facebook.module.php');
    require_once(__DIR__.'/modules/database.module.php');

    $status = Login_with_facebook::identity();

    if($status === 'unregister'){
        header('location: /register');
        exit();
    } elseif ($status === false) {
        header('location: /login');
        exit();
    }

    $db = new Database;
    $db->connect();

    $queryInfo = $db->conn->query("SELECT * FROM accounts WHERE acc_facebookid = '{$_SESSION['authentication']['facebook']['id']}'");
    
    $accountInfo = $queryInfo->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Binary Star | Homepage</title>
    <meta name="author" content="Codingtime" />
    <meta name="description" content="Website for IT KMITL" />
    <!-- <meta property="og:image" content=""> -->
    <meta
      property="og:description"
      content="IT KMITL Binary Star for freshy2021"
    />
    <meta property="og:title" content="IT Binary Star KMITL" />
    <meta name="twitter:title" content="IT Binary Star KMITL" />
    <link rel="stylesheet" href="css/tailwind.css" />
    <link href="css/main.css" />
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap"
      rel="stylesheet"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/toast.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&display=swap');
        @import url(https://fonts.googleapis.com/css?family=Montserrat);
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            height: 100vh;
        }
        * {
            font-family: 'Rajdhani', 'Kanit', cursive;
        }
        
        /* editprofile */
        input,
        textarea,
        select {
            transition: all .5s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border: none;
            /* box-shadow: 0 0 1px 1px #432DFF; */
            border-radius: 0.375rem;
            box-shadow: 0 0 0 .5px #352AFF, 0 0 0 1.5px #7B39FD;
        }

        select option {

            border: none;
            outline: none;
            /* background-color: red; */
        }

        /*form styles*/
        #msform {
            width: 700px;
            /* margin: 100px auto; */
            /* text-align: center; */
            position: relative;
            /* padding-top: 25px; */
            border-radius: 20px;
            /* border: solid 0.5px rgb(189, 189, 189); */
            background-color: white;
            display: flex;
            justify-content: center;
        }

        #msform fieldset {
            background: white;
            /*border: 0 none;*/
            /*border-radius: 3px;*/
            /* box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4); */
            padding: 10px 30px;
            box-sizing: border-box;
            width: 80%;
            /* margin: 0 10%; */
            position: relative;
            /* margin-top: 2rem; */

            /*stacking fieldsets above each other*/
        }

        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
            display: none;
        }

        /*inputs*/
        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
            color: #2C3E50;
            font-size: 18px;
        }

        /*buttons*/
        #msform .action-button {
            width: var(--width);
            background-color: #651fff;
            color: white;
            /* background: transparent; */
            /* color: #7846FF; */
            font-weight: bold;
            border: 1px solid #964FFE;
            border-radius: 0.375rem;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px;
            transition: all .5s;
        }

        #msform .action-button:hover {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #9851FE;
            /* background-color: #A259FF; */
        }

        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #352AFF;
            background-color: #352AFF;
        }

        /*headings*/
        .fs-title {
            font-size: 18px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        .fs-comment {
            font-weight: normal;
            font-size: 11px;
            color: #666;
            margin-bottom: 20px;
            user-select: none;
        }

        /*progressbar*/
        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            /*CSS counters to number the steps*/
            counter-reset: step;
        }

        #progressbar li {
            list-style-type: none;
            color: black;
            text-transform: uppercase;
            font-size: 12px;
            width: 33.33%;
            float: left;
            position: relative;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 20px;
            line-height: 20px;
            display: block;
            font-size: 14px;
            color: #333;
            background: rgb(255, 255, 255);
            border-radius: 3px;
            margin: 0 auto 5px auto;
        }

        /*progressbar connectors*/
        #progressbar li:after {
            content: '';
            width: 178px;
            height: 2px;
            background: linear-gradient(90deg, rgba(2, 0, 36, 0.3295693277310925) 0%, rgba(51, 43, 106, 0.21752450980392157) 16%);
            position: absolute;
            left: -50%;
            top: 9px;
            z-index: 1;
            /*put it behind the numbers*/
            transform: translateX(10px);
        }

        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }

        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active:before,
        #progressbar li.active:after {
            /*background: #27AE60;*/
            background: linear-gradient(to right bottom, #352AFF, #7B39FD, #A259FF);
            color: white;
        }

        #msform select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            /*font-family: montserrat;*/
            color: #2C3E50;
            font-size: 18px;
            height: 59px;
        }
        #universe {
            top: 0;
            z-index: 1000;
        }

        #orbit0 {
            animation-delay: 0s;
        }

        #pos0 {
            animation-delay: 0s;
        }

        #dot0 {
            animation-delay: 0s;
        }

        #orbit1 {
            animation-delay: -1s;
        }

        #pos1 {
            animation-delay: -1s;
        }

        #dot1 {
            animation-delay: -1s;
        }

        #orbit2 {
            animation-delay: -2s;
        }

        #pos2 {
            animation-delay: -2s;
        }

        #dot2 {
            animation-delay: -2s;
        }


        #galaxy {
            transform: rotateX(75deg);
            transform-style: preserve-3d;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .circle {
            border-radius: 50%;
            border: 1px solid #e41a4c;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            margin-left: -0.5em;
            -webkit-animation: spinner 1.5s infinite ease;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: rotateX(-75deg);
        }

        .circle2 {
            border-radius: 50%;
            border: 1px solid #da1cd0;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            margin-left: -0.5em;
            -webkit-animation: spinner2 2s infinite ease;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: rotateX(-75deg);
        }

        .circle3 {
            border-radius: 50%;
            border: 1px dotted #6617cb;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            margin-left: -0.5em;
            -webkit-animation: spinner3 2.5s infinite ease;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: rotateX(-75deg);
        }

        .orbit,
        #orbit0,
        #orbit1,
        #orbit2 {
            transform-style: preserve-3d;
            position: absolute;
            top: 50%;
            left: 50%;
            animation-name: orbit;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            width: 8em;
            height: 8em;
            margin-top: -4em;
            margin-left: -4em;
            border-radius: 50%;
        }

        .pos,
        #pos0,
        #pos1,
        #pos2 {
            position: absolute;
            width: 2em;
            height: 2em;
            margin-left: -1em;
            margin-top: -1em;
            animation-name: invert;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            left: 50%;
            top: -1px;
        }

        .dot,
        #dot0,
        #dot1 {
            background-color: #6617cb;
            width: 0.5em;
            height: 0.5em;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -0.25em;
            margin-left: -0.25em;
            border-radius: 50%;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        #dot2 {
            background-color: #ff04ea;
            width: 0.5em;
            height: 0.5em;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -0.25em;
            margin-left: -0.25em;
            border-radius: 50%;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        /* Planet animation durations */
        .orbit,
        #orbit0,
        #orbit1,
        #orbit2,
        .pos,
        #pos0,
        #pos1,
        #pos2 {
            animation-duration: 3s;
        }

        .circle {
            font-size: 6em;
        }

        .circle2 {
            font-size: 5em;
        }

        .circle3 {
            font-size: 4em;
        }

        .dot,
        #dot0,
        #dot1,
        #dot2 {
            font-size: 0.2em;
        }

        @keyframes orbit {
            0% {
                transform: rotateZ(0deg);
            }

            100% {
                transform: rotateZ(-360deg);
            }
        }

        @keyframes invert {
            0% {
                transform: rotateX(-90deg) rotateY(360deg) rotateZ(0deg);
            }

            100% {
                transform: rotateX(-90deg) rotateY(0deg) rotateZ(0deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: rotate3d(1, 0, 1, 0deg);
            }

            50% {
                -webkit-transform: rotate3d(1, 0, 1, 180deg);
            }

            100% {
                -webkit-transform: rotate3d(1, 0, 1, 360deg);
            }
        }

        @keyframes spinner2 {
            0% {
                -webkit-transform: rotate3d(0, 1, 1, 0deg);
            }

            50% {
                -webkit-transform: rotate3d(0, 1, 1, 180deg);
            }

            100% {
                -webkit-transform: rotate3d(0, 1, 1, 360deg);
            }
        }

        @keyframes spinner3 {
            0% {
                -webkit-transform: rotate3d(1, 1, 0, 0deg);
            }

            50% {
                -webkit-transform: rotate3d(1, 1, 0, 180deg);
            }

            100% {
                -webkit-transform: rotate3d(1, 1, 0, 360deg);
            }
        }

        .coner1 {
            width: 100%;
            transform: rotate(-45deg) scale(.5);
            position: absolute;
            top: -33rem;
            left: -44rem;
        }

        .coner2 {
            width: 100%;
            transform: rotate(-80deg) scale(.58);
            position: absolute;
            left: 47rem;
            bottom: -3rem;
        }

        .invalid-box {
            border: 1px solid red;
            background-color: transparent;
        }

        .error {
            position: relative;
            animation: shake .1s linear;
            animation-iteration-count: 3;
        }
        .modal-button {
	        background-color: #6617cb;
            background-image: linear-gradient(315deg, #6617cb 0%, #cb218e 74%);
            box-shadow: 0 0 0 0 #ec008c, 0rem 0.2rem 5px #6617cb;
            color: #FFFFFF;
            transition: 200ms;
        }
        .modal-button:hover {
            box-shadow: 0 0 0 0 #ec008c, 0rem 0.2rem 10px #6617cb;
            color: #FFFFFF;
        }
        .modal-button:focus {
            box-shadow: 0 0 0 0 #ec008c, 0rem 0rem 10px #6617cb;
            outline: none;
        }
        .positiontext{
            right: 0;   
        }
        @keyframes shake {
            0% {
                left: -5px;
            }

            100% {
                right: -5px;
            }
        }

        textarea.vertical {
	        resize: vertical;
	        max-height: 250px;
	        min-height: 60px;
        }
        .h-body{
            height: 100vh;
        }
        .w-textarea{
            width: 30rem;
        }

        @media only screen and (max-height: 768px){
            .positiontext{
                right: 0;   
            }
        }
        @media only screen and (max-height: 800px){
            .h-body{
                height: 130vh;
            }
        }
        @media only screen and (max-width: 1024px) {
            .fs-title {
                font-size: 18px;
                text-transform: uppercase;
                color: #2C3E50;
                margin-bottom: 10px;
            } 
        }
        @media only screen and (max-width: 640px) {
            .fs-title {
                font-size: 16px;
                text-transform: uppercase;
                color: #2C3E50;
                margin-bottom: 10px;
            }
            #msform fieldset {
                background: white;
                /*border: 0 none;*/
                /*border-radius: 3px;*/
                /* box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4); */
                padding: 10px 30px;
                box-sizing: border-box;
                width: 90%;
                /* margin: 0 10%; */
                position: relative;
                /* margin-top: 2rem; */

                /*stacking fieldsets above each other*/
            }
        @media only screen and (max-width: 335px) {
            .text-size{
                font-size: 0.7rem;
            }
            .text-size2{
                font-size: 0.7rem;
            }
        }
        }
        .nav-line{
            width: 26px;
            height: 3px;
            background: linear-gradient(#352AFF, #7B39FD, #A259FF);
        }
        nav .nava
        {
            position: relative;
            display: table-cell;
            text-align: center;
            color: #949494;
            text-decoration: none;
            font-family: 'Kanit', sans-serif;
            padding: 10px 20px;
            font-size: 16px;
            transition: 0.2s ease color;
        }

        nav .nava:before, nav .nava:after
        {
            content: "";
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            transition: 0.2s ease transform;
        }
        nav .nava:before
        {
            top: 0;
            left: 10px;
            width: 6px;
            height: 6px;
        }

        nav .nava:after
        {
            top: 5px;
            left: 18px;
            width: 4px;
            height: 4px
        }
        
        nav .nava:nth-child(1):before
        {
            background-color: purple;
        }

        nav .nava:nth-child(1):after
        {
            background-color: red;
        }

        nav .nava:nth-child(2):before
        {
            background-color: #00e2ff;
        }

        nav .nava:nth-child(2):after
        {
            background-color: #89ff00;
        }

        nav .nava:nth-child(3):before
        {
            background-color: purple;
        }

        nav .nava:nth-child(3):after
        {
            background-color: palevioletred;
        }
        #indicator
        {
            display: none;
            position: absolute;
            left: 5%;
            bottom: 0;
            width: 30px;
            height: 3px;
            background-color: #fff;
            border-radius: 5px;
            transition: 0.2s ease left;
        }
        nav .nava:hover:before, nav .nava:hover:after
        {
            transform: scale(1);
        }

        nav .nava:nth-child(1):hover ~ #indicator
        {
            display: inline;
            background: linear-gradient(130deg, yellow, red);
        }

        nav .nava:nth-child(2):hover ~ #indicator
        {
            display: inline;
            left: 55%;
            background: linear-gradient(130deg, #00e2ff, #89ff00);
        }

        nav .nava:nth-child(3):hover ~ #indicator
        {
            display: inline;
            left: 72%;
            background: linear-gradient(130deg, purple, palevioletred);
        }
    </style>
</head>
<body class="h-body">
    <div id='universe' class="w-full h-full bg-white fixed">
        <div id='galaxy'>
            <div class='circle'></div>
            <div class='circle2'></div>
            <div class='circle3'></div>
            <div id='orbit0'>
            <div id='pos0'>
                <div id='dot0'></div>
            </div>
            </div>
            <div id='orbit1'>
            <div id='pos1'>
                <div id='dot1'></div>
            </div>
            </div>
            <div id='orbit2'>
            <div id='pos2'>
                <div id='dot2'></div>
            </div>
            </div>
            <div id='orbit3'>
            <div id='pos3'>
                <div id='dot3'></div>
            </div>
            </div>
        </div>
    </div>
    <div id="toast" class="toast"></div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-3xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-24 border-b-2 border-gray-100">
            <div class="p-7 flex flex-row items-center justify-between">
                <a href="index"
                    class="text-2xl font-semibold tracking-widest text-purple-700 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"
                    style="font-family: 'Audiowide', cursive;">
                    ITBSTAR
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}"
                class="text-center flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a href="index" class="hover:text-purple-500 md:hidden">หน้าหลัก</a>
                <!-- <a href="dumb" class="hover:text-purple-500 md:hidden">กล่องคำใบ้</a> -->
                <a href="help" class="hover:text-purple-500 md:hidden">ช่วยเหลือ</a>
                <div class="relative hidden md:flex">
                    <a href="index" class="nava hover:text-purple-500">หน้าหลัก</a>
                    <!-- <a href="dumb" class="nava hover:text-purple-500">กล่องคำใบ้</a> -->
                    <a href="help" class="nava hover:text-purple-500">ช่วยเหลือ</a>
                    <div id="indicator"></div>
                </div>
                <!-- <div class="flex justify-center ml-3">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative mr-4 z-10 block rounded-md bg-white p-1 focus:outline-none" id="svg-dropdown">
                            <svg class="h-5 w-5 text-gray-800 relative" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="margin-top: 0.45rem;"
                                fill="#FCCA2D">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen"
                            class="absolute positiontext mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
                            style="width:20rem;">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                            class="font-bold text-blue-500" href="#">Upload Image</span> artical . 2m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                                            class="font-bold text-blue-500" href="#">Test with TDD</span> artical . 1h
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                    </p>
                                </a>
                            </div>
                            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all
                                notifications</a>
                        </div>
                    </div>
                </div> -->
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-left bg-transparent dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-white focus:outline-none focus:shadow-outline bg-purple rounded-lg transition duration-500 ease-in-out modal-button">
                            <span class="text-md text-white"><?php echo $_SESSION['authentication']['first_name'].' '.$_SESSION['authentication']['last_name'][0].'.'; ?></span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-md bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="edit">แก้ไขข้อมูลส่วนตัว</a>
                                <a class="block px-4 py-2 mt-2 text-md bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="logout">ออกจากระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
      <div style="font-weight: 500;" class="text-center py-4 text-black text-2xl mt-4 kanit select-none w-full flex justify-center items-center">
        แก้ไขข้อมูลส่วนตัว
    </div>
    <div class="w-full flex justify-center it h-4/6">
        <form id="msform">
            <fieldset class="h-full w-96">
                <div class="w-full">
                    <h2 class="fs-title select-none" style="text-align: left;">เขียนคำอธิบายตัวเอง</h2>
                </div>
                <textarea name="inputBio" class="textarea-box1 vertical" cols="30" rows="3" maxlength="150"><?php echo $accountInfo->acc_bio; ?></textarea>
                <h3 class="fs-comment length-text" style="text-align: left;">0/150 ตัวอักษร</h3>
                <h2 class="fs-title select-none hashtag" style="text-align: left;">เขียนแท็กที่สนใจเพิ่มเติม</h2>
                <input name="inputHashtags" id="basic" value='<?php 
                    $hashtags = [];
                    foreach(json_decode($accountInfo->acc_other_hashtags) as $value){
                        $hashtags[] = ['value' => $value];
                    }
                    echo json_encode($hashtags);
                ?>'>
                <h2 class="fs-title select-none mt-3" style="text-align: left;">ช่องทางติดต่อ</h2>
                <input type="text" name="inputLine" placeholder="line Id" value="<?php echo $accountInfo->acc_sn_line; ?>"/>
                <input type="url" name="inputFacebook" placeholder="Facebook Url" value="<?php echo $accountInfo->acc_sn_facebook; ?>"/>
                <input type="text" name="inputInstagram" placeholder="Instagram Name" value="<?php echo $accountInfo->acc_sn_instagram; ?>"/>
                <input type="submit" name="next" class="next action-button" style="--width:205px;" value="บันทึก" />
            </fieldset>
        </form>
        <script>
            console.log($('#basic').val());
            $('#basic').change(function(){
                console.log($(this).val());
            })
        </script>
    </div>
    <script src="/js/toast.js"></script>
    <script>
        var input = document.querySelector('input[id=basic]');
        var txt = document.querySelector('.textarea-box1');
        
        document.querySelector('.length-text').innerHTML = "<?php echo strlen($accountInfo->acc_bio); ?>/150 ตัวอักษร"

        txt.addEventListener('input', function() {
            document.querySelector('.length-text').innerHTML = txt.value.length + "/150 ตัวอักษร";
        });

        var tag = new Tagify(input, {
            dropdown: {
                position: "input",
                maxItems:100,
                enabled: 0
            }
        })

        $('#msform').submit(function(e){
            e.preventDefault();
            var bio = $('textarea[name=inputBio]').val();
            var raw_hashtags = $('input[name=inputHashtags]').val();
            var line = $('input[name=inputLine]').val();
            var facebook = $('input[name=inputFacebook]').val();
            var instagram = $('input[name=inputInstagram]').val();

            var hashtags = [];

            if (raw_hashtags != '') {
				var convertHashtags = JSON.parse(raw_hashtags);
			} else {
				var convertHashtags = [];
			}

            for(let i in convertHashtags){
				 hashtags.push(convertHashtags[i].value);
			}

            hashtags = JSON.stringify(hashtags);

            if(bio === '' || hashtags === '') {
                console.log('Bed request');
            } else {
                $.ajax({
                    url: '/api/update',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        bio: bio,
                        hashtags: hashtags,
                        line: line,
                        facebook: facebook,
                        instagram: instagram
                    },
                    beforeSend: function(){
                        console.log('Prepare to sending...');
                    },
                    success: function(res){
                        toast("แก้ไขข้อมูลสำเร็จ", "ข้อมูลได้รับการแก้ไขเรียบร้อยแล้ว", "#008f5d");
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
            }
        });
        $("document").ready(function(){
            $("#universe").fadeOut(700);
        })
    </script>
    <script src="/js/jquery-3.6.0.min.js"></script>
</body>
<footer class="text-gray-600 body-font mt-10 w-full mt-40">
    <div class="w-full sm:px-20 py-8 sm:py-2 flex items-center sm:flex-row flex-col">
        <a href="index"
            class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <div class="content-center">
                <svg class="mx-auto" width="100" height="57" viewBox="0 0 181 57" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.07911 0.512V26H0.0871094V0.512H8.07911ZM31.7047 0.512V6.848H24.9367V26H16.9447V6.848H10.2487V0.512H31.7047ZM57.0535 12.932C58.5895 13.292 59.7775 14.036 60.6175 15.164C61.4815 16.268 61.9135 17.552 61.9135 19.016C61.9135 21.248 61.1695 22.976 59.6815 24.2C58.2175 25.4 56.1055 26 53.3455 26H39.9895V0.512H52.9855C55.5775 0.512 57.6175 1.076 59.1055 2.204C60.5935 3.332 61.3375 4.976 61.3375 7.136C61.3375 8.624 60.9415 9.884 60.1495 10.916C59.3815 11.924 58.3495 12.596 57.0535 12.932ZM47.9815 10.448H51.0775C51.7975 10.448 52.3255 10.304 52.6615 10.016C53.0215 9.728 53.2015 9.284 53.2015 8.684C53.2015 8.06 53.0215 7.604 52.6615 7.316C52.3255 7.004 51.7975 6.848 51.0775 6.848H47.9815V10.448ZM51.6175 19.592C52.3375 19.592 52.8655 19.46 53.2015 19.196C53.5615 18.908 53.7415 18.452 53.7415 17.828C53.7415 16.604 53.0335 15.992 51.6175 15.992H47.9815V19.592H51.6175ZM72.5908 0.512V26H64.5988V0.512H72.5908ZM100.644 26H92.6524L84.1924 13.184V26H76.2004V0.512H84.1924L92.6524 13.544V0.512H100.644V26ZM120.599 22.148H112.103L110.843 26H102.455L111.779 0.512H120.995L130.283 26H121.859L120.599 22.148ZM118.655 16.136L116.351 9.044L114.047 16.136H118.655ZM144.915 26L140.127 16.856H140.091V26H132.099V0.512H143.979C146.043 0.512 147.807 0.883999 149.271 1.628C150.735 2.348 151.827 3.344 152.547 4.616C153.291 5.864 153.663 7.28 153.663 8.864C153.663 10.568 153.183 12.08 152.223 13.4C151.287 14.72 149.931 15.668 148.155 16.244L153.699 26H144.915ZM140.091 11.528H143.259C144.027 11.528 144.603 11.36 144.987 11.024C145.371 10.664 145.563 10.112 145.563 9.368C145.563 8.696 145.359 8.168 144.951 7.784C144.567 7.4 144.003 7.208 143.259 7.208H140.091V11.528ZM180.696 0.512L171.552 18.26V26H163.56V18.26L154.416 0.512H163.56L167.628 9.548L171.696 0.512H180.696ZM52.9497 56.252C49.9017 56.252 47.3817 55.544 45.3897 54.128C43.4217 52.688 42.3537 50.588 42.1857 47.828H50.6817C50.8017 49.292 51.4497 50.024 52.6257 50.024C53.0577 50.024 53.4177 49.928 53.7057 49.736C54.0177 49.52 54.1737 49.196 54.1737 48.764C54.1737 48.164 53.8497 47.684 53.2017 47.324C52.5537 46.94 51.5457 46.508 50.1777 46.028C48.5457 45.452 47.1897 44.888 46.1097 44.336C45.0537 43.784 44.1417 42.98 43.3737 41.924C42.6057 40.868 42.2337 39.512 42.2577 37.856C42.2577 36.2 42.6777 34.796 43.5177 33.644C44.3817 32.468 45.5457 31.58 47.0097 30.98C48.4977 30.38 50.1657 30.08 52.0137 30.08C55.1337 30.08 57.6057 30.8 59.4297 32.24C61.2777 33.68 62.2497 35.708 62.3457 38.324H53.7417C53.7177 37.604 53.5377 37.088 53.2017 36.776C52.8657 36.464 52.4577 36.308 51.9777 36.308C51.6417 36.308 51.3657 36.428 51.1497 36.668C50.9337 36.884 50.8257 37.196 50.8257 37.604C50.8257 38.18 51.1377 38.66 51.7617 39.044C52.4097 39.404 53.4297 39.848 54.8217 40.376C56.4297 40.976 57.7497 41.552 58.7817 42.104C59.8377 42.656 60.7497 43.424 61.5177 44.408C62.2857 45.392 62.6697 46.628 62.6697 48.116C62.6697 49.676 62.2857 51.08 61.5177 52.328C60.7497 53.552 59.6337 54.512 58.1697 55.208C56.7057 55.904 54.9657 56.252 52.9497 56.252ZM85.4937 30.512V36.848H78.7257V56H70.7337V36.848H64.0377V30.512H85.4937ZM104.005 52.148H95.5093L94.2493 56H85.8613L95.1853 30.512H104.401L113.689 56H105.265L104.005 52.148ZM102.061 46.136L99.7573 39.044L97.4533 46.136H102.061ZM128.321 56L123.533 46.856H123.497V56H115.505V30.512H127.385C129.449 30.512 131.213 30.884 132.677 31.628C134.141 32.348 135.233 33.344 135.953 34.616C136.697 35.864 137.069 37.28 137.069 38.864C137.069 40.568 136.589 42.08 135.629 43.4C134.693 44.72 133.337 45.668 131.561 46.244L137.105 56H128.321ZM123.497 41.528H126.665C127.433 41.528 128.009 41.36 128.393 41.024C128.777 40.664 128.969 40.112 128.969 39.368C128.969 38.696 128.765 38.168 128.357 37.784C127.973 37.4 127.409 37.208 126.665 37.208H123.497V41.528Z"
                        fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="89.5" y1="-2" x2="89.5" y2="56"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#352AFF" />
                            <stop offset="0.711805" stop-color="#7B39FD" />
                            <stop offset="1" stop-color="#A259FF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            © 2021 All right reserved —
            <a href="https://codingtime.dev/" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@Codingtime</a>
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500" href="https://www.facebook.com/ITBinaryStar" target="_blank">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>
        </span>
    </div>
</footer>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
    $("document").ready(function(){
        $("#universe").fadeOut(700);
    })
    
    // document.getElementById('button').onclick = function () {
    //     document.getElementById("sidebar").classList.toggle("hidden");
    // }
    // document.getElementById('buttonx').onclick = function () {
    //     document.getElementById("sidebar").classList.toggle("hidden");
    // }
</script>
</html>
