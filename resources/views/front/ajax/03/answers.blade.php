<?php $j=0; ?>
 @foreach($answers as $answer)
                              
                                <?php $j++; ?>
                                @if($j < 10)
                                  <small style="margin-left: 15px;" class="btn-default">
                                    <u class="btn-default"><i class="fa fa-user"></i>  <b> [{{$answer->name}}]</b></u>
                                    <i>{!! $answer->commit !!} </i>
                                  </small>
                                  @if($j == 9)
                                    <b>ver anteriores</b>
                                    @break
                                  @endif
                                @endif
                              
                            @endforeach