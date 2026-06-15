@php
    $theme = $theme ?? ['name' => 'green'];

    $content = [
        'title'    => 'Quick wrap-up',
        'subtitle' => 'Look at the 3 pictures, and give them suitable advice under each picture, using “If I were you,....”:',

        'cards' => [
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide17/maria.webp'),
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide17/sadie.webp'),
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide17/dan.webp'),
            ],
        ],
    ];
@endphp

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-4 sm:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[92rem] px-3 py-4 sm:px-5 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 lg:gap-5">
                @foreach($content['cards'] as $index => $card)
                    <article class="rounded-2xl border border-slate-200 bg-white/90 p-3 shadow-sm dark:border-slate-700 dark:bg-slate-900/90">
                        <div class="aspect-[5/4] w-full overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800">
                            <img
                                    src="{{ $card['image'] }}"
                                    alt=""
                                    class="h-full w-full object-cover object-center"
                                    draggable="false"
                            >
                        </div>

                        <textarea
                                name="advice_{{ $index + 1 }}"
                                rows="1"
                                placeholder="If I were you, ................................"
                                class="auto-grow mt-3 block min-h-[3.25rem] w-full resize-none overflow-hidden rounded-xl border border-slate-300 bg-white px-4 py-3 text-base font-bold leading-7 text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-300/40 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-slate-400"
                        ></textarea>
                    </article>
                @endforeach
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fields = document.querySelectorAll('.auto-grow');

            function resizeField(field) {
                field.style.height = 'auto';
                field.style.height = field.scrollHeight + 'px';
            }

            fields.forEach(function (field) {
                resizeField(field);

                field.addEventListener('input', function () {
                    resizeField(field);
                });
            });

            window.resetSlide = function () {
                fields.forEach(function (field) {
                    field.value = '';
                    resizeField(field);
                });
            };
        });
    </script>
@endsection