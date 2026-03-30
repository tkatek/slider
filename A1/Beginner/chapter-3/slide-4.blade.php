<?php
$content = [
    'title' => 'Starting the Interview',
    'image' => materialAsset('slider/A1/Beginner/chapter-3/img/think.webp'),
];
?>

@extends("slider.simple-layout")

@section("style")

@endsection

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1560px] items-center px-4 py-6 sm:px-8 lg:px-10">
            <section class="w-full lg:aspect-[2/1]">
                <div class="grid h-full grid-rows-[auto_1fr] gap-6">
                    <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5 text-center">
                        <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                            {{$content['title']}}
                        </span>
                    </h1>

                    <div data-anim="visual" class="relative min-h-[60vh] sm:min-h-[66vh] lg:min-h-0">
                        <img class="h-full w-full object-contain object-center" src="{{ $content['image'] }}" alt="Interview illustration">
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
