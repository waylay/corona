
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$( document ).ready( function () {
    

    // Dropdown Hover
    $(document).ready(function() { 
        var navbarToggle = '.navbar-toggle'; // name of navbar toggle, BS3 = '.navbar-toggle', BS4 = '.navbar-toggler'  
        $('.dropdown, .dropup').each(function() {
          var dropdown = $(this),
            dropdownToggle = $('[data-toggle="dropdown"]', dropdown),
            dropdownHoverAll = dropdownToggle.data('dropdown-hover-all') || false;
          
          // Mouseover
          dropdown.hover(function(){
            var notMobileMenu = $(navbarToggle).length > 0 && $(navbarToggle).css('display') === 'none';
            if ((dropdownHoverAll == true || (dropdownHoverAll == false && notMobileMenu))) { 
              dropdownToggle.trigger('click');
            }
          })
        });
    });


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
            // Add the `text-danger` class to the error element
            error.addClass("text-danger");
            if ( element.attr("name") == "day" || element.attr("name") == "month" || element.attr("name") == "year") {
                error.insertAfter("#year");
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent('.selectdiv').addClass("is-invalid").removeClass("is-valid");
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent('.selectdiv').addClass("is-valid").removeClass("is-invalid");
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });


    $("#signup").validate({
        ignore: ".ignore",
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            province: "required",
            agree: "required",
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            // Add the `text-danger` class to the error element
            error.addClass("text-danger");
            if ( element.attr("name") == "agree") {
                error.insertAfter(".form-check-label p a");
            } else {
                error.insertAfter(element);
            }

        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent('.selectdiv').addClass("is-invalid").removeClass("is-valid");
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent('.selectdiv').addClass("is-valid").removeClass("is-invalid");
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});
