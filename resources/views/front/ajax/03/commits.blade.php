<?php $i=0; $k=0; ?>
@foreach($commits as $commit)
  <?php $i++; ?>
    @if($i < 4)
      <blockquote class=" fija bs-callout-success btn-xs primary">
        <div class="bs-text">{{$commit->id_com}}
          <u class="btn-info"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
          <small>{!! $commit->commit !!}</small>

           <div id="answer_{{$commit->id_com}}">
                            @foreach($answers as $answer)
                              @if($answer->id_com==$commit->id_com)
                                <?php $k++; ?>
                                @if($k < 10)
                                  <small style="margin-left: 15px;" class="btn-default">
                                    <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$commit->name}}]</b></u>
                                    <i>{!! $answer->commit !!} </i>
                                  </small>
                                  @if($k == 9)
                                    <b>ver anteriores</b>
                                    @break
                                  @endif
                                @endif
                              @endif
                            @endforeach
                          </div>

        </div>
        <div id="cont_answer{{$commit->id_com}}">
                          <button onclick="ajaxLoad_v2('/newAnswer/{{$commit->id_com}}','cont_answer{{$commit->id_com}}');" class="btn-xs btn-info">{{$commit->id_com}}Responder</button>
        </div>
      </blockquote>
    @if($i == 3)
      <b>ver anteriores</b>
      @break
    @endif
     @endif               
@endforeach