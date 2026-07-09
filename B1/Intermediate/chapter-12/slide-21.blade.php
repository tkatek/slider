<?php
$customTitle = "Writing";

$customSubtitle = "A Time I Learned to Be Open-Minded";

$customModelAnswer = "Last summer, I met a new neighbor from a different country. At first, I thought we would not have much in common because our cultures and traditions were different. However, I decided to be open-minded and listen to his experiences.

By asking questions and showing interest in his culture, I learned about new foods, celebrations, and customs. I was surprised by how many similarities we shared. We both enjoyed sports, music, and spending time with our families.

This experience taught me that it is important to consider different perspectives before making judgments. Being open-minded helped me make a new friend and appreciate our differences.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-2'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            🌍 Think of a time when you met someone with different interests, traditions, beliefs, or opinions from yours.
        </p>

        <p class='mt-4 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            Write 80–100 words about:
        </p>

        <ul class='mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <li>Who the person was</li>
            <li>How they were different from you</li>
            <li>What you learned from them</li>
            <li>How being open-minded helped you</li>
        </ul>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold leading-relaxed text-slate-900 dark:text-slate-100'>
            ✍️ Sentence Starters
        </p>

        <div class='space-y-2 text-sm leading-relaxed'>
            <p class='rounded-xl bg-emerald-100 px-3 py-2 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>
                Last year, I met someone who...
            </p>

            <p class='rounded-xl bg-emerald-100 px-3 py-2 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>
                At first, I thought...
            </p>

            <p class='rounded-xl bg-emerald-100 px-3 py-2 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>
                After listening to them, I realized...
            </p>

            <p class='rounded-xl bg-emerald-100 px-3 py-2 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>
                I learned that...
            </p>

            <p class='rounded-xl bg-emerald-100 px-3 py-2 font-bold text-emerald-800 dark:bg-emerald-950 dark:text-emerald-200'>
                This experience taught me that...
            </p>
        </div>
    </div>

</div>";

$customPlaceholder = "Write about a time you learned to be open-minded...";

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