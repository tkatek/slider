<?php
$content = [
    'page_title' => 'New Language',
    'title' => 'New Language',
    'subtitle' => '',
    'title_class' => 'text-3xl md:text-4xl lg:text-5xl',
    'cards_grid_class' => 'mt-6 grid grid-cols-1 gap-4',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'title_plain' => true,
            'tone' => 'from-sky-500 to-blue-600',
            'sections' => [
                [
                    'heading' => '',
                    'items' => [
                        '<span class="block space-y-4 text-2xl font-black leading-tight sm:text-3xl lg:text-4xl">
                            <span class="block">&bull; &ldquo;People greet each other <span class="text-violet-600">by</span>+ <span class="text-red-500">verb-ing</span>&rdquo;</span>
                            <span class="block">&bull; &ldquo;In <span class="text-red-500">(country name)</span>___, people usually <span class="text-red-500">(verb)</span>...&rdquo;</span>
                            <span class="block">&bull; &ldquo;This is a sign of respect.&rdquo;</span>
                        </span>',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
