// Get the modal
var bigmodal = document.getElementById('exampleModalLong');
var modal = document.getElementById('res');
var judgeRes = document.getElementById("judgeResult");

// Get the button that opens the modal
var btn = document.getElementById("resbtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeRes")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  $('#exampleModalLong').modal('hide');
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  judgeRes.innerHTML = "Please Wait!";

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  	judgeRes.innerHTML = "Please Wait!";

  }
}