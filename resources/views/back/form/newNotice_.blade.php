                  {!! Html_::menssage('fa-info-circle') !!}
                  
                  {!! Form_::form('notice_form', 'form-horizontal' ,'notice_form', 'POST', '/newNotice', 'multipart/form-data') !!}
                    {{ csrf_field() }} 

                    {!! Html_::fieldset('fieldset0', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_soucer'))) !!}
                      {!! Form_::text('id_author_not','author_not', trans('label.author'), trans('placeholder.basic'), trans('title.input_author'), 1, array($errors->first('author_not') ), array(2,6), 'text') !!}
                      {!! Form_::text('id_source_not','source_not', trans('label.soucer'), trans('placeholder.basic'), trans('title.input_soucer'), null, array($errors->first('source_not') ), array(2,6), 'text') !!}
                      {!! Form_::text('id_url_source','url_source_not', trans('label.url'), trans('placeholder.basic'), trans('title.input_url_soucer'), null, array($errors->first('url_source_not') ), array(2,6), 'text') !!}
                      {!! Form_::select('id_cat', 'id_cat', trans('label.category'), trans('placeholder.select'), trans('title.select_category'), null, $category, 1, array($errors->first('id_cat')), array(2,6) )!!}
                      {!! Form_::select('id_sco', 'id_sco', trans('label.scope'), trans('placeholder.select'), trans('title.select_scope'), null, $scope, 1, array($errors->first('id_sco')), array(2,6) )!!} 
                      {!! Form_::check('id_type_not', 'type_not', trans('label.type'), trans('title.check_type'), null, array('normal'=>trans('label.option0_type'), 'interest'=>trans('label.option1_type')), 1, array($errors->first('type_not')), array(2,6) )!!}
                      {!! Form_::check('id_estatus_not', 'estatus_not', trans('label.estatus'), trans('title.check_estatus'), null, array(1=>trans('label.option0_estatus'), 0=>trans('label.option1_estatus')), 1, array($errors->first('estatus_not')), array(2,6) )!!}  
                    {!! Html_::closeFieldset() !!} 

                    {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.info_notice'))) !!}
                      {!! Form_::text('id_anteater_not','anteater_not', trans('label.anteater'), trans('placeholder.basic'), trans('title.input_anteater'), null, array($errors->first('anteater_not') ), array(2,6), 'text') !!}
                      {!! Form_::text('id_title_not','title_not', trans('label.title'), trans('placeholder.basic'), trans('title.input_title'), 1, array($errors->first('title_not') ), array(2,6), 'text') !!}
                      {!! Form_::text('id_subtitle_not','subtitle_not', trans('label.subtitle'), trans('placeholder.basic'), trans('title.input_subtitle'), 1, array($errors->first('subtitle_not') ), array(2,6), 'text') !!}
                      {!! Form_::text('id_url_image','url_image', trans('label.image'), trans('placeholder.basic'), trans('title.input_image'), 1, array($errors->first('url_image') ), array(2,6), 'file') !!}
                      
                    {!! Html_::closeFieldset() !!}

                    {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_inlet'))) !!}
                      {!! Form_::textArea_ck('id_inlet_not','inlet_not', trans('placeholder.basic'), trans('title.input_inlet'), 1, array($errors->first('inlet_not')), array(14)) !!}
                    {!! Html_::closeFieldset() !!}

                    {!! Html_::fieldset('fieldse1', 'col-md-auto col-md-offset-0', array("fa-newspaper-o", trans('label.input_content'))) !!} 
                    {!! Form_::textArea_ck('id_content_not','content_not', trans('placeholder.basic'), trans('title.input_content'), 1, array($errors->first('content_not')), array(14)) !!}
                    {!! Html_::closeFieldset() !!}

                    {!! Form_::btSubmit('btn col-md-2 btn-info', trans('button.submit')) !!}       
                  {!! Form_::closeForm()!!}  
              

            