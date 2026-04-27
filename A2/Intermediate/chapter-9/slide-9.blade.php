<?php
$content = [
    'title' => 'Remember the following',
    'image' => materialAsset('slider/A2/Intermediate/chapter-9/img/slide9.webp'),
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
                    @include('slider.components.title-subtitle')

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
