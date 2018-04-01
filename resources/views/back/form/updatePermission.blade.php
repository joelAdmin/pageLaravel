{!! Html::div_fieldset('update_permission', trans('label.info_content_permission'), 'fa fa-exclamation-circle') !!}
	{!! Form::model($permission, ['url' => '#', 'id' => 'updatePermission_form', 'class' => 'form-horizontal', 'method' => 'put', 'files' => false]) !!}
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-edit", trans('label.info_update_permission'))) !!}
			{!! Form::hidden('id', $permission->id) !!}
			{!! Form::text_('U_name', 'name', trans('label.name'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
		{!! Html_::closeFieldset() !!}

		{!! Form::submit(trans('button.update'), ['id' =>'submitForm', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!}
	{!! Form::close() !!}
{!! Html::close_div_fieldset() !!}

<script type="text/javascript">
$(document).ready( function()
{
   send_form_put('submitForm', '/assignPermission', 'updatePermission_form', 'message');  
});

</script>