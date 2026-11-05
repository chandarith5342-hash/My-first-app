@extends('Layouts.user')

@section('title', 'All News - TechNews')

@section('content')

    <main>
        <div class="wrap page-hero">
            <p class="eyebrow">Blog</p>
            <h1>All News</h1>
            <p>Every story we have published, all in one place. Pick one and read it in a few minutes.</p>
        </div>

        <div class="wrap news-list">
            <div class="grid">
                <div class="post">
                    <div class="thumb" style="background:#dbe4ff">AI</div>
                    <div class="in">
                        <span class="tag">AI</span>
                        <h3>Open-source models are catching up fast</h3>
                        <p>Free models now handle many tasks that needed paid tools a year ago.</p>
                        <span class="meta">4 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#d9f2e6">Web</div>
                    <div class="in">
                        <span class="tag">Web</span>
                        <h3>Browsers get smarter about tracking</h3>
                        <p>New built-in controls make it easier to keep your browsing private.</p>
                        <span class="meta">3 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#ffe3dc">Security</div>
                    <div class="in">
                        <span class="tag">Security</span>
                        <h3>Password managers explained simply</h3>
                        <p>What they do, why they are safer, and how to switch in ten minutes.</p>
                        <span class="meta">5 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#fff1cc">Gadgets</div>
                    <div class="in">
                        <span class="tag">Gadgets</span>
                        <h3>Choosing a laptop for coding in 2026</h3>
                        <p>RAM, battery life, and screen: the three specs that matter most.</p>
                        <span class="meta">6 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#e6dcff">AI</div>
                    <div class="in">
                        <span class="tag">AI</span>
                        <h3>How to use AI tools without losing your skills</h3>
                        <p>Practical habits for students and developers who use AI every day.</p>
                        <span class="meta">4 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#d6f0f7">Web</div>
                    <div class="in">
                        <span class="tag">Web</span>
                        <h3>Why fast websites win more readers</h3>
                        <p>A few small changes to images and fonts can cut load time in half.</p>
                        <span class="meta">3 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#ffe3dc">Security</div>
                    <div class="in">
                        <span class="tag">Security</span>
                        <h3>How to spot a phishing email</h3>
                        <p>Five simple signs that an email is trying to steal your password.</p>
                        <span class="meta">4 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#fff1cc">Gadgets</div>
                    <div class="in">
                        <span class="tag">Gadgets</span>
                        <h3>Are foldable phones worth it yet?</h3>
                        <p>We look at price, battery and how long the screen really lasts.</p>
                        <span class="meta">5 min read</span>
                    </div>
                </div>

                <div class="post">
                    <div class="thumb" style="background:#d9f2e6">Web</div>
                    <div class="in">
                        <span class="tag">Web</span>
                        <h3>What is Laravel and why do developers like it?</h3>
                        <p>A short look at the PHP framework used by many web developers today.</p>
                        <span class="meta">4 min read</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        :root {
            --bg: #ffffff;
            --surface: #f5f7fb;
            --ink: #131a2b;
            --muted: #5b6479;
            --line: #e3e7ef;
            --accent: #2347ff;
            --accent-ink: #ffffff;
            --ok: #0a7a4b;
            --head: "Bricolage Grotesque", "Segoe UI", system-ui, sans-serif;
            --body: "Public Sans", "Segoe UI", system-ui, sans-serif;
        }

        /* dark mode colors */
        :root[data-theme="dark"] {
            --bg: #0d1220;
            --surface: #151b2c;
            --ink: #eef1f8;
            --muted: #9aa3b8;
            --line: #262e43;
            --accent: #6f86ff;
            --accent-ink: #0d1220;
            --ok: #4cd39a;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font: 400 17px/1.65 var(--body)
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .wrap {
            max-width: 1080px;
            margin: 0 auto;
            padding: 0 24px
        }

        h1,
        h2,
        h3 {
            font-family: var(--head);
            line-height: 1.1;
            margin: 0;
            letter-spacing: -.02em
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            z-index: 5;
            background: var(--bg);
            border-bottom: 1px solid var(--line)
        }

        .bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px
        }

        .logo {
            font: 800 22px var(--head);
            letter-spacing: -.03em
        }

        .logo span {
            color: var(--accent)
        }

        nav {
            display: flex;
            align-items: center;
            gap: 28px;
            font-size: 15px;
            color: var(--muted)
        }

        nav a:hover {
            color: var(--ink)
        }

        .btn {
            display: inline-block;
            border: 0;
            cursor: pointer;
            font: 600 15px var(--body);
            padding: 12px 20px;
            border-radius: 10px;
            background: var(--accent);
            color: var(--accent-ink)
        }

        .btn:hover {
            filter: brightness(1.08)
        }


        nav .btn {
            padding: 9px 16px
        }

        /* Hero */
        .hero {
            padding: 88px 0 72px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 56px;
            align-items: center
        }

        .hero h1 {
            font-size: 60px;
            font-weight: 800
        }

        .hero p.lead {
            font-size: 19px;
            color: var(--muted);
            max-width: 30em;
            margin: 22px 0 32px
        }

        .sub {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            max-width: 460px
        }

        .sub input {
            flex: 1 1 220px;
            min-width: 0;
            font: 400 16px var(--body);
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--bg);
            color: var(--ink)
        }

        .note {
            font-size: 14px;
            color: var(--muted);
            margin: 10px 0 0;
            min-height: 1.6em
        }

        .note.ok {
            color: var(--ok)
        }

        .note.err {
            color: #c23a3a
        }

        /* Today list in hero */
        .today {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 8px 24px
        }

        .today h2 {
            font-size: 15px;
            font-weight: 700;
            color: var(--muted);
            padding: 16px 0 4px;
            letter-spacing: 0
        }

        .today a {
            display: block;
            padding: 16px 0;
            border-top: 1px solid var(--line)
        }

        .today a:first-of-type {
            border-top: 0
        }

        .today b {
            display: block;
            font: 700 18px/1.3 var(--head)
        }

        .today small {
            color: var(--muted);
            font-size: 14px
        }

        .today a:hover b {
            color: var(--accent)
        }

        /* Sections */
        section {
            padding: 72px 0
        }

        .head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 32px
        }

        .head h2 {
            font-size: 36px;
            font-weight: 700
        }

        .chips {
            display: flex;
            gap: 8px;
            flex-wrap: wrap
        }

        .chip {
            font: 500 14px var(--body);
            padding: 8px 16px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: var(--bg);
            color: var(--muted);
            cursor: pointer
        }

        .chip:hover {
            color: var(--ink)
        }

        .chip.active {
            background: var(--ink);
            border-color: var(--ink);
            color: var(--bg)
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px
        }

        .post {
            display: flex;
            flex-direction: column;
            border: 1px solid var(--line);
            border-radius: 14px;
            overflow: hidden;
            background: var(--bg)
        }

        .post:hover {
            border-color: var(--accent)
        }

        .thumb {
            height: 140px
        }

        .post .in {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1
        }

        .tag {
            font-size: 13px;
            font-weight: 600;
            color: var(--accent)
        }

        .post h3 {
            font-size: 20px;
            font-weight: 700;
            line-height: 1.25
        }

        .post p {
            margin: 0;
            font-size: 15px;
            color: var(--muted)
        }

        .meta {
            margin-top: auto;
            font-size: 13px;
            color: var(--muted)
        }

        .empty {
            grid-column: 1/-1;
            color: var(--muted)
        }

        /* Why */
        .why {
            background: var(--surface);
            border-block: 1px solid var(--line)
        }

        .why .cols {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px
        }

        .why h3 {
            font-size: 21px;
            margin-bottom: 8px
        }

        .why p {
            margin: 0;
            color: var(--muted);
            font-size: 16px
        }

        /* CTA */
        .cta {
            text-align: center
        }

        .cta h2 {
            font-size: 42px;
            font-weight: 800;
            max-width: 15em;
            margin: 0 auto 16px
        }

        .cta p {
            color: var(--muted);
            margin: 0 auto 28px;
            max-width: 30em
        }

        .cta .sub {
            margin: 0 auto;
            justify-content: center
        }

        footer {
            border-top: 1px solid var(--line);
            padding: 32px 0;
            font-size: 14px;
            color: var(--muted)
        }

        footer .wrap {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap
        }

        footer nav {
            gap: 20px;
            font-size: 14px
        }

        @media (max-width:860px) {
            .hero {
                grid-template-columns: 1fr;
                padding-top: 56px
            }

            .grid,
            .why .cols {
                grid-template-columns: 1fr
            }

        }

        /* About page */
        .page-hero {
            padding: 88px 24px 56px;
            max-width: 760px
        }

        .page-hero h1 {
            font-size: 56px;
            font-weight: 800
        }

        .page-hero p {
            font-size: 19px;
            color: var(--muted);
            margin: 22px 0 0
        }

        .eyebrow {
            font-size: 14px;
            font-weight: 600;
            color: var(--accent);
            margin: 0 0 14px
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            padding-bottom: 72px
        }

        .stat {
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px
        }

        .stat b {
            display: block;
            font: 800 40px var(--head);
            letter-spacing: -.03em
        }

        .stat span {
            color: var(--muted);
            font-size: 15px
        }

        .story {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 56px
        }

        .story h2 {
            font-size: 36px;
            font-weight: 700
        }

        .story p {
            margin: 0 0 16px;
            color: var(--muted)
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            counter-reset: s
        }

        .step {
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px;
            background: var(--bg)
        }

        .step::before {
            counter-increment: s;
            content: counter(s);
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--accent);
            color: var(--accent-ink);
            font: 700 16px var(--head);
            margin-bottom: 16px
        }

        .step h3 {
            font-size: 20px;
            margin-bottom: 8px
        }

        .step p {
            margin: 0;
            font-size: 15px;
            color: var(--muted)
        }

        .team {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px
        }

        .member {
            text-align: left
        }

        .avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font: 700 24px var(--head);
            margin-bottom: 14px
        }

        .member h3 {
            font-size: 19px
        }

        .member p {
            margin: 2px 0 0;
            font-size: 15px;
            color: var(--muted)
        }

        @media (max-width:860px) {

            .stats,
            .steps,
            .team,
            .story {
                grid-template-columns: 1fr
            }

            .story {
                gap: 24px
            }

            .page-hero {
                padding-top: 56px
            }
        }
        /* Header buttons (from landing) */
        .tools { display: flex; align-items: center; gap: 8px }
        .icon-btn { width: 40px; height: 40px; display: grid; place-items: center; border: 1px solid var(--line); border-radius: 10px; background: var(--bg); color: var(--ink); cursor: pointer; font-size: 18px }
        .icon-btn:hover { background: var(--surface) }
        .burger { display: none }
        /* menu for phone */
        @media (max-width:860px) {
            .burger { display: grid }
            .menu { display: none; position: absolute; top: 64px; left: 0; right: 0; z-index: 3; flex-direction: column; align-items: stretch; gap: 0; padding: 8px 16px 16px; background: var(--bg); border-bottom: 1px solid var(--line) }
            .menu.open { display: flex }
            .menu a { display: block; padding: 12px 0; border-top: 1px solid var(--line) }
            .menu a:first-child { border-top: 0 }
            .menu .btn { text-align: center; margin-top: 8px }
        }
        /* All News page */
        .news-list {
            padding-bottom: 72px
        }

        .news-list .thumb {
            display: flex;
            align-items: end;
            padding: 14px 18px;
            font: 800 28px var(--head);
            color: rgba(0, 0, 0, 0.25)
        }
    </style>
@endsection
