@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Мої курси</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($courses as $course)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300 flex flex-col">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4 flex-1">{{ Str::limit($course->description, 80) }}</p>
                        <a href="{{ route('course.show', $course->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors mt-auto text-center">Переглянути курс</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    </div>
@endsection
