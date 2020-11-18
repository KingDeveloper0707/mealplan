<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="javascript:window.location.href=window.location.href">
            <img src="<?php echo keycdn_url() . 'assets/img/'; ?>logo.svg" width="138" class="align-top">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span>✖</span>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if ($page == "mealplan") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=mealplan">MEAL PLAN</a>
                </li>
                <li class="nav-item hide-fastspring <?php if ($page == "video") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=video">VIDEO COACHING</a>
                </li>
                <li class="nav-item <?php if ($page == "download") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=download">DOWNLOAD</a>
                </li>
                <li class="nav-item <?php if ($page == "resource") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=resource">RESOURCES</a>
                </li>
                <li class="nav-item <?php if ($page == "faq") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=faq">FAQ</a>
                </li>
                <li class="nav-item hide-fastspring <?php if ($page == "vip") echo "active"; ?>">
                    <a class="nav-link js-scroll-trigger" href="<?php echo base_url() ?>mealplan?uid=<?php echo $uid; ?>&page=vip">VIP SPECIALS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Masthead -->
<header class="masthead <?php echo $page; ?>">
    <?php if ($page == "mealplan") { ?>
        <h1><span class="mealplan_firstname"></span><br class="d-block d-sm-none"> Personalized Meal Plan</h1>
        <div class="container h-100">
            <div class="plan-area">
                <form class="o-meal-table-head__meal-weeks m-meal-weeks js-week-form">                        
                    <div class="weeks-container">
                        <select id="demo-select" onchange="weekChange(this.value)"></select>
                    </div>
                    <a href="#" class="click-here">Click here to select a different week</a>
                </form>
                <div class="plan-table-container">
                    <table class="table plan-table mobile-accordion text-left text-sm-center">
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($page == "download") { ?>
        <h1 class="red-color visible text-center">Follow our guide to have the best Keto diet experience</h1>
    <?php } ?>
    <?php if ($page == "vip") { ?>
        <div class="container vip-header">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="upgrade-panel week3">
                        <div class="">
                            <div class="upgrade-icon d-block d-md-inline-block mx-auto">
                                <picture>
                                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_vip_upgrade.webp" type="image/webp">
                                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_vip_upgrade.png" alt="">
                                </picture>                            
                            </div>
                            <p class="upgrade-text d-block d-md-inline-block ml-md-2 mt-md-1">Upgrade to <span class="proxima-nova-extra-bold">3 MONTHS</span></p>
                        </div>
                        <a href="https://konsciousketo.com/a/secure/checkout/bMUzIUxFq9Ao2bobxRc6" class="access-btn" target="_blank">Access for $75</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="upgrade-panel year1">
                        <div class="">
                            <div class="upgrade-icon d-block d-md-inline-block mx-auto">
                                <picture>
                                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_vip_upgrade.webp" type="image/webp">
                                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_vip_upgrade.png" alt="">
                                </picture>                            
                            </div>
                            <p class="upgrade-text d-block d-md-inline-block ml-md-2 mt-md-1">Upgrade to <span class="proxima-nova-extra-bold">1 YEAR</span></p>
                        </div>
                        <a href="https://konsciousketo.com/a/secure/checkout/alVD9CIHIvCZMxGKFWwP" class="access-btn" target="_blank">Access for $125</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($page == "faq") { ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-6 col-md-4 pt-5 pb-4">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-faq-min.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-faq-min.png" alt="">
                    </picture>
                </div>
            </div>
        </div>
    <?php } ?>    
    <?php if ($page == "video") { ?>
        <h1 class="blue-color visible text-center">Keto Coaching Video Series<span class="d-block proxima-nova-regular" style="font-size: .6em">BY CHEF IDO</span></h1>        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 pr-auto pr-md-1">
                    <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                            <div class="wistia_embed wistia_async_76ol25ytgk videoFoam=true autoPlay=false" style="height:100%;position:relative;width:100%">&nbsp;</div>                            
                        </div>
                        <div class="unlock-area locked"><a href="https://konsciousketo.com/a/secure/checkout/cYhl14lCaO98vQYRBs8p" target="_blank" class="unlock-btn">Unlock Content</a></div>
                    </div>
                    <div class="video-heading mt-3 mb-3 d-flex align-items-center">
                        <div class="logo-img">
                            <img src="<?php echo keycdn_url() . 'assets/img/'; ?>logo-mp.svg" width="190" class="w-100" />
                        </div>
                        <div class="d-inline-block">
                            <h3 class="vid-title blue-color proxima-nova-bold mb-0">Quick Start 1</h3>
                            <p class="vid-week proxima-nova-extra-bold mb-0">QUICK START VIDEO</p>
                        </div>
                    </div>
                    <div class="video-control-area proxima-nova-bold">
                        <a href="#" class="float-left d-flex justify-content-center align-items-center btn-vid-prev btn-vid-control inactive"><svg class="icon mr-2" width="40" height="40"><use xlink:href="#angle-left"></use></svg><span>Previous video</span></a>
                        <a href="#" class="float-right d-flex justify-content-center align-items-center btn-vid-next btn-vid-control"><span>Next video</span><svg class="icon ml-2" width="40" height="40"><use xlink:href="#angle-right"></use></svg></a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="ido-area p-4">
                        <h4 class="ido-heading">Who is chef "KETO IDO"?</h4>

                        <picture class="d-block d-md-none mb-3">
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido_icon.webp" type="image/webp">
                            <img class="mx-auto d-block w-50" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido_icon.jpg" alt="">
                        </picture>
                        <div class="d-flex flex-column flex-md-row ">
                            <div class="ido-img-container order-2 order-md-1 mr-0 mr-md-3 mx-auto">
                                <picture>
                                    <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                    <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                </picture>
                            </div>
                            <div class="ido-desc-container order-1 order-md-2">
                                <p>Ido is a private chef and a weight loss expert who has cooked for celebrities like <span class="proxima-nova-bold">Madonna, David Bowie, Bjork and Michael Bloomberg</span>.</p>
                                <p>After 50 years of being medically obese, Ido used the keto diet to lose 70 pounds in 6 months and achieve peak health.</p>
                                <p>In this program, Ido shares his insights and understanding of the keto diet, to help you say goodbye to that stubborn fat and hello to a new slimmer, sexier, healthier, and happier you.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 pl-auto pl-md-1">
                    <div class="video-list">
                        <button class="accordion">Quick Start Video</button>
                        <div class="panel">
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>                                    
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>                            
                        </div>
                        <button class="accordion">Quick Start Video</button>
                        <div class="panel">
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>
                            <div class="vid-item">
                                <div class="thumbnail">
                                    <picture>
                                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.webp" type="image/webp">
                                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_ido.png" alt="">
                                    </picture>
                                </div>
                                <div class="title-area">
                                    <p class="title">Keto lifestyle</p>
                                    <p class="status">WATCHED</p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

<?php } ?>
</header>
<?php if ($page == "mealplan") { ?>
    <section id="download">
        <div class="d-none d-md-block">
            <div class="download-label">DOWNLOAD GROCERY FOR WEEK <span class="download-week-num">1</span>!</div>
            <a href="api/grocery.php" class="btn btn-primary btn-download mt-3 mt-sm-0">
                <div class="d-flex align-items-center justify-content-center">
                    <span class="mr-2">DOWNLOAD</span>
                    <svg class="icon" width="20" height="20" fill="#224390"><use xlink:href="#download"></use></svg>
                </div>
            </a>
        </div>
        <div class="d-block d-md-none">
            <a href="api/grocery.php" class="btn btn-primary btn-download mt-3 mt-sm-0">
                <div class="d-flex flex-row justify-content-center align-items-center">
                    <div class="mobile-download-text">DOWNLOAD GROCERY<br />FOR WEEK <span class="download-week-num">1</span>!</div>
                    <svg class="icon" width="40" height="40" fill="white" style="flex: 0 0 1.6rem"><use xlink:href="#download"></use></svg>
                </div>
            </a>
        </div>
    </section>

    <section id="quickstart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="position-relative">
                        <div class="mp-arrow d-none d-sm-block">
                            <picture>
                                <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_arrow.webp" type="image/webp">
                                <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_arrow.png" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-7 col-sm-6 col-md-4 col-lg-3">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_quickstart.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_quickstart.png" alt="">
                    </picture>
                </div>            
            </div>        
            <div class="row no-gutters">
                <div class="col-12 pl-0 pr-0 pl-md-auto pr-md-auto">                        
                    <h2 class="text-center blue-color proxima-nova-bold red-color mt-4 mb-3">Simple Keto Quick Start</h2>
                    <div class="quickstart-content">
                        <p class="proxima-nova-bold">Congratulations!  I'd like to talk for a minute about what you can expect on your keto journey.</p>
                        <p>First, it's very important to follow your meal plan. You can mix up meals as you like such as switching breakfasts around however you want to avoid combining normal meals in with these keto meals. This is to force your metabolism to make the switch — and more importantly trigger your fat flush.</p>
                        <p>We’ve done the hard work in calculating the exact ratios and numbers so you don’t need to do any math.</p>
                        <p>The important thing is to stick to your meal plan. We have put together some information and resources to help you along your way, below</p>

                        <h3 class="mt-4 blue-color proxima-nova-bold">What About My Cravings?</h3>
                        <p>The best way to deal with the cravings is having keto friendly that are both delicious and healthy.  They keep you fully satisfied for hours on end, and fuel you with energy the whole day long. The best solution we know is the <span class="proxima-nova-bold">Konscious Keto Shake</span>.</p>
                        <p>In between meals, you never want to feel hungry. That's the simplest way to stick to your meal plan. The problem with cravings is that they bypass your conscious mind, and have you reaching for sweet things that may throw you out of keto.</p>
                        <p>That's why we made <span class="proxima-nova-bold">Keto Shake</span>.  It's a creamy, sweet milkshake that will NEVER hurt your KETO. It's made with grass-fed whey protein and Avocado Oil. Organic Agave - powerful prebiotics, and ultra purified MCT Oil. It's Konscious Brand, so you the ingredients are second to none, and be prepared to save money by choosing a multi-pack.</p>
                        <p class="proxima-nova-bold">100% Money Back Guarantee.  Try it for 30 days and use coupon code <span class="red-color" style="font-style: initial;">Welcome10</span> to save 10% on your order. 100% Natural, comes in 5 different flavors, with no artificial anything. <a href="https://konsciousketo.com/pages/keto-shake-multi" class="blue-color" target="_blank">Click here</a> to claim yours now.</p>
                        <p>Highly recommended. We've heard from many meal plan customers who were thrilled with the Konscious Keto Shake — and they use it to stay in keto, stop their cravings, and when you have a supply of keto shake in the house, it makes your weight loss fun, simple, and delicious.</p>

                        <h3 class="mt-4 blue-color proxima-nova-bold">What If I'm Active Or Work Out?</h3>
                        <p>If you're looking for a keto-friendly pre-work out, that contains NO stimulants - look no further than Keto Activate. Keto Activate gives you an immediate energy boost simply by flooding your bloodstream with ketones — <span class="font-weight-bold">30 seconds</span> after you drink it.</p>
                        <p>The best part is, this the first product of it's kind that tastes great. It's a creamy chocolate drink you can take first thing in the morning as a keto-boosting wake me up, or take it with you to the gym as a pre-workout drink, or if you're in school, a late night study session.</p>
                        <p>And it's stimulant free — it works by fueling your body with pure ketones, which is the body's preferred energy source. Which is why you'll never crash. Just pure clean energy and focus.  It's compatible with your keto meal plan, too.  <a href="https://konsciousketo.com/pages/ketoactivate" class="blue-color" target="_blank">Click here</a> and get yours now.</p>
                        <p>Many people have reported having more energy and strength while in keto, and burning fat for energy means you'll be able to go the distance as well.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if ($page == "resource") { ?>
    <section id="recom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h2-area text-center mb-5">                            
                        <h2 class="mt-3">How to Become<br />The Next Keto Success Story</h2>
                    </div>
                    <p class="proxima-nova-bold">Congratulations on unlocking your custom Keto Meal Plan!</p>
                    <p>These special fat-burning recipes can help you get into the incredible, metabolic fat-burning state of ketosis.  
                        Unlike other diet plans, keto works when you eat more of the right stuff, and with all these super delicious meals, you won’t believe your eyes (or your waistband).</p>
                    <p>And the best part is, you can adjust the portion size to satisfy your cravings.   
                        Simply begin to listen to your body. As a general rule if you are hungry eat more, if you aren’t hungry skip meals. You’ll find keto naturally reduces your hunger and cravings as you begin to access stored fat for energy.</p>
                    <p>Feel free to click around and start exploring all the delicious snacks, dinners, and desserts that are coming your way.</p>

                    <h3 class="mt-4 blue-color proxima-nova-bold">People on a Keto Diet Often Report:</h3>
                    <ul class="proxima-nova-bold ml-4">
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Reduced appetite</span>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Rapid weight loss</span>
                        </li> 
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Reduction in abdominal fat</span>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Increased energy</span>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Improved focus</span>
                        </li>
                    </ul>
                    <p>For many people, keto is not just a “diet” but a way of life. It’s quick, easy and delicious, and can transform your whole quality of living.</p>

                    <h3 class="mt-4 blue-color proxima-nova-bold">Now That You’re Ready to Start, be Sure to:</h3>
                    <ul class="proxima-nova-bold ml-4">
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Feel free to switch the meals in your meal plan around as you like but avoid mixing in normal meals to your plan unless they are very low carb. We’ve taken all the math out for you however if you eat out or eat outside your plan then religiously count your carbs and aim to eat under 7-10 grams of carbs per meal. There is no need to count anything if you are following your plan.</span>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Drink Lots of Water: the keto diet will flush out your system, and you must replace this water loss with extra hydration to reap the rewards.</span>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#f9464b"><use xlink:href="#check-solid"></use></svg>
                            <span>Test for Ketones: we recommend using these inexpensive <a href="https://www.amazon.com/gp/product/B07YDYQ7B8/ref=as_li_tl?ie=UTF8&tag=konscious-20&camp=1789&creative=9325&linkCode=as2&creativeASIN=B07YDYQ7B8&linkId=d144d21aadabb0c3346d047dbbb34b73" target="_blank" class="proxima-nova-bold">ketone testing strips</a> in the first few weeks, only to see if your body is producing ketones.</span>
                        </li>
                    </ul>

                    <p>
                        The best part about keto is that it works, with or without fasting, and we want you to eat all of your tasty meals guilt-free to really appreciate your keto experience. 

                        Simply focus on reducing your carbs and give your first recipe a try. 

                        We know you’ll become a keto believer once you taste how incredible and delicious your custom recipes are — they’re almost too good to be true… almost! 
                    </p>

                    <p>
                        We can’t wait to hear about your promising transformation! 

                    </p>
                    <p>
                        From the Konscious Keto Team 
                    </p>                        
                </div>
            </div>
        </div>
    </section>

    <section class="container pt-3 pb-3" id="articles">
        <div class="row">
            <div class="col-12">
                <div id="article-slider">
                    <a href="https://konsciousketo.com/blogs/keto/the-beginners-guide-to-konscious-keto" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-1-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-1-min.jpg" alt="">
                        </picture>
                        <p class="title">A Beginner’s Guide to Keto</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/low-carb-meal-replacement" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-12-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-12-min.jpg" alt="">
                        </picture>
                        <p class="title">Low Carb Meal Replacements</p>
                    </a>
                    <a href="https://konsciousketo.com/products/keto-shake-strawberry-cheesecake" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-3-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-3-min.jpg" alt="">
                        </picture>
                        <p class="title d-none d-sm-block">10% OFF Strawberry Cheesecake Keto Shake</p>
                        <p class="title d-block d-sm-none">10% OFF Strawberry Keto Shake</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/the-ketogenic-diet-for-women?_pos=5&_sid=c690a0931&_ss=r" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-4-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-4-min.jpg" alt="">
                        </picture>
                        <p class="title">Keto Diet For Women</p>
                    </a>
                    <a href="https://konsciousketo.com/pages/keto-drinks" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-5-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-5-min.jpg" alt="">
                        </picture>
                        <p class="title">Easy n’ Delicious Keto Drinks</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/how-to-start-a-keto-diet" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-6-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-6-min.jpg" alt="">
                        </picture>
                        <p class="title">Start a Keto Diet: Mindset Training</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/intermittent-fasting-on-a-keto-diet?_pos=2&_sid=d02a9e9f7&_ss=r" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-8-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-8-min.jpg" alt="">
                        </picture>
                        <p class="title">Intermittent Fasting</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/keto-smoothies" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-11-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-11-min.jpg" alt="">
                        </picture>
                        <p class="title d-none d-sm-block">5 Keto Smoothies to Kickstart Your Day!</p>
                        <p class="title d-block d-sm-none">5 Keto Smoothies For Energy!</p>
                    </a>
                    <a href="https://konsciousketo.com/products/keto-shake-banana" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-13-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-13-min.jpg" alt="">
                        </picture>
                        <p class="title d-none d-sm-block">10% OFF Banana Creme Brulee Keto Shake</p>
                        <p class="title d-block d-sm-none">10% OFF Banana Keto Shake</p>
                    </a>
                    <a href="https://konsciousketo.com/blogs/keto/ketogenic-sweetener?_pos=1&_sid=8747b823b&_ss=r" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-10-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-10-min.jpg" alt="">
                        </picture>
                        <p class="title">Ketogenic Sweeteners</p>
                    </a>
                    <a href="https://konsciousketo.com/pages/keto-snacks" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-2-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-2-min.jpg" alt="">
                        </picture>
                        <p class="title">Easy n’ Delicious Keto Snacks</p>
                    </a>
                    <a href="https://konsciousketo.com/pages/keto-activate-gc" target="_blank" class="article-item">
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-9-min.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mealplan-slider-9-min.jpg" alt="">
                        </picture>
                        <p class="title d-none d-sm-block">10% OFF Exogenous Ketones in Dark Chocolate Truffle</p>
                        <p class="title d-block d-sm-none">10% OFF Choc Exogenous Ketones</p>
                    </a>
                </div>
            </div>                
        </div>
    </section>
    <section id="summary" class="text-center d-none">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Profile Summary</h2>
                </div>
            </div>
            <div class="row position-relative">
                <div class="col-xl-4 col-md-6">
                    <div class="summary-item inner-shadow-container bmi body-change">
                        <h3>BMI</h3>
                        <p class="your-status">You are likely: <span class="text-value font-size-base">OVERWEIGHT</span>
                            <br />
                            <span class="number-value">27.10</span>
                        </p>                           

                        <svg id="bodychange-female" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 208.37 239">
                        <defs>
                        <clipPath id="b4f10464-900d-4155-b313-524e5ee8153f">
                            <rect x="318" y="103" width="104" height="229" style="fill: none"/>
                        </clipPath>
                        <clipPath id="c437e97d-ea11-4b0c-8979-acd3546cc6d2">
                            <path d="M404.13,203.39c-2.2-7.18-5.22-17.87-5.69-19.45s-1.92-26.16-3.6-32.12-6-6.54-7-7.24a3.77,3.77,0,0,0-2.56-.41A3.59,3.59,0,0,0,383,143l.08.38a15.92,15.92,0,0,1-4.39-2.85,14.24,14.24,0,0,1-2.59-7.8c4.43-4.09,4.43-7.32,4.43-7.43,1.11-.37,1.05-2.07,1.62-3.12a1.66,1.66,0,0,0-.34-2h.07s2.75-7.38-.89-12.7-10.47-4.4-10.47-4.4-6.77-1-10.47,4.4-.89,12.7-.89,12.7h.07a1.66,1.66,0,0,0-.34,2c.57,1,.95,3.12,1.69,3.12,0,.11.37,3.71,4.44,7.43a13.92,13.92,0,0,1-2.78,7.89,15.28,15.28,0,0,1-4.28,2.76L358,143a3.59,3.59,0,0,0-2.27,1.18,3.77,3.77,0,0,0-2.56.41c-1,.7-5.34,1.29-7,7.24s-3.14,30.55-3.6,32.12-3.49,12.27-5.69,19.45-2.79,8.86-2.79,8.86C333,214.17,331,222.87,331,222.87a4.36,4.36,0,0,0,.09,1c.08.14.29.76.4,1a3.91,3.91,0,0,0,.79.85c.08.08.23.49.52.87a2.42,2.42,0,0,0,.67.59,11.3,11.3,0,0,0,1.39,2c.5.41,1.72,1.81,3.14,3s1.36-.27.64-1.4a6.79,6.79,0,0,0-.56-.73c.57-.46,1.76-1.33,1.76-1.33s.8-.78.37-1.37-2.36,1.37-2.36,1.37a14.87,14.87,0,0,0,1.33-1.79c.05-.24-.45-.66-1.09-.11s-1.28,1.25-1.28,1.25a9.49,9.49,0,0,0,.89-1.32c.09-.28-.37-.65-1.13.09a.91.91,0,0,1-.4.24,31.19,31.19,0,0,1,1.1-5.82c.38-.53,1.12.23,1.24.78s-.1,3.68,1,4.68,1.16-.41,1-1.32a14,14,0,0,1,.2-4.14,7.28,7.28,0,0,0-.81-4.71,13.73,13.73,0,0,1-1.13-3.64s2.67-5,5.46-9.68a45,45,0,0,0,5-11c.52-2.22,1.16-5,1.4-5.95.07-.3.45-1.68,1-3.47l2.94-10.22a12.35,12.35,0,0,0,1,1.29c.09.17.18.35.26.53a22.43,22.43,0,0,1,1.12,3.19l0,.15a33,33,0,0,1-.41,8.69c-.2.87-2.55,4.19-5.29,12.85a19.3,19.3,0,0,0-1.67,6.29c-2,9.6-2.4,21.73-.16,30.31,1.87,7.13,4.45,15.21,5.77,19.72.31,1.26.63,2.52.83,3.16,0,.1,0,.19,0,.25,0,.79-.08,2.2-.07,3.6h0a71.28,71.28,0,0,0,.56,7.43c0,.3,0,.59,0,.83-.06,1.34-1.69,11.44,0,21.08s4.71,19.57,5.1,21.81-.35,6.48-.05,7.58a7.08,7.08,0,0,1,.66,2.71,8.68,8.68,0,0,1-2.41,4.28c-.72.71-1.34,1.12-1.43,1.93a1.41,1.41,0,0,0,.15,1.21c.27.33,1.06.42,2.07.44s2.46,0,3.92,0h4.23s1.83,0,1.44-1.4-.86-1.71-1.68-4.38a13.84,13.84,0,0,1-.64-3.65c0-.27.06-1.75.13-2.06a6.17,6.17,0,0,0,.34-2.88h0a4.38,4.38,0,0,0-.27-1,19.2,19.2,0,0,1-1.22-6.52c0-1.71,0-12.44.64-16.59s-.47-8.81-.7-12.14a80.88,80.88,0,0,1,.09-8.24l.11-1.71a16.39,16.39,0,0,0,.91-4.08l0,.09a14.52,14.52,0,0,0,.13-3c-.23-3.86-.58-7.07-.7-9.23s.47-12-.14-20.5c-.1-1.4-.14-2.68-.15-3.86,0-.5.4-5.54.66-8.74a9.16,9.16,0,0,0,.13-1.69c0-.37.06-.65.07-.79a10.16,10.16,0,0,1,.4-1.92,6.59,6.59,0,0,0,2.29.27v0a6.59,6.59,0,0,0,2.29-.27,10.16,10.16,0,0,1,.4,1.92c0,.14,0,.42.07.79a9.16,9.16,0,0,0,.13,1.69c.26,3.2.63,8.24.66,8.74,0,1.18-.05,2.46-.15,3.86-.61,8.5,0,18.34-.14,20.5s-.47,5.37-.7,9.23a14.52,14.52,0,0,0,.13,3l0-.09a16.39,16.39,0,0,0,.91,4.08l.11,1.71a80.88,80.88,0,0,1,.09,8.24c-.23,3.33-1.34,8-.7,12.14s.64,14.88.64,16.59a19.2,19.2,0,0,1-1.22,6.52,4.38,4.38,0,0,0-.27,1h0a6.17,6.17,0,0,0,.34,2.88c.07.31.12,1.79.13,2.06a13.84,13.84,0,0,1-.64,3.65c-.82,2.67-1.29,3-1.68,4.38s1.44,1.4,1.44,1.4h4.23c1.46,0,2.84,0,3.92,0s1.8-.11,2.07-.44a1.41,1.41,0,0,0,.15-1.21c-.09-.81-.71-1.22-1.43-1.93a8.68,8.68,0,0,1-2.41-4.28,7.08,7.08,0,0,1,.66-2.71c.3-1.1-.44-5.35-.05-7.58s3.44-12.18,5.1-21.81,0-19.74,0-21.08c0-.24,0-.53,0-.83a71.28,71.28,0,0,0,.56-7.43h0c0-1.4-.07-2.81-.07-3.6,0-.06,0-.15,0-.25.2-.64.52-1.9.83-3.16,1.32-4.51,3.9-12.59,5.77-19.72,2.24-8.58,1.87-20.71-.16-30.31a19.3,19.3,0,0,0-1.67-6.29c-2.74-8.66-5.09-12-5.29-12.85a33,33,0,0,1-.41-8.69l0-.15a22.43,22.43,0,0,1,1.12-3.19c.09-.18.17-.36.26-.53a12.35,12.35,0,0,0,1-1.29l2.94,10.22c.51,1.79.89,3.17,1,3.47.24,1,.88,3.73,1.4,5.95a45,45,0,0,0,5,11c2.79,4.67,5.46,9.68,5.46,9.68a13.73,13.73,0,0,1-1.13,3.64,7.28,7.28,0,0,0-.81,4.71,14,14,0,0,1,.2,4.14c-.17.91-.09,2.31,1,1.32s.86-4.13,1-4.68.86-1.31,1.24-.78a31.19,31.19,0,0,1,1.1,5.82.91.91,0,0,1-.4-.24c-.76-.74-1.22-.37-1.13-.09a8.68,8.68,0,0,0,.89,1.32s-.65-.7-1.28-1.25-1.14-.13-1.09.11a14.87,14.87,0,0,0,1.33,1.79s-1.92-2-2.36-1.37.37,1.37.37,1.37,1.19.87,1.76,1.33a6.79,6.79,0,0,0-.56.73c-.73,1.13-.78,2.59.64,1.4s2.64-2.6,3.14-3a11.3,11.3,0,0,0,1.39-2,2.42,2.42,0,0,0,.67-.59c.29-.38.44-.79.52-.87a3.91,3.91,0,0,0,.79-.85c.11-.29.32-.91.4-1a4.36,4.36,0,0,0,.09-1s-1.95-8.7-3.08-10.62c0,0-.58-1.68-2.79-8.86Z" style="fill: none;clip-path: url(#b4f10464-900d-4155-b313-524e5ee8153f);clip-rule: evenodd"/>
                        </clipPath>
                        <clipPath id="87f96100-0b08-49e2-a8c9-c2d5b00347bd" transform="translate(-318 -98)">
                            <rect x="318" y="103" width="104" height="229" style="fill: none"/>
                        </clipPath>
                        <clipPath id="fde9e3f4-8f8c-4604-9542-fd0b6d9cae1d" transform="translate(-318 -98)">
                            <rect x="318" y="-460" width="612" height="792" style="fill: none;clip-path: url(#c437e97d-ea11-4b0c-8979-acd3546cc6d2)"/>
                        </clipPath>
                        </defs>
                        <title>Female body_mine</title>
                        <g>
                        <g style="clip-path: url(#87f96100-0b08-49e2-a8c9-c2d5b00347bd)">
                        <image width="312" height="693" transform="translate(0 4) scale(0.33)" xlink:href="data:image/png;base64,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"/>
                        </g>
                        <g style="clip-path: url(#fde9e3f4-8f8c-4604-9542-fd0b6d9cae1d)">
                        <rect x="8" width="89" height="239" style="fill: #f8434a"/>
                        </g>
                        </g>
                        <g id="03d0c34b-db4b-41f5-b806-5f7e4b40a0f5" data-name="Neck" style="isolation: isolate">
                        <text transform="translate(166.65 30.8)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Neck 5%</text>
                        </g>
                        <g id="3a112563-136e-42c4-aab8-cef40a7e2559" data-name="Arm" style="isolation: isolate">
                        <text transform="translate(170.99 67.84)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Arm 8%</text>
                        </g>
                        <g id="3816e07a-bfd9-4976-b61d-d662c0e1ed84" data-name="Tummy" style="isolation: isolate">
                        <text transform="translate(149.58 104.89)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Tummy 20%</text>
                        </g>
                        <g id="c00eab21-19c2-4768-8fff-f0ab8957ac28" data-name="Thigh" style="isolation: isolate">
                        <text transform="translate(158.79 149.18)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Thigh 10%</text>
                        </g>
                        <path id="69781bed-eb48-4c5b-bf9a-e01f47825be1" data-name="Line 3" d="M377.44,132.42H526.28" transform="translate(-318 -98)" style="fill: none;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="5bf70675-0d96-46c0-afab-bad98b9cb237" data-name="Line 3 Copy" d="M404.26,171.59h122" transform="translate(-318 -98)" style="fill: none;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="597103b0-089e-4211-b7d2-a172d2791f78" data-name="Line 3 Copy 2" d="M370,208.21H526.28" transform="translate(-318 -98)" style="fill: none;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="5f1c9579-d573-4b2a-b661-d7de292e691a" data-name="Line 3 Copy 3" d="M395.75,252.5H526.28" transform="translate(-318 -98)" style="fill: none;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        </svg>

                        <svg id="bodychange-male" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="215.51" height="239.57" viewBox="0 0 215.51 239.57">
                        <defs>
                        <clipPath id="fcf82770-71eb-430d-8017-eacd65c96a99" transform="translate(-310.86 -97.36)">
                            <path d="M425.93,225.73c-.15-.42-1.64-4-2.78-7.12,0,0-1-15.75-3.29-33.61s-7.12-30.53-11.43-36.63a15,15,0,0,0-7.91-5.5c-.31-.09-.61-.18-.9-.25a93.77,93.77,0,0,1-8.84-3.52c-3.57-1.58-9-3.79-10.39-6L380,132a4.12,4.12,0,0,0,.34-.7,21.17,21.17,0,0,0,.52-5.69,1.11,1.11,0,0,0,.74-.63c.46-.86,1.54-2.63,2.22-3.68a1.52,1.52,0,0,0-1.32-2.28,1.25,1.25,0,0,0-.47.16c.62-2.28,1.68-5.92,2-7.91.44-2.62-1.68-6.25-6-7.82a21.52,21.52,0,0,0-7.24-1.48,19.42,19.42,0,0,0-6.54,1.48c-4.33,1.57-7.15,5.2-6.71,7.82.34,2,1.4,5.63,2,7.91a1.3,1.3,0,0,0-.48-.16,1.52,1.52,0,0,0-1.31,2.28c.68,1,1.76,2.82,2.22,3.68a1.11,1.11,0,0,0,.74.63,21.17,21.17,0,0,0,.52,5.69,3.81,3.81,0,0,0,.29.61l-.61,1.29c-1.62,2.31-7.37,4.67-10.77,6-7.59,2.93-10.35,4.09-10.35,4.09a14.57,14.57,0,0,0-6.7,5.07c-4.31,6.1-9.12,18.75-11.43,36.63s-3.29,33.6-3.29,33.61c-1.14,3.09-2.63,6.7-2.78,7.12a2.18,2.18,0,0,0,.41,1.7c.13.19.71.6,1.17,1s1.42.5,1.67.61,2.5,2.14,3.33,2.68,3.42,2.28,4.63,2.5,2.42-.25,4.29-1.64,1.29-2.17.46-2.17a1.18,1.18,0,0,0-.38.08c.25-.27.44-.63.1-.93-.63-.56-3.38,1.29-3.38,1.29a17.15,17.15,0,0,0,1.91-1.68c.06-.23-.66-.62-1.56-.11s-1.85,1.18-1.85,1.18a9.48,9.48,0,0,0,1.28-1.24c.13-.27-.53-.62-1.62.08a1.62,1.62,0,0,1-1.18.25,2.83,2.83,0,0,1,.43-2.41c.41-.85,1.92-4.14,2.46-4s.62,1.84.62,3,1,3.31,2.17,3.31,1.33-1.36,1.21-2.95.33-2.34.42-4.37-2-3.56-2.76-4.77a22.69,22.69,0,0,1-1.21-2.14c.54-2.28,1.6-6.65,3-11.61,0-.1,2.32-7.2,2.88-9.58h0c.33-1,.67-2,1-3,1.32-3.45,3.37-8.15,3.42-8.27-.13.49-.25.91-.34,1.23a47.26,47.26,0,0,0-1.72,7.37c0,.22-.07.46-.1.72s0,.29-.05.43q0,.45-.09,1l0,.17a30.67,30.67,0,0,0,0,4.61,22.21,22.21,0,0,0-1.08,3.13c-.92,3.32-.27,4.75.18,5.29a.89.89,0,0,1,.17.89,3.75,3.75,0,0,1-.62,1.08c-.6.74-.1,3.3,0,3.88a1,1,0,0,1,0,.24c0,.67-.25,3.86,1.12,4.14l.23,0a123.32,123.32,0,0,0,3.33,22c3.76,15.48,7.84,22.8,6.3,29.34s-1,19.09,2.31,28a122.14,122.14,0,0,1,5.64,22.23h0a5.07,5.07,0,0,1,0,.73,18.44,18.44,0,0,0-.76,2.52c0,.8.48,1.62.48,2.58a12.21,12.21,0,0,1-1.9,4.28c-.55.72-2.18,2-2,2.44.11.25.56.38,1,.45h0l.47.06.31.12a2.62,2.62,0,0,0,1.1.5,3.53,3.53,0,0,0,.83.07,4.11,4.11,0,0,0,.69-.07l.35.12h0a3.54,3.54,0,0,0,1.28.21h-.05l1-.07h1.23l.58.05s.09.07.57,0h.12a1.88,1.88,0,0,0,.8-.27s.1.29.62.29h1.27c.36,0,.77,0,1.25,0,2.22-.09,3-.2,3.11-1a2.22,2.22,0,0,0-.48-2.05c-.55-.58-2-4.92-1.76-5.93a3.94,3.94,0,0,1,.14-.51,5.72,5.72,0,0,0,.59-1.39,3.54,3.54,0,0,0-.14-2,4.88,4.88,0,0,0-.8-1.28,7.88,7.88,0,0,1-.41-2.54c0-1.76.67-6.85,1.12-11.46s1.34-14.27.71-19.76-.65-11-.22-13.38c.21-1.22.92-3.49,1.66-6.35a66.32,66.32,0,0,0,2.24-11.11c.41-4.87,1.33-22.37,1.37-23.22a1.33,1.33,0,0,0,1,0c0,.85,1,18.35,1.37,23.22a66.32,66.32,0,0,0,2.24,11.11c.74,2.86,1.45,5.13,1.66,6.35.43,2.41.41,7.88-.22,13.38s.26,15.15.71,19.76,1.15,9.7,1.13,11.46a8.09,8.09,0,0,1-.42,2.54,4.88,4.88,0,0,0-.8,1.28,3.54,3.54,0,0,0-.14,2,6.14,6.14,0,0,0,.59,1.39,3.94,3.94,0,0,1,.14.51c.21,1-1.21,5.35-1.76,5.93a2.22,2.22,0,0,0-.48,2.05c.1.85.89,1,3.11,1,.48,0,.89,0,1.25,0h1.27c.52,0,.62-.29.62-.29a1.82,1.82,0,0,0,.8.27h.12c.48,0,.57,0,.57,0l.58-.05h1.23l1,.07h-.05a3.54,3.54,0,0,0,1.28-.21h0l.35-.12a4.11,4.11,0,0,0,.69.07,3.53,3.53,0,0,0,.83-.07,2.69,2.69,0,0,0,1.1-.5l.3-.12.48-.06h0c.4-.07.85-.2,1-.45.21-.46-1.42-1.72-2-2.44a12.21,12.21,0,0,1-1.9-4.28c0-1,.48-1.78.48-2.58a18.44,18.44,0,0,0-.76-2.52,5.07,5.07,0,0,1,0-.73h0A122.14,122.14,0,0,1,393.37,296c3.34-8.89,3.85-21.43,2.31-28s2.54-13.86,6.3-29.34a123.32,123.32,0,0,0,3.33-22l.23,0c1.37-.28,1.17-3.47,1.12-4.14a1,1,0,0,1,0-.24c.13-.58.63-3.14,0-3.88a3.75,3.75,0,0,1-.62-1.08.89.89,0,0,1,.17-.89c.44-.54,1.1-2,.18-5.29a22.21,22.21,0,0,0-1.08-3.13,32.52,32.52,0,0,0-.47-8.09v0a47.56,47.56,0,0,0-1.34-5.53h0s-.21-.8-.54-1.92h0c.05.13,2.1,4.82,3.42,8.27.35,1,.69,2,1,3,.56,2.38,2.85,9.48,2.88,9.58,1.37,5,2.43,9.33,3,11.61a21,21,0,0,1-1.22,2.14c-.79,1.21-2.83,2.74-2.75,4.77s.55,2.77.42,4.37,0,2.95,1.21,2.95,2.17-2.16,2.17-3.31.08-2.88.62-3,2.05,3.18,2.46,4a2.83,2.83,0,0,1,.43,2.41,1.62,1.62,0,0,1-1.18-.25c-1.09-.7-1.75-.35-1.62-.08a9.48,9.48,0,0,0,1.28,1.24s-.94-.66-1.85-1.18-1.62-.12-1.56.11a17.15,17.15,0,0,0,1.91,1.68s-2.75-1.85-3.38-1.29c-.34.3-.15.66.1.93a1.18,1.18,0,0,0-.38-.08c-.83,0-1.42.77.46,2.17s3.08,1.86,4.29,1.64,3.8-1.95,4.63-2.5,3.08-2.57,3.33-2.68,1.21-.17,1.67-.61,1-.85,1.17-1a2.14,2.14,0,0,0,.41-1.7Z" style="fill: none;clip-rule: evenodd"/>
                        </clipPath>
                        <clipPath id="9601c764-272c-41fa-9db0-e05ca67b231e" transform="translate(-310.86 -97.36)">
                            <path d="M387.77,185.11a1.09,1.09,0,0,1,0-.17v.17Zm-33.17,0c0-.11,0-.17,0-.17s0,.12,0,.17Zm53.7,40.3c-.37-1.61-.83-3.2-1.23-4.8a40.86,40.86,0,0,1-1.33-6.17,52.71,52.71,0,0,1,.2-6.28,82.85,82.85,0,0,0-.27-10.8,95.56,95.56,0,0,0-1.79-11.28h0c-.12-.87-.25-1.75-.43-2.62a13.68,13.68,0,0,1-.6-3.76l0,.11a66.74,66.74,0,0,0,.17-7.35,37.66,37.66,0,0,0-1.5-7.65h0a15,15,0,0,1-.79-6c.23-2.05.66-3.87.26-5.94a11.79,11.79,0,0,0-8.48-9.28c-.74-.2-1.5-.23-2.24-.39a10.1,10.1,0,0,1-2-.78,7.55,7.55,0,0,0-2-.34l-1.15-.37-.24.07a10.19,10.19,0,0,1-4.59-2.8,12.69,12.69,0,0,1-2.36-4.66l-.38-1.5a16,16,0,0,0,1.89-1.88,3.11,3.11,0,0,0,.55-1.79h0v0c.07-.75.14-1.73.21-2.78.85.27,1.7-2.7,1.95-3.26a3.3,3.3,0,0,0,.57-2.22c-.15-.6-.74-1.36-1.4-.88.45-2.25.94-4.49,1.31-6.75a7.2,7.2,0,0,0-1.13-5.66c-2.3-3.21-6.62-4-10.34-3.61-3.72-.42-8,.4-10.34,3.61a7.23,7.23,0,0,0-1.12,5.66c.36,2.26.86,4.5,1.3,6.75-.66-.47-1.24.28-1.4.88a3.35,3.35,0,0,0,.57,2.22c.26.56,1.1,3.53,2,3.26.06,1,.13,2,.21,2.78v0h0a3.07,3.07,0,0,0,.54,1.78,15.56,15.56,0,0,0,1.86,1.86l-.39,1.53A12.52,12.52,0,0,1,362,139a10.27,10.27,0,0,1-4.56,2.79l-.24-.06-1.14.37a11.76,11.76,0,0,0-1.56.15c-.63.2-1.2.59-1.83.81a18,18,0,0,1-2.17.4,11.81,11.81,0,0,0-5.15,2.47,12,12,0,0,0-3.78,6.11,13.17,13.17,0,0,0-.09,5.59,12.63,12.63,0,0,1,.17,3.83,26.19,26.19,0,0,1-.8,3.37h0a37.8,37.8,0,0,0-1.5,7.65,64.41,64.41,0,0,0,.16,7.35l0-.11a13.72,13.72,0,0,1-.59,3.76c-.18.87-.31,1.75-.44,2.62h0a87.22,87.22,0,0,0-2.1,16.17c-.07,2.54,0,5.08.11,7.62a34.48,34.48,0,0,1,.13,4.54,29.7,29.7,0,0,1-.89,4.37c-.41,1.72-.85,3.43-1.3,5.15-.31,1.21-.69,2.34.1,3.48a2.94,2.94,0,0,0,1.11,1.13,2,2,0,0,1,.62.33,16.3,16.3,0,0,1,1.49,1.91,16.73,16.73,0,0,0,1.8,1.87c.57.52,1.31,1.31,2.16,1.23,1-.11,2.07-1.36,2.6-2.16.24-.35.74-2.15-.33-1.57.58-1-.2-1.15-.87-.69a7.13,7.13,0,0,0-1.21,1c.27-.34,1.22-1.19,1.2-1.64,0-1.19-1.91.77-2.16,1,.18-.23,1-1,.81-1.35-.3-.66-1.29.58-1.78.46a5.42,5.42,0,0,1,.47-3c.27-.84.52-1.69.86-2.51.16-.39.39-1.17.71-.51.39.83.15,2,.21,2.93a4.77,4.77,0,0,0,.87,2.66c.72.81,1.16-.2,1.25-.89.14-1.12,0-2.25.07-3.37a14.32,14.32,0,0,0,.16-3.52,12.34,12.34,0,0,0-1.52-3.47,19,19,0,0,1-1.12-3c0-4.08,1.6-7.75,2.82-11.56a34.18,34.18,0,0,0,1.37-5.82c.26-1.9.26-3.82.39-5.74a34.92,34.92,0,0,1,.77-4.44c.56-1.88,1.16-3.69,1.54-5.62h0c1.1-3.84,2-7.73,3-11.6a9.23,9.23,0,0,0,2,4.35,1.08,1.08,0,0,1,.14.23,9.35,9.35,0,0,0,.06,4.18,10.69,10.69,0,0,1,.66,3.27,15.36,15.36,0,0,0-.28,1.65,12.66,12.66,0,0,0,.17,1.74c-.39,1.39-.71,2.8-1,4.2h0a9.87,9.87,0,0,0-.2,3.94l.31,2.26-.13.86h0a33,33,0,0,0-1,3.7c-1.32,3.28-1.13,9.89-1.13,9.89a139.08,139.08,0,0,0,.84,37.63c.37,2.31.79,4.61,1.3,6.9h0c.28,1.26.63,2.51.88,3.78a16.6,16.6,0,0,1-.32,3.64,42.28,42.28,0,0,0,.14,4.5,16.47,16.47,0,0,1-.41,3.49A77.11,77.11,0,0,0,352.15,285c.14,6,2.38,11.63,4,17.29A56,56,0,0,1,358,316.14a9.46,9.46,0,0,1-.46,2.77c-.38,1.48.47,2.88.06,4.38a12.35,12.35,0,0,1-1.33,3.29c-.45.72-2.44,2.39-.72,2.77h0l.36.06h0l.23.11a2,2,0,0,0,1.48.57,2.53,2.53,0,0,0,.53-.07l.27.11h0a2.18,2.18,0,0,0,1,.21h0l.8-.07h1l.43.05h0a1.1,1.1,0,0,0,.51,0,1.23,1.23,0,0,0,.63-.27c.21.48,1.19.28,1.61.27h-.15c.81,0,2.69.24,3.22-.58s-.12-2.09-.47-3a18.37,18.37,0,0,1-.83-3A6.35,6.35,0,0,1,366,321a4.75,4.75,0,0,0-.09-4.37,7.88,7.88,0,0,1-1-3.17,62.93,62.93,0,0,1-.23-8.9c.12-3.65.71-7.26,1-10.9a73,73,0,0,0,.17-7.83c-.1-3.23-.46-6.44-.7-9.66a21.56,21.56,0,0,1,1-6.32,36.07,36.07,0,0,0,1.2-8.77c.16-3.63.86-7.18,1.32-10.79.4-3.17.74-6.35,1-9.54a75.81,75.81,0,0,0,.31-8.12c0-3-.25-6,0-9a2.31,2.31,0,0,0,1.29.25,2.09,2.09,0,0,0,1.21-.24c.23,3,0,6.09,0,9.14a78.14,78.14,0,0,0,.31,8,158.51,158.51,0,0,0,2,16.26,69.31,69.31,0,0,1,.53,7.21,26.32,26.32,0,0,0,.91,5.21,26.8,26.8,0,0,1,1.06,4.59,32.55,32.55,0,0,1-.25,6c-.22,2.5-.37,5-.39,7.53,0,5.81,1,11.51,1.2,17.3a62.85,62.85,0,0,1-.25,8.68,8.2,8.2,0,0,1-1,3.1,4.75,4.75,0,0,0-.1,4.37,6.19,6.19,0,0,1-.16,2.77,18.61,18.61,0,0,1-.86,3.11c-.34.86-1.07,1.94-.49,2.91s2.4.67,3.25.63H378c.43,0,1.38.2,1.6-.27a1.35,1.35,0,0,0,.64.27,1.05,1.05,0,0,0,.5,0h0l.43-.05h1l.8.07h0a2.21,2.21,0,0,0,1-.21h0l.27-.11a2.56,2.56,0,0,0,.54.07,2,2,0,0,0,1.47-.57l.24-.11h0l.37-.06h0c1.56-.34.07-1.69-.44-2.37a10.24,10.24,0,0,1-1.35-2.83,6.2,6.2,0,0,1-.17-3.62c.23-1.28-.43-2.28-.5-3.52a39.73,39.73,0,0,1,.34-5.77,50.45,50.45,0,0,1,1.06-7.35c1.37-5.59,3.69-10.9,4.33-16.67.58-5.3-.35-10.8-1.23-16a26.44,26.44,0,0,1-.69-4.32c0-1.45.21-2.9.19-4.36s-.58-3-.36-4.42c.25-1.27.61-2.52.88-3.78h0a136.39,136.39,0,0,0,2.77-36.72c-.13-2.61-.33-5.22-.63-7.81h0s.18-6.61-1.13-9.89a35.26,35.26,0,0,0-1-3.7h0l-.14-.86.31-2.26a9.87,9.87,0,0,0-.19-3.94h0c-.33-1.4-.65-2.81-1-4.2a14.44,14.44,0,0,0,.17-1.74c0-.56-.21-1.1-.28-1.65a10.68,10.68,0,0,1,.65-3.27,9.49,9.49,0,0,0,.07-4.18l0-.08c1.24-1.05,1.77-2.93,2.13-4.44,1,4,1.94,8,3.09,11.93h0c.35,1.93,1,3.7,1.53,5.58a40,40,0,0,1,.66,4.09c.13,1.92.14,3.84.39,5.74a35.16,35.16,0,0,0,1.37,5.82c1.23,3.81,2.83,7.48,2.82,11.56a24.18,24.18,0,0,1-.94,2.63c-.44,1-1.09,1.88-1.45,2.91a8.37,8.37,0,0,0-.17,3.66,28.78,28.78,0,0,1,.11,3.21c0,.52-.06,2.26.85,2.15s1.09-1.65,1.2-2.21c.21-1,.09-2,.21-3,.06-.48.17-1.34.61-.64a11.73,11.73,0,0,1,1,2.66c.33,1,.92,2.28.58,3.37-.43.11-1.54-1.11-1.78-.46-.13.35.62,1.1.82,1.35-.25-.26-2.13-2.22-2.17-1,0,.45.93,1.3,1.21,1.64a7.54,7.54,0,0,0-1.21-1c-.65-.44-1.48-.3-.88.69-.68-.37-.8.51-.66.95a5.5,5.5,0,0,0,2,2.35c1.47,1.05,2.66-.33,3.69-1.35s1.69-2.16,2.64-3.14c.45-.46,1-.54,1.46-1.09a3,3,0,0,0,.82-2.46c-.14-.61.16.68,0,0Z" style="fill: none;clip-rule: evenodd"/>
                        </clipPath>
                        </defs>
                        <title>Female body_mine_male</title>
                        <g>
                        <g style="clip-path: url(#fcf82770-71eb-430d-8017-eacd65c96a99)">
                        <rect width="119.79" height="239.57" style="fill: #fbc5c6"/>
                        </g>
                        <g style="clip-path: url(#9601c764-272c-41fa-9db0-e05ca67b231e)">
                        <rect x="18.57" y="1.86" width="83.57" height="235.86" style="fill: #f8434a"/>
                        </g>
                        </g>
                        <g id="54c483b2-3e9d-4e0d-a919-90c2258146a8" data-name="Neck" style="isolation: isolate">
                        <text transform="translate(173.79 31.44)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Neck 5%</text>
                        </g>
                        <g id="6f06239d-48c2-487b-8710-8abf992067ca" data-name="Arm" style="isolation: isolate">
                        <text transform="translate(178.13 68.49)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Arm 8%</text>
                        </g>
                        <g id="5f89811c-e741-4bcc-92d3-01dad97b22af" data-name="Tummy" style="isolation: isolate">
                        <text transform="translate(156.73 105.53)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Tummy 20%</text>
                        </g>
                        <g id="88821170-c262-4e45-8c2c-3ecc633edd70" data-name="Thigh" style="isolation: isolate">
                        <text transform="translate(165.93 149.82)" style="isolation: isolate;font-size: 10.645649909973145px;fill: #1f4092;font-family: 'Proxima Nova Bold';">Thigh 10%</text>
                        </g>
                        <path id="7cf07cff-43f0-44a6-a8c7-3e2c84521d3d" data-name="Line 3" d="M377.44,132.42H526.28" transform="translate(-310.86 -97.36)" style="fill: #1f4092;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="e5e5d5e0-4a77-4877-ac31-876db3d1c885" data-name="Line 3 Copy" d="M404.26,171.59h122" transform="translate(-310.86 -97.36)" style="fill: #1f4092;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="d0248e19-968e-49ec-9509-fb636d159403" data-name="Line 3 Copy 2" d="M370,208.21H526.28" transform="translate(-310.86 -97.36)" style="fill: #1f4092;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        <path id="9db7836d-6298-4070-93a2-7176367fdd11" data-name="Line 3 Copy 3" d="M395.75,252.5H526.28" transform="translate(-310.86 -97.36)" style="fill: #1f4092;stroke: #1f4092;stroke-miterlimit: 10;stroke-width: 0.25px"/>
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="summary-item inner-shadow-container metabolic_age">
                        <h3>METABOLIC AGE</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" width="272" height="134.734" viewBox="0 0 272 134.734">
                        <g id="Group_18" data-name="Group 18" transform="translate(0 -0.208)">
                        <text id="_39" data-name="39" transform="translate(152 0.208)" fill="#1f4092" font-size="30" letter-spacing="0.033em"><tspan class="m_actual_age" x="0" y="32">39</tspan></text>
                        <text id="_40" data-name="40" transform="translate(231 1.208)" fill="#1f4092" font-size="30" letter-spacing="0.033em"><tspan class="m_metabolic_age" x="0" y="32">40</tspan></text>
                        <path id="Line_4" data-name="Line 4" d="M1,0V86.145" transform="translate(228.5 34.061)" fill="none" stroke="gray" stroke-linecap="square" stroke-miterlimit="10" stroke-width="1"/>
                        <path id="Line_4-2" data-name="Line 4" d="M1.5.4V51.228" transform="translate(149 33.544)" fill="none" stroke="gray" stroke-linecap="square" stroke-miterlimit="10" stroke-width="1"/>
                        <g id="Stacked_Group" data-name="Stacked Group" transform="translate(0 67.044)">
                        <g id="Group_24" data-name="Group 24">
                        <path id="Rectangle_15_Copy" data-name="Rectangle 15 Copy" d="M15,0h0A15,15,0,0,1,30,15V150.755a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V15A15,15,0,0,1,15,0Z" transform="translate(151 0.755) rotate(90)" fill="#c0d2fc"/>
                        <text id="Actual_Age" data-name="Actual Age" transform="translate(0 6)" fill="#222" font-size="14" letter-spacing="0.063em"><tspan x="0" y="15" xml:space="preserve">  ACTUAL AGE</tspan></text>
                        </g>
                        <g id="Group_23" data-name="Group 23" transform="translate(0 37)">
                        <path id="Rectangle_15" data-name="Rectangle 15" d="M15,0h0A15,15,0,0,1,30,15V229.9a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V15A15,15,0,0,1,15,0Z" transform="translate(230 0.898) rotate(90)" fill="#ed2738"/>
                        <text id="Metabolic_age" data-name="Metabolic age" transform="translate(0 7)" fill="#fff" font-size="14" letter-spacing="0.071em"><tspan x="0" y="15" xml:space="preserve">  METABOLIC AGE</tspan></text>
                        </g>
                        </g>
                        </g>
                        </svg>

                        <p class="description">The metabolic age indicates the age of your body. If your metabolic age is higher than your actual age, it could mean you’re experiencing health problems or may need to change your eating and exercising habits.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">                        
                    <div class="summary-item inner-shadow-container achievable_weight">
                        <h3>ACHIEVABLE WEIGHT</h3>
                        <p class="your-status">Based on your answers, you could be…<br />
                            <span class="text-value">125</span>&nbsp;<span class="text-unit">lbs</span><br />
                            by&nbsp;<span class="limit-month">December, 2019</span>
                        </p>
                        <!--<img src="<?php echo keycdn_url() . 'assets/img/'; ?>sum-weight.svg">-->
                        <!--<object type="image/svg+xml" data="<?php echo keycdn_url() . 'assets/img/'; ?>sum-weight.svg"></object>-->


                        <svg id="sum-weight-loss-svg" data-name="sum-weight-loss-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 743 434.65">
                        <defs>
                        <linearGradient id="797e78ac-d162-43a4-849a-c42aae87340b" x1="4.28" y1="1.55" x2="4.55" y2="0.23" gradientTransform="translate(-2968 178.71) scale(743 253.22)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#dff2fa" stop-opacity="0"/>
                        <stop offset="1" stop-color="#b3b9d1"/>
                        </linearGradient>
                        </defs>
                        <title>weightloss</title>
                        <g id="670f6c1e-5de7-4675-a96b-1d7adcf41d5d" data-name="648a28d7-22f6-48c4-b90b-4da7a57fc8f3">
                        <rect id="b8dd13aa-c74e-4a7d-b5d4-c4039bc0dd5d" data-name="44095f5e-9172-4726-b2e0-5d4e091451eb" width="743" height="434.6" style="fill: #dff2fa"/>
                        <path id="c3855cfc-d97c-450a-891c-f119f3ca95ff" data-name="e1bb1e39-65fb-428b-9d3f-30a1e72d612f" d="M743,380.06v54.59H0V181.44H2.47C242.93,181.44,410.68,380.06,743,380.06Z" style="fill: url(#797e78ac-d162-43a4-849a-c42aae87340b)"/>
                        <ellipse id="895cf822-0b35-457e-83fc-b16d87132f10" data-name="9eee0b2d-359b-40d5-89f1-38e64f3f90d6" cx="133" cy="199.54" rx="11" ry="10.98" style="fill: #ff4c57"/>
                        <ellipse id="a8329a97-8190-4e47-98cc-6393bf3a2184" data-name="0a966221-948d-4773-a7c2-b99a943e9e44" cx="599" cy="366.16" rx="11" ry="10.98" style="fill: #ff4c57"/>
                        <g id="3cb47f10-7e1e-4f4c-bf76-87d7fe35bb51" data-name="e2ae55d6-5bed-47d3-9de4-78cc74692fde">
                        <text class="curr_day" transform="translate(98.61 59.69)" style="isolation: isolate;font-size: 28.799999237060547px;fill: #0b0b0b;font-family: 'Proxima Nova Regular';">Jul. 2019</text>
                        </g>
                        <g id="02113350-00b4-4caf-acc6-5750aef68885" data-name="6efac470-a369-49b2-afef-f6b8daf16330">
                        <text class="goal_day" transform="translate(559.96 59.69)" style="isolation: isolate;font-size: 28.799999237060547px;font-family: 'Proxima Nova Regular';">Dec. 2019</text>
                        </g>
                        <g id="46baeda0-afa8-47e3-8216-cd6b8dae103a" data-name="671f32b1-67ae-4a9e-9bc9-411f01dd1d3e">
                        <text class="curr_weight" transform="translate(105.07 139.67)" style="isolation: isolate;font-size: 36px;fill: #121313;font-family: 'Proxima Nova Regular';">170</text>
                        <text class="curr_unit" transform="translate(116.68 174.67)" style="isolation: isolate;font-size: 25.200000762939453px;fill: #121313;font-family: 'Proxima Nova Regular';">lbs</text>
                        </g>
                        <g id="d712f2ee-1417-4b08-b542-b29b0dfeaf28" data-name="1f2c9906-47f7-47e4-8434-c75ab8cf5403">
                        <text class="goal_weight" transform="translate(569.81 290.32)" style="isolation: isolate;font-size: 36px;fill: #f9464b;font-family: 'Proxima Nova Regular';">150</text>
                        <text class="goal_unit" transform="translate(583.11 326.32)" style="isolation: isolate;font-size: 25.200000762939453px;font-family: 'Proxima Nova Regular';">lbs</text>
                        </g>
                        </g>
                        </svg>

                        <svg id="sum-weight-gain-svg" data-name="sum-weight-loss-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 743 434.65" style="display: none;">
                        <defs>
                        <linearGradient id="8ba5ab0d-01b3-4593-8e9f-0b385667f3ff" x1="4.28" y1="1.55" x2="4.55" y2="0.23" gradientTransform="matrix(-743, 0, 0, 253.22, 3711, 178.71)" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#dff2fa" stop-opacity="0"/>
                        <stop offset="1" stop-color="#b3b9d1"/>
                        </linearGradient>
                        </defs>
                        <title>weightgain</title>
                        <g id="7957e051-43c5-4472-b0ba-ace93f089f5c" data-name="648a28d7-22f6-48c4-b90b-4da7a57fc8f3">
                        <rect id="ae3d2291-a13d-4e38-9a5a-41f85947619d" data-name="44095f5e-9172-4726-b2e0-5d4e091451eb" width="743" height="434.6" style="fill: #dff2fa"/>
                        <path id="3ba0dec0-86ee-447f-8c07-4dfda01bc3d8" data-name="e1bb1e39-65fb-428b-9d3f-30a1e72d612f" d="M740.53,181.44H743V434.65H0V380.06C332.32,380.06,500.07,181.44,740.53,181.44Z" transform="translate(0)" style="fill: url(#8ba5ab0d-01b3-4593-8e9f-0b385667f3ff)"/>
                        <ellipse id="0832ee3c-6bb1-4155-aa2e-9e8ebdfd5753" data-name="9eee0b2d-359b-40d5-89f1-38e64f3f90d6" cx="601" cy="203.54" rx="11" ry="10.98" style="fill: #ff4c57"/>
                        <ellipse id="127f053c-3b1f-4be9-b45a-86264be90b5b" data-name="0a966221-948d-4773-a7c2-b99a943e9e44" cx="135" cy="369.16" rx="11" ry="10.98" style="fill: #ff4c57"/>
                        <g id="c65375d5-a5d4-4ea2-97c2-c5c483788ee7" data-name="e2ae55d6-5bed-47d3-9de4-78cc74692fde">
                        <text class="goal_day" transform="translate(573 63.69)" style="isolation: isolate;font-size: 28.799999237060547px;fill: #0b0b0b;font-family: 'Proxima Nova Regular';">Jul. 2019</text>
                        </g>
                        <g id="0871a787-925c-47d0-8738-1c2868060526" data-name="6efac470-a369-49b2-afef-f6b8daf16330">
                        <text class="curr_day" transform="translate(100 62.69)" style="isolation: isolate;font-size: 28.799999237060547px;font-family: 'Proxima Nova Regular';">Dec. 2019</text>
                        </g>
                        <g id="9c6ba70b-829f-404c-86b4-7d9d2046ab52" data-name="671f32b1-67ae-4a9e-9bc9-411f01dd1d3e">
                        <text class="goal_weight" transform="translate(573.07 143.67)" style="isolation: isolate;font-size: 36px;fill: #f90000;font-family: 'Proxima Nova Regular';">170</text>
                        <text class="goal_unit" transform="translate(584.68 178.67)" style="isolation: isolate;font-size: 25.200000762939453px;fill: #121313;font-family: 'Proxima Nova Regular';">lbs</text>
                        </g>
                        <g id="c2b832c7-bf9a-452d-812d-f52e3adf9283" data-name="1f2c9906-47f7-47e4-8434-c75ab8cf5403">
                        <text class="curr_weight" transform="translate(105.81 293.32)" style="isolation: isolate;font-size: 36px;font-family: 'Proxima Nova Regular';">150</text>
                        <text class="curr_unit" transform="translate(119.11 329.32)" style="isolation: isolate;font-size: 25.200000762939453px;font-family: 'Proxima Nova Regular';">lbs</text>
                        </g>
                        </g>
                        </svg>




                        <p class="description">We have determined this by looking at your activity level, metabolic health, and fatigue score.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="summary-item inner-shadow-container keto_compatibility">
                        <h3>KETO COMPATIBILITY</h3>
                        <p class="your-status">Your compatibility is: <span class="text-value font-size-base">HIGH</span></p>
                        <div class="sum-item-img"></div>
                        <p class="description active-012">
                            We have determined that for your dietary profile, metabolic type, and your goals, the Keto Diet is HIGHLY COMPATIBLE.<br />
                            <br />
                            <span class="more-text">
                                Keto works by reprogramming your genes into a state of metabolic efficiency. 
                                In this state, your body goes into full “fat burning mode,” using stored fat as clean, long-lasting energy.<br />
                                <br />
                                You may notice VERY quickly some positive transformations begin to happen, as your body becomes slimmer, sexier and more youthful in appearance.<br />
                                <br />
                                Those annoying “I wanna eat it now” food cravings will begin to disappear as keto suppresses ghrelin, the hunger hormone.<br />
                                <br />
                                Your mental focus and alertness may begin to improve, as your body shifts from using glucose to ketones as its primary energy source.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                        </p>
                        <p class="description active-3" style="display: none;">
                            We have determined that for your dietary profile, metabolic type and your goals, the Keto Diet is HIGHLY COMPATIBLE.<br />
                            <br />
                            <span class="more-text">Keto works by reprogramming your genes into a state of metabolic efficiency. 
                                Because of your level of daily activity however, we would recommend being somewhat flexible with carb intake.<br />
                                <br />
                                Meaning, you do not have to restrict carbs as tightly as other people might have to. 
                                We recommend 30-70 grams of carbs per day, at your level of activity.<br />
                                <br />
                                You may notice VERY quickly some positive transformations begin to happen, as your body becomes leaner, sexier and more youthful in appearance.<br />
                                <br />
                                Those annoying “I wanna eat it now” food cravings will begin to disappear as keto suppresses ghrelin, the hunger hormone. Your mental focus and alertness may begin to improve, as your body shifts from using glucose to ketones as its primary energy source.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="summary-item inner-shadow-container anxiety_factors">
                        <h3>ANXIETY FACTORS</h3>
                        <p class="your-status">You may be: <span class="text-value font-size-base">HIGHLY STRESSED</span></p>
                        <div class="sum-item-img"></div>
                        <p class="description">
                            We have determined that you may be <span class="af_stress_text font-size-base">HIGHLY STRESSED</span>.<br />
                            <br />
                            <span class="more-text">
                                Stress is not just about how you feel. It also determines the types of hormones that will be released.
                                Stress hormones like cortisol, for example, will make your body much more likely to store food as fat, instead of turning it into useable energy.<br />
                                <br />
                                We have specifically identified meals for your custom plan to help lower this stress and anxiety, re-balance your hormones so that you feel focused, more calm and in control.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="summary-item inner-shadow-container energy_metabolism">
                        <h3>ENERGY METABOLISM</h3>
                        <p class="your-status">Your metabolism is: <span class="text-value font-size-base">SLOW BURNER</span></p>
                        <div class="sum-item-img"></div>
                        <p class="description active-0">
                            Right now, you may not be efficiently turning the food you eat into energy.<br />
                            <br />
                            <span class="more-text">
                                Food is supposed to make you feel energized after eating.
                                If eating causes your energy to slow down, it means your metabolism may not be working as well as it could. 
                                Your custom meal plan is designed to help you metabolize your food more efficiently, so that you have more energy throughout the day, and wake up feeling refreshed.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                        </p>
                        <p class="description active-1" style="display: none;">
                            Right now, you may not be efficiently turning the food you eat into energy.<br />
                            <br />
                            <span class="more-text">
                                A good night's sleep is supposed to make you feel rested and refreshed and ready to take on the day.
                                Right now, the majority of your energy may be going into digestion while you sleep, which means your body has less energy to make vital repairs and detoxify your tissues and organs.  
                                Your custom meal plan is designed to help you metabolize your food more efficiently, so that you have more energy throughout the day, and wake up feeling refreshed.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                        <p class="description active-23" style="display: none;">
                            Your metabolism seems to be working average for your age.<br />
                            <br />
                            <span class="more-text">However, we have determined that you may have untapped potential for more energy and the ability to use your food more efficiently. 
                                With a few simple changes to your diet, it’s possible to have the metabolism of a much younger person. 
                                Your Keto Meal Plan is designed to help you metabolize your food more efficiently, so that you have more energy throughout the day, and wake up feeling refreshed.
                            </span>
                            <span onclick="readmoreClicked(this)" class="btn-readmore">
                                <span>Learn More </span>
                                <svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php if ($page == "faq") { ?>
    <section class="faq">
        <div class="container">            
            <div class="row text-center no-gutters">
                <div class="col-12 pl-0 pr-0 pl-md-auto pr-md-auto">                        
                    <h2 class="blue-color proxima-nova-bold mt-4 mb-3">Konscious Keto Meal Plan FAQs</h2>
                    <div class="faq-content">
                        <button class="accordion">How Do I Get Started?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>Welcome to the Konscious Keto Family! Getting started couldn’t be easier!</p>
                                <p>Simply check out your recipe suggestions, pick the dishes that appeal most to you and print off your grocery list.</p>
                                <p>We’ve taken out all the guesswork, all the science, and all the frustration and confusion of how to do keto right. All you have to do is start prepping your delicious meals today.</p>
                                <p>Please note: as your meal plan was custom created for you, it’s impossible for us to print a physical version. Your lifetime online membership enables us to make modifications and to add new recipes all the time, and to reply to your comments and questions.</p>
                                <p>If you prefer to print your recipes, please select the print-friendly button under the recipe of your choice to create a hard copy for personal use only.</p>                                
                            </div>
                        </div>

                        <button class="accordion hide-fastspring">What If I Can’t Start Right Away?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel hide-fastspring">
                            <div class="pt-3 pb-3">
                                <p>You do not have to start the plan today, although many do! Your meals begin on the day you choose, so feel free to go on that trip, have fun, and know that when you get back your custom meal plan will ready and waiting to help you get on track.</p>
                                <p>Each plan comes with a lifetime membership, which means that you have forever to access all of the delicious and on-going recipes that we’ll be adding. All we ask is that you give us 28 days to see and feel what it’s like to be in keto.</p>
                            </div>
                        </div>

                        <button class="accordion">When Will My Shakes Arrive?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>If you purchased <a href="https://konsciousketo.com/pages/keto-shake-multi" target="_blank">Keto Shake</a> or <a href="https://konsciousketo.com/pages/keto-activate-gc" target="_blank">Keto Activate</a> with your custom meal plan, we are preparing your order right away and will send you a confirmation email (with a tracking ID) when those items leave our warehouse. All items ship the following business day.</p>
                                <p>Please check your promotions tab in Gmail, or your spam folder if you did not get your order confirmation email. Contact us immediately if you wish to change the flavor or make changes to your order at <a href="mailto:hello@konsciousketo.com" target="_top" class="mobile-break-all">hello@konsciousketo.com</a>.</p>
                            </div>
                        </div>
                        <button class="accordion">When Should I Drink My Shakes?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>If you purchased any <a href="https://konsciousketo.com/pages/keto-shake-multi" target="_blank">Keto Shakes</a> to complement your plan, you can use them to replace your breakfast, lunch or dinner as needed. Simply omit the recipe for that time and make a delicious, creamy shake in mere minutes.</p>
                                <p><a href="https://konsciousketo.com/pages/keto-activate-gc" target="_blank">Keto Activate</a> is an ideal keto supplement that you can use when fasting as it only has 3 calories per serving or before a workout to enhance your performance.</p>
                                <p><a href="https://konsciousketo.com/pages/keto-shake-multi" target="_blank">Keto Shake</a> is a delicious, dessert-like meal replacement that will help you eat more healthy fats and curb cravings and can be enjoyed as a light meal or keto snack at anytime of the day.</p>
                                <p>You can use our keto shakes together to create the ultimate fat-burning shake — simply add 1 scoop of Keto Activate Chocolate Truffle to Keto Shake Creamy Chocolate and see how much more energy and vitality you have throughout the day.</p>
                                <p>Use the code WELCOME10 at the checkout to get 10% off your first order today.</p>
                            </div>
                        </div>
                        <button class="accordion">Do I Have to Follow the Plan Exactly to See Results?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>You certainly don’t need to follow the meal plan exactly to get results. So long as you keep your net carbs under 20 grams a day you can do keto however suits your lifestyle best!</p>
                                <p>If you make keto as delicious as possible, you are more likely to stick with it. So really look for what recipes seem the most appealing to you and start with those. You'll be much more likely to stick to the plan if you’re excited to try a new dish or sample a favorite.</p>
                                <p>Successful ketoers typically have two to three breakfasts they make regularly, in addition to their convenient lunches that work for their lifestyle and range of dinners that they fall back on.</p>
                            </div>
                        </div>
                        <button class="accordion">Can I Do This Plan on My Own?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>With Konscious Keto, you’re never truly alone. This meal plan is designed for people who do keto on their own, and their families. All you have to do is modify the serving sizes to suit your hungry audience.</p>
                                <p>It can be a time-saver to make extra servings and eat the leftovers for lunch the next day. This is an industry tip called meal prep, and it can help you portion out a week’s worth of lunches for one or feed the whole family.</p>
                                <p>Each recipe is broken down into bite size portions so you can adjust easily for your needs. For example, you can eat 1 serving for a lean keto meal, but if you have more calories for the day, you can eat 3 or even 5 servings. Keto works!</p>
                            </div>
                        </div>
                        <button class="accordion">What Drinks Can I Consume on the Keto Diet?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>1. Water. You want to drink a lot of water on the keto diet. It's not uncommon to drink tons of water a day on keto to stay hydrated due to the increased need for water in producing ketones.</p>
                                <p>2. Sparkling mineral water is a good choice as it contains many minerals, which can help replenish your system. Often, it's easier to drink than plain water. Naturally flavored, zero carb and zero-calorie sparkling water which is now very common is a good choice as well. Avoid tonic water as that contains sugar.</p>
                                <p>3. Electrolytes such as in <a href="https://amzn.to/2LFBhjC" target="_blank">Ultima Replenisher</a> mixed with water is a very good idea, and this will also help prevent keto flu. We don't recommend electrolyte drinks with artificial flavors or colors (even if marketed as zero carb) as these chemicals can prevent weight loss in many people and are linked to a wide variety of health issues.</p>
                                <p>4. Black coffee (coffee with heavy cream or what is commonly called bulletproof coffee) is keto-friendly. Just be cautious of flavored coffee with artificial sweeteners. Unsweetened nut milk such as almond can be good in coffee, just double-check the carb counts.</p>
                                <p>5. Unsweetened tea is very keto-friendly!</p>
                                <p>6. Keto-friendly drinks that are low carb. These include kombucha, <a href="https://amzn.to/2NplAPL" target="_blank">keto brain drinks</a>, and many other new products hitting the market. So long as the carbs are fairly low, they don't contain any sugar and don't contain artificial sweeteners you are good! Companies are listening to the people and more drinks like this are coming out every day.</p>
                                <p>7. In moderation, some alcohol tends to be OK on the keto diet. Good choices if you are going to drink are dry red wines, white wine such as Sauvignon Blanc, low carb beers and drinks such as vodka/tequila with soda water and lime.</p>
                                <p>8. Keto-friendly protein shakes such as <a href="https://konsciousketo.com/pages/keto-shake-multi" target="_blank">keto shake</a> are an excellent choice as you'll get hydration and the fat along with protein will reduce your hunger.</p>
                                <p></p>
                            </div>
                        </div>
                        <button class="accordion">How Many Calories Do I Need to Eat Each Day?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>We recommend at first not being too overly concerned with calories. For many people, simply eating keto foods promotes natural weight loss at a steady pace without any need to count calories.</p>
                                <p>Base your eating on your hunger, eat when you are hungry and skip meals if you don’t feel hungry. Just be cautious not to overeat some keto desserts and nuts as these are keto foods designed to eaten in moderation.</p>
                            </div>
                        </div>
                        <button class="accordion">Help - I Want to Substitute an Ingredient!<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>While we did our best to cover as many of the dietary preferences in the quiz as we could, we understand there may still be some ingredients that some people don’t want.</p>
                                <p>Typically most keto proteins are interchangeable (meats, fish, etc), and keto vegetables are also flexible (you can swap asparagus for green beans, for example). Keto oils tend to be adaptable as well. For example, coconut oil can be substituted for avocado oil.</p>
                                <p>If you see an ingredient you don't love, you can leave it out or drop us a comment under the recipe in the comment section and one of our friendly team members will do their best to help you replace it with something keto-friendly.</p>
                            </div>
                        </div>
                        <button class="accordion">What If I Can’t Find Organic, or Grass-Fed Options, etc.?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>While we strongly recommend buying quality foods where possible, we understand that budget and regional availability can make it hard. Don’t beat yourself up if you cannot source these items, simply look for the next best available and go with that, your body will thank you.</p>
                                <p>By making positive food choices, you can rest assured that your chances of success will be higher as quality ingredients mean fewer opportunities for fillers, additives, and so on to stall your weight loss results.</p>                                    
                            </div>
                        </div>
                        <button class="accordion">What If I Don’t Have Time to Cook Every Day?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>Your custom meal plan is very flexible to your needs. You can simply make larger batches and freeze meals as needed to cook in advance. You can also skip the cooking and use one of our delicious meal replacement <a href="https://konsciousketo.com/pages/keto-shake-multi" target="_blank">Keto Shakes</a> instead. This is especially helpful if you travel a lot or are busy.</p>
                                <p>Having these choices is what will drive you to success. You can also use leftovers the following day, or skip a day if you prefer. The choice really is up to you.</p>                                    
                            </div>
                        </div>
                        <button class="accordion">What Should I Do If I Have a Food Allergy?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>For our meal plans, we cannot take into account all possible allergies, so you are responsible for avoiding or modifying recipes as may be necessary to avoid allergic reactions.</p>
                                <p>Please consult with your doctor if you have or suspect you have a food allergy. Stop eating any foods immediately and dial 911 if you have symptoms of an allergic response.</p>                                    
                            </div>
                        </div>
                        <button class="accordion">Can I Do Intermittent Fasting on This Meal Plan?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel">
                            <div class="pt-3 pb-3">
                                <p>Absolutely! We love intermittent fasting. Simply follow the fasting regimen that works for you and turn to your trusted meal plan when it’s time to feast.</p>
                                <p>You may also consider adding a fasting supplement like <a href="https://konsciousketo.com/pages/keto-activate-gc" target="_blank">Keto Activate</a> to enhance your energy levels during your fasting window to accelerate your successes.</p>                                    
                            </div>
                        </div>
                        <button class="accordion hide-subscription hide-1m">What Happens After 28 Days?<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>
                        <div class="panel hide-subscription hide-1m">
                            <div class="pt-3 pb-3">
                                <p>We never promise that everyone will hit their goal weight within 28 days.</p>
                                <p>We believe you should aim to lose weight responsibly and make keto a lifestyle, but here’s just some of what you can expect to have accomplished:</p>
                                <p>You'll have learned a healthier, more invigorating way to eat. You’ll be feeling and looking the best you've felt in perhaps years. And if you hit your calorie goals, you should be feeling and looking leaner as well.</p>
                                <p>If after 28-days you love these results, and want to keep going, you can!</p>
                                <p><a href="https://konsciousketo.com/a/secure/checkout/alVD9CIHIvCZMxGKFWwP" target="_blank">Simply upgrade your account here</a> and we’ll give you more delicious recipes to keep you going on the right track. Many people don’t even recognize themselves after 1 year, and we can’t wait to hear your transformation story next.</p>
                            </div>
                        </div>                    
                    </div>
                </div>                    
            </div>
            <div class="row no-gutters mt-5">
                <div class="col-12">
                    <h2 class="blue-color proxima-nova-bold mt-4 mb-3 text-center">Have a Different Question ?</h2>
                    <p>Awesome, we are here to help! Simply drop us a line at <a href="mailto:hello@konsciousketo.com" target="_top" class="mobile-break-all">hello@konsciousketo.com</a> and we’ll do our best to help you out.</p>
                    <p class="hide-subscription">Your custom meal plan is a one-time payment only, you will not be billed again. In return, you get a lifetime membership and access</p>
                </div>
            </div>
        </div>            
    </section>
<?php } ?>

<?php if ($page == "download") { ?>

    <div class="container" id="ob_download">
        <div class="row">
            <div class="col-12">
                <div class="group-title">
                    <h3><span>BASIC</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 col-lg-3 py-3">
                <div class="item">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-1.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-1.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Keto quick start guide</p>
                    <a href="KonsciousKetoGuide.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-14.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-14.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Keto Friendly Food List</p>
                    <a href="KetoFriendlyFoodList.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-2.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-2.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Cravings Eliminator</p>
                    <a href="EmotionalCravingsEliminator.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 col-lg-3 py-3">
                <div class="item">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-3.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-3.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">10 Guilt-Free Desserts</p>
                    <a href="10DeliciouslyEasyFatBurningDesserts.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-4.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-4.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Keto-On-The-go Manual</p>
                    <a href="HowToDoKeto.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <div class="row hide-fastspring">
            <div class="col-12">
                <div class="group-title">
                    <h3><span>INTERMEDIATE</span></h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center intermediate hide-fastspring">
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-5">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-5.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-5.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Interrmittent Fasting Guide</p>
                    <a href="IntermittentFastingGuide.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/1RzaZsZeh1DirxVc9Z2I" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-6">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-6.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-6.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">How To Stay On Your Plan <br />When Dining Out</p>
                    <a href="HowToStayOnYourPlanWhenDiningOut.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a> 
                    <a href="https://konsciousketo.com/a/secure/checkout/M6PsbpalNmv6aorccMu2" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-7">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-7.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-7.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Fat Burning Desserts</p>
                    <a href="FatBurningDesserts.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/ENacjetgir4Uj5Nrh06g" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>            
        </div>   
        <div class="row hide-fastspring">
            <div class="col-12">
                <div class="group-title">
                    <h3><span>ADVANCED</span></h3>
                </div>
            </div>
        </div>
        <div class="row advanced hide-fastspring">
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-9">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-9.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-9.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Workout At Home</p>
                    <a href="WorkoutAtHome.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/6nwz7vjI2eLEshwbiYpU" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>            
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-11">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-13.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-13.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Easy Keto Treats</p>
                    <a href="EasyKetoTreats.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/JT7i3SKav5MsZv5YyvIf" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-10">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-10.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-10.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Italian Keto</p>
                    <a href="ItalianKetoCookbook.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/B4GOWnb5bpEQWzKALP8k" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>
            <div class="col-6 col-lg-3 py-3">
                <div class="item locked mp-ebook-12">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-12.webp" type="image/webp">
                        <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp-ebook-12.jpg" alt="">
                    </picture>
                    <p class="text text-center mb-3">Keto Comfort Foods</p>
                    <a href="KetoComfortFoods.pdf" class="downloadable btn-download blue-color">DOWNLOAD</a>
                    <a href="https://konsciousketo.com/a/secure/checkout/ql4w1SG88Kt4cTfr6Lju" target="_blank" class="unlock-btn">Unlock Content</a>
                </div>
            </div>
        </div>   
    </div>

<?php } ?>

<?php if ($page == "vip") { ?>
    <section id="vip_product">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <a href="https://konsciousketo.com/products/keto-activate" class="item d-inline-block" target="_blank">
                        <p class="text text-center blue-color proxima-nova-bold mb-3">Try Keto Activate</p>
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_shake.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_shake.png" alt="">
                        </picture>
                    </a>
                </div>                
                <div class="col-12 col-lg-4 d-none">
                    <a href="https://konsciousketo.com/products/hair-skin-nails" class="item d-inline-block" target="_blank">
                        <p class="text text-center blue-color proxima-nova-bold mb-3">Try Hair, Nail & Skin</p>
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_hair.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_hair.png" alt="">
                        </picture>
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a href="https://konsciousketo.com/products/metabolic-energizer" class="item d-inline-block" target="_blank">
                        <p class="text text-center blue-color proxima-nova-bold mb-3">Try Metabolic Energizer</p>
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_me.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_me.png" alt="">
                        </picture>
                    </a>
                </div> 
                <div class="col-12 col-lg-4">
                    <a href="https://konsciousketo.com/products/konscious-keto-shake" class="item d-inline-block" target="_blank">
                        <p class="text text-center blue-color proxima-nova-bold mb-3">Try Keto Shake</p>
                        <picture class="d-none d-md-block">
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate.png" alt="">
                        </picture>
                        <picture class="d-block d-md-none">
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate_mobile.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate_mobile.png" alt="" style="height: 800px;">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center mt-3 d-none">
                <div class="col-12 col-lg-6">
                    <a href="https://konsciousketo.com/products/konscious-keto-shake" class="item d-inline-block" target="_blank">
                        <p class="text text-center blue-color proxima-nova-bold mb-3">Try Keto Shake</p>
                        <picture class="d-none d-md-block">
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate.png" alt="">
                        </picture>
                        <picture class="d-block d-md-none">
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate_mobile.webp" type="image/webp">
                            <img class="mx-auto d-block w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>mp_activate_mobile.png" alt="" style="height: 800px;">
                        </picture>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<section id="footer">
    <div id="ihnxgf" class="footer-inner container">
        <div id="ix0a41" class="grid">
            <div id="ioffse" class="grid__item text-center footer-logo col-lg-12 col-sm-12"><img src="https://s3-us-west-2.amazonaws.com/assets.checkout.carthook.com/mid_cFAiOTFl/1559795375477_dark green logo.png" alt="" id="i35fc6" class="d-block img-fluid img"></div>
        </div>
        <div class="info-section text-center col-lg-12">
            <div class="col-lg-12">
                <div data-ch-type="text" id="i6387l" class="noticecontent">
                    *Statements regarding your profile and the results of our quiz have not been evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease. You should consult with a medical professional before starting any diet or weight loss program.<br /><b>Allergen Warning:</b> Konscious Keto’s Meal Plans cannot take into account all possible allergies. You are solely responsible for avoiding or modifying recipes as may be necessary to avoid allergic reactions. Some of our recipes contain affiliate links to ingredients or tools; we receive compensation when you purchase items through these links.
                </div>
                <div class="copyright-sec">
                    <p data-ch-type="text" id="ie1561">© 2020 Konscious Keto. All rights reserved.                                                    
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

