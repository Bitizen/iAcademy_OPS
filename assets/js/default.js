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
  
  $('#trigger-datepicker').datepicker({
      format: "yyyy-mm-dd"
  });
  
    jQuery(function($){
      $.fn.monthYearPicker = function(options) {
          options = $.extend({
              dateFormat: "MM yy",
              changeMonth: true,
              changeYear: true,
              showButtonPanel: true,
              showAnim: ""
          }, options);
          function hideDaysFromCalendar() {
              var thisCalendar = $(this);
              $('.ui-datepicker-calendar').detach();
              // Also fix the click event on the Done button.
              $('.ui-datepicker-close').unbind("click").click(function() {
                  var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  thisCalendar.datepicker('setDate', new Date(year, month, 1));
              });
          }
          $(this).datepicker(options).focus(hideDaysFromCalendar);  
      }

      $('input.monthYearPicker').monthYearPicker();
        //all jQuery code which uses $ needs to be inside here
    });

  $('#iNewIndustryType').hide();

  $('#editInternProfile').click(function() {
    $('#dialog-edit-intern-profile').modal();  
  }); 

  $('#editAlumnusProfile').click(function() {
    $('#dialog-edit-alumnus-profile').modal();  
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

  $('#viewInternProfile').click(function() {
    $('#dialog-view-intern-profile').modal();  
  });   

  $('#viewEmployeeProfile').click(function() {
    $('#dialog-view-employee-profile').modal();  
  }); 

}); // end of onReady function
