<?php $num_answer=0; ?>
@foreach($answers as $answer)
  <?php $num_answer++; ?>
    @if($num_answer < 10)
      <small style="margin-left: 15px;" class="btn-default">
        <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$answer->name}}]</b></u>
        <i>{!! $answer->commit !!} </i>
      </small>
      @if($num_answer == 9)
          <div id="answer_ant{{$answer->id_com}}"><i class="fa fa-eye"><a href="#"> ver ateriores <b>()</b><a></i></div>
      @endif
    @endif                          
@endforeach 

<script type="text/javascript">
  $(document).ready(function () {
  $('#answer_ant{{$id_com}}').html('<i class="fa fa-eye"><a href="#">  ver ateriores <b>({{$num_answer - 9}})</b><a></i>');                   
  });
</script>