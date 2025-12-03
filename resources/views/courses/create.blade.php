@extends('layouts.app')

@section ('content')
    <div class="container py-4">
    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-md space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-gray-800">Створити курс</h2>

        {{-- Title --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Назва курсу</label>
            <input
                type="text"
                name="title"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Введіть назву курсу"
                required
            >
        </div>

        {{-- Description --}}
        <div>
            <label class="block mb-1 font-medium text-gray-700">Опис</label>
            <textarea
                name="description"
                rows="4"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="Короткий опис курсу"
                required
            ></textarea>
        </div>

        {{-- Image --}}
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

        {{-- Submit --}}
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold"
        >
            Створити курс
        </button>
    </form>
    </div>
@endsection
