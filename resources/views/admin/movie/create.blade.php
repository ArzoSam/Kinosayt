@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Movie</h1>
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
                    <div class="col-12">
                        <form action="{{route('admin.movie.store')}}" method="post" enctype="multipart/form-data"
                              class=" mt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control w-25" name="title" placeholder="Movie name"
                                       value="{{ old('title') }}"
                                >
                                @error('title')
                                <div class="text-danger">Error</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="description">
                                    {{ old('description') }}
                                </textarea>
                                @error('description')
                                <div class="text-danger">Error</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control w-25" name="year" placeholder="Films Year"
                                       value="{{ old('year') }}"
                                >
                                @error('year')
                                <div class="text-danger">Error</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add movie preview</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Choose Director</label>
                                <select name="director_id" class="form-control">
                                    @foreach($directors as $director)
                                        <option value="{{ $director->id }}"
                                            {{ $director->id == old('director_id') ? 'selected' : '' }}
                                        >{{ $director->name }}</option>
                                    @endforeach
                                </select>
                                @error('director_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Actors</label>
                                <select class="select2" name="actor_ids[]" multiple="multiple"
                                        data-placeholder="Select tags" style="width: 100%;">
                                    @foreach($actors as $actor)
                                        <option
                                            {{ is_array(old('actor_ids')) && in_array($actor->id, old('actor_ids')) ? 'selected' : '' }} value="{{ $actor->id }}">{{ $actor->name }}</option>
                                    @endforeach
                                </select>
                                @error('actor_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Actors</label>
                                <select class="select2" name="genre_ids[]" multiple="multiple"
                                        data-placeholder="Select tags" style="width: 100%;">
                                    @foreach($genres as $genre)
                                        <option
                                            {{ is_array(old('genre_ids')) && in_array($genre->id, old('genre_ids')) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                    @endforeach
                                </select>
                                @error('genre_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
