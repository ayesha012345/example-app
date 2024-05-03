<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">

    <meta http-equiv="x-ua-compitable" content="ie=edge"
    />
    <title>Laravel App</title>
    <link href="{{ asset('CSS/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="w-4/5 mx-auto">
        <div class="pt-10">
            <a href="{{ URL::previous() }}" class="text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                &lt; Back to previous page
            </a>
        </div>

        <h4 class="text-2xl sm:text-center md:text-5xl font-bold text-gray-900 py-10 sm:py-20">
            {{ $post->title }}
        </h4>

        <div class="block lg:flex flex-row">
            <div class="basis-9/12 text-center sm:block">
                <span class="text-left text-gray-900 pb-10">
                    Made by:
                    <a href="" class="font-bold text-green-500 italic hover:text-green-400 hover:border-b-2 border-green-400 pb-3 transition-all py-20">
                        laravel framework
                    </a>
                    On 25-03-2024
                </span>
            </div>
        </div>

        <div class="pt-10 pb-10 text-gray-900 text-xl">
            <p class="font-bold text-2xl text-black pt-10">
                {{ $post->excerpt }}
            </p>

            <p class="text-base text-black pt-10">
                {{ $post->body }}
            </p>
        </div>
    </div>
</body>
</html>
