@if(Session::has('mensaje_error'))
    <div class="alert alert-danger alert-dismissable"><i class="fa fa-saved"></i>
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>
       {{ Session::get('mensaje_error') }}
    </div>
@endif