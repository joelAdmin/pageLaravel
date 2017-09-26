<div class="panel-body">Total de registro <b>{{$users->total()}}</b> Pag <b>{{$users->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif
@if (isset($users) )
<table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>{{trans('label.user')}}</center></th>
                            <th><center>{{trans('label.email')}}</center></th>
                            <th><center>{{trans('label.type')}}</center></th>
                            <th><center>{{trans('label.active')}}</center></th>
                            <th><center>{{trans('label.estatus')}}</center></th>
                            
                            <th> </th>
                            <th></th>

                        </tr>
                    </thead> 
                    <?php $i=$users->firstItem(); ?>
                    <tbody>               
                      @foreach($users as $user)
                       <tr id="tr_{{$user->id}}" data-id="{{$user->id}}">
                            <td id="cont"><center><b>{{$i++}}</b></center></td>
                            
                            <td id="user{{$user->user}}" >{{$user->user}}</td>
                            <td id="email{{$user->email}}">{{$user->email}}</td>
                            <td id="type{{$user->type}}">{{$user->type}}</td>
                            <td id="active{{$user->active}}">{{$user->active}}</td>
                            <td id="estatus{{$user->estatus}}">{{$user->estatus}}</td>
                            <td><center><a href="#" onclick="confirmDeleted('deleted{{$user->id}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$user->id}}" onclick="edit('/getUpdateUser/{{$user->id}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                        {!! Html::modalDeleted($user->id, 'deleted'.$user->id, '/deletedUser/'.$user->id) !!}
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$users->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>