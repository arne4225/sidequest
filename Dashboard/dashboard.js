// Modal Pops up for new and/or logged out users.
checkifloggedin();

// Adds functions to certain buttons
document.getElementById("logoutbtn").addEventListener("click", logout);
document.getElementById("gotosignup").addEventListener("click", showsignup);

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