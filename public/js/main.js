
(function ($) {
    "use strict";

    $(".select2").select2();

     /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    /*
    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });*/



        $('.input100').focus(function(){
           hideValidate(this);
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
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }



})(jQuery);

$hasSelected = false;
function addNominee(val, textval) {
    if(val==11 || val==16) {
        $("#secondNominee").removeClass('d-none').addClass('d-block').show().attr("required");
        if (!$hasSelected) {
            $(".select2later").select2();
            $hasSelected = true;
        }
    }
    else {
        $("#secondNominee").removeClass('d-block').addClass('d-none').hide().removeAttr("required");
    }
    $("#category_name").val(textval);
}

function setValueid(elVal, elTextVal, el, elText) {
    $(el).val(elVal);
    $(elText).val(elTextVal);
}
