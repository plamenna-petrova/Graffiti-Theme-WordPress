jQuery(document).ready(function ($) {
    //custom Graffiti scripts

    /**init function */
    revealPosts();

    var last_scroll = 0;

    function graffiti_get_thumbs() { // wrap it with a new function
        /**variable function */
        $(document).on('click', '.graffiti-carousel-thumb', function () {
            var id = $("#" + $(this).attr("id"));
            $(id).on('slid.bs.carousel', function () {
                graffiti_get_bs_thumbs(id);
            });
        });

        $(document).on('mouseenter', '.graffiti-carousel-thumb', function () {
            var id = $("#" + $(this).attr("id"));
            graffiti_get_bs_thumbs(id);
        });
    } // END graffiti_get_thumbs()

    function graffiti_get_bs_thumbs(id) {

        var nextThumb = $(id).find('.carousel-item.active').find('.next-image-preview').data('image');
        var prevThumb = $(id).find('.carousel-item.active').find('.prev-image-preview').data('image');

        $(id).find('.carousel-control-next').find('.thumbnail-container').css({
            'background-image': 'url(' + nextThumb + ')'
        });
        $(id).find('.carousel-control-prev').find('.thumbnail-container').css({
            'background-image': 'url(' + prevThumb + ')'
        });

    }

    /** Ajax Function */
    $(document).on('click', '.graffiti-load-more:not(.loading)', function () {

        var that = $(this);
        var page = that.data('page');
        var newPage = page + 1;
        var ajaxUrl = that.data('url');
        var prev = that.data('prev');
        var archive = that.data('archive');

        if (typeof prev === 'undefined') {
            prev = 0;
        }

        if (typeof archive === 'undefined') {
            archive = 0;
        }

        that.addClass('loading').find('.text').slideUp(320);
        that.find('.sunset-icon').addClass('spin');

        $.ajax({

            url: ajaxUrl,
            type: 'post',
            data: {
                page: page,
                prev: prev,
                archive: archive,
                action: 'graffiti_load_more'
            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {

                if (response == 0) {

                    $('.graffiti-posts-container').append('<div class="text-center"><h3>You reached the end of the line !</h3><p>No more posts to load.</p></div>');
                    that.slideUp(320);

                } else {

                    setTimeout(function () {

                        if (prev == 1) {
                            $('.graffiti-posts-container').prepend(response);
                            newPage = page - 1;
                        } else {
                            $('.graffiti-posts-container').append(response);
                        }

                        if (newPage == 1) {
                            that.slideUp(320);
                        } else {
                            that.data('page', newPage);
                            that.removeClass('loading').find('.text').slideDown(320);
                            that.find('.sunset-icon').removeClass('spin');
                        }

                        revealPosts();

                    }, 1000);

                }


            }
        });

    });

    /**Scroll  function*/
    $(window).scroll(function () {

        var scroll = $(window).scrollTop();

        if (Math.abs(scroll - last_scroll) > $(window).height() * 0.1) {
            last_scroll = scroll;

            $('.page-limit').each(function (index) {

                if (isVisible($(this))) {

                    history.replaceState(null, null, $(this).attr("data-page"));
                    return (false);

                }

            });

        }

    });

    /** Helper function */
    function revealPosts() {

        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();

        var posts = $('article:not(.reveal)');
        var i = 0;

        setInterval(function () {

            if (i >= posts.length) return false;

            var el = posts[i];
            $(el).addClass('reveal').find('.graffiti-carousel-thumb').carousel();
            graffiti_get_thumbs(); // call the new function

            i++;

        }, 200);
    }

    function isVisible(element) {

        var scroll_pos = $(window).scrollTop();
        var window_height = $(window).height();
        var el_top = $(element).offset().top;
        var el_height = $(element).height();
        var el_bottom = el_top + el_height;
        return ((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));
    }

    /* sidebar functions */

    $(document).on('click', '.js-toggleSidebar', function () {
        $('.graffiti-sidebar').toggleClass('sidebar-closed');
        $('body').toggleClass('no-scroll');
        $('.graffiti-overlay').fadeToggle(320);
    });

    /* contact form submission */
    $('#graffitiContactForm').on('submit', function(e){

        e.preventDefault();

        $('.has-error').removeClass('has-error');
        $('.js-show-feedback').removeClass('js-show-feedback');

        var form = $(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');

        if( name === '' ){
            $('#name').parent('.form-group').addClass('is-invalid');
            return;
        }

        if( email === '' ){
            $('#email').parent('.form-group').addClass('is-invalid');
            return;
        }

        if( message === '' ){
            $('#message').parent('.form-group').addClass('is-invalid');
            return;
        }

        form.find('input, button, textarea').attr('disabled','disabled');
        $('.js-form-submission').addClass('js-show-feedback');

        $.ajax({

            url : ajaxurl,
            type : 'post',
            data : {

                name : name,
                email : email,
                message : message,
                action: 'graffiti_save_user_contact_form'

            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    },1500);

                } else {

                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    },1500);

                }
            }

        });

    });

});







