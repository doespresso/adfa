var sliding_speed = 500,
    sl_progress = true,
    short = false,
    reinittimeout,
    grid;

//yepnope.injectCss(['dev/component/odometer/themes/odometer-theme-minimal.css']);

if (Modernizr.touch) {
    sliding_speed = 500;
    short = true;
    console.log("short");
//    sl_progress = false;
}

//yepnope({
//    test: Modernizr.touch,
//    yep: 'assets/js/app/fastclick.js',
//    callback: function (url, result, key) {
//        FastClick.attach(document.body);
//        console.log("load fastclick 1");
//    },
//    complete: function () {
//    }
//});

window.onload = function () {
    console.log('wl');
}


var c_page_id,
    c_page_index,
    l_page_id,
    l_page_index;



yepnope([
    {
        load: {
            'jquery': ''+'/assets/js/app/jquery.js',
            'ipreload': ''+'/assets/js/app/ipreload.js',
//            'llxt': ''+'/assets/js/app/llxt.js',
//            'llxtbg': ''+'/assets/js/app/llxtbg.js',
            'shuffle': ''+'/assets/js/app/shuffle.js',
            'swiper': ''+'/assets/js/app/swiper.js',
//            'swiper_progress': ''+'/assets/js/app/swiper-progress.js',
        },
        callback: {

            'jquery': function (url, result, key) {


//                setTimeout(
//                    function(){$("#main-loader").removeClass("loading");
//                        $(".line-top,.line-bottom,.line-left,.line-right").addClass("aframe");
//                        setTimeout(function(){
//                            $("#main-loader").css("display","none");
//                        },300);
//                }, 10);

                $(function () {

//                    $(".no-touch a[attr-bgorig]").on("mouseenter",function(){
//                        $("#body-bg").css('background-image', 'url(' + $(this).attr("attr-bgorig") + ')');
//                    });
//                    $(".no-touch a[attr-bgorig]").on("mouseleave",function(){
//                        $("#body-bg").css('background-image', 'none');
//                    });

                    $('a[href*=#]:not([href=#])').click(function () {
                        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                            return false;
                            if (target.length) {
                                $('html,body').animate({
                                    scrollTop: target.offset().top
                                }, 1000);
                                return false;
                            }
                        }
                    });
//
//                    function changebg(img, mutator_class) {
//                        if (mutator_class != undefined) {
//                            $("#body-bg").addClass(mutator_class);
//                        }
//                        else {
//                            $("#body-bg").removeClass('mutator-bg-dark');
//                        }
//                        $("#slide-bg").css({
//                            "background-image": "url(" + img + ")",
//                        });
//                    }

                    $('#menu-opener').on("click", function (e) {
                        console.log("open menu");
                        $(".overlay").addClass("open");
                    });

                    $('button.overlay-close').on("click", function (e) {
                        console.log("open menu");
                        $(".overlay").removeClass("open");
                    });


                });
            },

//
            'ipreload': function (url, result, key) {
                console.log("ipreload");
                $('[data-src]').preload(function(){
                    console.log("images loaded");
                    setTimeout(function () {
                        $("#main-loader").addClass("removed");
                    },1000);
                });
            },

            'shuffle': function (url, result, key) {
                console.log("shuffle");
                grid = $('#shuffle');

                grid.shuffle({
                    itemSelector: '.item', // the selector for the items in the grid
//                    sizer: '#shuffle_sizer',
                    sizer: null,
                    group: 'all', // Filter group
                    speed: 150, // Transition/animation speed (milliseconds)
                    easing: 'linear', // css easing function to use
                    itemSelector: '', // e.g. '.picture-item'
//                    sizer: null, // sizer element. Can be anything columnWidth is
                    gutterWidth: 0, // a static number or function that tells the plugin how wide the gutters between columns are (in pixels)
                    columnWidth: 0, // a static number or function that returns a number which tells the plugin how wide the columns are (in pixels)
                    delimeter: null, // if your group is not json, and is comma delimeted, you could set delimeter to ','
                    buffer: 0, // useful for percentage based heights when they might not always be exactly the same (in pixels)
                    initialSort: null, // Shuffle can be initialized with a sort object. It is the same object given to the sort method
                    throttle: $.throttle || null, // By default, shuffle will try to throttle the resize event. This option will change the method it uses
                    throttleTime: 300, // How often shuffle can be called on resize (in milliseconds)
                    sequentialFadeDelay: 150, // Delay between each item that fades in when adding items
                    supported: Modernizr.csstransforms && Modernizr.csstransitions // supports transitions and transforms
                });
                $('#filter a').click(function (e) {
                    e.preventDefault();

                    // set active class
                    $('#filter a').removeClass('active');
                    $(this).addClass('active');

                    // get group name from clicked item
                    var groupName = $(this).attr('data-group');

                    // reshuffle grid
                    grid.shuffle('shuffle', groupName);
                });
            },

            'swiper': function (url, result, key) {



                function fader(el){
                    el.fadeIn(100);
                    setTimeout(function(){
                        el.fadeOut(500);
                    },600);
                    return true;
                }

                if ($("body").find(".photos").length > 0) {
                    var photos = new Swiper('.photos .swiper-container', {
                        resizeReInit: true,
                        mode: 'horizontal',
                        slidesPerView: '1.7',
//                        loop: true,
                        centeredSlides: true,
                        onFirstInit: function (swiper) {
                            $(".slide-counter-page>#t-slide").text(swiper.slides.length);
                            $(".slide-counter-page>#c-slide").text(swiper.activeIndex+1);
                            var i = swiper.activeIndex;
                            if(i == 0){
                                console.log("first");
                            }
                        },
                        onSlideChangeEnd: function (swiper) {

                            var i = swiper.activeIndex;
                            $(".slide-counter-page>#c-slide").text(i+1);
//                            $(".photos").find(".slide-counter").addClass('element-animation',function(){
//                                console.log("add");
//                            });
                            fader($(".slide-counter"));

                            console.log(i,swiper.slides.length);
                            if(i >= swiper.slides.length -1){
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            }else{
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if(i == 0){
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            }else{$(".swiper-container .ui-arrow-prev").show(0);}
                        },
                    });

                    $(".swiper-container .ui-arrow-next").on("click", function () {
                        photos.swipeNext();
                    });
                    $(".swiper-container .ui-arrow-prev").on("click", function () {
                        photos.swipePrev();
                    });
                }

                if ($("body").find(".photos-wide").length > 0) {
                    var gallery = new Swiper('.photos-wide .swiper-container', {
                        mode: 'horizontal',
//                        slidesPerViewFit: 2,
                        loop: false,
                        centeredSlides: true,
                        initialSlide: 0,
                        speed: 1000,//sliding_speed,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: true,
                        shortSwipes: true,
//                        offsetPxBefore: 380,
                        resizeReInit: true, // на сколько я понимаю этот параметр не учитывается [1]
                        createPagination: true,
                        onSlideClick: function (swiper) {
                            var act = swiper.clickedSlide;
                            console.log(act);
                            if (!act.isActive()) {
                                swiper.swipeTo(swiper.clickedSlideIndex);
                            }
                        },

                        onSwiperCreated: function (swiper) {

                        },
                        onFirstInit: function (swiper) {
                            console.log("first init wide");
                            $(".photos-wide").addClass("inited");
//                            $(".slide-counter-page>#t-slide").text(swiper.slides.length);
//                            $(".slide-counter-page>#c-slide").text(swiper.activeIndex+1);
//                            var i = swiper.activeIndex;
//                            if(i == 0){
//                                console.log("first");
//                            }
                        },
                        onSlideClick: function(swiper){
                            console.log(swiper.clickedSlideIndex);
//                            swiper.params.slidesPerView = 1.7;
//                            swiper.reInit();
                        },
                        onSlideChangeEnd: function (swiper) {

                            var i = swiper.activeIndex;
//                            $(".slide-counter-page>#c-slide").text(i+1);
////                            $(".photos").find(".slide-counter").addClass('element-animation',function(){
////                                console.log("add");
////                            });
//                            fader($(".slide-counter"));

                            console.log(i,swiper.slides.length);
                            if(i >= swiper.slides.length -1){
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            }else{
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if(i == 0){
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            }else{$(".swiper-container .ui-arrow-prev").show(0);}
                        }
                    });

                    $(".swiper-container .ui-arrow-next").on("click", function () {
                        gallery.swipeNext();
                    });
                    $(".swiper-container .ui-arrow-prev").on("click", function () {
                        gallery.swipePrev();
                    });

                }

                if ($("body").find("#presentation").length > 0) {
                    var presentation = new Swiper('#main-swiper', {
                        mode: 'horizontal',
                        slidesPerViewFit: false,
                        loop: true,
                        centeredSlides: true,
                        initialSlide: 0,
                        speed: sliding_speed,
                        autoplay: 5000,
                        autoplayDisableOnInteraction: true,
                        shortSwipes: true,
//                        offsetPxBefore: 380,
                        resizeReInit: true, // на сколько я понимаю этот параметр не учитывается [1]
                        pagination: "#paging",
                        createPagination: true,
                        paginationClickable: true,
                        onSlideClick: function (swiper) {
                            var act = swiper.clickedSlide;
                            console.log(act);
                            if (!act.isActive()) {
                                swiper.swipeTo(swiper.clickedSlideIndex);
                            }
                        },
//
//                        onProgressChange: function (swiper) {
//                            for (var i = 0; i < swiper.slides.length; i++) {
//                                var slide = swiper.slides[i];
//                                var progress = slide.progress;
//                                var translate = progress * swiper.width;
//                                var opacity = 1 - Math.min(Math.abs(progress), 1);
//                                slide.style.opacity = opacity;
//                                swiper.setTransform(slide, 'translate3d(' + translate + 'px,0,0)');
//                            }
//                        },
//                        onTouchStart: function (swiper, speed) {
//                            for (var i = 0; i < swiper.slides.length; i++) {
//                                swiper.setTransition(swiper.slides[i], 0);
//                            }
//                        },
//                        onSetWrapperTransition: function (swiper, speed) {
//                            for (var i = 0; i < swiper.slides.length; i++) {
//                                swiper.setTransition(swiper.slides[i], speed);
//                            }
//                        },
                    });
                    $("#presentation-next").on("click", function () {
                        presentation.swipeNext();
                    });
                    $("#presentation-prev").on("click", function () {
                        presentation.swipePrev();
                    });

                }


            },

//            'swiper_progress': function (url, result, key) {
//
//
//            },
        }
    }
]

);