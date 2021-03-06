@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tenants.title')</h3>
     <a href="{{ route('admin.tenants.inquilinos_consulta',[$tenant->property->id]) }}" class="btn btn-success">@lang('global.app_back_to_list')</a>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
                <a href="{{ route('admin.tenants.edit',[$tenant->id]) }}" data-toggle="tooltip" title="Editar Inquilino">
                    <span class="label label-info" style="margin-left:10px;padding:10px">Editar
                    </span>
                </a>
        </div>
        <div class="inner">
        <div class="panel-body table-responsive">
            <div class="row">

                  <div class="col-md-3">
                        <a  target="_self">
                            <img src="{{ asset('img_user.png')}}" style="object-fit:cover;height:100%;width:100%;border-radius:10px"/>
                            <div class="text-center" style="margin-top:-120px">
                             <h2 style="font-weight:600;color:#fff;line-height:25px">{{ $tenant->name }}</h2>
                            </div>
                             <div class="text-right" style="margin-top:10px;padding:15px">
                              <h4 style="font-weight:400;color:#fff;line-height:10px;">{{ $tenant->subproperty->nombre }}</h4>
                              <h4 style="font-weight:400;color:#fff;line-height:10px;">{{ $tenant->property->name }}</h4>
                          </div>
                            
                    
                        </a>
                  </div>

                <div class="col-md-5">
                      <h4 class="page-title" style="font-weight:700;letter-spacing:-1px;"><b>Detalles del inquilino</b></h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.tenants.fields.name')</th>
                            <td field-key='name'>
                                <a href="#" data-toggle="tooltip" title="Id: {{$tenant->id}}">
                                {{ $tenant->name }}
                                </a>
                            </td>
                             <th>C??dula</th>
                            <td field-key='name'>
                                <a href="#" data-toggle="tooltip" title="C??dula: {{$tenant->cedula}}">
                                {{ $tenant->cedula }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.valor_pago_pendiente')</th>
                            <td field-key='porpagar'>
                             <span class="label label-danger" style="padding-bottom:0px;padding-top:8px;font-weight:700;">
                                <a href="{{ route('admin.properties_facturas.facturas_tenant_vencidas',[$tenant->id]) }}"data-toggle="tooltip" title="Ver Facturas" style="color:#fff">
                                <h4 style="font-weight:700;">${{number_format(($tenant->facturas2($tenant->id)-$tenant->facturas_pagadas($tenant->id))), 0, ',', '.'}}</h4>
                               </a>
                                </span>
                            </td>
                               <th>Fecha Inicio Contrato</th>
                            <td field-key='porpagar'>
                             <!--{{$tenant->created_at->format('d/F/Y')}}-->
                             {{date('d/F/Y', strtotime($tenant->fecha_inicio_contrato))}}
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered table-striped">
                         <tr>
                            <th>@lang('global.tenants.fields.duracion_contrato')</th>
                            <td field-key='duracion_contrato'>
                            @if ($tenant->duracion_meses != '')
                                {{ $tenant->duracion_meses }} meses</td>
                            @else
                            Este inquilino, a??n no registra duraci??n del contrato, por favor <a href="{{ route('admin.tenants.edit',[$tenant->id]) }}"><b>Cree una ></b></a>
                            @endif
                        </tr>
                        <!-- <tr>
                            <th>@lang('global.tenants.fields.duracion_contrato')</th>
                            <td field-key='duracion_contrato'>{{ $tenant->duracion_contrato }}</td>
                        </tr>-->
                         <tr>
                            <th>@lang('global.tenants.fields.referencias')</th>
                            <td field-key='referencias'>{{ $tenant->referencias }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.email')</th>
                            <td field-key='tenant_email'>{{ $tenant->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.phone')</th>
                            <td field-key='photo'>
                                {{ $tenant->phone }}
                                @if($tenant->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $property->photo) }}" target="_self"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $property->photo) }}"/></a>@endif
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-2">
                     <h4 class="page-title" style="font-weight:700;letter-spacing:-1px;"><b>Detalles del codeudor</b></h4>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Codeudor</th>
                            <td field-key='name'>{{ $tenant->codeudor }}</td>
                            <th>C??dula</th>
                            <td field-key='porpagar'>{{$tenant->cc_codeudor}}
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.tenants.fields.email')</th>
                            <td field-key='address'>{{ $tenant->email_codeudor }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.phone')</th>
                            <td field-key='address'>{{ $tenant->tel_codeudor }}</td>
                        </tr>
                         <tr>
                            <th>@lang('global.tenants.fields.dir_codeudor')</th>
                            <td field-key='address'>{{ $tenant->dir_codeudor }}</td>
                        </tr>
                    </table>
                </div>

            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">@lang('global.facturas.title')</a></li>
<!--<li role="presentation" class=""><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>-->
</ul>

<!-- Tab panes -->
<div class="tab-content">

   

<div role="tabpanel" class="tab-pane active" id="facturas">

<table class="table table-bordered table-striped {{ count($facturas) > 0 ? 'datatable' : '' }} @can('properties_facturas_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('properties_facturas_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                         <th># Factura</th>
                        <th>@lang('global.facturas.fields.property')</th>
                        <th>@lang('global.facturas.fields.unidad')</th>
                        <th>@lang('global.facturas.fields.tenant')</th>
                         <th style="text-align:center;">Fecha Inicio</th>
                        <th style="text-align:center;">Vencimiento</th>
                        <th>@lang('global.facturas.fields.valor_neto')</th>
                        <th>@lang('global.facturas.fields.valorpago')</th>
                        <th>Estado</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($facturas) > 0)
                        @foreach ($facturas as $factura)
                            <tr data-entry-id="{{ $factura->id }}">
                                @can('properties_facturas_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='user'>COLH-FT-{{ $factura->id or '' }}

                                    @if($factura->id_estado==1)
                                        <a href="{{ route('admin.properties_pagos.create',[$factura->id]) }}" class="btn btn-xs btn-info" style="float:right;">Recibir pago</a>
                                         <a href="{{ route('admin.properties_facturas.show',[$factura->id]) }}" class="btn btn-xs btn-info">Ver Factura</a>
                                    @else
                                      <a href="{{ route('admin.properties_facturas.show',[$factura->id]) }}" class="btn btn-xs btn-info">Ver Factura</a>
                                     

  <a href="{{ route('admin.properties_pagos.imprimirpago',[$factura->pago_valor->id])}}" class="btn btn-xs btn-primary" target="_blank" style="margin-left:3px">Ver Pago en PDF</a>
                                </div>

                                    @endif


                                </td>
                                <td field-key='property'>{{ $factura->property->name or '' }}</td>
                                <td field-key='property_sub'>{{ $factura->property_sub->nombre or '' }}</td>
                                <td field-key='user'>{{ $factura->tenant->name or '' }}</td>
                                <td field-key='fecha_inicio'>{{date('d/F/Y', strtotime($factura->fecha_inicio)) }}
                                    
        </td>
                                  <td field-key='fecha_corte'>{{ date('d/F/Y', strtotime($factura->fecha_corte))}}
                                     @if ($factura->id_estado=='1')
                                     @if ($factura->fecha_corte < Now())
                                    <span class="label label-danger" style="text-align:center;padding:10px;font-size:15px;color:#ffffff">Vencida
                                    </span>
                                    @endif
                                    @endif

                                  </td>
                               
                                <td field-key='name'style="font-size:15px;font-weight: 700">${{ number_format($factura->valor_neto), 0, ',', '.' }}</td>
                                 <td field-key='name'style="font-size:15px;font-weight: 700">${{ number_format($factura->pago2($factura->id)), 0, ',', '.' }}

                                     @if($factura->id_estado=='2')
                                      <span class="label label-warning" style="text-align:center;padding:10px;font-size:12px">
                                         <a target="_self" href="{{ route('admin.properties_pagos.show',[$factura->pago_valor->id])}}"data-toggle="tooltip" title="Ver Pago" style="color:#fff;padding:0px">
                                            Ver pago
                                        </a>
                                    </span>
                                    @endif

                                 </td>
                                   <td field-key='property'>
                                     @if ($factura->pago2($factura->id)-($factura->valor_neto)==0)
                                    <span class="label label-success" style="text-align:center;padding:10px;font-size:15px;color:#ffffff">Al dia
                                    </span>
                                    @endif
                                     @if ($factura->pago2($factura->id)-($factura->valor_neto)!=0)
                                    <span class="label label-danger" style="text-align:center;padding:10px;font-size:15px;color:#ffffff">Pendiente
                                    </span>
                                    @endif
                                   
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.documents.restore', $document->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.documents.perma_del', $factura->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('properties_facturas_edit')
                                    <a target="_self" href="{{ route('admin.properties_facturas.show',[$factura->id]) }}" class="btn btn-xs btn-primary">Ver factura</a>
                                    
                                  
                                    <a target="_self" href="{{ route('admin.properties_facturas.edit',[$factura->id]) }}" class="btn btn-xs btn-info">Editar Factura</a>
                                    @endcan
                                    @can('properties_facturas_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.properties_facturas.destroy', $factura->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>

</div>
<!--<div role="tabpanel" class="tab-pane " id="notes">
<table class="table table-bordered table-striped {{ count($notes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.notes.fields.property')</th>
                        <th>@lang('global.notes.fields.user')</th>
                        <th>@lang('global.notes.fields.note-text')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($notes) > 0)
            @foreach ($notes as $note)
                <tr data-entry-id="{{ $note->id }}">
                    <td field-key='property'>{{ $note->property->name or '' }}</td>
                                <td field-key='user'>{{ $note->user->name or '' }}</td>
                                <td field-key='note_text'>{!! $note->note_text !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['notes.restore', $note->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['notes.perma_del', $note->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('notes.show',[$note->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('notes.edit',[$note->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['notes.destroy', $note->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>-->
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.tenants.inquilinos_consulta',[$tenant->property->id]) }}" class="btn btn-success">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
