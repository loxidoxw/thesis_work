@extends('layouts.app')
@section('content')
    @csrf
<span>{{$assignment->title}}</span>
@endsection
