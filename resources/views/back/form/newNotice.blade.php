  {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_soucer'))) !!}
		{!! Form::text_('author_not', 'author_not', trans('label.author'), trans('placeholder.basic'), trans('title.input_soucer'), 1, $errors, array(2,6)) !!}
		{!! Form::text_('source_not', 'source_not', trans('label.soucer'), trans('placeholder.basic'), trans('title.input_soucer'), null, $errors, array(2,6)) !!}
    {!! Form::text_('url_source_not', 'url_source_not', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_soucer'), null, $errors, array(2,6)) !!}
    {!! Form::select_('id_cat', 'id_cat', trans('label.category'), trans('placeholder.select'), trans('title.select_category'),  $category, null, 1, $errors, array(2,6)) !!}
    {!! Form::select_('id_sco', 'id_sco', trans('label.scope'), trans('placeholder.select'), trans('title.select_scope'),  $scope, null, 1, $errors, array(2,6)) !!}
    {!! Form::radio_('type_not', 'type_not', trans('label.type'), trans('title.check_type'), array('normal'=>trans('label.option0_type'), 'interest'=>trans('label.option1_type')), 1, $errors, array(2,6) )!!}
    {!! Form::radio_('estatus_not', 'estatus_not', trans('label.estatus'), trans('title.check_estatus'), array(1 => trans('label.option0_estatus'), 0 => trans('label.option1_estatus')), 1, $errors, array(2,6) )!!}                             
	{!! Html_::closeFieldset() !!}

  {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_notice'))) !!}
    {!! Form::text_('anteater_not', 'anteater_not', trans('label.anteater'), trans('placeholder.basic'), trans('title.input_anteater'), null, $errors, array(2,6)) !!}
    
    {!! Form::text_('title_not', 'title_not', trans('label.title'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
    {!! Form::text_('subtitle_not', 'subtitle_not', trans('label.subtitle'), trans('placeholder.basic'), trans('title.input_subtitle'), 1, $errors, array(2,6)) !!}
    {!! Form::file_('url_image', 'url_image', trans('label.image'), trans('placeholder.basic'), trans('title.input_image'), 1, $errors, array(2,3)) !!}

  {!! Html_::closeFieldset() !!}

  {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_inlet'))) !!}
    {!! Form::textArea_ck('inlet_not', 'inlet_not', trans('placeholder.basic'), trans('title.input_inlet'), 1, $errors, array(14)) !!}
  {!! Html_::closeFieldset() !!}

  {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_content'))) !!} 
    {!! Form::textArea_ck('content_not', 'content_not', trans('placeholder.basic'), trans('title.input_content'), 1, $errors, array(14)) !!}
  {!! Html_::closeFieldset() !!}  