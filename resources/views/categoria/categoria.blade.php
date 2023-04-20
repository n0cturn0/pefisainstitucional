@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Criando Categoria</h1>
@stop

@section('content')
    <div class="row">


        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Cadastro de categoria para o site</h3>

                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form method="POST" action="{{url('./createcategoria')}}">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Categoria</label>
                                                    <input type="text" name="categoria" class="form-control" id="exampleInputEmail1" {{ old('categoria') }} placeholder="Categoria">
                                                    @csrf
                                                </div>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
                                                </div>

                                                <table class="table table-bordered text-center">
                                                    <tbody>
                                                    <tr>
                                                        <th>Categorias cadastradas</th>
                                                        <th>Apagar</th>

                                                    </tr>
                                                        @foreach($categoria as $value)
                                                            <tr>
                                                                <td>{{$value->categoria}}</td>
                                                                <td>

                                                                        <a href="{{url('destroy/'.$value->id)}}"  class="btn btn-block btn-outline-danger btn-xs">Excluir</a>


                                                                </td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- /.card-body -->


                                        </form>
                                    </div>
                                    <!-- /.card -->





                                </div>
                                <!--/.col (left) -->
                                <!-- right column -->

                                <!--/.col (right) -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                </div>
            </div>
        </div>
    </div>
@stop
