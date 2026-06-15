@extends('slider.simple-layout')

@php
    $content = [
        'title'    => 'Language Focus (Past Perfect)',
        'subtitle' => 'Read these examples from the story you listened to, and decide which action happened before the other?',

        'cards' => [
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/1.webp'),
                'sentence' => 'She <span class="text-red-600 dark:text-red-400 font-black">had baked</span> the cookies with extra chocolate chips.',
                'order' => [
                    'First, Emma baked the cookies.',
                    'Then they disappeared.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/2.webp'),
                'sentence' => 'The cookies <span class="text-red-600 dark:text-red-400 font-black">had vanished</span> while she was playing in the yard.',
                'order' => [
                    'First, the cookies vanished.',
                    'Then Emma was playing.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/3.webp'),
                'sentence' => 'Max <span class="text-red-600 dark:text-red-400 font-black">had spent</span> the whole hour building a giant robot.',
                'order' => [
                    'First, Max spent the hour building.',
                    'Then Emma asked him.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/4.webp'),
                'sentence' => 'Barnaby the dog <span class="text-red-600 dark:text-red-400 font-black">had snoozed</span> soundly in his favorite spot.',
                'order' => [
                    'First, the dog snoozed.',
                    'Then he woke up.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/5.webp'),
                'sentence' => 'Someone <span class="text-red-600 dark:text-red-400 font-black">had left</span> a path of crumbs leading out to the garden.',
                'order' => [
                    'First, someone left the crumbs.',
                    'Then Emma followed them.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/6.webp'),
                'sentence' => 'He <span class="text-red-600 dark:text-red-400 font-black">had eaten</span> every single treat on the tray.',
                'order' => [
                    'First, he ate all the cookies.',
                    'Then Emma found him.',
                ],
            ],
            [
                'image' => materialAsset('slider/B1/Beginner/chapter-10/img/slide10/7.webp'),
                'sentence' => 'They <span class="text-red-600 dark:text-red-400 font-black">had decided</span> to bake a double batch.',
                'order' => [
                    'First, they decided.',
                    'Then they started again.',
                ],
            ],
        ],
    ];
@endphp

@section('content')
    <style>
        .past-perfect-list {
            container-type: inline-size;
        }

        .past-perfect-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
        }

        .past-perfect-image-box {
            width: min(18rem, 100%);
        }

        @container (min-width: 680px) {
            .past-perfect-card {
                grid-template-columns: 13rem minmax(0, 1fr);
                align-items: stretch;
            }

            .past-perfect-image-box {
                width: 13rem;
            }

            .past-perfect-order {
                grid-column: 2;
            }
        }

        @container (min-width: 980px) {
            .past-perfect-card {
                grid-template-columns: 13rem minmax(0, 1fr) minmax(0, 0.9fr);
                align-items: center;
            }

            .past-perfect-order {
                grid-column: auto;
            }
        }
    </style>

    <main class="flex min-h-[100dvh] w-full flex-col overflow-x-hidden bg-slate-50 py-2 dark:bg-slate-950">
        @include('slider.components.title-subtitle')

        <section class="mx-auto w-full max-w-[82rem] px-2 py-2 sm:px-3 lg:px-4">
            <div class="past-perfect-list space-y-1.5">
                @foreach($content['cards'] as $card)
                    <article class="past-perfect-card gap-1.5 rounded-2xl border border-orange-200 bg-white p-1.5 shadow-sm shadow-slate-900/5 dark:border-orange-500/30 dark:bg-slate-900/80">

                        <div class="past-perfect-image-box mx-auto aspect-[2/1] overflow-hidden rounded-xl border border-orange-100 bg-orange-50 dark:border-orange-500/30 dark:bg-orange-500/10">
                            <img
                                    src="{{ $card['image'] }}"
                                    class="h-full w-full object-cover"
                            >
                        </div>

                        <div class="flex items-center rounded-xl bg-orange-50 px-3 py-2 dark:bg-orange-500/10">
                            <p class="text-[0.8rem] font-black leading-snug text-slate-900 dark:text-slate-100 sm:text-[0.88rem] xl:text-[0.95rem]">
                                {!! $card['sentence'] !!}
                            </p>
                        </div>

                        <div class="past-perfect-order flex items-center rounded-xl border border-orange-100 bg-white px-3 py-2 dark:border-orange-500/30 dark:bg-slate-950/50">
                            <div class="space-y-0.5">
                                @foreach($card['order'] as $line)
                                    <p class="text-[0.74rem] font-extrabold leading-snug text-slate-800 dark:text-slate-100 sm:text-[0.82rem] xl:text-[0.88rem]">
                                        {{ $line }}
                                    </p>
                                @endforeach
                            </div>
                        </div>

                    </article>
                @endforeach
            </div>
        </section>
    </main>
@endsection