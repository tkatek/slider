<?php
$content = [
    'page_title' => 'Notice the following',
    'title' => 'Notice the following',
    'subtitle'=> 'Work is what you do. A job is where you do it',
    'topic' => 'work or job?',
    'columns' => [
        [
            'title' => 'work',
            'label' => 'Tasks/Effort',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide12/1.webp'),
                    'alt' => 'work',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide12/2.webp'),
                    'alt' => 'work',
                ],
            ],
        ],
        [
            'title' => 'job',
            'label' => 'Employment/Position',
            'items' => [
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide12/3.webp'),
                    'alt' => 'job',
                ],
                [
                    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide12/4.webp'),
                    'alt' => 'job',
                ],
            ],
        ],
    ],
];
?>

@extends("slider.simple-layout")

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1180px] flex-col items-center justify-center gap-4 px-4 py-4 sm:px-6 sm:py-5 lg:gap-5 lg:px-8 lg:py-6">

            <div data-anim="title" class="w-full text-center">
                @include('slider.components.title-subtitle')
            </div>

            <section
                    data-anim="visual"
                    class="w-full rounded-[28px] border border-white/70 bg-white/75 p-3 shadow-[0_22px_60px_-34px_rgba(15,23,42,0.45)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:p-4 lg:p-5"
            >
                <div class="mb-3 flex justify-center sm:mb-4">
                    <h2 class="rounded-full border border-slate-200 bg-white px-5 py-2 text-center text-xl font-black leading-tight tracking-[-0.03em] text-slate-900 shadow-sm dark:border-white/10 dark:bg-slate-900/80 dark:text-slate-50 sm:text-2xl lg:text-3xl">
                        {{ $content['topic'] }}
                    </h2>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-4 lg:gap-5">
                    @foreach($content['columns'] as $index => $column)
                        <article class="rounded-[24px] border border-slate-200/80 bg-white/90 p-3 shadow-[0_18px_38px_-28px_rgba(15,23,42,0.4)] dark:border-white/10 dark:bg-slate-900/65 sm:p-4 lg:p-5">
                            <h3 class="mb-3 text-center text-2xl font-black leading-tight tracking-[-0.03em] text-slate-900 dark:text-slate-50 sm:mb-4 sm:text-3xl lg:text-[2rem]">
                                {{ $column['title'] }}
                            </h3>

                            <div class="grid grid-cols-2 gap-3 sm:gap-4">
                                @foreach($column['items'] as $item)
                                    <div class="aspect-[5/4] overflow-hidden rounded-[20px] border border-slate-200/80 bg-slate-50 shadow-[0_14px_30px_-24px_rgba(15,23,42,0.45)] dark:border-white/10 dark:bg-slate-950/50">
                                        <img
                                                src="{{ $item['image'] }}"
                                                alt="{{ $item['alt'] }}"
                                                class="h-full w-full object-cover object-center"
                                                loading="lazy"
                                                draggable="false"
                                        >
                                    </div>
                                @endforeach
                            </div>

                            <p class="mx-auto mt-3 w-fit rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-center text-sm font-black leading-tight tracking-[-0.02em] text-slate-900 shadow-sm dark:border-white/10 dark:bg-slate-950/55 dark:text-slate-100 sm:mt-4 sm:text-base lg:text-lg">
                                {{ $column['label'] }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </section>

        </main>
    </div>
@endsection

@section("script")
    @parent
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = function () {};
        });
    </script>
@endsection