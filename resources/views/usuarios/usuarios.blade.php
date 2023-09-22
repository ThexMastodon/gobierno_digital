@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Usuario') }}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{route('usuarios.crear')}}" class="btn btn-success float-end">Nuevo</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('usuarios.editar', $usuario->id) }}">Editar</a>
                                                <a class="dropdown-item" id="eliminar" href="{{ route('usuarios.eliminar', $usuario->id) }}">Eliminar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function (){
        $('[data-bs-toggle="dropdown"]').dropdown();

        $("#eliminar").on('click', function (e) {
            e.preventDefault()
            $.ajax({
                url: this.href,
                type: 'GET',
                success: function (respuesta) {
                    alert('Usuario Eliminado Correctamente')
                    window.location.href = '{{ route('usuarios') }}';
                },
                error: function (error) {
                    alert('Error al crear Usuario')
                }
            })
        })
    })
</script>
@endsection
