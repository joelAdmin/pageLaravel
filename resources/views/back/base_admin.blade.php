<!DOCTYPE html>
<html>
  @include('back.include.head')
  <body>
    <!-- { load biblioteca_extra } -->
    <style> 
      .loading 
      { 
        background: lightgoldenrodyellow url('{{asset('media/img/load.gif')}}') no-repeat center 65%; 
        height: 80px; 
        width: 100px; 
        position: fixed;
        border-radius: 4px; 
        left: 50%; 
        top: 50%; 
        margin: -40px 0 0 -50px; 
        z-index: 2000; 
        display: none; 
      } 
    </style>
    <div id="wrapper">

      @include('back.include.topMenu')
      @if(Auth::check())
        @include('back.include.leftMenu')
      @endif
      
       
      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <div id="contenedor" class="">
              @yield('container')
            </div>
          </div>
        </div>
      </div>
      <!-- Page-Level Plugin Scripts - Tables -->
    </div>
    <div class="loading"></div>
    @include('back.include.footer')
    @yield('script')
  </body>
</html>