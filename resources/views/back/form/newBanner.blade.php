{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newBanner'))) !!}
	{!! Form::text_('title_ban', 'title_ban', trans('label.title'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
	
	{!! Form::radio_('status_ban', 'status_ban', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}	                       
	{!! Form::file_('url_ban', 'url_ban', trans('label.image'), trans('placeholder.basic'), trans('title.input_image'), 1, $errors, array(2,3)) !!}
{!! Html_::closeFieldset() !!}


{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_banner'))) !!}
    {!! Form::textArea_ck('content_ban', 'content_ban', trans('placeholder.basic'), trans('title.textarea_content_ban'), 1, $errors, array(14)) !!}
{!! Html_::closeFieldset() !!}