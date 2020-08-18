$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});


$("#upload-video").ready(function(){
  $("#progress-bar").hide();
  $("#message").hide();
});

$(function(){
  $("#btn-upload-skit").on('click', function(event){
    var red_flag = 0;
    var error_message = "";
    var kase = true;
    var upload_url = $("#upload-url").val();
    var title_patt = /^[a-zA-Z0-9\'\s\.]+$/;
    var form_data = new FormData();


    if ($("#thumb")[0].files[0] == null){
      kase = kase && false;
      error_message = error_message +"<strong>"+ ++ red_flag +"</strong> Select thumbnail file <br/>";
    }

    if ($("#movie")[0].files[0] == null){
      kase = kase && false;
      error_message = error_message +"<strong>"+ ++ red_flag +"</strong> Select skit file <br/>";
    }

    if ( ! title_patt.test($("#title").val())){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter a valid Title <br/>";
    }

    if ( ! title_patt.test($("#desc").val())){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter a Description <br/>";
    }

    if (! $("input[name=rating]:checked").val()){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select a rating <br/>";
    }

    if (kase){
      form_data.append('thumbnail', $("#thumb")[0].files[0]);
      form_data.append('skit', $("#movie")[0].files[0]);
      form_data.append('title', $("#title").val());
      form_data.append('desc', $("#desc").val());
      form_data.append('rating', $("input[name=rating]:checked").val());

     $.ajax({
         url : upload_url,
         type : "POST",
         data : form_data,
         contentType: false,
      	 cache: false,
      	 processData:false,
         success : function(data){
          var result = jQuery.parseJSON(data);
            if(result.success){
              var state = "<div class='progress-bar progress-bar-success' style='width: 100%'>"+ result.message +"</div>";
               $("#progress-bar").html(state);
               clear();
            }else{
              var state = "<div class='progress-bar progress-bar-danger' style='width: 100%'> Failed </div>";
              $("#progress-bar").html(state);
               $("#message").show();
               $("#message").text(result.message);
            }
          },
         xhr : function(){
          var xhr = $.ajaxSettings.xhr();
           if(xhr.upload){
               xhr.upload.addEventListener('progress', function(event){
                 var percent = (event.loaded/event.total) * 100;
                  var state = "<div class='progress-bar progress-bar-info' style='width:"+ percent.toFixed(2) +"%'>"+ Math.round(percent,2) - 0.01 +"</div>";
                 $("#message").hide();
                 $("#progress-bar").show();
                 $("#progress-bar").html(state);
               }, true);
           }
          return xhr;
         }
       });
    }else{
      $("#message").show();
      $("#message").append(error_message);
    }

  });
});

$(function(){
  $("#btn-upload-movie").on('click', function(event){
      $('html, body').animate({scrollTop : 0}, 'fast');
      var red_flag = 0;
      var error_message = "";
      var kase = true;
      var genre = new Array();
      var word_patt = /^[a-zA-Z]+$/;
      var title_patt = /^[a-zA-Z0-9\'\s\,\.]+$/;
      var name_patt = /[a-zA-Z\'\-]+$/;
      var list_patt = /[a-zA-Z\'\-,]+$/;
      $.each($("input[name='genre[]']:checked"), function(){genre.push($(this).val());});


      if ($("#cover")[0].files[0] == null){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select Cover Image for this movie <br/>";
      }

      if ($("#thumb")[0].files[0] == null){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select thumbnail file  <br/>";
      }

      if ($("#movie")[0].files[0] == null){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select Movie Directory <br/>";
      }

      if ( ! title_patt.test($("#title").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter a valid Title <br/>";
      }

      if ( ! title_patt.test($("#desc").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter a Description <br/>";
      }

      if ( ! list_patt.test( $("#other-acts").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Provide at least one other actor, Seperate list with comma <br/>";
      }

      if ( ! name_patt.test($("#lead-actor").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Provide Lead Actor's name <br/>";
      }

      if(genre.length === 0){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select at least one genre  <br/>";
      }

      if (! $("input[name=rating]:checked").val()){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select a rating <br/>";
      }

      if($("#prod-year").val() == 0){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select Production year  <br/>";
      }

      if ( ! word_patt.test($("#language").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter a valid language <br/>";
      }



      if (kase){
          var form_data = new FormData();
          form_data.append('thumb', $("#thumb")[0].files[0]);
          form_data.append('cover', $("#cover")[0].files[0]);
          form_data.append('movie', $("#movie")[0].files[0]);
          form_data.append('title', $("#title").val());
          form_data.append('desc', $("#desc").val());
          form_data.append('genre', genre);
          form_data.append('lead_actor', $("#lead-actor").val());
          form_data.append('other_acts',  $("#other-acts").val());
          form_data.append('prod_year', $("#prod-year").val());
          form_data.append('language', $("#language").val());
          form_data.append('rating', $("input[name=rating]:checked").val());

          $('html, body').animate({scrollTop : 0}, 'fast');
          $.ajax({
            url : $("#upload-url").val(),
            type: "POST",
            data: form_data,
            contentType: false,
        	  cache: false,
         	  processData:false,
            success: function(data){
                var result = jQuery.parseJSON(data);
                if (result.success){
                  var state = "<div class='progress-bar progress-bar-success' style='width: 100%'>"+ result.message +"</div>";
                   $("#progress-bar").html(state);
                   clear();
                }else{
                  var state = "<div class='progress-bar progress-bar-danger' style='width: 100%'> Failed </div>";
                  $("#progress-bar").html(state);
                  $("#message").show();
                  $("#message").text(result.message);
                }

            },
            xhr: function(){
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload){
                  xhr.upload.addEventListener('progress',function(event){
                    var percent = ((event.loaded/event.total) * 100 )-0.11;
                    var state = "<div class='progress-bar progress-bar-info' style='width:"+ percent.toFixed(2) +"%'>"+ percent.toFixed(2) +"%</div>";
                    $("#message").hide();
                    $("#progress-bar").show();
                    $("#progress-bar").html(state);
                  }, true);
                }
                return xhr;
            }
          });
      }else{
        $("#message").show();
        $("#message").html(error_message);
        $('html, body').animate({scrollTop : 0}, 'slow');
      }


  });
});


function clear(){
    $("#title").val('');
    $("#desc").val('');
    $("#lead-actor").val('');
    $("#other-acts").val('');
    $("#prod-year").val('0');
    $("#language").val('');
    $("input[name=rating]").prop('checked',false);
    $("input[name='genre[]']").prop('checked', false);

    var stud = $("#thumb");
    stud.wrap('<form>').closest('form').get(0).reset();
    stud.unwrap();

    var stud = $("#movie");
    stud.wrap('<form>').closest('form').get(0).reset();
    stud.unwrap();

    var stud = $("#cover");
    stud.wrap('<form>').closest('form').get(0).reset();
    stud.unwrap();
}

$(function(){
  $("#btn-add-series").on('click', function(event){
    var red_flag = 0;
    var error_message = "";
    var kase = true;
    var genre = new Array();
    var title_patt = /^[a-zA-Z0-9\'\s]+$/;
    $.each($("input[name='genre[]']:checked"), function(){genre.push($(this).val());});

    if ($("#cover")[0].files[0] == null){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Choose a Cover file <br/>";
    }

    if (! title_patt.test($("#title").val())){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter Valid title <br/>";
    }

    if (! title_patt.test($("#desc").val())){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter Valid Description <br/>";
    }

    if($("#prod-year").val() == 0){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select Production year  <br/>";
    }


    if(genre.length === 0){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select at least one genre  <br/>";
    }

    if (! $("input[name=rating]:checked").val()){
      kase = kase && false;
      error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select a rating <br/>";
    }

    if(kase){
        form_data = new FormData();
        form_data.append('cover', $("#cover")[0].files[0]);
        form_data.append('title', $("#title").val());
        form_data.append('desc', $("#desc").val());
        form_data.append('genre', genre);
        form_data.append('prod_year',$("#prod-year").val());
        form_data.append('rating', $("input[name=rating]:checked").val());

        $.ajax({
            url : $("#upload-url").val(),
            type: "POST",
            data: form_data,
            contentType: false,
        	  cache: false,
         	  processData:false,
            success: function(data){
                var result = jQuery.parseJSON(data);
                if (result.success){
                  var state = "<div class='progress-bar progress-bar-success' style='width:100%'>"+ result.message +"</div>";
                  $("#progress-bar").show();
                  $("#progress-bar").html(state);
                  clear();
                }else{
                  var state = "<div class='progress-bar progress-bar-danger' style='width: 100%'> Failed </div>";
                  $("#progress-bar").html(state);
                  $("#message").show();
                  $("#message").text(result.message);
                }
            },
            xhr: function(){
                var xhr = $.ajaxSettings.xhr();
                if(xhr.upload){
                  xhr.upload.addEventListener('progress', function(event){
                    var percent = (event.loaded/event.total) * 100;
                    var state = "<div class='progress-bar progress-bar-info' style='width:"+ Math.round(percent) +"%'>"+ Math.round(percent) +"</div>";
                    $("#progress-bar").show();
                    $("#progress-bar").html(state);
                  }, true);
                }
                return xhr;
            }

        });

    }else{
      $("#message").show();
      $("#message").html(error_message);
    }
  });
});

$(function(){
  $("#btn-new-episode").click('on',function(){
      var red_flag = 0;
      var error_message = "";
      var kase = true;
      var title_patt = /^[a-zA-Z0-9\'\s]+$/;

      if ($("#thumb")[0].files[0] == null){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Choose a thumbnail image <br/>";
      }

      if ($("#movie")[0].files[0] == null){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Choose your episode file <br/>";
      }

      if(! $("#episode").val()){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Select Episode number <br/>";
      }

      if (! title_patt.test($("#title").val())){
        kase = kase && false;
        error_message = error_message + "<strong>" + ++ red_flag + "</strong> Enter Valid title <br/>";
      }

      if (kase){
      $('html, body').animate({scrollTop : 0}, 'fast');
          var form_data = new FormData();
          form_data.append('thumbnail', $("#thumb")[0].files[0]);
          form_data.append('video', $("#movie")[0].files[0]);
          form_data.append('title', $("#title").val());
          form_data.append('season', $("#season").val());
          form_data.append('episode', $("#episode").val());
          form_data.append('series', $("#series").val());

          $.ajax({
              url : $("#upload-url").val(),
              type : "POST",
              data : form_data,
              contentType: false,
              cache: false,
              processData:false,
              success: function(data){
                        var result = jQuery.parseJSON(data);
                        if (result.success){
                          var state = "<div class='progress-bar progress-bar-success' style='width:100%'>"+ result.message +"</div>";
                          $("#progress-bar").show();
                          $("#progress-bar").html(state);
                          clear();
                        }else{
                          var state = "<div class='progress-bar progress-bar-danger' style='width: 100%'> Failed </div>";
                          $("#progress-bar").html(state);
                          $("#message").show();
                          $("#message").text(result.message);
                        }

              },
              xhr: function(){
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload){
                  xhr.upload.addEventListener('progress',function(event){
                    var percent = event.loaded/event.total * 100;
                    var state = "<div class='progress-bar progress-bar-info' style='width:"+ percent.toFixed(2) +"%'>"+ parseFLOAT(percent.toFixed(2)) - 0.01 +"% </div>";
                    $("#progress-bar").show();
                    $("#progress-bar").html(state);
                  }, true);
                }
                return xhr;
              }
          });
      }else{
        $("#message").show();
        $("#message").html(error_message);
      }

  });
});

$(function(){
  $("#btn-reset").click('on', function(){
    clear();
  });
});

$(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


});
