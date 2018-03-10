<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  @include('front.include.03.head')
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
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html">JL<span>system</span> <small>000webhost.com</small></a></h1>

      </div>
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
         
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
          <input name="button_search" src="{{ asset('plantillas/03/images/search.gif') }}" class="button_search" type="image" />

        </form>
        
      </div>
      <div class="clr"></div>
      @include('front.include.03.menu')
      <div class="clr"></div>
        @include('front.include.03.banner')
      <div class="clr"></div>
    </div>
  </div>
  <div  class="content">
    <div class="content_resize">
      <div id="contenido_interno" class="mainbar">
       
         @include('front.ajax.03.notices')
      </div>

        {!! Html::div_modal('modalShow_lg', 'modal-lg') !!}
        {!! Html::div_modal('modalShow') !!}
        {!! Html::alert('modalShowAlert', 'col-md-5 col-md-offset-4') !!} 

      <div class="sidebar">
        @include('front.include.03.sidebar1')
        @include('front.include.03.sidebar2')
        @include('front.include.03.sidebar3')
      </div>

      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    @include('front.include.03.fbg')
  </div>
  <div class="loading"></div>
  <div class="footer">
    @include('front.include.03.footer')
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html> 