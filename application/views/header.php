<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=11" />

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="<?php echo base_url(); ?>assets/favicon/site.webmanifest">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <meta name="format-detection" content="telephone=no">

        <?php if ($this->router->fetch_class() == "mealplan") { ?>
            <meta name="robots" content="noindex, nofollow">
        <?php } ?>
            
            
        <!-- Pixel code start 1 -->

        <meta content="a0duclebdWq0zjPnEc7ESwFNum6M79EVl3PwiGPeErk" name="google-site-verification">
        <meta content="cf983335ddb65614fc66" name="wot-verification">
        
        <!-- begin Convert Experiences code-->        
        <script type="text/javascript" src="//cdn-3.convertexperiments.com/js/10033946-10031005.js"></script>
        
        <!-- end Convert Experiences code -->

        <style>
            .async-hide { opacity: 0 !important;} 
        </style>
        <script>
            // (function (a, s, y, n, c, h, i, d, e) {
            //     s.className += ' ' + y;
            //     h.start = 1 * new Date;
            //     h.end = i = function () {
            //         s.className = s.className.replace(RegExp(' ?' + y), '')
            //     };
            //     (a[n] = a[n] || []).hide = h;
            //     setTimeout(function () {
            //         i();
            //         h.end = null
            //     }, c);
            //     h.timeout = c;
            // })(window, document.documentElement, 'async-hide', 'dataLayer', 4000,
            //         {'GTM-W8T3WGD': true});
        </script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-122527750-1', {
                'linker': {
                    'domains': ['konsciousketo.com', 'simpleketosystem.com', 'healthy-lifestyle-daily.com', 'simplelowcarbsystem.com', 'konscious.onfastspring.com', 'konscious.test.onfastspring.com']
                },
                // 'optimize_id': 'GTM-W8T3WGD'
            });

            //Second ID config
            gtag('config', 'AW-770742054');

        </script>

        <!-- Google Tag Manager -->
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start':
                            new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-56TX85F');
        </script><!-- End Google Tag Manager --><!-- Global site tag (gtag.js) - Google Ads: 770742054 -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122527750-1">
        </script>

        <!-- Pixel code end 1 -->


        <title>SimpleKetoSystem</title>

        <?php if ($this->router->fetch_class() == "mealplan" || $this->router->fetch_class() == "startnow") { ?>
            <link href="<?php echo base_url(); ?>vendor/slick/slick.css" rel="stylesheet" type="text/css">
            <link href="<?php echo base_url(); ?>vendor/slick/slick-theme.css" rel="stylesheet" type="text/css">
            <link id="theme-sheet" href="<?php echo base_url(); ?>vendor/easydropdown/themes/flax.css" rel="stylesheet"/>
        <?php } ?>
        <?php if ($this->router->fetch_class() == "landing") { ?>
            <!--<link href="<?php echo base_url(); ?>assets/css/landing.css" rel="stylesheet">-->
            <style>:root{--blue: #007bff;--indigo: #6610f2;--purple: #6f42c1;--pink: #e83e8c;--red: #dc3545;--orange: #fd7e14;--yellow: #ffc107;--green: #28a745;--teal: #20c997;--cyan: #17a2b8;--white: #fff;--gray: #6c757d;--gray-dark: #343a40;--primary: #007bff;--secondary: #6c757d;--success: #28a745;--info: #17a2b8;--warning: #ffc107;--danger: #dc3545;--light: #f8f9fa;--dark: #343a40;--breakpoint-xs: 0;--breakpoint-sm: 576px;--breakpoint-md: 768px;--breakpoint-lg: 992px;--breakpoint-xl: 1200px;--font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";--font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace}*,*::before,*::after{box-sizing:border-box}html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;-webkit-tap-highlight-color:transparent}article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff}h1,h2,h3,h4,h5,h6{margin-top:0;margin-bottom:0.5rem}p{margin-top:0;margin-bottom:1rem}a{color:#007bff;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects}svg:not(:root){overflow:hidden}label{display:inline-block;margin-bottom:0.5rem}input,button,select,optgroup,textarea{margin:0;font-family:inherit;font-size:inherit;line-height:inherit}button,input{overflow:visible}input[type="radio"],input[type="checkbox"]{box-sizing:border-box;padding:0}h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit}h1,.h1{font-size:2.5rem}.container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width: 576px){.container{max-width:540px}}@media (min-width: 768px){.container{max-width:720px}}@media (min-width: 992px){.container{max-width:960px}}.row{display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col-1,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-10,.col-11,.col-12,.col,.col-auto,.col-sm-1,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm,.col-sm-auto,.col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12,.col-md,.col-md-auto,.col-lg-1,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg,.col-lg-auto,.col-xl-1,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl,.col-xl-auto{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}.col-12{flex:0 0 100%;max-width:100%}@media (min-width: 768px){.col-md-2{flex:0 0 16.6666666667%;max-width:16.6666666667%}.col-md-3{flex:0 0 25%;max-width:25%}}.d-none{display:none !important}.d-block{display:block !important}@media (min-width: 576px){.d-sm-none{display:none !important}.d-sm-block{display:block !important}}.position-absolute{position:absolute !important}.h-100{height:100% !important}.mt-1,.my-1{margin-top:0.25rem !important}.mt-4,.my-4{margin-top:1.5rem !important}.pt-3,.py-3{padding-top:1rem !important}.pb-3,.py-3{padding-bottom:1rem !important}.text-center{text-align:center !important}@font-face{font-family:'Proxima Nova Regular';src:url("assets/fonts/proxima_ssv/proximanova-regular-webfont.woff2") format("woff2"),url("assets/fonts/proxima_ssv/proximanova-regular-webfont.woff") format("woff");font-weight:normal;font-style:normal;font-display:swap}@font-face{font-family:'Proxima Nova Bold';src:url("assets/fonts/proxima_ssv/proxima_nova_bold-webfont.woff2") format("woff2"),url("assets/fonts/proxima_ssv/proxima_nova_bold-webfont.woff") format("woff");font-weight:normal;font-style:normal;font-display:swap}@font-face{font-family:'Proxima Nova Black';src:url("assets/fonts/proxima_ssv/proxima_nova_black-webfont.woff2") format("woff2"),url("assets/fonts/proxima_ssv/proxima_nova_black-webfont.woff") format("woff");font-weight:normal;font-style:normal;font-display:swap}@font-face{font-family:'Futura Medium';src:url("assets/fonts/futura/futura_medium_bt-webfont.woff2") format("woff2"),url("assets/fonts/futura/futura_medium_bt-webfont.woff") format("woff");font-weight:normal;font-style:normal;font-display:swap}@-webkit-keyframes bounce{0%, 20%, 50%, 80%, 100%{top:0}40%{top:-0.8em}60%{top:-0.4em}}@-moz-keyframes bounce{0%, 20%, 50%, 80%, 100%{top:0}40%{top:-0.8em}60%{top:-0.4em}}@-o-keyframes bounce{0%, 20%, 50%, 80%, 100%{top:0}40%{top:-0.8em}60%{top:-0.4em}}@-ms-keyframes bounce{0%, 20%, 50%, 80%, 100%{top:0}40%{top:-0.8em}60%{top:-0.4em}}@keyframes bounce{0%, 20%, 50%, 80%, 100%{top:0}40%{top:-0.8em}60%{top:-0.4em}}body{margin:0}.navbar-brand{font-weight:700;text-transform:uppercase;color:#F05F40;position:absolute;top:31px;left:31px;z-index:1030;pointer-events:none;cursor:default;width:150px}.logo{display:inline-block}.logo span{font-family:'Proxima Nova Bold';letter-spacing:3px;font-size:12.8px;margin-left:4px;vertical-align:top;line-height:1.7}.logo.logo-red img{width:20px}.logo.logo-red span{color:#F9464B}.logo.logo-black{width:180px}.logo.logo-black img{width:30px;filter:brightness(0%)}.logo.logo-black span{color:black;font-size:18px;letter-spacing:4px;margin-left:6px}.no-webp header.masthead{background-image:url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-m-test-1.jpg")}.webp header.masthead{background-image:url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-m-test-1.webp")}header.masthead{background-size:cover;background-repeat:no-repeat;background-position:bottom;min-height:100vh;padding-top:5.3rem;padding-bottom:1rem}header.masthead .wrapper{text-align:center;width:auto !important}header.masthead h1{display:inline-block;font-family:'Proxima Nova Regular';font-size:2rem;font-weight:500;color:black;text-align:center}header.masthead h1 span{color:#F9464B;font-style:italic;font-family:'Proxima Nova Black'}header.masthead .bounce{display:inline-block;position:relative;-moz-animation:bounce 2s infinite linear;-o-animation:bounce 2s infinite linear;-webkit-animation:bounce 2s infinite linear;animation:bounce 2s infinite linear;color:000}header.masthead .chevron-down{color:#F9464B;margin-top:1rem;margin-bottom:1rem;fill:#F9464B}header.masthead form input{display:none}header.masthead form label.btn-gender{display:block;color:white;border-radius:45px;text-decoration:none;font-size:1rem;font-family:'Proxima Nova Bold';margin:1rem auto;padding:.5rem;max-width:15rem;text-align:center;transition:all .3s ease;cursor:pointer}header.masthead form label.btn-gender.male{background-color:#447AD4}header.masthead form label.btn-gender.male:hover{background-image:linear-gradient(to bottom, #5577ca, #1C3F97);border-color:transparent;box-shadow:0 0 0px 7px rgba(28,63,151,0.22)}header.masthead form label.btn-gender.female{background-color:#F64850}header.masthead form label.btn-gender.female:hover{background-image:linear-gradient(to bottom, #ff7077, #F64850);border-color:transparent;box-shadow:0 0 0px 7px rgba(246,72,80,0.22)}header.masthead p.note{display:inline-block;font-size:1rem;text-align:center;font-family:'Proxima Nova Regular';font-style:italic;margin:0}footer{text-align:center;padding-top:40px;padding-bottom:40px;border-top:solid 1px lightgray;background-color:white}footer a{color:#0E1113}@media (min-width: 576px){header.masthead{padding-top:8.3rem}header.masthead h1{font-size:2.2rem;min-width:33.25rem}header.masthead p.note{min-width:33.25rem;margin:4rem 0}header.masthead form label.btn-gender{font-size:1.2rem;padding:1rem 0;max-width:18.75rem}header.masthead .fa.fa-chevron-down{font-size:2rem;margin-bottom:2rem}}@media (min-width: 1200px){header.masthead{background-position:bottom}.no-webp header.masthead{background-image:url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-test-1.jpg")}.webp header.masthead{background-image:url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-test-1.webp")}}@media (min-width: 1650px){.container{max-width:1453px}}@media (min-width: 576px) and (max-width: 767.98px){.container{max-width:560px}}</style>
        <?php } ?>
        <?php if ($this->router->fetch_class() != "landing") { ?>
            <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
        <?php } ?>
        <?php if ($this->router->fetch_class() == "mealplan") { ?>
            <?php if (isset($page) && $page == "mar") { ?>
                <link href="<?php echo base_url(); ?>assets/css/sbadmin-2/sb-admin-2.css" rel="stylesheet">
            <?php } ?>
            <link href="<?php echo base_url(); ?>assets/css/mealplan.css" rel="stylesheet">
        <?php } ?>
        <?php if ($this->router->fetch_class() == "startnow") { ?>
            <link href="<?php echo base_url(); ?>assets/css/startnow.css" rel="stylesheet">
        <?php } ?>
        <?php if ($this->router->fetch_class() == "startnow_1") { ?>
            <link href="<?php echo base_url(); ?>assets/css/startnow_1.css" rel="stylesheet">
        <?php } ?>
            <?php if ($this->router->fetch_class() == "startnow_2") { ?>
            <link href="<?php echo base_url(); ?>assets/css/startnow_2.css" rel="stylesheet">
        <?php } ?>
        <!-- webp -->
        <script>            
            !function(e,n,A){function o(e){var n=u.className,A=Modernizr._config.classPrefix||"";if(c&&(n=n.baseVal),Modernizr._config.enableJSClass){var o=new RegExp("(^|\\s)"+A+"no-js(\\s|$)");n=n.replace(o,"$1"+A+"js$2")}Modernizr._config.enableClasses&&(n+=" "+A+e.join(" "+A),c?u.className.baseVal=n:u.className=n)}function t(e,n){return typeof e===n}function a(){var e,n,A,o,a,i,l;for(var f in r)if(r.hasOwnProperty(f)){if(e=[],n=r[f],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(A=0;A<n.options.aliases.length;A++)e.push(n.options.aliases[A].toLowerCase());for(o=t(n.fn,"function")?n.fn():n.fn,a=0;a<e.length;a++)i=e[a],l=i.split("."),1===l.length?Modernizr[l[0]]=o:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=o),s.push((o?"":"no-")+l.join("-"))}}function i(e,n){if("object"==typeof e)for(var A in e)f(e,A)&&i(A,e[A]);else{e=e.toLowerCase();var t=e.split("."),a=Modernizr[t[0]];if(2==t.length&&(a=a[t[1]]),"undefined"!=typeof a)return Modernizr;n="function"==typeof n?n():n,1==t.length?Modernizr[t[0]]=n:(!Modernizr[t[0]]||Modernizr[t[0]]instanceof Boolean||(Modernizr[t[0]]=new Boolean(Modernizr[t[0]])),Modernizr[t[0]][t[1]]=n),o([(n&&0!=n?"":"no-")+t.join("-")]),Modernizr._trigger(e,n)}return Modernizr}var s=[],r=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var A=this;setTimeout(function(){n(A[e])},0)},addTest:function(e,n,A){r.push({name:e,fn:n,options:A})},addAsyncTest:function(e){r.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=l,Modernizr=new Modernizr;var f,u=n.documentElement,c="svg"===u.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;f=t(e,"undefined")||t(e.call,"undefined")?function(e,n){return n in e&&t(e.constructor.prototype[n],"undefined")}:function(n,A){return e.call(n,A)}}(),l._l={},l.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),Modernizr.hasOwnProperty(e)&&setTimeout(function(){Modernizr._trigger(e,Modernizr[e])},0)},l._trigger=function(e,n){if(this._l[e]){var A=this._l[e];setTimeout(function(){var e,o;for(e=0;e<A.length;e++)(o=A[e])(n)},0),delete this._l[e]}},Modernizr._q.push(function(){l.addTest=i}),Modernizr.addAsyncTest(function(){function e(e,n,A){function o(n){var o=n&&"load"===n.type?1==t.width:!1,a="webp"===e;i(e,a&&o?new Boolean(o):o),A&&A(n)}var t=new Image;t.onerror=o,t.onload=o,t.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],A=n.shift();e(A.name,A.uri,function(A){if(A&&"load"===A.type)for(var o=0;o<n.length;o++)e(n[o].name,n[o].uri)})}),a(),o(s),delete l.addTest,delete l.addAsyncTest;for(var p=0;p<Modernizr._q.length;p++)Modernizr._q[p]();e.Modernizr=Modernizr}(window,document);
        </script>
        
        <?php if(strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>            
            <script
            id="fsc-api"
            src="https://d1f8f9xcsvx3ha.cloudfront.net/sbl/0.8.3/fastspring-builder.min.js"
            type="text/javascript"
            data-popup-closed="onFSPopupClosed"
            data-popup-webhook-received="dataPopupWebhookReceived"
            data-storefront="konscious.test.onfastspring.com/popup-konsciousketo">
        </script>
        <?php } ?>
    </head>

    <body class="<?php
        $controller_class = $this->router->fetch_class();
        if ($controller_class == "admin") {
            echo $this->router->fetch_method();
        } else {
            echo $controller_class;
        }
        ?>">

        <!-- Pixel code start 2 -->
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-56TX85F" style="display:none;visibility:hidden" width="0"></iframe></noscript> 
        <!-- End Google Tag Manager (noscript) -->

        <!-- Pixel code end 2 -->


        <svg width="0" height="0" class="d-none">
            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36.88 36.88" id="logo">
                    <path d="M0 0h17.06v36.88H0zm36.88 36.88H19.81V19.81a17.07 17.07 0 0 1 17.07 17.07M19.81 8.53A8.54 8.54 0 1 0 28.34 0a8.53 8.53 0 0 0-8.53 8.53"></path>
                    <path d="M19.81 8.53h8.53v8.53h-8.53z"></path>
            </symbol>
            <?php if ($this->router->fetch_class() == "landing") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="chevron-down">
                    <path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" />
                </symbol>
            <?php } ?>
            <?php if (
                    $this->router->fetch_class() == "quiz" || 
                    $this->router->fetch_class() == "mealplan" 
                    ) { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-left">
                    <path d="M1143.339 202.305q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z" fill="currentColor"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-right">
                    <path d="M1172.085 633.492q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" fill="currentColor"></path>
                </symbol>            
            <?php } ?>
            <?php if ($this->router->fetch_class() == "quiz") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.968 511.968" stroke="#FFA200" fill="#F64850" id="close">
                    <path d="M511.968 24.072l-10.992-11.584-244.992 232.48L10.992 12.488 0 24.072l244.368 231.904L0 487.88l10.992 11.6L255.984 267l244.992 232.48 10.992-11.6L267.6 255.976z"></path>
                </symbol>
            <?php } ?>
            <?php if (
                    $this->router->fetch_class() == "quiz" || 
                    $this->router->fetch_class() == "summary" ||
                    $this->router->fetch_class() == "pricing" ||
                    $this->router->fetch_class() == "startnow_2") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="check-circle-solid">
                    <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                </symbol>
            <?php } ?>
            <?php if (
                    $this->router->fetch_class() == "summary" ||
                    $this->router->fetch_class() == "mealplan" ||
                    $this->router->fetch_class() == "startnow") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-up">
                    <path d="M1378.729 880.271q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z" fill="currentColor"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="angle-down">
                    <path d="M1363.542 455.05q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z" fill="currentColor"></path>
                </symbol>
            <?php } ?>
            <?php if (
                    $this->router->fetch_class() == "quiz" ||
                    $this->router->fetch_class() == "pricing" ||
                    $this->router->fetch_class() == "mealplan"
                    ) { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="check-solid">
                    <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                </symbol>
            <?php } ?>
            <?php if (
                    $this->router->fetch_class() == "email" ||
                    $this->router->fetch_class() == "summary") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="double-angle-right">
                    <path d="M997.44 641.085q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23zm384 0q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z" fill="currentColor"></path>
                </symbol>
            <?php } ?>            
            <?php if ($this->router->fetch_class() == "email") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="spinner">
                    <path d="M617.492 1123.797q0 60-42.5 102t-101.5 42q-60 0-102-42t-42-102q0-60 42-102t102-42q59 0 101.5 42t42.5 102zm432 192q0 53-37.5 90.5t-90.5 37.5q-53 0-90.5-37.5t-37.5-90.5q0-53 37.5-90.5t90.5-37.5q53 0 90.5 37.5t37.5 90.5zm-608-640q0 66-47 113t-113 47q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113zm1040 448q0 46-33 79t-79 33q-46 0-79-33t-33-79q0-46 33-79t79-33q46 0 79 33t33 79zm-832-896q0 73-51.5 124.5t-124.5 51.5q-73 0-124.5-51.5t-51.5-124.5q0-73 51.5-124.5t124.5-51.5q73 0 124.5 51.5t51.5 124.5zm464-192q0 80-56 136t-136 56q-80 0-136-56t-56-136q0-80 56-136t136-56q80 0 136 56t56 136zm544 640q0 40-28 68t-68 28q-40 0-68-28t-28-68q0-40 28-68t68-28q40 0 68 28t28 68zm-208-448q0 33-23.5 56.5t-56.5 23.5q-33 0-56.5-23.5t-23.5-56.5q0-33 23.5-56.5t56.5-23.5q33 0 56.5 23.5t23.5 56.5z" fill="currentColor"></path>
                </symbol>
            <?php } ?>
            <?php if ($this->router->fetch_class() == "pricing") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="star">
                    <path d="M1724.746 464.763q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z" fill="currentColor"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 -256 1792 1792" id="star-half">
                    <path d="M1014.237-173.017v1339l-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41z" fill="currentColor"></path>
                </symbol>
            <?php } ?>
            <?php if ($this->router->fetch_class() == "mealplan") { ?>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="download">
                    <path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.1 116" id="mp-angle-left">
                    <path d="M1.2 60.9a4.1 4.1 0 0 1 0-5.8L55.1 1.2A4.101 4.101 0 1 1 60.9 7l-51 51 51 51a4.1 4.1 0 0 1 0 5.8 4.1 4.1 0 0 1-5.8 0z"></path>
                </symbol>
                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.1 116" id="mp-angle-right">
                    <path d="M7 114.8a4.1 4.1 0 0 1-5.8 0 4.1 4.1 0 0 1 0-5.8l51-51-51-51A4.101 4.101 0 0 1 7 1.2l53.9 53.9a4.1 4.1 0 0 1 0 5.8z"></path>
                </symbol>
            <?php } ?>
        </svg>
        
        <!-- Navigation -->
<?php if ($this->router->fetch_class() != "mealplan") { ?>
            <nav class="navbar navbar-expand-lg navbar-light position-absolute py-3" id="mainNav">
                <div class="container">
                    <?php 
                        $logo_clickable = false;
                        if ($this->router->fetch_class() == "landing" && isset($_GET['v']) && $_GET['v'] == "lc") {
                            $logo_clickable = true;                    
                        }
                    ?>
                    <a class="navbar-brand js-scroll-trigger logo logo-red" href="<?php echo $logo_clickable ? 'https://konsciousketo.com/pages/philosophy' :'#page-top';?>" <?php echo $logo_clickable ? 'target="_blank" style="pointer-events:auto;cursor:pointer"' :'';?>>
                        <svg class="icon" width="20" height="20" fill="#f9464b">
                            <use xlink:href="#logo"></use>
                        </svg>
                        <span>KONSCIOUS</span>
                    </a>
                </div>
            </nav>

            <!-- Masthead -->
            <header class="masthead <?php echo $this->router->fetch_class() == "summary" ? "text-center" : "" ?>">
    <?php if (
            $this->router->fetch_class() != "landing" && 
            $this->router->fetch_class() != "startnow" && 
            $this->router->fetch_class() != "startnow_1" &&
            $this->router->fetch_class() != "startnow_2"
            ) { ?>
                    <div class="circle-area">
                        <div class="circle-container">
                            <div class="back-circle circle-1"></div>
                            <div class="back-circle circle-2"></div>
                            <div class="back-circle circle-3"></div>
                            <div class="back-circle circle-4"></div>
                        </div>
                    </div>
    <?php } ?>
<?php } ?>
