<?php

namespace App\Http\Controllers;
use Auth;
//use App\models\User\User;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
       if(!config("services.$provider")) abort('404');
       return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function callback($provider)
    {
        try{
            $socialite = Socialite::driver($provider)->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return redirect()->to('/');
        }

        $attributes = [
            'provider'    => $provider,
            'provider_id' => $socialite->getId(),
            'avatar'      => $socialite->getAvatar(),
            'user'        => $socialite->getEmail(),
            'name'        => $socialite->getName(),
            'email'       => $socialite->getEmail(),
            'password'    => bcrypt(str_random(16)) // creamos contraseña por default 
        ];

        $user = User::where('provider_id', $socialite->getId() )->first(); //consultamos si existe provider_id
        if(!$user) 
        {
        	try{

        		if (isset($attributes['email'])) {
                    // Validamos que el correo electronico del usuario no este repetido
                    Validator::make(['email' => $attributes['email']], [
                        'email' => 'unique:users,email'
                    ])->validate();
                }
                // creamos el nuevo usuario
                $user = User::create($attributes);
        	}catch(ValidationException $e){

        		return redirect()->to('/');
        	}
        }
      	return $this->authAndRedirect($user); // Login y redirección
    }

    public function authAndRedirect($user)
    {
        Auth::login($user);
        return redirect()->to('/');
    }
}
