@if(isset($notice))

	{!! Form::model($notice, ["id"=>"form_edit_notice", "class"=>"form-horizontal", 'method' => 'PUT', 'route' => ['notice.update', $notice->id_Not], 'files' => 'true']) !!}
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_soucer'))) !!} 
			{!! Form::hidden('id_Not', $notice->id_Not) !!}
			{!! Form::text_('U_author_not', 'author_not', trans('label.author'), trans('placeholder.basic'), trans('title.input_soucer'), 1, $errors, array(2,6)) !!}
			{!! Form::text_('U_source_not', 'source_not', trans('label.soucer'), trans('placeholder.basic'), trans('title.input_soucer'), null, $errors, array(2,6)) !!}
	    	{!! Form::text_('U_url_source_not', 'url_source_not', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_soucer'), null, $errors, array(2,6)) !!}
	    	{!! Form::select_('U_id_cat', 'id_cat', trans('label.category'), trans('placeholder.select'), trans('title.select_category'),  $category, null, 1, $errors, array(2,6)) !!}
	    	{!! Form::select_('U_id_sco', 'id_sco', trans('label.scope'), trans('placeholder.select'), trans('title.select_scope'),  $scope, null, 1, $errors, array(2,6)) !!}
	    	{!! Form::radio_('U_type_not', 'type_not', trans('label.type'), trans('title.check_type'), array('normal'=>trans('label.option0_type'), 'interest'=>trans('label.option1_type')), 1, $errors, array(2,6) )!!}
	    	{!! Form::radio_('U_estatus_not', 'estatus_not', trans('label.estatus'), trans('title.check_estatus'), array(1 => trans('label.option0_estatus'), 0 => trans('label.option1_estatus')), 1, $errors, array(2,6) )!!}                             
		{!! Html_::closeFieldset() !!}

	  	{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_notice'))) !!}
		    {!! Form::text_('U_anteater_not', 'anteater_not', trans('label.anteater'), trans('placeholder.basic'), trans('title.input_anteater'), null, $errors, array(2,6)) !!}
		    
		    {!! Form::text_('U_title_not', 'title_not', trans('label.title'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
		    {!! Form::text_('U_subtitle_not', 'subtitle_not', trans('label.subtitle'), trans('placeholder.basic'), trans('title.input_subtitle'), 1, $errors, array(2,6)) !!}
		    {!! Form::file_('U_url_image', 'url_image', trans('label.image'), trans('placeholder.basic'), trans('title.input_image'), null, $errors, array(2,5), $image) !!}

	  	{!! Html_::closeFieldset() !!}

	  	{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_inlet'))) !!}
	    	{!! Form::textArea_ck('U_inlet_not', 'inlet_not', trans('placeholder.basic'), trans('title.input_inlet'), 1, $errors, array(14)) !!}
	  	{!! Html_::closeFieldset() !!}

	  	{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_content'))) !!} 
	    	{!! Form::textArea_ck('U_content_not', 'content_not', trans('placeholder.basic'), trans('title.input_content'), 1, $errors, array(14)) !!}
	  	{!! Html_::closeFieldset() !!} 
		<div class="form-group">
                 <div class="col-lg-3">
                     <button id="btn_update_notice" class="btn btn-success">Actualizar</button>
                 </div>
            </div>
	{!! Form::close() !!}
@endif
<script type="text/javascript">
		
		$("#btn_update_notice").click(function()
		{	
			
			document.getElementById('U_inlet_not').value = CKEDITOR.instances.U_inlet_not.getData();
			document.getElementById('U_content_not').value = CKEDITOR.instances.U_content_not.getData();
			var formData = new FormData($('#form_edit_notice')[0]);
			//alert('AQUI:'+formData);
			$.ajax({
				type: "POST",
				url:'/postUpdate',
				//async: false,
				data:  formData,
		    	mimeType:"multipart/form-data",
		    	contentType: false,
        		cache: false,
        		processData:false,
				success: function(data)
				{
				    var html = '';
				   	var data = eval('(' + data + ')');
				    
				    if(data.fail)
					{
				    	$('#form_edit_notice').find(':input').each(function ()	
							{ 
								//var index_id = $(this).attr('id');
								//alert($(this).attr('name'));
								var index_name = $(this).attr('name');
								if(index_name in data.errors) 
								{ 
									$("#div_U_" + index_name + "").addClass("has-error has-feedback alert alert-danger");  
									$("#span_U_" + index_name + "").html(data.errors[index_name]); 
								}else
								{ 
									$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
									$("#span_U_" + index_name + "").empty(); 
								}
							});
				    }else
				    {alert(data.tr_id);
				    	$('#form_edit_notice').find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'+data.message+'</div>';
				    	$('#author_not'+data.tr_id).html($('#U_author_not').val());
				    	$('#title_not'+data.tr_id).html($('#U_title_not').val());
				    	$('#inlet_not'+data.tr_id).html($('#U_inlet_not').val());
				    	$("#message").html(html);
				    }
				   
				}
			});
			return false;
		});

</script>