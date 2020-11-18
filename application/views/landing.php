<div class="container<?php if (isset($_GET['v']) && $_GET['v'] == "lc") echo "-fluid"; ?> h-100">
    <div class="row h-100 <?php if (isset($_GET['v']) && $_GET['v'] == "lc") echo "m-0"; ?>">
        <?php
        if (isset($_GET['v']) && $_GET['v'] == "lc") {
        ?>
            <div class="col-xl-6">
        <?php } else { ?>
            <div class="col-12">
        <?php } ?>
        <div class="col-12">
            <div class="wrapper">
                <h1>
                    <?php
                    if (isset($_GET['v']) && $_GET['v'] == "lc") {
                    ?>
                    <!--<span  class="going-low-carb">Going Low Carb?</span>-->
                    <style>
                    .no-webp header.masthead {
                        background-image: url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-m-test-3.jpg");
                    }
                    .webp header.masthead {
                        background-image: url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-m-test-3.webp");
                    }
                    @media (min-width: 1200px) {                        
                        .no-webp header.masthead {
                            background-image: url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-test-3.jpg");
                        }
                        .webp header.masthead {
                            background-image: url("https://d1a48q48yzujx1.cloudfront.net/assets/img/header-test-3.webp");
                        }
                    }
                    @media (min-width: 1200px) {
                        .col-xl-6 {
                            flex: 0 0 50%;
                            max-width: 50%;
                        }
                    }
                    .m-0 {
                        margin: 0 !important;
                    }
                    .going-low-carb {
                        font-size: 1.8em !important;
                        font-style: normal !important;
                        color: #2B2B2B !important;
                        display: block !important;
                        font-family: 'Proxima Nova Bold' !important;
                    }
                    @media (max-width: 575.98px) {
                        .going-low-carb {
                            font-size: 1.2em !important;
                        }
                    }
                    
   
                    </style>
                    <?php
                    }
                    ?>
                    <?php if (isset($_GET['v']) && $_GET['v'] == "lc") { ?>
                    Discover The Powerful<br /> Health Benefits of<br /> Eating For Body Type:<br />
                    <?php } else { ?>
                    Find out<br class="d-block d-sm-none" /> how much weight<br /> you'll lose with our<br />
                    <?php } ?>
                    <span>Simple <?php if(strpos(base_url(), 'simplelowcarbsystem.com') !== false) {echo "Low Carb";} else {echo "Keto";} ?><br class="d-block d-sm-none" /> Meal Plan</span>
                </h1>
                <div class="text-center">
                    <svg class="icon bounce chevron-down" width="28" height="28" stroke="#F64850" stroke-width="16"><use xlink:href="#chevron-down"></use></svg>
                    <form>
                        <input id="gender_female" name="gender" value="0" type="radio" onclick="genderClicked(this);" >
                        <label for="gender_female" class="btn-gender female">
                            Women Start Here
                        </label>
                        <input id="gender_male" name="gender" value="1" type="radio" onclick="genderClicked(this);" >
                        <label for="gender_male" class="btn-gender male">
                            Men Start Here
                        </label>
                    </form>
                </div>
                <p class="note">
                    <?php if(strpos(base_url(), 'simpleketosystem.com/plans') !== false || base_url() === 'https://simpleketosystem.com/') { ?>
                        Results may vary.
                    <?php } else if(strpos(base_url(), 'simpleketosystem.com/start') === false) { ?>
                        <?php if (isset($_GET['v']) && $_GET['v'] == "lc") { ?>
                            *People on a Konscious Keto meal program can expect to 
                            <br class="d-none d-sm-block">lose 1-2 lbs/week. Results vary depending on your starting 
                            <br class="d-none d-sm-block">point, goals, and effort.
                        <?php } else { ?>
                            *Results vary depending on your starting point, goals, and effort. 
                            <br class="d-none d-sm-block">
                            The average participant can expect to lose 1-2 lbs/week.
                        <?php } ?>
                    <?php } else { ?>
                        *Participants have reported losing up to 35 pounds, however
                        <br class="d-none d-sm-block">
                          the average participant can expect to lose 1-2 lbs/week.
                        <br class="d-none d-sm-block">
                        Results vary depending on your starting point, goals, and effort.
                    <?php } ?>
                </p>
            </div>
        </div>        
    </div>
</div>

<!--<div class="font_preload" style="opacity: 0">
    <span style="font-family: 'Futura Medium'"></span>
</div>-->


<script>
    function genderClicked(radio) {
        localStorage.setItem("gender", radio.value);
        var sid = getQueryString('sid');
        var cid = getQueryString('cid');
        localStorage.setItem("sid", sid ? sid : "");
        localStorage.setItem("cid", cid ? cid : "");
        setTimeout(function () {
            window.location.href = <?php echo "'" . base_url() . "quiz'"; ?>;
        }, 1000);
    }
    function getQueryString() {
        var key = false, res = {}, itm = null;
        // get the query string without the ?
        var qs = location.search.substring(1);
        // check for the key as an argument
        if (arguments.length > 0 && arguments[0].length > 1)
            key = arguments[0];
        // make a regex pattern to grab key/value
        var pattern = /([^&=]+)=([^&]*)/g;
        // loop the items in the query string, either
        // find a match to the argument, or build an object
        // with key/value pairs
        while (itm = pattern.exec(qs)) {
            if (key !== false && decodeURIComponent(itm[1]) === key)
                return decodeURIComponent(itm[2]);
            else if (key === false)
                res[decodeURIComponent(itm[1])] = decodeURIComponent(itm[2]);
        }

        return key === false ? res : null;
    }    
</script>
