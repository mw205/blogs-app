<x-layout>
    <main class="flex justify-center mx-5">
        <div class="Block align-middle w-3/6 rounded-lg p-4 shadow-xs shadow-indigo-100">
            <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                @if ($post->post_image)
                    <div id="current-image-container">
                        <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                        <img alt="post image" src="{{ Storage::url($post->post_image) }}"
                            class="h-56 w-full object-cover rounded-lg">
                    </div>
                @endif


                <label for="PostImage"
                    class="block rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6 cursor-pointer hover:bg-gray-50 transition">

                    <div class="flex items-center justify-center gap-4">
                        <span class="font-medium" id="upload-text">
                            @if ($post->post_image)
                                Change
                            @else
                                Upload
                            @endif
                            post image</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75">
                            </path>
                        </svg>
                    </div>
                    <input name="post_image" type="file" id="PostImage" class="sr-only"
                        accept="image/png, image/jpeg, image/jpg">
                </label>

                {{-- Preview Container --}}
                <div id="preview-container" class="hidden relative group">
                    <p class="text-xs text-blue-500 mb-1 font-bold">New Image Preview:</p>
                    <div class="relative inline-block w-full">
                        <img id="image-preview" src=""
                            class="h-56 w-full object-cover rounded-lg border-2 border-blue-400 shadow-sm">
                        <button type="button" onclick="clearPreview()"
                            class="absolute top-2 right-2 bg-red-600/90 text-white rounded-full p-1.5 shadow-md hover:bg-red-700 transition focus:outline-none flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <label for="Title">
                    <span class="text-md font-medium text-gray-700"> Title </span>

                    <input type="text" name="title" id="Title"
                        class="p-2 mt-1.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"
                        value="{{old("title", $post->title)}}">

                    @error('title')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </label>
                <label for="Description">
                    <span class="text-sm font-medium text-gray-700"> Description </span>

                    <textarea id="Description" name="description"
                        class="p-2  mt-1.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm"
                        rows="4">{{ old("description", $post->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </label>
                <label for="Creator">
                    <span class="text-sm font-medium text-gray-700"> Post Creator </span>

                    <select name="user_id" id="Creator"
                        class="p-2 mt-1.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">
                        <option value="">Please select</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @selected(old('creator_id', $post->user->id) == $user->id)>
                                {{ $user->name }}
                            </option>
                        @endforeach
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </select>
                </label>
                <div class="flex justify-center m-5">
                    <button type="submit"
                        class="inline-block rounded-sm border border-b-green-500-600 bg-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600">
                        Edit Post
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('PostImage').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('image-preview');
            const uploadText = document.getElementById('upload-text');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    uploadText.innerText = 'New image selected';
                }
                reader.readAsDataURL(file);
            }
        });

        function clearPreview() {
            const fileInput = document.getElementById('PostImage');
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('image-preview');
            const uploadText = document.getElementById('upload-text');

            fileInput.value = ''; // Clear the actual file input
            previewImage.src = '';
            previewContainer.classList.add('hidden');
            uploadText.innerText = '{{ $post->post_image ? "Change" : "Upload" }} post image';
        }
    </script>
</x-layout>