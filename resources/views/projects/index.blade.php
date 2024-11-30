{{--<x-layout>--}}
{{--    @include ('posts._header')--}}

{{--    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">--}}
{{--        @if ($projects->count())--}}
{{--            <div class="lg:grid lg:grid-cols-3 gap-x-4 space-y-4">--}}
{{--                @foreach ($projects as $project)--}}
{{--                    <x-project-card :project="$project" />--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            {{ $projects->links() }}--}}
{{--        @else--}}
{{--            <p class="text-center">No projects yet. Please check back later.</p>--}}
{{--        @endif--}}
{{--    </main>--}}
{{--</x-layout>--}}

<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($projects->count())
            <div class="lg:grid lg:grid-cols-3 gap-x-4 space-y-4">
                @foreach ($projects as $project)
                    <x-project-card :project="$project">
                        <div class="text-sm text-gray-600">
                            <p>Start Date: {{ $project->start_date ? $project->start_date->format('F j, Y') : 'N/A' }}</p>
                            <p>End Date: {{ $project->end_date ? $project->end_date->format('F j, Y') : 'Ongoing' }}</p>
                        </div>
                    </x-project-card>
                @endforeach
            </div>

            {{ $projects->links() }}
        @else
            <p class="text-center">No projects yet. Please check back later.</p>
        @endif
    </main>
</x-layout>

