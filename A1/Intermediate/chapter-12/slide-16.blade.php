<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "My Boarding Experience";

$customSubtitle = "Write 5–6 simple sentences about boarding the plane.";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Include:</span><br>
&bull; Where you wait<br>
&bull; Who you speak to<br>
&bull; Your seat number<br>
&bull; One instruction you hear<br>
&bull; What you do before takeoff";

// Use \n for line breaks in the placeholder
$customPlaceholder =
    "I wait in the . . . . lounge.\n" .
    "The flight attendant says, \". . . .\"\n" .
    "My seat number is . . . .\n" .
    "I put my bag in the . . . .\n" .
    "I fasten my . . . .\n" .
    "The plane . . . . (takes off / lands).";

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