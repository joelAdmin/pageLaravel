@if(isset($banner))
	{!! Form::model($banner, ["id"=>"form_update_banner", "class"=>"form-horizontal", 'method' => 'PUT', 'route' => ['banner.update', $banner->id_Ban], 'files' => 'true']) !!}
		{!! Form::hidden('id_Ban', $banner->id_Ban) !!}
		
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newBanner'))) !!}
			{!! Form::text_('U_title_ban', 'title_ban', trans('label.title'), trans('placeholder.basic'), trans('title.input_title'), 1, $errors, array(2,6)) !!}
			
			{!! Form::radio_('U_status_ban', 'status_ban', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}	                       
			{!! Form::file_('U_url_ban', 'url_ban', trans('label.image'), trans('placeholder.basic'), trans('title.input_image'), 1, $errors, array(4,5), $image) !!}
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_banner'))) !!}
		    {!! Form::textArea_ck('U_content_ban', 'content_ban', trans('placeholder.basic'), trans('title.textarea_content_ban'), 1, $errors, array(14)) !!}
		{!! Html_::closeFieldset() !!}
		<div class="form-group">
            <div class="col-lg-3">
                <button id="btn_update_banner" class="btn btn-success">Actualizar</button>
            </div>
        </div>
	{!! Form::close() !!}
@endif

<script type="text/javascript">
		$("#btn_update_banner").click(function()
		{	
			document.getElementById('U_content_ban').value = CKEDITOR.instances.U_content_ban.getData();
			var formData = new FormData($('#form_update_banner')[0]);
			$('.loading').show();
			$.ajax({
				type: "POST",
				url:'/postUpdateBanner',
				//async: false,
				data:  formData,
		    	mimeType:"multipart/form-data",
		    	contentType: false,
        		cache: false,
        		processData:false,
				success: function(data)
				{
				    alert(data);
				    var html = '';
				   	var data = eval('(' + data + ')');
				    if(data.fail)
					{
				    	$('#form_update_banner').find(':input').each(function ()	
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
				    {
				    	if(data.success) 
				    	{
				    		$('#form_update_banner').find(':input').each(function ()	
							{
				    			var index_name = $(this).attr('name');
				    			$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
								$("#span_U_" + index_name + "").empty();
				    		});
				    		html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    		//$('#author_not'+data.tr_id).html($('#U_author_not').val());
				    		$('#title_ban'+data.tr_id).html($('#U_title_ban').val());
				    		$('#content_ban'+data.tr_id).html($('#U_content_ban').val());
				    		$("#message").html(html);
				    	}	
				    }
				    $('.loading').hide();
				}
			});
			return false;
		});

</script>