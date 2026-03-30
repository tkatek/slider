<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing Time";
$customSubtitle = "Write an e-mail to your friend telling him about your next holiday to Morocco. You can use
the prompts provided as follows";

// ✅ Put the 4 sentences in the INPUT placeholder (not the subtitle)
$customPlaceholder =
    "I’m going to go to..........(when).\n" .
    "I’ going to stay for..........(How long).\n" .
    "I’ve booked a ....................(Type of holiday).\n" .
    "I’m going to travel by........(Type of transportation).\n" .
    "I am going to stay at .............(accommodation).\n" .
    "It is going to cost....................(How much?$)\n";

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