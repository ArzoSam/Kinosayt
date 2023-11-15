@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Editing Movie</h1>
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
                        <form action="{{ route('admin.movie.update', $movie->id) }}" method="post"
                              enctype="multipart/form-data" class=" mt-3">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <input type="text" class="form-control w-25" name="title" placeholder="Post name"
                                       value="{{ $movie->title }}"
                                >
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="description">
                                    {{ $movie->description }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add movie preview</label>
                                <div class="w-50">
                                    <img src="{{ url('storage/' . $movie->image) }}" alt="image" class="w-50 mt-3 mb-3">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Choose Category</label>
                                <select name="director_id" class="form-control">
                                    @foreach($directors as $director)
                                        <option value="{{ $director->id }}"
                                            {{ $director->id == $movie->director_id ? 'selected' : '' }}
                                        >{{ $director->name }}</option>
                                    @endforeach
                                </select>
                                @error('director_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" name="actor_ids[]" multiple="multiple"
                                        data-placeholder="Select actors" style="width: 100%;">
                                    @foreach($actors as $actor)
                                        <option
                                            {{ is_array( $movie->actors->pluck('id')->toArray() ) && in_array($actor->id, $movie->actors->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $actor->id }}">{{ $actor->name }}</option>
                                    @endforeach
                                </select>
                                @error('actor_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2" name="genre_ids[]" multiple="multiple"
                                        data-placeholder="Select genres" style="width: 100%;">
                                    @foreach($genres as $genre)
                                        <option
                                            {{ is_array( $movie->genres->pluck('id')->toArray() ) && in_array($genre->id, $movie->genres->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                    @endforeach
                                </select>
                                @error('genre_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

