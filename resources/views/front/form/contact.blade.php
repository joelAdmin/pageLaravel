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
          {!! Form::textArea_('description', 'description', trans('label.description'), trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(2,6,2)) !!}
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
   sendForm('submitFormBanner', '/newContact', 'contact_form');  
}); 
</script>