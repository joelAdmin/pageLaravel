@if(Session::has('menssage'))
    <div class="alert alert-info alert-dismissable"><i class="fa fa-saved"></i>
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>
       {{ Session::get('menssage') }}
    </div>
@endif