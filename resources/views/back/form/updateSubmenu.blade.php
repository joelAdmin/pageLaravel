@if(isset($submenu))
	{!! Form::model($submenu, ["id"=>"form_update_submenu", "class"=>"form-horizontal", 'method' => 'PUT', 'route' => ['submenu.update', $submenu->id_Sub]]) !!}
		{!! Form::hidden('id_Sub', $submenu->id_Sub) !!}
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newSubmenu'))) !!}
			{!! Form::select_('U_get_menu', 'id_men', trans('label.menu'), trans('placeholder.select'), trans('title.select_menu'), $menus, null, 1, $errors, array(2,6)) !!}
			{!! Form::text_('U_etiqueta_sub', 'etiqueta_sub', trans('label.etiqueta'), trans('placeholder.basic'), trans('title.input_etiqueta'), 1, $errors, array(2,6)) !!}
			{!! Form::text_('U_url_sub', 'url_sub', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_submenu'), null, $errors, array(2,6)) !!}
			{!! Form::text_('U_event_sub', 'event_sub', trans('label.event'), trans('placeholder.basic'), trans('title.input_event'), null, $errors, array(2,6)) !!}
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_position_submenu'))) !!}
			{!! Form::text_('U_class_sub', 'class_sub', trans('label.class_css'), trans('placeholder.basic'), trans('title.input_class_css'), null, $errors, array(2,6)) !!}
			{!! Form::radio_('U_position', 'position', trans('label.position'), trans('title.check_position'), array(1=>trans('label.option0_position'), 2=>trans('label.option1_position')), 1, $errors, array(2,6) )!!}
			{!! Form::select_('U_get_submenu', 'get_submenu', trans('label.submenu'), trans('placeholder.select'), trans('title.select_submenu'), array(), null, null, $errors, array(2,6)) !!}
		    {!! Form::radio_('U_active_sub', 'active_sub', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_submenu'))) !!}
		    {!! Form::textArea_ck('U_content_sub', 'content_sub', trans('placeholder.basic'), trans('title.textarea_content_submenu'), 1, $errors, array(14)) !!}
		{!! Html_::closeFieldset() !!}

		<div class="form-group">
            <div class="col-lg-3">
                <button id="btn_update_submenu" class="btn btn-success">Actualizar</button>
            </div>
    	</div>
	{!! Form::close() !!}
@endif
<script type="text/javascript">
	$(document).ready( function()
	{
		function loadSubmenu()
		{
			//colocar un load aqui
			var id_Men = $('#U_get_menu').val();
		
			$.ajax({
				type: "GET",
				url:'/getSubmenu/'+parseInt(id_Men),
				dataType: "json",
				success: function(data)
				{
				    var html = '';
				    if (data.submenus != null ) 
				    {
				    	html += '<option value="">Seleccionar aqui ....</option>';
				    	$.each(data, function(i,v)
				    	{
				    		data2 = eval('(' + data[i] + ')');
							$.each(data2, function(j,n)
				    		{
				    			num = parseInt(j);
								html += '<option value="'+num+'">'+data2[j]+'</option>';
				    		});
				    	});
				    	$("#U_get_submenu").html(html);
				    }else
				    {
				    	html += '<option value="">No hay resultados ....</option>';
				    	$("#U_get_submenu").html(html);
				    }
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			});

		}
		loadSubmenu();
		$('#U_get_menu').change(function()
		{
			loadSubmenu();
		});

		$('#btn_update_submenu').click( function()
		{
			document.getElementById('U_content_sub').value = CKEDITOR.instances.U_content_sub.getData();
			$.ajax({
				type: 'POST',
				url: '/postUpdateSubmenu',
				data: $('#form_update_submenu').serialize(),
				success: function(data)
				{
					var html = '';
					if(data.fail)
					{
						$('#form_update_submenu').find(':input').each(function ()	
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
						alert('LOS DATOS FUERON GUARDADOS CORRECTAMENTE');
				    	$('#form_update_submenu').find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    	
				    		$('#etiqueta_sub'+data.tr_id).html($('#U_etiqueta_sub').val());
				    		$('#url_sub'+data.tr_id).html($('#U_url_sub').val());
				    		$('#event_sub'+data.tr_id).html($('#U_event_sub').val());
				    		$("#message").html(html);
					}
				}
			});
			return false;
		});
	});
</script>