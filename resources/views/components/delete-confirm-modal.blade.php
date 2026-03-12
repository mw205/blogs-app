<div
    id="delete_modal"
    class="fixed inset-0 z-50 hidden place-content-center bg-black/50 p-4"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modalTitle"
>
    <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
        <div class="flex items-start justify-between">
            <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Are you sure you want to delete this post?</h2>

            <button
                type="button"
                class="-me-4 -mt-4 rounded-full p-2 text-gray-400 transition-colors hover:bg-gray-50 hover:text-gray-600 focus:outline-none"
                aria-label="Close"
                onclick="closeDeleteModal()"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="mt-4">
            <p class="text-pretty text-gray-700">
                This action cannot be undone.
            </p>
        </div>

        <footer class="mt-6 flex justify-end gap-2">
            <button
                type="button"
                class="rounded bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-200"
                onclick="closeDeleteModal()"
            >
                Cancel
            </button>

            <form method="POST" id="delete_form">
                @csrf
                @method('DELETE')

                <button type="submit" class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-red-700">
                    Delete
                </button>
            </form>
        </footer>
    </div>
</div>
