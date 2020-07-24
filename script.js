$(document).ready(function(){
    // basic form
    $('#basickbtn').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'apply.php',
        data: $('#basic').serialize(),
        success: function (data) {
        var result=data;
        $(".basicerror").html(result);
            
        
        }
    });
    
    })


    // advance form

     // basic form
     $('#advancekbtn').click(function(event){
        var form = $('#advance')[0];
  var formData  = new FormData(form);
$.ajax({
  type:'POST',
  url: 'apply.php',
  data: formData,
  
  success: function (data) {
  var result=data;
  $(".advanceerror").html(result);
  if(result=="Category Created"){
   window.location.assign('managestaff');    
   }
  },
  cache:false,
  contentType:false,
  processData:false
});

event.preventDefault();
})
    
})