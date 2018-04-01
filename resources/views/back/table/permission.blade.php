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
                            <th><center>{{trans('label.role_permission')}}</center></th>
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
                            <td id="role_id{{$permission->id}}" >
                                <?php $i=0; ?>
                                @foreach($roles as $role)
                                    <?php $i++; ?>
                                        @if($role->permission_id==$permission->id)
                                            
                                            <div id="bs-callout-{{$role->id}}-{{$permission->id}}">
                                                <a href="#" class="close btn-xs btn-danger" data-dismiss="" aria-hidden="false" onclick="confirmDeleted('remove{{$permission->id}}-{{$i}}');" title="{{trans('label.confirm_remove_permission')}}">×</a>
                                                <blockquote class=" fija bs-callout-success btn-xs primary">
                                               <div class="bs-text">
                                                  <u> 
                                                    <a  class="alert-warning" href="#" id="#" title="" onclick=""><i class="fa fa-angle-right"></i>  {{trans('label.role')}}:</a> <b>{{$role->name}}</b>
                                                   </u>
                                                   <small><b>{{trans('label.permission')}}: </b> {{$permission->name}}</small>                                                                                                     
                                                </div>
                                                </blockquote>
                                            </div>
                                            <!--  se hace clic en el evento confirmDeleted() del boto remover permiso 
                                                luego este resive un parametro e es le nombre del div modal que se va
                                                mostrar con un un mensaje de conlfirmacion usando la macro 
                                                Html::modalConfirm(id[id-del-objeto], id_div['id-del-div'], 
                                                url['url donde se va a procesar'], $array['para configuar la vista del div'] )
                                            -->
                                            {!! Html::modalConfirm($permission->id, 'remove'.$permission->id.'-'.$i, '/removePermission/'.$role->id.'/'.$permission->id, array('message'=>array('fa'=>'fa fa-comments', 'name'=>trans("label.confirm_remove_permission")), 'legend'=>array('fa'=>'fa fa-exclamation-circle', 'name'=>trans("label.remove_permission")))) !!}
                                        @endif
                                    
                                @endforeach
                                <div id="addRole-{{$permission->id}}">
                                    <!-- aqui va se carga la informacion que viene por ajax con el nuevo permiso registrado-->
                                </div>
                                <button class="btn-xs btn-info" onclick="getModal('/assignPermission/{{$permission->id}}');"><i class="fa fa-plus"></i> Asignar</button>
                            </td>
                            <td id="name{{$permission->id}}">{{$permission->name}}</td>
                            
                            <td><center><a href="#" onclick="confirmDeleted('deleted{{$permission->id}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$permission->id}}" onclick="getModal('/updatePermission/{{$permission->id}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                        {!! Html::modalDeleted($permission->id, 'deleted'.$permission->id, '/deletedPermission/'.$permission->id) !!}
                        
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$permissions->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>