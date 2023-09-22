@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Usuario') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <div class="row">
                                    <a href="{{route('usuarios')}}" class="btn btn-info">Listar</a>
                                </div>
                            </div>
                        </div>
                        <form method="POST" id="usuarios" action="#"  role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="hidden" id="id" name="id" value="{{$usuario->id}}">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuario->name}}" required>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{$usuario->email}}" required>
                                <label for="pass">Contraseña</label>
                                <input type="password" name="pass" id="pass" class="form-control" value="xxxxx" required>
                                <a id="guardar" class="btn btn-success mt-2 float-end">Guardar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function (){
            $("#guardar").on('click', function (e) {
                e.preventDefault()
                var formData = $("#usuarios").serialize();
                formData += "&id=" + $("#id").val();
                $.ajax({
                    url: '{{ route('usuarios.guardar') }}',
                    type: 'POST',
                    data: formData,
                    success: function (respuesta) {
                        alert('Usuario Editado Correctamente')
                        window.location.href = '{{ route('usuarios') }}';
                    },
                    error: function (error) {
                        alert('Error al editar Usuario')
                    }
                })
            })
        })
    </script>
@endsection
