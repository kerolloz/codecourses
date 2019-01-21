document.getElementById('signinCard');
document.getElementById('signin-btn').className += ' click';
document.getElementById('signupCard').style.display = "none";

function signIn() {
    document.getElementById('signinCard').style.display = "block";
    document.getElementById('signupCard').style.display = "none";
    document.getElementById('signin-btn').className += ' click';
    document.getElementById('signup-btn').className = 'col-6 sbtn';
}

function signUp() {
    document.getElementById('signinCard').style.display = "none";
    document.getElementById('signupCard').style.display = "block";
    document.getElementById('signup-btn').className += ' click';
    document.getElementById('signin-btn').className = 'col-6 sbtn';
}
