<div class="panel panel-body">
   <div class="row">
                  
                  {!! Form::open(['url' => '#', 'id' => "form_answer_$id_not", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
                    {!! Form::hidden('id', $id_not) !!}
                    {!! Form::textArea_("commit_$id_not", "commit_$id_not", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
                    {!! Form::submit_('responder',  ['class' => 'btn-xs btn-info', 'id'=>"submit_$id_not", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
                  {!! Form::close() !!}
                  <script type="text/javascript">
                    $(document).ready( function()
                    {
                      sendForm_commit("submit_{{$id_not}}", "/newAnswerFront", "form_answer_{{$id_not}}", "answer_{{$id_not}}");  
                    }); 
                  </script>
                </div>           
</div>