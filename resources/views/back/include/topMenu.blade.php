<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a id="log" class="navbar-brand" href="index.php"><i class="fa fa-globe fa-fw"></i><em>{{trans('label.name_system')}}</em></a>
  </div>
       
  @if(Auth::check())
    <ul class="nav navbar-top-links navbar-right">
      <a><em>{{Auth::User()->name}}</em></a> 
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-language fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li class="divider"></li>
          <li>
            <a href="{{ url('lang', ['en']) }}" >
              <div>
                <i class="fa fa-caret-right fa-fw"></i> {{trans('label.english')}}
                <span class="pull-right text-muted small">En</span>
              </div>
            </a>
          </li>

          <li class="divider"></li>
          <li>
            <a href="{{url('lang', ['es'])}}" >
              <div>
                <i class="fa fa-caret-right  fa-fw"></i> {{trans('label.spanish')}}
                <span class="pull-right text-muted small">Es</span>
              </div>
            </a>
          </li>

          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong></strong>
            </a>
          </li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-info-circle fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li class="divider"></li>
          <li>
            <a href="media/pdf/manual/MANUAL.pdf" target="_black">
              <div>
                <i class="fa fa-cloud-download fa-fw"></i> {{LABEL_USER_MANUAL}}
                <span class="pull-right text-muted small">{{LABEL_DOWNLOAD}} Pdf</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="#">
              <strong></strong>
            </a>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i> 
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#"><i class="fa fa-user-plus fa-fw"></i>{{trans('label.new_user')}}</a></li>
          <li class="divider"></li>
          <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i>{{trans('label.close_session')}}</a></li>   
        </ul>
      </li>
    </ul>
  @endif()
</nav>