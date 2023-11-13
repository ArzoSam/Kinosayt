@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">{{$movie->title}}</h1>
                    <a href="##" class="text-success"><i class="fas fa-solid fa-pen"></i></a>

                    <form action="##" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent"><i class="fas fa-solid fa-trash text-danger" role="button"></i></button>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table bg-white table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{$movie->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$movie->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{!! $movie->description  !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Director</td>
                                        <td>{{$movie->directors->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Actors</td>
                                        <td>
                                        @foreach($movie->actors as $actor)
                                        {{$actor->name . ','}}
                                        @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Genres</td>
                                        <td>
                                            @foreach($movie->genres as $genre)
                                                {{$genre->genre . ','}}
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div>

            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
