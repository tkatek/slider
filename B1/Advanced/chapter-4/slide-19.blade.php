<?php
$customTitle = "Writing: An Environmental Report";

$customSubtitle = "Imagine you are a reporter. Write an 80–100-word report about the environmental problems in your country or community.";

$customModelAnswer = "An Environmental Report

Today, our environment is facing many challenges. One major problem is that air pollution is getting worse, and sea levels are rising because of climate change. As a result, many animals are struggling to adapt to their changing habitats, and some coastal communities are being put at risk of flooding.

Fortunately, action is being taken to protect our planet. More trees are being planted, and renewable energy is being used in many cities. We should reduce our carbon footprint, recycle more, and spread awareness about protecting the environment. Together, we can make a difference.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            In your report, you should:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>Describe two or three environmental problems.</li>
            <li>Explain what is happening now.</li>
            <li>Mention what actions are being taken.</li>
            <li>Suggest one or two ways to protect the environment.</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Remember to:
        </p>

        <ul class='list-none space-y-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>✔ Use at least 5 words from the new vocabulary.</li>
            <li>✔ Include 2 Present Continuous sentences.</li>
            <li>✔ Include 2 Present Continuous Passive sentences.</li>
            <li>✔ Organize your ideas into a clear beginning, middle, and ending.</li>
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