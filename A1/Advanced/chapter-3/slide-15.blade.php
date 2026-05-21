<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";

$customSubtitle = "You stayed at a hotel for three nights. Now you are writing a short review online.";

$customCalloutText = "
<span class='font-black text-yellow-500 dark:text-yellow-300'>Write 6–8 sentences. Include:</span><br>
1. Where the hotel is located<br>
2. Description of the room<br>
3. Staff service<br>
4. One positive point<br>
5. One small problem<br>
6. Your final opinion (recommend or not)";

// Use \n for line breaks in the placeholder
$customPlaceholder =
    "You may use this structure:\n" .
    "Last week, I stayed at . . . . Hotel for . . . . nights.\n" .
    "The hotel is near . . . .\n" .
    "My room was . . . . and . . . .\n" .
    "The staff were . . . .\n" .
    "One positive point was . . . .\n" .
    "One problem was . . . .\n" .
    "Overall, I . . . . this hotel.\n";

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