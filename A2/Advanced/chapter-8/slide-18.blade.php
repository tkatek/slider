<?php

$customTitle = "Writing:";

$customSubtitle = "Write 4–5 sentences about some of the difficulties you face while learning English, and some practical solutions.";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
&bull; {I have a problem + verb + ing}<br>
&bull; imperatives<br>
&bull; motivational expressions<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Examples:</span><br>
&bull; I have a problem speaking English.<br>
&bull; Speak more with your colleagues or friends.<br>
&bull; Don’t give up.
";

$customPlaceholder = ".....";

if (auth()->check()){
    $user = auth()->user();
} else {
    $user = \App\Models\User::create([
        "id" => Str::uuid()->toString(),
        "name" => \Faker\Factory::create()->firstName(),
        "last_name" => \Faker\Factory::create()->lastName(),
        "email" => \Faker\Factory::create()->email(),
        "role_id" => 4
    ]);
    auth()->login($user, true);
}

$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=f97316&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id",
];

$finalTitle = $customTitle ?? $slideItems->where('title', 'title')->first()->content ?? 'Writing Time';
$finalSubtitle = $customSubtitle ?? $slideItems->where('title', 'subtitle')->first()->content ?? 'Share your thoughts';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'callout_text' => $customCalloutText,
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>

@include("slider.chat.live", compact("content"))