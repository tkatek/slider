<?php

$content = [
    'type' => 'reading',

    'page_title' => 'Reading Comprehension',
    'title'      => 'Reading Comprehension',
    'subtitle'   => 'Read & answer the questions',

    'reading_title' => 'The Mystery of the Stolen Cakes',

    'passage' =>
        '“Something is very wrong,” says the detective. ' .
        '“I know!” says Ms. Gervis. “It is wrong that someone has stolen from me!” ' .
        'The detective looks around Ms. Gervis’ apartment. ' .
        '“That is not what I am talking about, ma’am. What is wrong is that I do not understand how the robber got in and out.” ' .
        'Ms. Gervis and the detective stand in silence. Ms. Gervis’ eyes are full of tears. Her hands are shaking. ' .
        '“The robber did not come through the window,” says the detective. “These windows have not been opened or shut in months.” ' .
        'The detective looks at the fireplace. “The robber did not squeeze down here.” ' .
        'The detective walks to the front door. He examines the latch. ' .
        '“And since there are no marks or scratches, the robber definitely did not try to break the lock.” ' .
        '“I have no idea how he did it,” says a bothered Ms. Gervis. “It is a big mystery.” ' .
        '“And you say the robber stole nothing else?” asks the detective. “No money, no jewelry, no crystal?” ' .
        '“That’s right, detective. He took only what was important to me,” Ms. Gervis says with a sigh. ' .
        '“There is only one thing I can do now.” ' .
        '“And what is that?” the detective asks with surprise. ' .
        '“I will stop baking cakes,” Ms. Gervis says. “They are mine to give away. They are not for someone to steal.” ' .
        '“You can’t do that!” says the detective with alarm. “Who will bake those delicious cakes?” ' .
        '“I am sorry. I do not know,” says Ms. Gervis. ' .
        '“I must solve this case immediately!” says the detective.',
    'question_prompt_label' => 'Choose the correct answer;',

    'questions' => [
        [
            'prompt'  => 'Where does this story take place?',
            'correct' => "D. in Ms. Gervis' apartment",
            'options' => [
                'A. in a bakery',
                'B. at the police station',
                "C. in Ms. Gervis' house",
                "D. in Ms. Gervis' apartment",
            ],
        ],
        [
            'prompt'  => 'Near the beginning of the story, “Ms. Gervis’ eyes are full of tears. Her hands are shaking.” How does Ms. Gervis probably feel?',
            'correct' => 'A. She is upset.',
            'options' => [
                'A. She is upset.',
                'B. She is tired.',
                'C. She is hungry.',
                'D. She is confused.',
            ],
        ],
        [
            'prompt'  => 'What makes the detective sure that the robber did not come through the windows?',
            'correct' => 'C. The windows have not been used in months.',
            'options' => [
                'A. The windows are locked.',
                'B. The windows face the police station.',
                'C. The windows have not been used in months.',
                'D. The windows are too small for a person to fit through.',
            ],
        ],
        [
            'prompt'  => '"And the robber definitely did not use the front door." Which is the best way to rewrite this sentence?',
            'correct' => 'D. "And the robber certainly did not use the front door."',
            'options' => [
                'A. "And the robber may not have used the front door."',
                'B. "And the robber probably did not use the front door."',
                'C. "And the robber was not able to use the front door."',
                'D. "And the robber certainly did not use the front door."',
            ],
        ],
        [
            'prompt'  => 'What else could the detective have asked Ms. Gervis in order to solve the mystery? I. Which types of cakes does Ms. Gervis know how to bake? II. Does someone else have a key to the apartment? III. Does Ms. Gervis ever leave the door unlocked?',
            'correct' => 'C. II and III',
            'options' => [
                'A. I only',
                'B. I and II',
                'C. II and III',
                'D. I, II, and III',
            ],
        ],
    ],
];

?>

@include('slider.game.multi-choice-all-in-one', ['content' => $content])