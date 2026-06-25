<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset('slider/B1/Intermediate/chapter-2/img/slide6.webp'),
    'isQuiz'   => 0,

    'questions' => [],

    'subtitles' => [
        ['start' => 0,    'end' => 3,    'text' => "Dad: Anthony didn't come home last night. Where is he?"],
        ['start' => 3.5,  'end' => 7,    'text' => "Tom: I don't know. He must have gone out with friends."],
        ['start' => 7.5,  'end' => 11.5, 'text' => "Dad: Maybe, but he usually comes home. He can't have forgotten to call us."],
        ['start' => 12,   'end' => 14.5, 'text' => "Tom: You're right. He always calls."],
        ['start' => 15,   'end' => 18.5, 'text' => 'Dad: What about Ricardo? Anthony might have gone to see him.'],
        ['start' => 19,   'end' => 22,   'text' => "Tom: I called Ricardo. He hasn't seen Anthony."],
        ['start' => 22.5, 'end' => 25,   'text' => 'Dad: Then where could he have gone?'],
        ['start' => 25.5, 'end' => 30,   'text' => 'Tom: Well, he met a French girl recently. He might have traveled to visit her.'],
        ['start' => 30.5, 'end' => 32.5, 'text' => "Dad: That's possible."],
        ['start' => 33,   'end' => 35,   'text' => '(The front door opens.)'],
        ['start' => 35.5, 'end' => 37,   'text' => 'Anthony: Hi everyone!'],
        ['start' => 37.5, 'end' => 40,   'text' => 'Dad: Anthony! Where have you been?'],
        ['start' => 40.5, 'end' => 44,   'text' => 'Anthony: I went to visit Grandma with Mom. We decided at the last minute.'],
        ['start' => 44.5, 'end' => 47,   'text' => 'Tom: We were really worried!'],
        ['start' => 47.5, 'end' => 50,   'text' => 'Anthony: Sorry! I should have called you.'],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])