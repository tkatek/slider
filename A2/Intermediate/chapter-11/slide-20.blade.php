<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Write a short paragraph (5–6 sentences) about your feelings and facial expressions.";

$customCalloutText = "

<span class='font-black text-yellow-500 dark:text-yellow-300'>Write about:</span><br>
&bull; how you feel in different situations<br>
&bull; what your face does (use action verbs)<br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use these expressions:</span><br>
&bull; I frown when…<br>
&bull; I raise my eyebrows when…<br>
&bull; I drop my jaw when…<br>
&bull; I pout my lips when…<br>
&bull; I scrunch up my nose when…<br>
&bull; I stick my tongue out when…<br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>👉 Use at least 3 expressions</span><br>";

// Use \n for line breaks in the placeholder
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
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
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