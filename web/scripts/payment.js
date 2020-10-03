//Finde the input elements 
var street = document.getElementById("street");
var suite = document.getElementById("suite");
var state = document.getElementById("state");
var zipcode = document.getElementById("zipcode");
var payment_form = document.getElementById("payment_form");

//Find the error elements 
var street_error = document.getElementById("street_error");
var suite_error = document.getElementById("suite_error");
var state_error = document.getElementById("state_error");
var zipcode_error = document.getElementById("zipcode_error");

//Array of input elements 
var inputs = [street, suite, state, zipcode];

//objecj that saves the validation of all inputs
var error_map = {0:false, 1:false, 2:false, 3:false};

var  createFormListeners = () => {
    street.addEventListener("input", () => {
        verifyInput(street, street_error, 0, "Invalid Address", 2)
    });
    suite.addEventListener("input", () => {
        verifyInput(suite, suite_error, 1, "Invalid suite or apartment number", 2)
    });
    state.addEventListener("input", () => {
        verifyInput(state, state_error, 2, "Invalid State", 1)
    });
    zipcode.addEventListener("input", () => {
        verifyInput(zipcode, zipcode_error, 3, "Invalid zipcode", 2)
    });

    payment_form.addEventListener("submit", event => {
        if (!checkForNoErrors()) {
            event.preventDefault();
            focusOnfirstInvalidField();
        }
    });
}

var verifyInput = (input_el, error_el , index, error_message, pattern) => {
    var pattern_regex;
    var input_text = input_el.value;
    if(pattern == 1)
        {
            pattern_regex = /^[a-zA-Z ]+$/;
        }
        else{
            pattern_regex = /^[0-9a-zA-Z ]+$/;
        }

        if (pattern_regex.test(input_text)  || input_text == "") {
            error_el.innerHTML = '';
            error_map[index] = false;
        }
        else
        {

            error_el.innerHTML = error_message;
            error_map[index] = true;
        }
}

var checkForNoErrors = () => {
    var noErrors = true;

    var lenght = Object.keys(error_map).length;
    for(var index = 0; index < lenght; ++index)
    {
        if(error_map[index] == true)
        {
            noErrors = false;
            break;
        }
    };
    return noErrors;
}

var focusOnfirstInvalidField = () => {
    var lenght = Object.keys(error_map).length;
    for(var index = 0; index < lenght; ++index)
    { 
            if(error_map[index])
            {
                inputs[index].focus();
                break;
            }
    }
}

createFormListeners();






