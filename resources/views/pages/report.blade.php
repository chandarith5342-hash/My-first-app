@extends('Layouts.user')

@section('title', 'Report us - TechNews')

@section('content')

    <main>
        <div class="wrap page-hero">
            <p class="eyebrow">Report us</p>
            <h1>Found a problem?</h1>
            <p>If you see wrong information, a broken link or bad content on TechNews, please tell us. We check every report.</p>
        </div>

        <div class="wrap report">
            <div class="card">
                <form id="reportForm" onsubmit="sendReport(event)">
                    <div class="field">
                        <label for="type">What do you want to report?</label>
                        <select id="type" name="type">
                            <option value="">-- Choose one --</option>
                            <option>Wrong information in a story</option>
                            <option>Broken link or page</option>
                            <option>Spam or bad content</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="link">Link to the page (optional)</label>
                        <input id="link" name="link" placeholder="http://localhost:8000/news-blog">
                    </div>
                    <div class="field">
                        <label for="details">Details</label>
                        <textarea id="details" name="details" placeholder="Tell us what is wrong..."></textarea>
                    </div>
                    <div class="field">
                        <label for="email">Your email</label>
                        <input id="email" name="email" type="email" placeholder="you@example.com">
                    </div>
                    <label class="check">
                        <input type="checkbox" name="anonymous"> Send without my email
                    </label>
                    <button class="btn" type="submit">Send report</button>
                    <p class="note" id="reportNote"></p>
                </form>
            </div>

            <aside class="info">
                <div class="item"><small>Step 1</small><b>Send your report</b>
                    <p>Tell us what is wrong and where you saw it.</p>
                </div>
                <div class="item"><small>Step 2</small><b>We check it</b>
                    <p>Our team looks at every report within 2 days.</p>
                </div>
                <div class="item"><small>Step 3</small><b>We fix it</b>
                    <p>If something is wrong, we update the story.</p>
                </div>
            </aside>
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

        /* Contact page */
        .page-hero {
            padding: 88px 24px 48px;
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

        .contact {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 48px;
            padding-bottom: 72px;
            align-items: start
        }

        .card {
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 32px;
            background: var(--bg)
        }

        .field {
            margin-bottom: 20px
        }

        .field label {
            display: block;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 6px
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            font: 400 16px var(--body);
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--bg);
            color: var(--ink)
        }

        .field textarea {
            min-height: 140px;
            resize: vertical
        }

        .field.bad input,
        .field.bad select,
        .field.bad textarea {
            border-color: #c23a3a
        }

        .hint {
            display: block;
            min-height: 1.4em;
            font-size: 13px;
            color: #c23a3a;
            margin-top: 4px
        }

        .two {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }

        .info {
            display: grid;
            gap: 16px
        }

        .info .item {
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 20px;
            background: var(--surface)
        }

        .info small {
            display: block;
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px
        }

        .info b {
            font: 700 18px var(--head);
            word-break: break-word
        }

        .info p {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 14px
        }

        .faq {
            max-width: 760px
        }

        .faq details {
            border-top: 1px solid var(--line);
            padding: 18px 0
        }

        .faq details:last-child {
            border-bottom: 1px solid var(--line)
        }

        .faq summary {
            cursor: pointer;
            font: 700 18px var(--head);
            list-style: none;
            display: flex;
            justify-content: space-between;
            gap: 16px
        }

        .faq summary::after {
            content: "+";
            color: var(--accent);
            font-size: 24px;
            line-height: 1
        }

        .faq details[open] summary::after {
            content: "-"
        }

        .faq details p {
            margin: 10px 0 0;
            color: var(--muted)
        }

        @media (max-width:860px) {
            .contact {
                grid-template-columns: 1fr
            }

            .two {
                grid-template-columns: 1fr
            }

            .page-hero {
                padding-top: 56px
            }

            .card {
                padding: 22px
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
        /* Report page */
        .report {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 48px;
            padding-bottom: 72px;
            align-items: start
        }

        .check {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 20px;
            font-size: 15px
        }

        @media (max-width:860px) {
            .report {
                grid-template-columns: 1fr
            }
        }
    </style>
    <script>
        // report form
        function sendReport(event) {
            event.preventDefault();
            let form = document.getElementById("reportForm");
            let note = document.getElementById("reportNote");

            if (form.type.value == "") {
                note.className = "note err";
                note.innerHTML = "Please choose what you want to report.";
                return;
            }
            if (form.details.value.length < 10) {
                note.className = "note err";
                note.innerHTML = "Please write at least 10 characters.";
                return;
            }
            if (form.anonymous.checked == false && form.email.value.includes("@") == false) {
                note.className = "note err";
                note.innerHTML = "Please enter your email, or tick \"Send without my email\".";
                return;
            }

            note.className = "note ok";
            note.innerHTML = "Thank you! We got your report and will check it soon.";
            form.reset();
        }
    </script>
@endsection
