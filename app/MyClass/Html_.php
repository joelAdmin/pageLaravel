<?php
	namespace App\MyClass;
	use Illuminate\Support\Facades\Session;
	class Html_ 
	{
		
		Public static function menssage($fa=null)
		{
		  
			if(Session::has('menssage_info'))
			{
			   echo ' <div class="alert alert-info alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.Session::get("menssage_info").'</div>';
			}elseif (Session::has('menssage_danger')) 
			{
				echo ' <div class="alert alert-danger alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.Session::get("menssage_danger").'</div>';
			}elseif (Session::has('menssage_success')) 
			{
				echo ' <div class="alert alert-success alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.Session::get("menssage_success").'</div>';
			}
			
		}

		Public static function menssage_ajax($fa=null)
		{
		  		echo ' <div class="alert alert-danger alert-dismissable"><i class="fa "></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.$menssage_danger.'</div>';
			
		  	/*
			if(isset($menssage_info))
			{
			   echo ' <div class="alert alert-info alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.$menssage_info.'</div>';
			}elseif ($menssage_danger) 
			{
				echo ' <div class="alert alert-danger alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.$menssage_danger.'</div>';
			}elseif (isset($menssage_success)) 
			{
				echo ' <div class="alert alert-success alert-dismissable"><i class="fa '.$fa.'"></i>
			       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><a href="#" class="alert-link"></a>'.$menssage_success.'</div>';
			}*/
			
		}

		Public static function fieldset($id, $clas, $legend=array())
		{
		  echo'<div id="'.$id.'" class="panel panel-default legend">
		  		<div class="'.$clas.'">
                  <div class="panel-body">
                      <fieldset class="scheduler-border"><legend class="scheduler-border legend"><i class="fa '.$legend[0].'"></i> '.$legend[1].'</legend>';

		}

		Public static function closeFieldset()
		{
			echo '</fieldset></div></div></div>';
		}
		public static function modalFieldset($id, $clas, $legend=array(), $modal=true)
		{
			//col-md-5 col-md-offset-4  fa fa-lock
			if ($modal) 
			{
				echo'<script type="text/javascript">
    				$(document).ready(function() 
    				{
    					$("#'.$id.'").modal("show");
    				});
  				</script> ';
			}
			
			echo '<div style="display:None;" id="'.$id.'" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				      <div class="container">
				        <div class="row">
				          <div class="'.$clas.'">
				              <div class="panel panel-default">
				             
				                <div class="panel-body">
				                	<fieldset class="scheduler-border"><legend class="scheduler-border"><i class="fa '.$legend[0].'"></i>  '.$legend[1].' <button type="button" class="close" data-dismiss="modal">x</button></legend>
				                	    ';
		}

		public static function closeModalFieldset()
		{
			echo ' 
					</fieldset>
						</div>
			         		</div>
			        			</div>
			      					</div>
			    						</div>
											</div>';
		}

		public static function modal($id, $clas, $legend=array())
		{
			//col-md-5 col-md-offset-4  fa fa-lock
			echo'<script type="text/javascript">
    				$(document).ready(function() 
    				{
    					$("#'.$id.'").modal("show");
    				});
  				</script> ';
			echo '<div style="display:None;" id="'.$id.'" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      
				      <div class="container">
				        <div class="row">
				          <div class="'.$clas.'">
				              <div class="panel panel-default">
				                <div class="panel-heading"><i class="fa '.$legend[0].'"></i>  '.$legend[1].' <button type="button" class="close" data-dismiss="modal">x</button></div>
				                <div class="panel-body">';
		}

		public static function closeModal()
		{
			echo ' </div>
				   		</div>
							</div>
								</div>
									</div>
										</div>';
		}

	}