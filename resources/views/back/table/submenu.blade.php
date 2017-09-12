<div class="panel-body">Total de registro <b>{{$submenus->total()}}</b> Pag <b>{{$submenus->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif
@if (isset($submenus) )
<table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            
                            <th><center>{{trans('label.etiqueta')}}</center></th>
                            <th><center>{{trans('label.menu')}}</center></th>
                            <th><center>{{trans('label.position')}}</center></th>
                            <th><center>{{trans('label.url')}}</center></th>
                            <th><center>{{trans('label.event')}}</center></th>
                            <th> </th>
                            <th></th>

                        </tr>
                    </thead> 
                    <?php $i=$submenus->firstItem(); ?>
                    <tbody>               
                      @foreach($submenus as $submenu)
                       <tr id="tr_{{$submenu->id_Sub}}" data-id="{{$submenu->id_Sub}}">
                            <td id="cont"><center><b>{{$i++}}</b></center></td>
                            <td id="etiqueta_sub{{$submenu->id_Sub}}" >{{$submenu->etiqueta_sub}}</td>
                            <td id="id_men{{$submenu->id_Sub}}" >{{$submenu->id_men}}</td>
                            <td id="position_sub{{$submenu->id_Sub}}">{{$submenu->position_sub}}</td>
                            <td id="url_sub{{$submenu->id_Sub}}">{!! $submenu->url_sub !!}</td>
                            <td id="event_sub{{$submenu->id_Sub}}">{{$submenu->event_sub}}</td>
                            <td><center><a href="#"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$submenu->id_Sub}}" onclick="edit('/getUpdateSubmenu/{{$submenu->id_Sub}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$submenus->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>