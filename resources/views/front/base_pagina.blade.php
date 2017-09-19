<!doctype html>
  <head>  
    @include('front.include.head')
  </head>
  <body>
   
     <style> 
      .loading 
      { 
        background: url('{{asset('media/img/load.gif')}}') no-repeat center 65%; 
        background-color: rgba(0,0,0,0.8);
        position: fixed;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:0;
        z-index: 2000;
        display: none;
      } 
    </style> 
    
    <div id="divBloqueador"></div>
      <!--start container-->
        <div id="container">
          <header>
            @include('front.include.headBoard')
            
          </header>
          @include('front.include.banner')
          <div class="holder_content">
            <section class="group1">
              <div id="content" class="left">
                  <div id="contenido">
                    <div id="contenido_interno" class="cols three-cols">
                        @include('front.ajax.notices')
                    </div>
                  </div>
              </div>
              <!--start NOTICIAS DE PAGINADOR-->
             
              <!--end NOTICIAS DE PAGINADOR -->  
            </section>
            <section class="group2">
              <aside class="group2 "> 
              
                <h4 class="tituloH4"><i class="fa fa-list fa-fw"></i> <b></b><hr></h4>
                <a class="" title="Decisiones" target="_blank" href="http://guarico.tsj.gob.ve/decisiones/decisiones_tribunal.asp?id=012" data-widget-id=""> <i class="fa fa-bar-chart fa-fw"></i> <b>Decisiones</b><img src="{{asset('storage/href/tsj-logo-300x119.jpg')}}" height="60" width="220" />   </a>
                <br/>
                <br><h4  class="tituloH4"> <i class="fa fa-calendar fa-fw"></i> <b>Calendario<hr></b></h4>
                $JQuery->calendarioDatepicker();
                <br><h4 class="tituloH4"> <i class="fa fa-twitter fa-fw"></i> <b>Tweets<hr></b></h4>            
                  <a class="twitter-timeline"  href="https://twitter.com/procuguarico" data-widget-id="584385676705210368">Tweets por el @procuguarico.</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?0'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
              </aside>
            </section>
            <section class="group3">
              <div style="display:None;" id="Contactos" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"    aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <!--<div class="modal-header"><i class="fa fa-lock"></i> Ingresar Usuario
                      <button type="button" class="close" data-dismiss="modal">x</button><br/>
                      <h4 class="modal-title"></h4>
                    </div>-->
                    <div class="panel-body">
                      <fieldset class="scheduler-border"><legend class="scheduler-border"><i class="fa fa-envelope-o"></i> Enviar mensaje <button type="button" class="close" data-dismiss="modal">x</button></legend>
                        <div class="panel-body">
                          <div id="respuesta"></div>
                          <!--start formulario de contacto-->
          
                          <!--end formulario de contacto-->
                        </div>
                      </fieldset>
                    </div>
                  </div>
                </div>
              </div>

              <div style="display:None;" id="showModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div id="contModal" class="modal-content">
                  
                    
                  </div>
                </div>
              </div>

            </section>
          </div>
          <!--start enlaces-->
            @include('front.include.enlaces_inferior')
          <!--end enlaces --> 
        </div>
      <!--end container-->
      <div class="loading"></div>
      <!--start footer-->
        @include('front.include.footer')       
      <!--end footer-->
  </body>
</html>