<br/><h4 class="tituloH4"><b><i class="fa fa-rss fa-fw"></i> {{trans('label.notices')}}<hr></b></h4>
 <!--<div class="panel-body">{{trans('label.total_reg')}} <b>{{$notices->total()}}</b> Pag <b>{{$notices->currentPage()}}</b> {{trans('label.of')}} <b></b><br></div>-->

@foreach($notices as $notice)
	<article class="holder_gallery">
        <a class="photo_hover2" href="#">
        	<img class="zoom" src="{{ asset('/storage/notice/images') }}/{{$notice->name_img}}"  height="121" width="199" title="{{$notice->title_not}}"  alt="{{trans('label.image_not')}}" />
        </a>               
    	<a title="{{$notice->title_not}}" href="#"><h4>{{$notice->title_not}}: </h4></a>
    	<a  title="{{$notice->subtitle_not}}" href="#"><p id="subtitulo">{{$notice->subtitle_not}}: </p></a>
    	<p>{!! $notice->inlet_not !!}</p>
    	<div class="col-md-12 text-right">
		    <ul class="social-network social-circle">
		        <!-- <li><a href="#" class="icoRss a_background" title="Rss"><i class="fa fa-rss"></i></a></li>-->
		         <li><a href="#" class="icoFacebook a_background" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		         <li><a href="#" class="icoTwitter a_background" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		         <li><a href="#" class="icoGoogle a_background" title="Google +"><i class="fa fa-google-plus"></i></a></li>
		         <!--<li><a href="#" class="icoLinkedin a_background" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
		    </ul>       
		</div>
		<span class="more"><a TITLE="{{ trans('title.read_more') }}" href="#" onclick='showAjax("/readMore/{{$notice->id_Not}}");' ><font size="2"><i class="fa fa-plus fa-2"></i> {{ trans('label.read_more') }}</font></a></span>
    </article>
@endforeach
<div class="pull-right">{!! str_replace('/?','?',$notices->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>