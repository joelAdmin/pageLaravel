<?php 
  $num_answer=0;
  if (isset($id_com) && !empty($id_com)) {
     $id = $id_com;
   }else {
    $id = $commit->id_com;
   } 
   
?>
@foreach($answers as $answer)
  @if($answer->id_com==$id)
    <?php $num_answer++; ?>
        <small style="margin-left: 15px;" class="btn-default">
          <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$answer->name}}]</b></u>
          <i>{!! $answer->commit !!} </i>
        </small>
  @endif                          
@endforeach 



<script type="text/javascript">
                $(document).ready(function () {
                $('#answer_ant{{$id}}').html('<i class="fa fa-eye"><a  onclick="ajaxLoadModal(\'/viewAnswers/{{$answer->id_com}}\', \'content_modal-lg\', \'modalShow_lg\');"href="#">  ver ateriores <b>({{$num_answer - 9}})</b><a></i>');                   
                });
</script>