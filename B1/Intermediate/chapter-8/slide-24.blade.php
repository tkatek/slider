<?php
$customTitle = "Writing: My Best Friend";

$customSubtitle = "Write a paragraph (80–100 words) about your best friend.";

$customModelAnswer = "My best friend's name is Ahmed. He is fifteen years old, and we have been friends for five years. Ahmed is kind, honest, and supportive. He always listens carefully when I have a problem and gives me good advice. We enjoy playing football, studying together, and spending time at the park. I can always trust him because he is reliable and respectful. Last year, he helped me prepare for an important exam, which made me feel more confident. Ahmed is special to me because he is always there when I need help. I am lucky to have such a good friend.";

$customCalloutText = "
<div class='grid grid-cols-1 gap-4 text-slate-800 dark:text-slate-100 lg:grid-cols-[1.3fr_0.85fr_1fr]'>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Include
        </p>

        <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
            <li>Your friend's name and age</li>
            <li>How long you have been friends</li>
            <li>Your friend's personality</li>
            <li>Things you enjoy doing together</li>
            <li>Why your friend is special to you</li>
        </ul>

        <div class='mt-4 border-t border-slate-200 pt-3 dark:border-slate-700'>
            <ul class='list-disc space-y-2 pl-5 text-sm leading-relaxed'>
                <li>Use at least two sentences with <strong>who</strong>.</li>
                <li>Use at least 2 phrasal verbs.</li>
            </ul>
        </div>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Useful Vocabulary
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>kind</p>
            <p>honest</p>
            <p>helpful</p>
            <p>supportive</p>
            <p>trustworthy</p>
            <p>active listener</p>
            <p>caring</p>
            <p>respectful</p>
        </div>
    </div>

    <div class='rounded-xl border border-slate-200 bg-white/70 p-4 dark:border-slate-700 dark:bg-slate-900/40'>
        <p class='mb-3 text-sm font-bold uppercase tracking-wide text-slate-700 dark:text-slate-200'>
            Useful Sentence Starters
        </p>

        <div class='grid grid-cols-1 gap-2 text-sm leading-relaxed text-slate-700 dark:text-slate-200'>
            <p>My best friend's name is ...</p>
            <p>We have been friends for ...</p>
            <p>One thing I like about my friend is ...</p>
            <p>We enjoy ...</p>
            <p>I can always trust my friend because ...</p>
            <p>My friend is special to me because ...</p>
        </div>
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