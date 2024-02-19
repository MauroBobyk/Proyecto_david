{{-- Copyright (C) 2022 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/- --}}
@extends('libros.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Simple Aplicacion CRUD -- Listado de precios</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('libros.create') }}"> Agregar Producto</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($productos) > 0)
        <table class="table table-bordered">
            <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Precio</th>
                <th width="280px">Acciones</th>
            </tr>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->detalles }}</td>
                    <td>$ {{ $producto->precio }}</td>
                    <td>
                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('productos.show',$producto->id) }}">Ver</a>
                            <a class="btn btn-primary" href="{{ route('productos.edit',$producto->id) }}">Modificar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <div class="alert alert-alert">Comenzar agregando a la Base de Datos.</div>
    @endif

    {!! $productos->links() !!}

@endsection
