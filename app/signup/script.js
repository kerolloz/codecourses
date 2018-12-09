function signIn() {
    x = document.getElementById('signinCard');
    y = document.getElementById('signupCard');
    if(x.className === 'col-sm-12 col-md-6 siinves')
        x.className = 'col-sm-12 col-md-6';
    y.className = "suinves";
}

function signUp() {
    x = document.getElementById('signinCard');
    y = document.getElementById('signupCard');
    if(y.className === 'col-sm-12 col-md-6 suinves')
        y.className = 'col-sm-12 col-md-6';
    x.className = "siinves";
}