 <div class="panel-body">Total de registro <b>{{$notices->total()}}</b> Pag <b>{{$notices->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif

@if (isset($notices) )
                <table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>{{trans('label.image')}}</center></th>
                            <th><center>{{trans('label.title')}}</center></th>
                            <th><center>{{trans('label.author')}}</center></th>
                            <th><center>{{trans('label.notice')}}</center></th>
                            <th><center>{{trans('label.type')}}</center></th>
                            <th> </th>
                            <th></th>
                        </tr>
                    </thead> 
                    <?php 
                        $i=$notices->firstItem(); 
                    ?>
                    <tbody>               
                        @foreach($notices as $notice)
                            <tr id="tr_{{$notice->id_Not}}" data-id="{{$notice->id_Not}}">
                                <td id="cont"><center><b>{{$i++}}</b></center></td>
                                <td id="url_img{{$notice->id_Not}}">
                                   <img width="200" height="100" src="{{ asset('/storage/notice/images') }}/{{$notice->name_img}} "> 
                                </td>
                                <td id="title_not{{$notice->id_Not}}" >{{$notice->title_not}}</td>
                                <td id="author_not{{$notice->id_Not}}">{{$notice->author_not}}</td>
                                <td id="inlet_not{{$notice->id_Not}}">{!! $notice->inlet_not !!}</td>
                                <td id="type_not{{$notice->id_Not}}">{{$notice->type_not}}</td>
                                <td><center><a href="#" onclick="confirmDeleted('deleted{{$notice->id_Not}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                                <td><center><a href="#" id="edit_{{$notice->id_Not}}" onclick="edit('/getUpdate/{{$notice->id_Not}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                            </tr>
                            {!! Html::modalDeleted($notice->id_Not, 'deleted'.$notice->id_Not, '/deletedNotice/'.$notice->id_Not) !!}
                        @endforeach    
                    </tbody>
                </table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$notices->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>