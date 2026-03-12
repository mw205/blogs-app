<x-layout>
    <main class="mx-5">
        <div class="max-w-4xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Post Info</h2>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700"><span class="font-semibold">Title:</span> {{ $post['title'] }}</p>
                    <p class="text-gray-700 mt-2"><span
                            class="font-semibold">Description:</span> {{ $post['description'] ?? 'No description' }}</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mt-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Post Creator Info</h2>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700"><span class="font-semibold">Name:</span> {{ $post["creator"]['name'] }}</p>
                    <p class="text-gray-700 mt-2"><span
                            class="font-semibold">email:</span> {{ $post["creator"]['email'] }}
                    </p>

                    <p class="text-gray-700 mt-2"><span
                            class="font-semibold">Created At:</span> {{ $post["creator"]['created_at'] }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    &larr; Back to all posts
                </a>
            </div>
        </div>
    </main>

</x-layout>
