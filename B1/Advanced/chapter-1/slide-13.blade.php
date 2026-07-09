<?php
$content = [
    'video'     => materialAsset(''),
    'thumbnail' => materialAsset(''),
    'isQuiz'    => 1,

    'subtitles' => [
        [
            'start' => 2,
            'end'   => 5,
            'text'  => 'A: What do you think happened?',
        ],
        [
            'start' => 5,
            'end'   => 9,
            'text'  => 'B: He might have left it there to collect later.',
        ],
        [
            'start' => 9,
            'end'   => 12,
            'text'  => 'A: He can’t have intended to leave it.',
        ],
        [
            'start' => 12,
            'end'   => 16,
            'text'  => 'B: He could have been kidnapped by somebody.',
        ],
        [
            'start' => 16,
            'end'   => 27,
            'text'  => 'A: Well, the businessman could have kept the money in his suitcase to pay a client. Perhaps he left the hotel in a great rush and forgot to take it with him.',
        ],
        [
            'start' => 27,
            'end'   => 41,
            'text'  => 'B: He could have left the money there for someone on purpose, or he could have been called away because of an emergency and completely forgotten about the money.',
        ],
        [
            'start' => 41,
            'end'   => 47,
            'text'  => 'A: Do you think he could have forgotten the money by accident?',
        ],
        [
            'start' => 47,
            'end'   => 53,
            'text'  => 'B: No, I don’t think anybody could forget one hundred thousand dollars.',
        ],
        [
            'start' => 53,
            'end'   => 64,
            'text'  => 'A: Possibly, but I don’t think it’s very likely. I think it could only happen if there was some kind of emergency.',
        ],
        [
            'start' => 64,
            'end'   => 70,
            'text'  => 'B: Yes, but otherwise, no. It’s a lot of money.',
        ],
    ],
];
?>

@include("slider.video.interactive", ['content' => $content])