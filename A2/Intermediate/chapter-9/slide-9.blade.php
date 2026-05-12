<?php
$content = [
    'title' => 'Remember the following',
    'subtitle'=> '',
    'image' => materialAsset('slider/A2/Intermediate/chapter-9/img/slide9.webp'),

    // Use 'square' for 1:1
    // Use 'wide' for 5:4
    'image_ratio' => 'square',
];
?>

@extends("slider.simple-layout")

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1560px] items-center justify-center px-4 py-4 sm:px-6 sm:py-4 lg:px-10 lg:py-5">
            <section class="flex w-full items-center justify-center">
                <div class="mx-auto flex w-full max-w-[980px] flex-col items-center justify-center gap-3 sm:gap-4 lg:gap-4">
                    @include('slider.components.title-subtitle')

                    <div
                            data-anim="visual"
                            class="relative flex w-full items-center justify-center"
                    >
                        <div
                                class="relative w-full overflow-hidden rounded-[20px] bg-white/85 shadow-[0_14px_36px_rgba(15,23,42,0.16)] ring-1 ring-slate-200/70 dark:bg-slate-900/70 dark:ring-white/10 sm:rounded-[24px]
                            {{ ($content['image_ratio'] ?? 'wide') === 'square'
                                ? 'aspect-square max-w-[min(100%,620px)]'
                                : 'aspect-[5/4] max-w-[min(100%,780px)]'
                            }}"
                        >
                            <img
                                    class="h-full w-full object-cover object-center"
                                    src="{{ $content['image'] }}"
                                    alt="Since and for grammar comparison"
                            >
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection

@section("script")
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.resetSlide = () => {};
        });
    </script>
@endsection