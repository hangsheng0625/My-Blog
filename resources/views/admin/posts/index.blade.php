<x-layout>
    <x-setting heading="Manage Posts">
        <div class="space-y-6" x-data>
            @foreach ($categories as $category)
                @if ($category->posts->count() > 0)
                    <div
                        x-data="{ isOpen: false }"
                        class="bg-white shadow overflow-hidden sm:rounded-lg"
                    >
                        <div
                            @click="isOpen = !isOpen"
                            class="px-4 py-5 sm:px-6 bg-gray-200 cursor-pointer flex justify-between items-center hover:bg-gray-150 transition"
                        >
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                {{ $category->name }}
                                <span class="text-sm text-gray-500">({{ $category->posts->count() }} posts)</span>
                            </h3>
                            <svg
                                x-show="!isOpen"
                                class="h-5 w-5 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                            <svg
                                x-show="isOpen"
                                class="h-5 w-5 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </div>

                        <table
                            x-show="isOpen"
                            x-transition
                            class="min-w-full divide-y divide-gray-200"
                        >
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($category->posts->take(10) as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{ $post->slug }}">
                                                    {{ $post->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($category->posts->count() > 10)
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                        Showing 10 of {{ $category->posts->count() }} posts
                                        <a href="{{ route('admin.category.posts', $category->id) }}" class="ml-2 text-blue-500 hover:underline">
                                            View All
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                @endif
            @endforeach

            @if ($categories->flatMap->posts->isEmpty())
                <p class="text-center text-gray-500 py-4">No posts found.</p>
            @endif
        </div>
    </x-setting>
</x-layout>
