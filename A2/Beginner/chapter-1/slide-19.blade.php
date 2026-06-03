<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Recap of Weather Vocabulary";
$customSubtitle = "Can you tell how’s the weather now?";

$customPlaceholder = "It’s .............................";

// Optional image beside the input card.
// Set this to null if you do not want to show an image.
$customImage = materialAsset('slider/A2/Beginner/chapter-2/img/slide7.webp');
// $customImage = null;

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
    'placeholder' => $customPlaceholder,

    // Optional input card image
    'image' => $customImage ?? null,
];
?>

@include("slider.chat.live", compact("content"))