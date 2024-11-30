<x-layout>
    <x-project-setting heading="Edit Project: {{ $project->title }}">
        <form method="POST" action="/admin/projects/{{ $project->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $project->title)" required />
            <x-form.input name="slug" :value="old('slug', $project->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="$project->thumbnail" />
                </div>

                @if ($project->thumbnail)
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Current Thumbnail" class="rounded-xl ml-6" width="100">
                @endif
            </div>

            <x-form.textarea name="excerpt" required>
                {{ old('excerpt', $project->excerpt) }}
            </x-form.textarea>

            <x-form.textarea name="body" required>
                {{ old('body', $project->body) }}
            </x-form.textarea>

            <x-form.input name="github_link" :value="old('github_link', $project->github_link)" />
            <x-form.input name="project_link" :value="old('project_link', $project->project_link)" />

            <x-form.input name="start_date" type="date" :value="old('start_date', $project->start_date ? $project->start_date->format('Y-m-d') : '')" />
            <x-form.input name="end_date" type="date" :value="old('end_date', $project->end_date ? $project->end_date->format('Y-m-d') : '')" />

            <x-form.button>Update Project</x-form.button>
        </form>
    </x-project-setting>
</x-layout>
