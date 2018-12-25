//document.getElementById('myprofile-card').style.display='none';
document.getElementById('submission-card').style.display='block';
//document.getElementById('tutorials-card').style.display='none';

document.getElementById('tried-table').style.display='block';
document.getElementById('solved-table').style.display='none';
document.getElementById('notsolved-table').style.display='none';

function submission() {
    document.getElementById('submission-card').style.display='block';
    document.getElementById('myprofile-card').style.display='none';
    document.getElementById('tutorials-card').style.display='none';
}

function sub_tried() {
    document.getElementById('tried-table').style.display='block';
    document.getElementById('solved-table').style.display='none';
    document.getElementById('notsolved-table').style.display='none';
}

function sub_solved() {
    document.getElementById('tried-table').style.display='none';
    document.getElementById('solved-table').style.display='block';
    document.getElementById('notsolved-table').style.display='none';
}

function sub_notsolved() {
    document.getElementById('tried-table').style.display='none';
    document.getElementById('solved-table').style.display='none';
    document.getElementById('notsolved-table').style.display='block';
}
/*
function myprofile() {
    document.getElementById('submission-card').style.display='none';
    document.getElementById('myprofile-card').style.display='block';
    document.getElementById('tutorials-card').style.display='none';
}

function tutorials() {
    document.getElementById('submission-card').style.display='none';
    document.getElementById('myprofile-card').style.display='none';
    document.getElementById('tutorials-card').style.display='block';
}
*/
