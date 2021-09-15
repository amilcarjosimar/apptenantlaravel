@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.pagos.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.properties_pagos.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row" style="padding:10px;">
                 <div  style="border:1px solid #000;padding:10px;background-color:#d4edda;margin-bottom:10px;border-radius:5px">#Factura:
                    <h3><b>COLH-FT-{{$properties->id}}</b></h3>
                </div>
                <div  style="border:1px solid #000;padding:10px;background-color:#d4edda;margin-bottom:10px;border-radius:5px">Propiedad:
                    <h3><b>{{$properties->property->name}}</b></h3>
                </div>
                <div  style="border:1px solid #000;padding:10px;background-color:#d4edda;margin-bottom:10px;border-radius:5px">Unidad:
                    <h3><b>{{$properties->property_sub->nombre}}</b></h3>
                </div>
                <div  style="border:1px solid #000;padding:10px;background-color:#e66a6a;margin-bottom:10px;border-radius:5px;color:#fff">Por Pagar:
                    <h3><b>${{number_format($properties->saldo_factura($properties->id)), 0, ',', '.'}}</b></h3>
                </div>
            </div>

             <input type="hidden" name="id_factura" value="<?=$properties->id;?>" id="id_factura">
             <input type="hidden" name="id_property" value="<?=$properties->property->id;?>" id="id_property">
            <input type="hidden" name="id_property_sub" value="<?=$properties->property_sub->id;?>" id="id_property_sub">
             <input type="hidden" name="id_tenant" value="<?=$properties->tenant->id;?>" id="id_tenant">
            <input type="hidden" name="porc_comision" value="<?=$properties->property_sub->porc_comision;?>" id="porc_comision">

        <div class="row">

                 <div class="col-xs-3 form-group">
                        {!! Form::label('fecha_pago', 'Fecha del pago', ['class' => 'control-label']) !!}
                                        {!! Form::date('fecha_pago', old('fecha_pago'), ['class' => 'form-control', 'placeholder' => 'Fecha del pago', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('fecha_pago'))
                                            <p class="help-block">
                                                {{ $errors->first('fecha_pago') }}
                                            </p>
                                        @endif
                </div>

                <div class="col-xs-3 form-group">
                    {!! Form::label('valor', trans('global.facturas.fields.valorpago').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('valor', old('valor'), ['class' => 'form-control', 'placeholder' => '',
                    //'onkeyup' => 'applyMask(this)',
                     'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('valor'))
                        <p class="help-block">
                            {{ $errors->first('valor') }}
                        </p>
                    @endif

                </div>
            </div>
            <div class="col-xs-12 form-group">
                                {!! Form::label('observaciones', trans('global.pagos.fields.observaciones').'*', ['class' => 'control-label']) !!}
                                {!! Form::textarea('observaciones', old('observaciones'), ['class' => 'form-control','rows' => 1, 'placeholder' => 'Observaciones del pago', 'required' => '']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('observaciones'))
                                    <p class="help-block">
                                        {{ $errors->first('observaciones') }}
                                    </p>
                                @endif
                            </div>
           
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

        <script>
    window.applyMask = function(input){
        console.log('applyMask');
        var unmasked = input.value.replace(/\./g,' ').replace(/ /g, '');
        input.value = addDots(unmasked);
     
  }

window.addDots = function(value){
    x = value.split(',');
    x1 = x[0]; // parte entera
    x2 = x.length > 1 ? ',' + x[1] : ''; // parte decimal
    // 3 digitos precedidos por una cantidad de 1 o mas digitos.
    // aplico regex para obtener 2 grupos cada 3 digitos
    var rgx = /(\d+)(\d{3})/;
    // $1 corresponde a los digitos predecesores, $2 al segundo grupo, los 3 dígitos que indican miles.
    while (rgx.test(x1)) {
     //reemplaza la parte entera concatenando el primer grupo, un punto y el segundo grupo.
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    // concatena con parte decimal
    return x1 + x2;
}

inputId = document.getElementById('valor');
//divId=document.getElementById('porc_seguro');
window.onload = applyMask(inputId)
//window.onload = applyMask(divId)
</script>
@stop

