(function( $ ){

    var methods = {

        init : function(options) {

            var $this = $(this);
            var $target = $('[data-reveal-id=' + $this.attr('data-reveal') + ']');
            var $height = $target.attr('data-height');

            var settings = $.extend({
                // settings
            }, options );

            if ($target.height() < $height) {

                $(this).hide();
                return this;
            }

            $target.css({
                'display' : 'block',
                'height' : $height + 'px',
                'overflow' : 'hidden'
            });

            $this.click(function(e){

                e.preventDefault();
                $this.hide();

                autoHeight = $target.css('height', 'auto').height();
                $target.height($height);
                $target.animate({height: autoHeight}, 200, function(){
                    $target.css('height', 'auto');
                });
            });

            return this;

        }
    };

    $.fn.Reveal = function(methodOrOptions) {
        if ( methods[methodOrOptions] ) {

            return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));

        } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {

            return methods.init.apply( this, arguments );

        } else {
            $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.Toggle' );
        }
    };

    $(document).ready(function(){

        $('[data-reveal]').each(function(){
            $(this).Reveal();
        });

    });

})( jQuery );