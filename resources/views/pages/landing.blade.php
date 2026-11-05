@extends('Layouts.user')

@section('content')

    <main id="top">
        <div class="wrap hero">
            <div>
                <h1>{{ $title }}, {{ $subtitle }}</h1>
                <p class="lead">We gather stories from trusted sources every day, cut the noise, and give you a short,
                    clear summary of each one.</p>
                <form class="sub" onsubmit="subscribe(event, 'note1')">
                    <input type="email" name="email" placeholder="you@example.com">
                    <button class="btn" type="submit">Get the daily digest</button>
                </form>
                <p class="note" id="note1">Free. One email a day. Unsubscribe anytime.</p>
            </div>
            <x-aside />
        </div>

        <section id="latest" class="wrap reveal">
            <div class="head">
                <h2>Latest stories</h2>
                <div class="chips">
                    <button class="chip active" onclick="filterPosts('All', this)">All</button>
                    <button class="chip" onclick="filterPosts('AI', this)">AI</button>
                    <button class="chip" onclick="filterPosts('Web', this)">Web</button>
                    <button class="chip" onclick="filterPosts('Security', this)">Security</button>
                    <button class="chip" onclick="filterPosts('Gadgets', this)">Gadgets</button>
                </div>
            </div>
            <div class="grid" id="grid"></div>
        </section>

        <section id="why" class="why">
            <div class="wrap cols reveal">
                <div>
                    <h3>Short by design</h3>
                    <p>Every story is summarised in a few lines. You get the point first, then choose whether to read
                        more.</p>
                </div>
                <div>
                    <h3>Updated automatically</h3>
                    <p>New articles arrive from trusted feeds throughout the day, so the page is never out of date.</p>
                </div>
                <div>
                    <h3>Easy to read anywhere</h3>
                    <p>Clean pages with large text that load fast on a phone, a laptop, or a slow connection.</p>
                </div>
            </div>
        </section>

        <section id="about" class="wrap about reveal">
            <div>
                <span class="eyebrow">About us</span>
                <h2 class="title">A small team that reads the internet so you don't have to.</h2>
                <p>TechNews started as a student project with one simple idea: busy people still want to understand
                    technology. Every morning we pick the most important stories, check the facts, and explain them in
                    plain words.</p>
                <p>No clickbait, no long articles, just what happened and why it matters to you.</p>
            </div>
            <div class="stats">
                <div class="stat"><b>12,000+</b><span>daily readers</span></div>
                <div class="stat"><b>350</b><span>stories each month</span></div>
                <div class="stat"><b>5</b><span>minutes to read</span></div>
                <div class="stat"><b>24</b><span>trusted sources</span></div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="wrap reveal">
                <div class="info">
                    <span class="eyebrow">Contact</span>
                    <h2 class="title">Have a story tip or a question?</h2>
                    <p>Send us a message and we'll reply within one working day.</p>
                    <ul>
                        <li><span>✉️</span> hello@technews.example</li>
                        <li><span>📍</span> Phnom Penh, Cambodia</li>
                        <li><span>🕘</span> Mon - Fri, 8:00 - 17:00</li>
                    </ul>
                </div>
                <form class="form" id="contactForm" onsubmit="sendMessage(event)">
                    <div class="row">
                        <div class="field">
                            <label>Name</label>
                            <input name="name" placeholder="Your name">
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input name="email" type="email" placeholder="you@example.com">
                        </div>
                    </div>
                    <div class="field">
                        <label>Message</label>
                        <textarea name="message" placeholder="Write your message..."></textarea>
                    </div>
                    <button class="btn" type="submit">Send message</button>
                    <p class="note" id="contactNote"></p>
                </form>
            </div>
        </section>

        <section id="subscribe" class="cta wrap reveal">
            <h2>Start your morning with one email</h2>
            <p>Join readers who catch up on technology before their first coffee.</p>
            <form class="sub" onsubmit="subscribe(event, 'note2')">
                <input type="email" name="email" placeholder="you@example.com">
                <button class="btn" type="submit">Subscribe</button>
            </form>
            <p class="note" id="note2"></p>
        </section>
    </main>

@endsection


