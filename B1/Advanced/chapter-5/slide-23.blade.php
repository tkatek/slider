<?php
$customTitle = "Writing: My Green Promise";

$customSubtitle = "Think about your daily habits. Write a 100–120-word paragraph about three changes you will make to help protect the environment.";

$customModelAnswer = "My Green Promise

From today, I will make small changes to help protect the environment. First, I will walk or ride my bike whenever possible instead of using a car. This will help reduce my carbon footprint and keep the air cleaner. Second, I will recycle paper, plastic, and metal instead of throwing them away. Finally, I will save energy by turning off lights and unplugging electrical devices when I am not using them. I believe every small action can make a big difference. If more people follow these simple habits, we can create a cleaner, greener, and healthier planet for future generations.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            In your paragraph, you should:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>Think about your daily habits.</li>
            <li>Write 100–120 words.</li>
            <li>Write about three changes you will make to help protect the environment.</li>
            <li>Explain how these changes will make a difference.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Sentence Starters
        </p>

        <ul class='list-none space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>✔ From today, I will...</li>
            <li>✔ I want to reduce...</li>
            <li>✔ I will try to...</li>
            <li>✔ This will help...</li>
            <li>✔ I hope other people will...</li>
        </ul>
    </div>

</div>";

$customPlaceholder = "";

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
    'model_answer' => trim((string) ($customModelAnswer ?? '')),
    'page_title' => $finalTitle,
    'placeholder' => $customPlaceholder,
];
?>

@include("slider.chat.live", compact("content"))