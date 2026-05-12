{{-- resources/views/slider/slide-hand-luggage.blade.php --}}
<?php
$content = [
    'page_title' => 'Reading Comprehension',

    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Tips to overcome English learning difficulties',
    'passage_title' => '',
    'passage' => [
        '1. Practice new vocabulary every day.',
        '2. Write new words in a notebook.',
        '3. Listen to different English accents online.',
        '4. Watch English videos with subtitles.',
        '5. Read short texts to improve vocabulary.',
        '6. Speak English with friends or classmates.',
        '7. Use simple sentences first.',
        '8. Learn one synonym for every new word.',
        '9. Repeat difficult words aloud.',
        '10. Don’t be afraid to make mistakes.',
        '11. Ask people to speak slowly.',
        '12. Practice writing sentences every day.',
        '13. Use English in real-life situations.',
        '14. Listen carefully to native speakers.',
        '15. Keep practicing and never give up.',
    ],

    'images' => [
        [
            'class' => 'w-full max-w-4xl',
            'html' => '<div class="rounded-2xl border border-slate-200 bg-white p-5 text-left text-base font-bold leading-relaxed text-slate-900 shadow-sm dark:border-slate-700 dark:bg-slate-900 dark:text-white sm:text-lg">
                <p class="mb-5 text-base font-black leading-relaxed text-slate-900 dark:text-white sm:text-lg">
                    Read these pieces of advice to face any difficulty while learning English:
                </p>

            </div>',
            'alt' => 'Tips to overcome English learning difficulties',
        ],
    ],
];
?>

@include("slider.other.reading-comprehension", ['content' => $content])