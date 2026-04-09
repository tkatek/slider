<?php
$content = [
    'page_title' => 'Let’s watch this video!',
    'title'      => 'Let’s watch this video!',
    'subtitle'   => 'Issues at the Hotel',
    'shorts'     => [
        [
            'src' => materialAsset(''),
            'thumbnail' => materialAsset(''),
            'showCC' => false,
            'subtitles' => [
                ['start' => 0,  'end' => 3,  'text' => 'Guest: Hello. I have a problem in my room.'],
                ['start' => 3,  'end' => 6,  'text' => "Staff: I'm sorry to hear that. What seems to be the issue?"],
                ['start' => 6,  'end' => 9,  'text' => "Guest: The air conditioner isn't working properly."],
                ['start' => 9,  'end' => 11, 'text' => 'Staff: I see. Which room are you in?'],
                ['start' => 11, 'end' => 13, 'text' => 'Guest: Room 412.'],
                ['start' => 13, 'end' => 16, 'text' => "Staff: Thank you. We'll send someone to fix it right away."],
                ['start' => 16, 'end' => 19, 'text' => 'Guest: And also, the TV has no signal.'],
                ['start' => 19, 'end' => 23, 'text' => 'Staff: Understood. Maintenance will check both the AC and the TV.'],
                ['start' => 23, 'end' => 26, 'text' => "Guest: One more thing. There's no Wi-Fi in the room."],
                ['start' => 26, 'end' => 30, 'text' => "Staff: Oh, I'm sorry. I'll reset the router for your room."],
                ['start' => 30, 'end' => 34, 'text' => "Guest: Thank you. And the hot water in the shower isn't working either."],
                ['start' => 34, 'end' => 38, 'text' => "Staff: I'll inform the maintenance team to fix the water heater."],
                ['start' => 38, 'end' => 42, 'text' => "Guest: I appreciate that. It's been a bit noisy next door, too."],
                ['start' => 42, 'end' => 46, 'text' => 'Staff: I’m very sorry about that. I can ask housekeeping to speak with the neighbors.'],
                ['start' => 46, 'end' => 48, 'text' => 'Guest: That would be helpful.'],
                ['start' => 48, 'end' => 52, 'text' => 'Staff: Would you like a temporary room while we fix these issues?'],
                ['start' => 52, 'end' => 54, 'text' => 'Guest: If it’s possible. Yes.'],
                ['start' => 54, 'end' => 58, 'text' => 'Staff: We have room 415 available. Shall I prepare it for you?'],
                ['start' => 58, 'end' => 61, 'text' => 'Guest: Yes, please. That would be great.'],
                ['start' => 61, 'end' => 65, 'text' => 'Staff: Done. Housekeeping will help you move your things.'],
                ['start' => 65, 'end' => 68, 'text' => 'Guest: Thank you so much for your quick help.'],
                ['start' => 68, 'end' => 72, 'text' => "Staff: You're welcome. We'll make sure everything works perfectly in your new room."],
            ],
        ],
    ],
];
?>

@include("slider.video.short-video", ['content' => $content])