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

{!! Html::banner_01('jslidernews1', 960, 340, $arreglo, 'easeInOutExpo', 1) !!}
               