
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate after type ]*/
    $('.validate-input .input100').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                $(this).parent().addClass('true-validate');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

     function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');

        $(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>')
        $('.btn-hide-validate').each(function(){
            $(this).on('click',function(){
               hideValidate(this);
            });
        });
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
        $(thisAlert).find('.btn-hide-validate').remove();
    }

    var inputNum = document.querySelector("#phone_number");
    var errorMsg = document.querySelector("#error-msg");
    var validMsg = document.querySelector("#valid-msg");

    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

   var iti = window.intlTelInput(inputNum, {
    preferredCountries: ["us", "co", "in", "de"],
    utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   var reset = function() {
    inputNum.classList.remove("error");
    errorMsg.innerHTML = "";
    errorMsg.classList.add("hide");
    validMsg.classList.add("hide");
  };
  
  // on blur: validate
  inputNum.addEventListener('blur', function() {
    reset();
    if (inputNum.value.trim()) {
      if (iti.isValidNumber()) {
        validMsg.classList.remove("hide");
      } else {
        inputNum.classList.add("error");
        var errorCode = iti.getValidationError();
        errorMsg.innerHTML = errorMap[errorCode];
        errorMsg.classList.remove("hide");
      }
    }
  });
  
  // on keyup / change flag: reset
  inputNum.addEventListener('change', reset);
  inputNum.addEventListener('keyup', reset);

})(jQuery);