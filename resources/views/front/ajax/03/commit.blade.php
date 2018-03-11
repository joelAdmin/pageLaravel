@if(Auth::check())
    <?php  $num_commit =0; ?>
    <?php 
      
      if (isset($id_Not) && !empty($id_Not)) {
         $id = $id_Not;
       }else {
        $id = $notice->id_Not;
       } 
    ?>
    <label>&nbsp;</label>
    <label><i class="fa fa-edit"></i>Comentarios:</label>
    <div id="">
      @foreach($commits as $commit)
        @if($commit->id_not==$id)
          <?php $num_commit++; ?>
          @if($num_commit < 4)
            <blockquote class=" fija bs-callout-success btn-xs primary">
              <div class="bs-text">
                          
                <small><u class="btn-success"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                  {!! $commit->commit !!}
                </small>

                <div id="answer_{{$commit->id_com}}">
                  @include('front.ajax.03.answers')
                </div>
              </div><br>
              <div id="cont_answer{{$commit->id_com}}">
                <button onclick="ajaxLoad_v2('/newAnswer/{{$commit->id_com}}','cont_answer{{$commit->id_com}}');" class="btn-xs btn-info"><i class="fa fa-facebook"></i> responder</button>
              </div>
            </blockquote>
            @if($num_commit == 3)
              <div id="commit_ant{{$id}}"></div>         
            @endif
          @endif
        @endif
      @endforeach
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#commit_ant{{$id}}').html('<i class="fa fa-eye"><a href="#">  ver ateriores <b>({{$num_commit - 3}})</b><a></i> ');
                  
        $('#num_commit{{$id}}').html('{{$num_commit}}');//?//modica para el total de comentarios
      });
    </script>

    <div id="cont_commit{{$id}}"></div>
    <div class="panel panel-body">
                <div class="row">
                  <div id="new_commit_{{$id}}"></div>
                  {!! Form::open(['url' => '#', 'id' => "form_$id", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                    {!! Form::hidden('id', $id) !!}
                    {!! Form::textArea_("commit_$id", "commit_$id", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
                    {!! Form::submit_('comentar',  ['class' => 'btn-xs btn-success', 'id'=>"submit_$id", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
                  {!! Form::close() !!}
                  <script type="text/javascript">
                    $(document).ready( function()
                    {
                      sendForm_commit("submit_{{$id}}", "/newCommitFront", "form_{{$id}}", "commits_{{$id}}");  
                    }); 
                  </script>
                </div>
                
    </div>
@else
    <label><i class="fa fa-edit"></i>Comentarios:</label>
    <div class="panel panel-body">
      <textarea onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="form-control" cols="" rows="2" name="commit" placeholder=" comente aqui.."></textarea>
    </div>
@endif