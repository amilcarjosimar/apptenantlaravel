@extends('layouts.app')

@section('content')

 {!! Form::model($deduccion, ['method' => 'PUT', 'route' => ['admin.propietarios_deducciones.update', $deduccion->id], 'files' => false,]) !!}
    
  <input type="hidden" name="id_propietario" value="<?=$property->propietarios2($property->id)->id;?>" id="id_propietario">
          <input type="hidden" name="id_property" value="<?=$property->id;?>" id="id_property">
<div class="panel panel-default" style="padding:20px;padding-bottom:0px;">
        <div class="panel-heading" style="font-size:18px;font-weight:700;">
        Editar deducción
        </div>     

        <div class="panel-body">
            <!--Tenant-->
                <div class="row">
               {!! Form::label('fecha_deduccion', 'Fecha deducción', ['class' => 'control-label']) !!}
                                        {!! Form::date('fecha_deduccion', old('fecha_deduccion'), ['class' => 'form-control', 'placeholder' => 'Fecha deducción', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('fecha_deduccion'))
                                            <p class="help-block">
                                                {{ $errors->first('fecha_deduccion') }}
                                            </p>
                                        @endif
                        
                        {!! Form::label('valor', 'Valor deducción', ['class' => 'control-label']) !!}
                                        {!! Form::number('valor', old('valor'), ['class' => 'form-control',
                                        //'onkeyup' =>'applyMask(this)',
                                        //'onChange' =>'valor()',
                                        'placeholder' => 'Valor deducción', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('valor'))
                                            <p class="help-block">
                                                {{ $errors->first('valor') }}
                                            </p>
                                        @endif
             
                            
       

       
                                {!! Form::label('observaciones', 'Observaciones de la deducción', ['class' => 'control-label']) !!}
                                {!! Form::textarea('observaciones', old('observaciones'), ['class' => 'form-control','rows' => 1, 'placeholder' => 'Observaciones de la deducción', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('observaciones'))
                                    <p class="help-block">
                                        {{ $errors->first('observaciones') }}
                                    </p>
                                @endif

                  {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}



         
@stop

