{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newUser'))) !!}
	{!! Form::text_('name', 'name', trans('label.last_name'), trans('placeholder.basic'), trans('title.input_name'), null, $errors, array(2,6)) !!}
	{!! Form::text_('email', 'email', trans('label.email'), trans('placeholder.basic'), trans('title.input_email'), true, $errors, array(2,6)) !!}
{!! Html_::closeFieldset() !!}

{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_count'))) !!}
	{!! Form::text_('user', 'user', trans('label.user'), trans('placeholder.basic'), trans('title.input_user'), null, $errors, array(2,4)) !!}
	{!! Form::select_('type', 'type', trans('label.type'), trans('placeholder.select'), trans('title.select_type_user'), array('' => 'Seleccione un usuario', 'user' => 'usuario', 'admin' => 'administrador'), null, 1, $errors, array(2,4)) !!}

	{!! Form::password_('password','password', trans('label.passwd'), trans('placeholder.basic'), trans('title.input_passwd'), 1, $errors, array(2,6)) !!}
	{!! Form::password_('confirmPassword','confirmPassword', trans('label.rep_passwd'), trans('placeholder.basic'), trans('title.rep_input_passwd'), 1, $errors, array(2,6)) !!}	  	
{!! Html_::closeFieldset() !!}