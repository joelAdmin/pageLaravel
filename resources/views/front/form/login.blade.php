 <div class="panel-body">
  <fieldset class="scheduler-border"><legend class="scheduler-border"><i class="fa fa-user"></i> {{ trans('label.start_session')}} <button type="button" class="close" data-dismiss="modal">x</button></legend>
    <div class="panel-body">
    <div id="message"></div>
      <div id="resul_modal_contact"></div>
      <div id="cont_modal_contact">
      <!-- ajaxLoadModal('/newContact', 'contModal', 'showModal'); -->
      {!! Form::open(['url' => '#', 'id' => 'login_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}                      
        {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-info", trans('label.loginFieldset'))) !!}
	     
	      {!! Form::text_('user','user', trans('label.user'), trans('placeholder.basic'), trans('title.input_user'), 1, $errors, array(4,6)) !!}
	      {!! Form::password_('passwd','passwd', trans('label.passwd'), trans('placeholder.basic'), trans('title.input_passwd'), 1, $errors, array(4,6)) !!}
	    {!! Html_::closeFieldset() !!} 
	    {!! Form::submit(trans('label.login'), ['id' =>'submitloginFront', 'title' => trans('title.btn_login'), 'class' => 'btn col-md-2 btn-info']) !!} 
     
      {!! Form::close() !!}
      
      </div> 
    </div>
  </fieldset>
</div>
 <script type="text/javascript">
 	$(document).ready(function (){
 		sendForm_login('submitloginFront', '/loginFront', 'login_form');
 	});
 </script>