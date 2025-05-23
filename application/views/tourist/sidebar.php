<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete responsive tour and travel agency website design</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="icon" href="images/p-2.jpg">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- wow js -->
    <!-- Animate CSS (Local) -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">

    <!-- Lightbox CSS (Local) -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/lightbox.css'); ?>">

    <!-- Owl Carousel CSS (Local) -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css'); ?>">

    <!-- Fake Loader CSS (Local) -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/fakeLoader.min.css'); ?>"> -->

    <!-- scroling aos.css -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Base Styles for the Box */
        .box {
            width: 100%;
            max-width: 300px;
            /* Set max width for bigger screens */
            margin: 15px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Image styling */
        .box img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        /* Content Styles */
        .content {
            padding: 15px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Star Ratings */
        .stars i {
            color: #ffd700;
            /* Gold color for stars */
        }

        /* Price Styles */
        .price {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        .price span {
            text-decoration: line-through;
            color: #999;
        }

        .btn {
            display: inline-block;
            background-color: #f60;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #e55c00;
        }

        /* Responsiveness for Different Screen Sizes */

        /* Tablet View */
        @media (max-width: 768px) {
            .box {
                max-width: 80%;
                margin: 10px auto;
            }

            .content {
                padding: 10px;
            }

            h3 {
                font-size: 16px;
            }

            p {
                font-size: 13px;
            }

            .price {
                font-size: 16px;
            }
        }

        /* Mobile View */
        @media (max-width: 480px) {
            .box {
                max-width: 100%;
                margin: 10px;
            }

            .content {
                padding: 8px;
            }

            h3 {
                font-size: 14px;
            }

            p {
                font-size: 12px;
            }

            .price {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
                padding: 8px 12px;
            }
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

        :root {
            --orange: #ffa500;
        }

        * {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-transform: capitalize;
            outline: none;
            border: none;
            text-decoration: none;
            transition: all .2s linear;
        }

        *::selection {
            background: var(--orange);
            color: #fff;
        }

        .first_carousel .owl-nav .owl-prev span {

            font-size: 60px;

            color: #026fc1;

            position: absolute;

            top: 50%;

            transform: translateX(50%);

            left: -18px;
        }

        .first_carousel .owl-nav .owl-next span {

            font-size: 60px;

            color: #026fc1;

            position: absolute;

            top: 50%;

            transform: translateX(-50%);

            right: -18px;
        }

        .secound_carousel .owl-nav .owl-prev span {

            font-size: 60px;

            color: #026fc1;

            position: absolute;

            top: 50%;

            transform: translateX(50%);

            left: -18px;
        }

        .secound_carousel .owl-nav .owl-next span {

            font-size: 60px;

            color: #026fc1;

            position: absolute;

            top: 50%;

            transform: translateX(-50%);

            right: -18px;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 6rem;
            scroll-behavior: smooth;
        }

        section {
            padding: 2rem 9%;
        }

        .heading {
            text-align: center;
            padding: 2.5rem 0
        }

        .heading span {
            font-size: 3.5rem;
            background: rgba(255, 165, 0, .2);
            color: var(--orange);
            border-radius: .5rem;
            padding: .2rem 1rem;
        }

        .heading span.space {
            background: none;
        }

        .btn {
            position: relative;
            display: inline-block;
            margin-top: 1rem;
            background: var(--orange);
            color: #fff;
            padding: 10px 35px;
            cursor: pointer;
            font-size: 1.7rem;
            z-index: 0;

        }

        .btn::before {
            content: "";
            position: absolute;
            color: #fff;
            width: 0;
            height: 100%;
            background-color: #000;
            top: 0;
            left: 0;
            transition: all .3s ease-in-out;
            z-index: 0;
        }

        .btn:hover::before {
            right: 0;
            width: 100%;
            z-index: -1;

        }

        .btn-submit:hover {
            letter-spacing: 1px;
            background-color: #000;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #000;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 9%;
        }

        header .logo {
            font-size: 2.5rem;
            font-weight: bolder;
            color: #fff;
            text-transform: uppercase;
        }

        header .logo span {
            color: var(--orange);
        }

        header .navbar a {
            color: #fff;
            font-size: 2rem;
            margin: 0 .8rem;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(49, 41, 25, 0);
            transition: all .3s ease-in-out;
        }

        header .navbar a:hover {
            color: var(--orange);
            padding-bottom: 10px;
            border-bottom: 1px solid orange;

        }

        header .icons i {
            font-size: 2.5rem;
            color: #fff;
            cursor: pointer;
            margin-right: 2rem;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(49, 41, 25, 0);
            transition: all .3s ease-in-out;
        }

        header .icons i:hover {
            color: var(--orange);
            padding-bottom: 10px;
            border-bottom: 1px solid orange;
        }

        header .search-bar-container {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            padding: 1.5rem 2rem;
            background: #333;
            border-top: .1rem solid rgba(255, 255, 255, .2);
            display: flex;
            align-items: center;
            z-index: 1001;
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
        }

        header .search-bar-container.active {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        header .search-bar-container #search-bar {
            width: 100%;
            padding: 1rem;
            text-transform: none;
            color: #333;
            font-size: 1.7rem;
            border-radius: .5rem;
        }

        header .search-bar-container label {
            color: #fff;
            cursor: pointer;
            font-size: 3rem;
            margin-left: 1.5rem;
        }

        header .search-bar-container label:hover {
            color: var(--orange);
        }

        .login-form-container {
            position: fixed;
            top: -120%;
            left: 0;
            z-index: 10000;
            min-height: 100vh;
            width: 100%;
            background: rgba(0, 0, 0, .7);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form-container.active {
            top: 0;
        }

        .login-form-container form {
            margin: 2rem;
            padding: 1.5rem 2rem;
            border-radius: .5rem;
            background: #fff;
            width: 50rem;
        }

        .login-form-container form h3 {
            font-size: 3rem;
            color: #444;
            text-transform: uppercase;
            text-align: center;
            padding: 1rem 0;
        }

        .login-form-container form .box {
            width: 100%;
            padding: 1rem;
            font-size: 1.7rem;
            color: #333;
            margin: .6rem 0;
            border: .1rem solid rgba(0, 0, 0, .3);
            text-transform: none;
        }

        .login-form-container form .box:focus {
            border-color: var(--orange);
            ;
        }

        .login-form-container form #remember {
            margin: 2rem 0;
        }

        .login-form-container form label {
            font-size: 1.5rem;
        }

        .login-form-container form .btn {
            display: block;
            width: 100%;
        }

        .login-form-container form p {
            padding: .5rem 0;
            font-size: 1.5rem;
            color: #666;
        }

        .login-form-container form p a {
            color: var(--orange);
        }

        .login-form-container form p a:hover {
            color: #333;
            text-decoration: underline;
        }

        .login-form-container #form-close {
            position: absolute;
            top: 2rem;
            right: 3rem;
            font-size: 5rem;
            color: #fff;
            cursor: pointer;
        }

        #menu-bar {
            color: #fff;
            border: .1rem solid #fff;
            border-radius: .5rem;
            font-size: 3rem;
            padding: .5rem 1.2rem;
            cursor: pointer;
            display: none;
        }

        .home {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            position: relative;
            z-index: 0;
        }

        .home .content {
            text-align: center;
        }

        .home .content span {
            color: orange;
            text-transform: uppercase;
        }

        .home .content h3 {
            font-size: 4.5rem;
            color: #fff;
            text-transform: uppercase;
            text-shadow: 0 .3rem .5rem rgba(0, 0, 0, .1);
        }

        .home .content p {
            font-size: 2.5rem;
            color: #fff;
            padding: .5rem 0;
        }

        .home .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .home .controls {
            padding: 1rem;
            border-radius: 5rem;
            background: rgb(0 0 0);
            position: relative;
            top: 10rem;
        }

        .home .controls .vid-btn {
            height: 2rem;
            width: 2rem;
            display: inline-block;
            border-radius: 50%;
            background: #fff;
            cursor: pointer;
            margin: 0 .5rem;
        }

        .home .controls .vid-btn.active {
            background: var(--orange);
        }

        .book .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: center;
        }

        .book .row .image {
            flex: 1 1 40rem;
        }

        .book .row .image img {
            width: 100%;
        }

        .book .row form {
            flex: 1 1 40rem;
            padding: 2rem;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border-radius: .5rem;
        }

        .book .row form .inputBox {
            padding: .5rem 0;
        }

        .book .row form .inputBox input {
            width: 100%;
            padding: 1rem;
            border: .1rem solid rgba(0, 0, 0, .1);
            font-size: 1.7rem;
            color: #333;
            text-transform: none;
        }

        .book .row form .inputBox h3 {
            font-size: 2rem;
            padding: 1rem 0;
            color: #666;
        }

        .packages .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .packages .box-container .box {
            flex: 1 1 30rem;
            border-radius: .5rem;
            overflow: hidden;
            /* box-shadow: 0 1rem 2rem rgb(0 0 0 / 10%); */
            padding: 5px;
            border: 5px solid #f8f8f8bf;
            margin-bottom: 10px;
        }

        .box {}

        .box {}

        .packages .box-container .box img {
            height: 25rem;
            width: 100%;
            object-fit: cover;
        }

        .packages .box-container .box .content {
            padding: 2rem;
            text-align: left;
        }

        .packages .box-container .box .content h3 {
            font-size: 2rem;
            color: #333;
        }

        .packages .box-container .box .content h3 i {
            color: var(--orange);
        }

        .packages .box-container .box .content p {
            font-size: 1.7rem;
            color: #666;
            padding: 1rem 0;
        }

        .packages .box-container .box .content .stars i {
            font-size: 1.7rem;
            color: var(--orange);
        }

        .packages .box-container .box .content .price {
            font-size: 2rem;
            color: #333;
            padding-top: 1rem;
        }

        .packages .box-container .box .content .price span {
            color: #666;
            font-size: 1.5rem;
            text-decoration: line-through;
        }

        .services .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .services .box-container .box {
            flex: 1 1 30rem;
            border-radius: .5rem;
            padding: 1rem;
            text-align: center;
        }

        .services .box-container .box i {
            padding: 1rem;
            font-size: 5rem;
            color: var(--orange);
        }

        .services .box-container .box h3 {
            font-size: 2.5rem;
            color: #333;
        }

        .services .box-container .box p {
            font-size: 1.5rem;
            color: #666;
            padding: 1rem 0;
        }

        .services .box-container .box:hover {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
        }

        .gallery .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .gallery .box-container .box {
            overflow: hidden;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border: 1rem solid #fff;
            border-radius: .5rem;
            flex: 1 1 30rem;
            height: 25rem;
            position: relative;
        }

        .gallery .box-container .box img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .gallery .box-container .box .content {
            position: absolute;
            top: -100%;
            left: 0;
            height: 100%;
            width: 100%;
            text-align: center;
            background: rgba(0, 0, 0, .7);
            padding: 2rem;
            padding-top: 5rem;
        }

        .gallery .box-container .box:hover .content {
            top: 0;
        }

        .gallery .box-container .box .content h3 {
            font-size: 2.5rem;
            color: var(--orange);
        }

        .gallery .box-container .box .content p {
            font-size: 1.5rem;
            color: #eee;
            padding: .5rem 0;
        }

        .review .review-slider {
            padding-bottom: 2rem;
        }

        .review .box {
            padding: 2rem;
            text-align: center;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border-radius: .5rem;
        }

        .review .box img {
            height: 13rem;
            width: 13rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .review .box h3 {
            color: orange;
            font-size: 2.5rem;
            font-weight: 600;
        }

        .review .box p {
            color: #666;
            font-size: 1.5rem;
            padding: 1rem 0;
        }

        .review .box .stars i {
            color: var(--orange);
            font-size: 1.7rem;
        }

        .contact .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: center;
        }

        .contact .row .image {
            flex: 1 1 35rem;
        }

        .contact .row .image img {
            width: 100%;
        }

        .contact .row form {
            flex: 1 1 50rem;
            padding: 2rem;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border-radius: .5rem;
        }

        .contact .row form .inputBox {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .contact .row form .inputBox input,
        .contact .row form textarea {
            width: 49%;
            margin: 1rem 0;
            padding: 1rem;
            font-size: 1.7rem;
            color: #333;
            background: #f7f7f7;
            text-transform: none;
        }

        .contact .row form textarea {
            height: 15rem;
            resize: none;
            width: 100%;
        }

        .brand-container {
            text-align: center;
        }

        .footer {
            background: #333;
        }

        .footer .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer .box-container .box {
            padding: 1rem 0;
            flex: 1 1 25rem;
        }

        .footer .box-container .box h3 {
            font-size: 2.5rem;
            padding: .7rem 0;
            color: #fff;
        }

        .footer .box-container .box p {
            font-size: 1.5rem;
            padding: .7rem 0;
            color: #eee;
        }

        .footer .box-container .box a {
            display: block;
            font-size: 1.5rem;
            padding: .7rem 0;
            color: #eee;
        }

        .footer .box-container .box a:hover {
            color: var(--orange);
            text-decoration: underline;
        }

        .footer .credit {
            text-align: center;
            padding: 2rem 1rem;
            margin-top: 1rem;
            font-size: 2rem;
            font-weight: normal;
            color: #fff;
            border-top: .1rem solid rgba(255, 255, 255, .2);
        }

        .footer .credit span {
            color: var(--orange);
        }

        /* top to bottom css file  */
        #totopscroller {
            position: fixed;
            right: 30px;
            bottom: 30px;
            width: 43px;
        }

        #totopscroller div {
            width: 49px;
            height: 43px;
            position: relative;
        }

        #totopscroller a {
            display: none;
            background: url('../images/totopicons.png');
            width: 49px;
            height: 43px;
            display: block;
            text-decoration: none;
            border: medium none;
            margin: 0 0 -1px;
            border: 2px solid orange;
        }

        .totopscroller-top {
            background-position: 0 0 !important;
        }

        .totopscroller-lnk {
            background-position: 0 -43px !important;
        }

        .totopscroller-prev {
            background-position: 0 -129px !important;
            position: absolute;
            top: 0;
            left: 0;
        }

        .totopscroller-bottom {
            background-position: 0 -86px !important;
            position: absolute;
            top: 0;
            left: 0;
        }

        .fakeLoader {
            background-color: rgb(0, 0, 0);
        }



        .spin-dot-item {
            position: absolute;
            display: block;
            width: 9px;
            height: 9px;
            background-color: #1890ff;
            border-radius: 100%;
            -webkit-transform: scale(.75);
            -ms-transform: scale(.75);
            transform: scale(.75);
            -webkit-transform-origin: 50% 50%;
            -ms-transform-origin: 50% 50%;
            transform-origin: 50% 50%;
            opacity: .3;
            -webkit-animation: antSpinMove 1s infinite linear alternate;
            animation: antSpinMove 1s infinite linear alternate;
        }


        /* media queries  */

        @media (max-width:1200px) {

            html {
                font-size: 55%;
            }

        }

        @media (max-width:991px) {

            header {
                padding: 2rem;
            }

            section {
                padding: 2rem;
            }

        }

        @media (max-width:768px) {

            #menu-bar {}

            header .navbar {
                position: absolute;
                top: 100%;
                right: 0;
                left: 0;
                background: #333;
                border-top: .1rem solid rgba(255, 255, 255, .2);
                padding: 1rem 2rem;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            header .navbar.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            header .navbar a {
                display: block;
                border-radius: .5rem;
                padding: 1.5rem;
                margin: 1.5rem 0;
                background: #222;
            }

        }

        @media (max-width:450px) {

            html {
                font-size: 50%;
            }

            .heading span {
                font-size: 2.5rem;
            }

            .contact .row form .inputBox input {
                width: 100%;
            }

        }










        @media (max-width:320px) {

            .header .logo {
                font-size: 35px;
            }

            .footer .credit {
                font-size: 14px;
            }
        }

        @media (max-width:450px) {

            html {
                font-size: 50%;
            }

            .heading {
                font-size: 3rem;
            }


        }

        @media (max-width:768px) {

            #menu-btn {
                display: block;
            }

            #menu-btn.fa-times {
                transform: rotate(180deg);
            }

            #login-btn .btn {
                display: none;
            }

            #login-btn i {
                display: block;
            }

            .header .navbar {
                position: absolute;
                top: 99%;
                left: 0;
                right: 0;
                background: #fff;
                border-top: var(--border);
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            .header .navbar.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            }

            .header .navbar a {
                margin: 2rem;
                display: block;
                font-size: 2rem;
            }

            .header .logo {
                font-size: 30px;
            }


        }

        @media (max-width:991px) {

            html {
                font-size: 55%;
            }

            .header {
                padding: 2rem;
            }

            .header.active {
                padding: 2rem;
            }

            section {
                padding: 2rem;
            }

        }

        @media (max-width:1025px) {
            .header .navbar a {
                margin: 0px 4px;
                font-size: 15px;
            }

            .btn_login {
                padding: 0.8rem 10px;
            }

            .header .logo {
                font-size: 35px;
            }

            .btn {
                padding: 0.8rem 2rem;
            }

            .header .logo {
                font-size: 35px;
            }

            .footer .box-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(16rem, 1fr));
            }

            .icons-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
            }

        }
    </style> <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="wow fadeInDown" data-wow-duration="4s">

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="<?php echo base_url(); ?>" class="logo">
            <img src="<?php echo base_url('assets/images/logo.gif'); ?>" alt="logo">
        </a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#packages">Spot Details</a>
            <a href="#services">Business</a>
            <a href="#gallery">gallery</a>

        </nav>



        <!-- <div class="icons" style="display: flex; gap: 10px;">
            <i class="fas fa-search" id="search-btn"></i>
            <i class="fas fa-user" id="login-btn"></i>
        </div> -->

        <div class="icons" style="display: flex; gap: 10px;">
            <!-- Sign-in/Sign-up Buttons -->
            <button id="sign-in-btn" class="btn btn-primary">Sign In</button>
            <button id="sign-up-btn" class="btn btn-secondary">Sign Up</button>

        </div>
        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" placeholder="search here...">
            <label for="search-bar" class="fas fa-search"></label>
        </form>
        <style>
            #sign-in-btn {
                background-color: #4CAF50;
                /* Green color */
                color: white;
            }
        </style>
    </header>

    <!-- header section ends -->

    <!-- login form container  -->

    <div class="login-form-container">

        <i class="fas fa-times" id="form-close"></i>

        <form action="">
            <h3>login</h3>
            <input type="email" class="box" placeholder="enter your email">
            <input type="password" class="box" placeholder="enter your password">
            <input type="submit" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="#">click here</a></p>
            <p>don't have and account? <a href="#">register now</a></p>
        </form>

    </div>

    <!-- home section starts  -->

    <section class="home" id="home">

        <!-- <div class="content wow fadeInUp" data-wow-duration="4s">
            <h3>Bright your future with <span>travels</span></h3>
            <p>dicover new places with us, adventure awaits</p>
            <a href="#" class="btn">discover more</a>
        </div> -->
        <div class="content wow fadeInUp" data-wow-duration="4s">
            <h3>Unveil the Wonders of Bohol</span></h3>
            <p>Explore Like Never Before</p>
            <a href="#" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="<?php echo base_url('images/vid-1.mp4'); ?>"></span>
            <span class="vid-btn" data-src="<?php echo base_url('images/vid-2.mp4'); ?>"></span>
            <span class="vid-btn" data-src="<?php echo base_url('images/vid-3.mp4'); ?>"></span>
            <span class="vid-btn" data-src="<?php echo base_url('images/vid-4.mp4'); ?>"></span>
            <span class="vid-btn" data-src="<?php echo base_url('images/vid-5.mp4'); ?>"></span>
        </div>


        <div class="video-container">
            <video src="<?php echo base_url('assets/images/vid-1.mp4'); ?>" id="video-slider" loop autoplay
                muted></video>
        </div>



    </section>

    <!-- home section ends -->



    <!-- book section ends -->

    <!-- packages section starts  -->

    <section class="packages" id="packages">

        <h1 class="heading wow fadeIn">
            <span>s</span>
            <span>p</span>
            <span>o</span>
            <span>t</span>
            <span> </span> <!-- Space between words -->
            <span>d</span>
            <span>e</span>
            <span>t</span>
            <span>a</span>
            <span>i</span>
            <span>l</span>
            <span>s</span>
        </h1>


        <?php foreach ($spots as $spot): ?>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <a href="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>" data-lightbox="image-1"
                    data-title="Mumbai">
                    <img src="<?= !empty($spot['photo']) ? base_url($spot['photo']) : 'No photo'; ?>" alt="image">
                </a>

                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($spot['title'] ?? 'N/A'); ?> </h3>
                    <p><?= htmlspecialchars($spot['details'] ?? 'N/A'); ?></p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price"> $3.00 <span>$5.00</span> </div>
                    <!-- <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        See Details
                    </a> -->
                    <a href="<?= base_url('Admin_Ctrl/View_details/' . ($spot['id'] ?? 'N/A')); ?>"
                        class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> View
                    </a>




                </div>
            </div>
        <?php endforeach; ?>










    </section>

    <!-- packages section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">

        <h1 class="heading wow fadeIn">
            <span>b</span>
            <span>u</span>
            <span>s</span>
            <span>i</span>
            <span>n</span>
            <span>e</span>
            <span>s</span>
            <span>s</span>
        </h1>


        <div class="box-container">

            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-utensils"></i>
                <h3>food and drinks</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-bullhorn"></i>
                <h3>safty guide</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore commodi earum, quis voluptate
                    exercitationem ut minima itaque iusto ipsum corrupti!</p>
            </div>

        </div>

    </section>

    <!-- services section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading wow fadeIn">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>

        <div class="box-container">

            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-1.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-2.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-3.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-4.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-5.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-6.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-7.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-8.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            <div class="box wow fadeInUp" data-wow-duration="2s">
                <img src="images/g-9.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, tenetur.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- review section starts  -->

    <section class="review" id="review">

        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1>

        <div class="swiper-container review-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic1.png" alt="">
                        <h3>MD Mamun Hossain</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic2.png" alt="">
                        <h3>Jonson Rew</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic3.png" alt="">
                        <h3>Adiba Gaw</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="images/pic4.png" alt="">
                        <h3>MD Mamun Hossain</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa adipisci quisquam sunt nesciunt
                            fugiat odit minus illum asperiores dolorum enim sint quod ipsam distinctio molestias
                            consectetur ducimus beatae, reprehenderit exercitationem!</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- review section ends -->

    <!-- contact section starts  -->

    <section class="contact" id="contact">

        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1>

        <div class="row">

            <div class="image">
                <img src="images/contact-img.svg" alt="">
            </div>

            <form action="">
                <div class="inputBox">
                    <input type="text" placeholder="name">
                    <input type="email" placeholder="email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="number">
                    <input type="text" placeholder="subject">
                </div>
                <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn btn-submit" value="send message">
            </form>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- brand section  -->
    <section class="brand-container">

        <div class="swiper-container brand-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/1.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/2.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/3.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/4.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/5.jpg" alt=""></div>
                <div class="swiper-slide"><img src="images/6.jpg" alt=""></div>
            </div>
        </div>

    </section>


    <!-- footer section  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas magni pariatur est
                    accusantium voluptas enim nemo facilis sit debitis.</p>
            </div>
            <div class="box">
                <h3>branch locations</h3>
                <a href="#">india</a>
                <a href="#">USA</a>
                <a href="#">japan</a>
                <a href="#">france</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallery</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="https://web.facebook.com/mamun3399">facebook</a>
                <a href="#">instagram</a>
                <a href="https://twitter.com/tmnewsbd24">twitter</a>
                <a href="https://www.linkedin.com/in/md-mamun-hossain-239451193/">linkedin</a>
            </div>

        </div>

        <h1 class="credit"> created by <span> MD. Mamun Hossain </span> | all rights reserved! </h1>

    </section>
    <!-- top to bottom scrolling  -->
    <div id="totopscroller"></div>
    <!-- preloader  -->
    <div class="fakeLoader"></div>
















    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Swiper JS CDN -->
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->

    <!-- WOW JS (Local) -->
    <script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>

    <!-- Lightbox JS (Local) -->
    <script src="<?php echo base_url('assets/js/lightbox.js'); ?>"></script>

    <!-- Owl Carousel JS (Local) -->
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>

    <!-- jQuery ToTop Plugin (Local) -->
    <script src="<?php echo base_url('assets/js/jquery.totop.js'); ?>"></script>

    <!-- Fake Loader JS (Local) -->
    <script src="<?php echo base_url('assets/js/fakeLoader.min.js'); ?>"></script>

    <!-- AOS (Animation on Scroll) CDN -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- Custom JS File (Local) -->
    <script src="<?php echo base_url('js/script.js'); ?>"></script>



</body>

</html>