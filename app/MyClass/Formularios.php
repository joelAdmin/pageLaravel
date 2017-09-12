<?php
    namespace App\MyClass;
    Class Formularios 
    {
    	
    	Public static function textArea_ck($id, $nombre, $placeholder, $ayuda,  $obligatorio, $errors=array(), $size=array())
		{
			
			echo '<div id="div_'.$id.'" class="form-group ">';
			

			echo '<div class="col-sm-'.$size[0].' "><textarea class="form-control ckeditor" value="" cols="80" id="'.$id.'" name="'.$nombre.'" rows="10" title="'.$ayuda.'" placeholder="'.$placeholder.'">'.old($nombre).'</textarea>';
			 
			if(!empty($errors[0]))
	        {
	              //has-feedback alert alert-danger alert-dismissable
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group has-error has-feedback alert alert-danger");
	                  </script>';
	            echo ' <span id="span_'.$id.'" class="help-block">'.$errors[0].'</span>';
	        }else
	        {
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group");
	                  </script>';
	        }
			 
			echo '</div></div>';
		}

    	Public static function check($id, $nombre, $etiqueta, $ayuda,  $post=null, $opciones, $obligatorio, $errors=array(), $size=array())
		{
		
			echo '<div id="div_'.$id.'" class="form-group">';

			echo '<label for="inputEmail3" class="col-md-'.$size[0].' control-label">'.$etiqueta;
			if($obligatorio == 1) {echo '<b style="color:red;"> *</b>';}
			echo '</label>';

			echo'<div class="col-md-'.$size[1].' ">';
			$i=0;
			
			foreach ($opciones as $key => $value) 
			{
				$i++;
				//echo '<script type="text/javascript">alert("'.$key.'='.$post.'");</script>';
				//if((!Empty($post)) && ($post == $key))
				if($post == $key)
				{
					echo '<input type="radio" name="'.$nombre.'" id="'.$id.''.$i.'" value="'.$key.'" checked />'.$value.'&nbsp;&nbsp;';
				}else
				{
					echo '<input type="radio" name="'.$nombre.'" id="'.$id.''.$i.'" value="'.$key.'" />'.$value.'&nbsp;&nbsp;';
					
				}
			}
			
			if(!empty($errors[0]))
	        {
	              //has-feedback alert alert-danger alert-dismissable
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group has-error has-feedback alert alert-danger");
	                  </script>';
	            echo ' <span id="span_'.$id.'" class="help-block">'.$errors[0].'</span>';
	        }else
	        {
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group");
	                  </script>';
	        }

			echo '</div></div>';
		}

		public static function select_($id, $nombre, $placeholder, $ayuda,  $post=null, $opciones=array(), $obligatorio)
		{
			

			echo '<select class="form-control" name="'.$nombre.'" id="'.$id.'" title="'.$ayuda.'" '; if($obligatorio == 2) {echo 'required';} echo '>';
			echo '<option value="">'.$placeholder.'</option>';
			foreach($opciones as $key => $value)
			{

				if((!Empty($post)) && ($post==$key))
				{
					echo '<option value="'.$key.'" selected>'.$value.'</option>';
				}else
				{ 
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			}

			echo '</select>';


			
		}

    	public static function select($id, $nombre, $etiqueta, $placeholder, $ayuda,  $post=null, $opciones=array(), $obligatorio, $errors=array(), $size=array())
		{
			echo '<div id="div_'.$id.'" class="form-group">';

			echo '<label for="email" class="col-md-'.$size[0].' control-label">'.$etiqueta.'';
                   if($obligatorio == 1) {echo '<b style="color:red;"> *</b>';}
                echo'
                    </label>
                    <div class="col-md-'.$size[1].'">';

			echo '<select class="form-control" name="'.$nombre.'" id="'.$id.'" title="'.$ayuda.'" '; if($obligatorio == 2) {echo 'required';} echo '>';
			echo '<option value="">'.$placeholder.'</option>';
			foreach($opciones as $key => $value)
			{

				if((!Empty($post)) && ($post==$key))
				{
					echo '<option value="'.$key.'" selected>'.$value.'</option>';
				}else
				{ 
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			}

			echo '</select>';


			if(!empty($errors[0]))
	        {
	              //has-feedback alert alert-danger alert-dismissable
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group has-error has-feedback alert alert-danger");
	                  </script>';
	            echo ' <span id="span_'.$id.'" class="help-block">'.$errors[0].'</span>';
	        }else
	        {
	            echo '<script type="text/javascript"> 
	                    $("#div_'.$id.'").attr("class", "form-group");
	                  </script>';
	        }

	        echo '	</div>
							</div>';
			
		}

		public static function text_($id, $nombre,  $placeholder, $ayuda,  $obligatorio,  $tipo)
    	{
			echo '<input id="'.$id.'" type="'.$tipo.'" class="form-control" name="'.$nombre.'" title="'.$ayuda.'" placeholder="'.$placeholder.'" value="'.old($nombre).'"'; if($obligatorio == 1) {echo 'required';} echo '>';                   	      
    	}

    	public static function text($id, $nombre, $etiqueta, $placeholder, $ayuda,  $obligatorio, $errors=array(), $size=array(), $tipo)
    	{
				echo '<div id="div_'.$id.'" class="form-group">';
			 	echo '<label for="email" class="col-md-'.$size[0].' control-label">'.$etiqueta.'';
                        if($obligatorio == 1) {echo '<b style="color:red;"> *</b>';}
                        echo'
                            </label>
                            <div class="col-md-'.$size[1].'">
                                <input id="'.$id.'" type="'.$tipo.'" class="form-control" name="'.$nombre.'" title="'.$ayuda.'" placeholder="'.$placeholder.'" value="'.old($nombre).'"'; if($obligatorio == 2) {echo 'required';} echo '>';
                              	
                              
	                            if(!empty($errors[0]))
	                            {
	                            	//has-feedback alert alert-danger alert-dismissable
	                            	echo '<script type="text/javascript"> 
	                            				$("#div_'.$id.'").attr("class", "form-group has-error has-feedback alert alert-danger");
	                            				$("#div_'.$id.'").focus(function() {
  													$(this).blur();
												});
	                            				
				    					  </script>';
	                            	echo ' <span id="span_'.$id.'" class="help-block">'.$errors[0].'</span>';
	                            }else
	                            {
	                            	echo '<script type="text/javascript"> 
	                            				$("#div_'.$id.'").attr("class", "form-group");
	                           			 </script>';
	                            }
                            
                        	echo'
                        	</div>
                    </div>';
    	}

    	Public static function btn_($id, $clase, $fa=null, $etiqueta)
		{
			echo '<button type="button" id="'.$id.'" class="'.$clase.'"><i class="fa '.$fa.'"></i> '.$etiqueta.'</button>';
		}

    	Public static function btnSubmit_($id, $clase, $etiqueta)
		{
			echo '<button type="submit" id="'.$id.'" class="'.$clase.'">'.$etiqueta.'</button>';
		}

    	Public static function btSubmit($clase, $etiqueta)
		{
			echo '<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="'.$clase.'">'.$etiqueta.'</button>
					</div>
				 </div>';
		}

		Public static function form($id, $clase=null, $nombre, $metodo, $action, $tipo=null)
		{
			echo "<form id=\"$id\"class=\"$clase\" role=\"form\" method=\"$metodo\" action=\"$action\"  enctype=\"$tipo\">";
		}

		Public static function closeForm()
		{
			echo '</form>';
		}

    }