
<?php
$content = [
    'page_title' => 'Page Title',
    'title'      => 'Title here',
    'subtitle'   => 'Subtitle here',
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('content')
    <main class="w-full">
        <div class="mx-auto w-full max-w-5xl px-4 sm:px-8 py-8 sm:py-10 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div class="grid place-items-center text-center gap-3 sm:gap-4">
                    <div id="titleBlock" class="space-y-1 sm:space-y-2">
                        <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-4xl sm:text-5xl lg:text-6xl">
                            <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                {{ $content['title'] }}
                            </span>
                        </h1>

                        <p class="font-extrabold tracking-[-0.02em] text-base sm:text-lg text-slate-700 dark:text-slate-200">
                            {{ $content['subtitle'] }}
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
