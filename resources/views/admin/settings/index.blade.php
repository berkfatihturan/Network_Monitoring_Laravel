@extends('layouts.adminbase')

@section('title', 'Admin Panel')

@section('head')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");

        a, abbr, acronym, address, applet, article, aside, audio, b, big, blockquote, body, canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, em, embed, fieldset, figcaption, figure, footer, form, h1, h2, h3, h4, h5, h6, header, hgroup, html, i, iframe, img, ins, kbd, label, legend, li, mark, menu, nav, object, ol, output, p, pre, q, ruby, s, samp, section, small, span, strike, strong, sub, summary, sup, table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: initial
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
            display: block
        }


        blockquote, q {
            quotes: none
        }

        blockquote:after, blockquote:before, q:after, q:before {
            content: "";
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        .nice-form-group {
            --nf-input-size: 1rem;
            --nf-input-font-size: calc(var(--nf-input-size) * 0.875);
            --nf-small-font-size: calc(var(--nf-input-size) * 0.875);
            --nf-input-font-family: inherit;
            --nf-label-font-family: inherit;
            --nf-input-color: #20242f;
            --nf-input-border-radius: 0.25rem;
            --nf-input-placeholder-color: #929292;
            --nf-input-border-color: #c0c4c9;
            --nf-input-border-width: 1px;
            --nf-input-border-style: solid;
            --nf-input-border-bottom-width: 2px;
            --nf-input-focus-border-color: #3b4ce2;
            --nf-input-background-color: #f9fafb;
            --nf-invalid-input-border-color: var(--nf-input-border-color);
            --nf-invalid-input-background-color: var(--nf-input-background-color);
            --nf-invalid-input-color: var(--nf-input-color);
            --nf-valid-input-border-color: var(--nf-input-border-color);
            --nf-valid-input-background-color: var(--nf-input-background-color);
            --nf-valid-input-color: inherit;
            --nf-invalid-input-border-bottom-color: red;
            --nf-valid-input-border-bottom-color: green;
            --nf-label-font-size: var(--nf-small-font-size);
            --nf-label-color: #374151;
            --nf-label-font-weight: 500;
            --nf-slider-track-background: #dfdfdf;
            --nf-slider-track-height: 0.25rem;
            --nf-slider-thumb-size: calc(var(--nf-slider-track-height) * 4);
            --nf-slider-track-border-radius: var(--nf-slider-track-height);
            --nf-slider-thumb-border-width: 2px;
            --nf-slider-thumb-border-focus-width: 1px;
            --nf-slider-thumb-border-color: #fff;
            --nf-slider-thumb-background: var(--nf-input-focus-border-color);
            display: block;
            margin-top: calc(var(--nf-input-size) * 1.5);
            line-height: 1;
            white-space: nowrap;
            --switch-orb-size: var(--nf-input-size);
            --switch-orb-offset: calc(var(--nf-input-border-width) * 2);
            --switch-width: calc(var(--nf-input-size) * 2.5);
            --switch-height: calc(var(--nf-input-size) * 1.25 + var(--switch-orb-offset))
        }

        .nice-form-group > label {
            font-weight: var(--nf-label-font-weight);
            display: block;
            color: var(--nf-label-color);
            font-size: var(--nf-label-font-size);
            font-family: var(--nf-label-font-family);
            margin-bottom: calc(var(--nf-input-size) / 2);
            white-space: normal
        }

        .nice-form-group > label + small {
            font-style: normal
        }

        .nice-form-group small {
            font-family: var(--nf-input-font-family);
            display: block;
            font-weight: 400;
            opacity: .75;
            font-size: var(--nf-small-font-size);
            margin-bottom: calc(var(--nf-input-size) * 0.75)
        }

        .nice-form-group small:last-child {
            margin-bottom: 0
        }

        .nice-form-group > legend {
            font-weight: var(--nf-label-font-weight);
            display: block;
            color: var(--nf-label-color);
            font-size: var(--nf-label-font-size);
            font-family: var(--nf-label-font-family);
            margin-bottom: calc(var(--nf-input-size) / 5)
        }

        .nice-form-group > .nice-form-group {
            margin-top: calc(var(--nf-input-size) / 2)
        }

        .nice-form-group > input[type=checkbox], .nice-form-group > input[type=date], .nice-form-group > input[type=email], .nice-form-group > input[type=month], .nice-form-group > input[type=number], .nice-form-group > input[type=password], .nice-form-group > input[type=radio], .nice-form-group > input[type=search], .nice-form-group > input[type=tel], .nice-form-group > input[type=text], .nice-form-group > input[type=time], .nice-form-group > input[type=url], .nice-form-group > input[type=week], .nice-form-group > select, .nice-form-group > textarea {
            background: var(--nf-input-background-color);
            font-family: inherit;
            font-size: var(--nf-input-font-size);
            border-bottom-width: var(--nf-input-border-width);
            font-family: var(--nf-input-font-family);
            box-shadow: none;
            border-radius: var(--nf-input-border-radius);
            border: var(--nf-input-border-width) var(--nf-input-border-style) var(--nf-input-border-color);
            border-bottom: var(--nf-input-border-bottom-width) var(--nf-input-border-style) var(--nf-input-border-color);
            color: var(--nf-input-color);
            width: 100%;
            padding: calc(var(--nf-input-size) * 0.75);
            height: calc(var(--nf-input-size) * 2.75);
            line-height: normal;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            transition: all .15s ease-out;
            --icon-padding: calc(var(--nf-input-size) * 2.25);
            --icon-background-offset: calc(var(--nf-input-size) * 0.75)
        }


        .nice-form-group > input[type=email][class^=icon] {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-at-sign'%3E%3Ccircle cx='12' cy='12' r='4'/%3E%3Cpath d='M16 8v5a3 3 0 006 0v-1a10 10 0 10-3.92 7.94'/%3E%3C/svg%3E");
            background-repeat: no-repeat
        }


        .nice-form-group > input[type=color] {
            border: var(--nf-input-border-width) solid var(--nf-input-border-color);
            border-bottom-width: var(--nf-input-border-bottom-width);
            height: calc(var(--nf-input-size) * 2);
            border-radius: var(--nf-input-border-radius);
            padding: calc(var(--nf-input-border-width) * 2)
        }

        .nice-form-group > input[type=color]:focus {
            outline: none;
            border-color: var(--nf-input-focus-border-color)
        }

        .nice-form-group > input[type=color]::-webkit-color-swatch-wrapper {
            padding: 5%
        }

        .nice-form-group > input[type=color]::-moz-color-swatch {
            border-radius: calc(var(--nf-input-border-radius) / 2);
            border: none
        }

        .nice-form-group > input[type=color]::-webkit-color-swatch {
            border-radius: calc(var(--nf-input-border-radius) / 2);
            border: none
        }


        @-moz-document url-prefix() {
            .nice-form-group > input[type=date], .nice-form-group > input[type=month], .nice-form-group > input[type=time], .nice-form-group > input[type=week] {
                min-width: auto;
                width: auto;
                background-image: none
            }
        }

        .nice-form-group > textarea {
            height: auto
        }

        .nice-form-group > input[type=checkbox], .nice-form-group > input[type=radio] {
            width: var(--nf-input-size);
            height: var(--nf-input-size);
            padding: inherit;
            margin: 0;
            display: inline-block;
            vertical-align: top;
            border-radius: calc(var(--nf-input-border-radius) / 2);
            border-width: var(--nf-input-border-width);
            cursor: pointer;
            background-position: 50%
        }

        .nice-form-group > input[type=checkbox]:focus:not(:checked), .nice-form-group > input[type=radio]:focus:not(:checked) {
            border: var(--nf-input-border-width) solid var(--nf-input-focus-border-color);
            outline: none
        }

        .nice-form-group > input[type=checkbox]:hover, .nice-form-group > input[type=radio]:hover {
            border: var(--nf-input-border-width) solid var(--nf-input-focus-border-color)
        }

        .nice-form-group > input[type=checkbox] + label, .nice-form-group > input[type=radio] + label {
            display: inline-block;
            margin-bottom: 0;
            padding-left: calc(var(--nf-input-size) / 2.5);
            font-weight: 400;
            -webkit-user-select: none;
            user-select: none;
            cursor: pointer;
            max-width: calc(100% - var(--nf-input-size) * 2);
            line-height: normal
        }

        .nice-form-group > input[type=checkbox] + label > small, .nice-form-group > input[type=radio] + label > small {
            margin-top: calc(var(--nf-input-size) / 4)
        }

        .nice-form-group > input[type=checkbox]:checked {
            background: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23FFF' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'%3E%3Cpath d='M20 6L9 17l-5-5'/%3E%3C/svg%3E") no-repeat 50%/85%;
            background-color: var(--nf-input-focus-border-color);
            border-color: var(--nf-input-focus-border-color)
        }

        .nice-form-group > input[type=radio] {
            border-radius: 100%
        }

        .nice-form-group > input[type=radio]:checked {
            background-color: var(--nf-input-focus-border-color);
            border-color: var(--nf-input-focus-border-color);
            box-shadow: inset 0 0 0 3px #fff
        }

        .nice-form-group > input[type=checkbox].switch {
            width: var(--switch-width);
            height: var(--switch-height);
            border-radius: var(--switch-height);
            position: relative
        }

        .nice-form-group > input[type=checkbox].switch:after {
            background: var(--nf-input-border-color);
            border-radius: var(--switch-orb-size);
            height: var(--switch-orb-size);
            left: var(--switch-orb-offset);
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            width: var(--switch-orb-size);
            content: "";
            transition: all .2s ease-out
        }

        .nice-form-group > input[type=checkbox].switch + label {
            margin-top: calc(var(--switch-height) / 8)
        }

        .nice-form-group > input[type=checkbox].switch:checked {
            background: none;
            background-position: 0 0;
            background-color: var(--nf-input-focus-border-color)
        }

        .nice-form-group > input[type=checkbox].switch:checked:after {
            -webkit-transform: translateY(-50%) translateX(calc(var(--switch-width) / 2 - var(--switch-orb-offset)));
            transform: translateY(-50%) translateX(calc(var(--switch-width) / 2 - var(--switch-orb-offset)));
            background: #fff
        }

        .nice-form-group > input[type=file] {
            background: rgba(0, 0, 0, .025);
            padding: var(--nf-input-size);
            display: block;
            width: 100%;
            border-radius: var(--nf-input-border-radius);
            border: 1px dashed var(--nf-input-border-color);
            outline: none;
            cursor: pointer
        }

        .nice-form-group > input[type=file]:focus, .nice-form-group > input[type=file]:hover {
            border-color: var(--nf-input-focus-border-color)
        }

        .nice-form-group > input[type=file]::file-selector-button {
            background: var(--nf-input-focus-border-color);
            border: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: .5rem;
            border-radius: var(--nf-input-border-radius);
            color: #fff;
            margin-right: 1rem;
            outline: none;
            font-family: var(--nf-input-font-family);
            cursor: pointer
        }

        .nice-form-group > input[type=file]::-webkit-file-upload-button {
            background: var(--nf-input-focus-border-color);
            border: 0;
            -webkit-appearance: none;
            appearance: none;
            padding: .5rem;
            border-radius: var(--nf-input-border-radius);
            color: #fff;
            margin-right: 1rem;
            outline: none;
            font-family: var(--nf-input-font-family);
            cursor: pointer
        }

        .nice-form-group > select {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-down'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-position: right calc(var(--nf-input-size) * 0.75) bottom 50%;
            background-repeat: no-repeat;
            background-size: var(--nf-input-size)
        }

        *, :after, :before {
            box-sizing: inherit
        }

        html {
            font-size: 16px;
            box-sizing: border-box
        }

        body {
            background: #f3f0e7;
            font-family: Roboto, sans-serif;
            color: #4b5563;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .form-page {
            margin: 0;
            display: -webkit-flex;
            display: flex;

        }

        .form-page .form-page-navigation {
            width: 18em;
            padding: 2em 1em
        }

        @media only screen and (max-width: 750px) {
            .form-page .form-page-navigation {
                display: none
            }
        }

        .form-page .form-page-navigation nav {
            position: -webkit-sticky;
            position: sticky;
            top: 2em;
            background: #fff;
            padding: .5em;
            border-radius: .75rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)
        }

        .form-page .form-page-navigation a {
            display: -webkit-flex;
            display: flex;
            padding: .75em 1em;
            text-decoration: none;
            border-radius: .25em;
            color: #374151;
            -webkit-align-items: center;
            align-items: center
        }

        .form-page .form-page-navigation a:hover {
            background: #f3f4f6
        }

        .form-page .form-page-navigation a svg {
            width: 1.25em;
            height: 1.25em;
            margin-right: 1em;
            color: #1f2937
        }

        .form-page .form-page-content {
            margin: 0;
            padding: 0;
            padding: 2em 1em;
            max-width: 100%
        }

        @media only screen and (min-width: 750px) {
            .form-page .form-page-content {
                width: calc(100% - 18em)
            }
        }

        footer {
            text-align: center;
            margin: 2.5em 0
        }

        .href-target {
            position: absolute;
            top: -2em
        }

        .to-repo, .to-reset {
            display: -webkit-inline-flex;
            display: inline-flex;
            background: #24292e;
            color: #fff;
            border-radius: 5px;
            padding: .5em 1em;
            text-decoration: none;
            -webkit-align-items: center;
            align-items: center;
            transition: background .2s ease-out
        }

        .to-repo:hover, .to-reset:hover {
            background: #000
        }

        .to-repo svg, .to-reset svg {
            width: 1.125rem;
            height: 1.125rem;
            margin-right: .75em
        }

        .to-reset {
            background: #3b4ce2
        }

        .to-reset:hover {
            background: #2538df
        }

        section {
            background: #fff;
            padding: 2em;
            border-radius: .75rem;
            line-height: 1.6;
            overflow: hidden;
            margin-bottom: 2rem;
            position: relative;
            font-size: .875rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)
        }

        section h1 {
            font-weight: 500;
            font-size: 1.25rem;
            color: #000;
            margin-bottom: .75rem
        }

        section h1 svg {
            width: 1em;
            height: 1em;
            display: inline-block;
            vertical-align: -10%;
            margin-right: .25em
        }

        section h1.package-name {
            font-size: 2rem;
            margin-bottom: .75rem;
            margin-top: -.5rem
        }

        section strong {
            font-weight: 500;
            color: #000
        }

        section p {
            margin: .5rem 0 1.5rem
        }

        section p a {
            text-decoration: none;
            font-weight: 500;
            color: #3b4ce2
        }

        section p:last-child {
            margin-bottom: 0
        }

        section code {
            font-weight: 500;
            font-family: Consolas, monaco, monospace;
            position: relative;
            z-index: 1;
            margin: 0 2px;
            background: #f3f4f4;
            content: "";
            border-radius: 3px;
            padding: 2px 5px;
            white-space: nowrap
        }

        section ul {
            margin-top: .5em;
            padding-left: 1em;
            list-style-type: disc
        }

        details {
            background: #f1f1f1;
            margin: 2em -2em -2em;
            padding: 1.5em 2em
        }

        details .gist {
            margin-top: 1.5em
        }

        details .toggle-code {
            display: inline-block;
            padding: .5em 1em;
            border-radius: 5px;
            font-size: .875rem;
            background: #10b981;
            top: 1em;
            right: 1em;
            color: #fff;
            font-weight: 500;
            -webkit-user-select: none;
            user-select: none;
            cursor: pointer
        }

        details .toggle-code:hover {
            background: #0ea271
        }

        details .toggle-code svg {
            display: inline-block;
            vertical-align: -15%;
            margin-right: .25em
        }

        details summary {
            outline: none;
            list-style-type: none
        }

        details summary::marker {
            display: none
        }

        details summary::-webkit-details-marker {
            display: none
        }


    </style>

@endsection

@section('content')

    <div class="section_header">
        <h1 id="admin_section_title">SETTINGS</h1>
    </div>

    <form action="{{route('admin_settings_update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-page">
            <main class="form-page-content">

                <section>
                    <div class="href-target" id="input-types"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 48c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16h80V400c0-26.5 21.5-48 48-48s48 21.5 48 48v64h80c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64zM0 64C0 28.7 28.7 0 64 0H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm88 40c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V104zM232 88h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V104c0-8.8 7.2-16 16-16zM88 232c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H104c-8.8 0-16-7.2-16-16V232zm144-16h48c8.8 0 16 7.2 16 16v48c0 8.8-7.2 16-16 16H232c-8.8 0-16-7.2-16-16V232c0-8.8 7.2-16 16-16z"/></svg>
                        Company
                    </h1>
                    <p>Enter information about the company</p>

                    <div class="nice-form-group">
                        <label>Company Name</label>
                        <input type="text" name="company_name" value="{{$settingsData['company_name']}}"/>
                    </div>

                    <div class="nice-form-group">
                        <label>Logo</label>
                        <input type="file" name="logo">
                    </div>

                </section>


                <section>
                    <div class="href-target" id="input-types"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
                        Mail Notification
                    </h1>
                    <p>Set the sender e-mail address</p>

                    <div class="nice-form-group">
                        <label>Email</label>
                        <input type="text" name="from_email_address" value="{{$settingsData['from_email_address']}}"/>

                    </div>

                    <div class="nice-form-group">
                        <label>Mail Application Key</label>
                        <input type="text" name="mail_app_password" value="{{$settingsData['mail_app_password']}}"/>
                    </div>

                    @error('error')

                    <details style="background: #E64040">
                        <summary>

                            <strong style="color: white; font-size: 1.2rem; font-weight: 500">{{$message}}<span id="countdown" style="color: white"></span></strong>

                            <script>
                                // counter for id=countdown
                                const targetDate = new Date().getTime() + 5000; // 5000 ms = 5 s
                                function updateCountdown() {
                                    const now = new Date().getTime();
                                    const timeRemaining = targetDate - now;

                                    if (timeRemaining <= 0) {
                                        window.location.href = "{{route('admin_settings_restarting')}}";
                                    } else {
                                        const seconds = Math.floor(timeRemaining / 1000);
                                        document.getElementById("countdown").innerHTML = " "+seconds;
                                    }
                                }
                                updateCountdown();
                                setInterval(updateCountdown, 1000);
                            </script>

                        </summary>

                    </details>


                    @enderror
                </section>


                <section>
                    <div class="href-target" id="input-types"></div>
                    <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M339.3 367.1c27.3-3.9 51.9-19.4 67.2-42.9L568.2 74.1c12.6-19.5 9.4-45.3-7.6-61.2S517.7-4.4 499.1 9.6L262.4 187.2c-24 18-38.2 46.1-38.4 76.1L339.3 367.1zm-19.6 25.4l-116-104.4C143.9 290.3 96 339.6 96 400c0 3.9 .2 7.8 .6 11.6C98.4 429.1 86.4 448 68.8 448H64c-17.7 0-32 14.3-32 32s14.3 32 32 32H208c61.9 0 112-50.1 112-112c0-2.5-.1-5-.2-7.5z"/></svg>
                        Customization
                    </h1>
                    <p>Customization to your page</p>

                    <div class="nice-form-group">
                        <label>Primary color</label>
                        <input type="color" name="primary_color" value="{{$settingsData['primary_color']}}">
                    </div>

                    <div class="nice-form-group">
                        <label>Secondary color</label>
                        <input type="color" name="secondary_color" value="{{$settingsData['secondary_color']}}">
                    </div>

                    <details>
                        <summary>

                            <input type="submit" value="Submit"
                                   style="background-color: black; color: white !important; padding: 10px 30px; border-radius: 10px;">
                        </summary>

                    </details>

                </section>
            </main>
        </div>
    </form>

@endsection

@section('foot')

@endsection
