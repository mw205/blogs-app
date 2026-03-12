<x-layout>
    <main class="flex justify-center mx-5">
        <div class="Block align-middle w-3/6 rounded-lg p-4 shadow-xs shadow-indigo-100">
            <form action="{{ route('posts.store') }}" method="post" class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                <label for="Title">
                    <span class="text-md font-medium text-gray-700"> Title </span>

                    <input type="text" id="Title"
                           class="p-2 mt-1.5 w-full rounded border-gray-300 shadow-sm sm:text-sm"
                           value="{{old("title",$post["title"])}}">
                </label>
                <label for="Description">
                    <span class="text-sm font-medium text-gray-700"> Description </span>

                    <textarea id="Description"
                              class="p-2  mt-1.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm"
                              rows="4">
                        {{old("description") , $post["description"]}}
                    </textarea>
                </label>
                <label for="Creator">
                    <span class="text-sm font-medium text-gray-700"> Post Creator </span>

                    <select name="Creator" id="Creator"
                            class="p-2 mt-1.5 w-full rounded border-gray-300 shadow-sm sm:text-sm">
                        <option value="">Please select</option>
                        <option value="1" @selected(old('creator_id', $post['creator']["id"]) == 1)>Mohamed Waleed
                        </option>

                        <option value="2" @selected(@old("creator_id" , $post["creator"]["id"]))>Ahmed Waleed</option>
                    </select>
                </label>
                <div class="flex justify-center m-5">
                    <a class="inline-block rounded-sm border border-b-green-500-600 bg-green-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-green-600"
                       href="{{ route("posts.update",$post["id"]) }}">
                        Edit Post
                    </a>
                </div>
            </form>
        </div>
    </main>
</x-layout>
