<?php

$customTitle = "Writing: “My Bad Day”";

$customSubtitle = "Write a short paragraph (5–7 sentences) about a day when something went wrong.";

$customCalloutText = "

<span class='font-black text-yellow-500 dark:text-yellow-300'>Guiding Questions:</span><br>
&bull; Where were you?<br>
&bull; What were you doing?<br>
&bull; What happened?<br>
&bull; Did you hurt yourself?<br>
&bull; What did you do after?";

// Use \n for line breaks in the placeholder
$customPlaceholder = "Yesterday, I was…\nI was ______ when…\nSuddenly, I…\nI hurt myself / I didn’t hurt myself.\nAfter that, I…";

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