<x-layout>

    <main class="mx-5">
        <div class="flex justify-end mb-5">
            <a class="inline-block rounded-sm border border-b-green-500-600 bg-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600"
               href="{{ route("posts.create") }}">
                ADD
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900">
                    <th class="px-3 py-2 whitespace-nowrap">ID</th>
                    <th class="px-3 py-2 whitespace-nowrap">Title</th>
                    <th class="px-3 py-2 whitespace-nowrap">Posted By</th>
                    <th class="px-3 py-2 whitespace-nowrap">Created At</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @foreach($posts as $post)

                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->title }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post?->user?->name ?? "" }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post->created_at }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a class="inline-block rounded-sm border border-teal-600 bg-teal-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-teal-600"
                               href="{{ route('posts.show', $post->id) }}">
                                View
                            </a>
                            <a class="inline-block rounded-sm border border-blue-600 bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-blue-600"
                               href="{{route("posts.edit", $post->id)}}">
                                Edit
                            </a>
                            <button
                                class="inline-block cursor-pointer rounded-sm border border-red-600 bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600"
                                onclick="confirmDelete({{ $post->id }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
            <div
                class="mt-6">
                {{$posts->links()}}
            </div>
            {{--            <ul class="flex justify-center gap-1 text-gray-900 my-5">--}}
            {{--                <li>--}}
            {{--                    <a href="#"--}}
            {{--                       class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"--}}
            {{--                       aria-label="Previous page">--}}
            {{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">--}}
            {{--                            <path fill-rule="evenodd"--}}
            {{--                                  d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"--}}
            {{--                                  clip-rule="evenodd"></path>--}}
            {{--                        </svg>--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            {{--                <li>--}}
            {{--                    <a href="#"--}}
            {{--                       class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">--}}
            {{--                        1--}}
            {{--                    </a>--}}
            {{--                </li>--}}

            {{--                <li class="block size-8 rounded border border-indigo-600 bg-indigo-600 text-center text-sm/8 font-medium text-white">--}}
            {{--                    2--}}
            {{--                </li>--}}


            {{--                <li>--}}
            {{--                    <a href="#"--}}
            {{--                       class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"--}}
            {{--                       aria-label="Next page">--}}
            {{--                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">--}}
            {{--                            <path fill-rule="evenodd"--}}
            {{--                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"--}}
            {{--                                  clip-rule="evenodd"></path>--}}
            {{--                        </svg>--}}
            {{--                    </a>--}}
            {{--                </li>--}}
            {{--            </ul>--}}
        </div>
    </main>

    <x-delete-confirm-modal/>

    <script>
        function confirmDelete(postId) {
            const modal = document.getElementById('delete_modal');
            const form = document.getElementById('delete_form');

            form.action = `/posts/${postId}`;
            modal.classList.remove('hidden');
            modal.classList.add('grid');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('delete_modal');

            modal.classList.add('hidden');
            modal.classList.remove('grid');
        }
    </script>

</x-layout>
