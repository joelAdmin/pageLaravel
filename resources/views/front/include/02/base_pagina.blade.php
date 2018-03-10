<!doctype html>
  <head>  
    @include('front.include.02.head')
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
            @include('front.include.02.headBoard')
          </header>
          @include('front.include.02.banner')
          <div class="holder_content">
            <section class="group1">
              <div id="content" class="left">
                  <div id="contenido">
                    <div id="contenido_interno" class="cols three-cols">
                        @include('front.ajax.02.notices')
                    </div>
                  </div>
              </div>
              <!--start NOTICIAS DE PAGINADOR-->
              <!--end NOTICIAS DE PAGINADOR -->  
            </section>
            <section class="group2">
              <aside class="group2 "> 
              
                <h4 class="tituloH4"><i class="fa fa-list fa-fw"></i> <b></b><hr></h4>
               
                <br/>
                <br><h4  class="tituloH4"> <i class="fa fa-calendar fa-fw"></i> <b>Calendario<hr></b></h4>
                <script type="text/javascript">
                  $(document)ready(function(){
                     $JQuery->calendarioDatepicker();

                });</script>
               

                <br><h4 class="tituloH4"> <i class="fa fa-twitter fa-fw"></i> <b>Tweets<hr></b></h4>            
                  <a class="twitter-timeline"  href="https://twitter.com/procuguarico" data-widget-id="584385676705210368">Tweets por el @procuguarico.</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?0'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
              </aside>
            </section>
            <section class="group3">
              
             {!! Html::div_modal('modalShow_lg', 'modal-lg') !!}
             {!! Html::div_modal('modalShow') !!}
             {!! Html::alert('modalShowAlert', 'col-md-5 col-md-offset-4') !!}

            </section>
          </div>
          <!--start enlaces {-- @include('front.include.02.enlaces_inferior') --} -->
            
          <!--end enlaces --> 
        </div>
      <!--end container-->
      <div class="loading"></div>
      <!--start footer-->
        @include('front.include.02.footer')     
      <!--end footer-->
  </body>
</html>