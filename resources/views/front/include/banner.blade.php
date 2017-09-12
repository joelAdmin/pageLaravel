<!-- comentedo
	<style type="text/css" media="screen">
		@import "{{asset('/libs/lof_jquery/css/style2.css') }}";
	</style>
	<div id="" class="lof-slidecontent modal_galeria" style="width:960px; height:340px;">
	<div class="preload">
		<div></div>
	</div>
	<div  class="button-previous"></div>
	
		<div class="main-slider-content" style="width:960px; height:340px;">
			<ul class="sliders-wrap-inner">
			</ul>  	
		</div>
	
	
	<div class="navigator-content">
		<div class="navigator-wrapper">
			<ul class="navigator-wrap-inner">
				<li>
					<div>
					    <img id="imagen_min" src="" width="70px" height="25px"/>
					    <h3 id="titulo_min" > Misi&oacute;n </h3>
					    <span></span>
					</div>    
				</li>
			</ul>
		</div>
	</div> 
	</div> 
-->
<?php
	$imagen1= array('imagen'=> asset('libs/lof_jquery/images/camaguan900x340_01.png'), 'titulo'=>'Jornada en Camaguan', 'html'=>'Jornada de orientación jurídica en el Municipio Esteros de Camaguan, el 18 de Febrero de 2016.');
	
	$imagen2= array('imagen'=>'libs/lof_jquery/images/clegl_980x340_02_.png', 'titulo'=>'Historia', 'html'=>'La Procuraduría General del Estado Bolivariano de Guárico, está situada en la Ciudad de San Juan de los Morros; no se ha logrado ubicar la fecha en que fue creada, pero se localiza en las Gacetas Oficiales de vieja data ...<a class=\"font_submenu\" id=\"submenu_2\" href=\"#\" onclick=\"mostrarContenidoAjax(this.id);\"><i class=\"fa fa-plus fa-fw\"></i>Mas</a>');

	$imagen3= array('imagen'=>'libs/lof_jquery/images/ALTAGRACIA.png', 'titulo'=>'Jornada en  Altagracia.', 'html'=>'Personal de la Procuraduría General del Edo. Bolivariano de Guárico participó en la Jornada de Asesoramiento Jurídico Integral realizada en la ciudad de Altagracia de Orituco el  17 de marzo de 2016 .');

	$imagen5= array('imagen'=>'libs/lof_jquery/images/obama_980x340_03_.png', 'titulo'=>'Historia', 'html'=>'Ser un organismo estructural de cara al futuro sujeto a las nuevas técnicas, mecanismos y procedimientos, en donde se agrupe a un personal altamente capacitado.');

	$imagen6= array('imagen'=>'libs/lof_jquery/images/milicia01.png', 'titulo'=>'Participación del ejercicio militar.', 'html'=>'El personal acudió durante los dos fines de semanas pasados, tanto Directivos como empleados y obreros asistieron a la capacitación y formación militar ...<a class=\"font_submenu\" id=\"submenu_2\" href=\"index.php?controlador=Noticia&accion=leerMas&dato=9\" onclick=\"#\"><i class=\"fa fa-plus fa-fw\"></i>Mas</a>');
		
	$arregloImagen = array($imagen1, $imagen2, $imagen3, /* $imagen4,  $imagen5, */ $imagen6);
	
?>
<?php 
	$i=0; 
	$count = $banners->count();
	$arreglo =array();
?>
@foreach($banners as $banner)
	
	@if($i < $count)
		<?php
			$html = $banner->content_ban;
			array_push($arreglo, array('imagen'=>asset('/storage/banner/images/'.$banner->url_ban.''), 'titulo'=>$banner->title_ban, 'html'=>$html));
		?>
	@endif
@endforeach

{!! Html::banner('id_banner', 960, 340, $arreglo, 'easeInOutExpo', 1) !!}
               