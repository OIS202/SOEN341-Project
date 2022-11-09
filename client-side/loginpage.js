
const loginForm = document.getElementById("loginForm");
const loginButton = document.getElementById("loginSubmit");
const loginErrorMsg = document.getElementById("loginErrorMsg");

loginButton.addEventListener("click", (e) => {
    e.preventDefault();
    const username = loginForm.Username.value;
    const password = loginForm.Password.value;

    //test to see if login is right or not
    if (username === "user" && password === "web_dev") {
        alert("You have successfully logged in.");
        location.reload();
    } else {
        loginErrorMsg.style.opacity = 1;
    }
})
