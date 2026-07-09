@extends('slider.simple-layout')

@php
    $content = [
        'title'      => 'Speaking',
        'subtitle'   => '',
    ];

    $items = [
        "is sure they'll travel this year.",
        'thinks AI might replace some jobs.',
        'believes Morocco will win the world cup.',
        "isn't sure what they'll study at university.",
    ];
@endphp

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-4">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-5xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] border border-slate-200 bg-white p-5 shadow-xl shadow-slate-900/5 dark:border-slate-700 dark:bg-slate-900 sm:p-7 lg:p-8">
                <h2 class="mb-5 text-2xl font-black text-slate-950 dark:text-white sm:text-3xl">
                    Find someone who...
                </h2>

                <div class="grid gap-4">
                    @foreach($items as $item)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-lg font-extrabold text-slate-900 dark:border-slate-700 dark:bg-slate-950/40 dark:text-slate-100">
                            . . . . . . . {{ $item }}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection