@extends('layouts.app')

@section('content')
    @if (Auth::user()->role === 'student')
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-center mb-6">Журнал оцінок</h1>

            <table class="w-full table-auto border-collapse">
                <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">Домашнє завдання</th>
                    <th class="px-4 py-2 text-left">Оцінка</th>
                    <th class="px-4 py-2 text-center">Буквенна оцінка</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">Числові та буквені вирази</td>
                    <td class="px-4 py-2">90</td>
                    <td class="px-4 py-2 text-center font-semibold text-green-600">A</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">Рівняння з однією змінною</td>
                    <td class="px-4 py-2">72</td>
                    <td class="px-4 py-2 text-center font-semibold text-yellow-500">C</td>
                </tr>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">Пропорції</td>
                    <td class="px-4 py-2">48</td>
                    <td class="px-4 py-2 text-center font-semibold text-red-600">F</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="min-h-screen bg-gray-100 p-8">
            <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h1 class="text-3xl font-bold text-center mb-6">Журнал оцінок до завдання: Пропорції</h1>

                <table class="w-full table-auto border-collapse">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left">Учень</th>
                        <th class="px-4 py-2 text-left">Оцінка</th>
                        <th class="px-4 py-2 text-center">Буквенна оцінка</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">Jane Student</td>
                        <td class="px-4 py-2">90</td>
                        <td class="px-4 py-2 text-center font-semibold text-green-600">A</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">Wiley Student</td>
                        <td class="px-4 py-2">65</td>
                        <td class="px-4 py-2 text-center font-semibold text-yellow-500">C</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">Wiley Student</td>
                        <td class="px-4 py-2">71</td>
                        <td class="px-4 py-2 text-center font-semibold text-yellow-500">C</td>
                    </tr>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">John Student</td>
                        <td class="px-4 py-2">43</td>
                        <td class="px-4 py-2 text-center font-semibold text-red-600">F</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
