var phoneNumRegex = /0((60[3-9]|64[0-5]|66[0-5])\d{6}|(7[1-4689]|6[1-3]|8[1-4])\d{7})/;
var pwRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
var nameSurnameRegex = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
var usernameRegex = /^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

function registerValidation()
{
    var valid = true;
    var empty = false;
    
    $("input:not(:submit):not(:hidden)").each(function(){
        var placeholder = $(this).attr("placeholder");
        
        switch(placeholder)
        {
            case "USERNAME":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!usernameRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }
                break;
            case "PASSWORD":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!pwRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }                
                break;
            case "FIRST NAME":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!nameSurnameRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }                
                break;
            case "LAST NAME":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!nameSurnameRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }                
                break;
            case "EMAIL":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!emailRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }                
                break;
            case "CELLPHONE":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else if(!phoneNumRegex.test($(this).val()))
                {
                    valid = false;
                    $(this).css("border-bottom-color", "orange");
                }
                else
                {
                    $(this).removeAttr("style");
                }                
                break;
        }
    });
    
    if(!valid)
    {
        invalidInputToast();
        return false;
    }
    else if(empty)
    {
        emptyInputToast();
        return false;
    }
    else
    {
        return valid;
    }
}

function signInValidation()
{
    var empty = false;
    
    $("input:not(:submit):not(:hidden)").each(function(){
        var placeholder = $(this).attr("placeholder");
        
        switch(placeholder)
        {
            case "USERNAME":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else
                {
                    $(this).removeAttr("style");
                }
                break;
            case "PASSWORD":
                if(!$.trim($(this).val()))
                {
                    empty = true;
                    $(this).css("border-bottom-color", "red");
                }
                else
                {
                    $(this).removeAttr("style");
                }
                break;
        }
    });
    
    if(empty)
    {
        emptyInputToast();
        return false;
    }
    else return true;
}