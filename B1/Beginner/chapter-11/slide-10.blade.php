@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'The Third Conditional',
        'title'      => 'The Third Conditional',
        'subtitle'   => '',
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col items-center justify-center overflow-x-hidden px-4 py-6">
        <div class="w-full">
            @include('slider.components.title-subtitle')
        </div>

        <section class="mx-auto mt-6 flex w-full max-w-5xl items-center justify-center">
            <div class="w-full overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-5 text-center shadow-xl shadow-slate-900/10 dark:border-slate-700 dark:bg-slate-900 sm:p-7 lg:p-8">

                <div class="mx-auto flex w-full flex-col gap-6 rounded-[1.5rem] border border-slate-200 bg-slate-50 px-6 py-8 dark:border-slate-700 dark:bg-slate-800/60 sm:px-8 lg:px-10">

                    <div>
                        <h3 class="mb-3 text-2xl font-black text-orange-500 dark:text-orange-400 sm:text-3xl">
                            Meaning
                        </h3>

                        <p class="text-3xl font-extrabold leading-snug text-slate-900 dark:text-slate-50 sm:text-4xl">
                            Talking about unreal past situations<br class="hidden sm:block">
                            and their imagined results.
                        </p>
                    </div>

                    <div class="mx-auto h-px w-full max-w-3xl bg-slate-200 dark:bg-slate-700"></div>

                    <div>
                        <h3 class="mb-3 text-2xl font-black text-orange-500 dark:text-orange-400 sm:text-3xl">
                            Form
                        </h3>

                        <p class="text-3xl font-black leading-snug text-slate-900 dark:text-slate-50 sm:text-4xl lg:text-5xl">
                            <span class="text-purple-600 dark:text-purple-300">
                                If + past perfect +<br>
                                would have + past participle
                            </span>
                        </p>
                    </div>

                    <div class="rounded-[1.25rem] bg-white px-5 py-5 shadow-md shadow-slate-900/10 dark:bg-slate-900">
                        <p class="text-2xl font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-3xl lg:text-4xl">
                            “If I <span class="text-purple-600 dark:text-purple-300">had studied</span> harder,<br>
                            I <span class="text-purple-600 dark:text-purple-300">would have passed</span> the exam.”
                        </p>
                    </div>

                </div>

            </div>
        </section>
    </main>
@endsection