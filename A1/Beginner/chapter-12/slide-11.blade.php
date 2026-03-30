@php
    $content = [
        'page_title'    => 'Fill-in with the right word',
        'title'         => 'Fill-in with the right word',
        'subtitle'      => 'Read first, then drag & drop',
        'mobile_bank_gap' => 20,
        'dialogue_card_class' => 'mx-auto w-full max-w-4xl',
        'sentence_container_class' => 'mx-auto w-full max-w-4xl',
        'sentence_line_class' => '!leading-[2.4]',

        'sentences' => [
            "The customer went to the bank to open a {{1}}, the worker asked for his {{2}} to check who he was, he filled out a {{3}} and gave a {{4}}, then the worker asked how much he wanted to {{5}}, he gave \$500 in {{6}}, the worker put everything into the {{7}}, he said the account would be {{8}} soon, and he also said the customer would get an {{9}} soon.",
        ],

        'answers' => [
            'new account',
            'ID card',
            'form',
            'signature', 
            'deposit',
            'cash',
            'computer system',
            'active',
            'email',
        ],
    ];
@endphp

@include('slider.game.drag-and-drop-blanks', ['content' => $content])
