<?php
$content = [
    'video'      => materialAsset('slider/A1/Advanced/chapter-2/video/room-problem-encrypted/room-problem.m3u8'),
    'thumbnail'  => materialAsset('slider/A1/Advanced/chapter-2/img/issues-hotel.webp'),
    'isQuiz'     => 0,

    'subtitles' => [
        ['start' => 0,  'end' => 3,  'text' => 'Guest: Hello. I have a problem in my room.'],
        ['start' => 3,  'end' => 6,  'text' => "Staff: I'm sorry to hear that. What seems to be the issue?"],
        ['start' => 6,  'end' => 9,  'text' => "Guest: The air conditioner isn't working properly."],
        ['start' => 9,  'end' => 11, 'text' => 'Staff: I see. Which room are you in?'],
        ['start' => 11, 'end' => 13, 'text' => 'Guest: Room 412.'],
        ['start' => 13, 'end' => 16, 'text' => "Staff: Thank you. We'll send someone to fix it right away."],
        ['start' => 16, 'end' => 19, 'text' => 'Guest: And also, the TV has no signal.'],
        ['start' => 19, 'end' => 23, 'text' => 'Staff: Understood. Maintenance will check both the AC and the TV.'],
        ['start' => 22.3, 'end' => 24, 'text' => "Guest: One more thing. There's no Wi-Fi in the room."],
        ['start' => 24, 'end' => 26.5, 'text' => "Staff: Oh, I'm sorry. I'll reset the router for your room."],
        ['start' => 26.8, 'end' => 29.5, 'text' => "Guest: And the hot water in the shower isn't working either."],
        ['start' => 29.5, 'end' => 32, 'text' => "Staff: I'll inform the maintenance team to fix the water heater."],
        ['start' => 32.5, 'end' => 36, 'text' => "Guest: I appreciate that. It's been a bit noisy next door, too."],
        ['start' => 36, 'end' => 39, 'text' => 'Staff: I can ask housekeeping to speak with the neighbors.'],
        ['start' => 39, 'end' => 40.5, 'text' => 'Guest: That would be helpful.'],
        ['start' => 40.5, 'end' => 43.7, 'text' => 'Staff: Would you like a temporary room while we fix these issues?'],
        ['start' => 43.7, 'end' => 45, 'text' => 'Guest: If it’s possible. Yes.'],
        ['start' => 45.3, 'end' => 48, 'text' => 'Staff: We have room 415 available. Shall I prepare it for you?'],
        ['start' => 48, 'end' => 50, 'text' => 'Guest: Yes, please. That would be great.'],
        ['start' => 50.5, 'end' => 52.5, 'text' => 'Staff: Done. Housekeeping will help you move your things.'],
        ['start' => 53.2, 'end' => 55, 'text' => 'Guest: Thank you so much for your quick help.'],
        ['start' => 55.5, 'end' => 59, 'text' => "Staff: You're welcome. We'll make sure everything works perfectly in your new room."],
    ],
];
?>
@include("slider.video.interactive", ['content' => $content])