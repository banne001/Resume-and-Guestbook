let form = document.getElementById("contactForm");
form.onsubmit  = validate;
let intro = document.getElementById("intro");
// Name Animation
typeName();
function typeName(){
    let txt = "Hello, I am Blezyl Santos.";
    let speed = 100;
    let i = 0;
    typeWriter();
    function typeWriter(){
        if(i<txt.length){
            intro.textContent += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
}

document.querySelector(".card-flip").classList.toggle("flip");

/*
 * Holder.js for demo image
 * Just for demo purpose
 */
Holder.addTheme('gray', {
    bg: '#777',
    fg: 'rgba(255,255,255,.75)',
    font: 'Helvetica',
    fontweight: 'normal'
});


// form
function validate(e){
    classErrors();

    let validName = validateInputField('name', 'err-name');
    let validMail = validateEmail('email', 'err-invalidemail');
    let validMessage = validateInputField('message', 'err-message');

    let correct = validName && validMail && validMessage;
    if(correct === false){
        e.preventDefault();
    }
}
// input validation
function validateInputField(id, errorID){
    let txtval= document.getElementById(id).value;
    let errField = document.getElementById(errorID);
    //if text value is empty
    if(txtval===""){
        errField.classList.remove("d-none");
        return false;
    }else {
        return true;
    }
}

// valid email
function validateEmail(id, errorId, errorInputId){
    let txtval= document.getElementById(id).value;
    let errField = document.getElementById(errorId);
    let errInputField = document.getElementById(errorInputId);

    //if text value is empty
    if(txtval===""){
        errField.classList.remove("d-none");
        return false;
    }else {
        let mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        let txtval = document.getElementById(id).value;
        if(txtval.match(mailFormat)) {
            return true;
        } else {
            errInputField.classList.remove("d-none");
            return false;
        }
    }
}

function classErrors() {
    let errors = document.getElementsByClassName("validation");
    for (let i = 0; i < errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}