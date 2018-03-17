<?php 
  $num_answer=0;
  if (isset($id_com) && !empty($id_com)) {$id = $id_com;}else {$id = $commit->id_com;}
  if(isset($page_asnwer) && !empty($page_asnwer)){$page_asnwer = $page_asnwer;}else{$page_asnwer=10;} 
   
?>
@foreach($answers as $answer)
  @if($answer->id_com==$id)
    <?php $num_answer++; ?>
      @if($num_answer < $page_asnwer)
        <small style="margin-left: 15px;" class="btn-default">
          <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$answer->name}}]</b></u>
          <i>{!! $answer->commit !!} </i>
        </small>
        @if($num_answer == ($page_asnwer - 1))
            <div id="answer_ant{{$answer->id_com}}">
              
            </div>    
        @endif 
      @endif
  @endif                          
@endforeach 

<script type="text/javascript">
                $(document).ready(function () {
                $('#answer_ant{{$id}}').html('<i class="fa fa-eye"><a  onclick="ajaxLoadModal(\'/viewAnswers/{{$id}}\', \'content_modal-lg\', \'modalShow_lg\');"href="#">  ver ateriores <b>({{$num_answer - 9}})</b><a></i>');                   
                });
</script>