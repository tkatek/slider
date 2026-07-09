<?php
$content = [
    'page_title'     => 'Practice 6',
    'title'          => 'Practice 6',
    'subtitle'       => '',
    'activity_title' => 'Match each expression to its correct meaning',
    'left_label'     => 'Expressions',
    'right_label'    => 'Meanings',

    'pairs' => [
        [
            'id' => 'have_someones_back',
            'left' => [
                'type' => 'word',
                'text' => '1. Have someone’s back',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'C. Be supportive and loyal to someone',
            ],
        ],
        [
            'id' => 'encourage_hope_love_tolerance',
            'left' => [
                'type' => 'word',
                'text' => '2. Encourage hope / love / tolerance',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'I. Promote positive values and attitudes',
            ],
        ],
        [
            'id' => 'see_with_eyes_of_another',
            'left' => [
                'type' => 'word',
                'text' => '3. See with the eyes of another',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'E. Look at something from another person’s perspective',
            ],
        ],
        [
            'id' => 'step_out_comfort_zone',
            'left' => [
                'type' => 'word',
                'text' => '4. Step out of your comfort zone',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'D. Leave your safe and familiar situation',
            ],
        ],
        [
            'id' => 'think_about_going_through',
            'left' => [
                'type' => 'word',
                'text' => '5. Think about what someone is going through',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'B. Imagine what someone is experiencing',
            ],
        ],
        [
            'id' => 'be_there_for_someone',
            'left' => [
                'type' => 'word',
                'text' => '6. Be there for someone',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'F. Support and stay with someone in difficult times',
            ],
        ],
        [
            'id' => 'put_yourself_in_someone_situation',
            'left' => [
                'type' => 'word',
                'text' => '7. Put yourself in someone else’s situation',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'J. Consider and understand someone’s experience',
            ],
        ],
        [
            'id' => 'spark_chain_reaction',
            'left' => [
                'type' => 'word',
                'text' => '8. Spark a chain reaction',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'A. Cause a series of connected events',
            ],
        ],
        [
            'id' => 'respect_peoples_feelings',
            'left' => [
                'type' => 'word',
                'text' => '9. Respect people’s feelings',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'G. Treat others with kindness and consideration',
            ],
        ],
        [
            'id' => 'make_someone_feel_worthless',
            'left' => [
                'type' => 'word',
                'text' => '10. Make someone feel worthless',
            ],
            'right' => [
                'type' => 'word',
                'text' => 'H. Make someone feel like they have no value',
            ],
        ],
    ],

    'right_order' => [
        'spark_chain_reaction',
        'think_about_going_through',
        'have_someones_back',
        'step_out_comfort_zone',
        'see_with_eyes_of_another',
        'be_there_for_someone',
        'respect_peoples_feelings',
        'make_someone_feel_worthless',
        'encourage_hope_love_tolerance',
        'put_yourself_in_someone_situation',
    ],
];
?>

@include('slider.game.matching-pairs', ['content' => $content])