<div class="panel-body">{{trans('label.total_rows')}} <b>{{$permissions->total()}}</b> Pag <b>{{$permissions->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif
@if (isset($permissions) )
<table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>{{trans('label.role')}}</center></th>
                            <th><center>{{trans('label.permission')}}</center></th>
                                                        
                            <th> </th>
                            <th></th>

                        </tr>
                    </thead> 
                    <?php $i=$permissions->firstItem(); ?>
                    <tbody>               
                      @foreach($permissions as $permission)
                       <tr id="tr_{{$permission->id}}" data-id="{{$permission->id}}">
                            <td id="cont"><center><b>{{$i++}}</b></center></td>
                            
                           
                            <td id="title_ban{{$permission->id}}" >falta</td>
                            <td id="status_ban{{$permission->id}}">{{$permission->name}}</td>
                            
                            <td><center><a href="#" onclick="confirmDeleted('deleted{{$permission->id}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$permission->id}}" onclick="edit('/getUpdateBanner/{{$permission->id}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                        {!! Html::modalDeleted($permission->id, 'deleted'.$permission->id, '/deletedBanner/'.$permission->id) !!}
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$permissions->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>