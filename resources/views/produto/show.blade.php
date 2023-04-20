@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Imagens do produto</h1>
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


                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <section class="content">
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Imagens</h4>
                                                            </div>
                                                            <div class="card-body">
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
                                                                @foreach($produtos as $produto)
                                                                <div class="row">
                                                                    <div class="col-sm-2">






                                                                        <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                                            <img src="{{asset('storage/produtos/'.$produto->imagepath)}}" class="img-fluid mb-2" alt="white sample"/>
                                                                        </a>
                                                                            <div>
                                                                                @if($produto->destaque === 0 )
                                                                                    <a href="{{url('destaque/'.$produto->id)}}"  class="btn btn-block btn-info btn-xs">DESTACAR</a>
                                                                                @else
                                                                                    <a href="{{url('destaque/'.$produto->id)}}"  class="btn btn-block btn-primary btn-xs">DESTAQUE</a>
                                                                                @endif
                                                                                <a href="{{url('apagarprodutoimagem/'.$produto->id)}}"  class="btn btn-block btn-danger btn-xs">Apagar imagem</a><br>
                                                                            </div>

                                                                    </div>

                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.container-fluid -->
                                        </section>












                                            <!-- /.card-body -->



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
