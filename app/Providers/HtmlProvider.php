<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlBuilder as Html;
//use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Facades\Storage;

class HtmlProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Html::macro('datepicker', function()
        {

            $html = '
             <script type="text/javascript">
                        /* Inicialización en español para la extensión \'UI date picker\' para jQuery. */
            /* Traducido por Vester (xvester [en] gmail [punto] com). */
            jQuery(function($){
               $.datepicker.regional[\'es\'] = {
                  closeText: \'Cerrar\',
                  prevText: \'<Ant\',
                  nextText: \'Sig>\',
                  currentText: \'Hoy\',
                  monthNames: [\'Enero\', \'Febrero\', \'Marzo\', \'Abril\', \'Mayo\', \'Junio\', \'Julio\', \'Agosto\', \'Septiembre\', \'Octubre\', \'Noviembre\', \'Diciembre\'],
                  monthNamesShort: [\'Ene\',\'Feb\',\'Mar\',\'Abr\', \'May\',\'Jun\',\'Jul\',\'Ago\',\'Sep\', \'Oct\',\'Nov\',\'Dic\'],
                  dayNames: [\'Domingo\', \'Lunes\', \'Martes\', \'Miércoles\', \'Jueves\', \'Viernes\', \'Sábado\'],
                  dayNamesShort: [\'Dom\',\'Lun\',\'Mar\',\'Mié\',\'Juv\',\'Vie\',\'Sáb\'],
                  dayNamesMin: [\'Do\',\'Lu\',\'Ma\',\'Mi\',\'Ju\',\'Vi\',\'Sá\'],
                  weekHeader: \'Sm\',
                  dateFormat: \'dd/mm/yy\',
                  firstDay: 1,
                  isRTL: false,
                  showMonthAfterYear: false,
                  /*
                  option:true,
                  changeMonth: true,
                  changeYear: true,*/

                  yearSuffix: \'\'};
               $.datepicker.setDefaults($.datepicker.regional[\'es\']);
            });
            </script>
            <div id="calendario"></div>
      
            <script>
                $(function() {
                    $( "#calendario" ).datepicker({
                        dateFormat: \'dd/mm/yy\',
                        inline: true,
                        
                          \'option\': false});
                    });
            </script>';
            return $html;
        });

        Html::macro('div_modal', function($id, $modal=null)
        {
            if($modal == null) {$content = 'content_modal';}else{$content='content_modal-lg';}
            $html = '
                        <div style="display:None;" id="'.$id.'" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog '.$modal.'">
                                <div id="'.$content.'" class="modal-content">';      
           $html .= '</div>
                        </div>
                            </div>';
            return $html;
        });

         Html::macro('div_modal_fieldset', function($id, $modal=null, $label, $fa)//esta dando error en el diseño
        {
            if($modal == null) {$content = 'content_modal';}else{$content='content_modal-lg';}
            $html = '
                        <div style="display:None;" id="'.$id.'" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog '.$modal.'">
                                '; 

            $html .= '
                    <div class="panel-body">
                      <fieldset class="scheduler-border"><legend class="scheduler-border"><i class="'.$fa.'"></i> '.$label.'<button type="button" class="close" data-dismiss="modal">x</button></legend>
                        <div class="panel-body">
                        <div id="message"></div>
                          
                        
                          <div id="'.$content.'" class="modal-content">
            ';  

            $html .= '
                     
                        </div>
                            </fieldset>
                                </div>
                    ';

           $html .= '
                        </div>
                            </div>';
            return $html;
        });

         Html::macro('div_fieldset', function($id, $label, $fa)
        {
            
            $html = '
            <div class="panel-body">
              <fieldset id="'.$id.'" class="scheduler-border"><legend class="scheduler-border"><i class="'.$fa.'"></i> '.$label.'<button type="button" class="close" data-dismiss="modal">x</button></legend>
                <div class="panel-body">
                <div id="message"></div>
                  <div id="resul_modal_contact"></div>
                  <div id="cont_modal_contact">
            ';

            return $html;
        });

         Html::macro('close_div_fieldset', function()
        {
            
            $html = '
            </div> 
                </div>
                    </fieldset>
                        </div>
            ';

            return $html;
        });

        Html::macro('alert', function($id, $clas)
        {
            $html = '<div style="display:None;" id="'.$id.'" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="container">
                        <div class="row">
                          <div class="'.$clas.'">
                              <div class="panel panel-default">
                             
                               
                                    <div id="content_modal_alert" class="modal-content"></div>';

            $html .='
                            </div>
                                </div>
                                    </div>
                                        </div>
                                            </div>';

            return $html;
        });

        Html::macro('banner', function($id, $ancho, $alto, $arreglo, $efecto, $activar)
        {
            $html = '
                <style type="text/css" media="screen">
                    @import "'.asset('/libs/lof_jquery/css/style2.css').'";
                </style>
                <script type="text/javascript">
                    $(document).ready( function()
                    { 
                        var buttons = { 
                            previous:$("#'.$id.' .button-previous") ,
                            next:$("#'.$id.' .button-next") 
                        };
                        $("#'.$id.'").lofJSidernews( 
                        { 
                            interval:5000,
                            easing:"'.$efecto.'", //"easeOutBounce",
                            //direction:"opacity",
                            duration:1200,
                            auto:true,
                            mainWidth:980,
                            mainHeight:300,
                            navigatorHeight: 100,
                            navigatorWidth: 340,
                            maxItemDisplay:3,
                            buttons:buttons
                        });                     
                    });
                </script>
            ';
            $html .= '<!------------------------------------- THE CONTENT ------------------------------------------------->
                <div id="'.$id.'" class="lof-slidecontent modal_galeria" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <div class="preload"><div></div>
                </div>
                <div  class="button-previous">image null</div>
                    <!-- MAIN CONTENT --> 
                <div class="main-slider-content" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <ul class="sliders-wrap-inner">';
                        $long = count($arreglo);
                        $j=0;
                        foreach ($arreglo as $key => $value) 
                        {
                            if (is_array($value)) 
                            {
                                if ($j==$key) 
                                {
                                    //echo $j.'='.$key.'<br>';
                                    $html .= '
                                            <li>
                                                <img id="imagen'.$j.'" src="" title="imagen" >           
                                                <div class="slider-description">
                                                    <div class="slider-meta"><a target="_parent" title="logo" href="#Category-1" id="titulo'.$j.'">/ /</a> <i></i>
                                                    </div>
                                                    <h4></h4>
                                                    <p id="html'.$j.'"> 
                                                        <a class="readmore" href="#"></a>
                                                    </p>
                                                </div>
                                            </li>
                                        ';
                                    foreach ($value as $key2 => $value2) 
                                    {
                                        if($key2 == 'imagen') 
                                        {
                                            //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                            $html .= '<script type="text/javascript">$("#imagen'.$j.'").attr("src", "'.$value2.'");</script>';
                                        }elseif($key2=='titulo') 
                                        {
                                            $html .= '<script type="text/javascript">$("#titulo'.$j.'").text("'.$value2.'");</script>';
                                        }elseif($key2=='html') 
                                        {
                                           $html .= '<script type="text/javascript">
                                                        var text = "'.$value2.'"; 
                                                        text = text.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, "");
                                                        $("#html'.$j.'").html(text);
                                                    </script>
                                            '; 
                                        }
                                    }
                                }
                            }
                            $j++;
                        }
                        $html .= '
                    </ul>     
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
            ';
            if (!is_null($activar)) 
            {
                $html .= '
                    <div class="navigator-content">
                        <div class="navigator-wrapper">
                            <ul class="navigator-wrap-inner">';
                                $k=0;
                                foreach ($arreglo as $key => $value) 
                                {
                                    if (is_array($value)) 
                                    {
                        if ($k==$key) 
                        {
                            $html .= ' 
                                <li>
                                    <div>
                                        <img id="imagen_min'.$k.'" src="" width="70px" height="25px"/>
                                        <h3 id="titulo_min'.$k.'" > Misi&oacute;n </h3>
                                        <span></span>
                                    </div>    
                                </li>
                            ';
                            foreach ($value as $key2 => $value2) 
                            {
                                if ($key2 == 'imagen') 
                                {
                                    //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                    $html .= '<script type="text/javascript">$("#imagen_min'.$k.'").attr("src", "'.$value2.'");</script>';
                                }elseif ($key2=='titulo') 
                                {
                                    $html .= '<script type="text/javascript">$("#titulo_min'.$k.'").text("'.$value2.'");</script>';
                                }
                            }
                        }
                                    }
                                    $k++;
                                }
                                $html .= '     
                            </ul>
                        </div>
                    </div> 
                ';
            }

            $html .= '<!----------------- END OF NAVIGATOR --------------------->
                <div class="button-next">Âïåðåä</div>
                </div> <!--------- END OF THE CONTENT ---------------------->
            ';

            return $html;
        });

        Html::macro('banner_01', function($id, $ancho, $alto, $arreglo, $efecto, $activar)
        {
            $html = '
                <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/jquery.easing.js').'"></script>
          <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/script.js').'"></script>
                <style type="text/css" media="screen">
                    @import "'.asset('/libs/lof_jquery/css/style1.css').'";
                </style>
                <script type="text/javascript">
                    $(document).ready( function()
                    { 
                        var buttons = { 
                            previous:$("#'.$id.' .button-previous") ,
                            next:$("#'.$id.' .button-next") 
                        };
                        $("#'.$id.'").lofJSidernews( 
                        { 
                            interval:5000,
                            easing:"'.$efecto.'", //"easeOutBounce",
                            duration        : 1200,  
                            easing          : "easeInOutExpo",
                            duration        : 1200,
                            auto            : true,
                            maxItemDisplay  : 4,
                            navPosition     : "horizontal", // horizontal
                            navigatorHeight : 32,
                            navigatorWidth  : 80,
                            mainWidth       : 980,
                            buttons         : buttons 
                        });                     
                    });
                </script>
            ';
            $html .= '<!------------------------------------- THE CONTENT ------------------------------------------------->
               <div id="'.$id.'" class="lof-slidecontent" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <div class="preload"><div></div>
                </div>
                
                    <!-- MAIN CONTENT --> 
                <div class="main-slider-content" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <ul class="sliders-wrap-inner">';
                        $long = count($arreglo);
                        $j=0;
                        foreach ($arreglo as $key => $value) 
                        {
                            if (is_array($value)) 
                            {
                                if ($j==$key) 
                                {
                                    //echo $j.'='.$key.'<br>';
                                    $html .= '
                                            <li>
                                                <img id="imagen'.$j.'" src="" title="imagen" >           
                                                <div class="slider-description">
                                                    <div class="slider-meta"><a target="_parent" title="logo" href="#Category-1" id="titulo'.$j.'">/ /</a> <i></i>
                                                    </div>
                                                    <h4></h4>
                                                    <p id="html'.$j.'"> 
                                                        <a class="readmore" href="#"></a>
                                                    </p>
                                                </div>
                                            </li>
                                        ';
                                    foreach ($value as $key2 => $value2) 
                                    {
                                        if($key2 == 'imagen') 
                                        {
                                            //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                            $html .= '<script type="text/javascript">$("#imagen'.$j.'").attr("src", "'.$value2.'");</script>';
                                        }elseif($key2=='titulo') 
                                        {
                                            $html .= '<script type="text/javascript">$("#titulo'.$j.'").text("'.$value2.'");</script>';
                                        }elseif($key2=='html') 
                                        {
                                           $html .= '<script type="text/javascript">
                                                        var text = "'.$value2.'"; 
                                                        text = text.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, "");
                                                        $("#html'.$j.'").html(text);
                                                    </script>
                                            '; 
                                        }
                                    }
                                }
                            }
                            $j++;
                        }
                        $html .= '
                    </ul>     
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
            ';
            if (!is_null($activar)) 
            {
                $html .= '
                    <div class="navigator-content">
                        <div class="button-next">dddd</div>
                        <div class="navigator-wrapper">
                            <ul class="navigator-wrap-inner">';
                                $k=0;
                                foreach ($arreglo as $key => $value) 
                                {
                                    if (is_array($value)) 
                                    {
                                        if ($k==$key) 
                                        {
                                            $html .= '<li><img id="imagen_min'.$k.'" width="70px" height="25px"/></li>';
                                            foreach ($value as $key2 => $value2) 
                                            {
                                                //echo $value2;
                                                if($key2 == 'imagen') 
                                                {
                                                    $html .= '<script type="text/javascript">$("#imagen_min'.$k.'").attr("src", "'.$value2.'");</script>';
                                                }
                                            } 
                                        }
                                    }
                                    $k++;
                                }
                                $html .= ' <div  class="button-previous">Íàçàä</div>    
                            </ul>
                        </div>
                    </div>
                ';
            }

            $html .= '<!----------------- END OF NAVIGATOR --------------------->
                <div class="button-next">Âïåðåä</div>
                </div> <!--------- END OF THE CONTENT ---------------------->
            ';

            return $html;
        });

        Html::macro('banner_03', function($id, $ancho, $alto, $arreglo, $efecto, $activar)
        {
            $html = '
                <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/jquery.easing.js').'"></script>
          <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/script.js').'"></script>
                <style type="text/css" media="screen">
                    @import "'.asset('/libs/lof_jquery/css/style3.css').'";
                </style>
                <script type="text/javascript">
                    $(document).ready( function()
                    { 
                        var buttons = { 
                            previous:$("#'.$id.' .button-previous") ,
                            next:$("#'.$id.' .button-next") 
                        };
                        $("#'.$id.'").lofJSidernews( 
                        { 
                            interval:5000,
                            easing:"'.$efecto.'", //"easeOutBounce",
                            //direction:"opacity",
                            duration:1200,
                            auto:true,
                            mainWidth:980,
                            mainHeight:300,
                            navigatorHeight: 100,
                            navigatorWidth: 340,
                            maxItemDisplay:3,
                            buttons:buttons
                        });                     
                    });
                </script>
            ';
            $html .= '<!------------------------------------- THE CONTENT ------------------------------------------------->
                <div id="'.$id.'" class="lof-slidecontent modal_galeria" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <div class="preload"><div></div>
                </div>
                <div  class="button-previous">image null</div>
                    <!-- MAIN CONTENT --> 
                <div class="main-slider-content" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <ul class="sliders-wrap-inner">';
                        $long = count($arreglo);
                        $j=0;
                        foreach ($arreglo as $key => $value) 
                        {
                            if (is_array($value)) 
                            {
                                if ($j==$key) 
                                {
                                    //echo $j.'='.$key.'<br>';
                                    $html .= '
                                            <li>
                                                <img id="imagen'.$j.'" src="" title="imagen" >           
                                                <div class="slider-description">
                                                    <div class="slider-meta"><a target="_parent" title="logo" href="#Category-1" id="titulo'.$j.'">/ /</a> <i></i>
                                                    </div>
                                                    <h4></h4>
                                                    <p id="html'.$j.'"> 
                                                        <a class="readmore" href="#"></a>
                                                    </p>
                                                </div>
                                            </li>
                                        ';
                                    foreach ($value as $key2 => $value2) 
                                    {
                                        if($key2 == 'imagen') 
                                        {
                                            //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                            $html .= '<script type="text/javascript">$("#imagen'.$j.'").attr("src", "'.$value2.'");</script>';
                                        }elseif($key2=='titulo') 
                                        {
                                            $html .= '<script type="text/javascript">$("#titulo'.$j.'").text("'.$value2.'");</script>';
                                        }elseif($key2=='html') 
                                        {
                                           $html .= '<script type="text/javascript">
                                                        var text = "'.$value2.'"; 
                                                        text = text.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, "");
                                                        $("#html'.$j.'").html(text);
                                                    </script>
                                            '; 
                                        }
                                    }
                                }
                            }
                            $j++;
                        }
                        $html .= '
                    </ul>     
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
            ';
            if (!is_null($activar)) 
            {
                $html .= '
                    <div class="navigator-content">
                        <div class="navigator-wrapper">
                            <ul class="navigator-wrap-inner">';
                                $k=0;
                                foreach ($arreglo as $key => $value) 
                                {
                                    if (is_array($value)) 
                                    {
                                        if ($k==$key) 
                                        {
                                            $html .= ' 
                                                <li>
                                                    <div>
                                                        <img id="imagen_min'.$k.'" src="" width="70px" height="25px"/>
                                                        <h3 id="titulo_min'.$k.'" > Misi&oacute;n </h3>
                                                        <span></span>
                                                    </div>    
                                                </li>
                                            ';
                                            foreach ($value as $key2 => $value2) 
                                            {
                                                if ($key2 == 'imagen') 
                                                {
                                                    //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                                    $html .= '<script type="text/javascript">$("#imagen_min'.$k.'").attr("src", "'.$value2.'");</script>';
                                                }elseif ($key2=='titulo') 
                                                {
                                                    $html .= '<script type="text/javascript">$("#titulo_min'.$k.'").text("'.$value2.'");</script>';
                                                }
                                            }
                                        }
                                    }
                                    $k++;
                                }
                                $html .= '     
                            </ul>
                        </div>
                    </div> 
                ';
            }

            $html .= '<!----------------- END OF NAVIGATOR --------------------->
                <div class="button-next">Âïåðåä</div>
                </div> <!--------- END OF THE CONTENT ---------------------->
            ';

            return $html;
        });

        Html::macro('banner_04', function($id, $ancho, $alto, $arreglo, $efecto, $activar)
        {
            $html = '
                <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/jquery.easing.js').'"></script>
             <script language="javascript" type="text/javascript" src="'.asset('/libs/lof_jquery/js/script.js').'"></script>
                <style type="text/css" media="screen">
                    @import "'.asset('/libs/lof_jquery/css/style4.css').'";
                </style>
                <script type="text/javascript">
                    $(document).ready( function()
                    { 
                        var buttons = { 
                            previous:$("#'.$id.' .button-previous") ,
                            next:$("#'.$id.' .button-next") 
                        };
                        $("#'.$id.'").lofJSidernews( 
                        { 
                            interval:5000,
                            easing:"'.$efecto.'", //"easeOutBounce",
                            //duration : 1200,
                            auto : false,
                            maxItemDisplay  : 3,
                            startItem:1,
                            navPosition     : "horizontal", // horizontal
                            navigatorHeight : null,
                            navigatorWidth  : null,
                            mainWidth:980,
                            buttons:buttons
                        });                     
                    });
                </script>
            ';
            $html .= '<!------------------------------------- THE CONTENT ------------------------------------------------->
                <div id="'.$id.'" class="lof-slidecontent modal_galeria" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <div class="preload"><div></div>
                </div>
                <div  class="button-previous">image null</div>
                    <!-- MAIN CONTENT --> 
                <div class="main-slider-content" style="width:'.$ancho.'px; height:'.$alto.'px;">
                    <ul class="sliders-wrap-inner">';
                        $long = count($arreglo);
                        $j=0;
                        foreach ($arreglo as $key => $value) 
                        {
                            if (is_array($value)) 
                            {
                                if ($j==$key) 
                                {
                                    //echo $j.'='.$key.'<br>';
                                    $html .= '
                                            <li>
                                                <img id="imagen'.$j.'" src="" title="imagen" >           
                                                <div class="slider-description">
                                                    <div class="slider-meta"><a target="_parent" title="logo" href="#Category-1" id="titulo'.$j.'">/ /</a> <i></i>
                                                    </div>
                                                    <h4></h4>
                                                    <p id="html'.$j.'"> 
                                                        <a class="readmore" href="#"></a>
                                                    </p>
                                                </div>
                                            </li>
                                        ';
                                    foreach ($value as $key2 => $value2) 
                                    {
                                        if($key2 == 'imagen') 
                                        {
                                            //echo $j.'='.$key.'/'.$key2.'='.$value2.'<br>';
                                            $html .= '<script type="text/javascript">$("#imagen'.$j.'").attr("src", "'.$value2.'");</script>';
                                        }elseif($key2=='titulo') 
                                        {
                                            $html .= '<script type="text/javascript">$("#titulo'.$j.'").text("'.$value2.'");</script>';
                                        }elseif($key2=='html') 
                                        {
                                           $html .= '<script type="text/javascript">
                                                        var text = "'.$value2.'"; 
                                                        text = text.replace(/([\ \t]+(?=[\ \t])|^\s+|\s+$)/g, "");
                                                        $("#html'.$j.'").html(text);
                                                    </script>
                                            '; 
                                        }
                                    }
                                }
                            }
                            $j++;
                        }
                        $html .= '
                    </ul>     
                </div>
                <!-- END MAIN CONTENT --> 
                <!-- NAVIGATOR -->
            ';
            if (!is_null($activar)) 
            {
                $html .= '
                    <div class="navigator-content">
                        <div class="button-control"><span></span></div>
                        <div class="navigator-wrapper">
                            <ul class="navigator-wrap-inner">';
                                $k=0;
                                foreach ($arreglo as $key => $value) 
                                {
                                    if (is_array($value)) 
                                    {
                                        if ($k==$key) 
                                        {
                                            $html .='<li><span>'.$k.'</span></li>';
                                        }
                                    }
                                    $k++;
                                }
                                $html .= '     
                            </ul>
                        </div>
                    </div> 
                ';
            }
            $html .= '<!----------------- END OF NAVIGATOR --------------------->
                <div class="button-next">Âïåðåä</div>
                </div> <!--------- END OF THE CONTENT ---------------------->
            ';

            return $html;
        });

        Html::macro('slider_banner', function($id, $width, $height, $arreglo){

            $html  ='<div class="slider">
                    <div id="coin-slider"> ';
                    foreach ($arreglo as $key => $sliders) 
                    {
                        if (is_array($sliders)) 
                        {
                            foreach ($sliders as $key2 => $slider) 
                            {
                                 $html .='<a href="#">';
                                 if ($key2 == 'imagen') {
                                     $html .= ' <img src="'.$slider.'" width="'.$width.'" height="'.$height.'" alt="" />';
                                 }
                                 $html .= '</a>';
                            }
                        }                    
                    }
                       $html .= '</div>
                    <div class="clr"></div>
            </div>';
            return $html;

        });

        Html::macro('modalDeleted', function($id, $id_deleted, $url)
        {
            $html ='<div id="'.$id_deleted.'" class="modal fade" tabindex="-1" role="dialog">';
            $html .='<div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= '<h3 class="modal-title"><i class="fa fa-trash"></i>'.trans("label.info_deleted").'</h3>';
            $html .= '</div><div class="modal-body">';
            $html .= '<p><h4><i class="fa fa-comments"></i> '.trans("label.confirm_deleted").'</h4></p>';
            //$html .='<p>'.$id.'</p>';
            $html .= '</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">'.trans("label.close").'</button>
                        <button id="btn-deleted" type="button" class="btn btn-danger" onclick="ajaxDeleted(\''.$id.'\', \''.$id_deleted.'\',\''.$url.'\');">'.trans("label.deleted").'</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>';

            return $html;

        });

        Html::macro('myField', function()
        {
            return '<input type="awesome">nnnn';
        });

        Html::macro('modalConfirm', function($id, $id_deleted, $url, $message=array())
        {
            $html ='<div id="'.$id_deleted.'" class="modal fade" tabindex="-1" role="dialog">';
            $html .='<div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= '<h3 class="modal-title"><i class="'.$message["legend"]["fa"].'"></i> '.$message["legend"]["name"].'</h3>';
            $html .= '</div><div class="modal-body">';
            $html .= '<p><h4><i class="'.$message["message"]["fa"].'"></i> '.$message["message"]["name"].'</h4></p>';
            //$html .='<p>'.$id.'</p>';
            $html .= '</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">'.trans("label.close").'</button>
                        <button id="btn-deleted" type="button" class="btn btn-danger" onclick="ajaxRemove(\''.$id.'\', \''.$id_deleted.'\',\''.$url.'\');">'.trans("label.accept").'</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>';

            return $html;

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
