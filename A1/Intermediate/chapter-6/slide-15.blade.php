<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle    = "Record a (voice note ) using the prompt provided";
$customSubtitle = "Make a 30-second emergency call";

// ✅ Put the prompt + checklist in the INPUT placeholder
$customPlaceholder =
    "Checklist:\n" .
    "- Say problem\n" .
    "- Give address\n" .
    "- Ask for help\n";

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

$finalTitle    = $customTitle ?? $slideItems->where('title', 'title')->first()->content ?? 'Writing Time';
$finalSubtitle = $customSubtitle ?? $slideItems->where('title', 'subtitle')->first()->content ?? 'Share your thoughts';

$content = [
    'pusher'      => $pusher,
    'user'        => $user,
    'user_avatar' => $userAvatar,
    'title'       => $finalTitle,
    'subtitle'    => $finalSubtitle,
    'page_title'  => $finalTitle,
    'placeholder' => $customPlaceholder
];
?>


@include('slider.chat.live-audio', ['content' => $content])