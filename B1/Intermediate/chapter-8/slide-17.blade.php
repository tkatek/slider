@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Reading Comprehension',
        'title'      => 'Reading Comprehension',
        'subtitle'   => 'DANI’S BLOG: A FARAWAY FRIEND',

        'passage' => [
            'My best friend moved to Tokyo with his family last month. At first, I felt very upset because we used to <span class="font-black text-emerald-500 dark:text-emerald-300">hang out</span> all the time, but thanks to technology, we have <span class="font-black text-emerald-500 dark:text-emerald-300">worked out</span> ways to stay in touch.',
            'For example, last week a new feature <span class="font-black text-emerald-500 dark:text-emerald-300">came out</span> on our favourite streaming platform, and we were able to watch a film together using a special app.',
            'Living in Tokyo has also encouraged my friend to <span class="font-black text-emerald-500 dark:text-emerald-300">check out</span> different places around the city.',
            'Last weekend, he <span class="font-black text-emerald-500 dark:text-emerald-300">ate out</span> at a unique restaurant where robots served the food!',
            'Although he is far away now, he has <span class="font-black text-emerald-500 dark:text-emerald-300">turned out</span> really well and adapted quickly to his new life.',
            'He has made new friends and enjoys many exciting experiences, but I still feel a bit <span class="font-black text-emerald-500 dark:text-emerald-300">left out</span> because I miss spending time with him.',
        ],
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full items-center justify-center overflow-x-hidden px-4 py-6 text-slate-950 dark:text-slate-50 sm:px-6 lg:px-8">
        <section class="mx-auto w-full max-w-6xl">
            @include('slider.components.title-subtitle')

            <div class="mx-auto mt-6 w-full max-w-5xl rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-xl shadow-slate-200/70 dark:border-slate-700 dark:bg-slate-900 dark:shadow-slate-950/20 sm:p-7 lg:p-8">


                <div class="space-y-3 text-left text-base font-black leading-relaxed text-slate-900 dark:text-slate-100 sm:text-lg lg:text-xl">
                    @foreach($content['passage'] as $paragraph)
                        <p>{!! $paragraph !!}</p>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection