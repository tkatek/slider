<?php
$content = [
    'page_title' => 'Notice the difference!',
    'title'      => 'Notice the difference!',
    'subtitle'   => '',

    'cards' => [
        [
            'id'      => 'us',
            'icon'    => '📞',
            'number'  => '911',
            'region'  => "United States\nCanada",
            'accent'  => 'rose',   // rose | blue | emerald
        ],
        [
            'id'      => 'uk',
            'icon'    => '📞',
            'number'  => '999',
            'region'  => "United Kingdom",
            'accent'  => 'blue',
        ],
        [
            'id'      => 'eu',
            'icon'    => '📞',
            'number'  => '112',
            'region'  => "Europe",
            'accent'  => 'emerald',
        ],
    ],

    'footer_note' => 'Emergency calls are FREE and work without signal',
];
?>

@extends("slider.simple-layout")

@section("title", $content['page_title'] ?? 'Slide')

@section("style")
    <style>
        .card-min-h{ min-height: 320px; }
    </style>
@endsection

@section("content")
    <main class="min-h-[100dvh] w-full flex items-center justify-center px-4 sm:px-8 py-8 sm:py-10">
        <div class="w-full max-w-6xl">
            {{-- ✅ Title color like your provided code (gradient text) --}}
            <header id="titleBlock" class="text-center mb-6 sm:mb-10">
                <h1 class="font-black leading-[1.02] tracking-[-0.05em] text-3xl sm:text-5xl lg:text-6xl">
                    <span class="bg-gradient-to-br from-indigo-600 to-blue-500 bg-clip-text text-transparent">
                        {{ $content['title'] }}
                    </span>
                </h1>

                @if(!empty($content['subtitle']))
                    <p class="mt-2 font-extrabold tracking-[-0.02em] text-sm sm:text-base text-slate-700 dark:text-slate-200">
                        {{ $content['subtitle'] }}
                    </p>
                @endif
            </header>

            <section id="cardsWrap" class="pb-2">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-7 items-stretch">
                    @foreach ($content['cards'] as $card)
                        @php
                            $accent = $card['accent'] ?? 'blue';

                            $iconWrap = match($accent){
                                'rose'    => 'bg-rose-500/15 ring-rose-500/25',
                                'emerald' => 'bg-emerald-500/15 ring-emerald-500/25',
                                default   => 'bg-blue-500/15 ring-blue-500/25',
                            };

                            $numberColor = match($accent){
                                'rose'    => 'text-rose-500',
                                'emerald' => 'text-emerald-500',
                                default   => 'text-blue-500',
                            };

                            $cardRing = match($accent){
                                'rose'    => 'hover:ring-rose-500/20',
                                'emerald' => 'hover:ring-emerald-500/20',
                                default   => 'hover:ring-blue-500/20',
                            };
                        @endphp

                        <article
                                class="card-min-h relative rounded-[28px] border border-slate-200/70 bg-white/85 backdrop-blur-xl shadow-xl
                                   dark:border-slate-700/30 dark:bg-slate-950/35 p-6 sm:p-7
                                   transition-transform duration-200 hover:-translate-y-0.5
                                   ring-2 ring-transparent {{ $cardRing }}"
                        >
                            <div class="h-full flex flex-col items-center justify-center text-center">
                                <div class="mb-8">
                                    <span class="inline-flex items-center justify-center h-16 w-16 rounded-3xl ring-1 {{ $iconWrap }}">
                                        <span class="text-3xl">{{ $card['icon'] }}</span>
                                    </span>
                                </div>

                                <div class="text-5xl sm:text-4xl font-black tracking-[-0.05em] {{ $numberColor }}">
                                    {{ $card['number'] }}
                                </div>

                                <div class="mt-4 text-2xl sm:text-2xl font-black tracking-[-0.03em] text-slate-900 dark:text-slate-50 whitespace-pre-line">
                                    {{ $card['region'] }}
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div id="footerNote"
                     class="mt-8 sm:mt-10 rounded-[22px] bg-slate-900/15 dark:bg-white/10
                            border border-slate-900/10 dark:border-white/10 px-4 sm:px-6 py-5 sm:py-6">
                    <div class="text-center text-2xl sm:text-3xl font-black tracking-[-0.03em] text-slate-950 dark:text-slate-50">
                        {{ $content['footer_note'] }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection
