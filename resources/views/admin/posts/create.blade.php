<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />

            <x-form.field>
                <x-form.label name="category"/>

                <div class="flex flex-col">
                    <!-- Dropdown for Existing Categories -->
                    <select name="category_id" id="category_id" class="flex-grow mb-2" required onchange="toggleNewCategoryField()">
                        <option value="">Select an Existing Category</option>
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                        <!-- Option to let users enter a new category -->
                        <option value="new">Enter New Category</option>
                    </select>

                    <!-- Input for New Category -->
                    <input
                        type="text"
                        name="new_category"
                        id="new_category"
                        placeholder="Create New Category"
                        class="flex-grow border border-gray-300 rounded-md p-2 hidden"
                        value="{{ old('new_category') }}"
                    >

                    <x-form.error name="category_id"/>
                    <x-form.error name="new_category"/>
                </div>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>

<script>
    // Function to toggle the visibility of the new category input
    function toggleNewCategoryField() {
        const categorySelect = document.getElementById('category_id');
        const newCategoryInput = document.getElementById('new_category');

        // If "Enter New Category" is selected, show the input field
        if (categorySelect.value === 'new') {
            newCategoryInput.classList.remove('hidden');
        } else {
            newCategoryInput.classList.add('hidden');
        }
    }

    // Run the toggle function on page load to maintain the state if a category was already selected
    document.addEventListener('DOMContentLoaded', function () {
        toggleNewCategoryField();
    });
</script>
