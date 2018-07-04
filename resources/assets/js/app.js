
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

    $(".selectmenu select").selectmenu();


    // Responsive Video
    $("#video-wrapper").fitVids();
    

    // Move to next date field
    $("input").bind("input", function() {
        var $this = $(this);
        setTimeout(function() {
            if ( $this.val().length >= parseInt($this.attr("maxlength"),10) ) {
                $this.next("input").focus();
            }
                
        },0);
    });

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


});
