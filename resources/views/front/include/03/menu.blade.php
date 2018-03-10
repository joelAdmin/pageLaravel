<style type="text/css">
 /*************************************************************************/
#navigations 
{
  height: 49px; width:959px; 
  background: #88cbf7;
  border-radius: 5px 5px 0px 0px; 
  /*url(images/navigation.gif) no-repeat;*/ 
  padding: 0px 1px 0px; margin-top: 0px; 
 
  
  top:45px;
  right:0;
  text-shadow: 0 1px 1px rgba(0,0,0,.3);
  font-size: 25px;
  font-family:arial;
  color: #FFF;
  z-index:19;
  
}
#navigations ul { font-size: 13px; line-height: 38px; text-transform: capitalize; z-index:10;/*modificar index*/}
#navigations ul li { float: left; display: inline; list-style-type: none; padding-right: 2px; /**/  border-right:1px solid #fff;}
#navigations ul li a { float: left; display: inline; color: #fff; text-decoration: none; padding-left: 17px;}
#navigations ul li a span { float: left; display: inline; padding-right: 17px; background-position: right 0 !important; }
#navigations ul li a:hover,
#navigations ul li a.active,
#navigations ul li a:hover span,

#navigations ul li a.active span { color: #000; border-radius: 5px 0px 0px 0px; /*url(images/nav-active.gif) no-repeat 0 0;*/ }
#top { position:relative; /*z-index: 150; */}/* ANTES ERA EL Z-INDEX ERA 100*/
#navigations ul li { position: relative; }
#navigations ul li:hover > a,
#navigations ul li:hover > a.active,
#navigations ul li:hover > a span,
#navigations ul li:hover > a.active span { color: #000; background: #f8f9f9;border-radius: 0px 0px 0px 0px;/*url(images/nav-active.gif) no-repeat 0 0;*/ }

#navigations ul li ul { display:none; position:absolute; top: 30px; left: 0; background: #f8f9f9; width:240px; /*ancho de submenu*/
  border-radius: 0px 5px 5px 5px; -moz-border-radius: 0px 5px 5px 5px; -webkit-border-radius: 0px 0px 5px 5px; -o-border-radius: 0px 5px 5px 5px;
}

#navigations ul li:hover > ul { display: block;  }/*#93010c*/
#navigations ul li ul li { float:none; display:block; background: transparent; padding-right:0; }
#navigations ul li ul li a { display:block; float:none; background: transparent; color:#717171; }
#navigations ul li ul li a:hover {background: #88cbf7;border-radius: 0px 0px 0px 0px; /* url(images/dd-hove.png) repeat-x 0 0;*/ color:#fff; }
#navigations ul li ul li:first-child a { border-radius: 0 5px 0 0; -moz-border-radius: 0 5px 0 0; -webkit-border-radius: 0 5px 0 0; -o-border-radius: 0 5px 0 0; }
#navigations ul li ul li:last-child a { border-radius: 0 0 5px 5px; -moz-border-radius: 0 0 5px 5px; -webkit-border-radius: 0 0 5px 5px; -o-border-radius: 0 0 5px 5px; }

/*********banner movidizo**************/

</style>
<div id="navigations">
  
      <nav>
        <ul>
          <li><a href="index.php" class="active font_menu"><span><i class="fa fa-home fa-fw"></i>Inicio</span></a></li>
          @foreach($menus as $menu)
              <li>
                  @if(empty($menu->url_men) OR ($menu->url_men=='#'))
                      <a id='sub_{{$menu->id_Men}}' data-id='{{$menu->id_Men}}' href="#"  onclick='{{$menu->event_men}}' ><span class="font_menu"><i class="fa fa-chevron-circle-right fa-fw"></i>{{$menu->etiqueta_men}}</span></a>
                  @else
                      <a id='sub_{{$menu->id_Men}}' data-id='{{$menu->id_Men}}' href='{{$menu->url_men}}' ><span class="font_menu"><i class="fa fa-chevron-circle-right fa-fw"></i>{{$menu->etiqueta_men}}</span></a>
                  @endif
                  <ul>

                    @foreach($submenus as $submenu)
                  @if($submenu->id_men == $menu->id_Men)
                    @if(empty($submenu->url_sub) OR ($submenu->url_sub=='#'))
                      <li><a id='sub_{{$submenu->id_Sub}}' data-id='{{$submenu->id_Sub}}' href="#" onclick='showAjax("/showSubmenuAjax/{{$submenu->id_Sub}}");' class="font_submenu"><i class="fa fa-caret-right fa-fw"></i>{{$submenu->etiqueta_sub}}</a></li>
                    @else
                      <li><a id='sub_{{$submenu->id_Sub}}' data-id='{{$submenu->id_Sub}}' href='{{$submenu->url_sub}}' class="font_submenu"><i class="fa fa-caret-right fa-fw"></i>{{$submenu->etiqueta_sub}}</a></li>
                    @endif  
                  @endif  
                    @endforeach
                  </ul>
              </li>
          @endforeach
        </ul>
      </nav>  
    
    </div>
   <!--end MENU DE PAGINA -->