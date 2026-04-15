<?php
// 1. MODIFY THESE TO CHANGE THE TEXT
$customTitle = "Writing";
$customSubtitle = "You stayed at a hotel for three nights. Now you are writing a short review online.<br> Write 6–8 sentences. Include:<br>
1. Where the hotel is located<br>
2. Description of the room<br>
3. Staff service<br>
4. One positive point<br>
5. One small problem<br>
6. Your final opinion (recommend or not)";


$customPlaceholder =
    "You may use this structure:\n" .
    "Last week, I stayed at __________ Hotel for ______ nights.\n" .
    "The hotel is near __________.\n" .
    "My room was __________ and __________.\n" .
    "The staff were __________.\n" .
    "One positive point was __________.\n" .
    "One problem was __________.\n" .
    "Overall, I __________ this hotel.\n";


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