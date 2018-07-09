
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.which || e.keyCode;

            if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
                key >= 48 && key <= 57 ||
            // Numeric keypad
                key >= 96 && key <= 105 ||
            // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
            // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
            // Home and End
                key == 35 || key == 36 ||
            // left and right arrows
                key == 37 || key == 39 ||
            // Del and Ins
                key == 46 || key == 45)
                return true;

            return false;
        });
    });
}


$( document ).ready( function () {
    

    // Dropdown Hover
    $(document).ready(function() { 
        var navbarToggle = '.navbar-toggle';
        $('.dropdown, .dropup').each(function() {
          var dropdown = $(this),
            dropdownToggle = $('[data-toggle="dropdown"]', dropdown);
          
          // Mouseover
          dropdown.hover(function(){
            var notMobileMenu = $(navbarToggle).length > 0 && $(navbarToggle).css('display') === 'none';
            if (notMobileMenu) { 
              dropdownToggle.trigger('click');
            }
          })
        });
    });

    // Select Dropdown
    $(".selectmenu select").selectmenu();

    // Force Numbers only for phones
    $("#phone").forceNumeric();



    // Slider
    // var slider = jQuery('#festival-slider').slippry({
    //     // general elements & wrapper
    //     slippryWrapper: '<div class="slider" />',
    //     // options
    //     elements: '.slide',
    //     adaptiveHeight: true, // height of the sliders adapts to current 
    //     captions: false,
    //     useCSS: true,
    //     autoHover: true,
    //     transition: 'horizontal',
    //     pager: false,
    //     auto: false,
    //     speed: 1200,
    //     onSlideBefore: function (el, index_old, index_new) {
    //       jQuery('#festival-list a').removeClass('active');
    //       if (index_new) {
    //           jQuery(' #festival-list a[data-slide="'+ (index_new + 1) +'"] ').addClass('active');
    //       }
    //     }
    //   });
      
    // jQuery('#festival-list a').click(function () {
    //     slider.goToSlide($(this).data('slide'));
    //     return false;
    // });


    // Move to next date field
    // $("input").bind("input", function() {
    //     var $this = $(this);
    //     setTimeout(function() {
    //         if ( $this.val().length >= parseInt($this.attr("maxlength"),10) ) {
    //             $this.next("input").focus();
    //         }
                
    //     },0);
    // });


    // Form Validation
    $("#age").validate({
        ignore: ".ignore",
        rules: {
            day: {
                required: true,
                digits: true,
            },
            month: {
                required: true,
                digits: true,
            },
            year: {
                required: true,
                digits: true,
            },
            province: "required",
        },
        groups: {
            date: "day month year"
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            
            if ( element.attr("name") == "day" || element.attr("name") == "month" || element.attr("name") == "year") {
                error.insertAfter("#birthday");
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent('.selectmenu').addClass("is-invalid").removeClass("is-valid");
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent('.selectmenu').addClass("is-valid").removeClass("is-invalid");
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });


    $("#signup").validate({
        ignore: ".ignore",
        rules: {
            name: {
                required: true,            
            },
            phone: {
                rangelength: [10, 11],
                required: function(element) {
                  return $("#email").val() == '';
                },
            },
            email: {
                required: function(element) {
                  return $("#phone").val() == '';
                }, 
                email: true,
            },
            agree: {
                required: true,            
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            // Add the `text-danger` class to the error element
            if ( element.attr("name") != "agree") {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });


});
