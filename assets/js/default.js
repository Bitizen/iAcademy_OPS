$(document).ready(function() {

$(function() {
  $("#tabs").tabs();
});

$('#btnShowAlumniReg').click(function(){
  $("#alumRegDiv").show(); 
  $("#alumViewDiv").hide(); 
});

$('#btnShowEmpReg').click(function(){
  $("#empRegDiv").show(); 
  $("#empViewDiv").hide(); 
});

$('#btnShowAdminReg').click(function(){
  $("#adminRegDiv").show(); 
  $("#adminViewDiv").hide(); 
});

$('#btnShowAlumniView').click(function(){
  $("#alumViewDiv").show(); 
  $("#alumRegDiv").hide(); 
});

$('#btnShowEmpView').click(function(){
  $("#empViewDiv").show(); 
  $("#empRegDiv").hide(); 
});

$('#btnShowAdminView').click(function(){
  $("#adminViewDiv").show(); 
  $("#adminRegDiv").hide(); 
});

$("#alumViewDiv").hide();
$("#empViewDiv").hide();
$("#adminViewDiv").hide();
$(".editbox").hide();

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();

if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} var today = dd+'/'+mm+'/'+yyyy;
document.getElementById("DATE_TODAY").value = today;

$(function() {
  $( "#datepicker" ).datepicker();
});

for (i = new Date().getFullYear(); i > 2010; i--) {
  $('#yearpicker').append($('<option />').val(i).html(i));
  $('#iYearGraduated').append($('<option />').val(i).html(i));
}

$("#studentChosenDiv").dialog({
  autoOpen: true,
  height: 500,
  width: 540,
  modal: true,
  buttons: {
    "Edit": function() {
      $("#sStudentID").hide();
      $("#sFirstName").hide();
      $("#sLastName").hide();
      $("#sGender").hide();
      $("#sBirthdate").hide();
      $("#sContactDetails").hide();
      $("#sLastUpdated").hide();
      $("#sCourseName").hide();
      $("#sYearGraduated").hide();
      $("#sAddress").hide();
      $("#sStatus").hide();

      $("#iStudentId").show();
      $("#iFirstName").show();
      $("#iLastName").show();
      $("#iGenderM").show();
      $("#iGenderF").show();
      $("#iMale").show();
      $("#iFemale").show();
      $("#iContactDetails").show();  
      $("#iCourseName").show(); 
      $("#iYearGraduated").show();         
      //$("#iAddress").show();       
      $("#iStatus").show();

    },
    Cancel: function() {
      $( this ).dialog( "close" );
    }
  },
  close: function() {
    allFields.val( "" ).removeClass( "ui-state-error" );
  }
}); // end of studentChosenDiv Dialog

$(".edit_tr").change(function() {
  var ID=$("#iStudentId").val();
  var FNAME=$("#iFirstName").val();
  var LNAME=$("#iLastName").val();
  var CONTACT=$("#iContactDetails").val();
  var ADD=$("#iAddress").val();
  var dataString = 
      'student_id='       + ID 
    + '&firstname='       + FNAME 
    + '&lastname='        + LNAME 
    + '&contact_details=' + CONTACT 
    + '&address='         + ADD;

  if(ID.length > 0 && FNAME.length > 0 && LNAME.length > 0 && CONTACT.length > 0 && ADD.length > 0) {
    $.ajax({
      type: "POST",
      url: "<?php echo base_url();?>index.php/OpsController/update_student",
      data: dataString,
      cache: false,
      success: function(html) {
        $("#iStudentId").html(ID);
        $("#iFirstName").html(FNAME);
        $("#iLastName").html(LNAME);
        $("#iContactDetails").html(CONTACT);
        $("#iAddress").html(ADD);
      }
    });
  } else {
    alert('Field is empty.');
  }
}); // end of edit_tr onChange function

$(".editbox").mouseup(function() {
  return false
});

$(document).mouseup(function() {
  $(".editbox").hide();
  $(".text").show();
});

}); // end of onReady function

