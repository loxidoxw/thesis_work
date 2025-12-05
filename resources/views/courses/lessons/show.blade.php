@extends('layouts.app')

    @section('content')
        <div class="bg-gray-100 min-h-screen py-8">

            {{-- Верхній блок з датами --}}
            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow p-6 mb-8">
                <p class="text-sm">
                    <strong>Початок приймання:</strong>  {{-- {{ $lesson->content['start_date'] }} --}}
                </p>
                <p class="text-sm">
                    <strong>Термін спливає:</strong> {{ $lesson->content['deadline'] }}
                </p>
            </div>

            <div class="max-w-7xl mx-auto bg-white rounded-xl shadow p-6">



                <h2 class="text-2xl font-semibold mb-4">Статус роботи</h2>

                <div class="overflow-hidden border border-gray-200 rounded-lg">
                    <table class="w-full">
                        <tbody class="text-sm">

                        <tr class="border-b">
                            <td class="bg-gray-50 w-1/4 p-3 font-medium">Статус роботи</td>
                                @if  ($submission === null )
                                <td class="p-3">
                                    Не здано
                                </td>
                                @elseif ( $submission->status === 'graded' )
                                    <td class="p-3 text-blue-600 hover:underline">
                                        Оцінено
                                    </td>
                                @elseif ( $submission->status === 'submitted' )
                                <td class="p-3 bg-green-400">
                                    Здано
                                </td>
                                @else
                                <td class="p-3">Не здано</td>
                                @endif
                        </tr>

                        <tr class="border-b">
                            <td class="bg-gray-50 p-3 font-medium">Оцінка</td>
                            <td class="p-3">{{ $submission->grade?->grade ?? '—' }}</td>
                        </tr>

                        <tr class="border-b">
                            <td class="bg-gray-50 p-3 font-medium">Залишилося часу</td>
                            <td class="p-3 text-red-600">Завдання прострочено на: 50 днів 20 годин
                                {{-- logic for deadline --}} </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                @if (Auth::user()->role === 'student')
                <form action="{{route('submission.store', $lesson->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div>
                    <label class="block mb-1 font-medium text-gray-700">Завантажити файл</label>
                    <input
                        type="file"
                        name="file_path"
                        class="w-full text-gray-700"
                        accept=".pdf,.doc,.docx,.ppt,.pptx"
                        required
                    >
                </div>

                <div class="mt-4 ">
                    <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-medium">
                        Здати роботу
                    </button>
                </div>
                </form>
                @endif

                @if (Auth::user()->role === 'teacher')
                <h2 class="text-xl font-semibold mb-4">Сабмішини студентів</h2>

                <table class="w-full border rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Студент</th>
                        <th class="p-3 text-left">Статус</th>
                        <th class="p-3 text-left">Оцінка</th>
                        <th class="p-3 text-left">Дія</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($lesson->submissions as $submission)
                        <tr class="border-t">
                            <td class="p-3">{{ $submission->student->name }}</td>

                            <td class="p-3">
                                @if($submission->file_path)
                                    <span class="text-green-600 font-semibold">Здано</span>
                                @else
                                    <span class="text-red-600 font-semibold">Не здано</span>
                                @endif
                            </td>

                            <td class="p-3">
                                @if($submission->grade)
                                    {{ $submission->grade->grade }}/100 балів
                                @else
                                    -
                                @endif
                            </td>

                            <td class="p-3">
                                <a href="{{route('submission.show', $submission->id)}}"
                                   class="text-blue-600 hover:underline">
                                    Переглянути
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                <div class="mt-10 bg-gray-50 border rounded-xl p-5 flex items-center justify-between">

                    <div class="flex items-center gap-3">
                        <div class="text-gray-500">‹</div>
                        <div>
                            <p class="text-xs text-gray-500">Попередня діяльність</p>
                            <a href="#" class="text-blue-600 hover:underline">
                                Task for the lab 1
                            </a>
                        </div>
                    </div>

                    <div class="w-1/3">
                        <select class="w-full border rounded-md px-3 py-2 text-sm">
                            <option>Перейти до...</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-3 text-right">
                        <div>
                            <p class="text-xs text-gray-500">Наступна діяльність</p>
                            <a href="#" class="text-blue-600 hover:underline">
                                Classwork presentation
                            </a>
                        </div>
                        <div class="text-gray-500">›</div>
                    </div>
                </div>

            </div>

        </div>
    @endsection


