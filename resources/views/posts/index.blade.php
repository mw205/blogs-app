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
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post["id"] }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post["title"] }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post['created_at'] }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $post['created_at'] }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <a class="inline-block rounded-sm border border-teal-600 bg-teal-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-teal-600"
                               href="{{ route('posts.show', $post['id']) }}">
                                View
                            </a>
                            <a class="inline-block rounded-sm border border-blue-600 bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-blue-600"
                               href="{{route("posts.edit",$post["id"])}}">
                                Edit
                            </a>
                            <button
                                class="inline-block cursor-pointer rounded-sm border border-red-600 bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-red-600"
                                onclick="confirmDelete({{ $post['id'] }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach()

                </tbody>
            </table>
        </div>
    </main>

    <x-delete-confirm-modal/>

    <script>
        function confirmDelete(postId) {
            const modal = document.getElementById('delete_modal');
            const form = document.getElementById('delete_form');

            form.action = `{{ url('/posts') }}/${postId}`;
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
