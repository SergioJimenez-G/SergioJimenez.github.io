var $ = jQuery.noConflict();

$(function()
{
	// common
    $window = jQuery(window);

    // Responsive nav
    var navMenu = $('#nav').clone();

    navMenu.slicknav({ prependTo : '#header', label : ''});

    // we force the external link to respect the web standard (target isn't a standard)
    if(jQuery('a[rel="external"]').length)
    {
        jQuery('a[rel="external"]').attr('target','_blank');
    }

    // Open images in a fancyBox
    var selectImg = $(  'a[href$=".bmp"],a[href$=".gif"],a[href$=".jpg"],a[href$=".jpeg"],' +
                        'a[href$=".png"], a[href$=".BMP"],a[href$=".GIF"],a[href$=".JPG"],' +
                        'a[href$=".JPEG"],a[href$=".PNG"]');

        selectImg.attr('rel','fancybox').fancybox();

    $(".fancyvideo").on("click", function()
    {
        $.fancybox(
        {
            autoscale   : true,
            border      : 0,
            href        : this.href,
            type        : 'iframe',
            overlayShow : true,
            centerOnScroll : true,
            width: 900,
            height: 450
        }); // fancybox
        return false
    });

    $(".fancymp4").on("click", function()
    {
        $.fancybox(
        {
            href    : this.href,
            autoscale : true,
            border: 0,
            content : '<video autoplay="autoplay" preload="none" poster="http://www.sergiojimenez/images/poster_video.jpg" width="900" height="482" controls="controls">' +
                      '<source autoplay="autoplay" src="' + jQuery(this).attr('href') + '" type="video/mp4">your browser does not support the HTML 5 video tag' +
                      '</video>'
        }); // fancybox
        return false
    });

    // Header fixed
    if(jQuery('body').length && $(window).width() >= 768)
    {
        var stickyTop = $('#header container').height();

        $window.scroll(function()
        {
            var windowTop = jQuery(window).scrollTop();

            if (stickyTop < windowTop)
            {
                jQuery('body').addClass('fixed');
            }
            else
            {
                jQuery('body').removeClass('fixed');
            }
        });
    }

    // Effect parallax
    jQuery('div#bg-content').each(function()
    {
        var $scroll   = $(this);
        var dataSpeed = 3;

        jQuery(window).scroll(function()
        {
            var yPos = -($window.scrollTop() / dataSpeed);
            $scroll.css({ 'backgroundPosition': '50% calc(50% - ' + yPos + 'px'});
        });
    });

    // Anchor link
    if($('body').length)
    {
        $('body a.anchor').each(function()
        {
            $(this).bind('click', function()
            {
                $('html, body').animate({ scrollTop: ($( $.attr(this, 'href') ).offset().top) }, 1000);
                return false;
            });
        });

        if($(document).height() > $window.height())
        {
            $window.scroll(function()
            {
                if($window.scrollTop() > 100)
                {
                    $('#back-to-top').show();
                }
                else
                {
                    $('#back-to-top').hide();
                }
            });
        }
    }

	$('[rel="tooltip"]').tooltip();


});