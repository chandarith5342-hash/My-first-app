<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'TechNews - Tech news in five minutes')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;700;800&family=Public+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #ffffff;
            --surface: #f5f7fb;
            --ink: #131a2b;
            --muted: #5b6479;
            --line: #e3e7ef;
            --accent: #2347ff;
            --accent2: #9b3cff;
            --accent-ink: #ffffff;
            --ok: #0a7a4b;
            --err: #c23a3a;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            --head: "Bricolage Grotesque", "Segoe UI", system-ui, sans-serif;
            --body: "Public Sans", "Segoe UI", system-ui, sans-serif;
        }

        :root[data-theme="dark"] {
            --bg: #0d1220;
            --surface: #151b2c;
            --ink: #eef1f8;
            --muted: #9aa3b8;
            --line: #262e43;
            --accent: #6f86ff;
            --accent2: #c08bff;
            --accent-ink: #0d1220;
            --ok: #4cd39a;
            --err: #ff7b7b;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
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
            font: 400 17px/1.65 var(--body);
            transition: background .3s, color .3s
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

        /* progress bar on top */
        .progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            width: 0;
            z-index: 10;
            background: linear-gradient(90deg, var(--accent), var(--accent2))
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
            height: 64px;
            gap: 16px
        }

        .logo {
            font: 800 22px var(--head);
            letter-spacing: -.03em
        }

        .logo span {
            color: var(--accent)
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 26px;
            font-size: 15px;
            color: var(--muted)
        }

        .menu a:hover {
            color: var(--ink)
        }

        .tools {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: var(--bg);
            color: var(--ink);
            cursor: pointer;
            font-size: 18px
        }

        .icon-btn:hover {
            background: var(--surface)
        }

        .burger {
            display: none
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

        .menu .btn {
            padding: 9px 16px
        }

        /* news ticker */
        .ticker {
            border-bottom: 1px solid var(--line);
            background: var(--surface);
            overflow: hidden;
            font-size: 14px
        }

        .ticker .wrap {
            display: flex;
            align-items: center;
            gap: 14px;
            height: 40px
        }

        .live {
            flex: none;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 700;
            color: var(--err);
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: .08em
        }

        .live::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--err);
            animation: pulse 1.4s infinite
        }

        .track {
            overflow: hidden;
            flex: 1
        }

        .track-in {
            display: inline-flex;
            gap: 48px;
            white-space: nowrap;
            animation: scroll 32s linear infinite;
            color: var(--muted)
        }

        .track:hover .track-in {
            animation-play-state: paused
        }

        @keyframes scroll {
            to {
                transform: translateX(-50%)
            }
        }

        @keyframes pulse {
            50% {
                opacity: .3
            }
        }

        /* Hero */
        .hero {
            padding: 80px 0 72px;
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 56px;
            align-items: center
        }

        .hero h1 {
            font-size: 60px;
            font-weight: 800
        }

        /* gradient text */
        .grad {
            background: linear-gradient(90deg, var(--accent), var(--accent2), var(--accent));
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shine 6s linear infinite
        }

        @keyframes shine {
            to {
                background-position: 200% center
            }
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

        .sub input,
        .field input,
        .field textarea {
            flex: 1 1 220px;
            min-width: 0;
            width: 100%;
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
            color: var(--err)
        }

        /* Top stories box */
        .today {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 8px 24px;
            box-shadow: var(--shadow)
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
            font: 700 18px/1.3 var(--head);
            transition: color .15s
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
            padding: 80px 0
        }

        .head {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 24px;
            flex-wrap: wrap;
            margin-bottom: 32px
        }

        .head h2,
        .title {
            font-size: 36px;
            font-weight: 700
        }

        .eyebrow {
            display: block;
            margin-bottom: 10px;
            font-size: 13px;
            font-weight: 600;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: .08em
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
            border-radius: 16px;
            overflow: hidden;
            background: var(--bg);
            transition: transform .2s, box-shadow .2s, border-color .2s
        }

        .post:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow);
            border-color: var(--accent)
        }

        .thumb {
            height: 140px;
            display: flex;
            align-items: end;
            padding: 14px 18px;
            font: 800 28px var(--head);
            color: rgba(0, 0, 0, 0.25)
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

        /* About */
        .about {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 56px;
            align-items: center
        }

        .about p {
            color: var(--muted);
            margin: 18px 0 0
        }

        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }

        .stat {
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 24px;
            background: var(--surface)
        }

        .stat b {
            display: block;
            font: 800 40px/1 var(--head);
            color: var(--accent)
        }

        .stat span {
            font-size: 14px;
            color: var(--muted)
        }

        /* Contact */
        .contact {
            background: var(--surface);
            border-block: 1px solid var(--line)
        }

        .contact .wrap {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 56px
        }

        .contact .info p {
            color: var(--muted);
            margin: 18px 0 24px
        }

        .contact .info ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            gap: 12px
        }

        .contact .info li {
            display: flex;
            gap: 12px;
            align-items: center
        }

        .contact .info li span {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: var(--bg);
            border: 1px solid var(--line)
        }

        .form {
            background: var(--bg);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 28px;
            display: grid;
            gap: 16px;
            box-shadow: var(--shadow)
        }

        .form .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px
        }

        .field label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px
        }

        .field textarea {
            resize: vertical;
            min-height: 120px
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
            display: flex;
            gap: 20px
        }

        footer a:hover {
            color: var(--ink)
        }

        /* back to top button */
        .to-top {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 6;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 0;
            cursor: pointer;
            background: var(--accent);
            color: var(--accent-ink);
            font-size: 20px;
            box-shadow: var(--shadow);
            opacity: 0;
            pointer-events: none;
            transform: translateY(10px);
            transition: opacity .25s, transform .25s
        }

        .to-top.show {
            opacity: 1;
            pointer-events: auto;
            transform: none
        }

        /* fade in when scrolling */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .7s ease, transform .7s ease
        }

        .reveal.in-view {
            opacity: 1;
            transform: none
        }

        @media (max-width:860px) {

            .hero,
            .about,
            .contact .wrap {
                grid-template-columns: 1fr
            }

            .hero {
                padding-top: 48px
            }

            .hero h1 {
                font-size: 40px
            }

            .cta h2 {
                font-size: 32px
            }

            .grid,
            .why .cols {
                grid-template-columns: 1fr
            }

            .form .row {
                grid-template-columns: 1fr
            }

            .wrap {
                padding: 0 16px
            }

            .burger {
                display: grid
            }

            .menu {
                display: none;
                position: absolute;
                z-index: 3;
                box-shadow: var(--shadow);
                top: 64px;
                left: 0;
                right: 0;
                flex-direction: column;
                align-items: stretch;
                gap: 0;
                padding: 8px 16px 16px;
                background: var(--bg);
                border-bottom: 1px solid var(--line)
            }

            .menu.open {
                display: flex
            }

            .menu a {
                padding: 12px 0;
                border-top: 1px solid var(--line)
            }

            .menu a:first-child {
                border-top: 0
            }

            .menu .btn {
                text-align: center;
                margin-top: 8px;
                padding: 12px
            }
        }

        /* hero animation */
        .hero h1,
        .hero .lead,
        .hero .sub {
            animation: rise .6s ease both
        }

        .hero .lead {
            animation-delay: .08s
        }

        .hero .sub {
            animation-delay: .16s
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(12px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }
    </style>
</head>

<body>

    <div class="progress" id="progress"></div>

    <x-header />

    <!-- news ticker -->
    <div class="ticker">
        <div class="wrap">
            <span class="live">Live</span>
            <div class="track">
                <div class="track-in" id="ticker"></div>
            </div>
        </div>
    </div>

    @yield('content')

    <x-footer />

    <button class="to-top" id="toTop" onclick="window.scrollTo(0, 0)">↑</button>

    <script>
        // ===== news data =====
        let posts = [{
                topic: "AI",
                title: "Open-source models are catching up fast",
                text: "Free models now handle many tasks that needed paid tools a year ago.",
                time: "4 min read",
                color: "#dbe4ff"
            },
            {
                topic: "Web",
                title: "Browsers get smarter about tracking",
                text: "New built-in controls make it easier to keep your browsing private.",
                time: "3 min read",
                color: "#d9f2e6"
            },
            {
                topic: "Security",
                title: "Password managers explained simply",
                text: "What they do, why they are safer, and how to switch in ten minutes.",
                time: "5 min read",
                color: "#ffe3dc"
            },
            {
                topic: "Gadgets",
                title: "Choosing a laptop for coding in 2026",
                text: "RAM, battery life, and screen: the three specs that matter most.",
                time: "6 min read",
                color: "#fff1cc"
            },
            {
                topic: "AI",
                title: "How to use AI tools without losing your skills",
                text: "Practical habits for students and developers who use AI every day.",
                time: "4 min read",
                color: "#e6dcff"
            },
            {
                topic: "Web",
                title: "Why fast websites win more readers",
                text: "A few small changes to images and fonts can cut load time in half.",
                time: "3 min read",
                color: "#d6f0f7"
            }
        ];

        // ===== show the news cards =====
        function showPosts(topic) {
            let grid = document.getElementById("grid");
            if (!grid) return; // this page has no news grid
            grid.innerHTML = "";

            for (let i = 0; i < posts.length; i++) {
                let p = posts[i];

                if (topic == "All" || p.topic == topic) {
                    grid.innerHTML += `
          <div class="post">
            <div class="thumb" style="background:${p.color}">${p.topic}</div>
            <div class="in">
              <span class="tag">${p.topic}</span>
              <h3>${p.title}</h3>
              <p>${p.text}</p>
              <span class="meta">${p.time}</span>
            </div>
          </div>`;
                }
            }

            if (grid.innerHTML == "") {
                grid.innerHTML = "<p class='empty'>No stories in this topic yet.</p>";
            }
        }

        // ===== filter buttons =====
        function filterPosts(topic, button) {
            let chips = document.querySelectorAll(".chip");
            for (let i = 0; i < chips.length; i++) {
                chips[i].classList.remove("active");
            }
            button.classList.add("active");
            showPosts(topic);
        }

        showPosts("All");

        // ===== news ticker =====
        let tickerText = "";
        for (let i = 0; i < posts.length; i++) {
            tickerText += "<span><b>" + posts[i].topic + ":</b> " + posts[i].title + "</span>";
        }
        // add it 2 times so it loops without a gap
        document.getElementById("ticker").innerHTML = tickerText + tickerText;

        // ===== check email =====
        function checkEmail(email) {
            return email.includes("@") && email.includes(".");
        }

        // ===== subscribe forms =====
        function subscribe(event, noteId) {
            event.preventDefault();
            let form = event.target;
            let note = document.getElementById(noteId);

            if (checkEmail(form.email.value) == false) {
                note.className = "note err";
                note.innerHTML = "Please enter a valid email, like you@example.com";
                return;
            }

            note.className = "note ok";
            note.innerHTML = "You're subscribed! Check your inbox tomorrow morning.";
            form.reset();
        }

        // ===== contact form =====
        function sendMessage(event) {
            event.preventDefault();
            let form = document.getElementById("contactForm");
            let note = document.getElementById("contactNote");

            if (form.name.value == "") {
                note.className = "note err";
                note.innerHTML = "Please enter your name.";
                return;
            }
            if (checkEmail(form.email.value) == false) {
                note.className = "note err";
                note.innerHTML = "Please enter a valid email.";
                return;
            }
            if (form.message.value.length < 10) {
                note.className = "note err";
                note.innerHTML = "Your message should be at least 10 characters.";
                return;
            }

            note.className = "note ok";
            note.innerHTML = "Thanks, " + form.name.value + "! We'll reply soon.";
            form.reset();
        }

        // ===== when scrolling the page =====
        function onScroll() {
            // progress bar at the top
            let scrolled = window.scrollY;
            let pageHeight = document.body.scrollHeight - window.innerHeight;
            document.getElementById("progress").style.width = (scrolled / pageHeight) * 100 + "%";

            // show back to top button
            let toTop = document.getElementById("toTop");
            if (scrolled > 600) {
                toTop.classList.add("show");
            } else {
                toTop.classList.remove("show");
            }

            // fade in the sections
            let sections = document.querySelectorAll(".reveal");
            for (let i = 0; i < sections.length; i++) {
                if (sections[i].getBoundingClientRect().top < window.innerHeight - 100) {
                    sections[i].classList.add("in-view");
                }
            }
        }

        window.addEventListener("scroll", onScroll);
        onScroll();
    </script>

    {{-- contact --}}
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
    </style>
</body>

</html>
