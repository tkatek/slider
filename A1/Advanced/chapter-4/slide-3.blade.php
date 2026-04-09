<?php
$content = [

    'title' => 'Practice 1: Warm up',
    'subtitle' => 'Transportation Survey: Click ☑️ the right box for you',
    'cards_grid' => 'grid-cols-1',
    'cards' => [
        [
            'type' => 'table_question',
            'label' => 'A',
            'title' => 'How often do you use these types of transportation?',
            'input_name' => 'transport_frequency',
            'first_column_label' => 'types of transportation',
            'headers' => ['always', 'often', 'sometimes', 'not often', 'never'],
            'rows' => [
                ['key' => 'on_foot', 'label' => 'on foot'],
                ['key' => 'bike', 'label' => 'bike'],
                ['key' => 'car', 'label' => 'car'],
                ['key' => 'motorcycle', 'label' => 'motorcycle'],
                ['key' => 'water_taxi', 'label' => 'water taxi'],
                ['key' => 'taxi', 'label' => 'taxi'],
                ['key' => 'bus', 'label' => 'bus'],
                ['key' => 'skytrain', 'label' => 'SkyTrain'],
                ['key' => 'subway', 'label' => 'subway'],
            ],
        ],
        [
            'type' => 'inline_options',
            'label' => 'B',
            'title' => 'Which type or types of transportation do you own?',
            'prompt' => 'I own a:',
            'input_name' => 'ownership',
            'other_input_id' => 'ownershipOtherInput',
            'other_input_name' => 'ownership_other',
            'options' => [
                ['key' => 'bike', 'label' => 'bike'],
                ['key' => 'car', 'label' => 'car'],
                ['key' => 'motorcycle', 'label' => 'motorcycle'],
                ['key' => 'other', 'label' => 'other'],
            ],
        ],
    ],
];
?>

@include('slider.other.table-checkbox-questions', ['content' => $content])
