@extends('slider.simple-layout')

@php
    $content = [
        'page_title' => 'Reading Comprehension',
        'title'      => 'Reading Comprehension',
        'subtitle'   => '',

        'passage' => [
            'The potato chip was invented in 1853 in Saratoga Springs, New York. A chef named George Crum made very thin fried potatoes after a customer complained that the slices were too thick. The snack quickly became popular.',
            'Later, Herman W. Lay started selling potato chips in the 1930s and built a successful company. At the same time, Elmer Doolin in Texas made corn chips using a traditional Mexican recipe. His product, Fritos, also became popular.',
            'In 1961, the two companies joined together to form Frito-Lay. Later, Frito-Lay became part of PepsiCo, a large food and drink company.',
            'Today, brands like Lay’s, Doritos, and Cheetos are sold around the world. People like chips because they are easy to eat and <span class="font-black text-amber-500 dark:text-amber-300">come in many different flavours</span>.',
            'However, snack chips are not very healthy because they contain a lot of fat. They should not replace healthier food.',
            'Even so, <span class="font-black text-amber-500 dark:text-amber-300">the snack chip industry</span> continues to grow, and people keep trying new flavours.',
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