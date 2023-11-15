@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding Director</h1>
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
                        <form action="{{route('admin.director.store')}}" method="post" enctype="multipart/form-data"
                              class=" mt-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control w-25" name="name" placeholder="Director name"
                                       value="{{ old('name') }}"
                                >
                                @error('name')
                                <div class="text-danger">Error</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Add Directors Image</label>
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
                            {{--                            <div class="form-group">--}}
                            {{--                                <textarea id="summernote" name="description">--}}
                            {{--                                    {{ old('description') }}--}}
                            {{--                                </textarea>--}}
                            {{--                                @error('description')--}}
                            {{--                                <div class="text-danger">Error</div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group w-50">--}}
                            {{--                                <label for="exampleInputFile">Add movie preview</label>--}}
                            {{--                                <div class="input-group">--}}
                            {{--                                    <div class="custom-file">--}}
                            {{--                                        <input type="file" class="custom-file-input" name="image">--}}
                            {{--                                        <label class="custom-file-label" >Choose image</label>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="input-group-append">--}}
                            {{--                                        <span class="input-group-text">Upload</span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                                @error('image')--}}
                            {{--                                <div class="text-danger">{{ $message }}</div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}

                            {{--                            <div class="form-group w-50">--}}
                            {{--                                <label>Choose Category</label>--}}
                            {{--                                <select name="category_id" class="form-control">--}}
                            {{--                                    @foreach($categories as $category)--}}
                            {{--                                        <option value="{{ $category->id }}"--}}
                            {{--                                            {{ $category->id == old('category_id') ? 'selected' : '' }}--}}
                            {{--                                        >{{ $category->title }}</option>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </select>--}}
                            {{--                                @error('category_id')--}}
                            {{--                                <div class="text-danger">{{ $message }}</div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}
                            {{--                            <div class="form-group">--}}
                            {{--                                <label>Tags</label>--}}
                            {{--                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">--}}
                            {{--                                    @foreach($tags as $tag)--}}
                            {{--                                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>--}}
                            {{--                                    @endforeach--}}
                            {{--                                </select>--}}
                            {{--                                @error('tag_ids')--}}
                            {{--                                <div class="text-danger">{{ $message }}</div>--}}
                            {{--                                @enderror--}}
                            {{--                            </div>--}}
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
