@extends('layouts.main', ['activePage' => 'gestionar', 'titlePage' => __('Listado de Comandos')])

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de comandos
                    <a class="btn btn-success float-right" href={{route('comando.create')}} type="button"><span class="material-icons">
                            add
                        </span> Nuevo Comando</a>
                </div>
                <div class="card-body">
                    @if(session('mensaje'))
                    <div class="alert alert-success">
                        {{session('mensaje')}}
                    </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Comando</th>
                                <th>Descripción</th>
                                <th>Tipo de comando</th>
                                <th colspan="2">Gestión</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comandos as $comando)
                                <tr>
                                    <td>{{$comando->nombre}}</td>
                                    <td>{{$comando->descripcion}}</td>
                                    <td>{{$comando->tipo_comando}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            {{--@foreach($personas as $persona)
                                <tr>
                                    <td>{{$persona->apellido_paterno .' '.  $persona->apellido_materno }}</td>
                            <td>{{$persona->nombres}}</td>
                            <td>{{$persona->dni}}</td>
                            <td><a type="button" class="btn btn-warning" href="{{route('persona.edit',$persona->id)}}">Editar</a></td>
                            <form method="POST" action="{{route('persona.destroy',$persona->id)}}">
                                @csrf
                                @method('delete')
                                <td><button type="submit" onclick=" return confirm('¿Estás seguro de eleiminar este registro?');" class="btn btn-danger" href={{route('persona.destroy',$persona->id)}}>Eliminar</button></td>
                            </form>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    {{--$personas->links()--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
