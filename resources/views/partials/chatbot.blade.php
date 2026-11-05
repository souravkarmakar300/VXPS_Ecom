{{-- VXPS AI Shopping Assistant --}}

<style>
    /* =====================================
   VXPS AI CHATBOT - VISIBILITY FIX
===================================== */

#vxps-chatbot {
    position: fixed !important;
    right: 20px !important;
    bottom: 20px !important;
    z-index: 99999 !important;
    font-family: inherit;
}

#vxps-chatbot-toggle {
    display: flex !important;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    border: none;
    border-radius: 50%;
    background: #059669;
    color: #ffffff;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
}

#vxps-chatbot-toggle:hover {
    background: #047857;
}

#vxps-chatbot-toggle svg {
    width: 28px;
    height: 28px;
}

#vxps-chatbot-panel {
    display: none;
    position: absolute;
    right: 0;
    bottom: 72px;
    width: min(390px, calc(100vw - 32px));
    height: min(620px, calc(100dvh - 110px));
    flex-direction: column;
    overflow: hidden;
    border-radius: 16px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
}

#vxps-chatbot-panel.hidden {
    display: none !important;
}

#vxps-chatbot-panel.flex {
    display: flex !important;
}

@media (max-width: 480px) {
    #vxps-chatbot {
        right: 14px !important;
        bottom: 16px !important;
    }

    #vxps-chatbot-panel {
        width: calc(100vw - 28px);
        right: 0;
    }
}
</style>





<div id="vxps-chatbot" class="fixed bottom-5 right-4 sm:right-6 z-[9999] font-sans">
    <button
        id="vxps-chatbot-toggle"
        type="button"
        aria-label="Open VXPS AI assistant"
        aria-expanded="false"
        class="ml-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-600 text-white shadow-xl shadow-emerald-900/25 transition hover:scale-105 hover:bg-emerald-500 focus:outline-none focus:ring-4 focus:ring-emerald-500/30"
    >
        <svg id="vxps-chatbot-open-icon" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5m-1 7-4-4H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4l-4 4Z" />
        </svg>
        <svg id="vxps-chatbot-close-icon" class="hidden h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 6 12 12M18 6 6 18" />
        </svg>
    </button>

    <section
        id="vxps-chatbot-panel"
        class="absolute bottom-[4.5rem] right-0 hidden h-[min(620px,calc(100dvh-7rem))] w-[min(390px,calc(100vw-2rem))] flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl shadow-slate-950/20 dark:border-slate-800 dark:bg-slate-950"
        role="dialog"
        aria-label="VXPS AI shopping assistant"
        aria-modal="false"
    >
        <div class="flex items-center gap-3 bg-slate-950 px-4 py-4 text-white">
            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2M5 12H3m18 0h-2M5.64 5.64 4.22 4.22m15.56 15.56-1.42-1.42m0-12.72 1.42-1.42M4.22 19.78l1.42-1.42M8 9h8v6H8zM9 15v2m6-2v2" />
                </svg>
            </div>
            <div class="min-w-0 flex-1">
                <p class="text-sm font-bold tracking-wide">VXPS Assistant</p>
                <p class="mt-0.5 flex items-center gap-1.5 text-xs text-emerald-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    AI Shopping Support
                </p>
            </div>
            <button id="vxps-chatbot-new-chat" type="button" class="rounded-lg px-2 py-1 text-xs font-semibold text-slate-300 transition hover:bg-white/10 hover:text-white">New chat</button>
        </div>

        <div id="vxps-chatbot-messages" class="flex-1 space-y-3 overflow-y-auto bg-slate-50 px-3 py-4 dark:bg-slate-900" aria-live="polite" aria-relevant="additions">
            <div id="vxps-chatbot-welcome" class="max-w-[88%] rounded-2xl rounded-tl-sm border border-slate-200 bg-white px-3.5 py-3 text-sm leading-relaxed text-slate-700 shadow-sm dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200">
                Hello! 👋 Welcome to VXPS. I can help you explore products and answer questions about our catalogue. What are you looking for today?
            </div>
        </div>

        <div class="border-t border-slate-200 bg-white p-3 dark:border-slate-800 dark:bg-slate-950">
            <div class="mb-2 flex flex-wrap gap-2" id="vxps-chatbot-suggestions">
                <button type="button" data-suggestion="Show me wireless chargers" class="rounded-full border border-slate-200 px-3 py-1.5 text-[11px] font-semibold text-slate-600 transition hover:border-emerald-500 hover:text-emerald-600 dark:border-slate-700 dark:text-slate-300">Wireless chargers</button>
                <button type="button" data-suggestion="Recommend a useful everyday tech accessory" class="rounded-full border border-slate-200 px-3 py-1.5 text-[11px] font-semibold text-slate-600 transition hover:border-emerald-500 hover:text-emerald-600 dark:border-slate-700 dark:text-slate-300">Everyday tech</button>
            </div>

            <form id="vxps-chatbot-form" class="flex items-end gap-2">
                <label for="vxps-chatbot-input" class="sr-only">Type your message</label>
                <textarea
                    id="vxps-chatbot-input"
                    rows="1"
                    maxlength="1200"
                    placeholder="Ask about a product..."
                    class="max-h-28 min-h-11 flex-1 resize-none rounded-xl border border-slate-200 bg-slate-50 px-3 py-3 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/15 dark:border-slate-700 dark:bg-slate-900 dark:text-white"
                ></textarea>
                <button
                    id="vxps-chatbot-send"
                    type="submit"
                    aria-label="Send message"
                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white transition hover:bg-emerald-500 disabled:cursor-not-allowed disabled:opacity-50"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7ZM22 2 11 13" />
                    </svg>
                </button>
            </form>
            <p class="mt-2 text-center text-[10px] text-slate-400">Chat messages may be stored. AI responses can be inaccurate; confirm important details.</p>
        </div>
    </section>
</div>

<script>
(() => {
    const root = document.getElementById('vxps-chatbot');
    if (!root || root.dataset.initialized === 'true') return;
    root.dataset.initialized = 'true';

    const toggle = document.getElementById('vxps-chatbot-toggle');
    const panel = document.getElementById('vxps-chatbot-panel');
    const openIcon = document.getElementById('vxps-chatbot-open-icon');
    const closeIcon = document.getElementById('vxps-chatbot-close-icon');
    const messages = document.getElementById('vxps-chatbot-messages');
    const welcome = document.getElementById('vxps-chatbot-welcome');
    const form = document.getElementById('vxps-chatbot-form');
    const input = document.getElementById('vxps-chatbot-input');
    const sendButton = document.getElementById('vxps-chatbot-send');
    const newChatButton = document.getElementById('vxps-chatbot-new-chat');
    const suggestions = document.getElementById('vxps-chatbot-suggestions');
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    let isSending = false;
    let historyLoaded = false;

    function scrollToBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    // Render as text nodes and safe links; never inject AI output as HTML.
    function appendTextWithLinks(container, text) {
        const urlPattern = /(https?:\/\/[^\s<]+)/g;
        let lastIndex = 0;
        let match;

        while ((match = urlPattern.exec(text)) !== null) {
            if (match.index > lastIndex) {
                container.appendChild(document.createTextNode(text.slice(lastIndex, match.index)));
            }

            const rawUrl = match[0].replace(/[),.!?]+$/, '');
            const trailing = match[0].slice(rawUrl.length);
            try {
                const parsed = new URL(rawUrl);
                if (parsed.protocol === 'http:' || parsed.protocol === 'https:') {
                    const link = document.createElement('a');
                    link.href = parsed.href;
                    link.target = '_blank';
                    link.rel = 'noopener noreferrer';
                    link.className = 'break-all text-emerald-600 underline dark:text-emerald-400';
                    link.textContent = rawUrl;
                    container.appendChild(link);
                } else {
                    container.appendChild(document.createTextNode(rawUrl));
                }
            } catch (_) {
                container.appendChild(document.createTextNode(rawUrl));
            }
            if (trailing) container.appendChild(document.createTextNode(trailing));
            lastIndex = match.index + match[0].length;
        }

        if (lastIndex < text.length) {
            container.appendChild(document.createTextNode(text.slice(lastIndex)));
        }
    }

    function safeProductUrl(value) {
        if (typeof value !== 'string' || !value.trim()) return null;
        try {
            const parsed = new URL(value, window.location.origin);
            if (!['http:', 'https:'].includes(parsed.protocol)) return null;
            // Product links must remain on this store domain.
            if (parsed.origin !== window.location.origin) return null;
            return parsed.href;
        } catch (_) {
            return null;
        }
    }

    function createProductCard(product) {
        const card = document.createElement('article');
        card.className = 'flex w-full max-w-[340px] gap-3 overflow-hidden rounded-xl border border-slate-200 bg-white p-2.5 shadow-sm dark:border-slate-700 dark:bg-slate-950';

        const imageLink = document.createElement('a');
        imageLink.className = 'flex h-24 w-24 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-slate-100 dark:bg-slate-800';
        const productUrl = safeProductUrl(product.url);
        if (productUrl) imageLink.href = productUrl;
        else imageLink.href = '#';
        imageLink.setAttribute('aria-label', `View ${String(product.name || 'product')}`);

        if (typeof product.image === 'string' && product.image.trim()) {
            const image = document.createElement('img');
            image.src = product.image;
            image.alt = String(product.name || 'VXPS product');
            image.loading = 'lazy';
            image.className = 'h-full w-full object-cover';
            image.addEventListener('error', () => {
                image.remove();
                const fallback = document.createElement('span');
                fallback.className = 'px-2 text-center text-[10px] font-semibold text-slate-400';
                fallback.textContent = 'Image unavailable';
                imageLink.appendChild(fallback);
            }, { once: true });
            imageLink.appendChild(image);
        } else {
            const placeholder = document.createElement('span');
            placeholder.className = 'px-2 text-center text-[10px] font-semibold text-slate-400';
            placeholder.textContent = 'VXPS Product';
            imageLink.appendChild(placeholder);
        }

        const details = document.createElement('div');
        details.className = 'flex min-w-0 flex-1 flex-col';

        if (product.category) {
            const category = document.createElement('p');
            category.className = 'mb-1 text-[9px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400';
            category.textContent = String(product.category);
            details.appendChild(category);
        }

        const title = document.createElement('a');
        title.className = 'line-clamp-2 text-xs font-bold leading-snug text-slate-900 hover:text-emerald-600 dark:text-white dark:hover:text-emerald-400';
        title.textContent = String(product.name || 'VXPS Product');
        if (productUrl) title.href = productUrl;
        details.appendChild(title);

        if (product.description) {
            const description = document.createElement('p');
            description.className = 'mt-1 line-clamp-2 text-[10px] leading-relaxed text-slate-500 dark:text-slate-400';
            description.textContent = String(product.description);
            details.appendChild(description);
        }

        const footer = document.createElement('div');
        footer.className = 'mt-auto flex flex-wrap items-end justify-between gap-2 pt-2';

        const prices = document.createElement('div');
        prices.className = 'flex min-w-0 flex-wrap items-baseline gap-x-1.5 gap-y-0.5';

        if (product.price) {
            const currentPrice = document.createElement('span');
            currentPrice.className = 'text-xs font-extrabold text-slate-900 dark:text-white';
            currentPrice.textContent = String(product.price);
            prices.appendChild(currentPrice);
        } else {
            const priceUnavailable = document.createElement('span');
            priceUnavailable.className = 'text-[10px] text-slate-400';
            priceUnavailable.textContent = 'Price unavailable';
            prices.appendChild(priceUnavailable);
        }

        if (product.compare_at_price) {
            const oldPrice = document.createElement('del');
            oldPrice.className = 'text-[10px] text-slate-400';
            oldPrice.textContent = String(product.compare_at_price);
            prices.appendChild(oldPrice);
        }

        footer.appendChild(prices);

        if (productUrl) {
            const viewLink = document.createElement('a');
            viewLink.href = productUrl;
            viewLink.className = 'shrink-0 rounded-lg bg-emerald-600 px-2.5 py-1.5 text-[10px] font-bold text-white transition hover:bg-emerald-500';
            viewLink.textContent = 'View Product';
            footer.appendChild(viewLink);
        }

        details.appendChild(footer);
        card.appendChild(imageLink);
        card.appendChild(details);
        return card;
    }

    function addMessage(role, text, productCards = []) {
        if (welcome?.isConnected) welcome.remove();

        const row = document.createElement('div');
        row.className = role === 'user'
            ? 'flex justify-end'
            : 'flex w-full flex-col items-start gap-2';

        const bubble = document.createElement('div');
        bubble.className = role === 'user'
            ? 'max-w-[88%] whitespace-pre-wrap break-words rounded-2xl rounded-tr-sm bg-emerald-600 px-3.5 py-3 text-sm leading-relaxed text-white shadow-sm'
            : 'max-w-[96%] whitespace-pre-wrap break-words rounded-2xl rounded-tl-sm border border-slate-200 bg-white px-3.5 py-3 text-sm leading-relaxed text-slate-700 shadow-sm dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200';

        appendTextWithLinks(bubble, String(text ?? ''));
        row.appendChild(bubble);

        if (role === 'assistant' && Array.isArray(productCards) && productCards.length) {
            const cards = document.createElement('div');
            cards.className = 'flex w-full flex-col gap-2';
            productCards.slice(0, 6).forEach(product => {
                if (product && typeof product === 'object') {
                    cards.appendChild(createProductCard(product));
                }
            });
            if (cards.childElementCount) row.appendChild(cards);
        }

        messages.appendChild(row);
        scrollToBottom();
        return row;
    }

    function addTyping() {
        const row = document.createElement('div');
        row.className = 'flex justify-start';
        row.id = 'vxps-chatbot-typing';
        const bubble = document.createElement('div');
        bubble.className = 'rounded-2xl rounded-tl-sm border border-slate-200 bg-white px-4 py-3 text-xs text-slate-500 dark:border-slate-800 dark:bg-slate-950 dark:text-slate-400';
        bubble.textContent = 'VXPS Assistant is typing...';
        row.appendChild(bubble);
        messages.appendChild(row);
        scrollToBottom();
    }

    function removeTyping() {
        document.getElementById('vxps-chatbot-typing')?.remove();
    }

    async function requestJson(url, options = {}) {
        const response = await fetch(url, {
            credentials: 'same-origin',
            ...options,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrf,
                ...(options.headers || {}),
            },
        });

        const data = await response.json().catch(() => ({}));
        if (!response.ok) {
            throw new Error(data.message || 'Something went wrong. Please try again.');
        }
        return data;
    }

    async function loadHistory() {
        if (historyLoaded) return;
        try {
            const data = await requestJson(@json(route('chatbot.history')));
            if (Array.isArray(data.messages) && data.messages.length) {
                welcome?.remove();
                data.messages.forEach(item => addMessage(item.role, item.content, item.products || []));
            }
            historyLoaded = true;
        } catch (error) {
            console.warn('VXPS chatbot history could not be loaded:', error.message);
        }
    }

    function setOpen(isOpen) {
        panel.classList.toggle('hidden', !isOpen);
        panel.classList.toggle('flex', isOpen);
        openIcon.classList.toggle('hidden', isOpen);
        closeIcon.classList.toggle('hidden', !isOpen);
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        if (isOpen) {
            loadHistory();
            setTimeout(() => input.focus(), 80);
        }
    }

    async function sendMessage(message) {
        const cleanMessage = String(message || '').trim();
        if (!cleanMessage || isSending) return;

        isSending = true;
        sendButton.disabled = true;
        input.disabled = true;
        suggestions.classList.add('hidden');
        addMessage('user', cleanMessage);
        addTyping();

        try {
            const data = await requestJson(@json(route('chatbot.send')), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: cleanMessage }),
            });
            removeTyping();
            addMessage('assistant', data.reply || 'I could not prepare a response. Please try again.', data.products || []);
        } catch (error) {
            removeTyping();
            addMessage('assistant', error.message || 'Sorry, the assistant is unavailable right now. Please try again later.');
        } finally {
            isSending = false;
            sendButton.disabled = false;
            input.disabled = false;
            input.focus();
        }
    }

    toggle.addEventListener('click', () => {
        setOpen(panel.classList.contains('hidden'));
    });

    form.addEventListener('submit', event => {
        event.preventDefault();
        const value = input.value;
        input.value = '';
        input.style.height = 'auto';
        sendMessage(value);
    });

    input.addEventListener('keydown', event => {
        if (event.key === 'Enter' && !event.shiftKey) {
            event.preventDefault();
            form.requestSubmit();
        }
    });

    input.addEventListener('input', () => {
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 112) + 'px';
    });

    suggestions.addEventListener('click', event => {
        const button = event.target.closest('[data-suggestion]');
        if (button) sendMessage(button.dataset.suggestion || '');
    });

    newChatButton.addEventListener('click', async () => {
        try {
            await requestJson(@json(route('chatbot.reset')), { method: 'POST' });
            messages.replaceChildren();
            const greeting = document.createElement('div');
            greeting.id = 'vxps-chatbot-welcome';
            greeting.className = 'max-w-[88%] rounded-2xl rounded-tl-sm border border-slate-200 bg-white px-3.5 py-3 text-sm leading-relaxed text-slate-700 shadow-sm dark:border-slate-800 dark:bg-slate-950 dark:text-slate-200';
            greeting.textContent = 'Hello again! 👋 What would you like to explore today?';
            messages.appendChild(greeting);
            suggestions.classList.remove('hidden');
            historyLoaded = true;
        } catch (error) {
            addMessage('assistant', error.message);
        }
    });
})();
</script>
