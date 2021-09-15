@extends('layouts.app2')
<link rel="stylesheet" href="{{ url('css/material') }}/style.css"/>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="{{url('datePicker/css/bootstrap-datepicker3.min.css')}}">
<link rel="stylesheet" href="{{url('datePicker/css/bootstrap-datepicker.standalone.css')}}">

@section('content')
    <h3 class="page-title">Detalle Unidad</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
             <a href="{{ route('admin.properties_sub.edit',[$property->id]) }}" data-toggle="tooltip" title="Editar Unidad">
                    <span class="label label-info" style="margin-left:10px;padding:10px">Editar
                    </span>
                </a>
        </div>

        
               

        <div class="panel-body table-responsive">
            <div class="row">

               <div class="col-md-3">
                 <a target="_blank">
                            <img src="{{ asset('img_unidad.png')}}" style="object-fit:cover;height:80%;width:100%;border-radius:10px"/>
                             <div class="text-center" style="margin-top:-120px">
                             <h1 style="font-weight:600;color:#fff">{{ $property->nombre }}</h1>
                             <h4 style="color:#fff">{{ $property->propiedad->name }}</h4>
                         </div>
                        </a>
             </div>

                <div class="col-md-3">
                    <table class="table table-bordered table-striped">
                         <tr>
                            <th>Propiedad principal</th>
                            <td field-key='name'>{{ $property->propiedad->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties_sub.fields.nombre')</th>
                            <td field-key='name'>{{ $property->nombre }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties_sub.fields.tipo_sub')</th>
                            <td field-key='tipo_sub'>{{ $property->tipo_propiedad_sub->tipo }}</td>
                        </tr>
                         <tr>
                            <th>@lang('global.properties_sub.fields.renta')</th>
                            <td field-key='renta'>$ {{ number_format($property->renta), 0, ',', '.'}}</td>
                        </tr>
                        <tr>
                         <th>@lang('global.properties_sub.fields.metros_cuadrados')</th>
                            <td field-key='metros_cuadrados'>{{ $property->metros_cuadrados }}</td>
                        </tr>
                         <tr>
                         <th>@lang('global.properties_sub.fields.numero_banos')</th>
                            <td field-key='numero_banos'>{{ $property->numero_banos }}</td>
                        </tr>

                         <tr>
                         <th>@lang('global.properties_sub.fields.numero_cocinas')</th>
                            <td field-key='numero_banos'>{{ $property->numero_cocinas }}</td>
                        </tr>
                         <tr>
                         <th>Fecha de creación</th>
                            <td field-key='fecha_creacion'>{{date('d/F/Y',strtotime($property->created_at)) }}</td>
                        </tr>
                         <th>Observaciones de la Unidad</th>
                            <td field-key='observaciones'>{{$property->observaciones}}</td>
                        </tr>
                    </table>
                </div>
    
     <div class="col-md-6">
       <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#seguros" aria-controls="seguros" role="tab" data-toggle="tab">Seguro</a></li>
       </ul>

   
       @if(empty($seguro))
       Sin seguro
        <a href="{{ route('admin.properties_seguros.create',[$property->id])}}" data-toggle="tooltip" title="Crear Seguro" target="_blank" style="float: right;">
                    <span class="label label-info" style="margin-left:10px;padding:10px">Crear Seguro
                    </span>
        </a>
       @endif
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="seguros">
                        @if(isset($seguro))
                            @if ($seguro->estado == 2)
                                Este seguro está desactivado
                                 {!! Form::model($seguro, ['method' => 'PUT', 'route' => ['admin.properties_seguros.update', $seguro->id], 'files' => true,]) !!}
                                                  <div class="col-md-12">
                                                        <div class="checkbox">
                                                               <input type="checkbox" onchange="javascript:reactivar()" name="check_reactivar" id="check_reactivar">
                                                        <label for="check_reactivar">Reactivar seguro</label>
                                                  </div>

        <div class="col-md-12" id="tabla_reactivar">

                                                        {!! Form::submit('Reactivar',[
                                                            'class' => 'btn btn-success',
                                                            'id' => 'reactivar_seguro',
                                                           // 'style' => 'visibility:hidden',
                                                            //'style' => 'display:hidden',
                                                            ]) !!}
                                  {!! Form::close() !!}
                    <table class="table table-bordered table-striped {{ count($seguros) > 0 ? 'datatable' : '' }}">
                            <thead>
                                <tr>
                                    <th>Aseguradora / Fechas
                                    </th>
                                    <!--<th>@lang('global.seguros.fields.fechainicio')
                                    </th>-->
                                    <!--<th>@lang('global.seguros.fields.fechafin')
                                    </th>-->
                                    <th>@lang('global.seguros.fields.costo')
                                    </th>
                                    <!--<th>@lang('global.seguros.fields.cobertura')
                                    </th>-->
                                    <!--   @if( request('show_deleted') == 1 )
                                                        <th>&nbsp;</th>
                                                        @else
                                                        <th>&nbsp;</th>
                                                        @endif
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($seguro))
                                  @foreach ($seguros as $seguro)
                                    <tr>
                                        <td field-key='property'>{{ $seguro->empresa }}<br/>
                                            Inicio: {!! date('d/F/Y', strtotime($seguro->fecha_inicio))!!}<br/>
                                            Fin: {!! date('d/F/Y', strtotime($seguro->fecha_fin))!!}
                                        </td>
                                        <!--
                                        <td field-key='property'>
                                            {!! date('d/F/Y', strtotime($seguro->fecha_inicio))!!}
                                        </td>
                                        <td field-key='property'>{!! date('d/F/Y', strtotime($seguro->fecha_fin))!!}
                                        </td>
                                        -->
                                        <td field-key='property'>
                                                ${{number_format($seguro->valor), 0, ',', '.' or '' }}<br/>
                                                    @can('properties_seguros_view')
                                                        <a target="_blank" href="{{ route('admin.properties_seguros.edit',[$seguro->id]) }}" class="" style="color:#fff" data-toggle="tooltip" title="{{$seguro->id}}" style="color:#fff;padding:0px;float:right;">
                                                                       <span class="label label-info" style="margin-left:0px;padding:10px;color:#fff;float:left;">Editar Seguro
                                                                       </span>
                                                        </a>
                                                    @endcan
                                        </td>
                                    </tr>

                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
                            </tbody>
                    </table>
           
                @endif
            @endif
             </div>

              @if(isset($seguro))
                            @if ($seguro->estado == 1)
                                Este seguro está activo
                                 {!! Form::model($seguro, ['method' => 'PUT', 'route' => ['admin.properties_seguros.update', $seguro->id], 'files' => true,]) !!}
                                                  <div class="col-md-12">
                                                        <div class="checkbox">
                                                               <input type="checkbox" onchange="javascript:showContent()" name="check" id="check">
                                                        <label for="check">Desactivar seguro</label>
                                                  </div>

          <div class="col-md-12" id="col_desactivar">

                                                        {!! Form::submit('Desactivar',[
                                                            'class' => 'btn btn-danger',
                                                            'id' => 'desactivar_seguro',
                                                           // 'style' => 'visibility:hidden',
                                                            ]) !!}
                                  {!! Form::close() !!}
                    <table id="tabla_desactivar" class="table table-bordered table-striped {{ count($seguros) > 0 ? 'datatable' : '' }}">
                            <thead>
                                <tr>
                                    <th>Aseguradora / Fechas
                                    </th>
                                    <!--<th>@lang('global.seguros.fields.fechainicio')
                                    </th>-->
                                    <!--<th>@lang('global.seguros.fields.fechafin')
                                    </th>-->
                                    <th>@lang('global.seguros.fields.costo')
                                    </th>
                                    <!--<th>@lang('global.seguros.fields.cobertura')
                                    </th>-->
                                    <!--   @if( request('show_deleted') == 1 )
                                                        <th>&nbsp;</th>
                                                        @else
                                                        <th>&nbsp;</th>
                                                        @endif
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($seguro))
                                  @foreach ($seguros as $seguro)
                                    <tr>
                                        <td field-key='property'>{{ $seguro->empresa }}<br/>
                                            Inicio: {!! date('d/F/Y', strtotime($seguro->fecha_inicio))!!}<br/>
                                            Fin: {!! date('d/F/Y', strtotime($seguro->fecha_fin))!!}
                                        </td>
                                        <!--
                                        <td field-key='property'>
                                            {!! date('d/F/Y', strtotime($seguro->fecha_inicio))!!}
                                        </td>
                                        <td field-key='property'>{!! date('d/F/Y', strtotime($seguro->fecha_fin))!!}
                                        </td>
                                        -->
                                        <td field-key='property'>
                                                ${{number_format($seguro->valor), 0, ',', '.' or '' }}<br/>
                                                    @can('properties_seguros_view')
                                                        <a target="_blank" href="{{ route('admin.properties_seguros.edit',[$seguro->id]) }}" class="" style="color:#fff" data-toggle="tooltip" title="{{$seguro->id}}" style="color:#fff;padding:0px;float:right;">
                                                                       <span class="label label-info" style="margin-left:0px;padding:10px;color:#fff;float:left;">Editar Seguro
                                                                       </span>
                                                        </a>
                                                    @endcan
                                        </td>
                                    </tr>

                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                                    </tr>
                                @endif
                            </tbody>
                    </table>
                @endif
            @endif


            </div>
        </div>
       

<p>&nbsp;</p>



            <a href="{{ route('admin.properties_sub.unidades_consulta',[$property->propiedad->id]) }}" class="btn btn-success">@lang('global.app_back_to_list')</a>
</div>



 <script>
        $(document).ready(function () {
          document.getElementById("desactivar_seguro").style.display='none';
          document.getElementById("reactivar_seguro").style.display='none';
          //document.getElementById("reactivar_seguro").hide();
          document.getElementById("tabla_reactivar").style.display='none';
          document.getElementById("tabla_desactivar").style.display='none';
        });
 </script>

<script type="text/javascript">
     document.getElementById("reactivar_seguro").style.display='none';
     document.getElementById("col_desactivar").style.display='none';
     document.getElementById("tabla_desactivar").style.display='none';
    function showContent() {
        element = document.getElementById("desactivar_seguro");
        element2 = document.getElementById("reactivar_seguro");
        tabla = document.getElementById("tabla_reactivar");
        tabla2 = document.getElementById("tabla_desactivar");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';
            tabla.style.display='none';
            tabla2.style.display='none';
        }
        else {
            element.style.display='none';
            element2.style.display='none';
            tabla.style.display='none';
            tabla2.style.display='none';
        }
    }

     function reactivar() {
        element = document.getElementById("desactivar_seguro");
        element2 = document.getElementById("reactivar_seguro");
        tabla = document.getElementById("tabla_reactivar");
        tabla2 = document.getElementById("tabla_desactivar");
        check_reactivar = document.getElementById("check_reactivar");
        if (check_reactivar.checked) {
            //element.style.display='none';
            //document.getElementById("reactivar_seguro").show();
            element2.style.display='block';
            //tabla.style.display='none';
            //tabla2.style.display='none';
        }
        else {
            //element.style.display='none';
            element2.style.display='none';
            //tabla.style.display='none';
            //tabla2.style.display='none';*/
            // document.getElementById("reactivar_seguro").hide();
        }
    }
</script>

@stop
