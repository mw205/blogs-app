<x-layout>
    <main class="mx-5">
        <div class="max-w-4xl mx-auto mt-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Post Info</h2>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700"><span class="font-semibold">Title:</span> {{ $post->title }}</p>
                    <p class="text-gray-700 mt-2"><span class="font-semibold">Description:</span>
                        {{ $post->description ?? 'No description' }}</p>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mt-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">Post Creator Info</h2>
                </div>
                <div class="px-6 py-4">
                    <p class="text-gray-700"><span class="font-semibold">Name:</span>
                        {{ $post->user->name ?? ''}}</p>
                    <p class="text-gray-700 mt-2"><span class="font-semibold">Email:</span>
                        {{ $post->user->email ?? ''}}
                    </p>

                    <p class="text-gray-700 mt-2"><span class="font-semibold">Created At:</span>
                        {{ $post->user->created_at ?? '' }}
                    </p>
                </div>
            </div>
            @if($post->comments->count() > 0)
                <p class="text-xl font-bold mt-5 mb-2">
                    Comments
                </p>
            @endif
            <form
                class="m-1.5"
                action="{{ route('comments.store', [$post]) }}" method="post">
                @csrf
                <label for="Comment">
                <textarea id="Comment"
                          name="body"
                          class="p-2 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm"
                          rows="4" placeholder="Add your comment"></textarea>
                </label>
                <button type="submit"
                        class="inline-block cursor-pointer rounded-sm border border-green-600 bg-green-600 px-3 py-2 text-sm font-medium text-white hover:bg-transparent hover:text-green-600">
                    Comment
                </button>
            </form>
            @foreach($post->comments as $comment)
                <div class="p-2 border-b">
                    <p>{{ $comment->body }}</p>
                    <small>By: {{ $comment->user->name }}</small>
                </div>
            @endforeach

            <div class="mt-6 my-12">
                <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    &larr; Back to all posts
                </a>
            </div>
        </div>
    </main>

</x-layout>
