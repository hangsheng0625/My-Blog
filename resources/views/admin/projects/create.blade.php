<x-layout>
    <x-project-setting heading="Publish New Project">
        <form method="POST" action="/admin/projects" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />
            <x-form.input name="github" required />
            <x-form.input name="project link" required />
            <x-form.button>Publish</x-form.button>
        </form>
    </x-project-setting>
</x-layout>

