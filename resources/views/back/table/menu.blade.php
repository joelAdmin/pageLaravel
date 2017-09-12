<div class="panel-body">Total de registro <b>{{$menus->total()}}</b> Pag <b>{{$menus->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif
@if (isset($menus) )
<table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            
                            <th><center>{{trans('label.etiqueta')}}</center></th>
                            <th><center>{{trans('label.position')}}</center></th>
                            <th><center>{{trans('label.url')}}</center></th>
                            <th><center>{{trans('label.event')}}</center></th>
                            <th> </th>
                            <th></th>

                        </tr>
                    </thead> 
                    <?php $i=$menus->firstItem(); ?>
                    <tbody>               
                      @foreach($menus as $menu)
                       <tr id="tr_{{$menu->id_Men}}" data-id="{{$menu->id_Men}}">
                            <td id="cont"><center><b>{{$i++}}</b></center></td>
                            <td id="etiqueta_men{{$menu->id_Men}}" >{{$menu->etiqueta_men}}</td>
                            <td id="position_men{{$menu->id_Men}}">{{$menu->position_men}}</td>
                            <td id="url_men{{$menu->id_Men}}">{!! $menu->url_men !!}</td>
                            <td id="event_men{{$menu->id_Men}}">{{$menu->event_men}}</td>
                            <td><center><a href="#"  onclick="confirmDeleted('deleted{{$menu->id_Men}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$menu->id_Men}}" onclick="edit('/getUpdateMenu/{{$menu->id_Men}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                        {!! Html::modalDeleted($menu->id_Men, 'deleted'.$menu->id_Men, '/deletedMenu/'.$menu->id_Men) !!}
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$menus->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>