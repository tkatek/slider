@php
    $theme = $theme ?? ['name' => 'green'];

    $content = [
        'title'    => 'Reading comprehension:',
        'subtitle' => 'If I were the Mayor, I would.......<br>Look at the picture, read the sentences, then make sentences using “If I were the Mayor...”',

        'image' => materialAsset('slider/B1/Beginner/chapter-9/img/slide16.webp'),

        'inputs_count' => 6,
    ];
@endphp

@extends('slider.simple-layout')

@section('content')
    <main class="flex min-h-[100dvh] w-full flex-col justify-center overflow-x-hidden py-4 sm:py-5">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-6xl px-4 py-4 sm:px-6 lg:px-8">
            <div class="mx-auto w-full max-w-4xl overflow-hidden rounded-2xl border border-slate-200 bg-white p-2 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                <div class="aspect-[2/1] w-full overflow-hidden rounded-xl bg-slate-100 dark:bg-slate-800">
                    <img
                            src="{{ $content['image'] }}"
                            alt=""
                            class="h-full w-full object-contain object-center"
                            draggable="false"
                    >
                </div>
            </div>

            <div class="mx-auto mt-4 grid max-w-4xl grid-cols-1 gap-3 lg:grid-cols-2">
                @for($index = 1; $index <= $content['inputs_count']; $index++)
                    <textarea
                            name="answer_{{ $index }}"
                            rows="1"
                            placeholder="........................................"
                            class="auto-grow block min-h-[3.25rem] w-full resize-none overflow-hidden rounded-xl border border-slate-300 bg-white px-4 py-3 text-base font-bold leading-7 text-slate-950 outline-none transition placeholder:text-slate-400 focus:border-slate-500 focus:ring-4 focus:ring-slate-300/40 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-50 dark:placeholder:text-slate-500 dark:focus:border-slate-400"
                    ></textarea>
                @endfor
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