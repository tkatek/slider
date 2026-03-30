<?php
$content = [
    'page_title'  => 'Ending the Interview',
    'title'       => 'Ending the Interview',
    'description' => 'At the end of the interview, it is important to thank the interviewer for their time. Saying “I look forward to hearing from you” shows your interest in the position.',
    'image'       => materialAsset('slider/A1/Beginner/chapter-3/img/ending.webp'),
];
?>

@extends('slider.simple-layout')

@section('title', $content['page_title'])

@section('style')
    <style>
        .slide-font { font-family: 'Manrope', 'Plus Jakarta Sans', sans-serif; }
        .display-font { font-family: 'Sora', 'Manrope', sans-serif; }

        .soft-bg{
            background:
                    radial-gradient(980px 560px at 10% 12%, rgba(103,63,231,.18), transparent 55%),
                    radial-gradient(860px 520px at 92% 18%, rgba(59,130,246,.14), transparent 55%),
                    linear-gradient(180deg, rgba(248,250,252,1), rgba(241,245,249,1));
        }
        .dark .soft-bg{
            background:
                    radial-gradient(980px 560px at 10% 12%, rgba(103,63,231,.24), transparent 55%),
                    radial-gradient(860px 520px at 92% 18%, rgba(59,130,246,.18), transparent 55%),
                    linear-gradient(180deg, rgba(2,6,23,1), rgba(15,23,42,1));
        }

        .gridlines{
            background-image:
                    linear-gradient(to right, rgba(15,23,42,.08) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(15,23,42,.08) 1px, transparent 1px);
            background-size: 34px 34px;
        }
        .dark .gridlines{
            background-image:
                    linear-gradient(to right, rgba(241,245,249,.07) 1px, transparent 1px),
                    linear-gradient(to bottom, rgba(241,245,249,.07) 1px, transparent 1px);
        }

        .glass{
            background: rgba(255,255,255,.68);
            border: 1px solid rgba(148,163,184,.35);
            box-shadow: 0 18px 44px rgba(2,6,23,.12);
        }
        .dark .glass{
            background: rgba(2,6,23,.38);
            border-color: rgba(148,163,184,.18);
            box-shadow: 0 18px 44px rgba(0,0,0,.35);
        }

        .chip{
            border: 1px solid rgba(148,163,184,.35);
            background: rgba(255,255,255,.70);
        }
        .dark .chip{
            border-color: rgba(148,163,184,.18);
            background: rgba(2,6,23,.28);
        }

    </style>
@endsection

@section('content')
    <main class="w-full slide-font soft-bg relative overflow-hidden">
        <div class="absolute inset-0 gridlines opacity-[0.25] dark:opacity-[0.18]"></div>

        <div class="relative z-10 mx-auto w-full max-w-[1400px] px-4 sm:px-8 py-6 sm:py-9 lg:min-h-[100dvh] lg:flex lg:items-center">
            <section class="w-full">
                <div data-anim="wrap" class="glass rounded-[2.2rem] p-5 sm:p-6 lg:p-8">
                    <div class="grid gap-6 lg:grid-cols-[1.25fr_0.75fr] lg:items-center">
                        <div data-anim="text" class="text-left">
                            <div class="header-spacing  space-y-6 my-8">
                                <h1 class="tracking-tight text-4xl md:text-5xl lg:text-6xl font-black mb-5">
                                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                                        {{$content['title']}}
                                    </span>
                                </h1>
                                <p class="text-base sm:text-lg lg:text-[1.15rem] font-bold leading-[1.45] text-slate-900 dark:text-slate-100">
                                    {{$content['description']}}
                                </p>
                            </div>

                            <div class="mt-6 space-y-3">
                                <div class="rounded-2xl border border-slate-200/70 bg-white/55 px-4 py-3 dark:border-slate-700/30 dark:bg-slate-950/20">
                                    <div class="mt-1 text-sm sm:text-base font-extrabold text-slate-800 dark:text-slate-100">
                                        🙏 Thank you for your time.
                                    </div>
                                </div>

                                <div class="rounded-2xl border border-slate-200/70 bg-white/55 px-4 py-3 dark:border-slate-700/30 dark:bg-slate-950/20">
                                    <div class="mt-1 text-sm sm:text-base font-extrabold text-slate-800 dark:text-slate-100">
                                        📩 I look forward to hearing from you.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <figure data-anim="image"
                                class="relative overflow-hidden rounded-[2rem] border border-slate-200/70 bg-white/70 p-3 shadow-lg dark:border-slate-700/30 dark:bg-slate-950/25">
                            <div class="relative overflow-hidden rounded-[1.6rem]">
                                <img src="{{ $content['image'] }}"
                                     alt="{{ $content['title'] }}"
                                     class="h-[260px] w-full object-cover sm:h-[340px] lg:h-[440px]" />
                                <div class="absolute inset-0 bg-gradient-to-tr from-slate-950/30 via-transparent to-transparent dark:from-slate-950/55"></div>

                                <div class="absolute left-4 top-4 inline-flex items-center gap-2 rounded-full px-4 py-2
                                            text-xs sm:text-sm font-black
                                            bg-white/85 dark:bg-slate-950/45
                                            border border-slate-200/70 dark:border-slate-700/30">
                                    <span class="text-base">🎤</span>
                                    <span class="text-slate-900 dark:text-slate-50">Closing Lines</span>
                                </div>
                            </div>
                        </figure>
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
