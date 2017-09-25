@extends('base_admin')
@section('container')
	<div class="row">
  		<div class="col-lg-12">
    		<div id="contenedor" class="">
      			<div role="tabpanel" class="">
         		  <!-- Nav tabs -->
		          <ul class="nav nav-tabs" role="tablist">
		            <li role="presentation" class="active"><a href="#new" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-plus fa-fw"></i> {{trans('label.new_user')}}</a></li>
		            <li role="presentation" class=""><a  href="#manager" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-cogs fa-fw"></i> {{trans('label.manager_user')}}</a></li>
		          </ul>
          		  <!-- Tab panes  @include('message.messageInfo') @include('message.messageDanger')-->
          		   <div class="tab-content panel panel-default legend">
	            		<div role="tabpanel" class="tab-pane fade in active" id="new">
	              			<div class="panel-body">	                  			
	                  			{!! Html_::menssage('fa-info-circle') !!}
								{!! Form::open(['url' => '/newUser', 'id' => 'user_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
	                  			 	@include('back.form.newUser')
	                  			 	{!! Form::submit(trans('button.submit'), ['id' => 'submitFormBanner', 'title' => 'enviar formulario', 'class' => 'btn col-md-2 btn-info']) !!} 
	                  			{!! Form::close() !!}
	 						</div>
	            		</div>

	            		<!-- segundo tab -->
            			<div role="tabpanel" class="tab-pane fade" id="manager">
              				<div class="panel-body">
              					<div id="menssage_deleted"></div>
			                   {!! Form_::form('search', 'form-inline nav-bar-form nav-bar-left pull-right', 'GET', '/searchBanner', null) !!}
			                     <div class="form-group">
			                        {!! Form_::text_('text_search', 'search', trans('placeholder.input_search'), trans('title.input_search'), null, 'text') !!}
			                     </div>
			                     <div class="form-group">
			                        {!! Form_::select_('id_column', 'column', trans('placeholder.select_search'), trans('title.select_search'), null, array('title_ban'=>trans('label.title'), 'content_ban'=>trans('label.content')), null )!!}
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
      			{!! Html_::modalFieldset('modal_edit', 'col-md-12 col-md-offset-1', array("fa-pencil", trans('label.info_content_banner')), false) !!}
      				<div id="message"></div>
      				<div id="cont_modal_fieldset">

      				</div>
      			{!! Html_::closeModalFieldset() !!}
    		</div>
  		</div>
	</div>
 
@endsection

@section('script')
	
@endsection