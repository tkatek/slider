<?php
$content = [
    'title' => 'Notice the following',
    'subtitle'=> 'Work is what you do. A job is where you do it',
    'image' => materialAsset('slider/A2/Advanced/chapter-2/img/slide12.webp'),
];
?>

@extends("slider.simple-layout")

@section("style")
    <style>
        .notice-image-only {
            border-radius: 20px !important;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.18);
            width: auto;
            height: auto;
            max-width: min(100%, 980px);
            max-height: clamp(360px, 68vh, 680px);
        }

        @media (max-width: 1024px) {
            .notice-image-only {
                max-width: min(100%, 820px);
                max-height: 62vh;
            }
        }

        @media (max-width: 640px) {
            .notice-image-only {
                border-radius: 16px !important;
                max-width: 100%;
                max-height: 58vh;
                box-shadow: 0 14px 32px rgba(15, 23, 42, 0.16);
            }
        }

        @media (max-width: 420px) {
            .notice-image-only {
                max-height: 54vh;
            }
        }
    </style>
@endsection

@section("content")
    <div class="slide-font min-h-[100dvh] overflow-x-hidden">
        <main class="mx-auto flex min-h-[100dvh] w-full max-w-[1560px] items-center px-4 py-5 sm:px-6 sm:py-6 lg:px-10">
            <section class="w-full">
                <div class="grid min-h-[calc(100dvh-2.5rem)] grid-rows-[auto_1fr] gap-4 sm:gap-5 lg:min-h-[calc(100dvh-3rem)] lg:gap-6">
                    @include('slider.components.title-subtitle')

                    <div
                            data-anim="visual"
                            class="relative flex min-h-[52vh] w-full items-center justify-center sm:min-h-[58vh] lg:min-h-0"
                    >
                        <img
                                class="notice-image-only block object-contain object-center"
                                src="{{ $content['image'] }}"
                                alt="Interview illustration"
                        >
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