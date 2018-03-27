{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newPermission'))) !!}
	{!! Form::select_('role_id', 'role_id', trans('label.role'), trans('placeholder.select'), trans('title.select_role'), $roles, null, 1, $errors, array(2,6)) !!}
	{!! Form::text_('name', 'name', trans('label.name'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
{!! Html_::closeFieldset() !!}
