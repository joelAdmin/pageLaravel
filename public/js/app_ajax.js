function clear_form(form_name)
{
  $("#"+form_name+"").find(':input').each(function() 
  {
    var elemento = this;
    $('#'+elemento.id+'').val('');
    });
}

function ajaxLoad(filename, cont_table) 
{ 
	cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
	$('.loading').show(); 
	//alert(filename+'*'+cont_table);
	$.ajax({ 
		type: "GET", 
		url: filename, 
		contentType: false, 
		success: function (data) 
		{ 
			$("#" + cont_table).html(data); 
			$('.loading').hide(); 
		},
		error: function (xhr, status, error) 
		{ 
			alert(xhr.responseText); 
		} 
	}); 
}

function send_form_put(btn_submit, url, form, id)
{
	$('#'+btn_submit).click(function()
	{
		$.ajax({

				type: "PUT",
				url:url,
				data:  $('#'+form).serialize(),
				success: function(data)
				{
				    var html = '';
				    if(data.fail)
					{
				    	
				    	$('#'+form).find(':input').each(function ()	
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
				    	$('#'+form).find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    	
				    	$('#'+form).find(':input').each(function ()	
						{ 
							var index_name = $(this).attr('name');
				    		$('#'+index_name+data.tr_id).html($('#U_'+index_name).val());
				    		
				    	});
				    	
				    	$('#'+id).html(html);
				    	//clear_form(form);	
				    } 
				}
			});
		return false;
	});
}

function send_form_post(btn_submit, url, form, id)
{
	$('#'+btn_submit).click(function()
	{
		$.ajax({

				type: "POST",
				url:url,
				data:  $('#'+form).serialize(),
				success: function(data)
				{
				    var html = '';
				    if(data.fail)
					{
				    	
				    	$('#'+form).find(':input').each(function ()	
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
				    	$('#'+form).find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	html += '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>  '+data.message+'</div>';
				    	
				    	$('#'+form).find(':input').each(function ()	
						{ 
							var index_name = $(this).attr('name');
				    		$('#'+index_name+data.tr_id).html($('#U_'+index_name).val());
				    		
				    	});
				    	
				    	$('#'+id).html(html);
				    	//clear_form(form);	
				    } 
				}
			});
		return false;
	});
}

function showSubmenuAjax(url)
{
	//ajaxLoad(url, 'contenido');
	alert('scc');
}

function ajaxRemove(id, id_deleted, url)
{
			$('.loading').show();
			$.ajax({ 
				type: "GET", 
				url: url, 
				contentType: false, 
				success: function (data) 
				{ 
					if(data.success)
					{
						//alert(data.tr_id);	
						$('#bs-callout-'+data.id).hide(500, 'linear');
						html = '<div class="alert alert-success alert-dismissable"><i class="fa fa-check-circle-o">';
						html += '</i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link">';
						html += '</a><i class="fa fa-comments"></i> '+data.message+'';
						
						
						html += '</div>';
						$("#menssage_deleted").html(html);
						$("#menssage_deleted").show(500, 'linear');
						$("#"+id_deleted+"").modal("hide");
						//alert(data.id); 
						$("#"+data.id+"").modal("hide"); 
						$('.loading').hide();
					} 
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			});
}

function getModal(url)
{
	$(document).ready(function () 
	{	
		$("#message").html('');
		ajaxLoad(url, 'content_modal');
		$("#modalShow").modal("show");
	});
}

function ajaxDeleted(id, id_deleted, url)
{
			$('.loading').show();
			$.ajax({ 
				type: "GET", 
				url: url, 
				contentType: false, 
				success: function (data) 
				{ 
					if(data.success)
					{
						//alert(data.tr_id);	
						$('#tr_'+data.tr_id).hide(500, 'linear');
						html = '<div class="alert alert-warning alert-dismissable"><i class="fa fa-check-circle-o">';
						html += '</i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link">';
						html += '</a> LOS DATOS FUERON ELIMINADOS CORRECTAMENTE,SI DESEA DESHACER EL CAMBIO ';
						//html += '<a href="/restoreNotice/'+id+'">CLICK AQUI</a>';
						html += '<a href="#" onclick="restore('+id+');" >CLICK AQUI</a>';
						html += '</div>';
						$("#menssage_deleted").html(html);
						$("#menssage_deleted").show(500, 'linear');
						$("#"+id_deleted+"").modal("hide"); 
						$('.loading').hide();
					} 
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			});
}

/*
function ajaxAssignPermission(url, cont_table)
{
		
		//$("#message").html('');
		cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
		$('.loading').show(); 
		//alert(filename+'*'+cont_table);
		$.ajax({ 
			type: "GET", 
			url: url, 
			contentType: false, 
			success: function (data) 
			{ 
				$("#" + cont_table).html(data.html); 
				$('.loading').hide(); 
			},
			error: function (xhr, status, error) 
			{ 
				alert(xhr.responseText); 
			} 
		}); 
		//$("#modalShow").modal("show");
	
}*/

function confirmDeleted(id)
{
	$(document).ready(function () 
	{	
		$("#"+id+"").modal("show");
	});
}

function confirmRemove(id)
{
	$(document).ready(function () 
	{	
		$("#"+id+"").modal("show");
	});
}

function send_form_assign_permission(btn_submit, url, form)
{
	$('#'+btn_submit).click(function()
	{
		$.ajax({

				type: "POST",
				url:url,
				data:  $('#'+form).serialize(),
				success: function(data)
				{
				    var html = '';
				    if(data.fail)
					{
				    	
				    	$('#'+form).find(':input').each(function ()	
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
				    	
				    	$('#'+form).find(':input').each(function ()	
						{
				    		var index_name = $(this).attr('name');
				    		$("#div_U_" + index_name + "").removeClass("has-error has-feedback alert alert-danger"); 
							$("#span_U_" + index_name + "").empty();
				    	});
				    	
				    	$("#modalShow").modal("hide");
				    	//alert('LOS DATOS FUERON GUARDADOS CORRECTAMENTE');
				    	$('#addRole-'+data.id).html(data.html);//muestro la informacion en div
				    	$('#addRole-'+data.id).attr("id","text"); //le cambio el nombre al div para luego crear otro con el mismo nombre
				    	
				    	$('#add').attr("id","addRole-"+data.id);
				    	clear_form(form);	
				    } 
				}
			});
		return false;
	});
}