<x-layout>
    <main class="flex justify-center mx-5">
        <div class="Block align-middle w-3/6 rounded-lg p-4 shadow-xs shadow-indigo-100">
            <form action="{{ route('posts.store') }}" method="post" class="flex flex-col gap-4"
                enctype="multipart/form-data">
                @csrf
                <label for="PostImage" class="block rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6">
                    <div class="flex items-center justify-center gap-4">
                        <span class="font-medium"> Upload your file</span>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75">
                            </path>
                        </svg>
                    </div>
                    <input name="post_image" type="file" id="PostImage" class="sr-only" accept="image/png image/jpg">
                </label>
                @error("post_image")
                    <span>
                        {{ $message }}
                    </span>
                @enderror
                {{-- preview uploaded image --}}
                @if (isset($_FILES["post_image"]))

                    <div class="flex justify-center gap-4">
                        {{ "preview" }}
                    </div>
                @endif

                <label for="Title">
                    <span class="text-md font-medium text-gray-700"> Title </span>
                    <input type="text" name="title" id="Title" value="{{old('title')}}"
                        class="p-2 mt-1.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">
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
                        rows="4">{{old("description")}}</textarea>
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
                            <option @selected(old('user_id') == $user->id) value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </label>
                <div class="flex justify-center m-5">
                    <button
                        class="inline-block rounded-sm border border-b-green-500-600 bg-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600"
                        type="submit">
                        Create Post
                    </button>
                </div>
            </form>
        </div>
    </main>
</x-layout>