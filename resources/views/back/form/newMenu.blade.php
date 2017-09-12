{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newMenu'))) !!}
	{!! Form::text_('etiqueta_men', 'etiqueta_men', trans('label.etiqueta'), trans('placeholder.basic'), trans('title.input_etiqueta'), 1, $errors, array(2,6)) !!}
	{!! Form::text_('url_men', 'url_men', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_menu'), null, $errors, array(2,6)) !!}
	{!! Form::text_('event_men', 'event_men', trans('label.event'), trans('placeholder.basic'), trans('title.input_event'), null, $errors, array(2,6)) !!}
	                        
{!! Html_::closeFieldset() !!}

{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_position_menu'))) !!}
	
	{!! Form::text_('class_men', 'class_men', trans('label.class_css'), trans('placeholder.basic'), trans('title.input_class_css'), null, $errors, array(2,6)) !!}
	{!! Form::radio_('position', 'position', trans('label.position'), trans('title.check_position'), array(0=>trans('label.option0_position'), 1=>trans('label.option1_position')), 1, $errors, array(2,6) )!!}
	{!! Form::select_('get_menu', 'get_menu', trans('label.menu'), trans('placeholder.select'), trans('title.select_menu'), $menus, null, null, $errors, array(2,6)) !!}
    {!! Form::radio_('active_men', 'active_men', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}
	
{!! Html_::closeFieldset() !!}

{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_menu'))) !!}
    {!! Form::textArea_ck('content_men', 'content_men', trans('placeholder.basic'), trans('title.textarea_content_menu'), 1, $errors, array(14)) !!}
{!! Html_::closeFieldset() !!}

