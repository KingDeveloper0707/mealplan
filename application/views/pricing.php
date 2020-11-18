<div class="container my-auto shadow-container no-padding blue-color text-center">
    <div class="row no-gutters">
        <div class="col-lg-12 d-flex flex-column">
            <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') === false) { ?>
                <h2 class="">Claim Your <span class="red-color font-italic">Personalized</span><br />
                    <?php
                    if (strpos(base_url(), 'simplelowcarbsystem.com') !== false) {
                        echo "Low Carb";
                    } else {
                        echo "Keto";
                    }
                    ?> 
                    Meal Plan Now</h2>
            <?php } else { ?>
                <style>
                    body.pricing .whatyouget .old-price:after {
                        border: none !important;
                    }
                    body.pricing .whatyouget .inner-area {
                        box-shadow: 0 4px 12px -3px #165C6D4f !important;
                    }
                    body.pricing .whatyouget h3 {
                        font-size: 2.5rem;
                    }
                    body.pricing section.benefit-section ul li svg {
                        vertical-align: top;
                        margin-top: 7px;
                    }
                    @media (max-width: 575.98px) {
                        body.pricing .whatyouget h3 {
                            font-size: 1.8rem;
                        }    
                    }
                </style>
                <h2><span class="red-color">Claim Your 14-Day Free Trial</span><br /><span class="blue-color"><span class="text-italic">Personalized</span> Keto Meal Plan</span></h2>
            <?php } ?>

            <div class="timer-area">
                <div class="text-area"><span class="red-color">
                        <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') === false) { ?>
                            LIMITED TIME OFFER
                        <?php } else { ?>
                            TRY IT FREE FOR A LIMITED TIME
                        <?php } ?>
                    </span><br />
                    <span>We Will Reserve Your Meal Plan For</span></div>
                <div class="countdown">
                    <div class="timer-min">09</div><span class="timer-tick">:</span><div class="timer-sec">59</div>
                </div>
            </div>

        </div>
    </div>
    <div class="row d-block mt-3 no-gutters">
        <div class="col-12">
            <div class="star-area">                
                <span class="star-number">4.5</span>
                <div id="stars">
                    <svg class="icon" width="22" height="22"><use xlink:href="#star"></use></svg>
                    <svg class="icon" width="22" height="22"><use xlink:href="#star"></use></svg>
                    <svg class="icon" width="22" height="22"><use xlink:href="#star"></use></svg>
                    <svg class="icon" width="22" height="22"><use xlink:href="#star"></use></svg>
                    <svg class="icon" width="22" height="22" color="#929292"><use xlink:href="#star"></use></svg>
                    <svg class="icon" width="22" height="22" style="margin-left: -27px;"><use xlink:href="#star-half"></use></svg>
                </div>                
                <p>1028 Customer Reviews</p>
            </div>
        </div>
    </div>   


    <section class="container-fluid">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <?php if (strpos(base_url(), '/plans') === false && strpos(base_url(), '/fastspring') === false && $is_mobile) { ?>
                    <div class="wistia_responsive_padding" style="padding:150.0815% 0 0 0;position:relative;">
                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">                        
                            <div class="wistia_embed wistia_async_mrc2ug6oh1 videoFoam=true" style="height:100%;position:relative;width:100%">&nbsp;
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">                        
                            <div class="wistia_embed wistia_async_<?php
                            if (strpos(base_url(), '/plans/') !== false)
                                echo "lv8d1x66jw"; //1nckuzn5er
                            else if (strpos(base_url(), '/fastspring') !== false)
                                echo "mu4legqyr3";
                            else if (strpos(base_url(), '/start') !== false)
                                echo "drm8uo4k6l";
                            else
                                echo "drm8uo4k6l";
                            ?> videoFoam=true" style="height:100%;position:relative;width:100%">&nbsp;
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="benefit-section">
        <div class="container">
            <div class="row text-center justify-content-center no-gutters">
                <div class="col-md-10">
                    <h2>Keto Benefits</h2>
                    <ul>
                        <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') === false) { ?>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><b>Sustainable</b> weight loss</div>
                            </li>
                        <?php } else { ?>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><b>Sustainable</b> weight loss, look & feel great</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><b>Help</b> Support Immunity</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                                <div>Absolutely <b>CRUSH</b> your Cravings</div>
                            </li>
                        <?php } ?>

                        <li>
                            <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                            <div><b>Reduced</b> risk of inflammation</div>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                            <div><b>It can help</b> protect brain functioning, as well as making you feel sharper, focused and more alert.</div>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                            <div><b>Reduces</b> “bad” LDL cholesterol, blood triglycerides, inflammatory markers, and blood sugar</div>
                        </li>
                        <li>
                            <svg class="icon" width="16" height="16" fill="#1F4092"><use xlink:href="#check-circle-solid"></use></svg>
                            <div><b>Increases</b> the brain hormone BDNF and may aid the growth of new nerve cells</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="row mt-sm-4 no-gutters">
        <div class="col-12">
            <div class="">                            
                <div class="whatyouget">
                    <div>
                        <label>What You Get</label>
                        <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                            <h3 style="margin-bottom: -.2rem;">INSTANT ACCESS</h3>
                            <p style="font-family: 'Proxima Extra Bold';font-size: 27px;margin-bottom: 0;">To Your Personalized Plan</p>
                            <p style="margin-bottom: 2rem;"><span style="color: gray">You get to try it</span> <span class="red-color" style="font-family: CervoNeue-RegularNeue;">FREE For 14 Days!</span></p>
                        <?php } else { ?>
                            <h3>INSTANT ACCESS</h3>
                            <p class="one-time-payment">For a Low 1-Time Payment!</p>
                        <?php } ?>
                    </div>
                    <div class="text-area">
                        <ul>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">Daily 5-Star Keto Meal Plan</span><p class="substr">100% personalized to YOUR metabolic type &amp; weight loss goal</p></div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">Nutritious 4 Meals Per Day</span><p class="substr">Breakfast, lunch, afternoon snack, dinner &amp; even dessert — every day!</p></div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">EZ Grocery List</span><p class="substr">Save time and money because we've done everything for you!</p></div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">Keto Quick Start Guide</span><p class="substr">Discover how to avoid common mistakes &amp; do keto right!</p></div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">Cravings Eliminator System</span><p class="substr">Delicious ideas to stop cravings in their tracks!</p></div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="red-color">Keto-On-The-Go Manual</span><p class="substr">Stay on track — even when eating out! We show you how.</p></div>
                            </li>
                        </ul>
                    </div>
                    <?php if (
                            strpos(base_url(), 'simpleketosystem.com/plans') === false && 
                            strpos(base_url(), 'simpleketosystem.com/fastspring') === false &&
                            strpos(base_url(), 'simpleketosystem.com/fastspring2') === false) { ?>
                            </div>
                            <div class="text-dark d-inline-block text-left mt-3">
                                <h5 class="proxima-nova-bold text-dark">No Tricks, No Subscription</h5>
                                <p class="mb-0">All plans are a one time purchase.</p>
                                <p class="mb-0">No subscriptions or monthly charges.</p>
                                <p class="mb-0">No hidden fees.</p>
                            </div>
                    <?php } ?>
                    <?php if (strpos(base_url(), 'simpleketosystem.com/2m') === false) { ?>
                        <div class="inner-area">
                            <div>
                                <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                                    <p class="save50" style="width: 300px;">Try it Free for 14 Days!</p>
                                    <p class="lifetime-access lifetime-access-1">Instant Access To Your Meal Plan</p>
                                    <div class="gray-color"><p class="float-left mb-2">Regular price</p><p class="float-right old-price mb-2">$19/mo</p></div>
                                    <div class="clearfix"></div>
                                    <div><p class="float-left red-color mb-2">Free-Trial Activated</p><p class="float-right red-color mb-2">14 Days Free</p></div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div><p class="float-left gray-color mb-2">Due Now</p><p class="float-right mb-2 curr-price">0.00</p></div>
                                <?php } else { ?>
                                    <p class="save50">SAVE 50%</p>
                                    <p class="lifetime-access lifetime-access-1">Lifetime Access To Your Meal Plan</p>
                                    <div class="gray-color"><p class="float-left mb-2">Regular price</p><p class="float-right old-price mb-2">$79</p></div>
                                    <div class="clearfix"></div>
                                    <div><p class="float-left red-color mb-2">Flash-Sale Discount applied</p><p class="float-right red-color mb-2">-50%</p></div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div><p class="float-left gray-color mb-2">Total price</p><p class="float-right mb-2 curr-price">$39</p></div>
                                <?php } ?>

                                <div class="clearfix"></div>
                                <p class="lifetime-access lifetime-access-2">Enjoy A Lifetime Of Health<br class="d-block d-sm-none"> Just Click Below To Get Started!</p>
                            </div>
                            <a href="#" class="btn btn-primary offer-badge btn-continue onetime submit">Get Your OneTime Plan</a><br />
                            <a href="#" class="btn btn-primary offer-badge btn-continue subscription submit">Get Your Subscription Plan</a>
                        </div>
                    <?php } ?>
                <?php if (
                            !(strpos(base_url(), 'simpleketosystem.com/plans') === false && 
                            strpos(base_url(), 'simpleketosystem.com/fastspring') === false &&
                            strpos(base_url(), 'simpleketosystem.com/fastspring2') === false)) { ?>
                            </div>                            
                <?php } ?>
                <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                    <div class="whatyouget" style="border: none; padding: 0 !important;margin-top: 0 !important;margin-bottom: 2rem !important; color: gray !important; text-align: center;">                        
                        *FREE for 14 days, then US$19/mo. 
                        Actual savings of $9.50 for the first month. 
                        You will be automatically enrolled in the Custom Keto Meal Plan and your credit card will be billed $19 every 28 days. 
                        The program automatically renews each month until you cancel. 
                        You may cancel anytime before the end of the free trial, or at anytime during the program by emailing us at hello@konsciousketo.com.
                    </div>
                <?php } ?>
                <?php if (strpos(base_url(), 'simpleketosystem.com/2m') !== false) { ?>
                    <div class="twom-section text-dark text-left">
                        <h5 class="proxima-nova-regular font-weight-bold">No Tricks, No Subscription</h5>
                        <p class="mb-0">All plans are a one time purchase.</p>
                        <p class="mb-0">No subscriptions or monthly charges.</p>
                        <p>No hidden fees.</p>
                        <h5 class="proxima-nova-regular font-weight-bold">Select Your Keto Plan</h5>
                        <div class="plan-select">
                            <input type="radio" id="radio-1m-1" name="radio-month-1">
                            <label for="radio-1m-1" class="d-flex flex-row justify-content-center align-items-center">
                                <div class="left-wrapper">
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <span>1 Month Keto Plan</span>
                                </div>
                                <div class="right-wrapper">
                                    <p class="mb-0">$39</p>
                                </div>
                            </label>
                            <input type="radio" id="radio-2m-1" name="radio-month-1" checked>
                            <label for="radio-2m-1" class="d-flex flex-row py-4">
                                <div class="left-wrapper">
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <span>2 Month Keto Plan</span>
                                </div>
                                <div class="right-wrapper">
                                    <p class="mb-0 font-weight-bold text-secondary" style="text-decoration: line-through;">$79</p>
                                    <p class="mb-0 proxima-nova-semibold">$39</p>
                                </div>
                                <p class="special-offer">Special Offer - (Save 50%)</p>
                            </label>
                            <input type="radio" id="radio-12m-1" name="radio-month-1">
                            <label for="radio-12m-1" class="d-flex flex-row mt-4">
                                <div class="left-wrapper">
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <span>12 Month Keto Plan</span>
                                </div>
                                <div class="right-wrapper text-right">
                                    <p class="mb-0 font-weight-bold text-secondary" style="text-decoration: line-through;">$468</p>
                                    <p class="mb-0 proxima-nova-semibold">$149</p>
                                    <p class="mb-0 font-weight-bold">(save 68%)</p>
                                </div>
                            </label>
                        </div>
                        <p class="mt-3 mb-0">All plans are a one time purchase.</p>
                        <p class="mb-0">No subscriptions or monthly charges.</p>
                        <p>No hidden fees.</p>
                        <div class="btn-wrapper text-center">
                            <a href="#" class="btn btn-primary offer-badge btn-continue submit">Get Your Plan</a>
                        </div>
                    </div>
                <?php } ?>

            </div>                        
        </div>
        <?php if (strpos(base_url(), 'simpleketosystem.com/2m') === false) { ?>
            <div class="col-12">
                <div class="pay-1 d-flex align-items-center justify-content-center blue-color text-left">
                    <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                        <ul>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>256-Bit Secure Payment</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Instant Access</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Access From ANY Device</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Try It Free For 14 Days!</div>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Fast Secure Payment</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Instant Access</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>No Hidden Fees</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Lifetime Access To Your Meal Plan</div>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="col-12">
            <section id="payment">
                <div class="container">
                    <div class="col-12">  
                        <picture>
                            <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>secure-payments-0.webp" type="image/webp">
                            <img class="mx-auto d-block mb-3 w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>secure-payments-0.jpg" alt="">
                        </picture>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <section class="container-fluid twovideosection">
        <div class="row no-gutters">
            <div class="col-lg-12">
                <h2 class="text-center proxima-nova-bold mb-5"><span class="red-color">Fans Are Raving About</span><br><span class="blue-color">Our Keto System</span></h2>
                <div class="wistia_responsive_padding kxyg6neziv" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                        <div class="wistia_embed wistia_async_kxyg6neziv videoFoam=true autoPlay=false" style="height:100%;position:relative;width:100%">&nbsp;</div>
                    </div>                        
                </div>
                <div class="d-inline-block px-2 mt-5">
                    <a href="#wistia_kxyg6neziv?autoPlay=false" class="switch-video text-left text-dark text-decoration-none selected" id="kxyg6neziv">
                        <div class="avatar"></div>
                        <div>
                            <span class="d-block proxima-nova-bold">Lisa T.</span>
                            <span class="d-block">"I couldn’t be happier with my results. I’ve lost 4lbs the first full week!"</span>
                        </div>
                        <div class="clearfix"></div>
                    </a>

                    <a href="#wistia_i6bbz9get7?autoPlay=false" class="switch-video text-left text-dark text-decoration-none" id="i6bbz9get7">
                        <div class="avatar"></div>
                        <div>
                            <span class="d-block proxima-nova-bold">Carol P.</span>
                            <span class="d-block">"The meals are tasty, so you never really feel like you’re dieting."</span>
                        </div>
                        <div class="clearfix"></div>                        
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="success-section success-section-mobile">
        <div class="container no-padding">
            <div class="row no-gutters">
                <div class="col-12">                                
                    <h2 class="text-center"><span class="red-color">Your Transformation</span><br><span class="blue-color">Can Be Next!</span></h2>
                    <div class="review-list">
                        <img class="w-100 w-md-60 mx-auto d-block d-sm-none mb-3" src="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-header-review-all.jpg" alt="">  
                        <img class="w-100 w-md-75 mx-auto d-none d-sm-block mb-3" src="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-header-review-all-desktop.jpg" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>        



    <section class="faq">
        <div class="container-fluid no-padding">
            <div class="row text-center no-gutters">
                <div class="col-12">
                    <h2>F.A.Q</h2>
                    <div class="faq-content">
                        <button class="accordion">What Happens After I Get My Order?</button>
                        <div class="panel">
                            <p>
                                <span class="mb-3 d-block">Once you order today, you get instant access to your easy-to-follow meal plan which is based on your food preferences, lifestyle and goal weight.</span>
                                <span class="mb-3 d-block">Each of the meals contained in your personalized Simple Keto System meal plan was designed by a professional chef and overseen by our keto nutritionist.</span>
                            </p>
                        </div>

                        <button class="accordion">How Fast Will I Reach My Goal Weight?</button>
                        <div class="panel">
                            <p>
                                <span class="mb-3 d-block">It's important to understand everyone is different, and their level of commitment is going to be different as well. That being said, our goal was to make the meal plan simple enough to get started, and delicious enough to stick with long-term.</span>
                                <span class="mb-3 d-block">Each of the meals in your plan contains ingredients you’ve personally selected and put together by a personal chef and nutritionist.</span>
                                <span class="mb-3 d-block">We have heard from folks who have lost 2-4 pounds per week using our meal plan.</span>
                                <span class="mb-3 d-block">Of course, your results will vary depending on your metabolism and specific goals.</span>
                                <span class="mb-3 d-block">We’re confident, once you claim your Simple Keto System personal meal plan today - and enjoy each of the delicious meals, hitting your goal weight will be fun and enjoyable.</span>
                            </p>
                        </div>

                        <button class="accordion">What Happens If I Lose Weight Too Fast?</button>
                        <div class="panel">
                            <p>
                                <span class="mb-3 d-block">If you begin losing weight faster than you feel comfortable with, it's easy to adjust your Simple Keto System meal plan.</span>
                                <span class="mb-3 d-block">Most people can safely lose up to 1-2 pounds per week when following the meal plan.</span>
                                <span class="mb-3 d-block">If you find that you’re losing weight faster than this, follow the meal plan for 5 days, and do 2 days on a normal diet — it’s that simple.</span>
                                <span class="mb-3 d-block">For optimal results, we recommend that you follow the meal plan for the first 28 days because seeing the fast progress will help you stick with the plan.</span>
                            </p>
                        </div>      
                    </div>
                </div>
            </div>
        </div>            
    </section>

    <section id="user-review" class="text-center">
        <div class="container-fluid no-padding">
            <div class="row no-gutters">
                <div class="col-12">
                    <h2 style="margin: 0;padding: 2rem 0;background-color: #f6f7f9;">User Reviews</h2>
                </div>
            </div>
            <div class="row mx-auto no-gutters">
                <div class="col-12">
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-review.webp" type="image/webp">
                        <img class="w-100 mx-auto d-none d-sm-block" src="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-review.jpg" alt="">
                    </picture>
                    <picture>
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-review-m.webp" type="image/webp">
                        <img class="w-100 mx-auto d-block d-sm-none" src="<?php echo keycdn_url() . 'assets/img/'; ?>pricing-review-m.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <section id="whatyouget-section" class="text-center">
        <div class="container no-padding">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="whatyouget">
                        <div>
                            <label>What You Get</label>
                            <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                                <h3 style="margin-bottom: -.2rem;">INSTANT ACCESS</h3>
                                <p style="font-family: 'Proxima Extra Bold';font-size: 27px;margin-bottom: 0;">To Your Personalized Plan</p>
                                <p style="margin-bottom: 2rem;"><span style="color: gray">You get to try it</span> <span class="red-color" style="font-family: CervoNeue-RegularNeue;">FREE For 14 Days!</span></p>
                            <?php } else { ?>
                                <h3>INSTANT ACCESS</h3>
                                <p class="one-time-payment">For a Low 1-Time Payment!</p>
                            <?php } ?>
                        </div>
                        <div class="text-area">
                            <ul>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">Daily 5-Star Keto Meal Plan</span><p class="substr">100% personalized to YOUR metabolic type &amp; weight loss goal</p></div>
                                </li>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">Nutritious 4 Meals Per Day</span><p class="substr">Breakfast, lunch, afternoon snack, dinner &amp; even dessert — every day!</p></div>
                                </li>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">EZ Grocery List</span><p class="substr">Save time and money because we've done everything for you!</p></div>
                                </li>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">Keto Quick Start Guide</span><p class="substr">Discover how to avoid common mistakes &amp; do keto right!</p></div>
                                </li>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">Cravings Eliminator System</span><p class="substr">Delicious ideas to stop cravings in their tracks!</p></div>
                                </li>
                                <li>
                                    <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                    <div><span class="red-color">Keto-On-The-Go Manual</span><p class="substr">Stay on track — even when eating out! We show you how.</p></div>
                                </li>
                            </ul>
                        </div>
                        <?php if (
                            strpos(base_url(), 'simpleketosystem.com/plans') === false && 
                            strpos(base_url(), 'simpleketosystem.com/fastspring') === false &&
                            strpos(base_url(), 'simpleketosystem.com/fastspring2') === false) { ?>
                            </div>
                            <div class="text-dark d-inline-block text-left mt-3">
                                <h5 class="proxima-nova-bold text-dark">No Tricks, No Subscription</h5>
                                <p class="mb-0">All plans are a one time purchase.</p>
                                <p class="mb-0">No subscriptions or monthly charges.</p>
                                <p class="mb-0">No hidden fees.</p>
                            </div>
                        <?php } ?>
                        <?php if (strpos(base_url(), 'simpleketosystem.com/2m') === false) { ?>
                            <div class="inner-area">
                                <div>
                                    <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                                        <p class="save50" style="width: 300px;">Try it Free for 14 Days!</p>
                                        <p class="lifetime-access lifetime-access-1">Instant Access To Your Meal Plan</p>
                                        <div class="gray-color"><p class="float-left mb-2">Regular price</p><p class="float-right old-price mb-2">$19/mo</p></div>
                                        <div class="clearfix"></div>
                                        <div><p class="float-left red-color mb-2">Free-Trial Activated</p><p class="float-right red-color mb-2">14 Days Free</p></div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div><p class="float-left gray-color mb-2">Due Now</p><p class="float-right mb-2 curr-price">0.00</p></div>
                                    <?php } else { ?>
                                        <p class="save50">SAVE 50%</p>
                                        <p class="lifetime-access lifetime-access-1">Lifetime Access To Your Meal Plan</p>
                                        <div class="gray-color"><p class="float-left mb-2">Regular price</p><p class="float-right old-price mb-2">$79</p></div>
                                        <div class="clearfix"></div>
                                        <div><p class="float-left red-color mb-2">Flash-Sale Discount applied</p><p class="float-right red-color mb-2">-50%</p></div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        <div><p class="float-left gray-color mb-2">Total price</p><p class="float-right mb-2 curr-price">$39</p></div>
                                    <?php } ?>

                                    <div class="clearfix"></div>
                                    <p class="lifetime-access lifetime-access-2">Enjoy A Lifetime Of Health<br class="d-block d-sm-none"> Just Click Below To Get Started!</p>
                                </div>
                                <a href="#" class="btn btn-primary offer-badge btn-continue onetime submit">Get Your OneTime Plan</a><br />
                                <a href="#" class="btn btn-primary offer-badge btn-continue subscription submit">Get Your Subscription Plan</a>
                            </div>
                        <?php } ?>
                    <?php if (!(
                            strpos(base_url(), 'simpleketosystem.com/plans') === false && 
                            strpos(base_url(), 'simpleketosystem.com/fastspring') === false &&
                            strpos(base_url(), 'simpleketosystem.com/fastspring2') === false)) { ?>
                            </div>
                    <?php } ?>
                    <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                        <div class="whatyouget" style="border: none; padding: 0 !important;margin-top: 0 !important;margin-bottom: 2rem !important; color: gray !important; text-align: center;">
                            *FREE for 14 days, then US$19/mo. 
                            Actual savings of $9.50 for the first month. 
                            You will be automatically enrolled in the Custom Keto Meal Plan and your credit card will be billed $19 every 28 days. 
                            The program automatically renews each month until you cancel. 
                            You may cancel anytime before the end of the free trial, or at anytime during the program by emailing us at hello@konsciousketo.com.
                        </div>
                    <?php } ?>
                    <?php if (strpos(base_url(), 'simpleketosystem.com/2m') !== false) { ?>
                        <div class="twom-section text-dark text-left">
                            <h5 class="proxima-nova-regular font-weight-bold">No Tricks, No Subscription</h5>
                            <p class="mb-0">All plans are a one time purchase.</p>
                            <p class="mb-0">No subscriptions or monthly charges.</p>
                            <p>No hidden fees.</p>
                            <h5 class="proxima-nova-regular font-weight-bold">Select Your Keto Plan</h5>
                            <div class="plan-select">
                                <input type="radio" id="radio-1m" name="radio-month">
                                <label for="radio-1m" class="d-flex flex-row justify-content-center align-items-center">
                                    <div class="left-wrapper">
                                        <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                        <span>1 Month Keto Plan</span>
                                    </div>
                                    <div class="right-wrapper">
                                        <p class="mb-0">$39</p>
                                    </div>
                                </label>
                                <input type="radio" id="radio-2m" name="radio-month" checked>
                                <label for="radio-2m" class="d-flex flex-row py-4">
                                    <div class="left-wrapper">
                                        <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                        <span>2 Month Keto Plan</span>
                                    </div>
                                    <div class="right-wrapper">
                                        <p class="mb-0 font-weight-bold text-secondary" style="text-decoration: line-through;">$79</p>
                                        <p class="mb-0 proxima-nova-semibold">$39</p>
                                    </div>
                                    <p class="special-offer">Special Offer - (Save 50%)</p>
                                </label>
                                <input type="radio" id="radio-12m" name="radio-month">
                                <label for="radio-12m" class="d-flex flex-row mt-4">
                                    <div class="left-wrapper">
                                        <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-circle-solid"></use></svg>
                                        <span>12 Month Keto Plan</span>
                                    </div>
                                    <div class="right-wrapper text-right">
                                        <p class="mb-0 font-weight-bold text-secondary" style="text-decoration: line-through;">$468</p>
                                        <p class="mb-0 proxima-nova-semibold">$149</p>
                                        <p class="mb-0 font-weight-bold">(save 68%)</p>
                                    </div>
                                </label>
                            </div>
                            <p class="mt-3 mb-0">All plans are a one time purchase.</p>
                            <p class="mb-0">No subscriptions or monthly charges.</p>
                            <p>No hidden fees.</p>
                            <div class="btn-wrapper text-center">
                                <a href="#" class="btn btn-primary offer-badge btn-continue submit">Get Your Plan</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>
    <div class="row no-gutters">
        <?php if (strpos(base_url(), 'simpleketosystem.com/2m') === false) { ?>
            <div class="col-12">
                <div class="pay-1 d-flex align-items-center justify-content-center blue-color text-left">
                    <?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
                        <ul>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>256-Bit Secure Payment</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Instant Access</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Access From ANY Device</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Try It Free For 14 Days!</div>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <ul>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Fast Secure Payment</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Instant Access</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>No Hidden Fees</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16" fill="#F9464B"><use xlink:href="#check-solid"></use></svg>
                                <div>Lifetime Access To Your Meal Plan</div>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="col-12">
            <section id="payment">
                <div class="container">
                    <div class="row">
                        <div class="col-12 align-items-center">  
                            <picture>
                                <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>secure-payments-0.webp" type="image/webp">
                                <img class="mx-auto d-block mb-3 w-100" src="<?php echo keycdn_url() . 'assets/img/'; ?>secure-payments-0.jpg" alt="">
                            </picture>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row no-gutters">
        <section class="order-bump-inline d-none">
            <div class="ob-header">
                <img src="<?php echo keycdn_url() . 'assets/img/'; ?>ob-arrow.svg" width="24" class="d-inline-block mr-2">
                <input type="checkbox" class="styled-checkbox" id="order-bump-checkbox">
                <label for="order-bump-checkbox">Yes, I'll take it</label>
            </div>
            <div class="ob-body">                
                <div class="d-flex align-items-center justify-content-center">
                    <picture class="">
                        <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>ob-product.webp" type="image/webp" />
                        <img class="w-auto mx-auto d-block mb-3 offer-image" src="<?php echo keycdn_url() . 'assets/img/'; ?>ob-product.png" alt="" />                        
                    </picture>
                    <div class="offer-area my-auto">
                        <p class="limited-time-offer">Limited <br />Time Offer!</p>
                        <p class="old-price">$69.00</p>
                        <p class="curr-price">$19.00</p>
                    </div>
                </div>
                <div>
                    <p class="text-1"><span class="proxima-nova-bold">Get exclusive video coaching from our </span><span class="red-color proxima-nova-extra-bold font-italic">CELEBRITY CHEF + 3 Holiday cookbooks <br />now!</span></p>
                    <ul class="ob-list">
                        <li>Keto Video Coaching<br />From A Five Star Chef</li>                        
                        <li>Keto Shopping Videos</li>
                        <li>Keto Comfort Foods</li>
                        <li>Italian Keto Cookbook</li>
                        <li>Keto Sweet Treats Recipes</li>
                    </ul>                    
                    <div class="text-area">
                        <p>You'll get 8 hours of keto video coaching from a five star chef and keto expert. In this exclusive five part video series, <span class="proxima-nova-bold">Celebrity Chef Ido Shapira</span> (he's worked for Madonna, David Bowie, Bjork, and Michael Bloomberg) will take you by the hand and walk through the supermarket, teaching you <span class="proxima-nova-bold red-color">HOW TO SHOP for keto the RIGHT way.</span></p>
                        <p>You'll find out how to properly read a label, find out which ingredients to watch out for, atnd how to find the freshest high QUALITY ingredients and save money too. <span class="proxima-nova-bold">These tips WILL save you money</span> at the grocery store.</p>
                        <p>You'll also get 62 pages of Keto Compatible recipes to perfectly complement your meal plan. <span class="proxima-nova-bold">The dessert recipes in the holiday guide are designed to kill your cravings FAST.</span> Stay in and have a movie night with you favorite comfort foods, or wow your family and friends with exquisite Italian cuisine.</p>
                        <p><span class="proxima-nova-bold">These videos and cookbooks normally sell for $69 on their own.</span> <span class="proxima-nova-bold red-color">Get them today for just $19!</span> Simply check the box above to claim yours and save money right now!!!</p>
                    </div>
                </div>
            </div>            
        </section>
    </div>
</div>

<!-- Modal -->
<div id="order-bump-modal-container" class="hidden"></div>

<div class="modal fade" id="order-bump-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-myval="hidden">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!--<div class="modal-header"></div>-->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <section class="order-bump-modal-inner">
                    <div class="ob-body">                
                        <div class="d-flex align-items-center justify-content-center">
                            <picture class="">
                                <source srcset="<?php echo keycdn_url() . 'assets/img/'; ?>ob-product.webp" type="image/webp" />
                                <img class="w-auto mx-auto d-block mb-3 offer-image" src="<?php echo keycdn_url() . 'assets/img/'; ?>ob-product.png" alt="" />                                
                            </picture>
                            <div class="offer-area my-auto">
                                <p class="limited-time-offer">Limited <br />Time Offer!</p>
                                <p class="old-price">$69.00</p>
                                <p class="curr-price">$19.00</p>
                            </div>
                        </div>
                        <div>
                            <p class="text-1"><span class="proxima-nova-bold">Get exclusive video coaching from our </span><span class="red-color proxima-nova-extra-bold font-italic">CELEBRITY CHEF + 3 Specialty cookbooks <br />now!</span></p>
                            <ul class="ob-list">
                                <li>Keto Video Coaching<br />From A Five Star Chef</li>                        
                                <li>Keto Shopping Videos</li>
                                <li>Keto Comfort Foods</li>
                                <li>Italian Keto Cookbook</li>
                                <li>Keto Sweet Treats Recipes</li>
                            </ul>                    
                            <div class="text-area">
                                <p>You'll get 8 hours of keto video coaching from a five star chef and keto expert. In this exclusive five part video series, <span class="proxima-nova-bold">Celebrity Chef Ido Shapira</span> (he's worked for Madonna, David Bowie, Bjork, and Michael Bloomberg) will take you by the hand and walk through the supermarket, teaching you <span class="proxima-nova-bold red-color">HOW TO SHOP for keto the RIGHT way.</span></p>
                                <p>You'll find out how to properly read a label, find out which ingredients to watch out for, atnd how to find the freshest high QUALITY ingredients and save money too. <span class="proxima-nova-bold">These tips WILL save you money</span> at the grocery store.</p>
                                <p>You'll also get 62 pages of Keto Compatible recipes to perfectly complement your meal plan. <span class="proxima-nova-bold">The dessert recipes in the holiday guide are designed to kill your cravings FAST.</span> Stay in and have a movie night with you favorite comfort foods, or wow your family and friends with exquisite Italian cuisine.</p>
                                <p><span class="proxima-nova-bold">These videos and cookbooks normally sell for $69 on their own.</span> <span class="proxima-nova-bold red-color">Get them today for just $19!</span> Simply check the box above to claim yours and save money right now!!!</p>
                            </div>
                        </div>
                        <button data-dismiss="modal" type="button" class="btn btn-primary d-block mx-auto mb-1 btn-yes">Yes, I'll Take It</button>
                        <button data-dismiss="modal" type="button" class="btn d-block mx-auto btn-no" data-dismiss="modal">No thanks, I'm good</button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?php if (strpos(base_url(), 'simpleketosystem.com/fastspring') !== false) { ?>
    <div class="loading-modal"></div>
    <style>
        .loading-modal {
            display:    none;
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 ) 
                url('https://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
        }
        body.loading .loading-modal {
            overflow: hidden;   
        }
        body.loading .loading-modal {
            display: block;
        }
    </style>
<?php } ?>
