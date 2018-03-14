
<div class="panel panel-body">
   <div class="row">
      {!! Form::open(['url' => '#', 'id' => "form_answer_$id_com", 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
        {!! Form::hidden('id', $id_com) !!}
        {!! Form::hidden('modal', true) !!}
        {!! Form::textArea_("commit_$id_com", "commit_$id_com", null, "<".Auth::User()->name."> ".trans('placeholder.basic'), trans('title.input_description'), 1, $errors, array(0,10,2)) !!}
        {!! Form::submit_('responder',  ['class' => 'btn-xs btn-info', 'id'=>"submit_$id_com", 'title'=>'enviar', 'fa'=>'fa-rss']) !!} 
      {!! Form::close() !!}
      <script type="text/javascript">
        $(document).ready( function()
        {
          sendForm_commit("submit_{{$id_com}}", "/newAnswerFront", "form_answer_{{$id_com}}", "answer_modal{{$id_com}}");  
        }); 
      </script>
    </div>                                         
</div>