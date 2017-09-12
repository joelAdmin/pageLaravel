{!! Html_::modalFieldset('login', 'col-md-5 col-md-offset-4', array("fa-lock", trans('label.legend_login'))) !!}
    @include('message.messageDanger')        
    {!! Form::open(['url' => '/login', 'id' => 'login_form', 'class' => 'form-horizontal', 'method' => 'post', 'files' => false]) !!}
      {{ csrf_field() }}
      {!! Form::text_('user','user', trans('label.user'), trans('placeholder.basic'), trans('title.input_user'), 1, $errors, array(4,6)) !!}
      {!! Form::password_('passwd','passwd', trans('label.passwd'), trans('placeholder.basic'), trans('title.input_passwd'), 1, $errors, array(4,6)) !!}
        
      {!! Form::submit(trans('button.login'), ['id' =>'submitSession', 'title' => 'Entrar ...', 'class' => 'btn btn-info']) !!}
     
    {!! Form::close() !!} 
{!! Html_::closeModalFieldset() !!}                
               

  