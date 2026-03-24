const loginOverlay = document.getElementById("login");
const signupOverlay = document.getElementById("signup");
const gotoSignupBtn = document.getElementById("gotosignup");
const logoutBtn = document.getElementById("logoutbtn");

// Check of user ingelogd is via PHP flag
const isLoggedIn = document.body.dataset.loggedin === "true";

// Show login overlay als niet ingelogd
function checkifloggedin() {
    if (!isLoggedIn) {
        loginOverlay.style.display = "flex";
    } else {
        loginOverlay.style.display = "none";
    }
}

// Switch naar signup overlay
gotoSignupBtn.addEventListener("click", () => {
    loginOverlay.style.display = "none";
    signupOverlay.style.display = "flex";
});

// Logout button (voorkomt rare gedrag door <a>)
logoutBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "logout.php";
});

// Run check
checkifloggedin();