jQuery(document).ready(function($)
{
    // responsive menu
    var combinedMenu = $('#nav').clone();
    var secondMenu   = $('#nav-medium').clone();

    secondMenu.children('li').appendTo(combinedMenu);

    combinedMenu.slicknav({ prependTo : '#header', parentTag : 'div', label : '', closedSymbol : '+', openedSymbol : '-'});

     // mostramos y ocultamos los desplegables del menu
    jQuery('#nav li.menu-item-has-children').mouseenter(function()
    {
        $('#nav ul').stop(false, true);
        $(this).addClass('hover').find("> ul").stop().show();
    }).mouseleave(function()
    {
        $(this).removeClass('hover').find("> ul").hide();
    })


    // ancla
    if($('body').length)
    {
        $('body a.anchor, body .anchor a').each(function()
        {
            $(this).bind('click', function()
            {
                var header_height;

                if($('#header').hasClass('fixed')) { header_height = $('#header').height();} else { header_height = ($('#header').height()+80);}
                $('html, body').animate(
                {
                    scrollTop: ($( $.attr(this, 'href') ).offset().top-header_height)
                }, 1000);
                return false;
            });
        });
    }

    if($('#button-back').length)
    {
        $('#button-back').bind('click', function(event)
        {
            event.preventDefault();
            window.history.back();
        });
    }


});

$(window).load(function()
{
	jQuery('#loading').fadeOut( "slow" , 0, function() { jQuery('#loading').remove(); })
});