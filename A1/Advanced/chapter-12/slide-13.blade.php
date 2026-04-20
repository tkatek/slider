<?php
$content = [
    'page_title' => 'Vocabulary Notes',
    'title' => 'Vocabulary Notes',
    'subtitle' => '',
    'cards_grid_class' => 'mt-7 grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1',

    'cards' => [
        [
            'type' => 'sections',
            'title' => '',
            'tone' => 'from-blue-500 via-indigo-500 to-purple-600',
            'sections' => [
                [
                    'heading' => 'Vocabulary notes:',
                    'items' => [
                        '<span class="hl-red">High-res</span> = high resolution, meaning a very clear screen that can fit many things on at the same time.',
                        '<span class="hl-red">Handset</span> = a mobile phone.',
                        '<span class="hl-red">Contract</span> = a deal you sign with a phone company to pay every month.',
                        '<span class="hl-red">Pay-as-you-go</span> = a deal with the phone company where you add money to your phone as you need it.',
                        '<span class="hl-red">Top up</span> = add money to your phone.',
                    ],
                ],
            ],
        ],
    ],
];
?>

@include("slider.other.grammar-info-cards", ['content' => $content])
