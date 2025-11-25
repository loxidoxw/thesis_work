@extends('layouts.app')

@section('content')
    @csrf
    <div class="container">
        <div class="row">
                @foreach($courses as $course)
                <div class="col-md-3 mb-4">
                    <img src="{{asset('storage/' . $course->image)}}" alt="">
                    <h3>{{$course->title}}</h3>
                </div>
                @endforeach
        </div>
    </div>
@endsection
