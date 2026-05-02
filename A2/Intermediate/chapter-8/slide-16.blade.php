<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Write 5–6 sentences about what you will do this weekend.";

$customCalloutText = "

<span class='font-black text-yellow-500 dark:text-yellow-300'>Use:</span><br>
&bull; First conditional: <span class='font-black'>If + present → will</span><br>
&bull; At least 3 “if” sentences<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Guiding Questions:</span><br>
&bull; What will you do if the weather is nice?<br>
&bull; What will you do if it rains?<br>
&bull; Who will you meet if you have time?<br>
&bull; What will you do if you feel tired?";

// Use \n for line breaks in the placeholder
$customPlaceholder = "If the weather is nice, I will…\nIf it rains, I will…\nIf I have time, I will…\nIf I feel tired, I will…";

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