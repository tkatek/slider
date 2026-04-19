<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";
$customSubtitle = "Write 5 sentences about your favourite weather. Use the model provided<br>

I like summer because it is sunny.<br>
I love swimming and playing outside.<br>
I don’t like winter because it is cold.<br>
I prefer warm weather.<br>
This morning, it’s warm and sunny.<br>
Tomorrow, it will be rainy.";

// Use \n for line breaks in the placeholder
$customPlaceholder = "I like ______ because ______\nI love ______\nI don’t like ______\nI prefer ______\nThis morning, it’s ______ and ______.\nTomorrow, it will be ______.";

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