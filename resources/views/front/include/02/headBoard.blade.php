
    <!--start MENU DE PAGINA -->
    <!--<a href="#" id="cintillo"><img src="plantillas/02/css/images/cintillo.jpg" width="970px" height="40px" alt="logo"/></a><br><br>-->
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
