@extends('layouts.app')

@section('content')
    <x-course-navbar :course="$course" active="overview" />
    @csrf
@endsection
