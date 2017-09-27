@if(isset($user))
	{!! Form::model($user, ["id"=>"form_update_user", "class"=>"form-horizontal", 'method' => 'PUT', 'route' => ['user.update', $user->id], 'files' => 'false']) !!}
		{!! Form::hidden('id', $user->id) !!}
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newUser'))) !!}
			{!! Form::text_('U_name', 'name', trans('label.last_name'), trans('placeholder.basic'), trans('title.input_name'), null, $errors, array(2,6)) !!}
			{!! Form::text_('U_email', 'email', trans('label.email'), trans('placeholder.basic'), trans('title.input_email'), true, $errors, array(2,6)) !!}
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_count'))) !!}
			{!! Form::text_('U_user', 'user', trans('label.user'), trans('placeholder.basic'), trans('title.input_user'), null, $errors, array(2,4)) !!}
			{!! Form::select_('U_type', 'type', trans('label.type'), trans('placeholder.select'), trans('title.select_type_user'), array('user' => 'usuario', 'admin' => 'administrador'), null, 1, $errors, array(2,4)) !!}
		{!! Html_::closeFieldset() !!}

		<div class="form-group">
            <div class="col-lg-3">
                <button id="btn_update_user" class="btn btn-success">{{ trans('label.update') }}</button>
            </div>
        </div>
	{!! Form::close() !!}
@endif

<script type="text/javascript">
		$("#btn_update_user").click(function()
		{	
			$('.loading').show();
			$.ajax({
				type: "POST",
				url:'/postUpdateUser',
				data: $('#form_update_user').serialize(),
				success: function(data)
				{
				    var html = '';
				    if(data.fail)
					{
				    	$('#form_update_user').find(':input').each(function ()	
						{ 
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
				    		$('#form_update_user').find(':input').each(function ()	
							{
				    			var index_name = $(this).attr('name');
				    			$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
								$("#span_U_" + index_name + "").empty();
				    		});
				    		html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    		$('#user'+data.tr_id).html($('#U_user').val());
				    		$('#email'+data.tr_id).html($('#U_email').val());
				    		$('#type'+data.tr_id).html($('#U_type').val());
				    		$("#message").html(html);
				    	}	
				    }
				    $('.loading').hide();
				}
			});
			return false;
		});
</script>