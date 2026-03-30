<?php
$content = [
    'title' => 'What new Word/Expression did you learn today?!',
    'paragraph' => "Reflection helps lock in new vocabulary. Share your favorite takeaway from today's interactive session!",
    'cta' => "Let's talk about it!",
    'image' => materialAsset('slider/A1/Beginner/chapter-1/img/wrapUp.webp'),
];
?>

@extends("slider.simple-layout")
@section("content")
    <div class="min-h-[100dvh] overflow-x-hidden overflow-y-auto">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1200px] items-center px-6 py-10 lg:px-16 lg:py-14">
            <section class="wrap-grid grid w-full items-center gap-10 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16">

                <figure
                        data-anim="image"
                        class="relative overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/70 shadow-2xl shadow-slate-900/10 backdrop-blur-xl dark:border-slate-200/10 dark:bg-white/5 dark:shadow-none
                           w-full max-w-[420px] aspect-[4/5] mx-auto lg:mx-0"
                >
                    <img
                            src="{{ $content['image'] }}"
                            alt="{{ $content['title'] }}"
                            class="h-full w-full object-cover"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 via-transparent to-transparent dark:from-slate-950/50"></div>
                </figure>

                <div class="text-content text-center lg:text-left">

                    <h1 data-anim="title" class="mt-5 text-3xl sm:text-4xl lg:text-5xl font-black leading-[1.08] tracking-tight">
                        {!! str_replace(
                            'Word/Expression',
                            '<span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">Word/Expression</span>',
                            e($content['title'])
                        ) !!}
                    </h1>

                    <p data-anim="paragraph" class="mx-auto mt-5 max-w-[480px] text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                        {{ $content['paragraph'] }}
                    </p>

                    <div data-anim="cta" class="mx-auto mt-8 flex w-fit items-center gap-3 rounded-2xl border border-indigo-200/70 bg-indigo-50/80 px-4 py-3 text-indigo-700 dark:border-indigo-400/30 dark:bg-indigo-500/10 dark:text-indigo-300 lg:mx-0">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white/80 dark:bg-white/10">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </span>
                        <span class="text-base font-extrabold">{{ $content['cta'] }}</span>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
