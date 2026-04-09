<?php
$content = [
    'title' => 'Discussion',
    'subtitle' => '',
    'cards_grid' => 'grid-cols-1',
    'cards' => [
        [
            'type' => 'split_option_groups',
            'label' => 'A',
            'title' => 'Check your own answers to the questions below',
            'groups' => [
                [
                    'title' => 'How often do you use taxis?',
                    'input_name' => 'question_a_left',
                    'other_input_id' => 'leftOtherInput',
                    'other_input_name' => 'question_a_left_other',
                    'options' => [
                        ['label' => 'every day'],
                        ['label' => 'about once or twice a week'],
                        ['label' => 'not very often'],
                        ['key' => 'other', 'label' => 'other'],
                    ],
                ],
                [
                    'title' => 'When do you usually use taxis?',
                    'input_name' => 'question_a_right',
                    'other_input_id' => 'rightOtherInput',
                    'other_input_name' => 'question_a_right_other',
                    'options' => [
                        ['label' => 'when I am in a hurry'],
                        ['label' => "when there isn't any other way to get somewhere"],
                        ['label' => 'when it is raining'],
                        ['key' => 'other', 'label' => 'other'],
                    ],
                ],
            ],
        ],
        [
            'type' => 'checkbox_grid',
            'label' => 'B',
            'title' => 'How is the taxi service in your city?',
            'input_name' => 'question_b',
            'grid_class' => 'grid-cols-2 sm:grid-cols-4',
            'options' => [
                ['label' => 'excellent'],
                ['label' => 'very good'],
                ['label' => 'okay'],
                ['label' => 'poor'],
            ],
        ],
    ],
];
?>

@include('slider.other.table-checkbox-questions', ['content' => $content])
