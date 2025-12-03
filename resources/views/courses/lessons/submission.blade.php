@extends('layouts.app')

@section('content')
    <div>
        <label class="block mb-1 font-medium text-gray-700">Зображення курсу</label>
        <input
            type="file"
            name="image"
            class="w-full text-gray-700"
            accept="image/*"
            required
        >
    </div>
@endsection
