<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
<header class="bg-white">
    <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">


        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="font-bold text-xl text-gray-500 transition hover:text-gray-500/75"
                           href="{{route("posts.index")}}">
                            ITI Blogs
                        </a>
                    </li>

                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{route("posts.index")}}"> All
                            Posts </a>
                    </li>

                </ul>
            </nav>

        </div>
    </div>
</header>
{{$slot}}
</body>

</html>
