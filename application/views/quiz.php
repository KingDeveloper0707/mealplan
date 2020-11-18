<div class="container my-auto shadow-container quiz-container">
    <div class="row justify-content-center">
        <div class="quiz-area">
            <div class="quiz-column col-lg-12">                
                <!-- multistep form -->
                <form id="msform" class="female-theme">
                    <div id="progressbar">
                        <div id="innerbar">
                            <div id="label"></div>
                        </div>                        
                    </div>
                    <input type="hidden" name="gender" id="gender" value="0">
                    <!-- fieldsets -->
                    <fieldset class="q-familiar single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="action-button next"></div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">2. How Familiar are you with <?php
                            if (strpos(base_url(), 'simplelowcarbsystem.com') !== false) {
                                echo "<br class='mobile-br'> Low Carb Diets?";
                            } else {
                                echo "the<br class='mobile-br'> Keto Diet?";
                            }
                            ?><span class="fs-subtitle">(Select one only)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_familiar_0" name="q_familiar" value="0" class="a-checkbox-button__input number-of-checked" type="radio">

                                        <label for="q_familiar_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">                                                        
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Not Familiar At All</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_familiar_1" name="q_familiar" value="1" class="a-checkbox-button__input number-of-checked" type="radio" >
                                        <label for="q_familiar_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">I Know The Basics</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_familiar_2" name="q_familiar" value="2" class="a-checkbox-button__input number-of-checked" type="radio" >
                                        <label for="q_familiar_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">I'm A Doctor Or Physician And Need A Plan</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>                                   
                        </div>
                    </fieldset>

                    <fieldset class="q-how">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <?php if (strpos(base_url(), 'simplelowcarbsystem.com') !== false) { ?>
                            <h2 class="fs-title red-color">How Low Carb Diets Work</h2>
                            <p class="text-left">When you lower carbs you lower blood sugar levels, which causes the body to burn stored fat for energy which leads to weight loss. Cutting back on carbs boosts your metabolism and helps people burn more calories.</p>
                            <p class="text-left">Low carb has been shown to reduce and stabilize blood sugar, help immunity and promote weight loss. Low carb works for many people who have not had success losing weight in the past.</p>
                        <?php } else { ?>
                            <h2 class="fs-title red-color">How Keto Works...</h2>
                            <p class="text-left">The Keto Diet is <span class="proxima-bold">a low carb, high fat, moderate protein diet.</span> When you eat according to this plan, <span class="proxima-bold"><u>your metabolism switches to burning stored body fat for energy.</u></span></p>
                            <p class="text-left">The keto diet has been shown to reduce and stabilize blood sugar, help immunity and promote weight loss. The keto diet works for many people who have not had success losing weight in the past.</p>
                        <?php } ?>

                        <div class="btn-container gotit-btn-container mb-2 d-block d-sm-none">
                            <div class="action-button next">
                                <span class="text">Got It</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <h3 class="fs-subtitle blue-color ml-0">Clinical&nbsp;Benefits Of&nbsp;The&nbsp;<?php
                            if (strpos(base_url(), 'simplelowcarbsystem.com') !== false) {
                                echo "Low&nbsp;Carb&nbsp;Diets";
                            } else {
                                echo "Keto&nbsp;Diet";
                            }
                            ?></h3>
                        <ul class="text-left">
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Weight Loss And Anti-Aging</span> - Harvard 2018 Study, Cell Metab 2017</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Boost Immune Response</span> - Science Immunology Yale 2019 Study</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Help Regulate Blood Sugar</span> - London 2005 Study</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Reduce Cholesterol And Triglycerides</span> - Clinical Cardiology 2004 Study</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Improve Mood, Wellbeing & Quality Of Life</span> - Neuroscience 2018 Study</div>
                            </li>
                            <li>
                                <svg class="icon" width="16" height="16"><use xlink:href="#check-circle-solid"></use></svg>
                                <div><span class="proxima-bold">Reduced Blood Pressure</span> - Archives of Internal Medicine 2010 Study</div>
                            </li>
                        </ul>

                        <div class="image-preload"></div>

                        <div class="btn-container gotit-btn-container">
                            <div class="action-button next">
                                <span class="text">Got It</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>                                            

                    <fieldset class="q-meat">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">4.  Which meats would you like to be included in your meal plan?<span class="fs-subtitle" >(Select as many as you like)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product1810" name="chicken" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >

                                        <label for="product1810" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>                                                
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image meat-chicken"></div>
                                                <div class="a-checkbox-button__text">Chicken</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product1824" name="bacon" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product1824" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image meat-bacon"></div>
                                                <div class="a-checkbox-button__text">Bacon</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product1811" name="pork" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product1811" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                        
                                                <div class="a-image meat-pork"></div>
                                                <div class="a-checkbox-button__text">Pork</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product1813" name="fish" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product1813" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image meat-fish"></div>
                                                <div class="a-checkbox-button__text">Fish</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product1812" name="beef" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product1812" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>                                                
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image meat-beef"></div>
                                                <div class="a-checkbox-button__text">Beef</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="noMeat" name="no_meat" value="1" class="a-checkbox-button__input" type="checkbox">
                                        <label for="noMeat" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                            
                                                <div class="a-image meat-no"></div>
                                                <div class="a-checkbox-button__text">No Meat</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-vegetable">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">5. Which vegetables would you like to be included in your meal plan?<span class="fs-subtitle">(Select as many as you like)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4771" name="broccoli" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product4771" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-broccoli"></div>
                                                <div class="a-checkbox-button__text">Broccoli</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4772" name="mushroom" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product4772" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-mushroom"></div>
                                                <div class="a-checkbox-button__text">Mushrooms</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4773" name="zuccini" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product4773" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-zucchini"></div>
                                                <div class="a-checkbox-button__text">Zucchini</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4774" name="cauliflower" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4774" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-cauliflower"></div>
                                                <div class="a-checkbox-button__text">Cauliflower</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4775" name="asparagus" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4775" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-asparagus"></div>
                                                <div class="a-checkbox-button__text">Asparagus</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4776" name="avocado" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4776" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image veg-avocadopic"></div>
                                                <div class="a-checkbox-button__text">Avocado</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">                                        
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-product">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">6. Would you like to <span class="red-color">AVOID</span> any of the following?<span class="fs-subtitle">(Select as many as you like)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4777" name="egg" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product4777" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">                                                        
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image pro-eggs"></div>
                                                <div class="a-checkbox-button__text">Eggs</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4778" name="nut" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox"  >
                                        <label for="product4778" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                        
                                                <div class="a-image pro-nuts"></div>
                                                <div class="a-checkbox-button__text">Nuts</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4779" name="cheese" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                        <label for="product4779" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image pro-cheese"></div>
                                                <div class="a-checkbox-button__text">Cheese</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4781" name="butter" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4781" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image pro-butter"></div>
                                                <div class="a-checkbox-button__text">Butter</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4782" name="coconut" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4782" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image pro-coconut"></div>
                                                <div class="a-checkbox-button__text">Coconut</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="product4783" name="brussel_sprout" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                        <label for="product4783" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon w-100 h-100"><use xlink:href="#close"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image pro-brussel"></div>
                                                <div class="a-checkbox-button__text">Brussels Sprouts</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-activity single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">7. What's your level of daily activity?<span class="fs-subtitle">(Select one only)</span></h2>                                    

                        <div class="m-form-checkboxes__items row justify-content-center">
                            <div class="m-form-checkboxes__item col-5">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_act_0" name="q_activity" value="0" class="a-checkbox-button__input number-of-checked" type="radio">

                                        <label for="q_act_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                        
                                                <div class="a-image act0"></div>
                                                <div class="a-checkbox-button__text">INACTIVE<div class="sub-text">very little daily activity<br />or movement</div></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-5">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_act_1" name="q_activity" value="1" class="a-checkbox-button__input number-of-checked" type="radio" >
                                        <label for="q_act_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image act1"></div>
                                                <div class="a-checkbox-button__text">LIGHT<div class="sub-text">desk job with<br />occasional walks</div></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-5">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_act_2" name="q_activity" value="2" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_act_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image act2"></div>
                                                <div class="a-checkbox-button__text">MODERATE<div class="sub-text">active day job<br />or regular exercise</div></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-5">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_act_3" name="q_activity" value="3" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_act_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-image act3"></div>
                                                <div class="a-checkbox-button__text">HEAVY<div class="sub-text">intense daily activity<br />or exercise</div></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-tired single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">8. Which time of the day do you feel most tired?<span class="fs-subtitle">(Important)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_tired_0" name="q_tired" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_tired_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Early Morning</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_tired_1" name="q_tired" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_tired_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">After Lunch</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_tired_2" name="q_tired" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_tired_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">After Dinner</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_tired_3" name="q_tired" value="3" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_tired_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Not Until Bed Time</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-digest single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">
                            9. How often do you experience digestive upsets?<br />
                            <span class="fs-subtitle">
                                E.g: bloating, cramps, constipation, diarrhea<br />
                                Your digestion plays an important role in converting food into energy.<br />
                            </span>
                            <span class="fs-subtitle">(Select one only)</span></h2>

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_digest_0" name="q_digest" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_digest_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Never</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_digest_1" name="q_digest" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_digest_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">A Couple Times Per Month</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_digest_2" name="q_digest" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_digest_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Twice A Week Or More</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_digest_3" name="q_digest" value="3" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_digest_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Daily</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-craving single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">
                            10. How often do you have uncontrollable cravings for specific foods?<br />
                            <span class="fs-subtitle">
                                Your level of cravings tell us a lot about your metabolic health, and will help decode what your body is trying to tell you.<br />
                            </span>
                            <span class="fs-subtitle">(Select one only)</span>
                        </h2>

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving_0" name="q_craving" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_craving_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Once A Month Or Less</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving_1" name="q_craving" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_craving_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">On A Weekly Basis</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving_2" name="q_craving" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_craving_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">A Few Times Per Week / Daily</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-craving1 single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">
                            11. Which type of foods do you crave the most?<br />
                            <span class="fs-subtitle">This will give us information about which 'fat burning foods' your body might respond to best.</span>                                                    
                            <span class="fs-subtitle">(Select one only)</span>
                        </h2>

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving1_0" name="q_craving1" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_craving1_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Carbs E.g. Bread, Pasta, Rice, Fried Foods</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving1_1" name="q_craving1" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_craving1_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Sweets E.g. Candy, Chocolate, Ice Cream, Cake</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving1_2" name="q_craving1" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_craving1_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Red Meat E.g. Burgers Or A Steak</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_craving1_3" name="q_craving1" value="3" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_craving1_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">No Cravings</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-symptom single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">
                            12. Are you affected by the following?
                            <span class="fs-subtitle">(Select one only)</span></h2>

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom_0" name="q_symptom" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_symptom_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Excessive Thirst</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom_1" name="q_symptom" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_symptom_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Frequent Urination</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom_2" name="q_symptom" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_symptom_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Blurry Vision</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom_3" name="q_symptom" value="3" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_symptom_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">None</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-symptom1 single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">
                            13. Do you experience any of the following problems?<br />
                            <span class="fs-subtitle">(Select one only)</span>
                        </h2>

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom1_0" name="q_symptom1" value="0" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_symptom1_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Swollen Legs, Ankles, Or Feet</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom1_1" name="q_symptom1" value="1" class="a-checkbox-button__input number-of-checked q-radio" type="radio" >
                                        <label for="q_symptom1_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Skin Rashes Or Flare Ups</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom1_2" name="q_symptom1" value="2" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_symptom1_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Depression Or Feeling Isolated</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_symptom1_3" name="q_symptom1" value="3" class="a-checkbox-button__input number-of-checked q-radio" type="radio">
                                        <label for="q_symptom1_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">None</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-changes single-option">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">14. Experienced any of the following changes recently?<span class="fs-subtitle">(Select one only)</span></h2>                                    

                        <div class="m-form-checkboxes__items row">
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_changes_0" name="q_recent_changes" value="0" class="a-checkbox-button__input number-of-checked" type="radio">

                                        <label for="q_changes_0" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">
                                                    <span class="male-option">Physical Injury</span>
                                                    <span class="female-option">Childbirth</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_changes_1" name="q_recent_changes" value="1" class="a-checkbox-button__input number-of-checked" type="radio" >
                                        <label for="q_changes_1" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">                                                    
                                                <div class="a-checkbox-button__text">Major Gain In Weight (25 lbs or more)</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_changes_2" name="q_recent_changes" value="2" class="a-checkbox-button__input number-of-checked" type="radio" >
                                        <label for="q_changes_2" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">Major Loss In Weight (25 lbs or more)</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_changes_3" name="q_recent_changes" value="3" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_changes_3" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">                                                            
                                                    <span class="male-option">Andropause (low testosterone)</span>
                                                    <span class="female-option">Menopause</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-12">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button horizontal">
                                    <div class="same-ratio-container">
                                        <input id="q_changes_4" name="q_recent_changes" value="none" class="a-checkbox-button__input number-of-checked" type="radio">
                                        <label for="q_changes_4" class="a-checkbox-button__label">
                                            <div class="gradient-back"></div>
                                            <div class="a-checkbox-button__check">
                                                <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                            </div>
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">None Of The Above</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>                                    
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-goals">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">15. What are your goals for this meal plan?<span class="fs-subtitle">(Select as many as you like)</span></h2>                                    

                        <div class="">
                            <div class="m-form-checkboxes__items row">
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_0" name="goal_0" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">

                                            <label for="q_goals_0" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">                                                    
                                                    <div class="a-checkbox-button__text">MORE<br />ENERGY</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_1" name="goal_1" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox" >
                                            <label for="q_goals_1" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">BETTER<br />SLEEP</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_2" name="goal_2" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_2" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">BECOME LEAN<br />& TONED</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_3" name="goal_3" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_3" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">INCREASE<br />STRENGTH</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_4" name="goal_4" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_4" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">IMPROVE<br />DIGESTION</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_5" name="goal_5" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_5" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">IMPROVE<br />METABOLISM</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_6" name="goal_6" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_6" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">BURN FAT<br />FOR ENERGY</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_7" name="goal_7" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_7" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">HELP IMPROVE CHRONIC CONDITIONS</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-form-checkboxes__item col-4">
                                    <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                        <div class="same-ratio-container">
                                            <input id="q_goals_8" name="goal_8" value="1" class="a-checkbox-button__input number-of-checked" type="checkbox">
                                            <label for="q_goals_8" class="a-checkbox-button__label">
                                                <div class="a-checkbox-button__check">
                                                    <svg class="icon" width="24" height="24" fill="#F64850"><use xlink:href="#check-circle-solid"></use></svg>
                                                </div>
                                                <div class="a-checkbox-button__content">
                                                    <div class="a-checkbox-button__text">GET INTO<br />KETOSIS<br />QUICKLY</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>

                    <fieldset class="q-measure q-measure-height-age">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">16. What's your height and age?<span class="fs-subtitle" >(Enter your details below)</span></h2>                                    

                        <div class="form-row term-container">
                            <div class="form-check form-group col-6 term-item">
                                <input class="form-check-input input-term" type="radio" name="input_term" id="input-term-1" value="metric" >
                                <label class="form-check-label" for="input-term-1">
                                    <span class="term-name">Metric</span>
                                </label>
                            </div>
                            <div class="form-check form-group col-6 term-item">
                                <input class="form-check-input input-term" type="radio" name="input_term" id="input-term-2" value="imperial" checked>
                                <label class="form-check-label" for="input-term-2">
                                    <span class="term-name">U.S.</span>
                                </label>
                            </div>                                    
                        </div>                        
                        <div class="m-form-checkboxes__items row justify-content-center">
                            <div class="m-form-checkboxes__item col-6 col-lg-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_measure_i0" name="" value="1" class="a-checkbox-button__input number-of-checked q-radio-measure" type="checkbox" >

                                        <label for="q_measure_i0" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">
                                                    <div>HEIGHT</div>
                                                    <div class="q-measure-imperial row no-gutters">
                                                        <div class="col-6 no-gutters">                                                            
                                                            <input type="number" placeholder="&#8213;" id="height_ft" class="a-input__input js-input float-left">
                                                            <div>feet</div>                                                            
                                                        </div>
                                                        <div class="col-6 no-gutters">                                                            
                                                            <input type="number" placeholder="&#8213;" id="height_in" class="a-input__input js-input float-left">
                                                            <div>inches</div>
                                                        </div>
                                                    </div>
                                                    <div class="q-measure-metric" style="display: none;">
                                                        <input type="number" placeholder="&#8213;" id="height_cm" class="a-input__input js-input" disabled >
                                                        <div>cm</div>
                                                    </div>
                                                    <input type="hidden" name="height" id="height">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-6 col-lg-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_measure_i1" name="" value="1" class="a-checkbox-button__input number-of-checked q-radio-measure" type="checkbox" >
                                        <label for="q_measure_i1" class="a-checkbox-button__label">                                                    
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">
                                                    <div>AGE</div>
                                                    <input type="number" placeholder="&#8213;" name="age" id="age" class="a-input__input js-input">
                                                    <div>years</div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>                                        
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div><div class="warning-text">Oops!  Please enter your selection before proceeding to the next page.</div></div>
                    </fieldset>

                    <fieldset class="q-measure q-measure-weight">
                        <div class="btn-container">
                            <div class="action-button previous">
                                <svg class="icon" width="40" height="40" stroke="#F64850" stroke-width="40"><use xlink:href="#angle-left"></use></svg>
                                <span class="text">Back</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <h2 class="fs-title">17. What's your weight loss goal?<span class="fs-subtitle" >(Enter your details below)</span></h2>                                    

                        <div class="m-form-checkboxes__items row no-gutteres justify-content-center">
                            <div class="m-form-checkboxes__item col-6 col-lg-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_measure_m3" name="" value="1" class="a-checkbox-button__input number-of-checked q-radio-measure" type="checkbox">
                                        <label for="q_measure_m3" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">
                                                    <div>CURRENT</div>                                                    
                                                    <div class="q-measure-metric" style="display: none;">
                                                        <input type="number" placeholder="&#8213;" id="curr_weight_kg" class="a-input__input js-input" disabled >
                                                        <div>kg</div>
                                                    </div>
                                                    <div class="q-measure-imperial">
                                                        <input type="number" placeholder="&#8213;" id="curr_weight_po" class="a-input__input js-input">
                                                        <div>pounds</div>
                                                    </div>
                                                    <input type="hidden" name="curr_weight" id="curr_weight">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="m-form-checkboxes__item col-6 col-lg-4">
                                <div class="m-form-checkboxes__checkbox-button a-checkbox-button">
                                    <div class="same-ratio-container">
                                        <input id="q_measure_m2" name="" value="1" class="a-checkbox-button__input number-of-checked q-radio-measure" type="checkbox" >
                                        <label for="q_measure_m2" class="a-checkbox-button__label">
                                            <div class="a-checkbox-button__content">
                                                <div class="a-checkbox-button__text">
                                                    <div>GOAL WEIGHT</div>
                                                    <div class="q-measure-metric" style="display: none;">
                                                        <input type="number" placeholder="&#8213;" id="goal_weight_kg" class="a-input__input js-input" disabled >
                                                        <div>kg</div>
                                                    </div>
                                                    <div class="q-measure-imperial">
                                                        <input type="number" placeholder="&#8213;" id="goal_weight_po" class="a-input__input js-input">
                                                        <div>pounds</div>
                                                    </div>
                                                    <input type="hidden" name="goal_weight" id="goal_weight">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-container">
                            <div class="action-button next">
                                <span>Next</span>
                                <svg class="icon" width="32" height="32" stroke="white" stroke-width="40"><use xlink:href="#angle-right"></use></svg>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div><div class="warning-text">Oops!  Please enter your selection before proceeding to the next page.</div></div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="row processing-area">
        <div class="col-lg-12 text-center" style="-ms-flex: auto !important;">                        
            <!--                        <video id="processing_video" width="300" height="300" muted playsinline >
                                        <source src="<?php echo keycdn_url() . 'assets/img/'; ?>processing.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>-->
            <div class="progress" id="progress"></div>
            <div>
                <ul id="processing_carousel">
                    <li>
                        <svg class="icon" width="18" height="18" fill="#F64850"><use xlink:href="#check-solid"></use></svg>
                        Identifying Dietary Profile...
                    </li>
                    <li>
                        <svg class="icon" width="18" height="18" fill="#F64850"><use xlink:href="#check-solid"></use></svg>
                        Analyzing Root Cause Factors...
                    </li>
                    <li>
                        <svg class="icon" width="18" height="18" fill="#F64850"><use xlink:href="#check-solid"></use></svg>
                        Foods To Help Eliminate Fatigue...
                    </li>
                    <li>
                        <svg class="icon" width="18" height="18" fill="#F64850"><use xlink:href="#check-solid"></use></svg>
                        Foods For Metabolism Repair...
                    </li>
                    <li>
                        <svg class="icon" width="18" height="18" fill="#F64850"><use xlink:href="#check-solid"></use></svg>
                        Foods That Increase Energy...
                    </li>
                </ul>
            </div>
            <div class="button-area">
                <h2>
                    Your <span class="red-color font-italic">Personalized</span> Meal Plan<br />Has Been Created!
                </h2>
                <!--a href="#" class="btn btn-primary offer-badge btn-continue mb-3">Continue >></a-->
            </div>
        </div>
    </div>
</div>
