@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Directors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Movies</li>
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
                    <div class="col-1">
                        <a href="{{ route('admin.director.create') }}" class="btn btn-block btn-primary mb-3">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table bg-white table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($directors as $director)
                                    <tr>
                                        <td>{{$director->id}}</td>
                                        <td>{{$director->name}}</td>
                                        <td class="text-center"><a href="{{ route('admin.director.show', $director->id)  }}"><i class="fas fa-solid fa-eye"></i></a></td>
                                        <td><a href="{{ route('admin.director.edit', $director->id) }}" class="text-success"><i class="fas fa-solid fa-pen"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.director.delete', $director->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="border-0 bg-transparent"><i class="fas fa-solid fa-trash text-danger" role="button"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
