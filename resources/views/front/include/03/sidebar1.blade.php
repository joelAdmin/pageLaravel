@if(!Auth::check())
<div class="gadget">
          <h2 class="star"><span><i class="fa fa-user"></i> {{ trans('label.login')}}</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            	<li><a href="#" onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');"><i class="fa fa-users"></i> {{ trans('label.user_register') }}</a></li>
           
            <li><a href="#" onclick="ajaxLoadModal('/newUserFront', 'content_modal-lg', 'modalShow_lg');"><i class="fa fa-user-plus"></i> {{ trans('label.users_new') }}</a></li>
           
            <li><a href="#"><i class="fa fa-facebook"></i> {{ trans('label.login_facebook') }}</a></li>
            <li><a href="#"><i class="fa fa-lock"></i> {{ trans('label.restore_pass') }}</a></li>
          </ul>
        </div>
 @else
 <div class="gadget">
          <h2 class="star"><span><i class="fa fa-user"></i> {{Auth::User()->name}}</span></h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            	<li><a href="#" onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');"><i class="fa fa-users"></i> {{ trans('label.user_perfil') }}</a></li>
           
            <li><a href="#"><i class="fa fa-user-plus"></i> {{ trans('label.new_pass') }}</a></li>
            <li><a href="/logoutFront"><i class="fa fa-unlock"></i> {{trans('label.exit')}}</a></li>
            
          </ul>
        </div>


 @endif