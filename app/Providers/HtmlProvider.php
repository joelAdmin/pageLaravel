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
                    <ul class="sliders-wrap-inner">
            ';
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
                                        </script>'; 
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
                                    <ul class="navigator-wrap-inner">
                ';
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

        Html::macro('modalDeleted', function($id, $id_deleted, $url)
        {
            $html ='<div id="'.$id_deleted.'" class="modal fade" tabindex="-1" role="dialog">';
            $html .='<div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $html .= '<h3 class="modal-title"><i class="fa fa-trash"></i>'.trans("label.info_deleted").'</h3>';
            $html .= '</div><div class="modal-body">';
            $html .= '<p><h4><i class="fa fa-question-circle"></i> '.trans("label.confirm_deleted").'</h4></p>';
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
