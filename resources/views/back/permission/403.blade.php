@extends('base_admin')
@section('container')
	{!! Html_::modalFieldset('login', 'col-md-5 col-md-offset-4', array("fa-lock", trans('label.legend_login_403'))) !!}

		<div class="panel panel-body">
			<center><h1><img src="{{ asset('media/img/lock.png')}}" alt="Acceso denegado"></h1></center>
		   <div class="inner"><span class="corners-top"><span></span></span>
		 	
		   <div class="content">
		      <p>
		         <strong><i class="fa fa-ban"></i> ERROR 403:</strong> {{trans('label.legend_login_403')}} (<em>{{trans('label.info_login_403')}}.</em>).
		      </p>
		      <a href='/' class="btn btn-danger"><i class="fa fa-arrow-left"></i> {{trans('label.back')}}</a>
		   </div>

		   <span class="corners-bottom"><span></span></span></div>
		</div>
   {!! Html_::closeModalFieldset() !!}
@endsection