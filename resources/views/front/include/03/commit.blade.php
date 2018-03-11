@if(Auth::check())
    <?php  $num_commit =0; ?>
    <label>&nbsp;</label>
    <label><i class="fa fa-edit"></i>Comentariosss:</label>
    <div id="commits_{{$notice->id_Not}}">
      @foreach($commits as $commit)
        @if($commit->id_not==$notice->id_Not)
          <?php $num_commit++; ?>
          @if($num_commit < 4)
            <blockquote class=" fija bs-callout-success btn-xs primary">
              <div class="bs-text">
                          
                <small><u class="btn-success"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                  {!! $commit->commit !!}
                </small>

                <div id="answer_{{$commit->id_com}}">
                  <?php $num_answer=0; ?>
                  @foreach($answers as $answer)
                    @if($answer->id_com==$commit->id_com)
                      <?php $num_answer++; ?>
                      @if($num_answer < 10)
                        <small style="margin-left: 15px;" class="btn-default">
                          <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                          <i>{!! $answer->commit !!} </i>
                        </small>
                        @if($num_answer == 9)
                          <div id="answer_ant{{$commit->id_com}}"></div>       
                        @endif
                      @endif
                    @endif
                  @endforeach
                </div>
              </div><br>
              <div id="cont_answer{{$commit->id_com}}">
                <button onclick="ajaxLoad_v2('/newAnswer/{{$commit->id_com}}','cont_answer{{$commit->id_com}}');" class="btn-xs btn-info"><i class="fa fa-facebook"></i> responder</button>
              </div>
            </blockquote>
            <script type="text/javascript">
              $(document).ready(function () {
                $('#answer_ant{{$commit->id_com}}').html('<i class="fa fa-eye"><a href="#">  ver ateriores <b>({{$num_answer - 9}})</b><a></i> ');
                          //$('#answer_total{{$commit->id_com}}').html('<i class="fa fa-eye"><a href="#">  total<b>({{$num_answer}})</b><a></i> ');
              });
            </script>
            @if($num_commit == 3)
              <div id="commit_ant{{$notice->id_Not}}"></div>         
            @endif
          @endif
        @endif
      @endforeach
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#commit_ant{{$notice->id_Not}}').html('<i class="fa fa-eye"><a href="#"> {{$num_commit}} ver ateriores <b>({{$num_commit - 3}})</b><a></i> ');
                  
        $('#num_commit{{$notice->id_Not}}').html('{{$num_commit}}');//?//modica para el total de comentarios
      });
    </script>

    <div id="cont_commit{{$notice->id_Not}}"></div>
    <div class="panel panel-body">
                <div class="row">
                  <div id="new_commit_{{$notice->id_Not}}"></div>
                  {!! Form::open(['url' => '', 'id' => "form_$notice->id_Not", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                    {!! Form::hidden('id', $notice->id_Not) !!}
                    {!! Form::textArea_("commit_$notice->id_Not", "commit_$notice->id_Not", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
                    {!! Form::submit_('comentar',  ['class' => 'btn-xs btn-success', 'id'=>"submit_$notice->id_Not", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
                  {!! Form::close() !!}
                  <script type="text/javascript">
                    $(document).ready( function()
                    {
                      sendForm_commit("submit_{{$notice->id_Not}}", "/newCommitFront", "form_{{$notice->id_Not}}", "commits_{{$notice->id_Not}}");  
                    }); 
                  </script>
                </div>
                <!--<div class="row">
                  <div class="from-group">
                    <div class="col-md-6">
                      <a href="#" onclick="ajaxLoad_v2('/newCommitFront/'+$('#commit{{$notice->id_Not}}').val()+'/{{$notice->id_Not}}',  'cont_commit{{$notice->id_Not}}');" class="btn-xs btn-success"><i class="fa fa-rss"></i> comentar</a>
                    </div>
                  </div> 
                </div>-->
    </div>
@else
    <label><i class="fa fa-edit"></i>Comentarios:</label>
    <div class="panel panel-body">
      <textarea onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="form-control" cols="" rows="2" name="commit" placeholder=" comente aqui.."></textarea>
    </div>
@endif