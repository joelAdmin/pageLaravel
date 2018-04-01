@extends('base_admin')
@section('container')
	<div class="row">
  		<div class="col-lg-12">
    		<div id="contenedor" class="">
      			<div role="tabpanel" class="">
         		  <!-- Nav tabs -->
		          <ul class="nav nav-tabs" role="tablist">
		            <li role="presentation" class="active"><a href="#new" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-plus fa-fw"></i> {{trans('label.new_permission')}}</a></li>
		            <li role="presentation" class=""><a  href="#manager" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-cogs fa-fw"></i> {{trans('label.manager_permission')}}</a></li>
		          </ul>
          		  <!-- Tab panes  @include('message.messageInfo') @include('message.messageDanger')-->
          		   <div class="tab-content panel panel-default legend">
	            		<div role="tabpanel" class="tab-pane fade in active" id="new">
	              			<div class="panel-body">	                  			
	                  			{!! Html_::menssage('fa-info-circle') !!}
								{!! Form::open(['url' => '/newPermission', 'id' => 'permission_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
	                  			 	@include('back.form.newPermission')
	                  			 	{!! Form::submit(trans('button.submit'), ['id' =>'submitFormBanner', 'title' => 'enviar datos', 'class' => 'btn col-md-2 btn-info']) !!} 
	                  			{!! Form::close() !!}
	 						</div>
	            		</div>

	            		<!-- segundo tab -->
            			<div role="tabpanel" class="tab-pane fade" id="manager">
              				<div class="panel-body">
              					<div id="menssage_deleted"></div>
			                   {!! Form_::form('search', 'form-inline nav-bar-form nav-bar-left pull-right', 'GET', '/searchPermission', null) !!}
			                     <div class="form-group">
			                        {!! Form_::text_('text_search', 'search', trans('placeholder.input_search'), trans('title.input_search'), null, 'text') !!}
			                     </div>
			                     <div class="form-group">
			                        {!! Form_::select_('id_column', 'column', trans('placeholder.select_search'), trans('title.select_search'), null, array('name'=>trans('label.permission')), null )!!}
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
      			{!! Html::div_modal('modalShow', null) !!}
      			{!! Html_::modalFieldset('modal_edit', 'col-md-12 col-md-offset-1', array("fa-info", trans('label.info_content_permission')), false) !!}
      				<div id="message"></div>
      				<div id="cont_modal_fieldset">
      					
      				</div>
      			{!! Html_::closeModalFieldset() !!}
    		</div>
  		</div>
	</div>
 
@endsection

@section('script')
	<script type="text/javascript">
	    $(document).ready(function () 
	    {	       
	        ajaxLoad('/getTablePermission', 'cont_table');
	    });

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

		

		$("#btn_search").click(function()
		{	
			$('.loading').show(); 
			$.ajax({
				type: "GET",
				url:'/searchPermission',
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