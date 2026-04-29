<?php
$content = [
    'video'      => materialAsset(''),
    'thumbnail'  => materialAsset(''),
    'isQuiz'     => 0,

    'subtitles'  => [
        ['start' => 0,  'end' => 6,  'text' => 'Anna: John, we are not very healthy now. I think we both need to lose some weight.'],
        ['start' => 6,  'end' => 8,  'text' => 'John: You’re right.'],
        ['start' => 8,  'end' => 12, 'text' => 'Anna: So, should we start exercising more?'],
        ['start' => 12, 'end' => 18, 'text' => 'John: Yes, absolutely. We should also eat healthier food. I want to feel better.'],
        ['start' => 18, 'end' => 22, 'text' => 'Anna: Me too. Have you heard of the Atkins diet? We can try that.'],
        ['start' => 22, 'end' => 35, 'text' => 'John: I think I know it. It is famous. In the Atkins diet, you eat less bread, rice, and pasta. You eat more meat, fish, eggs, and vegetables. Your body burns fat for energy. It helps you lose weight.'],
        ['start' => 35, 'end' => 43, 'text' => 'Anna: That sounds good. But maybe we can try a vegan diet? A vegan diet has no meat and no animal products. I heard it is good for the heart. It is also better for animals.'],
        ['start' => 43, 'end' => 57, 'text' => 'John: That is true. But vegan food is not always balanced. What about the paleo diet? In the paleo diet, you eat only natural food. You eat meat, fish, fruits, and vegetables. You do not eat processed food like chips or sweets. People say it helps you lose weight and feel healthy.'],
        ['start' => 57, 'end' => 69, 'text' => 'Anna: I don’t know. It sounds like a fashion diet. There is another diet I like. It is called the 5:2 diet. You eat normal food for 5 days. For 2 days, you eat very little — only 500 or 600 calories. This helps you lose weight and keeps your muscles strong.'],
        ['start' => 69, 'end' => 72, 'text' => 'John: That sounds good. Let’s try it!'],
        ['start' => 72, 'end' => 80, 'text' => 'Anna: Okay, let’s try it. But first, we should talk to our doctor. It is important to ask a doctor before you change your diet a lot.'],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])