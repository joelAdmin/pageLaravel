<?php
    namespace App\MyClass;
    Class Functions 
    {
    	public static function f_hour()
		{
			$hora= @getdate(time());
			$hora_reg=$hora["hours"].":".$hora["minutes"].":".$hora["seconds"];
			return $hora_reg;
		
		}

		Public static function renameImg($prefijo, $formato)
		{

			$codigo=$prefijo.''.rand();
			$nombreArchivo=$codigo.'.'.$formato; //para que todas la imagenes esten en el mismo formato
			return $nombreArchivo;	
		}

		public static function f_random($longitud)
		{ 

		}

    }