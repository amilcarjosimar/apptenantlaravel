@extends('layouts.app')
<link rel="stylesheet" href="{{ url('css/material') }}/style.css"/>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Datepicker Files -->
<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">

@section('content')
    <h3 class="page-title">@lang('global.facturas.fields.editarfactura')</h3>
    
    {!! Form::model($document, ['method' => 'PUT', 'route' => ['admin.properties_facturas.update', $document->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('valor_neto', trans('global.facturas.fields.valor_neto').'*', ['class' => 'control-label']) !!}
                   {!! Form::text('valor_neto', old('valor_neto'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor_neto'))
                        <p class="help-block">
                            {{ $errors->first('valor_neto') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row">
                 <div class="col-xs-3 form-group">
                        {!! Form::label('adicionales', trans('global.facturas.fields.adicionales').'*', ['class' => 'control-label']) !!}
                                        {!! Form::number('adicionales', old('adicionales'), ['class' => 'form-control', 'placeholder' => 'Valor total de costos adicionales', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('adicionales'))
                                            <p class="help-block">
                                                {{ $errors->first('adicionales') }}
                                            </p>
                                        @endif
                          {!! Form::label('obs_adicionales', trans('global.facturas.fields.obs_adicionales').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('obs_adicionales', old('obs_adicionales'), ['class' => 'form-control','rows' => 1, 'placeholder' => 'Escribe detalles de los gastos adicionales', '' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('obs_adicionales'))
                                    <p class="help-block">
                                        {{ $errors->first('obs_adicionales') }}
                                    </p>
                                @endif
                    </div>
                     <div class="col-xs-3 form-group">
                        {!! Form::label('deducciones', trans('global.facturas.fields.deducciones').'*', ['class' => 'control-label']) !!}
                                        {!! Form::number('deducciones', old('deducciones'), ['class' => 'form-control', 'placeholder' => 'Valor total deducciones del mes', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('deducciones'))
                                            <p class="help-block">
                                                {{ $errors->first('deducciones') }}
                                            </p>
                                        @endif
                          {!! Form::label('obs_deducibles', trans('global.facturas.fields.obs_deducibles').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('obs_deducibles', old('obs_deducibles'), ['class' => 'form-control','rows' => 1, 'placeholder' => 'Escribe detalles de los gastos deducibles', '' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('obs_deducibles'))
                                    <p class="help-block">
                                        {{ $errors->first('obs_deducibles') }}
                                    </p>
                                @endif
                    </div>
                </div>
           <div class="row">
                 <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_inicio', trans('global.facturas.fields.fechainicio').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('fecha_inicio', old('fecha_inicio'), ['class' => 'form-control datepicker', 'placeholder' => 'Fecha inicio', 'required' => '']) !!}
                        <p class="help-block"></p>
                            @if($errors->has('fecha_inicio'))
                            <p class="help-block">
                            {{ $errors->first('fecha_inicio') }}
                            </p>
                            @endif
                    </div>
                     <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_corte', trans('global.facturas.fields.fechacorte').'*', ['class' => 'control-label']) !!}
                                        {!! Form::text('fecha_corte', old('fecha_corte'), ['class' => 'form-control datepicker', 'placeholder' => 'Fecha corte', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('fecha_corte'))
                                            <p class="help-block">
                                                {{ $errors->first('fecha_corte') }}
                                            </p>
                                        @endif
                    </div>
            </div>
    </div>
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
@stop

