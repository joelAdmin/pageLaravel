<?php 
  $num_answer=0;
  if(isset($id_com) && !empty($id_com)) {$id = $id_com;}else {$id = $commit->id_com;}   
?>
 <div id="answer_modal_{{$id}}">
<div class="panel panel-body">
    <div class="panel panel-head" id=""><label><i class="fa fa-edit"></i>Comentarios:</label></div>
    <div class="panel" id="">
      <blockquote class=" fija bs-callout-success btn-xs primary">
          <div class="bs-text">
            <small><u class="btn-success"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                 {!! $commit->commit !!}
            </small>
           <div id="answer_modal_2{{$id}}">
              @foreach($answers as $answer)
                @if($answer->id_com==$id)
                  <?php $num_answer++; ?>
                      <small style="margin-left: 15px;" class="btn-default">
                        <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$answer->name}}]</b></u>
                        <i>{!! $answer->commit !!} </i>
                      </small>
                @endif                          
              @endforeach
            <div id="answer_modal_2{{$id}}">
          </div>
      </blockquote>
      <div id="cont_answer_modal_2{{$id}}">
        @if(Auth::check())
            
          <div class="panel panel-body">
             <div class="row">
                {!! Form::open(['url' => '#', 'id' => "form_answer_$id", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                  {!! Form::hidden('id', $id) !!}
                  {!! Form::hidden('modal', true) !!}
                  {!! Form::textArea_("commit_$id", "commit_$id", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
                  {!! Form::submit_('responder',  ['class' => 'btn-xs btn-info', 'id'=>"submit_$id", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
                {!! Form::close() !!}
                <script type="text/javascript">
                  $(document).ready( function()
                  {
                    sendForm_commit("submit_{{$id}}", "/newAnswerFront", "form_answer_{{$id}}", "answer_modal_2{{$id}}");  
                  }); 
                </script>
              </div>                                         
          </div>
        @else
          <button onclick="ajaxLoadModal('/loginFront', 'content_modal', 'modalShow');" class="btn-xs btn-info"><i class="fa fa-facebook"></i> responder</button>
        @endif
      </div>
    </div>
</div>
 </div>
    
    <script type="text/javascript">
      $(document).ready(function () {
        $('#answer_ant{{$id}}').html('<i class="fa fa-eye"><a  onclick="ajaxLoadModal(\'/viewAnswers/{{$answer->id_com}}\', \'content_modal-lg\', \'modalShow_lg\');"href="#">  ver ateriores <b>({{$num_answer - 9}})</b><a></i>');                   
      });
    </script>