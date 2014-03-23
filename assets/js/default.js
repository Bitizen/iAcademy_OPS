$(document).ready(function() {

  /* Date Picker 
  $(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "../assets/images/calendar.gif",
      buttonImageOnly: true,
      dateFormat: 'yy-mm-dd'
    });
  });
  */

  $('#iNewIndustryType').hide();

  $('#trigger-datepicker').datepicker({
      format: "yyyy-mm-dd"
  });

  $('#editMyProfile').click(function() {
    $('#dialog-edit-company-profile').modal();  
  }); 

  $('#changeMyPassword').click(function(){
      $('#dialog-change-my-password').modal();
  });

  $('#iIndustryType').change(function () {
      if ($('#iIndustryType').val() == "NEW") {
          $('#iNewIndustryType').show();
          $('#iNewIndustryType').val("");
      } else {
          $('#iNewIndustryType').hide();
      }
  });
}); // end of onReady function
