let meet = document.getElementById("meet");
let mailingList = document.getElementById("mailingList");

meet.onchange=function(){showText()};
mailingList.onchange=function(){showRadio()};

function showText(){
    let text = document.getElementById("showText1");
    console.log(meet.value);
    text.style.display = meet.value == "other"? "block": "none";
}

function showRadio(){
    document.getElementById("radioOptions").style.display = mailingList.checked == true? "block": "none";
}


// Validation
//document.getElementById("guestForm").onsubmit = validate;
function clearErrors(){
    let errors = document.getElementsByClassName("text-danger");
    for (let i = 0; i < errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

function validate(){
    clearErrors();
    let submitForm = true;
    let linkin = document.getElementById("linkedin");

    if(!validInput("fname")) submitForm = false;
    if(!validInput("lname")) submitForm = false;

    // validation for email
    if(mailingList.checked == true && validInput("email")){
        submitForm = validEmail("email");
    }else if(document.getElementById("email").value != "" && !validEmail("email")){
        submitForm = false;
    }
    // Validation for linkedin
    console.log(linkin.value)
    if(linkin.value != "" && !linkin.value.startsWith("http") && !linkin.value.endsWith(".com")){
        document.getElementById("err-linkedin").classList.remove("d-none");
       submitForm = false;
    }
    // validation for drop down question of if we met
    if(meet.value == "none"){
        document.getElementById("err-meet").classList.remove("d-none");
        submitForm = false;
    } else if (meet.value == "other" && !validInput("showText")){
        submitForm = false;
    }
    return submitForm;

}
function validInput(id){
    if(document.getElementById(id).value == ""){
        console.log(document.getElementById("err-" + id).classList);
        document.getElementById("err-" + id).classList.remove("d-none");
        return false;
    } else{
        return true;
    }
}

function validEmail(id){
        // Verifies Email is valid (e.g. example@email.com)
        // Borrowed from https://www.w3resource.com/javascript/form/email-validation.php
        let submitForm = true;
        if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test
        (document.getElementById(id).value))) {
            // Email is invalid
            // This statement returns the second error (invalid)
            document.getElementById("err-" + id + "valid").classList.remove("d-none");
            submitForm = false;
        }
        return submitForm;
}