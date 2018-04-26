(function ($) {
    
    $(document).ready(function () {
        
        //select style

        window.onload = function(){
            $( '#nf-field-30' ).selectmenu();
        };


        // mobile menu

        $('.hamburger').on('click', function () {
            $('.container-mobile-menu').toggleClass('show-mobile-menu');
            $('body').toggleClass('stop-scroll');
            $('.hamburger__line-top').toggleClass('line_top');
            $('.hamburger__line-middle').toggleClass('line_middle');
            $('.hamburger__line-bottom').toggleClass('line_bottom');
            $('.hamburger').toggleClass('hamburger-open');
        });

        // change menu on scroll

        $(window).on('scroll', function () {

            var scrollPosition = $(this).scrollTop();

            if (scrollPosition > 1) {
                $('.logo').addClass('logo-scroll');
            } else {
                $('.logo').removeClass('logo-scroll');
            }
        });
        

        //page team

        $('.team-item-container').on('click', function () {
            $('.background-popup').addClass('show-team-popup');
            $(this).parent().children('.team-popup').addClass('show-team-popup');
            $('body').addClass('stop-scroll');
        });

        $('.container-icon-close').on('click', function () {
            $('.background-popup').removeClass('show-team-popup');
            $('.team-popup').removeClass('show-team-popup');
            $('body').removeClass('stop-scroll');
        });

        //ajax for team page

        jQuery(function ($) {
            $('#team_loadmore').click(function () {
                var data = {
                    'action': 'loadmore_team',
                    'query': true_posts,
                    'page': current_page
                };
                $.ajax({
                    url: ajaxurl,
                    data: data,
                    type: 'POST',
                    success: function (data) {
                        if (data) {
                            $('.team-items').append(data);
                            current_page++;
                            $('.team-item-container').on('click', function () {
                                $('.background-popup').addClass('show-team-popup');
                                $(this).parent().children('.team-popup').addClass('show-team-popup');
                                $('body').addClass('stop-scroll');
                            });
                            $('.container-icon-close').on('click', function () {
                                $('.background-popup').removeClass('show-team-popup');
                                $('.team-popup').removeClass('show-team-popup');
                                $('body').removeClass('stop-scroll');
                            });
                            
                            if (current_page == max_pages)
                                $(".show-team-button").remove();
                        } else {
                            $('.show-team-button').remove();
                        }
                    }
                });
            });
        });

        //gallery button active

        $('.gallery-button-all').on('click', function (e) {
            e.preventDefault();
            $('.gallery-button-salon').removeClass('active');
            $('.gallery-button-hair').removeClass('active');
            $('.gallery-button-all').addClass('active');
        });

        $('.gallery-button-salon').on('click', function (e) {
            e.preventDefault();
            $('.gallery-button-hair').removeClass('active');
            $('.gallery-button-all').removeClass('active');
            $('.gallery-button-salon').addClass('active');
        });

        $('.gallery-button-hair').on('click', function (e) {
            e.preventDefault();
            $('.gallery-button-salon').removeClass('active');
            $('.gallery-button-all').removeClass('active');
            $('.gallery-button-hair').addClass('active');
        });
        



        //Page gallery isotope

        $(window).load(function () {
            var $container = $('.portfolioContainer');
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('.portfolioFilter span').click(function () {
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                        percentPosition: true
                    }
                });

                return false;
            });
        });




        $('.vacancy-text-hidden').slideUp();

        $('.vacancy-show-more').on('click', function () {
            $(this).parent().find('.vacancy-text-hidden').slideToggle();
            $(this).toggleClass('vacancy-show-more-change');
        });



        
        // slow scroll

        jQuery('a[href^="#"]').bind('click.smoothscroll',function (e) {
            e.preventDefault();

            var target = this.hash,
                $target = $(target);

            jQuery('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 600);
        });

        //viewport checker

        $('.section-welcome-left').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-left',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
    });

        $('.section-welcome-right').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-right',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
        }); 

        $('.relax-first-item').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-left',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
        });

        $('.relax-main-container').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-right',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
        });

        $('.section-beauty-left').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-left',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
        });

        $('.section-beauty-right').viewportChecker({
            classToAdd: 'visible',
            classToRemove : 'invisible-right',
            offset: 150,
            repeat: false,
            invertBottomOffset: true,
            scrollHorizontal: false
        });


        //ajax for blog page

        jQuery(function ($) {
            $('#blog_loadmore').click(function () {
                console.log(this);
                var data = {
                    'action': 'loadmore_blog',
                    'query': true_posts,
                    'page': current_page
                };
                $.ajax({
                    url: ajaxurl,
                    data: data,
                    type: 'POST',
                    success: function (data) {
                        if (data) {
                            $('.blog-items').append(data);
                            current_page++;
                            if (current_page == max_pages)
                                $(".show-team-button").remove();
                        } else {
                            $('.show-team-button').remove();
                        }
                    }
                });
            });
        });
        
            
            
            if ($(window).width() < 1024) {
                $('#categories-2 > ul').slideToggle();
                $('#categories-2').on('click', function () {
                    $('#categories-2 > ul').slideToggle();
                });
            }


        if ($(window).width() < 1024) {
            $('#recent-posts-2 > ul').slideUp();
            $('#recent-posts-2').on('click', function () {
                $('#recent-posts-2 > ul').slideToggle();
            });
          }


        // gallery stop scroll

        // $('.gallery-item-container a').on('click', function () {
        //     $('body').addClass('gallery-scroll');
        // });
        //
        //
        // $('body').on('click', function () {
        //     if ( !$(e.target).is('.html5-image-container') ) {}
        //     else {
        //         $('body').removeClass('gallery-scroll');
        //     }
        // });

        
    });
    



})(jQuery);
