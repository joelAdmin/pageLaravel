<div class="panel-body">
  <fieldset class="scheduler-border"><legend class="scheduler-border"><i class="fa fa-envelope-o"></i> Enviar informacion <button type="button" class="close" data-dismiss="modal">x</button></legend>
    <div class="panel-body">
    <div id="message"></div>
      <div id="resul_modal_contact"></div>
      <div id="cont_modal_contact">
      <!-- ajaxLoadModal('/newContact', 'contModal', 'showModal'); -->
      {!! Form::open(['url' => '#', 'id' => 'contact_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                                  
        {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newContact'))) !!}
          {!! Form::text_('name_con', 'name_con', trans('label.name'), trans('placeholder.basic'), trans('title.input_name'), 1, $errors, array(2,6)) !!}
          {!! Form::text_('email_con', 'email_con', trans('label.email'), trans('placeholder.basic'), trans('title.input_email'), 1, $errors, array(2,6)) !!}
          {!! Form::textArea_('description', 'description', trans('label.description'), trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(2,6)) !!}
        {!! Html_::closeFieldset() !!}

        {!! Form::submit(trans('button.submit'), ['id' =>'submitFormBanner', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!} 
      {!! Form::close() !!}
      
      </div> 
    </div>
  </fieldset>
</div>
<script type="text/javascript">
$(document).ready( function()
{
    $("#submitFormBanner").click(function()
    { 
      $('.loading').show();
      $.ajax({
        type: "POST",
        url:'/newContact',
        data:  $('#contact_form').serialize(),
        success: function(data)
        {
          if(data.fail)
          {
            $('#contact_form').find(':input').each(function ()  
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
              $('#contact_form').find(':input').each(function ()  
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
              document.getElementById("contact_form").reset();
            }
        }
      });
      return false;
    });   
});
  
</script>