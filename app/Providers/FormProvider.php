<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormBuilder as Form;
use Illuminate\Support\Facades\Storage;

class FormProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('textArea_ck', function ($id, $name, $placeholder, $help, $require, $errors, $size=array())
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }
                //$comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
                //$comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
                $comp .= '<div class="col-md-'.$size[0].'">'; 
                //$comp .= Form::text($name, old($name), ['placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control']);
                $comp .= Form::textarea($name, null, ['id' =>$id, 'placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control ckeditor']);
            if($errors->first($name))
            {
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            }
            $comp .= '</div></div>';
            return $comp;
        });

        Form::macro('text_', function ($id, $name, $label, $placeholder, $help, $require, $errors, $size=array())
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }
                //$comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
                $comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
                $comp .= '<div class="col-md-'.$size[1].'">';
                $comp .= Form::text($name, old($name), ['id' => $id, 'placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control']);
            
            /*$comp .= '<span id="span_'.$id.'" class="help-block">';
            if($errors->first($name)){ $errors->first($name); }

            $comp .= '</span>';*/
             $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            
            $comp .= '</div></div>';
            return $comp;
        });

        Form::macro('password_', function ($id, $name, $label, $placeholder, $help, $require, $errors, $size=array())
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }
                //$comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
                $comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
                $comp .= '<div class="col-md-'.$size[1].'">';
                //$comp .= Form::text($name, old($name), ['id' =>'id_'.$name, 'placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control']);
                $comp .=  Form::password($name, ['id' => $id, 'placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control']);
            /*if($errors->first($name))
            {
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            }*/
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            $comp .= '</div></div>';
            return $comp;
        });

        Form::macro('file_', function ($id, $name, $label, $placeholder, $help, $require, $errors, $size=array(), $image=null)
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }
                //$comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
                $comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
                $comp .= '<div class="col-md-'.$size[1].'">';
                $comp .= Form::file($name, ['id' =>$id, 'placeholder' => ''.$placeholder.'', 'title' => ''.$help.'', 'class' => 'form-control']);
            /*if($errors->first($name))
            {
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            Storage::disk("imgNotice")->exists("GVFDSG.png") Storage::url("GVFDSG.png") Storage::get('file.jpg');Storage::disk("imgNotice")->get(storage_path("app/img/GVFDSG.png" . $venta->imagen))
            }*/
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span></div>';
            if ($image) 
            {
                $comp .= '<div id="div_img_'.$id.'" class="form-group"><img width="200" height="150" src="'.$image.'" alt="..." class="img-thumbnail"></div>';
            }
            
           
            return $comp;
        });

        Form::macro('select_', function ($id, $name, $label, $placeholder=null, $help, $data, $selected=null, $require, $errors, $size=array())
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }


           // $comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
            $comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
            $comp .= '<div class="col-md-'.$size[1].'">';
            $comp .= Form::select($name, $data, $selected, ['id' => $id, 'placeholder' => ''.$placeholder.' ...', 'title' => ''.$help.'', 'class' => 'form-control']);
            /*if($errors->first($name))
            {
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            }*/
            $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            $comp .= '</div></div>';
            return $comp;
        });

        Form::macro('radio_', function ($id, $name, $label, $help, $data, $require, $errors, $size=array())
        {
            if($errors->first($name)) 
            {
                $comp = '<div id="div_'.$id.'" class="form-group has-error has-feedback alert alert-danger">';
            }else 
            {
                $comp = '<div id="div_'.$id.'" class="form-group">';
            }
                // $comp .= Form::label($name, $label, ['for' => "email", 'class' => 'col-md-'.$size[0].' control-label']);
            $comp .= '<label for="email" class="col-md-'.$size[0].' control-label">'.$label.'';if($require == 1) {$comp .=  '<b style="color:red;"> *</b>';}$comp .= '</label>';
            $comp .= '<div class="col-md-'.$size[1].'">';
            //$comp .= Form::radio($name, $data, true, ['title' => ''.$help.'', 'class' => 'form-control']);
            $i=0;
            foreach ($data as $key => $value) 
            {
                $i++;
                $comp .= Form::radio($name, $key, false, ['id' => $i.'_'.$id, 'title' => ''.$help.'']).'&nbsp;'.$value.'<br>';
            }
            /*
            if($errors->first($name))
            {
                $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
            }*/
                $comp .= '<span id="span_'.$id.'" class="help-block">'.$errors->first($name).'</span>';
                $comp .= '</div></div>';
                return $comp;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
