    <?php 
      $num_commit =0; 
      if (isset($id_Not) && !empty($id_Not)) 
      {
         $id = $id_Not;
      }else 
      {
        $id = $notice->id_Not;
      } 

      if(isset($page) && !empty($page)) 
      {
        $page = $page;
      }else
      {
        $page=4;
      }

      if(isset($pref) && !empty($pref)) 
      {
        $pref = $pref;
      }else
      {
        $pref = '';
      }
    ?>
  <div class="panel panel-body" id="commits_{{$pref}}{{$id}}">
    <label>&nbsp;</label>
    <label><i class="fa fa-edit"></i>Comentarios:</label>
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

                <div id="answer_{{$pref}}{{$commit->id_com}}">
                  @include('front.ajax.03.answers')
                </div>
              </div><br>
              <div id="cont_answer{{$pref}}{{$commit->id_com}}">
                @if(Auth::check())

                  <button onclick="ajaxLoad_v2('/newAnswer/{{$commit->id_com}}','cont_answer{{$pref}}{{$commit->id_com}}');" class="btn-xs btn-info"><i class="fa fa-facebook"></i> responder</button>
                @else
                  <button onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="btn-xs btn-info"><i class="fa fa-facebook"></i> responder</button>
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
              @if(isset($pref) && empty($pref))
                <div class="row">
                  <div id="new_commit_{{$id}}"></div>
                  {!! Form::open(['url' => '#', 'id' => "form_$pref$id", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                    {!! Form::hidden('id', $id) !!}
                    {!! Form::textArea_("commit_$pref$id", "commit_$id", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
                    {!! Form::submit_('comentar',  ['class' => 'btn-xs btn-success', 'id'=>"submit_$pref$id", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
                  {!! Form::close() !!}
                  <script type="text/javascript">
                    $(document).ready( function()
                    {
                      sendForm_commit("submit_{{$pref}}{{$id}}", "/newCommitFront", "form_{{$pref}}{{$id}}", "commits_{{$pref}}{{$id}}");  
                    }); 
                  </script>
                </div>
            @endif
          @else
              <label><i class="fa fa-edit"></i>Comentarios:</label>
              <div class="panel panel-body">
                <textarea onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="form-control" cols="" rows="2" name="commit" placeholder=" comente aqui.."></textarea>
              </div>
          @endif
                
    </div>
  </div>

