var sliding_speed = 500,
    sl_progress = true,
    short = false,
    reinittimeout,
    grid,
    gallery,
    presentation,
    lb;

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
            'jquery': '' + '/assets/js/app/jquery.js',
            //'lightbox': '' + '/assets/js/app/magnific-popup.js',
            //'touchswipe': '' + '/assets/js/app/touchswipe.js',
            'shuffle': '' + '/assets/js/app/shuffle.js',
            'swiper': '' + '/assets/js/app/swiper.js',
            'ilightbox': '' + '/assets/js/app/ilightbox.js',
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

                $(function() {
                    $('#toup').on('click', function(event) {
                        var $anchor = $(this);
                        $('html, body').stop().animate({
                            scrollTop: $($anchor.attr('href')).offset().top
                        }, 500);
                        event.preventDefault();
                    });
                    $('.colla').on('click touch', function(event) {
                        $(this).addClass("opened");
                        event.preventDefault();
                    });
                });

                $(function () {

//                    $(".no-touch a[attr-bgorig]").on("mouseenter",function(){
//                        $("#body-bg").css('background-image', 'url(' + $(this).attr("attr-bgorig") + ')');
//                    });
//                    $(".no-touch a[attr-bgorig]").on("mouseleave",function(){
//                        $("#body-bg").css('background-image', 'none');
//                    });


//                    var tpt = $('#top-panel').offset().top + $('#top-panel').height();
                    var scrollTimeout;
                    var lastoffset = 0;
                    $(window).scroll(function () {
                        if (scrollTimeout) {
                            clearTimeout(scrollTimeout);
                            scrollTimeout = null;
                        }
                        scrollTimeout = setTimeout(scrollHandler, 0);
                    });

                    scrollHandler = function () {
                        var thisoffset = $(window).scrollTop();
                        if (thisoffset >= 640) {
                            $("body:not(.toup)").addClass("toup");
                        } else {
                            $("body.toup").removeClass("toup");
                        }
                    };


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

            //'touchswipe': function (url, result, key) {
            //    console.log("touch");
            //    $(function() {
            //        $("div").swipe( {
            //            //Generic swipe handler for all directions
            //            swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            //                console.log("swipe");
            //            },
            //            //Default is 75px, set to 0 for demo so any distance triggers swipe
            //            threshold:0
            //        });
            //    });
            //},

            //'lightbox': function (url, result, key) {
            //    lb = $('.swiper-wrapper').magnificPopup({
            //        removalDelay: 500,
            //        delegate: '.zoomlink',
            //        type: 'image',
            //        removalDelay: 300,
            //        mainClass: 'mfp-fade',
            //        tClose: 'Закрыть (Esc)',
            //        tLoading: 'загрузка...',
            //        gallery: {
            //            enabled:true,
            //            tPrev: 'назад',
            //            tNext: 'вперед',
            //            tCounter: '%curr% / %total%'
            //        },
            //        callbacks: {
            //            beforeOpen: function() {
            //                // just a hack that adds mfp-anim class to markup
            //                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
            //                this.st.mainClass = this.st.el.attr('data-effect');
            //            },
            //            open: function() {
            //              console.log("open");
            //                $(".mfp-figure").swipe( {
            //                    //Generic swipe handler for all directions
            //                    swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
            //                        console.log("swipe"+direction);
            //                        $('.swiper-wrapper').magnificPopup('next');
            //                    },
            //                    //Default is 75px, set to 0 for demo so any distance triggers swipe
            //                    threshold:0
            //                });
            //            },
            //        },
            //    });
            //},






            'ilightbox': function (url, result, key) {

                var activityIndicatorOn = function () {
                        $('<div id="imagelightbox-loading"><div></div></div>').appendTo('body');
                    },
                    activityIndicatorOff = function () {
                        $('#imagelightbox-loading').remove();
                    },
                    overlayOn = function () {
                        $('<div id="imagelightbox-overlay"></div>').appendTo('body');
                    },
                    overlayOff = function () {
                        $('#imagelightbox-overlay').remove();
                    },
                    closeButtonOn = function (instance) {
                        $('<a href="#" id="imagelightbox-close">Close</a>').appendTo('body').on('click', function () {
                            $(this).remove();
                            instance.quitImageLightbox();
                            return false;
                        });
                    },
                    closeButtonOff = function () {
                        $('#imagelightbox-close').remove();
                    },
                    navigationOn = function (instance, selector) {
                        var images = $(selector);
                        if (images.length) {
                            var nav = $('<div id="imagelightbox-nav"></div>');
                            for (var i = 0; i < images.length; i++)
                                nav.append('<a href="#"></a>');

                            nav.appendTo('body');
                            nav.on('click touchend', function () {
                                return false;
                            });

                            var navItems = nav.find('a');
                            navItems.on('click touchend', function () {
                                var $this = $(this);
                                if (images.eq($this.index()).attr('href') != $('#imagelightbox').attr('src'))
                                    instance.switchImageLightbox($this.index());

                                navItems.removeClass('active');
                                navItems.eq($this.index()).addClass('active');

                                return false;
                            })
                                .on('touchend', function () {
                                    return false;
                                });
                        }
                    },
                    navigationUpdate = function (selector) {
                        var items = $('#imagelightbox-nav a');
                        items.removeClass('active');
                        items.eq($(selector).filter('[href="' + $('#imagelightbox').attr('src') + '"]').index(selector)).addClass('active');
                    },
                    navigationOff = function () {
                        $('#imagelightbox-nav').remove();
                    };


                $('a[rel="imagelightbox"]').imageLightbox(
                    {selector:       'id="imagelightbox"',   // string;
                        allowedTypes:   'png|jpg|jpeg|gif',     // string;
                        animationSpeed: 250,                    // integer;
                        preloadNext:    true,                   // bool;            silently preload the next image
                        enableKeyboard: true,                   // bool;            enable keyboard shortcuts (arrows Left/Right and Esc)
                        quitOnEnd:      false,                  // bool;            quit after viewing the last image
                        onStart: function () {
                            overlayOn();
                            gallery.stopAutoplay();
                        },
                        onLoadStart: function () {
                            activityIndicatorOn();
                        },
                        onLoadEnd: function () {
                            activityIndicatorOff();
                            console.log("END");
                            //setTimeout(function(){$("#imagelightbox").css('-webkit-transform', '')},200);
                        },
                        onEnd: function () {
                            activityIndicatorOff();
                            overlayOff();
                        }
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

                setTimeout(function () {
                    $("#main-loader").addClass("removed");
                }, 1500);

//                function fader(el) {
//                    el.fadeIn(100);
//                    setTimeout(function () {
//                        el.fadeOut(500);
//                    }, 600);
//                    return true;
//                }

                if ($("body").find(".photos").length > 0) {
                    var photos = new Swiper('.photos .swiper-container', {
                        resizeReInit: true,
                        mode: 'horizontal',
                        slidesPerView: '1.7',
//                        loop: true,
                        centeredSlides: true,
                        onSwiperCreated: function (swiper) {
                            swiper.stopAutoplay();
                        },
                        onFirstInit: function (swiper) {
                            $(".slide-counter-page>#t-slide").text(swiper.slides.length);
                            $(".slide-counter-page>#c-slide").text(swiper.activeIndex + 1);
                            var i = swiper.activeIndex;
                            if (i == 0) {
                                console.log("first");
                            }
                        },
                        onSlideChangeEnd: function (swiper) {

                            var i = swiper.activeIndex;
                            $(".slide-counter-page>#c-slide").text(i + 1);
//                            $(".photos").find(".slide-counter").addClass('element-animation',function(){
//                                console.log("add");
//                            });
                            fader($(".slide-counter"));

                            console.log(i, swiper.slides.length);
                            if (i >= swiper.slides.length - 1) {
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if (i == 0) {
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-prev").show(0);
                            }
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
                    gallery = new Swiper('.photos-wide .swiper-container', {
                        mode: 'horizontal',
//                        slidesPerViewFit: 2,
                        loop: false,
                        centeredSlides: true,
                        initialSlide: 0,
                        speed: 500,//sliding_speed,
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
                            swiper.stopAutoplay();
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
                        onSlideClick: function (swiper) {
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

                            console.log(i, swiper.slides.length);
                            if (i >= swiper.slides.length - 1) {
                                console.log("last");
                                $(".swiper-container .ui-arrow-next").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-next").show(0);
                            }
                            if (i == 0) {
                                console.log("first");
                                $(".swiper-container .ui-arrow-prev").hide(0);
                            } else {
                                $(".swiper-container .ui-arrow-prev").show(0);
                            }
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
                    presentation = new Swiper('#main-swiper', {
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
                        onSwiperCreated: function (swiper) {
                            swiper.stopAutoplay();
                        },
                        onSlideClick: function (swiper) {
                            var act = swiper.clickedSlide;
                            console.log(act);
                            if (!act.isActive()) {
                                swiper.swipeTo(swiper.clickedSlideIndex);
                            }
                        },
                        onFirstInit: function (swiper) {
                            console.log("first init wide");
                        },

                    });
                    $("#presentation-next").on("click", function () {
                        presentation.swipeNext();
                    });
                    $("#presentation-prev").on("click", function () {
                        presentation.swipePrev();
                    });

                }


            },


        }
    }
]

);