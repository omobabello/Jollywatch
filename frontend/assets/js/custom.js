$(function(){
  $("#btn-like").on('click', function(event){
        $.ajax({
            url: $("#like-url").val(),
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            success: function(data){
              var result = jQuery.parseJSON(data);
              if(result.success){
                $("#btn-like").prop('disabled', true);
              }
            }
        });
  });
});
