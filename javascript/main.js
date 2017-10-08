/**
* responsiveMenu
* headerFixed
* accordionToggle
* counter
* detectViewport
* ajaxContactForm
* slideTestimonial
* slideTestimonial_v2
* slideTeam
* parallax
* googleMap
* popupGallery
* tabsList
* anchorLink
* swClick
* goTop
* removePreloader

*/

;(function($) {

   'use strict'
        var isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            Opera: function() {
                return navigator.userAgent.match(/Opera Mini/i);
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i);
            },
            any: function() {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        }; // is Mobile

        var responsiveMenu = function() {
            var menuType = 'desktop';

            $(window).on('load resize', function() {
                var currMenuType = 'desktop';

                if ( matchMedia( 'only screen and (max-width: 991px)' ).matches ) {
                    currMenuType = 'mobile';
                }

                if ( currMenuType !== menuType ) {
                    menuType = currMenuType;

                    if ( currMenuType === 'mobile' ) {
                        var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
                        var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

                        $('#header').after($mobileMenu);
                        hasChildMenu.children('ul').hide();
                        hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
                        $('.btn-menu').removeClass('active');
                    } else {
                        var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

                        $desktopMenu.find('.submenu').removeAttr('style');
                        $('#header').find('.nav-wrap').append($desktopMenu);
                        $('.btn-submenu').remove();
                    }
                }
            });

            $('.btn-menu').on('click', function() {         
                $('#mainnav-mobi').slideToggle(300);
                $(this).toggleClass('active');
                return false;
            });

            $(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
                $(this).toggleClass('active').next('ul').slideToggle(300);
                e.stopImmediatePropagation();
                return false;
            });
        }; // Responsive Menu

        var headerFixed = function() {
            if ( $('body').hasClass('header_sticky') ) {
                var nav = $('.header');
                if ( nav.size() !== 0 ) {
                    
                    var offsetTop = $('.header').offset().top,
                        // headerHeight = $('.header').height(),
                        injectSpace = $('<div />', { height: 100 }).insertAfter(nav);   
                        injectSpace.hide();                 

                    $(window).on('load scroll', function(){
                        if ( $(window).scrollTop() > offsetTop ) {
                            injectSpace.show();
                            $('.header').addClass('header-fixed');
                            
                        } else {
                            $('.header').removeClass('header-fixed');
                            injectSpace.hide();
                        }
                    })
                }
            }
        }; // Header Fixed

        var accordionToggle = function() {
            var speed = {duration: 400};
            $('.toggle-content').hide();
            $('.accordion-toggle .toggle-title.active').siblings('.toggle-content').show();
            $('.accordion').find('.toggle-title').on('click', function() {
                $(this).toggleClass('active');
                $(this).next().slideToggle(speed);
                $(".toggle-content").not($(this).next()).slideUp(speed);
                if ($(this).is('.active')) {
                    $(this).closest('.accordion').find('.toggle-title.active').toggleClass('active')
                    $(this).toggleClass('active');
                };
            });
        }; // Accordion Toggle

         var counter = function() {       
            $('.flat-counter').on('on-appear', function() {             
                $(this).find('.numb-count').each(function() { 
                    var to = parseInt( ($(this).attr('data-to')),10 ), speed = parseInt( ($(this).attr('data-speed')),10 );
                    if ( $().countTo ) {
                        $(this).countTo({
                            to: to,
                            speed: speed
                        });
                    }
                });
           });
        }; // Counter

        var detectViewport = function() {
            $('[data-waypoint-active="yes"]').waypoint(function() {
                $(this).trigger('on-appear');
            }, { offset: '90%', triggerOnce: true });
             $(window).on('load', function() {
                setTimeout(function() {
                    $.waypoints('refresh');
                }, 100);
            });
        }; // Detect Viewport

        var ajaxContactForm = function() {  
            $('#contactform').each(function() {
                $(this).validate({
                    submitHandler: function( form ) {
                        var $form = $(form),
                            str = $form.serialize(),
                            loading = $('<div />', { 'class': 'loading' });

                        $.ajax({
                            type: "POST",
                            url:  $form.attr('action'),
                            data: str,
                            beforeSend: function () {
                                $form.find('.form-submit').append(loading);
                            },
                            success: function( msg ) {
                                var result, cls;                            
                                if ( msg == 'Success' ) {                                
                                    result = 'Message Sent Successfully To Email Administrator. ( You can change the email management a very easy way to get the message of customers in the user manual )';
                                    cls = 'msg-success';
                                } else {
                                    result = 'Error sending email.';
                                    cls = 'msg-error';
                                }

                                $form.prepend(
                                    $('<div />', {
                                        'class': 'flat-alert ' + cls,
                                        'text' : result
                                    }).append(
                                        $('<a class="close" href="#"><i class="fa fa-close"></i></a>')
                                    )
                                );

                                $form.find(':input').not('.submit').val('');
                            },
                            complete: function (xhr, status, error_thrown) {
                                $form.find('.loading').remove();
                            }
                        });
                    }
                });
            }); // each contactform
        };   // ajax ContactForm


        var slideTestimonial = function() {
            $(".owl-carousel").owlCarousel({
                autoplay:true,
                dots:true,
                margin:30,
                loop:true,
                items:1,
                responsive:{
                    0:{
                        items: 1
                    },

                    599:{
                        items: 2
                    },
                    768:{
                        items: 2
                    },
                    991:{
                        items: 1
                    },
                    1200: {
                        items: 1
                    }
                }
            });
        };// slide Testimonial

        var slideTestimonial_v2 = function() {
            $(".owl-carousel-1").owlCarousel({
                autoplay:true,
                dots:false,
                margin:30,
                loop:true,
                items:3,
                responsive:{
                    0:{
                        items: 1
                    },

                    599:{
                        items: 2
                    },
                    768:{
                        items: 2
                    },
                    991:{
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        };// slide Testimonial V2

        var slideTeam = function() {
            $(".owl-carousel-2").owlCarousel({
                autoplay:true,
                dots:false,
                margin:30,
                loop:true,
                items:4,
                responsive:{
                    0:{
                        items: 1
                    },

                    599:{
                        items: 2
                    },
                    768:{
                        items: 3
                    },
                    991:{
                        items: 4
                    },
                    1200: {
                        items: 4
                    }
                }
            });
        };// slide Team

        var parallax = function() {
            if ( $().parallax && isMobile.any() == null ) {
                $('.parallax1').parallax("50%", 0.2);
                $('.parallax2').parallax("50%", 0.2);
                $('.parallax3').parallax("50%", 0.3);
                $('.parallax4').parallax("50%", 0.1);
            }
        }; // Parallax

        // var googleMap = function() {            
        //     if ( $().gmap3 ) {  
        //         $(".map").gmap3({
        //             map:{
        //                 options:{
        //                     zoom: 14,
        //                     mapTypeId: 'themesflat_style',
        //                     mapTypeControlOptions: {
        //                         mapTypeIds: ['themesflat_style', google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID]
        //                     },
        //                     scrollwheel: false
        //                 }
        //             },
        //             getlatlng:{
        //                 address:  $('.flat-maps').data('address'),
        //                 callback: function(results) {
        //                     if ( !results ) return;
        //                     $(this).gmap3('get').setCenter(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
        //                     $(this).gmap3({
        //                         marker:{
        //                             latLng:results[0].geometry.location,
        //                             options:{
        //                                 icon: $('.flat-maps').data('images')
        //                             }
        //                         }
        //                     });
        //                 }
        //             },
        //             styledmaptype:{
        //                 id: "themesflat_style",
        //                 options:{
        //                     name: "dhc Map"
        //                 },
        //                 styles:[
        //                     {
        //                         "featureType": "administrative",
        //                         "elementType": "labels.text.fill",
        //                         "stylers": [
        //                             {
        //                                 "color": "#444444"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "landscape",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "color": "#f2f2f2"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "poi",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "visibility": "off"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "road",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "saturation": -100
        //                             },
        //                             {
        //                                 "lightness": 45
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "road.highway",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "visibility": "simplified"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "road.arterial",
        //                         "elementType": "labels.icon",
        //                         "stylers": [
        //                             {
        //                                 "visibility": "off"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "transit",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "visibility": "off"
        //                             }
        //                         ]
        //                     },
        //                     {
        //                         "featureType": "water",
        //                         "elementType": "all",
        //                         "stylers": [
        //                             {
        //                                 "color": "#46bcec"
        //                             },
        //                             {
        //                                 "visibility": "on"
        //                             }
        //                         ]
        //                     }
        //                 ]
                        
        //             },  
        //         });
        //     }
        //     $('.map').css( 'height', $('.flat-maps').data('height') );
        // }; // Google Map

        var popupGallery = function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                slideshowSpeed: 3000
            });
        }; // Popup Gallery

        var tabsList = function() {
            $('.roll-tabs').each(function() {
            $(this).children('.content-tab').children().hide();
            $(this).children('.content-tab').children().first().show()
            $(this).find('.tabs-list').children('li').on('click', function(){
                var liActive = $(this).index(),
                contentActive = $(this).siblings().removeClass('active').parents('.roll-tabs').children('.content-tab').children().eq(liActive);
                contentActive.addClass('active').fadeIn("slow");
                contentActive.siblings().removeClass('active');
                $(this).addClass('active').parents('.roll-tabs').children('.content-tab').children().eq(liActive).siblings().hide();
            });
            });
        }; // Tab List

        var anchorLink = function() {
            $('#mainnav .menu li a').on('click', function() {
                $('html, body').animate({
                    scrollTop: $( $(this).attr('href') ).offset().top - 100
                }, 800, 'easeInOutExpo');
                return false;
            });
        }; // Anchor Link

        var swClick = function () {
            function activeLayout () {
                $(".switcher-container" ).on( "click", "a.sw-light", function() {
                    $(this).toggleClass( "active" );
                    $('body').addClass('home-boxed');  
                    $('body').css({'background': '#f6f6f6' });                
                    $('.sw-pattern.pattern').css ({ "top": "100%", "opacity": 1, "z-index": "10"});
                    return false;
                }).on( "click", "a.sw-dark", function() {
                    $('.sw-pattern.pattern').css ({ "top": "98%", "opacity": 0, "z-index": "-1"});
                    $(this).removeClass('active').addClass('active');
                    $('body').removeClass('home-boxed');
                    $('body').css({'background': '#fff' });
                    return false;
                })       
            } // Active Layout

            function activePattern () {
                $('.sw-pattern').on('click', function () {
                    $('.sw-pattern.pattern a').removeClass('current');
                    $(this).addClass('current');
                    $('body').css({'background': 'url("' + $(this).data('image') + '")', 'background-size' : '20px 20px', 'background-repeat': 'repeat' });
                    return false
                })
            }

            activeLayout();
            activePattern();
        } // Switcher click

        var goTop = function(){
            var gotop = $('.go-top');
            $(window).scroll(function() {
                if ($(this).scrollTop() > 600) {
                    gotop.addClass('show');
                } else {
                    gotop.removeClass('show');
                }
            });
            gotop.on('click', function() {
                $('html, body').animate({ scrollTop: 0}, 800, 'easeInOutExpo');
                return false;
            });
        }; // Go Top

         var removePreloader = function() { 
            $(window).load(function() { 
                setTimeout(function() {
                    $('.preloader').hide(); }, 500           
                ); 
            });  
        }; //remove Preloader

function getTime(){
    var text="";
    var d=new Date();
    
    var days=['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'];
    text +=days[d.getDay()];
    
    var tanggal=d.getDate();
    text +=', '+tanggal;
    
    var bulan=['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];
    text +=' '+bulan[d.getMonth()];
    
    var tahun=d.getFullYear();
    text +=' '+tahun;
  
  document.getElementById('tanggalsekarang').innerHTML=text;
}

        // Dom Ready
        $(function() {
            getTime();
            responsiveMenu();
            headerFixed();
            accordionToggle();
            counter();
            detectViewport();
            ajaxContactForm();
            slideTestimonial();
            slideTestimonial_v2();
            slideTeam();
            parallax();
            // googleMap();
            popupGallery();
            tabsList();
            anchorLink();
            swClick();
            goTop();
            removePreloader();
        });

})(jQuery);