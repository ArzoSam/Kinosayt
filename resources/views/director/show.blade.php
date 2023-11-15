@extends('layouts.main')

@section('content')
    <div class="show_glav">
        <div class="pl-5 d-flex w-100 justify-content-between align-items-center no_hover">
            <div class="w-25">
                <img class="w-100" src="{{url('/storage/app/public/' . $director->image)}}" alt="">
            </div>
            <div class="show_div">
                <h1>Name : {{ $director->name }}</h1>
            </div>
        </div>
    </div>
@endsection
