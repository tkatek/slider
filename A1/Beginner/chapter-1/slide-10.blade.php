<?php
// 1. CONFIGURATION: Modify these to change the text on this specific page
$customTitle = "Introduce Yourself";
$customSubtitle = "Introduce yourself in 3 sentences, telling your name, nationality, and job";

// Use \n if you want the placeholder to have multiple lines
$customPlaceholder = "My name is...\nI am from...\nI work as a...";

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

// Ensure the user has a valid avatar URL for the Tailwind UI
$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id", // Unique channel per slide to keep chats separate
];

// 2. LOGIC: Priority: Custom Variable -> Database Content -> Default Fallback
$finalTitle = $customTitle
    ?? 'Writing Time';

$finalSubtitle = $customSubtitle
    ?? $slideItems->where('title', 'subtitle')->first()->content
    ?? 'Share your thoughts with the class';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder ?? "Type your answer here..."
];
?>

@include("slider.chat.live", compact("content"))