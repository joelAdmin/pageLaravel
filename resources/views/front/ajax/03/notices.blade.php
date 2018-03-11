@foreach($notices as $notice)

  <div class="article ">
          <div class="titleNotice">{{$notice->title_not}}</div>
          <p class="infopost">Publicado<span class="date">11 sep 2018</span> </a> &nbsp;&nbsp;|&nbsp;&nbsp; por <a href="#">{{$notice->author_not}} <a href="#" class="com">Commentarios <span id="num_commit{{$notice->id_Not}}">11</span></a></p>
          <div class="clr"></div>
          <div class="img"><img src="{{ asset('/storage/notice/images') }}/{{$notice->name_img}}" width="650" height="196" alt="" class="fl" /></div>
          <div class="post_content">
            <p>{!! $notice->inlet_not !!}</p>
            <div class="col-md-12 text-right">
              <ul class="social-network social-circle">
                  <!-- <li><a href="#" class="icoRss a_background" title="Rss"><i class="fa fa-rss"></i></a></li>-->
                   <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://pagina.dev/readMore/{{$notice->id_Not}}" class="icoFacebook a_background" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                   <li><a href="#" class="icoTwitter a_background" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                   <li><a href="#" class="icoGoogle a_background" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                   <!--<li><a href="#" class="icoLinkedin a_background" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
              </ul>       
          </div><br>
          <div id="commits_{{$notice->id_Not}}"> 
             @include('front.ajax.03.commit')
          </div>
            <p class="spec"><a title="{{ trans('title.read_more') }}" href="#" class="rm" onclick='showAjax("/readMore/{{$notice->id_Not}}");'>{{ trans('label.read_more') }}</a></p>
          </div>
          <div class="clr"></div>
        </div>
@endforeach
<div class="panel-body"><em>Total<b> {{$notices->total()}}</b> (Pag <b>{{$notices->currentPage()}}</b> {{ trans('label.of') }} <b>{{ $notices->total()/2 }}</b>)</em><br></div>
<div class="pull-right"> {!! str_replace('/?','?',$notices->appends(Request::all())->render()) !!}</div>