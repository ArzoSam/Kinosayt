@extends('admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-2">{{$genre->genre}}</h1>
                    <a href="{{route('admin.genre.edit', $genre->id)}}" class="text-success"><i class="fas fa-solid fa-pen"></i></a>

                    <form action="{{ route('admin.genre.delete', $genre->id) }}" method="post">
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
                                        <td>{{$genre->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Genre</td>
                                        <td>{{$genre->genre}}</td>
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
