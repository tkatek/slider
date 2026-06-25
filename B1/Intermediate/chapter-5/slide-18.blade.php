@php
    $content = [

        'title'      => 'Listen again',
        'subtitle'   => 'Listen again & complete the blanks with the missing words. Then, role-play it.',

        'audio' => materialAsset('slider/B1/Intermediate/chapter-5/audios/slide18.mp3'),

        'script' => [
            'Interviewer: What is an influencer?',
            'Maya: An influencer is a person who can affect the decisions of their followers because people trust their knowledge and opinions.',
            'Interviewer: Why do companies work with influencers?',
            'Maya: Many companies work with influencers to promote their products and reach more customers.',
            'Interviewer: What should someone do if they want to become an influencer?',
            'Maya: First, they should choose a niche that interests them, such as fashion, travel, or technology.',
            'Interviewer: What should they do next?',
            'Maya: They should choose a social media platform and write an interesting bio that tells people about them.',
            'Interviewer: How can influencers attract more followers?',
            'Maya: Successful influencers post regularly and create interesting content. They also use hashtags and catchy titles so more people can find their posts.',
            'Interviewer: Is it easy to become an influencer?',
            "Maya: Not always. It takes time and patience, but with consistent effort, an influencer's audience can grow.",
        ],

        'sentences' => [
            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> What is an influencer?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> An influencer is a person who can affect the decisions of their {{1}} because people trust their knowledge and opinions.",

            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> Why do companies work with influencers?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> Many companies work with influencers to promote their {{2}} and reach more customers.",

            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> What should someone do if they want to become an influencer?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> First, they should choose a {{3}} that interests them, such as fashion, travel, or technology.",

            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> What should they do next?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> They should choose a social media {{4}} and write an interesting {{5}} that tells people about them.",

            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> How can influencers attract more followers?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> Successful influencers post regularly and create interesting {{6}}. They also use {{7}} and catchy titles so more people can find their posts.",

            "<strong class='text-blue-600 dark:text-blue-400'>Interviewer:</strong> Is it easy to become an influencer?<br><strong class='text-emerald-600 dark:text-emerald-400'>Maya:</strong> Not always. It takes time and {{8}}, but with consistent effort, an influencer's audience can grow.",
        ],

        'answers' => [
            'followers',
            'products',
            'niche',
            'platform',
            'bio',
            'content',
            'hashtags',
            'patience',
        ],

        'word_bank' => [
            'followers',
            'products',
            'niche',
            'platform',
            'bio',
            'content',
            'hashtags',
            'patience',
        ],
    ];
@endphp

@include("slider.game.drag-and-drop-blanks")