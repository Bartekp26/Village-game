const form = document.getElementsByTagName("form");
const usernameElement = document.querySelector("input[name='username']");
const emailElement = document.querySelector("input[name='email']");
const passwordElement = document.querySelector("input[name='password']");
const repeatPasswordElement = document.querySelector("input[name='repeat-password']");
const errorElement = document.querySelector(".error");

const usernameCheck = /^[A-Za-z0-9]{4,24}$/;
const emailCheck = /\S+@\S+\.\S+/;
const passwordNumberCheck = /([0-9]+)/;
const passwordCapitalCheck = /([A-Z]+)/;
const passwordLowerCheck = /([a-z]+)/;

form[0].addEventListener('submit', (e) => {
    let error = "";
    const username = usernameElement.value;
    const email = emailElement.value;
    const password = passwordElement.value;
    const repeatPassword = repeatPasswordElement.value;

    // Passwords validation
    if(password){
        if(password.length < 8) error = "Password must be minimum 8 chars long";
        else if(!passwordNumberCheck.test(password)) error = "Password must contain at least 1 number";
        else if(!passwordCapitalCheck.test(password)) error = "Password must contain at least 1 capital";
        else if(!passwordLowerCheck.test(password)) error = "Password must contain at least 1 lowercase";
        else if(!(password === repeatPassword)) error = "Passwords don't match";
    } else error = "Enter a password";

    // Email validation
    if(!emailCheck.test(email)) error = "Enter a valid email";

    // Username validation
    if(!usernameCheck.test(username)) error = "Username must be alphanumeric &<br>4 to 24 chars long";

    if(error){
        errorElement.innerHTML = error;
        e.preventDefault();
    }
});