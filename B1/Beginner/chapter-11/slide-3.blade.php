@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'What is a regret?',
        'title'      => 'What is a regret?',
        'subtitle'   => '',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 flex w-full max-w-4xl items-center justify-center">
            <div class="w-full overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-5 text-center shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-7 lg:p-8">

                <div class="mx-auto flex min-h-[18rem] w-full items-center justify-center rounded-[1.5rem] border border-slate-200 bg-slate-50 px-6 py-10 dark:border-slate-700 dark:bg-slate-800/60">
                    <p class="text-center text-4xl font-black leading-[1.15] tracking-tight text-slate-900 dark:text-slate-50 sm:text-5xl lg:text-6xl">
                        Regret is the<br>
                        feeling of wishing<br>
                        you had done<br>
                        something<br>
                        differently.
                    </p>
                </div>

            </div>
        </section>
    </main>
@endsection