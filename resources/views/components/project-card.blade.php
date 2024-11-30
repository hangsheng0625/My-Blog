{{--@props(['project'])--}}

{{--<article {{ $attributes->merge(['class' => 'rounded-xl border border-black border-opacity-0 hover:border-opacity-5 transition-colors duration-300']) }}>--}}
{{--    <div class="py-6 px-5">--}}
{{--        <div>--}}
{{--            <img src="{{ asset('storage/' . $project->image_url) }}" alt="Project Image" class="rounded-xl">--}}
{{--        </div>--}}

{{--        <div class="mt-6 flex flex-col justify-between">--}}
{{--            <header>--}}
{{--                <div class="space-x-2">--}}
{{--                    <a href="/projects/{{ $project->slug }}"--}}
{{--                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"--}}
{{--                       style="font-size: 10px">{{ $project->name }}</a>--}}
{{--                </div>--}}

{{--                <div class="mt-4">--}}
{{--                    <h1 class="text-xl">--}}
{{--                        <a href="/projects/{{ $project->slug }}">--}}
{{--                            {{ $project->name }}--}}
{{--                        </a>--}}
{{--                    </h1>--}}

{{--                    <span class="mt-2 block text-gray-400 text-xs">--}}
{{--                        Published <time>{{ $project->created_at->diffForHumans() }}</time>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </header>--}}

{{--            <div class="text-sm mt-4">--}}
{{--                <p>{{ $project->excerpt }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</article>--}}

@props(['project'])
<article {{ $attributes->merge(['class' => 'rounded-xl border border-black border-opacity-0 hover:border-opacity-5 transition-colors duration-300']) }}>
    <div class="py-6 px-5 flex">
        <!-- Date Section -->
        <div class="mr-4 flex flex-col text-sm text-gray-600">
            <div class="mb-2">
                <strong>Start Date:</strong>
                <p>{{ $project->start_date ? $project->start_date->format('F j, Y') : 'N/A' }}</p>
            </div>
            <div>
                <strong>End Date:</strong>
                <p>{{ $project->end_date ? $project->end_date->format('F j, Y') : 'Ongoing' }}</p>
            </div>
        </div>

        <!-- Project Content Section -->
        <div class="flex-grow">
            @if($project->thumbnail)
                <div class="mb-4">
                    <img
                        src="{{ asset('storage/' . $project->thumbnail) }}"
                        alt="{{ $project->title }} Thumbnail"
                        class="rounded-xl w-full h-48 object-cover"
                    >
                </div>
            @endif

            <div class="mt-4 flex flex-col justify-between">
                <header>
                    <div class="space-x-2">
                        <a href="/projects/{{ $project->slug }}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $project->title }}</a>
                    </div>

                    <div class="mt-4">
                        <h1 class="text-xl">
                            <a href="/projects/{{ $project->slug }}">
                                {{ $project->title }}
                            </a>
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $project->created_at->diffForHumans() }}</time>
                        </span>
                    </div>
                </header>

                <div class="text-sm mt-4">
                    <p>{{ $project->excerpt }}</p>
                </div>
            </div>
                <!-- Links Section -->
                <div class="mt-4">
                    <a href="/projects/{{ $project->slug }}"
                       class="text-blue-500 text-sm font-semibold hover:underline">
                        View Project
                    </a>
                </div>
        </div>
    </div>
</article>

