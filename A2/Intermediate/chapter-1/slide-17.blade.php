<?php
$content = [
    'type' => 'reading',
    'page_title'         => 'Reading Comprehension',
    'title'              => 'Reading Comprehension',
    'subtitle'           => 'Read and answer the questions',
    'reading_title'      => 'Ancient Egyptian Cats',
    'reading_align'      => 'left',
    'reading_plain'      => true,
    'reading_compact'    => true,
    'reading_allow_html' => true,

    'passage' => [
        '<div class="space-y-2.5">
            <p class="!text-[0.86rem] font-bold !leading-[1.45] text-slate-700 dark:text-slate-200 sm:!text-[0.9rem] lg:!text-[0.92rem]">The Ancient Egyptians loved cats very much. Most families kept at least one cat as a pet. Cats helped people by catching rats and snakes, so they were allowed inside homes. They soon became very important.</p>
            <p class="!text-[0.86rem] font-bold !leading-[1.45] text-slate-700 dark:text-slate-200 sm:!text-[0.9rem] lg:!text-[0.92rem]">Cats were seen as sacred animals with magical powers. People believed that keeping a cat brought good luck and protected the home. The most famous cat goddess was Bastet. She had the body of a woman and the head of a cat.</p>
            <p class="!text-[0.86rem] font-bold !leading-[1.45] text-slate-700 dark:text-slate-200 sm:!text-[0.9rem] lg:!text-[0.92rem]">Bastet was the goddess of mothers, children, fertility, joy, and pet cats. Because of Bastet, many cats were mummified after they died. Cats also appeared on jewellery and ornaments.</p>
            <p class="!text-[0.86rem] font-bold !leading-[1.45] text-slate-700 dark:text-slate-200 sm:!text-[0.9rem] lg:!text-[0.92rem]">Dreaming about a cat was thought to bring good fortune. Killing a cat &mdash; even by accident &mdash; was a serious crime, often punished by death.</p>
        </div>',
    ],

    'questions' => [
        [
            'prompt'  => 'What job did cats help with in Ancient Egypt?', 
            'correct' => 'Catching rats and snakes',
            'options' => [
                'Herding sheep',
                'Catching rats and snakes',
                'Pulling carts',
                'Guarding gold',
            ],
        ],
        [
            'prompt'  => 'Why were cats considered sacred?',
            'correct' => 'People believed they had magical powers',
            'options' => [
                'They lived long lives',
                'They were rare',
                'People believed they had magical powers',
                'They were the biggest animals in the home',
            ],
        ],
        [
            'prompt'  => 'Bastet was the goddess of:',
            'correct' => 'Mothers, children, joy, and cats',
            'options' => [
                'War and storms',
                'Rivers and fish',
                'Mothers, children, joy, and cats',
                'Kings and queens',
            ],
        ],
        [
            'prompt'  => 'What happened if someone killed a cat?',
            'correct' => 'It was treated as a serious crime',
            'options' => [
                'They had to pay money',
                'They had to adopt a new cat',
                'It was treated as a serious crime',
                'They were sacred',
            ],
        ],
        [
            'prompt'  => 'What did many people do to honour their cats after death?',
            'correct' => 'Mummified them',
            'options' => [
                'Carved statues',
                'Set them afloat on the river',
                'Mummified them',
                'Planted trees for them',
            ],
        ],
    ],
];
?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])
