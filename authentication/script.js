document.getElementById('signinCard');
document.getElementById('signupCard').style.display="none";
function signIn() {
    document.getElementById('signinCard').style.display="block";
    document.getElementById('signupCard').style.display="none";
}

function signUp() {
    document.getElementById('signinCard').style.display="none";
    document.getElementById('signupCard').style.display="block";
}