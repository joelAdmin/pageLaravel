 @extends('base_admin')

@section('container')
	<div class="row">
  		<div class="col-lg-12">
    		<div id="contenedor" class="">
      			<div role="tabpanel" class="">
         		  <!-- Nav tabs -->
		          <ul class="nav nav-tabs" role="tablist">
		            <li role="presentation" class="active"><a href="#new" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-plus fa-fw"></i> {{trans('label.new_submenu')}}</a></li>
		            <li role="presentation" class=""><a  href="#manager" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-cogs fa-fw"></i> {{trans('label.manager_submenu')}}</a></li>
		          </ul>
          		  <!-- Tab panes  @include('message.messageInfo') @include('message.messageDanger')-->
          		   <div class="tab-content panel panel-default legend">
	            		<div role="tabpanel" class="tab-pane fade in active" id="new">
	              			<div class="panel-body">
	                  			
	                  			{!! Html_::menssage('fa-info-circle') !!}
								{!! Form::open(['url' => '/newSubmenu', 'id' => 'submenu_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
	                  			 	@include('form.newSubmenu')
	                  			 	{!! Form::submit(trans('button.submit'), ['id' =>'submitFormSubmenu', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!} 
	                  			{!! Form::close() !!}
	 						</div>
	            		</div>

	            		<!-- segundo tab -->
            			<div role="tabpanel" class="tab-pane fade" id="manager">
              				<div class="panel-body">
			                   {!! Form_::form('search', 'form-inline nav-bar-form nav-bar-left pull-right', 'GET', '/searchSubmenu', null) !!}
			                     <div class="form-group">
			                        {!! Form_::text_('text_search', 'search', trans('placeholder.input_search'), trans('title.input_search'), null, 'text') !!}
			                     </div>
			                     <div class="form-group">
			                        {!! Form_::select_('id_column', 'column', trans('placeholder.select_search'), trans('title.select_search'), null, array('etiqueta_sub'=>trans('label.etiqueta'), 'position_sub'=>trans('label.position'), 'url_sub'=>trans('label.url'), 'event_sub'=>trans('label.event')), null )!!}
			                     </div>
			                     <div class="form-group">
			                         {!! Form_::btn_('btn_search',  'btn btn-info', 'fa-search', trans('label.search')) !!}
			                     </div><br>
			                   {!! Form_::closeForm()!!}
				                <div id="cont_table">
				                  
				                </div>
              				</div>
            			</div>
                   </div>
      			</div>
      			
      			{!! Html_::modalFieldset('modal_edit', 'col-md-12 col-md-offset-1', array("fa-pencil", trans('label.legend_edit_submenu')), false) !!}
      				<div id="message"></div>
      				<div id="cont_modal_fieldset">

      				</div>
      			{!! Html_::closeModalFieldset() !!}
    		</div>
  		</div>
	</div>
 
@endsection

@section('script')
	<script defer src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script> 
	<script defer src="{{ asset('/vendors/ckeditor/adapters/jquery.js') }}"></script>

	<script type="text/javascript">

		$('#get_menu').change(function()
		{
			//colocar un load aqui
			var id_Men = $(this).val();
		
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
				    	$("#get_submenu").html(html);
				    }else
				    {
				    	html += '<option value="">No hay resultados ....</option>';
				    	$("#get_submenu").html(html);
				    }
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			});

		});

	    $(document).ready(function () 
	    {
	        $('.ckeditor').ckeditor();
	        ajaxLoad('/getTableSubmenu', 'cont_table');
	    });

	    function edit(url)
		{
			$(document).ready(function () 
			{	
				$("#message").html('');
				ajaxLoad_ckEditor(url, 'cont_modal_fieldset');
				$("#modal_edit").modal("show");
			});
		}

		function ajaxLoad_ckEditor(filename, cont_table) 
		{ 
			cont_table = typeof cont_table !== 'undefined' ? cont_table : 'cont_table'; 
			$('.loading').show(); 
			$.ajax({ 
				type: "GET", 
				url: filename, 
				contentType: false, 
				success: function (data) 
				{ 
					$("#" + cont_table).html(data); $('.loading').hide(); 
					//$.getScript("{{ asset('/vendors/ckeditor/adapters/jquery.js') }}")
					$('.ckeditor').ckeditor();
					
					//$('#div_img_U_url_image').html('<img src="..." alt="...222" class="img-thumbnail">');
					//$.getScript("{{asset('/vendors/ckeditor/ckeditor.js')}}");
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			}); 
		}

		$("#btn_search").click(function()
		{	
			$('.loading').show(); 
			$.ajax({
				type: "GET",
				url:'/searchSubmenu',
				//url:'/search',
				data: $("#search").serialize(), // Adjuntar los campos del formulario enviado.
				success: function(data)
				{
				    var html = ''
				    $("#cont_table").html(data); $('.loading').hide();// Mostrar la respuestas del script PHP.
				    // return false;
				},
				error: function (xhr, status, error) 
				{ 
					alert(xhr.responseText); 
				} 
			});
			//return false;
		});
	</script>	
@endsection