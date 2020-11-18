$(document).ready(function () {
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

            html += '<a href="#wistia_' + vid + '?autoPlay=false" class="vid-item' + (i == 0 & j == 0 ? " active" : "") + '" data-group="' + group + '" data-vid="' + vid + '" data-title="' + title + '" data-dur="' + dur + '">';
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


    var prev_vid = $(this).prev().attr("data-vid");
    var prev_title = $(this).prev().attr("data-title");
    var prev_group = $(this).prev().attr("data-group");
    var next_vid = $(this).next().attr("data-vid");
    var next_title = $(this).next().attr("data-title");
    var next_group = $(this).next().attr("data-group");


    if (prev_vid == null) {
        prev_vid = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-vid');
        prev_title = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-title');
        prev_group = $(this).parent().prev().prev('.panel').find('.vid-item').last().attr('data-group');

    }
    if (next_vid == null) {
        next_vid = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-vid');
        next_title = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-title');
        next_group = $(this).parent().next().next('.panel').find('.vid-item').first().attr('data-group');

    }
    console.log("prev = " + prev_vid + ", next = " + next_vid);

    $('.btn-vid-prev').attr("href", "#wistia_" + prev_vid + "?autoPlay=false");
    $('.btn-vid-next').attr("href", "#wistia_" + next_vid + "?autoPlay=false");

    if (prev_vid == null) {
        $('.btn-vid-prev').addClass('inactive');
    } else {
        $('.btn-vid-prev').removeClass('inactive');
    }
    if (next_vid == null) {
        $('.btn-vid-next').addClass('inactive');
    } else {
        $('.btn-vid-next').removeClass('inactive');
    }


    if (curr_group != next_group &&
            $(this).parent().prev().hasClass('active') == false) {
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

    if (prev_vid == null) {
        prev_vid_item = $(curr_vid_item).parent().prev().prev('.panel').find('.vid-item').last();
        prev_vid = $(prev_vid_item).attr('data-vid');
    }
    if (next_vid == null) {
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

$(document).on('click', '.accordion', function (event) {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
    } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
    }

    if ($(this).hasClass('active')) {
        $(this).find("svg").html('<svg class="icon"><use xlink:href="#angle-up"></use></svg>');
    } else {
        console.log("inactive");
        $(this).find("svg").html('<svg class="icon"><use xlink:href="#angle-down"></use></svg>');
    }
});

$('.downloadable').click(function (e) {
    e.preventDefault();
    e.stopPropagation();

    console.log($(this).prev('p.text').text());
    window.location.href = base_url() + "mealplan/file_download?file_name=" + $(this).attr('href');
});