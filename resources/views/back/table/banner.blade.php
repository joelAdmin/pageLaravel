<div class="panel-body">Total de registro <b>{{$banners->total()}}</b> Pag <b>{{$banners->currentPage()}}</b> de <b></b><br></div>
 @if (isset($menssage_warning) )
 <div class="panel-body col-md-auto">
    <div class="alert alert-warning alert-dismissable"><i class="fa fa-info-circle"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <a href="#" class="alert-link"></a>
          {{$menssage_warning}}
    </div>
 </div>
@endif
@if (isset($banners) )
<table class=" table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>#</center></th>
                            <th><center>{{trans('label.image')}}</center></th>
                            <th><center>{{trans('label.title')}}</center></th>
                            <th><center>{{trans('label.active')}}</center></th>
                            
                            <th> </th>
                            <th></th>

                        </tr>
                    </thead> 
                    <?php $i=$banners->firstItem(); ?>
                    <tbody>               
                      @foreach($banners as $banner)
                       <tr id="tr_{{$banner->id_Ban}}" data-id="{{$banner->id_Ban}}">
                            <td id="cont"><center><b>{{$i++}}</b></center></td>
                            
                            <td id="url_ban{{$banner->id_Ban}}"><img width="200" height="100" src="{{ asset('/storage/banner/images') }}/{{$banner->url_ban}}"> </td>
                            <td id="title_ban{{$banner->id_Ban}}" >{{$banner->title_ban}}</td>
                            <td id="status_ban{{$banner->id_Ban}}">{{$banner->status_ban}}</td>
                            <td id="content_ban{{$banner->id_Ban}}">{!! $banner->content_ban !!}</td>
                            <td><center><a href="#" onclick="confirmDeleted('deleted{{$banner->id_Ban}}');" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></center></td>
                           
                            <td><center><a href="#" id="edit_{{$banner->id_Ban}}" onclick="edit('/getUpdateBanner/{{$banner->id_Ban}}');" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Editar</a></center></td>
                        </tr>
                        {!! Html::modalDeleted($banner->id_Ban, 'deleted'.$banner->id_Ban, '/deletedBanner/'.$banner->id_Ban) !!}
                      @endforeach
                    </tbody>
</table>
@endif
<div class="pull-right">{!! str_replace('/?','?',$banners->appends(Request::all())->render()) !!}</div>
<script> $('.pagination a').on('click', function (event) { event.preventDefault(); ajaxLoad($(this).attr('href')); }); </script>