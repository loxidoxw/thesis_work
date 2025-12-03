
@props(['active' => null, 'course'])

<div class="w-full bg-blue-800 text-white shadow">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="flex space-x-8">

            {{-- Main course page --}}
            <a
                href="{{ route('course.show', $course->id) }}"
                class="py-4 block border-b-2 {{ $active === 'overview' ? 'border-white' : 'border-transparent hover:border-blue-300' }}"
            >
                Курс
            </a>

            {{-- Participants --}}
            <a
                href="{{ route('course.participants', $course->id) }}"
                class="py-4 block border-b-2 {{ $active === 'participants' ? 'border-white' : 'border-transparent hover:border-blue-300' }}"
            >
                Учасники
            </a>

            {{-- Grades --}}
            <a
                href="{{ route('course.grade', $course->id) }}"
                class="py-4 block border-b-2 {{ $active === 'grade' ? 'border-white' : 'border-transparent hover:border-blue-300' }}"
            >
                Журнал оцінок
            </a>

            {{-- Types of activities --}}
            <a
                href="{{ route('course.activities', $course->id) }}"
                class="py-4 block border-b-2 {{ $active === 'activities' ? 'border-white' : 'border-transparent hover:border-blue-300' }}"
            >
                Види діяльності
            </a>

            {{-- competencies --}}
            <a
                href="{{ route('course.competencies', $course->id) }}"
                class="py-4 block border-b-2 {{ $active === 'competencies' ? 'border-white' : 'border-transparent hover:border-blue-300' }}"
            >
                Компетенції
            </a>

        </nav>
    </div>
</div>
