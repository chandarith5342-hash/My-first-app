@props ([
    'Campus' => 'Life University',
    'Room' => 'B02',
])

@extends('Layouts.user')

@section('content')
    <style>
        /* ===== Profile page ===== */
        .profile {
            padding: 64px 0 96px;
            background:
                radial-gradient(circle at 10% 0%, rgba(35, 71, 255, .08), transparent 45%),
                radial-gradient(circle at 90% 100%, rgba(155, 60, 255, .08), transparent 45%);
        }

        .profile-card {
            max-width: 860px;
            margin: 0 auto;
            border: 1px solid var(--line);
            border-radius: 24px;
            overflow: hidden;
            background: var(--bg);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04), var(--shadow);
            animation: rise .6s ease both
        }

        /* cover banner with a soft grid pattern */
        .profile-cover {
            position: relative;
            height: 170px;
            background:
                linear-gradient(rgba(255, 255, 255, .08) 1px, transparent 1px) 0 0 / 28px 28px,
                linear-gradient(90deg, rgba(255, 255, 255, .08) 1px, transparent 1px) 0 0 / 28px 28px,
                linear-gradient(120deg, var(--accent), var(--accent2));
        }

        .cover-tag {
            position: absolute;
            top: 20px;
            right: 24px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #fff;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            border: 1px solid rgba(255, 255, 255, .35);
            backdrop-filter: blur(6px)
        }

        .profile-body {
            padding: 0 40px 40px
        }

        /* avatar + name row */
        .profile-top {
            display: flex;
            align-items: flex-end;
            gap: 24px;
            flex-wrap: wrap
        }

        .avatar {
            position: relative;
            flex: none;
            width: 128px;
            height: 128px;
            margin-top: -64px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font: 800 44px var(--head);
            letter-spacing: -.02em;
            color: #fff;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            border: 6px solid var(--bg);
            box-shadow: 0 8px 24px rgba(35, 71, 255, .3)
        }

        /* green "online" dot */
        .avatar::after {
            content: "";
            position: absolute;
            right: 6px;
            bottom: 6px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--ok);
            border: 4px solid var(--bg)
        }

        .profile-name {
            flex: 1;
            min-width: 220px;
            padding-top: 16px
        }

        .profile-name h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 38px;
            font-weight: 800
        }

        /* blue check after the name */
        .verified {
            width: 26px;
            height: 26px;
            flex: none;
            color: var(--accent)
        }

        .profile-name p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 17px
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 999px;
            color: var(--ok);
            background: rgba(10, 122, 75, .1);
            border: 1px solid rgba(10, 122, 75, .25)
        }

        .status::before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--ok)
        }

        /* small info line under the name */
        .meta-line {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 22px;
            margin-top: 22px;
            padding: 16px 0;
            border-block: 1px solid var(--line);
            color: var(--muted);
            font-size: 15px
        }

        .meta-line span {
            display: inline-flex;
            align-items: center;
            gap: 8px
        }

        .meta-line svg {
            width: 18px;
            height: 18px;
            color: var(--accent)
        }

        /* sections */
        .section-title {
            margin: 32px 0 14px;
            font: 700 13px var(--body);
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--muted)
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px
        }

        .detail {
            display: flex;
            align-items: center;
            gap: 16px;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 18px 20px;
            background: var(--surface);
            transition: border-color .2s, transform .2s, box-shadow .2s
        }

        .detail:hover {
            border-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(35, 71, 255, .12)
        }

        .detail .icon {
            flex: none;
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            color: var(--accent);
            background: var(--bg);
            border: 1px solid var(--line)
        }

        .detail .icon svg {
            width: 22px;
            height: 22px
        }

        .detail small {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .08em;
            margin-bottom: 2px
        }

        .detail b {
            font: 700 19px var(--head);
            word-break: break-word
        }

        @media (max-width: 600px) {
            .profile {
                padding: 32px 0 56px
            }

            .profile-cover {
                height: 130px
            }

            .profile-body {
                padding: 0 20px 28px
            }

            .avatar {
                width: 104px;
                height: 104px;
                margin-top: -52px;
                font-size: 36px
            }

            .profile-name {
                padding-top: 0
            }

            .profile-name h1 {
                font-size: 28px
            }

            .details {
                grid-template-columns: 1fr
            }
        }
    </style>

    <main class="profile">
        <div class="wrap">
            <div class="profile-card">

                <div class="profile-cover">
                    <span class="cover-tag">Student Profile</span>
                </div>

                <div class="profile-body">

                    <div class="profile-top">
                        <div class="avatar">{{ substr($firstName, 0, 1) }}{{ substr($lastName, 0, 1) }}</div>

                        <div class="profile-name">
                            <h1>
                                {{ $fullName }}
                                <svg class="verified" viewBox="0 0 24 24" fill="currentColor" aria-label="Verified">
                                    <path d="M12 2l2.4 1.8 3-.2 1 2.8 2.6 1.6-.8 2.9.8 2.9-2.6 1.6-1 2.8-3-.2L12 22l-2.4-1.8-3 .2-1-2.8-2.6-1.6.8-2.9-.8-2.9 2.6-1.6 1-2.8 3 .2z" />
                                    <path d="M8 12.5l2.5 2.5L16 9.5" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </h1>
                            <p>Student of {{ $major }}</p>
                        </div>

                        <span class="status">Active student</span>
                    </div>

                    <div class="meta-line">
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-6h6v6" /></svg>
                            {{ $Campus }}
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2" /><path d="M15 12h.01" /></svg>
                            Room {{ $Room }}
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V5a2 2 0 0 1 2-2h12v18H6a2 2 0 0 1-2-2zM8 7h6" /></svg>
                            {{ $subjects }}
                        </span>
                    </div>

                    <h2 class="section-title">Personal information</h2>
                    <div class="details">
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4" /><path d="M4 21a8 8 0 0 1 16 0" /></svg>
                            </div>
                            <div>
                                <small>First name</small>
                                <b>{{ $firstName }}</b>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4" /><path d="M4 21a8 8 0 0 1 16 0" /></svg>
                            </div>
                            <div>
                                <small>Last name</small>
                                <b>{{ $lastName }}</b>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title">Academic information</h2>
                    <div class="details">
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9l10-5 10 5-10 5z" /><path d="M6 11v5c0 1.5 3 3 6 3s6-1.5 6-3v-5" /></svg>
                            </div>
                            <div>
                                <small>Major</small>
                                <b>{{ $major }}</b>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V5a2 2 0 0 1 2-2h12v18H6a2 2 0 0 1-2-2zM8 7h6" /></svg>
                            </div>
                            <div>
                                <small>Subject</small>
                                <b>{{ $subjects }}</b>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-6h6v6" /></svg>
                            </div>
                            <div>
                                <small>Campus</small>
                                <b>{{ $Campus }}</b>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2" /><path d="M15 12h.01" /></svg>
                            </div>
                            <div>
                                <small>Room</small>
                                <b>{{ $Room }}</b>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
