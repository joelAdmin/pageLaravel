function showSubmenuAjax(url)
{
	ajaxLoad(url, 'contenido_interno');
	//alert(url);
}

function ajaxLoad(filename, cont_table) 
{ 
			cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
			
			$('.loading').show(); 
			$.ajax({ 
				type: "GET", 
				url: filename, 
				//contentType: false, 
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