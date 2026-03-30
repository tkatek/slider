<?php
// 1. CONFIGURATION: Customize text for the Clothes Shop task
$customTitle = "A Glimpse into My Home";
$customSubtitle = "Can you describe your house now?!";

// We put the structures here so they act as a guide inside the text box
$customPlaceholder = "I live in a ...\nI have ... rooms\nThere is a ... in the ...\nThere are... in the...";

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

// Ensure high-quality avatar for the UI
$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id", // Keeps this specific shop conversation separate
];

// 2. LOGIC: Priority: Custom > Database > Default
$finalTitle = $customTitle
    ?? $slideItems->where('title', 'title')->first()->content
    ?? 'Writing Time';

$finalSubtitle = $customSubtitle
    ?? $slideItems->where('title', 'subtitle')->first()->content
    ?? 'Complete the task';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder ?? "Type your message here..."
];
?>

@include("slider.chat.live", compact("content"))