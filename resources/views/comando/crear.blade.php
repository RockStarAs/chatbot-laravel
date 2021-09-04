@extends('layouts.main', ['activePage' => 'gestionar', 'titlePage' => __('Crear comando')])

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Agregar un comando a la base de datos
                    <a class="btn btn-success float-right" href={{route('comando.index')}} type="button"><span class="material-icons">
                            arrow_back
                        </span> Regresar</a>
                </div>
                <div class="card-body">
                    <form action={{route('comando.store')}} method="POST">
                        @csrf
                        <div class="form-group input-group mb-3">
                            <label for="nombre_comando">Nombre del comando(Piensa en un nombre corto, pero predecible):</label>
                            <span class="input-group-text" id="basic-addon1">/</span>
                            <input type="text" value="{{ old('nombre_comando') }}" class="form-control @error('nombre_comando') is-invalid  @enderror " id="nombre_comando" name="nombre_comando" aria-describedby="basic-addon1" placeholder="No es necesario colocar '/'.">
                            {{--<input type="text" value="{{ old('nombre_comando') }}" name="nombre_comando" class="form-control @error('nombre_comando')
                            is-invalid
                            @enderror" id="nombre_comando">--}}
                            @error('nombre_comando')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción(Breve info de lo que hace el comando):</label>
                            <input type="text" value="{{ old('descripcion') }}" name="descripcion" class="form-control @error('descripcion')
                                    is-invalid
                                @enderror" id="descripcion">
                            @error('descripcion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tipo_comando">Tipo de comando</label>
                            <select class="form-control @error('tipo_comando')
                                    is-invalid
                                @enderror" name="tipo_comando" id="tipo_comando">
                                <option value="">Seleccionar</option>
                                <option value="NORMAL" @if(old('tipo_comando')=='NORMAL' ) selected @endif>Normal</option>
                                <option value="GRUPAL" @if(old('tipo_comando')=='GRUPAL' ) selected @endif>Grupal</option>
                                <option value="SUBCOMANDO" @if(old('tipo_comando')=='SUBCOMANDO' ) selected @endif>Subcomando</option>
                            </select>
                            @error('tipo_comando')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="respuesta">Respuesta(¿Qué deseas que Pedrito responda?)</label>
                            <textarea class="form-control" style="height: 200px" name="respuesta" id="respuesta"></textarea>
                            {{--<input type="text" value="{{ old('respuesta') }}" name="respuesta" class="form-control @error('respuesta')
                            is-invalid
                            @enderror" id="respuesta">--}}
                            @error('respuesta')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar comando</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
