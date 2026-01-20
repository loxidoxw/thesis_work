@props(['course','section','nextOrder'])
<div class="fixed inset-0 flex items-center justify-center z-50" id="lessonModal">

    <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">

        <!-- Close button -->
        <button
            class="close-model absolute top-3 right-3 text-gray-600 hover:text-black text-2xl leading-none">
            &times;
        </button>

        <h2 class="text-xl font-semibold mb-4">Створити новий урок</h2>

        <form action="{{ route('lesson.store', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Section -->
            <input type="hidden" name="section_id" value="{{ $section->id }}">

            <!-- Title -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Назва уроку</label>
                <input
                    type="text"
                    name="title"
                    class="w-full border rounded-md px-3 py-2"
                    placeholder="Введіть назву"
                    required>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label  class="block mb-1 font-medium">Тип уроку</label>
                <select id="lessonType"
                    name="type"
                    class="w-full border rounded-md px-3 py-2">
                    <option value="lecture">Лекція</option>
                    <option value="assignment">Практичне завдання</option>
                </select>
            </div>

            <!-- Input lecture -->
            <div id="lecture_input" class="mb-4">
                <div id="lecture_link_block" class="">
                    <label>Посилання на лекцію (Google Drive)</label>
                    <input type="url" name="file_url" class="form-control">
                </div>
            </div>


            <!-- Input practice task -->
            <div id="practice_input" class="mb-4 d-none">

                <label>Файл з матеріалом уроку</label>
                <input type="file" name="file_path" class="form-control">

                <label class="mt-3">Опис завдання</label>
                <textarea name="task_description" class="form-control mb-4"></textarea>

                <label>Початок приймання</label>
                <input type="date" name="start_date" class="form-control mb-4">

                <label>Кінець приймання</label>
                <input type="date" name="deadline" class="form-control mb-4">
            </div>

            <script>
                $(document).ready(function ()
                {
                    $('#lessonType').on('change', function ()
                    {
                        if ($(this).val() === 'lecture')
                        {
                            $('#lecture_input').removeClass('d-none');
                            $('#practice_input').addClass('d-none');
                        }
                        else
                        {
                            $('#lecture_input').addClass('d-none');
                            $('#practice_input').removeClass('d-none');
                        }
                    })
                })
            </script>

            <!-- Order -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Порядок</label>
                <input
                    type="number"
                    name="order"
                    class="w-full border rounded-md px-3 py-2"
                    min="1"
                    value="{{ $nextOrder }}">
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button
                    type="button"
                    class="close-model px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                    Скасувати
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Створити
                </button>
            </div>

        </form>

    </div>
</div>
