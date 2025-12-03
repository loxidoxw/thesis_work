@props(['type'])

@if($type === 'lecture')
    <img src="{{ asset('storage/icons/lecture.svg') }}" alt="" class="h-5 w-5">
@elseif($type === 'assignment')
    <img src="{{ asset('storage/icons/assignment.svg') }}" alt="" class="h-5 w-5">
@else
    <img src="{{ asset('storage/icons/file.svg') }}" alt="" class="h-5 w-5">
@endif
