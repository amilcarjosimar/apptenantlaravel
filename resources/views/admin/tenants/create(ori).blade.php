@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tenants.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tenants.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        <div class="panel-body">



               <div class="row" style="padding:10px;">
                    <div  style="border:1px solid #000;padding:10px;background-color:#d4edda;margin-bottom:10px;border-radius:5px">Propiedad principal:
                        <h3><b>{{$property->propiedad->name}}</b></h3>
                    </div>
                    <div  style="border:1px solid #000;padding:10px;background-color:#d4edda;margin-bottom:10px;border-radius:5px">Unidad:
                        <h3><b>{{$property->nombre}}</b></h3>
                    </div>
                    <div  style="border:1px solid #000;padding:10px;background-color:#e66a6a;margin-bottom:10px;border-radius:5px;color:#fff">Valor arrendamiento:
                    <h3><b>${{number_format($property->renta), 0, ',', '.'}}</b></h3>
                    </div>
                </div>
                    <input type="hidden" name="property_id" value="<?=$property->propiedad->id;?>" id="property_id">
                    <input type="hidden" name="property_sub_id" value="<?=$property->id;?>" id="property_sub_id">
                  

                 <div class="row">
                 <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_inicio_contrato', trans('global.tenants.fields.fecha_inicio_contrato').'*', ['class' => 'control-label']) !!}
                                        {!! Form::date('fecha_inicio_contrato', old('fecha_inicio_contrato'), ['class' => 'form-control', 'placeholder' => 'Fecha inicio', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('fecha_inicio_contrato'))
                                            <p class="help-block">
                                                {{ $errors->first('fecha_inicio_contrato') }}
                                            </p>
                                        @endif
                 </div>

                  <div class="col-xs-3 form-group">
                          {!! Form::label('duracion_contrato', trans('global.tenants.fields.duracion_contrato').'*', ['class' => 'control-label']) !!}
                        {!! Form::text('duracion_contrato', old('duracion_contrato'), ['class' => 'form-control', 'placeholder' => 'Duraci??n del contrato', 'required' => '']) !!}
                        <p class="help-block"></p>
                            @if($errors->has('duracion_contrato'))
                            <p class="help-block">
                            {{ $errors->first('duracion_contrato') }}
                            </p>
                            @endif
                    </div>

                     <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_fin_contrato','Contrato hasta', ['class' => 'control-label']) !!}
                                        {!! Form::date('fecha_fin_contrato', old('fecha_inicio_contrato'), ['class' => 'form-control', 'placeholder' => 'Fecha inicio', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('fecha_inicio_contrato'))
                                            <p class="help-block">
                                                {{ $errors->first('fecha_inicio_contrato') }}
                                            </p>
                                        @endif
                 </div>

                </div>

                <div class="panel panel-default" style="padding:20px;padding-bottom:0px;">
                    <div class="panel-heading" style="font-size:18px;font-weight:700;background-color:#d1ecf1;color:#0c5460;border:2px solid #bee5eb;">
                            Inquilino
                    </div>
                    <div class="row" style="padding-top:15px;">
                            <div class="col-xs-3 form-group">
                                {!! Form::label('name', trans('global.tenants.fields.name').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre inquilino', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-3 form-group">
                                {!! Form::label('cedula', trans('global.tenants.fields.cedula').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('cedula', old('cedula'), ['class' => 'form-control', 'placeholder' => 'C??dula del inquilino', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('cedula'))
                                    <p class="help-block">
                                        {{ $errors->first('cedula') }}
                                    </p>
                                @endif
                            </div>
                             <div class="col-xs-3 form-group">
                                {!! Form::label('phone', trans('global.tenants.fields.phone').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'T??lefono del inquilino', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('phone'))
                                    <p class="help-block">
                                        {{ $errors->first('phone') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-3 form-group">
                                {!! Form::label('email', trans('global.tenants.fields.email').'*', ['class' => 'control-label']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email del inquilino', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>
                       <div class="col-xs-12 form-group">
                                {!! Form::label('email', trans('global.tenants.fields.referencias').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('referencias', old('referencias'), ['class' => 'form-control','rows' => 1, 'placeholder' => 'Escribe las referencias del inquilino', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('referencias'))
                                    <p class="help-block">
                                        {{ $errors->first('referencias') }}
                                    </p>
                                @endif
                            </div>
                            
                    </div>
                </div>
                <div class="panel panel-default" style="padding:20px;padding-bottom:0px;">
                    <div class="panel-heading" style="font-size:18px;font-weight:700;background-color:#f8d7da;color:#721c24;border:2px solid #f5c6cb;">
                            Codeudor
                    </div>
                    <div class="row" style="padding-top:15px;">
                            <div class="col-xs-3 form-group">
                                {!! Form::label('codeudor', trans('global.tenants.fields.codeudor').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('codeudor', old('codeudor'), ['class' => 'form-control', 'placeholder' => 'Nombre codeudor', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('codeudor') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-3 form-group">
                                {!! Form::label('cc_codeudor', trans('global.tenants.fields.cc_codeudor').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('cc_codeudor', old('cc_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('cc_codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('cc_codeudor') }}
                                    </p>
                                @endif
                            </div>
                             <div class="col-xs-3 form-group">
                                {!! Form::label('tel_codeudor', trans('global.tenants.fields.tel_codeudor').'*', ['class' => 'control-label']) !!}
                                {!! Form::text('tel_codeudor', old('tel_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('tel_codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('tel_codeudor') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-xs-3 form-group">
                                {!! Form::label('email_codeudor', trans('global.tenants.fields.email').'*', ['class' => 'control-label']) !!}
                                {!! Form::email('email_codeudor', old('email_codeudor'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email_codeudor'))
                                    <p class="help-block">
                                        {{ $errors->first('email_codeudor') }}
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
        </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

