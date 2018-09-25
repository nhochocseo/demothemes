/* scroll menu */
$(window).scroll(function() {
    if ($(this).scrollTop() != 0) {
        $(".sticky-top").addClass("menu-fix");
    } else {
        $(".sticky-top").removeClass("menu-fix");
    }
});


var submenuPr = $('.menu');
var a = submenuPr.find('ul');
if (a.lenght !== 0) {
    a.parent().children('a').append('<i class="fa fa-caret-down" aria-hidden="true"></i>');
}

var test = 0;
function openNav() {
    if (test == 0) {
        console.log(test);
        $('#menu-mobile').css({
            transform: 'translateX(0)'
        });
        $('#menu-mobile').css({
            transition: 'all 0.5s'
        });
        $('body').css({
            overflow: 'hidden'
        });
        $('.click_out').css({
            height: '100%',
            width: '100%',
        });
        test = 1;
    } else {
        // console.log(test);
        $('#menu-mobile').css({
            transform: 'translateX(-280px)'
        });
        $('#menu-mobile').css({
            transition: 'all 0.5s'
        });
        $('body').css({
            overflow: 'visible'
        });
        $('.click_out').css({
            height: '0%',
            width: '0%',
        });
        test = 0;
    }
}

function closeNav() {
    $('#menu-mobile').css({
        transform: 'translateX(-280px)'
    });
    $('#menu-mobile').css({
        transition: 'all 0.5s'
    });
    $('body').css({
        overflow: 'visible'
    });
    $('.click_out').css({
        height: '0%',
        width: '0%',
    });

    test = 0;
}


$('.click_out').on('click', function() {
    // console.log('2');
    $('#menu-mobile').css({
        transform: 'translateX(-280px)'
    });
    $('#menu-mobile').css({
        transition: 'all 0.5s'
    });
    $('body').css({
        overflow: 'visible'
    });
    $('.click_out').css({
        height: '0%',
        width: '0%',
        visibility: 'visible',
    });
    test = 0;
});



$(document).ready(function() {
    var ccc = $('#menu-mobile ul li').find('ul');
    if (ccc.length !== 0) {
        ccc.before('<button class="accordion"></button>');
        ccc.addClass('sub-menu');
    }
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + 200 + "px";
            }
        }
    }
});

$('.pro_slider').owlCarousel({
    loop: true,
    nav: true,
    smartSpeed: 1000,
    autoplay: true,
    dots : false,
    margin : 10,
    autoplayTimeout: 2000,
    navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
    responsive: {
        0: {
            items: 2
        },
        575:{
            items: 3
        },
        768: {
            items: 4
        },
        1000: {
            items: 7
        }
    }
});

$('.new-list').owlCarousel({
    loop: true,
    nav: true,
    smartSpeed: 1000,
    autoplay: true,
    dots : false,
    margin : 20,
    autoplayTimeout: 5000,
    navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
    responsive: {
        0: {
            items: 2
        },
        768: {
            items: 3
        }
    }
});



//scrollup	
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    $(window).scroll(function() {
        var a = 0;
        var oTop = $('#counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },
    
                    {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
    
                    });
            });
            a = 1;
        }
    });
});

AOS.init();
new WOW().init();

$(document).ready(function() {
    $("#thoat").click(function() {
        $(".popup_dk").css("display", "none");
        $("html").removeClass('body-before');
    });
    // $("body").click(function() {
    //     $(".popup_dk").css("display", "none");
    //     $("body").removeClass('body-before');
    // });
    // $(".popu_block").click(function(event) {
    //     event.
    // });
    setTimeout(function() {
        $(".popup_dk").addClass("popu_block");
        $("body").addClass('body-before');
    }, 10000);
});

var groups = {};
$('.galleryItem').each(function() {
    var id = parseInt($(this).attr('data-group'), 10);

    if (!groups[id]) {
        groups[id] = [];
    }

    groups[id].push(this);
});

$.each(groups, function() {

    $(this).magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        gallery: { enabled: true }
    })
});



// $('.aboutUs .one-height').matchHeight();

// $( window ).on('load resize',function() {
//     var $imgHeight=$('.aboutUs .one-height').outerHeight();
//     var $aaaaa=$(".aboutUs .two-height").outerHeight()*2;
//     console.log($aaaaa);
// });