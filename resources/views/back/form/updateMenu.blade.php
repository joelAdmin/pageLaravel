@if(isset($menu))
	{!! Form::model($menu, ["id"=>"form_update_menu", "class"=>"form-horizontal", 'method' => 'PUT', 'route' => ['menu.update', $menu->id_Men]]) !!}
		{!! Form::hidden('id_Men', $menu->id_Men) !!}
		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_newMenu'))) !!}
			{!! Form::text_('U_etiqueta_men', 'etiqueta_men', trans('label.etiqueta'), trans('placeholder.basic'), trans('title.input_etiqueta'), 1, $errors, array(2,6)) !!}
			{!! Form::text_('U_url_men', 'url_men', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_menu'), null, $errors, array(2,6)) !!}
			{!! Form::text_('U_event_men', 'event_men', trans('label.event'), trans('placeholder.basic'), trans('title.input_event'), null, $errors, array(2,6)) !!}
			                        
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_position_menu'))) !!}
			
			{!! Form::text_('U_class_men', 'class_men', trans('label.class_css'), trans('placeholder.basic'), trans('title.input_class_css'), null, $errors, array(2,6)) !!}
			{!! Form::radio_('U_position', 'position', trans('label.position'), trans('title.check_position'), array(1=>trans('label.option0_position'), 2=>trans('label.option1_position')), 1, $errors, array(2,6) )!!}
			{!! Form::select_('U_get_menu', 'get_menu', trans('label.menu'), trans('placeholder.select'), trans('title.select_menu'), $menus, null, null, $errors, array(2,6)) !!}
		    {!! Form::radio_('U_active_men', 'active_men', trans('label.active'), trans('title.check_active'), array(1=>trans('label.option0_active'), 0=>trans('label.option1_active')), 1, $errors, array(2,6) )!!}
			
		{!! Html_::closeFieldset() !!}

		{!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_content_menu'))) !!}
		    {!! Form::textArea_ck('U_content_men', 'content_men', trans('placeholder.basic'), trans('title.textarea_content_menu'), 1, $errors, array(14)) !!}
		{!! Html_::closeFieldset() !!}
		<div class="form-group">
            <div class="col-lg-3">
                <button id="btn_update_menu" class="btn btn-success">Actualizar</button>
            </div>
        </div>
	{!! Form::close() !!}
@endif
<script type="text/javascript">
$(document).ready( function()
{
	$("#btn_update_menu").click(function()
	{
		document.getElementById('U_content_men').value = CKEDITOR.instances.U_content_men.getData();
		$.ajax({

				type: "POST",
				url:'/postUpdateMenu',
				data:  $('#form_update_menu').serialize(),
				success: function(data)
				{
				    //alert(+'AQUI:'+data);
				    var html = '';
				   	//var data = eval('(' + data + ')'); cuando se una la funcion serialize() no es necesario usar eval()
				    if(data.fail)
					{
				    	//alert('ENTRO2:');
				    	$('#form_update_menu').find(':input').each(function ()	
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
				    	alert('LOS DATOS FUERON GUARDADOS CORRECTAMENTE');
				    	$('#form_update_menu').find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    	
				    		$('#etiqueta_men'+data.tr_id).html($('#U_etiqueta_men').val());
				    		$('#url_men'+data.tr_id).html($('#U_url_men').val());
				    		$('#event_men'+data.tr_id).html($('#U_event_men').val());
				    		$("#message").html(html);	
				    } 
				}
			});
		return false;
	});

});
</script>