/* ============================================================
 * Plugin Core Init
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
 
'use strict';

(function() {
    window.signature = {
        initialize: function() {
            return $('.demo-signature svg').each(function() {
                var delay, i, len, length, path, paths, previousStrokeLength, results, speed;
                paths = $('path, circle, rect', this);
                delay = 0;
                results = [];
                for (i = 0, len = paths.length; i < len; i++) {
                    path = paths[i];
                    length = path.getTotalLength();
                    previousStrokeLength = speed || 0;
                    speed = length < 100 ? 20 : Math.floor(length);
                    delay += previousStrokeLength + 100;
                    results.push($(path).css('transition', 'none').attr('data-length', length).attr('data-speed', speed).attr('data-delay', delay).attr('stroke-dashoffset', length).attr('stroke-dasharray', length + ',' + length));
                }
                return results;
            });
        },
        animate: function() {
            return $('.demo-signature svg').each(function() {
                var delay, i, len, length, path, paths, results, speed;
                paths = $('path, circle, rect', this);
                results = [];
                for (i = 0, len = paths.length; i < len; i++) {
                    path = paths[i];
                    length = $(path).attr('data-length');
                    speed = $(path).attr('data-speed');
                    delay = $(path).attr('data-delay');
                    results.push($(path).css('transition', 'stroke-dashoffset ' + speed + 'ms ' + delay + 'ms linear').attr('stroke-dashoffset', '0'));
                }
                return results;
            });
        }
    };
    $(document).ready(function() {

        // $('.demo-handbook').pgFloat({
        //     maxTopTranslate: 40, // stop parallax effect after element is moved up in given pixels. 0 = after element hides from the screen
        //     maxBottomTranslate: 300, // stop parallax effect after element is moved down in given pixels. 0 = after element hides from the screen
        //     speed: -0.1, // 0.1
        //     delay: 1000, // 1000
        //     curve: 'ease'
        // });

        $('.btn-arrow').click(function() {
            $("#launch").velocity("scroll", {
                duration: 800
            });
        })


        window.signature.initialize();

        if ($('#meet').length &&  ($('#meet').position().top - $(window).scrollTop() < 450)) {
            window.signature.animate();
        }


    });


    if(typeof Waypoint !== 'undefined'){
         var waypoint = new Waypoint({
        element: $('#meet').get(0),
        handler: function() {
            window.signature.animate();
        },
        offset: '60%'
    })
    }
   

}.call(this));