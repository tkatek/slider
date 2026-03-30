<?php
// 1. CONFIGURATION: Customize these for this specific slide
$customTitle = "Writing Time";
$customSubtitle = "Can you write 5 sentences about your family? Make sure you use at least:
\nOne subject pronoun,
\nOne possessive adjectives,
\nAn adjectives to describe one of your family members.";

// Placeholder for the family writing task
$customPlaceholder = "This is my…\nHe is…\nShe is my…";

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

// Avatar fallback logic
$userAvatar = $user->getFirstMediaUrl('avatars', 'thumb');
if (!$userAvatar) {
    $userAvatar = "https://ui-avatars.com/api/?name=" . urlencode($user->name) . "&background=6366f1&color=fff&bold=true";
}

$pusher = [
    "key" => config('chatify.pusher.key'),
    "cluster" => config('chatify.pusher.options.cluster'),
    "channel" => "slide-$slide->id", // Keeps this chat separate from other slides
];

// 2. LOGIC: Use overrides first, then DB items, then default text
$finalTitle = $customTitle
    ?? $slideItems->where('title', 'title')->first()->content
    ?? 'Writing Time';

$finalSubtitle = $customSubtitle
    ?? $slideItems->where('title', 'subtitle')->first()->content
    ?? 'Write about your family';

$content = [
    'pusher' => $pusher,
    'user' => $user,
    'user_avatar' => $userAvatar,
    'title' => $finalTitle,
    'subtitle' => $finalSubtitle,
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder ?? "Type your sentences here..."
];
?>

@include("slider.chat.live", compact("content"))