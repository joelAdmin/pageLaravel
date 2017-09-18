<br/><h4 class="tituloH4"><b><i class="fa fa-rss fa-fw"></i>{{trans('label.notice')}}<hr></b></h4>
<article class="holder_gallery">
        <a class="photo_hover2" href="#">
        	<img class="img-thumbnail" src="{{ asset('/storage/notice/images') }}/{{$notice->name_img}}"  height="311" width="583" title="{{$notice->title_not}}"  alt="{{trans('label.image_not')}}" />
        </a><br/>               
    	<a title="{{$notice->title_not}}" href="#"><h4>{{$notice->title_not}}: </h4></a>
    	<a  title="{{$notice->subtitle_not}}" href="#"><p id="subtitulo">{{$notice->subtitle_not}}: </p></a>
    	<p>{!! $notice->content_not !!}</p>
    	<p id="fechaPublicacion"><b>Publicado por:</b> {{$notice->author_not}} <spam class="fecha">Fecha:2015-04-05</spam></p>	
    	<div class="col-md-12 text-right">
		    <ul class="social-network social-circle">
		    
		        <!-- <li><a href="#" class="icoRss a_background" title="Rss"><i class="fa fa-rss"></i></a></li>-->
		         <li><a href="https://www.facebook.com/dialog/feed?app_id=1138384066293526&amp;display=popup&amp;name=Titulo%20del%20post&amp;caption=Un%20texto%20de%20ejemplo&amp;link=http:pagina.dev/readMore/1&amp;redirect_uri=http:pgebg.guarico.gob.ve/&amp;picture={{ asset('/storage/notice/images') }}/{{$notice->name_img}}" class="icoFacebook a_background" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		         <li><a href="#" class="icoTwitter a_background" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		         <li><a href="#" class="icoGoogle a_background" title="Google +"><i class="fa fa-google-plus"></i></a></li>
		         <!--<li><a href="#" class="icoLinkedin a_background" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
		    </ul>       
		</div>
    	<span class="more"><a TITLE="{{ trans('title.read_back') }}" href="index.php"><font size="2"><i class="fa fa-reply fa-2"></i>{{ trans('label.back') }}</font></a></span>	
</article>