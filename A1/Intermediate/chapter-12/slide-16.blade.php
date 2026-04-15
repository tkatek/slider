<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "My Boarding Experience";
$customSubtitle = "Write 5–6 simple sentences about boarding the plane, Include:<br>
1. Where you wait<br>
2. Who you speak to<br>
3. Your seat number<br>
4. One instruction you hear<br>
5. What you do before takeoff";


$customPlaceholder =
    "I wait in the ______ lounge.\n" .
    "The flight attendant says, \"_______.\"\n" .
    "My seat number is ______.\n" .
    "I put my bag in the ______.\n" .
    "I fasten my ______.\n" .
    "The plane ______ (takes off / lands).";

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