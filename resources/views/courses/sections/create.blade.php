@extends('layouts.app')

@section ('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Створити секцію</h1>

        <form action="{{ route('section.store', $course->id) }}" method="POST" class="space-y-4">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block font-medium">Назва секції</label>
                <input type="text" name="title" id="title" class="border rounded p-2 w-full" value="{{ old('title') }}">
                @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block font-medium">Порядок</label>
                <input type="number" name="order" id="order" class="border rounded p-2 w-full" value="{{ old('order', 1) }}">
                @error('order')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Створити</button>
            </div>
        </form>
    </div>
@endsection
