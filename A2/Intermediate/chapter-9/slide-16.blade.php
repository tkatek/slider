<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Write 5–7 sentences about your arrangements for next week.<br>Use:<br>♦ Present continuous (am / is / are + verb-ing)<br>♦ At least 4 different activities<br>♦ Time expressions (e.g., tomorrow, at 5 p.m., this weekend)<br>Guiding Questions:<br>♦ What are you doing on Saturday morning?<br>♦ Who are you meeting this weekend?<br>♦ Where are you going?<br>♦ What are you doing in the evening?<br>♦ What are you doing on Sunday?";

// Use \n for line breaks in the placeholder
$customPlaceholder = "This weekend, I’m…\nOn Saturday, I’m…\nIn the afternoon, I’m…\nIn the evening, I’m…\nOn Sunday, I’m…";

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
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>

@include("slider.chat.live", compact("content"))