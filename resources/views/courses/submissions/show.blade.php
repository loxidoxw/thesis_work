@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mt-6 mx-auto p-6 bg-white shadow rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Деталі здачі: {{ $submission->lesson->title }}</h1>

        <div class="mb-4">
            <span class="font-semibold">Статус роботи:</span>
            @if($submission->status === 'submitted')
                <span class="text-green-600 font-bold">Здано</span>
            @elseif($submission->status === 'graded')
                <span class="text-blue-600 font-bold">Оцінено</span>
            @else
                <span class="text-gray-500 font-bold">Не здано</span>
            @endif
        </div>

        <div class="mb-4">
            <span class="font-semibold">Востаннє змінено:</span>

        </div>

        <div class="mb-4">
            <span class="font-semibold">Робота студента:</span>
            <div class="mt-2 p-4 bg-gray-100 rounded">
                @if($submission->file_path)
                    <a href="{{ asset('storage/' . $submission->file_path) }}" class="text-blue-500 underline" target="_blank">Переглянути Файл</a>
                @else
                    <span class="text-gray-500">Немає наданої роботи</span>
                @endif
            </div>
        </div>

        <div class="mt-6 p-4 bg-gray-50 rounded border">
            <h2 class="text-xl font-semibold mb-2">Оцінити роботу</h2>
            <form action="{{ route('grade.store', $submission) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="score" class="block font-medium mb-1">Оцінка: {{ $submission->grade->grade ?? '0' }} /100</label>
                    <input type="number" name="grade" id="score" min="0" max="100"
                           class="w-24 p-2 border rounded">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Зберегти оцінку
                </button>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('lesson.show', $submission->lesson) }}" class="text-blue-500 underline">Назад до уроку</a>
        </div>
    </div>
@endsection
