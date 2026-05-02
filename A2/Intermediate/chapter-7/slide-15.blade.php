<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "Write 5–7 sentences about what you are going to do in the future.";

$customCalloutText = "

<span class='font-black text-yellow-500 dark:text-yellow-300'>Make sure you use 4 different future forms:</span><br>
&bull; will + inf.<br>
&bull; be + going to + inf.<br>
&bull; present continuous<br>
&bull; present simple<br><br>

<span class='font-black text-yellow-500 dark:text-yellow-300'>Guiding Questions:</span><br>
&bull; What are you going to do after work tomorrow?<br>
&bull; What do you think you will do in the next 2 years?<br>
&bull; What are you doing this week or next week?<br>
&bull; What time does your English course start and finish?";

// Use \n for line breaks in the placeholder
$customPlaceholder = "After work, I think .......\nIn the next 2 years, maybe I ...............\nNext week, I ..............\nMy English course .............";

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