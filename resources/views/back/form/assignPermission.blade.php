{!! Html::div_fieldset('update_permission', trans('label.info_content_permission').': ['.$permission->name.'] ', 'fa fa-exclamation-circle') !!}
  {!! Form::open(['url' => '', 'id' => 'assignPermission_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}                          
    {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-list", trans('label.info_role'))) !!}
      {!! Form::hidden('id', $permission->id) !!}
      {!! Form::select_('U_role_id', 'role_id', trans('label.role'), trans('placeholder.select'), trans('title.select_role'), $roles, null, 1, $errors, array(2,6)) !!}
    {!! Html_::closeFieldset() !!}
    {!! Form::submit(trans('button.submit'), ['id' =>'submitForm', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!} 
  {!! Form::close() !!}
{!! Html::close_div_fieldset() !!}
<script type="text/javascript">
$(document).ready( function()
{
   send_form_assign_permission('submitForm', '/assignPermission', 'assignPermission_form');  
});
</script>