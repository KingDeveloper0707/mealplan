///***************************** custom ******************************/
var obj_mealplan;
var expire_date_time = "";
var email_global;
var videolist_mar;

//easydropdown.all({
//    behavior: {
//        liveUpdates: true
//    }
//});

$(document).ready(function () {
    if ($('header.masthead').hasClass('mealplan') ||
            $('header.masthead').hasClass('resource') ||
            $('header.masthead').hasClass('vip') ||
            $('header.masthead').hasClass('download') ||
            $('header.masthead').hasClass('faq') ||
            $('header.masthead').hasClass('video')) {
        if ($(window).width() > 575.98) {
            $('.weeks-container .edd-root').okshadow({
                color: '#333',
                xMax: 0,
                yMax: 24,
                //        xOffset: 12,
                yOffset: 12,
                //        yFactor: 11110,
                fuzzMin: 10,
                fuzzMax: 50
            });
        }

        var uid = getQueryString('uid');
        $('section#download .btn-download').attr('href', 'api/download_grocery_list?uid=' + getQueryString('uid') + '&i_week=0');

        populatePlanTable(obj_mealplan);
    }
});

function weekselect_opened() {
    $('body').append('<div class="weekselect-backdrop fade show"></div>');
    $('body').addClass('overflow-hidden');
    $('.backdrop-note').removeClass('d-none');
}
function weekselect_closed() {
    $('.weekselect-backdrop').remove();
    $('body').removeClass('overflow-hidden');
    $('.backdrop-note').addClass('d-none');
}

$(document).on("mouseover", '#weekdayTab.nav-tabs > li > a', function () {
    var str_id = $(this).attr('id');
    str_id = str_id.substring(0, str_id.length - 4);
    var selector = '#weekdayTabContent .tab-pane:not(#' + str_id + ')';
    $(selector).removeClass('active').removeClass('show');
    $(this).tab('show');
});

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
    itm = pattern.exec(qs);
    while (itm) {
        if (key !== false && decodeURIComponent(itm[1]) === key)
            return decodeURIComponent(itm[2]);
        else if (key === false)
            res[decodeURIComponent(itm[1])] = decodeURIComponent(itm[2]);
    }

    return key === false ? res : null;
}

function weekChange(val) {
    var i_week = val;//$(".m-meal-weeks__select > option:selected").index();

    $('.download-week-num').html(parseInt(parseInt(i_week) + 1));
    $('section#download .btn-download').attr('href', 'api/download_grocery_list?uid=' + getQueryString('uid') + '&i_week=' + i_week);

    populatePlanTable(obj_mealplan, val);
}

function populatePlanTable(obj_mealplan, i_week) {
    if (i_week === undefined) {
        i_week = 0;
    }
    var html = '';
    var html_weekdayTab = '';
    var week_start_day = i_week * 7 + 1;
    
    for (var day = week_start_day; day < week_start_day + 7; day++) {
        html_weekdayTab += '<li class="nav-item">';
        html_weekdayTab += '<a class="nav-link' + (day % 7 === 1 ? ' active' : '') + '" id="day-' + day + '-tab" data-toggle="tab" href="#day-' + day + '" role="tab" aria-controls="day-' + day + '" aria-selected="true"><span>Day ' + day + '</span></a>';
        html_weekdayTab += '</li>';

        html += '<div class="tab-pane fade' + (day % 7 === 1 ? ' show active' : '') + '" id="day-' + day + '" role="tabpanel" aria-labelledby="day-' + day + '-tab">';
        html += '<div class="container-fluid no-padding">';
        html += '<div class="row">';
        for (var i_type = 0; i_type < 4; i_type++) {
            var type_names = ['Breakfast', 'Lunch', 'Snack', 'Dinner'];
            var meal_name = (obj_mealplan[(day - 1) * 4 + i_type]['name']).replace(/\\/g, '');
            var img = obj_mealplan[(day - 1) * 4 + i_type]['img_link'];
            var link = obj_mealplan[(day - 1) * 4 + i_type]['blog_link'];

            html += '<div class="col-md-6 col-lg-3">';
            html += '<div class="card meal-card">';
            html += '<p class="type">' + type_names[i_type] + '</p>';
            html += '<a href="' + link + '" class="meal-body" target="_blank">';
            html += '<div class="meal-name-wrapper">';
            html += '<p class="meal-name">' + meal_name + '</p>';
            html += '</div>';
            html += '<div class="meal-img" style="background: url(' + img + ')"></div>';
            html += '</a>';
            html += '<div class="favorite-wrapper">';
            html += '<span>FAVORITE</span>';
            html += '<a href="#" class="btn btn-favorite"><i class="fas fa-fw fa-heart"></i></a>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        }
        html += '</div>';
        html += '</div>';
        html += '</div>';
    }
    $('#weekdayTab').html(html_weekdayTab);
    $('#weekdayTabContent').html(html);

    checkScreenSize();
}

//$(".submit").click(function () {
//    return false;
//})

///************** accordion table ***************///
//$(document).ready(function () {
var maxMobileSize = 768; // this value should match the media query
var mobileAccordionTableSelector = ".table.mobile-accordion";


// Resize and Reorientation code borrowed and modified from this StackOverflow answer:
//		http://stackoverflow.com/a/6603537
var previousOrientation = window.orientation;

var checkOrientation = function () {
    if (window.orientation !== previousOrientation) {
        previousOrientation = window.orientation;
        checkScreenSize();
    }
};

var checkScreenSize = function () {
    var width = $(window).width();

    if (width < maxMobileSize) {
        console.log('handleMobile start');
        handleMobile();
    } else {
        handleDesktop();
    }
};

window.addEventListener("resize", checkScreenSize, false);
window.addEventListener("orientationchange", checkOrientation, false);

// Android doesn't always fire orientationChange on 180 degree turns
setInterval(checkOrientation, 2000);


function handleMobile() {
    slideUpAllInactive();
}

function handleDesktop() {
    showRows();
    addRowHighlighting();
}

function showRows() {
    $(mobileAccordionTableSelector + " .tr").each(function () {
        $(this).removeAttr("style");
    });
}

function addRowHighlighting() {
    var rows = $(".table .tbody .tr");

    /* Add a highlighting class on even rows */
    for (var i = 0; i < rows.length; i++) {
        if (i % 2 === 1) {
            $(rows[i]).addClass("alternate-highlight");
        }
    }
}

function slideUpAllInactive() {
    $(".table .rh").not(".active").each(function () {
        $(this).next().slideUp();
    });
}

function handleMobileAccordionTableClick(rowHeader) {
    var table = $(rowHeader).parents(".table");

    $(table).find(".rh").each(function () {
        $(this).removeClass("active");
    });

    slideUpAllInactive();

    var nextRow = $(rowHeader).next();
    if (!nextRow.is(":visible")) {
        $(rowHeader).addClass("active");
        nextRow.slideDown();
    }
}

$(document).on("click", mobileAccordionTableSelector + " .rh", function () {
    handleMobileAccordionTableClick(this);
});

// Need to run this on first load
checkScreenSize();
//});


function readmoreClicked(btn_readmore) {
    var moreText = $(btn_readmore).parent().find('.more-text');
    var btnText = $(btn_readmore);
    var parent = $(btn_readmore).parent().parent();

    if ($(moreText).css('display') !== 'none') {
//    if ($(btnText).html() == 'Read Less') {        
        $(btnText).html('<span>Read More </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>');
        $(moreText).hide();
        $(parent).css('height', '480px');
    } else {
        $(btnText).html('<span>Read Less </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-up"></use></svg>');
        $(moreText).css('display', 'inline');
        $(parent).height('auto');
    }
}

$('#article-slider').slick({
    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><svg class="icon" width="50" height="50"><use xlink:href="#mp-angle-left"></use></svg></button>',
    nextArrow: '<button class="slick-next" aria-label="Next" type="button"><svg class="icon" width="50" height="50"><use xlink:href="#mp-angle-right"></use></svg></button>',
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover: false,
    variableWidth: false,
    variableHeight: false,
    responsive: [
        {
            breakpoint: 991.98,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 575.98,
            settings: {
                slidesToShow: 1,
                arrows: false,
                dots: true
            }
        }
    ]
});


$(document).ready(function () {

    if ($('header.masthead').hasClass('video')) {

        var videolist = [
            {
                "group": "QUICK START VIDEO",
                "videos": [{
                        "vid": "76ol25ytgk",
                        "title": "Quick Start 1",
                        "tid": "0afcfeed9d8b95b3c10132d3fb923e1b8546cf7f",
                        "dur": "2:39"
                    }, {
                        "vid": "snl6zd80jx",
                        "title": "Quick Start 2",
                        "tid": "28c2a6bf2b7459b07eaa6eaa5e6a50ea74478d35",
                        "dur": "2:35"
                    }, {
                        "vid": "kojzhmpimm",
                        "title": "Quick Start 3",
                        "tid": "d9348e84c6dd24f286f77f6e6de4320823f42f67",
                        "dur": "1:21"
                    }, {
                        "vid": "05eia1gkcr",
                        "title": "Quick Start 4",
                        "tid": "34740589a6dfbd43c043dbe3df253508d3d700c6",
                        "dur": "4:08"
                    }, {
                        "vid": "ldcqw05zip",
                        "title": "Quick Start 5",
                        "tid": "9bb53a810acbb0837d2020e6a448eafd93ceb9a1",
                        "dur": "0:40"
                    }]
            }, {
                "group": "KETO WEEK 1",
                "videos": [{
                        "vid": "lham04z3f5",
                        "title": "Keto Lifestyle",
                        "tid": "4867fbab1d1b64ba6b2879fba7d08b00b117f77f",
                        "dur": "0:54"
                    }, {
                        "vid": "nuv6jisdv0",
                        "title": "Keto Benefits",
                        "tid": "79906ae43be7a1c05744efcb878477772141ae29",
                        "dur": "2:41"
                    }, {
                        "vid": "azcosbjdge",
                        "title": "What Is Keto",
                        "tid": "0cf196265415653e2615e7eb3b2f3166b465ab39",
                        "dur": "0:14"
                    }, {
                        "vid": "t6ot1meuzu",
                        "title": "Keto Friendly Foods",
                        "tid": "1136df4030d172c8b11ac2b11b4215fe115c7591",
                        "dur": "2:42"
                    }, {
                        "vid": "blkioz2rfh",
                        "title": "How To Begin Keto",
                        "tid": "eee48e7aed06b95f4d00fba6b0a4f0e149f74c04",
                        "dur": "2:45"
                    }, {
                        "vid": "xc8y1sg573",
                        "title": "How To Count Carbs",
                        "tid": "9f87d009f545d9417edfd3ddaa6cf2325c83932d",
                        "dur": "1:48"
                    }, {
                        "vid": "ceo2e0tn7p",
                        "title": "Why Start Keto Lifestyle",
                        "tid": "ed365c51a9e96e5a14ea05506bbcb2263e536542",
                        "dur": "1:06"
                    }, {
                        "vid": "bcx734elvq",
                        "title": "Be Flexible When Doing Keto",
                        "tid": "7222e304abdee83a3e36306626618ea8d89d8c2f",
                        "dur": "2:27"
                    }]
            }, {
                "group": "KETO WEEK 2",
                "videos": [{
                        "vid": "mo9ult7t7j",
                        "title": "Effects of Keto",
                        "tid": "750b2e1c8f31c6a485b81104a5326d178957ef29",
                        "dur": "2:59"
                    }, {
                        "vid": "pnelecsest",
                        "title": "What is Glycemic Index",
                        "tid": "10e0257118afcc7479ff613b58cbfe79e47c4451",
                        "dur": "0:34"
                    }, {
                        "vid": "cbwihod9l8",
                        "title": "Metabolic Fat Burning",
                        "tid": "b9d6a300963aa331d479a5e4aeaa49d4bd1712d0",
                        "dur": "3:15"
                    }, {
                        "vid": "jwjfpv2fvz",
                        "title": "What Scales Tell You",
                        "tid": "90f9be5ca5aa63bd6f954539da1cb8ba01532afc",
                        "dur": "1:06"
                    }, {
                        "vid": "1k1or6toa2",
                        "title": "What To Do About Cravings",
                        "tid": "3f7db55bc7e2e87cd44260de4a70c178f7c6329f",
                        "dur": "1:21"
                    }, {
                        "vid": "9qsgijy7aj",
                        "title": "Exercise for Keto",
                        "tid": "2744bde2ecf920d0bc0331c78e18294612fd083a",
                        "dur": "1:25"
                    }, {
                        "vid": "zgk8t3z924",
                        "title": "Benefits of Fasting",
                        "tid": "80445c6aec38cc642f5ae9291d88fd07560e901b",
                        "dur": "0:53"
                    }, {
                        "vid": "9ha3m6chnf",
                        "title": "Fasting pt 1",
                        "tid": "6cb4ec1547a45204a4b70294eab4417765b1130f",
                        "dur": "1:41"
                    }, {
                        "vid": "o6ohum57l0",
                        "title": "Fasting pt 2",
                        "tid": "80d21230a1f30d669230e0ddccb41100bfed1125",
                        "dur": "2:27"
                    }, {
                        "vid": "blcc0lbh4a",
                        "title": "Keto Intermittant Fasting",
                        "tid": "4bbc56df0dabb94b8764b9855ab8e65c7002d021",
                        "dur": "2:15"
                    }, {
                        "vid": "3ocwn3p60o",
                        "title": "Keto Fasted Exercise",
                        "tid": "d28718d18ff9c3687f6c8bea34b736d699ad80cc",
                        "dur": "1:01"
                    }, {
                        "vid": "zztxjnyyaa",
                        "title": "Keto Starvation Mode",
                        "tid": "c25fa76ab9ff8c14b1b1d73127e589ae2a32ffef",
                        "dur": "2:21"
                    }]
            }, {
                "group": "KETO WEEK 3",
                "videos": [{
                        "vid": "3tdr7akyr1",
                        "title": "Health Benefits",
                        "tid": "a2c6484147a83a952874dff0be9f5c815bb72df8",
                        "dur": "1:51"
                    }, {
                        "vid": "es8tnw7hyg",
                        "title": "Digestive Issues While Doing Keto",
                        "tid": "aec578e8e606b10730009cf2c16ba7c6266853be",
                        "dur": "2:20"
                    }, {
                        "vid": "s3gl8aiyx4",
                        "title": "Probiotics",
                        "tid": "da51902234b0ac5ab57508d25799b46b4b48a3a9",
                        "dur": "1:30"
                    }, {
                        "vid": "ju2c48ymct",
                        "title": "Prebiotics",
                        "tid": "39f5c67feb92f8fc500bec4301e50783fc4f2014",
                        "dur": "1:03"
                    }, {
                        "vid": "i3up5v5r9b",
                        "title": "Digestive Enzymes",
                        "tid": "3c518bb0123f6004a2c00528f18729c86f82e94d",
                        "dur": "0:48"
                    }, {
                        "vid": "0hfjmoawig",
                        "title": "Salts",
                        "tid": "a6cd45a90e53835aeac7180c7febd4f286ceaeb5",
                        "dur": "1:49"
                    }, {
                        "vid": "933sqcbyv6",
                        "title": "Oils",
                        "tid": "e18dedf3aab3d97b99cb20c0cbcfa2b2d8b9e323",
                        "dur": "3:41"
                    }, {
                        "vid": "5p8yxg3ozl",
                        "title": "Getting Enough Fat alt",
                        "tid": "514c03de50d86329ea5ebf75ef1697ada7f9a299",
                        "dur": "2:22"
                    }, {
                        "vid": "ujotosu7q1",
                        "title": "How To Get More Oil",
                        "tid": "c5699e6900f575c7b185b70592bf82aa3615eb48",
                        "dur": "1:35"
                    }]
            }
        ];
        var html = "";


        for (var i = 0; i < videolist.length; i++) {

            var group = videolist[i]['group'];

            var videos = videolist[i]['videos'];
            html += '<button class="accordion">' + group + '<svg class="icon"><use xlink:href="#angle-down"></use></svg></button>';
            html += '<div class="panel">';

            for (var j = 0; j < videos.length; j++) {

                var vid = videos[j]['vid'];
                var title = videos[j]['title'];
                var tid = videos[j]['tid'];
                var dur = videos[j]['dur'];

                html += '<a href="#wistia_' + vid + '?autoPlay=false" class="vid-item' + (i === 0 && j === 0 ? " active" : "") + '" data-group="' + group + '" data-vid="' + vid + '" data-title="' + title + '" data-dur="' + dur + '">';
                html += '<div class="thumbnail">';
                html += '<picture>';
                html += '<source srcset="https://embedwistia-a.akamaihd.net/deliveries/' + tid + '.webp?image_crop_resized=320x180" type="image/webp">';
                html += '<img class="mx-auto d-block w-100" src="https://embedwistia-a.akamaihd.net/deliveries/' + tid + '.jpg?image_crop_resized=320x180" alt="">';
                html += '</picture>';
                html += '<p class="vid-dur">' + dur + '</p>';
                html += '</div>';
                html += '<div class="title-area">';
                html += '<p class="title">' + title + '</p>';
                //                html += '<p class="status">WATCHED</p>';
                html += '</div>';
                html += '</a>';
            }
            html += '</div>';
        }

        $('.video-list').html(html);

//        setTimeout(function () {
//            $('.video-list .accordion:first-child').trigger('click');
//        }, 3000);

    }
    if ($('header.masthead').hasClass('mar')) {

        videolist_mar = [
            {
                "group": "mar_course",
                "videos": [
                    {
                        "index": 0,
                        "vid": "tlq0my39na",
                        "title": "Finding the Fountain of Youth Through Your Diet",
                        "content_visible": "<p>Very few people are aware that the fountain of youth is real, and that one of the tickets to the fountain of youth is through your diet.</p>",
                        "content_hidden": "<p>Our western approach to diet is complex and, in many ways, counter-productive. The way that we eat is just as important as what we eat, and you might be surprised to learn that you can seriously improve your health just by changing the time of day that you choose to eat your meals.</p>" +
                                "<p>One of the best ways to maximize your eating power, improve your metabolism, and start looking and feeling younger is a diet practice called intermittent fasting. This video will give you an introduction to intermittent fasting so you can begin to understand what it is and how it works.</p>" +
                                "<p><a href='https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4104704/' target='_blank'>https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4104704/</a></p>" +
                                "<p><a href='https://news.harvard.edu/gazette/story/2017/11/intermittent-fasting-may-be-center-of-increasing-lifespan/' target='_blank'>https://news.harvard.edu/gazette/story/2017/11/intermittent-fasting-may-be-center-of-increasing-lifespan/</a></p>" +
                                "<p><a href='https://www.nia.nih.gov/news/research-intermittent-fasting-shows-health-benefits' target='_blank'>https://www.nia.nih.gov/news/research-intermittent-fasting-shows-health-benefits</a></p>",
                        "tid": "1fcb07cabf0891caf42f587652a79e75",
                        "dur": "0:40"
                    }, {
                        "index": 1,
                        "vid": "3mhc5mmci0",
                        "title": "The Lion Story & Intermittent Fasting",
                        "content_visible": "<p>When you think of lions, you might first come up with ideas of fierce predators, eating more than their share of fresh meat as they hunt through the savannah. However, this isn't really the case � in fact, it's more of a projection of our own behaviors. Lions eat a lot differently than people do. They actually come closer to following a regular pattern of intermittent fasting.</p>",
                        "content_hidden": "<p>This section will explain how and why animals like the lion prefer to intermittently fast. We'll also talk about some of the reasons you can take advantage of this unique fasting practice.</p>" +
                                "<p><a href='https://www.sciencedaily.com/releases/2019/10/191021111842.htm' target='_blank'>https://www.sciencedaily.com/releases/2019/10/191021111842.htm</a></p>" +
                                "<p><a href='https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4895052/' target='_blank'>https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4895052/</a></p>" +
                                "<p><a href='https://www.sciencedaily.com/releases/2019/12/191226084351.htm' target='_blank'>https://www.sciencedaily.com/releases/2019/12/191226084351.htm</a></p>",
                        "tid": "c2016547ffed70a4e130d5480dc1cbdd",
                        "dur": "0:40"
                    }, {
                        "index": 2,
                        "vid": "swpb0ir7lf",
                        "title": "The Fountain of Youth - Metabolic Age",
                        "content_visible": "<p>What if we told you that a simple number could measure your overall health and well-being. That number is your metabolic age. Learning about it can be the key to establishing good health, improving your eating practices, and getting good exercise.</p>",
                        "content_hidden": "<p>Once you start learning about how your metabolic age reflects your general health, you're going to excited to start improving it � and that's what this section is all about. By reducing your metabolic age, you're basically making all of the other systems in your body function at a higher level.</p><p>People with a low metabolic age have more energy, feel livelier, and look younger than people with an older metabolic age. And, lucky for you, it's not hard to lower that metabolic age. Some of the best ways to improve your metabolic age are as simple as getting enough exercise and making changes in your diet.</p>" +
                                "<p>Those are the things that we're going to talk about in this video.</p>" +
                                "<p><a href='https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6575031/' target='_blank'>https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6575031/</a></p>" +
                                "<p><a href='https://pubmed.ncbi.nlm.nih.gov/29164910/' target='_blank'>https://pubmed.ncbi.nlm.nih.gov/29164910/</a></p>" +
                                "<p><a href='https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6284760/' target='_blank'>https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6284760/</a></p>" +
                                "<p><a href='https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4254402/' target='_blank'>https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4254402/</a></p>" +
                                "<p><a href='https://www.health.harvard.edu/blog/intermittent-fasting-surprising-update-2018062914156' target='_blank'>https://www.health.harvard.edu/blog/intermittent-fasting-surprising-update-2018062914156</a></p>",
                        "tid": "1993fc91750f734bf83ada354b88301b",
                        "dur": "4:08"
                    }, {
                        "index": 3,
                        "vid": "brs32c5r8w",
                        "title": "Mastering Your Metabolism with Intermittent Fasting",
                        "content_visible": "<p>There's a lot of misinformation out there, and we're hoping to clear it all up for you. One of the things that people often get confused about intermittent fasting is that it's bad for your metabolism. It's not, and this myth is actually bad for the fasting community because it discourages people from trying it themselves!</p>",
                        "content_hidden": "<p>What's actually bad for your metabolism is low-calorie diets and fasts where you go long periods without eating anything. That's not what intermittent fasting is all about. Intermittent fasting is all about mastering your metabolism and triggering autophagy without doing any damage to your body.</p><p>Intermittent fasting helps with quite a few other things, as well. It helps to reduce aging by getting rid of free radicals � annoying, unstable molecules that can wreak havoc in your body. Free radicals cause health problems and can create huge issues down the line � so getting rid of them is important for anyone who wants to live longer!</p>" +
                                "<p><a href='http://www.sciencedirect.com/science/article/pii/S095528630400261X' target='_blank'>http://www.sciencedirect.com/science/article/pii/S095528630400261X</a></p>" +
                                "<p><a href='http://www.sciencedirect.com/science/article/pii/S095528630400261X' target='_blank'>http://www.sciencedirect.com/science/article/pii/S095528630400261X</a></p>" +
                                "<p><a href='https://www.sciencedaily.com/releases/2019/01/190131113934.htm' target='_blank'>https://www.sciencedaily.com/releases/2019/01/190131113934.htm</a></p>" +
                                "<p><a href='https://translational-medicine.biomedcentral.com/articles/10.1186/s12967-016-1044-0The' target='_blank'>https://translational-medicine.biomedcentral.com/articles/10.1186/s12967-016-1044-0The</a></p>" +
                                "<p><a href='https://www.sciencedirect.com/science/article/pii/S0104423013000213' target='_blank'>https://www.sciencedirect.com/science/article/pii/S0104423013000213</a></p>",
                        "tid": "e0e32293e3b2e3be6e843572013a4718",
                        "dur": "2:35"
                    }, {
                        "index": 4,
                        "vid": "3oopr5lc1p",
                        "title": "The Superhero's Fasting Guide",
                        "content_visible": "<p>There are lots of different ways to fast out there. For most people, fasting is simple: you just stop eating. Right?</p>",
                        "content_hidden": "<p>Wrong! While that's definitely one type of fasting, it's more of a traditional type. In fact, it's not actually that great for you. For the most part, traditional fasting is mostly just considered useful for cleansing or for spiritual purposes.</p>" +
                                "<p>The main reason for this is that fasting can be pretty hard on your body. Your body needs vitamins, minerals, fats and proteins to function � so depriving it of all these important nutrients can be quite unhealthy for it.</p><p>That's why we've put together this fantastic fasting guide for Superheroes who want to take their body to the next level. Our fasting guide allows you to enjoy a few calories here and there to make sure that you don't deplete your body of any important nutrients.</p>" +
                                "<p>We'll also  make sure that you know the best way to get into a state of autophagy � the process during which your cells repair themselves and replace old parts. In other words, autophagy is one of the most important things for lowering your metabolic age.</p>" +
                                "<p><a href='https://www.multicare.org/happy-back/blog/intermittent-fasting-the-latest-research/' target='_blank'>https://www.multicare.org/happy-back/blog/intermittent-fasting-the-latest-research/</a></p>" +
                                "<p><a href='https://www.lifespan.io/news/intermittent-fasting-shows-multiple-health-benefits/' target='_blank'>https://www.lifespan.io/news/intermittent-fasting-shows-multiple-health-benefits/</a></p>" +
                                "<p><a href='https://www.bizjournals.com/twincities/news/2020/02/28/intermittent-fasting-can-aid-in-weight-loss-anti.html' target='_blank'>https://www.bizjournals.com/twincities/news/2020/02/28/intermittent-fasting-can-aid-in-weight-loss-anti.html</a></p>",
                        "tid": "173ba473963d548c4ab058a3e8909c5c",
                        "dur": "2:39"
                    }, {
                        "index": 5,
                        "vid": "2lbahjmaw2",
                        "title": "Watching the Clock � How Long to Fast?",
                        "content_visible": "<p>What's the best length of time to fast?</p>",
                        "content_hidden": "<p>Years ago, when fasting was a religious and spiritual thing, that question was usually answered in terms of days or even weeks. However, now that we're starting to see research supporting intermittent fasting, it's becoming clear that the best length of a fast is actually a matter of hours.</p>" +
                                "<p>Research has shown that shorter fasts are generally better for your body. They're less harsh on your body, and you're not going to get depleted of vital minerals. Plus, if you're fasting for long enough to put your body into autophagy, you're still getting the most important benefits.</p>" +
                                "<p>Long fasts might actually do the opposite, and make it harder for your body to go into autophagy. This video is going to let you know all about the proper length of fasting.</p>" +
                                "<p><a href='https://www.npr.org/sections/thesalt/2019/12/08/785142534/eat-for-10-hours-fast-for-14-this-daily-habit-prompts-weight-loss-study-finds#:~:text=Live%20Sessions-,Eat%20For%2010%20Hours%2C%20Fast%20For%2014%3A%20Daily%20Fasting%20Helps,fat%20and%20feel%20more%20energetic.' target='_blank'>https://www.npr.org/sections/thesalt/2019/12/08/785142534/eat-for-10-hours-fast-for-14-this-daily-habit-prompts-weight-loss-study-finds#:~:text=Live%20Sessions-,Eat%20For%2010%20Hours%2C%20Fast%20For%2014%3A%20Daily%20Fasting%20Helps,fat%20and%20feel%20more%20energetic.</a></p>" +
                                "<p><a href='https://www.cell.com/cell-metabolism/pdf/S1550-4131(13)00503-2.pdf' target='_blank'>https://www.cell.com/cell-metabolism/pdf/S1550-4131(13)00503-2.pdf</a></p>" +
                                "<p><a href='https://onlinelibrary.wiley.com/doi/full/10.1002/oby.22829' target='_blank'>https://onlinelibrary.wiley.com/doi/full/10.1002/oby.22829</a></p>" +
                                "<p><a href='https://www.everydayhealth.com/diet-nutrition/intermittent-fasting-may-improve-metabolic-health-small-study-finds/' target='_blank'>https://www.everydayhealth.com/diet-nutrition/intermittent-fasting-may-improve-metabolic-health-small-study-finds/</a></p>",
                        "tid": "5e55a5fb5a1ce2538ebad05b0edd1fc5",
                        "dur": "1:21"
                    }, {
                        "index": 6,
                        "vid": "zqefbcogr3",
                        "title": "Intermittent Fasting in the Rumor Mill",
                        "content_visible": "<p>If you haven't tried fasting, or if you know somebody who thinks fasting is a bad idea, then you're not alone. One of the reasons that so many people are against fasting is that many rumors and myths flying around.</p>",
                        "content_hidden": "<p>Mind you, most of these rumors are grounded in concern for your health and well-being. The issue is that they're just not true.</p>" +
                                "<p>For example, one of the most common reasons that people don't want to try intermittent fasting is because that usually means that they have to skip their breakfast. And most people think that breakfast is the most important meal of the day.</p>" +
                                "<p>Not only is this not true but there's actually an interesting (and somewhat ridiculous) story that led everyone to believe that. We'll tell you that story, and many other interesting things, in this video about intermittent fasting in the rumor mill.</p>" +
                                "<p><a href='https://www.webmd.com/diet/news/20191226/intermittent-fasting-diet-could-boost-your-health#1' target='_blank'>https://www.webmd.com/diet/news/20191226/intermittent-fasting-diet-could-boost-your-health#1</a></p>" +
                                "<p><a href='https://www.insider.com/intermittent-fasting-slows-aging-cancer-diabetes-heart-disease-study-2019-12' target='_blank'>https://www.insider.com/intermittent-fasting-slows-aging-cancer-diabetes-heart-disease-study-2019-12</a></p>" +
                                "<p><a href='https://www.tandfonline.com/doi/full/10.1080/07853890.2020.1770849' target='_blank'>https://www.tandfonline.com/doi/full/10.1080/07853890.2020.1770849</a></p>",
                        "tid": "d9fd64b175ceed48a299ed1902eedce0",
                        "dur": "0:40"
                    }
                ]
            }, {
                "group": "mar_fat_burner",
                "videos": [{
                        "vid": "zxo7e4eazc",
                        "title": "Day 1",
                        "tid": "849cf5b922f21c958321dd9e9ae240d86742fdc1",
                        "dur": "2:39"
                    }, {
                        "vid": "yfqnhg37mz",
                        "title": "Day 2",
                        "tid": "5c007c0ad3b698a989710f355b0ef335b5244750",
                        "dur": "2:39"
                    }, {
                        "vid": "g0q2zwpium",
                        "title": "Day 3",
                        "tid": "bb07e8b8bb36a69e6679f0958d886a9a0f2f6a52",
                        "dur": "2:39"
                    }, {
                        "vid": "223gdn3zjm",
                        "title": "Day 4",
                        "tid": "437e64ecce408088cc239f3d23ee38f201d3a81d",
                        "dur": "2:39"
                    }, {
                        "vid": "vhyf4qco7n",
                        "title": "Day 5",
                        "tid": "b8a61e92e6b3e34e39e0b99763f938ce4daabf08",
                        "dur": "2:39"
                    }, {
                        "vid": "cz4tq3xy84",
                        "title": "Day 6",
                        "tid": "4caaa1b8b8b15653fdd642d7fcab157d7679257f",
                        "dur": "2:39"
                    }, {
                        "vid": "qaxdo18b9w",
                        "title": "Day 7",
                        "tid": "1638b94de534800c0059669e559e533cc08adc2c",
                        "dur": "2:39"
                    }, {
                        "vid": "93rp78oopn",
                        "title": "Day 8",
                        "tid": "92759c0a0164868f3254980a284851ef5320c19f",
                        "dur": "2:39"
                    }, {
                        "vid": "2mha5tcb1y",
                        "title": "Day 9",
                        "tid": "f7e6fe8aebaaedfc669e2f6284d46e69b836956b",
                        "dur": "2:39"
                    }, {
                        "vid": "ul6qmgyacl",
                        "title": "Day 10",
                        "tid": "bf67a6e9f449b3dd1adb43ac01f8af4ce13f23bf",
                        "dur": "2:39"
                    }, {
                        "vid": "aem2wfokhv",
                        "title": "Day 11",
                        "tid": "26f4644d813c5ed9197fd2305644bbb83ca805c9",
                        "dur": "2:39"
                    }, {
                        "vid": "as4y3ya116",
                        "title": "Day 12",
                        "tid": "cea2817f7d3c173554a4457cef5739e1c4a1dcd5",
                        "dur": "2:39"
                    }, {
                        "vid": "hh82pytqhv",
                        "title": "Day 13",
                        "tid": "dc547dbf444de36fa30eb82491362506fa6c450c",
                        "dur": "2:39"
                    }, {
                        "vid": "h6f1k0h4p2",
                        "title": "Day 14",
                        "tid": "9bd0ff477f15074b81886543e614857fd7b2d831",
                        "dur": "2:39"
                    }, {
                        "vid": "mioiju0unk",
                        "title": "Day 15",
                        "tid": "34331a40e4509e516e84d4fa4f057b6efe369844",
                        "dur": "2:39"
                    }, {
                        "vid": "q0iqiwvyjn",
                        "title": "Day 16",
                        "tid": "d215bfc46ac327ab230f44044c96081181a35b6e",
                        "dur": "2:39"
                    }, {
                        "vid": "kpdf3228k2",
                        "title": "Day 17",
                        "tid": "c8e61b91a82f4b4ddff7886c41218a52a9ab56d7",
                        "dur": "2:39"
                    }, {
                        "vid": "4z52zyc1g7",
                        "title": "Day 18",
                        "tid": "3c35b40a3576d75f27465f52eb6ad19bf6993cf7",
                        "dur": "2:39"
                    }, {
                        "vid": "947z6bkx0q",
                        "title": "Day 19",
                        "tid": "70ea07f0a5ece5c8632bff83dfba29c5b6377a4f",
                        "dur": "2:39"
                    }, {
                        "vid": "blnv5frm41",
                        "title": "Day 20",
                        "tid": "4696a04e989a3cf248f970b31710e6d17ea599a7",
                        "dur": "2:39"
                    }, {
                        "vid": "ovnt13163x",
                        "title": "Day 21",
                        "tid": "fb6e30e990e1aa01dd7ac8ffd3e1ac2ca3cec24a",
                        "dur": "2:39"
                    }]
            }
        ];



        for (var i = 0; i < videolist_mar.length; i++) {

            var html = "";
            var group = videolist_mar[i]['group'];
            var videos = videolist_mar[i]['videos'];

            for (var j = 0; j < videos.length; j++) {

                var index = videos[j]['index'];
                var vid = videos[j]['vid'];
                var title = videos[j]['title'];
                var tid = videos[j]['tid'];
                var dur = videos[j]['dur'];
                var content_visible = videos[j]['content_visible'];
                var content_hidden = videos[j]['content_hidden'];

                html += '<a href="#wistia_' + vid + '?autoPlay=false" class="vid-item' + (i === 0 && j === 0 ? " active" : "") +
                        '" data-group="' + group +
                        '" data-vid="' + vid +
                        '" data-title="' + title +
                        '" data-dur="' + dur +
                        '" data-index="' + index +
//                        '" data-content-visible="' + content_visible +
//                        '" data-content-hidden="' + content_hidden +
                        '">';
                html += '<div class="thumbnail">';
                html += '<picture>';
                html += '<source srcset="https://embedwistia-a.akamaihd.net/deliveries/' + tid + '.webp?image_crop_resized=320x213" type="image/webp">';
                html += '<img class="mx-auto d-block w-100" src="https://embedwistia-a.akamaihd.net/deliveries/' + tid + '.jpg?image_crop_resized=320x213" alt="">';
                html += '</picture>';
                html += '<p class="vid-dur">' + dur + '</p>';
                html += '</div>';
                html += '<div class="title-area">';
                html += '<p class="title">' + title + '</p>';
                html += '</div>';
                html += '</a>';

            }
            if (group === 'mar_course') {
                $('#content-wrapper .video-container.course .vid-carousel').html(html);
            } else if (group === 'mar_fat_burner') {
                $('#content-wrapper .video-container.fat_burner .vid-carousel').html(html);
            }

        }



//        setTimeout(function () {
//            $('.video-list .accordion:first-child').trigger('click');
//        }, 3000);

    }

    $('#content-wrapper .vid-carousel').slick({
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button"><svg class="icon" width="50" height="50"><use xlink:href="#mp-angle-left"></use></svg></button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button"><svg class="icon" width="50" height="50"><use xlink:href="#mp-angle-right"></use></svg></button>',
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnHover: false,
        variableWidth: false,
        variableHeight: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 991.98,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 575.98,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    });

    $(document).on('click', '#content-wrapper .vid-item', function (e) {
        var vid_index = $(this).attr('data-index');
        var content_visible = videolist_mar[0]['videos'][vid_index]['content_visible'];
        var content_hidden = videolist_mar[0]['videos'][vid_index]['content_hidden'];
        $('.video-heading .vid-title').text($(this).attr('data-title'));
        $('.video-heading .vid-content-visible').html(content_visible);
        $('.video-heading .vid-content-hidden').html(content_hidden);

        $('#content-wrapper .vid-item').removeClass('active');
        $(this).addClass('active');
    });

    $(document).on('click', '.video-list .vid-item', function (e) {

//        console.log($(this).attr('id'));
//        console.log($(this).attr('data-group'));
//        console.log($(this).attr('data-vid'));
//        console.log($(this).attr('data-title'));
//        console.log($(this).attr('data-dur'));

        var curr_group = $('.video-list .vid-item.active').attr('data-group');



        $('.video-list').find('.vid-item').removeClass('active');
        $(this).addClass('active');

        $('.video-heading .vid-title').text($(this).attr('data-title'));
        $('.video-heading .vid-week').text($(this).attr('data-group'));
        $('.video-heading .vid-content').html($(this).attr('data-content'));

        var prev_vid = $(this).prev().attr("data-vid");
        var prev_title = $(this).prev().attr("data-title");
        var prev_group = $(this).prev().attr("data-group");
        var next_vid = $(this).next().attr("data-vid");
        var next_title = $(this).next().attr("data-title");
        var next_group = $(this).next().attr("data-group");


        if (prev_vid === null) {
            prev_vid = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-vid');
            prev_title = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-title');
            prev_group = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-group');

        }
        if (next_vid === null) {
            next_vid = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-vid');
            next_title = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-title');
            next_group = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-group');

        }
        console.log("prev = " + prev_vid + ", next = " + next_vid);

        $('.btn-vid-prev').attr("href", "#wistia_" + prev_vid + "?autoPlay=false");
        $('.btn-vid-next').attr("href", "#wistia_" + next_vid + "?autoPlay=false");

        if (prev_vid === null) {
            $('.btn-vid-prev').addClass('inactive');
        } else {
            $('.btn-vid-prev').removeClass('inactive');
        }
        if (next_vid === null) {
            $('.btn-vid-next').addClass('inactive');
        } else {
            $('.btn-vid-next').removeClass('inactive');
        }


        if (curr_group !== next_group &&
                $(this).parent().prev().hasClass('active') === false) {
            $(this).parent().prev().click();
        }
    });

    var ob_video = null;
    window._wq = window._wq || [];
    _wq.push({id: '76ol25ytgk', onReady: function (video) {
            console.log("I got a handle to the video!", video);
            ob_video = video;
        }});

    $(document).on('click', '.btn-vid-control', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var curr_vid_item = $('.video-list .vid-item.active');

        var prev_vid_item = $(curr_vid_item).prev();
        var prev_vid = $(prev_vid_item).attr("data-vid");
        var next_vid_item = $(curr_vid_item).next();
        var next_vid = $(next_vid_item).attr("data-vid");

        if (prev_vid === null) {
            prev_vid_item = $(curr_vid_item).parent().prev().prev('.panel').find('.vid-item').last();
            prev_vid = $(prev_vid_item).attr('data-vid');
        }
        if (next_vid === null) {
            next_vid_item = $(curr_vid_item).parent().next().next('.panel').find('.vid-item').first();
            next_vid = $(next_vid_item).attr('data-vid');
        }
//        console.log("prev = " + prev_vid + ", next = " + next_vid);

        $('.btn-vid-prev').attr("href", "#wistia_" + prev_vid);
        $('.btn-vid-next').attr("href", "#wistia_" + next_vid);

        $('.video-list').find('.vid-item').removeClass('active');

        if ($(this).hasClass('btn-vid-prev')) {
            if (ob_video) {
                ob_video.replaceWith(prev_vid);
                $(prev_vid_item)[0].click();
            }
        } else {
            if (ob_video) {
                ob_video.replaceWith(next_vid);
                $(next_vid_item)[0].click();
            }
        }
    });

    $('.downloadable').click(function (e) {
//        window.location.href = "<?php echo site_url('CONTROLLER_NAME/file_download') ?>?file_name=" + $(this).attr('href');
        e.preventDefault();
        e.stopPropagation();

        console.log($(this).prev('p.text').text());
        window.location.href = base_url() + "mealplan/file_download?file_name=" + $(this).attr('href');
    });

    $(document).on('click', '#btn-get-premium', function (e) {
        e.preventDefault();
        e.stopPropagation();

        if (expire_date_time && expire_date_time.length) {
            console.log("expire_date_time = " + expire_date_time);
            var curr_usaTime = new Date().toLocaleString("sv-SE", {timeZone: "America/New_York"});
            console.log("new york time = " + curr_usaTime);
            var obj_expire_date_time = new Date(expire_date_time);
            var obj_curr_usaTime = new Date(curr_usaTime);
            console.log(obj_expire_date_time);
            console.log(obj_curr_usaTime);
            var carthook_checkout_url = 'https://konsciousketo.com/a/secure/checkout/bZ4hqshMJYbQVGLS6pwV?email=' + encodeURIComponent(email_global);
            if (obj_curr_usaTime < obj_expire_date_time) {
                console.log("upcoming");
                carthook_checkout_url = 'https://konsciousketo.com/a/secure/checkout/GplrhAU5wZnWBrlojYvN?email=' + encodeURIComponent(email_global);
                //https://konsciousketo.com/products/custom-keto-meal-plan-subscription-upgrade
                //carthook_checkout_url = 'https://konsciousketo.com/cart/31930675003510:1?checkout[email]=' + encodeURIComponent(email_global);
            } else {
                console.log("already past");
            }
            window.open(carthook_checkout_url, "_blank");

        }
    });



    /* QA Comment */
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function validateEmailForm() {
        var returnVal = true;

        var email = $('[name="comment_email"]').val();
        var strWarning = "";



        if (email.length === 0) {
            strWarning = "Please enter email address.";
        } else if (!validateEmail(email)) {
            strWarning = "Please enter valid email address.";
        }
        $('.submit_btn_group .warning-text').text(strWarning);
        if (strWarning.length > 0) {
            $('.submit_btn_group .warning-text').css('display', 'block');
            returnVal = false;
        } else {
            $('.submit_btn_group .warning-text').hide();
        }

        return returnVal;
    }

    $(document).on('click', '#qa_submit_btn', function (e) {

        e.preventDefault();
        //e.stopPropagation();

        if ($('[name="comment_name"]').val() === "") {
            $('[name="comment_name"]').focus();
            return;
        }
        if ($('[name="comment_email"]').val() === "") {
            $('[name="comment_email"]').focus();
            return;
        }
        if ($('[name="comment_body"]').val() === "") {
            $('[name="comment_body"]').focus();
            return;
        }

        console.log($('[name="comment_check"]').prop('checked'));
        var checked_value = $('[name="comment_check"]').prop('checked');

        if (!validateEmailForm()) {
            $('[name="comment_email"]').focus();
            return;
        }

        $.ajax({
            url: base_url() + "mealplan/submit_comment",
            type: 'post',
            dataType: 'json',
            data: {
                'email': $('[name="comment_email"]').val(),
                'name': $('[name="comment_name"]').val(),
                'comment': $('[name="comment_body"]').val(),
                'parent_id': $(".comment-respond").attr("data-parent-id")
            },
            success: function (response) {

                if (response !== '') {
                    console.log("aaaaa");
                    $(".comment-respond").prependTo(".comment-form-wrap");
                    $(".comment-respond").attr("data-parent-id", "0");
                    $(".comment-reply-title").css("display", "none");

                    if (checked_value) {
                        localStorage.setItem("faq_comment_save_name", $('[name="comment_name"]').val());
                        localStorage.setItem("faq_comment_save_email", $('[name="comment_email"]').val());
                    }

                    location.reload();

                } else {
                    alert('Password or Email is invalid');
                    $('[name="comment_body"]').focus();
                }
            }
        });
    });



    $(".comment-reply-btn").click(function (e) {

        e.preventDefault();


        var comment_id;
        comment_id = $(this).attr("data-comment-id");

        var move_element;
        //move_element = $(".comment-inner").find("[data-comment-id='"+ comment_id +"']");
        move_element = $(this).parent().parent().parent();
        $(".comment-respond").insertAfter($(move_element));

        $(".comment-respond").attr("data-parent-id", comment_id);
        $(".comment-reply-title").css("display", "block");

    });


    $("#cancel-comment-reply-link").click(function (e) {
        e.preventDefault();

        $(".comment-respond").prependTo(".comment-form-wrap");


        $(".comment-respond").attr("data-parent-id", "0");
        $(".comment-reply-title").css("display", "none");

    });


    $(document).on('click', '.comment-show-wrap .comment-like-btn', function (e) {
        console.log("like btn clicked!");

        e.preventDefault();

        var current_element = $(this);
        var current_id = $(this).attr("data-comment-id");


        var urlParams = new URLSearchParams(location.search);

        var current_uid;
        if (urlParams.get('uid') !== null) {
            current_uid = urlParams.get('uid');
        } else {
            console.log("You need to input the user ID!");
        }

        $.ajax({
            url: base_url() + "mealplan/click_like_btn",
            type: 'post',
            dataType: 'json',
            data: {
                'comment_id': current_id,
                'uid': current_uid
            },
            success: function (response) {

                if (response !== '') {

                    $(current_element).parent().find(".comment-like-count").text(response);

                } else {
                    console.log("Data save faile!");

                }
            }
        });
    });
});
