<h4 class="tituloH4"><b><i class="fa fa-rss fa-fw"></i> Noticias<hr></b></h4>
 <div class="panel-body">Total de registro <b>{{$notices->total()}}</b> Pag <b>{{$notices->currentPage()}}</b> de <b></b><br></div>

@foreach($notices as $notice)
	<article class="holder_gallery">
        <a class="photo_hover2" href="#">
        	<img class="zoom" src="{{ asset('/storage/notice/images') }}/{{$notice->name_img}}"  height="111" width="183" title="{{$notice->title_not}}"  alt="IMAGEN NO DISPONIBLE" />
        </a>               
    	<a title="{{$notice->title_not}}" href="#"><h4>{{$notice->title_not}}: </h4></a>
    	<a  title="{{$notice->subtitle_not}}" href="#"><p id="subtitulo">{{$notice->subtitle_not}}: </p></a>
    	<p>{!! $notice->inlet_not !!}</p>
		<span class="more"><a TITLE="Leer la noticia completa" href="index.php?controlador=Noticia&accion=leerMas&dato='.$id_noticias.'"><i class="fa fa-plus fa-fw"></i> Leer mas </a></span>
    </article>
@endforeach
<div class="pull-right">{!! str_replace('/?','?',$notices->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>