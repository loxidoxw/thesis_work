@extends('layouts.app')

@section('content')
    @csrf
    <x-course-navbar :course="$course" active="participants" />

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ім'я / Прізвище
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Роль
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <!-- Аватар з ініціалами -->
                                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-{{ ['purple', 'red', 'blue', 'green', 'yellow', 'pink'][array_rand(['purple', 'red', 'blue', 'green', 'yellow', 'pink'])] }}-500 flex items-center justify-center text-white font-semibold text-lg">
                                    {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <a href="#" class="text-blue-600 hover:underline font-medium text-lg">
                                        {{ $user->name }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-900 text-base">
                            {{ ucfirst($user->role) }}
                        </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
