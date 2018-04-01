@if(Auth::check())
    @can('login_admin')
      <nav class="navbar-inverse2 navbar-static-side" role="navigation">
          <div class="sidebar-collapse legend">
              <ul class="nav" id="side-menu">
                  <li class="sidebar-search"></li>
                    
                    <li>
                    	<a id="" href="#" onclick="" ><i class="fa fa-desktop fa-fw"></i> <span class="fa arrow"></span> {{trans('label.page')}}</a>
                    	<ul class="nav nav-second-level">
                    		<li><a id="" href="/newUser"  onclick=""><i class="fa fa-user fa-fw"></i>{{trans('label.new_user')}}</a></li>	
                    	</ul>

                      <ul class="nav nav-second-level">
                        <li><a id="" href="/newMenu"  onclick=""><i class="fa fa-ellipsis-h fa-fw"></i> {{trans('label.new_menu')}}</a></li>  
                      </ul>

                      <ul class="nav nav-second-level">
                        <li><a id="" href="/newSubmenu"  onclick=""><i class="fa fa-ellipsis-v fa-fw"></i> {{trans('label.new_submenu')}}</a></li>  
                      </ul>

                      <ul class="nav nav-second-level">
                        <li><a id="" href="/newBanner"  onclick=""><i class="fa fa-bars fa-fw"></i> {{trans('label.new_banner')}}</a></li>  
                      </ul>

                    </li>

                    <li>
                    	<a id="" href="#" onclick="" ><i class="fa fa-newspaper fa-fw"></i> <span class="fa arrow"></span>{{trans('label.cont_page')}}</a>
                    	<ul class="nav nav-second-level">
                    		<li><a id="" href="/newNotice"  onclick=""><i class="fa fa-plus fa-fw"></i>{{trans('label.new_notice')}}</a></li>
                    		
                    	</ul>
                    </li>

                    <li>
                    	<a id="" href="#" onclick="" ><i class="fa fa-lock fa-fw"></i> <span class="fa arrow"></span>{{trans('label.access_control')}}</a>
                    	<ul class="nav nav-second-level">
                    		<li><a id="" href="/newPermission"  onclick=""><i class="fa fa-lock fa-fw"></i>{{trans('label.create_permissions')}}</a></li>
                        <li><a id="" href="#"  onclick=""><i class="fa fa-unlock fa-fw"></i>{{trans('label.create_roles')}}</a></li>	
                    	</ul>
                    </li>

                  
              </ul>
          </div>
      </nav>
    @endcan
@endif