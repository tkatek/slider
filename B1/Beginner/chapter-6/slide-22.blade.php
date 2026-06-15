<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "My Favorite Activities";

$customSubtitle = "Write 80–100 words about:";

$customCalloutText = "

<ul class='list-disc space-y-2 pl-6 text-slate-800 dark:text-slate-100'>
    <li>whether you prefer indoor or outdoor activities</li>
    <li>two activities you enjoy</li>
    <li>when and where you do them</li>
    <li>why you like them</li>
    <li>one new activity you would like to try</li>
</ul>";

$customPlaceholder = "I prefer ---------- activities. My favourite activity is ----------. I usually do it at ----------. I like it because ----------. I also enjoy ----------. I do this activity with ----------. I am open to trying ---------- because ----------.";

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
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=059669&color=fff&bold=true";
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