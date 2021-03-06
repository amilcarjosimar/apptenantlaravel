@extends('layouts.app2')
<!--<link rel="stylesheet" href="https://www.agronielsen.com/encampo/public/css/material/style.css">-->
<link rel="stylesheet" href="{{ url('css/material') }}/style.css"/>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Datepicker Files -->
<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
@section('content')
    <h3 class="page-title">@lang('global.tenants.title')</h3>
     <a href="{{ route('admin.tenants.index') }}" class="btn btn-success">@lang('global.app_back_to_list')</a>
    
    {!! Form::model($tenant, ['method' => 'PUT', 'route' => ['admin.tenants.update', $tenant->id], 'files' => true,]) !!}

    <div class="panel panel-default" style="padding:20px;padding-bottom:0px;">
        <div class="panel-heading" style="font-size:18px;font-weight:700;">
        Inquilino

        
                      
                         
                        
                                Usuario Desactivado<br/>
                                <b>Fecha fin contrato:</b><br/>
                                <h3>
                                    <b>{{date('d/F/Y', strtotime($tenant->fecha_fin_contrato))}}</b>
                                </h3>
                               
          

          
                                <div class="checkbox">
                                       <input type="checkbox" onchange="javascript:showContent2()" name="uncheck" id="uncheck">
                                       <label for="uncheck">Reactivar Inquilino</label>
                                     

                                    
                                </div>
                      


                              
           
                  
            
        </div>     

        <div class="panel-body">
            <!--Tenant-->
                <div class="row">
                    <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_inicio_contrato', trans('global.tenants.fields.fecha_inicio_contrato').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('fecha_inicio_contrato', old('fecha_inicio_contrato'), ['class' => 'form-control datepicker', 'placeholder' => 'Fecha inicio contrato', 'required' => '']) !!}
                        <p class="help-block"></p>
                            @if($errors->has('fecha_inicio_contrato'))
                            <p class="help-block">
                            {{ $errors->first('fecha_inicio_contrato') }}
                            </p>
                            @endif

                         <!-- <div class="form-group">
                            <label for="date">Fecha</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fechaproximavisita">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>-->

                        {!! Form::label('duracion_contrato', trans('global.tenants.fields.duracion_contrato').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('duracion_contrato', old('duracion_contrato'), ['class' => 'form-control', 'placeholder' => 'Duraci??n del contrato', 'required' => '']) !!}
                        <p class="help-block"></p>
                            @if($errors->has('duracion_contrato'))
                            <p class="help-block">
                            {{ $errors->first('duracion_contrato') }}
                            </p>
                            @endif
            
                    </div>
                    <div class="col-xs-3 form-group" id="fecha_fin_contrato_title" style="display: none;" >
                          <label for="fecha_fin_contrato">Fecha fin Contrato</label>
                    
                     <input type="text" class="form-control" id="fecha_fin_contrato" name="fecha_fin_contrato" placeholder="Fecha fin contrato">
                     <input type="hidden" class="form-control" id="estado" name="estado" placeholder="Estado tenant"  >
                    </div>

                    
          
                 
            

                  
                       @if($tenant->fecha_fin_contrato == '')
                        <div class="row">
                            <div class="col-xs-3 form-group">
                                <div class="checkbox">
                                       <input type="checkbox" onchange="javascript:showContent()" name="check" id="check">
                                <label for="check">Finalizar contrato</label>   
                                </div>
                            </div>
                         
                    
                    </div>
                    @endif
                </div>
      
                <div class="row">
                    <div class="col-xs-3 form-group">
                        {!! Form::label('name', trans('global.tenants.fields.name').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                            </p>
                        @endif
                    </div>
                     <div class="col-xs-3 form-group">
                        {!! Form::label('cedula', trans('global.tenants.fields.cedula').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('cedula', old('cedula'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('cedula'))
                            <p class="help-block">
                                {{ $errors->first('cedula') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('email', trans('global.tenants.fields.email').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="col-xs-3 form-group">
                        {!! Form::label('phone', trans('global.tenants.fields.phone').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('phone'))
                            <p class="help-block">
                                {{ $errors->first('phone') }}
                            </p>
                        @endif
                    </div>
                      <div class="col-xs-12 form-group">
                                {!! Form::label('referencias', trans('global.tenants.fields.referencias').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('referencias', old('referencias'), ['class' => 'form-control','rows' => 1, 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('referencias'))
                                    <p class="help-block">
                                        {{ $errors->first('referencias') }}
                                    </p>
                                @endif
                            </div>
                </div>
            <!--Tenant-->

            <!--Codeudor-->
            <div class="panel panel-default" style="padding:20px;padding-bottom:0px;">
                <div class="panel-heading" style="font-size:18px;font-weight:700;">
                    Codeudor
                </div>      
                    <div class="row" style="padding-top:20px;">
                        <div class="col-xs-3 form-group">
                            {!! Form::label('codeudor', trans('global.tenants.fields.codeudor').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('codeudor', old('codeudor'), ['class' => 'form-control', 'placeholder' => 'Nombre Codeudor', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('codeudor'))
                                <p class="help-block">
                                    {{ $errors->first('codeudor') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-3 form-group">
                            {!! Form::label('cc_codeudor', trans('global.tenants.fields.cedula').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('cc_codeudor', old('cc_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('cc_codeudor'))
                                <p class="help-block">
                                    {{ $errors->first('cc_codeudor') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-3 form-group">
                            {!! Form::label('email_codeudor', trans('global.tenants.fields.email').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('email_codeudor', old('email_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('email_codeudor'))
                                <p class="help-block">
                                    {{ $errors->first('email_codeudor') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-xs-3 form-group">
                            {!! Form::label('tel_codeudor', trans('global.tenants.fields.phone').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('tel_codeudor', old('tel_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tel_codeudor'))
                                <p class="help-block">
                                    {{ $errors->first('tel_codeudor') }}
                                </p>
                            @endif
                        </div>
                          <div class="col-xs-6 form-group">
                                {!! Form::label('dir_codeudor', trans('global.tenants.fields.dir_codeudor').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('dir_codeudor', old('dir_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('dir_codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('dir_codeudor') }}
                                    </p>
                                @endif
                            </div>
                                 <div class="col-xs-12 form-group">
                                {!! Form::label('ref_codeudor', trans('global.tenants.fields.referencias').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('ref_codeudor', old('ref_codeudor'), ['class' => 'form-control','rows' => 1, 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('ref_codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('ref_codeudor') }}
                                    </p>
                                @endif
                            </div>
                    </div>
                </div>            
            </div>
            <!--Codeudor-->
        </div>



    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


<!-- FastClick -->
<script src="{{asset('/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugins/fastclick/fastclick.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
<!-- Languaje -->
<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script>
 $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        language: "es",
        autoclose: true
    });
</script>

<script type="text/javascript">
function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("check");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
</script>

<script type="text/javascript">
    
    function showContent() {
        //var estado;
        element = document.getElementById("fecha_fin_contrato_title");
        //estado = document.getElementById("estado");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
            //estado.style.display='block';
            //document.getElementById("estado").value ='2';

            //estado=2 DesActivado"
            // var estado ='2';
             document.getElementById("estado").value = '1';
             document.getElementById("fecha_fin_contrato") ='';
        }
        else {
            element.style.display='none';
            //estado.style.display='none';
        }
    }
</script>

<script type="text/javascript">
     
    function showContent2() {
        var estado;
        element = document.getElementById("fecha_fin_contrato_title");
        //estado = document.getElementById("estado");
        uncheck = document.getElementById("uncheck");

        //element2 = document.getElementById("fecha_fin_contrato");
        if (uncheck.checked) {
            element.style.display='none';
            //estado.style.display='block';
           
            //estado=1 Activado"
            var estado ='1';
            document.getElementById("estado").value =estado;
            
            //var fecha_fin_contrato == null;
            //$('#fecha_fin_contrato').html(fecha_fin_contrato);
          

        }
        else {
            element.style.display='none';
            estado.style.display='none';
            //fecha_activacion.style.display='none';
            //fecha_fin_contrato.style.display='none';
        }
    }
</script>
@stop
