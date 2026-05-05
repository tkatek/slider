@php
    $content = [
        'page_title' => 'Silent Letters Practice',
        'title' => 'Can you find the silent letters in these words ?',
        'words' => [
            'Knife',
            'Wrapper',
            'Wrong',
            'Write',
            'Gnome',
            'Wreck',
            'Crumb',
            'Lamb',
            'Knuckle',
            'Know',
        ],
        'decorations' => [
            [
                'emoji' => '🔪',
                'class' => 'left-4 top-[18%] text-4xl -rotate-12 md:text-5xl lg:text-6xl',
            ],
            [
                'emoji' => '🍬',
                'class' => 'right-5 top-6 text-5xl rotate-12 md:text-6xl lg:text-7xl',
            ],
            [
                'emoji' => '✍️',
                'class' => 'left-5 bottom-5 text-5xl -rotate-6 md:text-6xl lg:text-7xl',
            ],
            [
                'emoji' => '🐄',
                'class' => 'right-5 bottom-7 text-4xl rotate-12 md:text-5xl lg:text-6xl',
            ],
        ],
        'dot_classes' => [
            'bg-gradient-to-br from-indigo-400 to-sky-400',
            'bg-gradient-to-br from-pink-400 to-rose-400',
            'bg-gradient-to-br from-emerald-400 to-green-500',
            'bg-gradient-to-br from-amber-300 to-orange-400',
        ],
    ];

    $pageTitle = trim((string)($content['page_title'] ?? 'Silent Letters Practice'));
    $title = trim((string)($content['title'] ?? ''));
    $words = is_array($content['words'] ?? null) ? $content['words'] : [];
    $decorations = is_array($content['decorations'] ?? null) ? $content['decorations'] : [];
    $dotClasses = is_array($content['dot_classes'] ?? null) ? $content['dot_classes'] : [];
@endphp

@extends('slider.simple-layout')

@section('title', $pageTitle)

@section('content')
    <div class="relative min-h-[100dvh] w-full overflow-hidden font-sans">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-7xl items-center justify-center px-3 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
            <section class="relative w-full overflow-hidden rounded-[1.6rem] border border-white/70 bg-white/84 px-4 py-5 text-center shadow-[0_24px_70px_-34px_rgba(15,23,42,0.30)] backdrop-blur-xl dark:border-white/10 dark:bg-white/5 sm:rounded-[2rem] sm:px-6 sm:py-8 lg:px-8 lg:py-9">
                <div class="pointer-events-none absolute -left-16 -top-16 h-36 w-36 rounded-full opacity-50 blur-3xl [background:var(--ambient-one)]"></div>
                <div class="pointer-events-none absolute -right-16 top-10 h-40 w-40 rounded-full opacity-45 blur-3xl [background:var(--ambient-two)]"></div>
                <div class="pointer-events-none absolute bottom-0 left-1/2 h-44 w-44 -translate-x-1/2 opacity-40 blur-3xl [background:var(--ambient-three)]"></div>

                @foreach($decorations as $decoration)
                    @php
                        $emoji = (string)($decoration['emoji'] ?? '');
                        $class = trim((string)($decoration['class'] ?? ''));
                    @endphp

                    @if($emoji !== '')
                        <div
                                aria-hidden="true"
                                class="pointer-events-none absolute z-20 hidden select-none opacity-70 drop-shadow-sm md:block {{ $class }}"
                        >
                            {{ $emoji }}
                        </div>
                    @endif
                @endforeach

                <div class="relative z-10 mx-auto max-w-6xl">
                    @if($title !== '')
                        <h1 class="mx-auto max-w-5xl [background-image:var(--top-bar-gradient)] bg-clip-text pb-1.5 text-3xl font-black leading-[1.12] tracking-[-0.035em] text-transparent sm:text-5xl sm:tracking-[-0.045em] lg:text-6xl">
                            {{ $title }}
                        </h1>
                    @endif

                    @if(count($words))
                        <div class="mx-auto mt-6 grid max-w-5xl grid-cols-2 gap-2.5 sm:mt-9 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4 lg:gap-5">
                            @foreach($words as $index => $word)
                                @php
                                    $dotClass = $dotClasses[$index % max(count($dotClasses), 1)] ?? 'bg-orange-400';
                                @endphp

                                <div class="group relative -translate-y-0.5 overflow-hidden rounded-[1.15rem] border border-white/80 bg-white/90 px-3 py-3 shadow-[0_20px_52px_-30px_rgba(15,23,42,0.34)] ring-1 ring-white/65 backdrop-blur-md transition duration-300 hover:-translate-y-1.5 hover:scale-[1.015] hover:border-white hover:bg-white hover:shadow-[0_26px_70px_-34px_rgba(15,23,42,0.48)] hover:ring-indigo-200/70 dark:border-white/10 dark:bg-white/10 dark:ring-white/10 dark:hover:border-white/15 dark:hover:bg-white/15 dark:hover:shadow-black/35 dark:hover:ring-white/20 sm:rounded-[1.55rem] sm:px-5 sm:py-5">
                                    <span class="absolute left-3 top-3 h-2.5 w-2.5 rounded-full opacity-85 shadow-sm transition duration-300 group-hover:scale-125 sm:h-3 sm:w-3 {{ $dotClass }}"></span>

                                    <span class="block text-[1.35rem] font-black leading-none tracking-[-0.025em] text-slate-800 transition duration-300 group-hover:text-slate-950 dark:text-slate-50 dark:group-hover:text-white sm:text-3xl lg:text-4xl">
                                        {{ $word }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
@endsection

@section('script')
    <script>
        window.resetSlide = function () {};
    </script>
@endsection
