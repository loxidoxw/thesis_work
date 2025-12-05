@extends('layouts.app')

@section('content')
    <x-course-navbar :course="$course" active="overview"/>
    @csrf
    <h3 class="font-bold text-2xl w-full max-w-5xl mx-auto mt-6">{{$course->title}}</h3>
    <div aria-hidden="true"
         class="w-full max-w-5xl mx-auto mt-6 bg-white rounded-2xl border border-gray-100 shadow-md p-8 min-h-[220px]">
        @if (Auth::user()->role === 'teacher')
            <Div>
                <x-nav-link :href="route('section.create', $course->id) ">
                    {{ __('Додати Тему') }}
                </x-nav-link>
            </Div>
        @endif
        @foreach ($sections as $section)
            <div class="w-full bg-white rounded-2xl shadow-md p-4 mb-2 relative">
                <div class="flex items-center space-x-2">
                    <button
                        class="button-section w-10 h-10 flex items-center justify-center rounded-xl border border-gray-300
           hover:bg-gray-100 transition cursor-pointer">
                        <svg class="w-5 h-5 text-gray-700 transition-transform" fill="none" stroke="currentColor"
                             stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <span>{{$section->title}}</span>

                    @if (Auth::user()->role === 'teacher')
                        <div class="absolute right-4 ">
                            <button id="openLessonModal"
                                    class="button-lesson bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-2xl">
                                Додати Урок
                            </button>
                        </div>
                        <div id="modalOverlay"
                             class="hidden fixed w-full h-full top-0 left-0 flex items-center justify-center">
                            <x-lesson-create-modal class="lesson-create-modal" :section="$section"
                                                   :nextOrder="$section->lessons->count() + 1"/>
                        </div>

                        <script>
                            $(document).ready(function () {
                                $('#openLessonModal').on('click', function () {
                                    $('#modalOverlay').removeClass('hidden');
                                })
                                $('.close-model').on('click', function () {
                                    $('#modalOverlay').addClass('hidden');
                                })
                            })
                        </script>

                    @endif
                </div>

                <div class="dropdown-section max-h-0 overflow-hidden transition-all duration-300 mt-2 space-y-2">
                    @foreach ($lessons->where('section_id', $section->id) as $lesson)
                        <div class="flex w-full bg-gray-50 rounded-2xl p-3 hover:bg-gray-100 cursor-pointer">
                            <x-lesson-icon :type="$lesson->type"/>
                            <a href="{{route('lesson.show', $lesson->id)}}">{{$lesson->title}}</a>
                        </div>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>

    <script>
        $(document).ready(function () {
            $('.button-section').on('click', function () {
                const dropdown = $(this).closest('div').next('.dropdown-section');
                const svg = $(this).find('svg');

                if (dropdown.hasClass('max-h-0')) {
                    dropdown.removeClass('max-h-0').addClass('max-h-96');
                } else {
                    dropdown.removeClass('max-h-96').addClass('max-h-0');
                }
                svg.toggleClass('rotate-90');
            });
        })
    </script>
@endsection


