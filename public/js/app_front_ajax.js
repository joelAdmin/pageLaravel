function clear_form(form_name)
{
  $("#"+form_name+"").find(':input').each(function() 
  {
    var elemento = this;
    $('#'+elemento.id+'').val('');
    });
}
function showAjax(url)
{
	ajaxLoad(url, 'contenido_interno');
}

function ajaxLoad_v2(filename, cont_table) 
{ 
  cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
  //$('.loading').show(); 
  $.ajax({ 
    type: "GET", 
    url: filename, 
    //contentType: false, 
    success: function (data) 
    { 
      $("#" + cont_table).html(data); 
      //$('.loading').hide(); 
    },
    error: function (xhr, status, error) 
    { 
      alert(xhr.responseText); 
    } 
  }); 
}

function ajaxLoad(filename, cont_table) 
{ 
	cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
	$('.loading').show(); 
	$.ajax({ 
		type: "GET", 
		url: filename, 
		//contentType: false, 
		success: function (data) 
		{ 
			$("#" + cont_table).html(data); 
			$('.loading').hide(); 
		},
		error: function (xhr, status, error) 
		{ 
			alert(xhr.responseText); 
		} 
	}); 
}

function ajaxLoadModal(url, div_cont, div_modal)
{
	//alert(div_cont);
	ajaxLoad(url, div_cont);
	$('#'+div_modal+'').modal("show");            
}

function close_alert_login(div_modal)
{
	$('#'+div_modal+'').modal("hide");
	ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');
}

function alertModal_login(div_modal, alert, fa, message)
{
	//alert(div_cont);
	//ajaxLoad(url, div_cont);
	var html = "";
	html += '<div class="panel-body alert-'+alert+'"><fieldset class="scheduler-border"><legend class="scheduler-border "><i class="fa fa-info"></i>';
	html += ' Información <a href="#" onclick="close_alert_login(\''+div_modal+'\');" class="close" >x</a></legend><div class="panel-body">';
	html +='<div class="h4"><i class="fa fa-'+fa+'"></i>  '+message+'</div>';
	html += '</div></fieldset></div>';
	$("#content_modal_alert").html(html);
	$('#'+div_modal+'').modal("show");
}

function sendForm_commit(btn_submit, url, form, id ) 
{
  
  $('#'+btn_submit).click(function()
    { 
      $('.loading').show();
      $.ajax({
        type: "POST",
        url:url,
        data:  $('#'+form).serialize(),
        success: function(data)
        {
          if(data.fail)
          {

            $('#'+form).find(':input').each(function ()  
            { 
                var index_name = $(this).attr('name');
                if(index_name in data.errors) 
                { 
                  $("#div_" + index_name + "").addClass("has-error has-feedback alert alert-danger");  
                  $("#span_" + index_name + "").html(data.errors[index_name]); 
                }else
                { 
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty(); 
                }
                $('.loading').hide();
            });
          }else
          {
              $('#'+form).find(':input').each(function ()  
              {
                  var index_name = $(this).attr('name');
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty();
              });
              
              clear_form(form);
              $("#"+id+"").html(data);
              $('.loading').hide();
            }
        }
      });
      return false;
    }); 
}

function sendForm(btn_submit, url, form ) 
{
	
	$('#'+btn_submit).click(function()
    { 
      $('.loading').show();
      $.ajax({
        type: "POST",
        url:url,
        data:  $('#'+form).serialize(),
        success: function(data)
        {
          if(data.fail)
          {

            $('#'+form).find(':input').each(function ()  
            { 
                var index_name = $(this).attr('name');
                if(index_name in data.errors) 
                { 
                  $("#div_" + index_name + "").addClass("has-error has-feedback alert alert-danger");  
                  $("#span_" + index_name + "").html(data.errors[index_name]); 
                }else
                { 
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty(); 
                }
                $('.loading').hide();
            });
          }else
          {
              $('#'+form).find(':input').each(function ()  
              {
                  var index_name = $(this).attr('name');
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty();
              });
              var html ='';
              html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
             /*
              $('#title_ban'+data.tr_id).html($('#U_title_ban').val());
              $('#content_ban'+data.tr_id).html($('#U_content_ban').val());*/
              $("#message").html(html);
              $('.loading').hide();
              document.getElementById('#'+form).reset();
            }
        }
      });
      return false;
    }); 
}

function sendForm_login(btn_submit, url, form ) 
{
	
	$('#'+btn_submit).click(function()
    { 
      $('.loading').show();
      $.ajax({
        	type: "POST",
        	url:url,
        	data:  $('#'+form).serialize(),
        	success: function(data)
        	{
           		if(data.fail)
           		{

            		$('#'+form).find(':input').each(function ()  
            		{ 
                		var index_name = $(this).attr('name');
                		if(index_name in data.errors) 
                		{ 
                  			$("#div_" + index_name + "").addClass("has-error has-feedback alert alert-danger");  
                  			$("#span_" + index_name + "").html(data.errors[index_name]); 
                		}else
                		{ 
                  			$("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  			$("#span_" + index_name + "").empty(); 
                		}
                		$('.loading').hide();
            		});
            	}else
            	{
            		var html ='';
               		$('#'+form).find(':input').each(function ()  
               		{
                  		var index_name = $(this).attr('name');
                  		$("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  		$("#span_" + index_name + "").empty();
                	});

               		if (data.fail_message) 
               		{
               			html += '<div class="alert alert-'+data.alert+' alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
             			$("#message").html(html);
                	    $('.loading').hide();
               		}else if(!data.fail)
               		{
               			window.location.href='/';
               		}

                	/*
                	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
             
                	$("#message").html(html);
                	$('.loading').hide();
                	document.getElementById('#'+form).reset();*/
            	}
        	}
        });
        return false;
    }); 
}

function sendForm_user(btn_submit, url, form ) 
{
	
	$('#'+btn_submit).click(function()
    { 
      $('.loading').show();
      $.ajax({
        type: "POST",
        url:url,
        data:  $('#'+form).serialize(),
        success: function(data)
        {
          if(data.fail)
          {

            $('#'+form).find(':input').each(function ()  
            { 
                var index_name = $(this).attr('name');
                if(index_name in data.errors) 
                { 
                  $("#div_" + index_name + "").addClass("has-error has-feedback alert alert-danger");  
                  $("#span_" + index_name + "").html(data.errors[index_name]); 
                }else
                { 
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty(); 
                }
                $('.loading').hide();
            });
          }else
          {
              $('#'+form).find(':input').each(function ()  
              {
                  var index_name = $(this).attr('name');
                  $("#div_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
                  $("#span_" + index_name + "").empty();
              });
              var html ='';
              html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
             
              $('#modalShow_lg').modal("hide");
              $('.loading').hide();
              alertModal_login('modalShowAlert', 'success', 'check', data.message); 

              //document.getElementById('#'+form).reset();
          }
        }
      });
      return false;
    }); 
}

function commit(url, id)
{
   alert(url);
   var id = 'cont_commit'+id;
   ajaxLoad(url, id);
  //alert(id_textarea+'/'+id);
  /*
  $('.loading').show();
  var url = '/newCommitFront?commit=commit&id='+id;
  $.ajax({
    type:'GET',
    url:url,
    success: function(data)
    {
       alert(data);
    },
    error: function(xhr, status, error)
    {
      alert(xhr.responseText);
    }

  });*/
}