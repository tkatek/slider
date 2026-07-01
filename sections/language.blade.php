@if($sectionStyles ?? false)
    <style>
        /* Language, vocabulary, and image-card activity styles. */
        .pq-image-frame img {
            animation: pqImageReveal 560ms var(--pq-ease) both;
        }

        @media (hover: hover) and (pointer: fine) {
            .pq-image-frame:hover img {
                filter: saturate(1.04) contrast(1.015);
                transform: scale(1.018);
            }
        }

        .pq-list-row {
            animation: pqOptionEnter 430ms var(--pq-ease) both;
        }

        .pq-list-row:nth-child(1) {
            animation-delay: 30ms;
        }

        .pq-list-row:nth-child(2) {
            animation-delay: 70ms;
        }

        .pq-list-row:nth-child(3) {
            animation-delay: 110ms;
        }

        .pq-list-row:nth-child(4) {
            animation-delay: 150ms;
        }

        .pq-list-row:nth-child(5) {
            animation-delay: 190ms;
        }

        .pq-list-row:nth-child(6) {
            animation-delay: 230ms;
        }

        .pq-list-row:nth-child(n+7) {
            animation-delay: 270ms;
        }

        .pq-list-row::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 4px;
            border-radius: 0 999px 999px 0;
            background: linear-gradient(to bottom, #7c7ff6, #ff8a7a);
            content: "";
            opacity: 0;
            transform: scaleY(.35);
            transition: opacity 180ms ease, transform 180ms var(--pq-ease);
        }

        .is-audio-playing.pq-list-row::before {
            opacity: 1;
            transform: scaleY(1);
        }
    </style>
@else
{{-- Activity functions: language cards, vocabulary, and new-language image pages. --}}
    function groupImageGridClass(rows = []) {
        const count = rows.length;

        if (count <= 4) return 'grid-cols-2 sm:grid-cols-2 md:grid-cols-4';
        if (count <= 5) return 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-5';
        if (count <= 6) return 'grid-cols-2 sm:grid-cols-3 xl:grid-cols-6';
        if (count <= 10) return 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5';
        return 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6';
    }

    function renderGroupImageCard(item, itemTitle, page, index) {
        const image = item.image || '';
        const paragraph = textHtml(item.paragraph || item.description || item.subtitle || '');
        const rowAudio = hasAudio(item) ? audioButton(item.audio, `Play ${itemTitle}`, 'compact') : '';
        const emoji = fieldHasValue(item.emoji)
            ? firstEmoji(item.emoji)
            : firstEmoji(defaultEmojiForText(itemTitle, page.sectionTitle));
        const emojiSize = badgeTextSize(emoji, 'text-[clamp(2.6rem,13vw,5rem)]', 'text-[clamp(1.75rem,8vw,3.25rem)]');

        const visual = fieldHasValue(image)
            ? `<img class="h-full w-full object-cover object-center transition duration-500 group-hover:scale-[1.015]" src="${escapeHtml(image)}" alt="${escapeHtml(itemTitle)}" loading="lazy" decoding="async">`
            : `<div class="grid h-full w-full place-items-center bg-gradient-to-br from-[#f7f6ff] via-white to-[#eef3ff]"><span class="${emojiSize} leading-none drop-shadow-[0_10px_22px_rgba(91,80,220,.14)]">${escapeHtml(emoji)}</span></div>`;

        return `
            <article class="pq-list-row pq-image-card group relative w-full justify-self-center overflow-hidden rounded-[1.25rem] border border-[#eceafa] bg-white shadow-[0_12px_28px_rgba(38,35,92,.07)] hover:-translate-y-0.5 hover:border-[#dad6ff] hover:shadow-[0_18px_38px_rgba(91,80,220,.12)] sm:rounded-[1.45rem] lg:!max-w-[13.75rem] xl:!max-w-[14.75rem] short:!max-w-[12.25rem]" ${hasAudio(item) ? 'data-audio-scope' : ''}>
                <figure class="pq-image-card-media aspect-[4/3] w-full overflow-hidden bg-[#f0eeff] lg:!aspect-square">
                    ${visual}
                </figure>

                <div class="flex min-h-[4.75rem] items-center justify-between gap-3 px-3 py-3 sm:min-h-[5.25rem] sm:px-4 sm:py-3.5 short:!min-h-[4.15rem] short:!py-[.7rem]">
                    <div class="min-w-0 max-w-[calc(100%-3rem)] flex-1">
                        <h2 class="line-clamp-2 text-[clamp(.95rem,3.6vw,1.15rem)] font-bold short:!text-[1.05rem] leading-tight text-[#242538]" data-audio-text>${escapeDisplay(itemTitle)}</h2>
                        ${paragraph ? `<div class="mt-1 line-clamp-2 text-xs font-bold leading-snug text-[#85889a] sm:text-sm short:!text-[.78rem]" data-audio-copy>${paragraph}</div>` : ''}
                    </div>
                    <div class="grid shrink-0 place-items-center">${rowAudio}</div>
                </div>
            </article>
        `;
    }

    function renderGroupListRow(item, itemTitle, page, index) { 
        const paragraph = textHtml(item.paragraph || item.description || ''); 
        const isSimplePhraseCard = !paragraph && !hasImage(item);
        const itemTextLength = String(itemTitle || '').length;
        const isLongPhraseCard = isSimplePhraseCard && itemTextLength > 22;

        const rowAudio = hasAudio(item)
            ? audioButton(item.audio, `Play ${itemTitle}`, isSimplePhraseCard ? 'compact' : 'default')
            : '';

        const compactEmoji = fieldHasValue(item.emoji)
            ? firstEmoji(item.emoji)
            : firstEmoji(defaultEmojiForText(itemTitle, page.sectionTitle));
        const compactEmojiSize = badgeTextSize(compactEmoji, 'text-[1.15rem] sm:text-[1.28rem] min-[1536px]:!text-[1.4rem]', 'text-[.9rem] leading-none sm:text-[1rem] min-[1536px]:!text-[1.08rem]');

        const badge = isSimplePhraseCard
            ? `
            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-[.8rem] bg-[#f0eeff] ${compactEmojiSize} font-bold text-[#665de8] sm:h-11 sm:w-11 min-[1536px]:!h-12 min-[1536px]:!w-12 short:!h-10 short:!w-10">${escapeHtml(compactEmoji)}</span>
        `
            : groupCardBadge(item, itemTitle, page.sectionTitle, index);

        const rowClass = isSimplePhraseCard
            ? isLongPhraseCard
                ? 'pq-list-row relative flex min-h-[4.1rem] w-full items-center gap-3 overflow-hidden rounded-[1.05rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-4 py-3 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[4.35rem] min-[1536px]:!min-h-[4.65rem] min-[1536px]:!px-5 min-[1536px]:!py-3.5 min-[1800px]:!min-h-[4.9rem] laptop:!min-h-[3.95rem] laptop:!px-4 laptop:!py-2.5 short:!min-h-[3.7rem] short:!py-[.7rem]'
                : 'pq-list-row relative flex min-h-[4rem] w-full items-center gap-3 overflow-hidden rounded-[1.05rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-4 py-3 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[4.25rem] min-[1536px]:!min-h-[4.55rem] min-[1536px]:!px-5 min-[1536px]:!py-3.5 min-[1800px]:!min-h-[4.8rem] laptop:!min-h-[3.85rem] laptop:!px-4 laptop:!py-2.5 short:!min-h-[3.6rem] short:!py-[.65rem]'
            : 'pq-list-row relative flex min-h-[4.1rem] items-center gap-3 overflow-hidden rounded-[1.1rem] short:!min-h-[4.05rem] short:!py-[.72rem] border border-[#eceafa] bg-gradient-to-br from-white to-[#fbfbff] px-4 py-3 shadow-[0_8px_20px_rgba(38,35,92,.055)] sm:min-h-[4.8rem] sm:px-5 md:min-h-[5.15rem] laptop:!min-h-[4.25rem] laptop:!px-4 laptop:!py-3';

        const titleClass = isSimplePhraseCard
            ? isLongPhraseCard
                ? 'line-clamp-2 py-[2px] text-[.9rem] font-bold leading-[1.24] text-[#242538] sm:text-[.98rem] min-[1536px]:text-[1.1rem] min-[1800px]:text-[1.16rem] short:!text-[.88rem] short:!leading-[1.2]'
                : 'line-clamp-2 py-[2px] text-[.92rem] font-bold leading-[1.22] text-[#242538] sm:text-[.98rem] min-[1536px]:text-[1.1rem] min-[1800px]:text-[1.16rem] short:!text-[.88rem] short:!leading-[1.18]'
            : 'line-clamp-2 text-[clamp(1rem,3.8vw,1.28rem)] font-bold short:!text-[1.05rem] leading-tight text-[#242538]';

        const copyClass = 'mt-1 line-clamp-2 text-sm font-bold leading-snug text-[#85889a] short:!text-[.78rem]';

        return `
        <div class="${rowClass}" ${hasAudio(item) ? 'data-audio-scope' : ''}>
            ${badge}
            <div class="min-w-0 flex-1">
                <h2 class="${titleClass}" data-audio-text>${escapeDisplay(itemTitle)}</h2>
                ${paragraph ? `<div class="${copyClass}" data-audio-copy>${paragraph}</div>` : ''}
            </div>
            ${rowAudio}
        </div>
    `;
    }

    function renderGroupPage(page) {
        const rows = page.items || [];
        const title = fieldHasValue(page.title) ? page.title : '';
        const hasDescriptions = rows.some((item) => fieldHasValue(item.paragraph || item.description));
        const shouldUseImageCards = rows.some((item) => hasImage(item));
        const isSimplePhraseGroup = !shouldUseImageCards && !hasDescriptions;

        const averageTitleLength = rows.length
            ? rows.reduce((sum, item, index) => {
            const value = String(item.title || item.question || `Item ${index + 1}` || '');
            return sum + value.length;
        }, 0) / rows.length
            : 0;

        const isLongPhraseGroup = isSimplePhraseGroup && averageTitleLength > 22;

        const gridClass = shouldUseImageCards
            ? groupImageGridClass(rows)
            : 'grid-cols-1 min-[700px]:!grid-cols-2';

        const groupGridKind = shouldUseImageCards
            ? 'pq-group-grid--images'
            : hasDescriptions
                ? 'pq-group-grid--text'
                : isLongPhraseGroup
                    ? 'pq-group-grid--long-phrases'
                    : 'pq-group-grid--simple';

        const nonImageGroupMaxWidth = rows.length === 4
            ? 'max-w-[64rem]'
            : rows.length <= 6
                ? 'max-w-[78rem]'
                : 'max-w-[88rem]';

        const groupMaxWidth = shouldUseImageCards
            ? 'max-w-[88rem]'
            : nonImageGroupMaxWidth;

        return `
            <article class="pq-group-page mx-auto flex min-h-0 w-full ${groupMaxWidth} flex-col px-1 pt-0 pb-2 text-left sm:px-3 sm:pt-0 sm:pb-4 lg:px-5 lg:pt-0 lg:pb-5 xl:px-6 xl:pb-6 laptop:!px-3 laptop:!pt-0 laptop:!pb-3 short:!max-w-[min(76rem,calc(100vw-5rem))] short:!pt-0 short:!pb-[.65rem]" data-audio-scope>
                ${title ? `<h1 class="${ui.title} text-[clamp(1.65rem,6vw,2.65rem)] lg:text-[2.75rem] laptop:!text-[clamp(1.8rem,3.4vw,2.35rem)] short:!text-[clamp(1.8rem,4.2vw,2.45rem)]">${escapeDisplay(title)}</h1>` : ''}
                ${fieldHasValue(page.subtitle) ? `<div class="${ui.copy} ${title ? 'mt-2' : ''}">${textHtml(page.subtitle)}</div>` : ''}
                <div class="pq-group-grid ${groupGridKind} mt-5 grid items-stretch gap-3 pr-1 sm:mt-6 sm:gap-4 ${gridClass} ${shouldUseImageCards ? 'justify-center lg:!grid-cols-[repeat(auto-fit,minmax(10.5rem,13.75rem))] xl:!grid-cols-[repeat(auto-fit,minmax(11.5rem,14.75rem))] xl:gap-5 short:!grid-cols-[repeat(auto-fit,minmax(9.75rem,12.25rem))]' : 'min-[1536px]:gap-6 min-[1800px]:gap-7'} laptop:!mt-4 laptop:!gap-3 short:!mt-4 short:!gap-[.78rem]" data-group-list>
                    ${rows.map((item, index) => {
            const globalIndex = Number(page.itemOffset || 0) + index;
            const itemTitle = item.title || item.question || `Item ${globalIndex + 1}`;
            return shouldUseImageCards
                ? renderGroupImageCard(item, itemTitle, page, globalIndex)
                : renderGroupListRow(item, itemTitle, page, globalIndex);
        }).join('')}
                </div>
            </article>
        `;
    }

    // SECTION: Conversation page render helpers.
    function speakerFromSide(page, side) {
        const people = page.people || {};
        if (people[side]) return people[side];
        if (side === 'left') return people.doctor || people.male || {};
        if (side === 'right') return people.teacher || people.female || {};
        return {};
    }

    function speakerName(page, side) {
        const speaker = speakerFromSide(page, side);
        return speaker.name || (side === 'left' ? 'Speaker 1' : 'Speaker 2');
    }

    function speakerImage(page, side) {
        const speaker = speakerFromSide(page, side);
        return speaker.image || '';
    }

    function renderImagePage(page) {
        const title = page.title || page.question || page.sectionTitle || 'Practice';
        const paragraph = textHtml(page.paragraph || page.description || '');
        const image = page.image;

        return `
            <article class="pq-single-image-layout pq-mobile-image-page mx-auto grid min-h-0 w-full max-w-[76rem] items-start gap-7 px-1 pt-0 pb-3 text-left max-[520px]:!gap-[.7rem] max-[520px]:!pt-0 max-[520px]:!pb-1 sm:gap-7 sm:px-3 md:grid-cols-[minmax(15rem,.95fr)_minmax(16rem,1.05fr)] md:gap-7 md:pb-0 lg:max-w-[76rem] lg:grid-cols-[minmax(20rem,1fr)_minmax(20rem,.92fr)] lg:items-center lg:gap-10 lg:pt-0 lg:pb-6 xl:max-w-[82rem] xl:gap-10 2xl:grid-cols-[minmax(24rem,1fr)_minmax(22rem,.9fr)] laptop:!max-w-[min(68rem,calc(100vw-5rem))] laptop:!gap-7 laptop:!pt-0 laptop:!pb-3 short:!max-w-[min(68rem,calc(100vw-5rem))] short:!grid-cols-[minmax(17rem,.9fr)_minmax(17rem,1.1fr)] short:!gap-7 short:!pt-0 short:!pb-[.65rem]" data-audio-scope>
                <figure class="pq-image-frame pq-single-image-figure pq-mobile-image-figure relative aspect-[4/3] max-h-[38svh] w-full justify-self-center overflow-hidden rounded-[1.15rem] border border-[#eceafa] bg-gradient-to-br from-[#eeedff] to-white shadow-[0_14px_34px_rgba(38,35,92,.09)] max-[520px]:!aspect-[4/3] max-[520px]:!max-h-[clamp(10.5rem,34dvh,14rem)] max-[520px]:!rounded-[1rem] min-[390px]:max-h-[40svh] sm:rounded-[1.25rem] md:aspect-[5/4] md:max-h-[30rem] xl:max-h-[34rem] xl:max-w-[36rem] laptop:!max-h-[calc(100dvh-12.5rem)] laptop:!max-w-[31rem] short:!max-h-[calc(100dvh-13rem)] short:!max-w-[28rem] short:!justify-self-end">
                    ${image ? `<img class="h-full w-full object-cover object-center" src="${escapeHtml(image)}" alt="${escapeHtml(title)}" loading="lazy" decoding="async">` : ''}
                </figure>

                <div class="min-w-0 max-[520px]:!px-0.5 md:self-center">
                    <div class="flex min-w-0 items-center justify-between gap-2.5">
                        <h1 class="${ui.title} pq-mobile-image-title min-w-0 flex-1 break-words text-[clamp(1.55rem,7vw,2.2rem)] leading-[1.08] max-[520px]:!max-w-[calc(100%-3.05rem)] max-[520px]:!text-[clamp(1.28rem,6vw,1.62rem)] max-[520px]:!leading-[1.05] max-[520px]:!tracking-[-.035em] md:text-[clamp(2.35rem,4vw,3.45rem)] lg:text-[clamp(2.65rem,3.1vw,4rem)] laptop:!text-[clamp(2.2rem,3vw,3.25rem)] short:!text-[clamp(2.1rem,3.6vw,3.3rem)]" data-audio-text>${escapeDisplay(title)}</h1>
                        <div class="grid shrink-0 place-items-center max-[520px]:[&_.pq-audio-btn]:!h-[2.65rem] max-[520px]:[&_.pq-audio-btn]:!w-[2.65rem] max-[520px]:[&_.pq-audio-btn]:!shadow-[0_8px_18px_rgba(91,80,220,.24)]">${audioButton(page.audio, `Play ${title}`, 'media')}</div>
                    </div>
                    ${paragraph ? `<div class="${ui.copy} pq-mobile-image-copy mt-3 max-w-full max-[520px]:!mt-[.45rem] max-[520px]:!text-[clamp(.9rem,3.65vw,.98rem)] max-[520px]:!font-semibold max-[520px]:!leading-[1.38] max-[520px]:[&_p]:!m-0 lg:mt-5 lg:text-xl short:!text-base short:!leading-[1.45]" data-audio-copy>${paragraph}</div>` : ''}
                </div>
            </article>
        `;
    }

@endif
