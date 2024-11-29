@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="/admin/projects" class="{{ request()->is('admin/projects') ? 'text-blue-500' : '' }}">All Projects</a>
                </li>

                <li>
                    <a href="/admin/projects/create" class="{{ request()->is('admin/projects/create') ? 'text-blue-500' : '' }}">New Project</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
