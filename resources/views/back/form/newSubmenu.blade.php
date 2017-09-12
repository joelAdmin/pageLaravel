{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newSubmenu'))) !!}
	{!! Form::select_('get_menu', 'id_men', trans('label.menu'), trans('placeholder.select'), trans('title.select_menu'), $menus, null, 1, $errors, array(2,6)) !!}
	{!! Form::text_('etiqueta_sub', 'etiqueta_sub', trans('label.etiqueta'), trans('placeholder.basic'), trans('title.input_etiqueta'), 1, $errors, array(2,6)) !!}
	{!! Form::text_('url_sub', 'url_sub', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_submenu'), null, $errors, array(2,6)) !!}
	{!! Form::text_('event_sub', 'event_sub', trans('label.event'), trans('placeholder.basic'), trans('title.input_event'), null, $errors, array(2,6)) !!}
	                        
{!! Html_::closeFieldset() !!}

{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_position_submenu'))) !!}
	
	{!! Form::text_('class_sub', 'class_sub', trans('label.class_css'), trans('placeholder.basic'), trans('title.input_class_css'), null, $errors, array(2,6)) !!}
	{!! Form::radio_('position', 'position', trans('label.position'), trans('title.check_position'), array(1=>trans('label.option0_position'), 2=>trans('label.option1_position')), 1, $errors, array(2,6) )!!}
	{!! Form::select_('get_submenu', 'get_submenu', trans('label.submenu'), trans('placeholder.select'), trans('title.select_submenu'), array(), null, null, $errors, array(2,6)) !!}
    {!! Form::radio_('active_sub', 'active_sub', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}
	
{!! Html_::closeFieldset() !!}

{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_submenu'))) !!}
    {!! Form::textArea_ck('content_sub', 'content_sub', trans('placeholder.basic'), trans('title.textarea_content_submenu'), 1, $errors, array(14)) !!}
{!! Html_::closeFieldset() !!}