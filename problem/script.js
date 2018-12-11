function dropdownMenu() {
    var x = document.getElementById('dropdownClick');
    var y = document.getElementById('imgMobile');
    
    if(x.className === 'nav-left' && y.className === 'nav-left') {
        x.className += ' responsive';
        y.className += ' responsive';
    } else {
        x.className = 'nav-left';
        y.className = 'nav-left';
    }
}