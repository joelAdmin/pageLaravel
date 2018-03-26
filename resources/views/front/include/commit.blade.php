  <?php 
      $num_commit =0; 
      if (isset($id_Not) && !empty($id_Not)) {$id = $id_Not;}else {$id = $notice->id_Not;} 
      if(isset($page) && !empty($page)){$page = $page;}else{$page=4;}
  ?>
  <div class="panel panel-body" id="commits_{{$id}}">
    <label>&nbsp;</label>
    <label><i class="fa fa-comments"></i> Comentarios:</label>
    <div id="">
      @foreach($commits as $commit)
        @if($commit->id_not==$id)
          <?php $num_commit++; ?>
          @if($num_commit < $page)
            <blockquote class=" fija bs-callout-success btn-xs primary">
              <div class="bs-text">
                          
                <small><u class="btn-success"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                 {!! $commit->commit !!}
                </small>

                <div id="answer_{{$commit->id_com}}">
                  @include('front.include.answers')
                </div>
              </div><br>
              <div id="cont_answer{{$commit->id_com}}">
                @if(Auth::check())
                  @can('create_commit')
                    <button onclick="ajaxLoad_v2('/newAnswer/{{$commit->id_com}}','cont_answer{{$commit->id_com}}');" class="btn-xs btn-info"><i class="fa fa-comment-alt"></i> responder bbb</button>
                  @endcan
                @else
                  <button onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="btn-xs btn-info"><i class="fa fa-comment-alt"></i> responder</button>
                @endif
              </div>
            </blockquote>
            @if($num_commit == ($page-1))
              <div id="commit_ant{{$id}}"></div>         
            @endif
          @endif
        @endif
      @endforeach
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#commit_ant{{$id}}').html('<i class="fa fa-eye"><a onclick="ajaxLoadModal(\'/viewCommits/{{$id}}\', \'content_modal-lg\', \'modalShow_lg\');" href="#">  ver ateriores <b>({{$num_commit - 3}})</b><a></i> ');        
        $('#num_commit{{$id}}').html('{{$num_commit}}');//?//modica para el total de comentarios
      });
    </script>

    <div id="cont_commit{{$id}}"></div>
    <div class="panel panel-body">
          @if(Auth::check())
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
                      sendForm_id("submit_{{$id}}", "/newCommitFront", "form_{{$id}}", "commits_{{$id}}");  
                    }); 
                  </script>
                </div>
          @else
              <label><i class="fa fa-edit"></i>Comentarios:</label>
              <div class="panel panel-body">
                <textarea onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="form-control" cols="" rows="2" name="commit" placeholder=" comente aqui.."></textarea>
              </div>
          @endif
                
    </div>
  </div>

