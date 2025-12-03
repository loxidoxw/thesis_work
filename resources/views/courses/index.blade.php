@extends('layouts.app')

@section('content')
    @csrf
    <div class="container">
        <div class="row">
                @foreach($courses as $course)
                <div class="col-md-3 mb-4">
                    <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/' . $course->image)}}" alt="">
                        <h3>{{$course->description}}</h3>
                        <a href="{{route('course.show', $course->id)}}" class="text-blue-500">{{$course->title}}</a>

                    </div>
                </div>
                @endforeach
        </div>
        {{$courses->links()}}
    </div>
@endsection
