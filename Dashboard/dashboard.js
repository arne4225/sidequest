// Modal Pops up for new and/or logged out users.
checkifloggedin();

// Adds functions to certain buttons
document.getElementById("logoutbtn").addEventListener("click", logout);
document.getElementById("gotosignup").addEventListener("click", showsignup);

// Creates "isloggedin"
document.getElementById("loginbtn").addEventListener("click", () => {
    if (!localStorage.getItem("logindetails")) {
        window.alert("Account does not exist. Please sign up below");
    } else {
        const details = JSON.parse(localStorage.getItem("logindetails"));
        if ((details[0].username === document.getElementById("loginname").value) && (details[0].password === document.getElementById("password").value)) {
            localStorage.setItem("isloggedin", true);
            hideloginmodal();
            document.getElementById("usernamedisplay").textContent = `Logged in as: ${details[0].username}`;
        } else {
            window.alert("Incorrect Username or Password");
        }
    }
});

//Creates accountdetails including Username, Password and Email.
document.getElementById("signupbtn").addEventListener("click", () => {
    const username = document.getElementById("user");
    const email = document.getElementById("signupemail");
    const pass1 = document.getElementById("password1");
    const pass2 = document.getElementById("password2");
    if (pass1.value === pass2.value) {
        localStorage.setItem("logindetails", JSON.stringify([{username: `${username.value}`, email: `${email.value}`, password: `${pass1.value}`,}]));
        showloginmodal();
    } else {
        window.alert("Passwords are not the same");
    }
});



// Checks if user is logged in based on localstorage
function checkifloggedin() {
    if (!localStorage.getItem("isloggedin")) {
        showloginmodal();
    } else {
        const details = JSON.parse(localStorage.getItem("logindetails"));
        document.getElementById("usernamedisplay").textContent = `Logged in as: ${details[0].username}`;
    }
}

// Shows the login modal.
function showloginmodal() {
    document.getElementById("signup").style.display = "none";
    document.getElementById("login").style.display = "block";
}

// Hides the login modal.
function hideloginmodal() {
    document.getElementById("login").style.display = "none"
}

// Function removes the "isloggedin" data from localstorage prompting the login modal again.
function logout() {
    localStorage.removeItem("isloggedin");
    document.getElementById("usernamedisplay").textContent = "";
    checkifloggedin();
}

//Switches modal to Signup mode
function showsignup() {
    hideloginmodal();
    document.getElementById("signup").style.display = "block";
}