var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 

today = yyyy+'-'+mm+'-'+dd;

document.getElementById("date-field").setAttribute("min", today);
document.getElementById("date-field").setAttribute("value", today);

now =  new Date().toLocaleTimeString('en-US', { hour12: false, 
                                             hour: "numeric", 
                                             minute: "numeric"});

document.getElementById("time-field").value = now;
document.getElementById("time-field").min = now;

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  $('#myModal').modal('show')
})



