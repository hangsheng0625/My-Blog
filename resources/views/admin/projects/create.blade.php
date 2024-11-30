<x-layout>
    <x-project-setting heading="Publish New Project">
        <form method="POST" action="/admin/projects" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />
            <x-form.input name="github_link" required />
            <x-form.input name="project_link" required />
            <x-form.input name="start_date" required />
            <x-form.input name="end_date" required />
            <x-form.button>Publish</x-form.button>
        </form>
    </x-project-setting>
</x-layout>

