$('#image-slider').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: false,
    pauseOnHover: false,
    variableWidth: false,
    variableHeight: false,
    responsive: [
        {
            breakpoint: 575.98,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

$('#feedback-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    autoplaySpeed: 5000,
    arrows: false,
    pauseOnHover: false,
    variableWidth: false,
    variableHeight: false,
    responsive: [
        {
            breakpoint: 575.98,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});

function readmoreClicked(btn_readmore) {
    var moreText = $(btn_readmore).parent().find('.more-text');
    var btnText = $(btn_readmore);
    var parent = $(btn_readmore).parent();
    
    if ($(moreText).css('display') != 'none') {
        $(btnText).html('<span>Learn More </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-down"></use></svg>');
        $(moreText).hide();
    } else {
        $(btnText).html('<span>Show Less </span><svg class="icon" width="40" height="40"><use xlink:href="#angle-up"></use></svg>');
        $(moreText).css('display', 'inline');
    }
}