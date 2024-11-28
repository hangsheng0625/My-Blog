<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($projects->count())
            <div class="lg:grid lg:grid-cols-3 gap-x-4 space-y-4">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>

            {{ $projects->links() }}
        @else
            <p class="text-center">No projects yet. Please check back later.</p>
        @endif
    </main>
</x-layout>
