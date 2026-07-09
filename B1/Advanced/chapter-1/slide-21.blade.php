@php
    $content['questions'] = [
        "I can't find my text book. I had it this afternoon at work but it's not in my bag now.",
        "My friend promised to call me this afternoon but she didn't!",
        "I'm worried about my grandmother. She never goes out but when I called her this afternoon, no one answered.",
        "I think I've been ripped off. I ordered a camera on mail order and sent off a cheque for a thousand dollars. That was six weeks ago and I haven't had any news about it yet.",
        "I think my heart has stopped beating! I tried to feel my pulse this afternoon but I couldn't feel a thing.",
        "When I came home from the pub last night, I put the key in my front door but it wouldn't fit. I tried three times and in the end I had to sleep in the car.",
        "I've just got a telephone bill for \$40,000. I only make local calls.",
        "Oh my god, what am I going to do? As I was coming home last night at about midnight, I saw my boyfriend walking down the street with another woman!",
    ];

    $content['title'] = "Speaking";
@endphp

@include("slider.game.spin-wheel", ['content' => $content])