<div class="panel-body">
  <fieldset class="scheduler-border"><legend class="scheduler-border"><i class="fa fa-user-plus"></i> {{ trans('label.registerUser') }} <button type="button" class="close" data-dismiss="modal">x</button></legend>
    <div class="panel-body">
    <div id="message"></div>
      <div id="resul_modal_contact"></div>
      <div id="cont_modal_contact">
      <!-- ajaxLoadModal('/newContact', 'contModal', 'showModal'); -->
      {!! Form::open(['url' => '#', 'id' => 'newUser_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                                  
        {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newUser'))) !!}
          {!! Form::text_('name', 'name', trans('label.last_name'), trans('placeholder.basic'), trans('title.input_name'), null, $errors, array(2,6)) !!}
          {!! Form::text_('email', 'email', trans('label.email'), trans('placeholder.basic'), trans('title.input_email'), true, $errors, array(2,6)) !!}
        {!! Html_::closeFieldset() !!}

        {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_count'))) !!}
          {!! Form::text_('user', 'user', trans('label.user'), trans('placeholder.basic'), trans('title.input_user'), null, $errors, array(2,4)) !!}
          {!! Form::password_('password','password', trans('label.passwd'), trans('placeholder.basic'), trans('title.input_passwd'), 1, $errors, array(2,6)) !!}
          {!! Form::password_('confirmPassword','confirmPassword', trans('label.rep_passwd'), trans('placeholder.basic'), trans('title.rep_input_passwd'), 1, $errors, array(2,6)) !!}      
        {!! Html_::closeFieldset() !!}

        {!! Form::submit(trans('button.submit'), ['id' =>'submitForm', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!} 
      {!! Form::close() !!}
      
      </div> 
    </div>
  </fieldset>
</div>
<script type="text/javascript">
$(document).ready( function()
{
   sendForm_user('submitForm', '/newUserFront', 'newUser_form');  
}); 
</script>