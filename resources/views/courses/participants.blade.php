@extends('layouts.app')

@section('content')
@csrf
<x-course-navbar :course="$course" active="participants" />
 @foreach($users as $user)
     <h1>{{$user->name}}. Role:{{$user->role}}</h1>
 @endforeach
@endsection
