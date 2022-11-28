<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "https://hockeymanager.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.6.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.6.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-games">
                                <a href="#endpoints-GETapi-games">GET api/games</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-games--game_id-">
                                <a href="#endpoints-GETapi-games--game_id-">GET api/games/{game_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams">
                                <a href="#endpoints-GETapi-teams">GET api/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams--team_id-">
                                <a href="#endpoints-GETapi-teams--team_id-">GET api/teams/{team_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams--team_id--schedule">
                                <a href="#endpoints-GETapi-teams--team_id--schedule">GET api/teams/{team_id}/schedule</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-teams-become-team-manager">
                                <a href="#endpoints-POSTapi-teams-become-team-manager">POST api/teams/become-team-manager</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions">
                                <a href="#endpoints-GETapi-competitions">GET api/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions--competition_id-">
                                <a href="#endpoints-GETapi-competitions--competition_id-">GET api/competitions/{competition_id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 28, 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://hockeymanager.test</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-games">GET api/games</h2>

<p>
</p>



<span id="example-requests-GETapi-games">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/games" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/games"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-games">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 57
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 401,
            &quot;round&quot;: 3,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T23:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 12,
            &quot;away_score&quot;: 9,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T01:33:01.000000Z&quot;,
            &quot;home_team_id&quot;: 57,
            &quot;away_team_id&quot;: 58,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 397,
            &quot;round&quot;: 2,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T21:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 9,
            &quot;away_score&quot;: 8,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T23:39:01.000000Z&quot;,
            &quot;home_team_id&quot;: 58,
            &quot;away_team_id&quot;: 64,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 404,
            &quot;round&quot;: 3,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T23:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 7,
            &quot;away_score&quot;: 5,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T01:08:02.000000Z&quot;,
            &quot;home_team_id&quot;: 61,
            &quot;away_team_id&quot;: 59,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 448,
            &quot;round&quot;: 14,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T21:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;home_team_id&quot;: 57,
            &quot;away_team_id&quot;: 62,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 400,
            &quot;round&quot;: 2,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T21:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 10,
            &quot;away_score&quot;: 9,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T23:10:01.000000Z&quot;,
            &quot;home_team_id&quot;: 60,
            &quot;away_team_id&quot;: 59,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 396,
            &quot;round&quot;: 1,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 8,
            &quot;away_score&quot;: 4,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T21:08:02.000000Z&quot;,
            &quot;home_team_id&quot;: 60,
            &quot;away_team_id&quot;: 62,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 402,
            &quot;round&quot;: 3,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T23:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 7,
            &quot;away_score&quot;: 2,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T01:09:02.000000Z&quot;,
            &quot;home_team_id&quot;: 64,
            &quot;away_team_id&quot;: 62,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 393,
            &quot;round&quot;: 1,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 11,
            &quot;away_score&quot;: 12,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T21:35:01.000000Z&quot;,
            &quot;home_team_id&quot;: 63,
            &quot;away_team_id&quot;: 58,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 399,
            &quot;round&quot;: 2,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T21:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 5,
            &quot;away_score&quot;: 11,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T23:11:01.000000Z&quot;,
            &quot;home_team_id&quot;: 62,
            &quot;away_team_id&quot;: 61,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 405,
            &quot;round&quot;: 4,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T01:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 10,
            &quot;away_score&quot;: 5,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T03:09:01.000000Z&quot;,
            &quot;home_team_id&quot;: 58,
            &quot;away_team_id&quot;: 62,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 403,
            &quot;round&quot;: 3,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T23:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 6,
            &quot;away_score&quot;: 7,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T01:07:02.000000Z&quot;,
            &quot;home_team_id&quot;: 63,
            &quot;away_team_id&quot;: 60,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 395,
            &quot;round&quot;: 1,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 9,
            &quot;away_score&quot;: 5,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T21:13:01.000000Z&quot;,
            &quot;home_team_id&quot;: 59,
            &quot;away_team_id&quot;: 57,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 406,
            &quot;round&quot;: 4,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T01:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 5,
            &quot;away_score&quot;: 7,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T03:12:01.000000Z&quot;,
            &quot;home_team_id&quot;: 60,
            &quot;away_team_id&quot;: 57,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 394,
            &quot;round&quot;: 1,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 4,
            &quot;away_score&quot;: 7,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T21:11:01.000000Z&quot;,
            &quot;home_team_id&quot;: 61,
            &quot;away_team_id&quot;: 64,
            &quot;competition_id&quot;: 8
        },
        {
            &quot;id&quot;: 407,
            &quot;round&quot;: 4,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T01:58:57.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 6,
            &quot;away_score&quot;: 7,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T03:10:01.000000Z&quot;,
            &quot;home_team_id&quot;: 59,
            &quot;away_team_id&quot;: 64,
            &quot;competition_id&quot;: 8
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;https://hockeymanager.test/api/games?page=1&quot;,
        &quot;last&quot;: &quot;https://hockeymanager.test/api/games?page=30&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;https://hockeymanager.test/api/games?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 30,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=8&quot;,
                &quot;label&quot;: &quot;8&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=9&quot;,
                &quot;label&quot;: &quot;9&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=10&quot;,
                &quot;label&quot;: &quot;10&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;...&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=29&quot;,
                &quot;label&quot;: &quot;29&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=30&quot;,
                &quot;label&quot;: &quot;30&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/games?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;https://hockeymanager.test/api/games&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 15,
        &quot;total&quot;: 448
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-games" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-games" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games"></code></pre>
</span>
<form id="form-GETapi-games" data-method="GET"
      data-path="api/games"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games"
                    onclick="tryItOut('GETapi-games');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games"
                    onclick="cancelTryOut('GETapi-games');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-games"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-games"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-games--game_id-">GET api/games/{game_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-games--game_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/games/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/games/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-games--game_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 56
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;round&quot;: 1,
        &quot;status&quot;: 60,
        &quot;starts_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
        &quot;current_time&quot;: &quot;20:00&quot;,
        &quot;home_score&quot;: 6,
        &quot;away_score&quot;: 7,
        &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2022-11-27T21:13:01.000000Z&quot;,
        &quot;home_team_id&quot;: 2,
        &quot;away_team_id&quot;: 5,
        &quot;competition_id&quot;: 1,
        &quot;home_team&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Lidhult&quot;,
            &quot;city&quot;: &quot;Lidhult&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;SE&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;
        },
        &quot;away_team&quot;: {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Naglarby och Enbacka&quot;,
            &quot;city&quot;: &quot;Naglarby och Enbacka&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;SE&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-games--game_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games--game_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games--game_id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-games--game_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games--game_id-"></code></pre>
</span>
<form id="form-GETapi-games--game_id-" data-method="GET"
      data-path="api/games/{game_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games--game_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games--game_id-"
                    onclick="tryItOut('GETapi-games--game_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games--game_id-"
                    onclick="cancelTryOut('GETapi-games--game_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games--game_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games/{game_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-games--game_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-games--game_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>game_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="game_id"                data-endpoint="GETapi-games--game_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the game. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-teams">GET api/teams</h2>

<p>
</p>



<span id="example-requests-GETapi-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 55
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 64,
            &quot;name&quot;: &quot;M&oslash;rke&quot;,
            &quot;city&quot;: &quot;M&oslash;rke&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:58.000000Z&quot;
        },
        {
            &quot;id&quot;: 57,
            &quot;name&quot;: &quot;Sporup&quot;,
            &quot;city&quot;: &quot;Sporup&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 58,
            &quot;name&quot;: &quot;Glejbjerg&quot;,
            &quot;city&quot;: &quot;Glejbjerg&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 59,
            &quot;name&quot;: &quot;Djurs&quot;,
            &quot;city&quot;: &quot;Djurs&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 60,
            &quot;name&quot;: &quot;Kolding&quot;,
            &quot;city&quot;: &quot;Kolding&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 61,
            &quot;name&quot;: &quot;Vojens&quot;,
            &quot;city&quot;: &quot;Vojens&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 62,
            &quot;name&quot;: &quot;Haderslev&quot;,
            &quot;city&quot;: &quot;Haderslev&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 63,
            &quot;name&quot;: &quot;Sydfyn&quot;,
            &quot;city&quot;: &quot;Sydfyn&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;name&quot;: &quot;Vestj&quot;,
            &quot;city&quot;: &quot;Vestj&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;name&quot;: &quot;Vinderup&quot;,
            &quot;city&quot;: &quot;Vinderup&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;name&quot;: &quot;Sandved&quot;,
            &quot;city&quot;: &quot;Sandved&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 52,
            &quot;name&quot;: &quot;Veks&oslash;&quot;,
            &quot;city&quot;: &quot;Veks&oslash;&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 53,
            &quot;name&quot;: &quot;S&aring;by&quot;,
            &quot;city&quot;: &quot;S&aring;by&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 54,
            &quot;name&quot;: &quot;Ulstrup&quot;,
            &quot;city&quot;: &quot;Ulstrup&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 55,
            &quot;name&quot;: &quot;Hundested&quot;,
            &quot;city&quot;: &quot;Hundested&quot;,
            &quot;state&quot;: null,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;https://hockeymanager.test/api/teams?page=1&quot;,
        &quot;last&quot;: &quot;https://hockeymanager.test/api/teams?page=5&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;https://hockeymanager.test/api/teams?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 5,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/teams?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;https://hockeymanager.test/api/teams&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 15,
        &quot;total&quot;: 64
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams"></code></pre>
</span>
<form id="form-GETapi-teams" data-method="GET"
      data-path="api/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams"
                    onclick="tryItOut('GETapi-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams"
                    onclick="cancelTryOut('GETapi-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-teams--team_id-">GET api/teams/{team_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-teams--team_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/teams/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/teams/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--team_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 54
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;&Aring;storp&quot;,
        &quot;city&quot;: &quot;&Aring;storp&quot;,
        &quot;country&quot;: &quot;SE&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--team_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--team_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--team_id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--team_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--team_id-"></code></pre>
</span>
<form id="form-GETapi-teams--team_id-" data-method="GET"
      data-path="api/teams/{team_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--team_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--team_id-"
                    onclick="tryItOut('GETapi-teams--team_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--team_id-"
                    onclick="cancelTryOut('GETapi-teams--team_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--team_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{team_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-teams--team_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-teams--team_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="team_id"                data-endpoint="GETapi-teams--team_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-teams--team_id--schedule">GET api/teams/{team_id}/schedule</h2>

<p>
</p>



<span id="example-requests-GETapi-teams--team_id--schedule">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/teams/1/schedule" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/teams/1/schedule"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--team_id--schedule">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 53
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 4,
            &quot;round&quot;: 1,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 13,
            &quot;away_score&quot;: 6,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T21:14:01.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 7,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 8,
            &quot;round&quot;: 2,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T21:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 12,
            &quot;away_score&quot;: 9,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T23:11:01.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 8,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 11,
            &quot;round&quot;: 3,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-27T23:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 5,
            &quot;away_score&quot;: 14,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T01:14:01.000000Z&quot;,
            &quot;home_team_id&quot;: 2,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 14,
            &quot;round&quot;: 4,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T01:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 7,
            &quot;away_score&quot;: 8,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T03:08:01.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 6,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 17,
            &quot;round&quot;: 5,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T03:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 3,
            &quot;away_score&quot;: 9,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T05:09:00.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 5,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 22,
            &quot;round&quot;: 6,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T05:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 12,
            &quot;away_score&quot;: 8,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T07:10:01.000000Z&quot;,
            &quot;home_team_id&quot;: 4,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 27,
            &quot;round&quot;: 7,
            &quot;status&quot;: 60,
            &quot;starts_at&quot;: &quot;2022-11-28T07:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 11,
            &quot;away_score&quot;: 5,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-28T09:10:01.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 3,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 32,
            &quot;round&quot;: 8,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T09:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 7,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 36,
            &quot;round&quot;: 9,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T11:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 8,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 39,
            &quot;round&quot;: 10,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T13:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 2,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 42,
            &quot;round&quot;: 11,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T15:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 6,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 45,
            &quot;round&quot;: 12,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T17:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 5,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 50,
            &quot;round&quot;: 13,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T19:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 1,
            &quot;away_team_id&quot;: 4,
            &quot;competition_id&quot;: 1
        },
        {
            &quot;id&quot;: 55,
            &quot;round&quot;: 14,
            &quot;status&quot;: 0,
            &quot;starts_at&quot;: &quot;2022-11-28T21:58:49.000000Z&quot;,
            &quot;current_time&quot;: &quot;20:00&quot;,
            &quot;home_score&quot;: 0,
            &quot;away_score&quot;: 0,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;home_team_id&quot;: 3,
            &quot;away_team_id&quot;: 1,
            &quot;competition_id&quot;: 1
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--team_id--schedule" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--team_id--schedule"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--team_id--schedule" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--team_id--schedule" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--team_id--schedule"></code></pre>
</span>
<form id="form-GETapi-teams--team_id--schedule" data-method="GET"
      data-path="api/teams/{team_id}/schedule"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--team_id--schedule', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--team_id--schedule"
                    onclick="tryItOut('GETapi-teams--team_id--schedule');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--team_id--schedule"
                    onclick="cancelTryOut('GETapi-teams--team_id--schedule');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--team_id--schedule" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{team_id}/schedule</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-teams--team_id--schedule"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-teams--team_id--schedule"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="team_id"                data-endpoint="GETapi-teams--team_id--schedule"
               value="1"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-teams-become-team-manager">POST api/teams/become-team-manager</h2>

<p>
</p>



<span id="example-requests-POSTapi-teams-become-team-manager">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://hockeymanager.test/api/teams/become-team-manager" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"team_id\": \"consequuntur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/teams/become-team-manager"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "team_id": "consequuntur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-teams-become-team-manager">
</span>
<span id="execution-results-POSTapi-teams-become-team-manager" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-teams-become-team-manager"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams-become-team-manager" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-teams-become-team-manager" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams-become-team-manager"></code></pre>
</span>
<form id="form-POSTapi-teams-become-team-manager" data-method="POST"
      data-path="api/teams/become-team-manager"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams-become-team-manager', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-teams-become-team-manager"
                    onclick="tryItOut('POSTapi-teams-become-team-manager');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-teams-become-team-manager"
                    onclick="cancelTryOut('POSTapi-teams-become-team-manager');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-teams-become-team-manager" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/teams/become-team-manager</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-teams-become-team-manager"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-teams-become-team-manager"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="team_id"                data-endpoint="POSTapi-teams-become-team-manager"
               value="consequuntur"
               data-component="body">
    <br>
<p>Example: <code>consequuntur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-competitions">GET api/competitions</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 52
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Klass 1&quot;,
            &quot;country&quot;: &quot;SE&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:49.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 1,
            &quot;relegation&quot;: 2,
            &quot;promotion&quot;: 0,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Klass 2&quot;,
            &quot;country&quot;: &quot;SE&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:50.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 2,
            &quot;relegation&quot;: 0,
            &quot;promotion&quot;: 2,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:50.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Liiga&quot;,
            &quot;country&quot;: &quot;FI&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:51.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:51.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 1,
            &quot;relegation&quot;: 2,
            &quot;promotion&quot;: 0,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:51.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Liiga 2&quot;,
            &quot;country&quot;: &quot;FI&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:52.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:52.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 2,
            &quot;relegation&quot;: 0,
            &quot;promotion&quot;: 2,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:52.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Norge 1&quot;,
            &quot;country&quot;: &quot;NO&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:53.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:53.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 1,
            &quot;relegation&quot;: 2,
            &quot;promotion&quot;: 0,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:53.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Norge 2&quot;,
            &quot;country&quot;: &quot;NO&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:54.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:54.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 2,
            &quot;relegation&quot;: 0,
            &quot;promotion&quot;: 2,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:54.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Division 1&quot;,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:56.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 1,
            &quot;relegation&quot;: 2,
            &quot;promotion&quot;: 0,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Division 2&quot;,
            &quot;country&quot;: &quot;DK&quot;,
            &quot;status&quot;: 10,
            &quot;starts_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;ends_at&quot;: &quot;2022-11-28T23:58:57.000000Z&quot;,
            &quot;type&quot;: 0,
            &quot;max_teams&quot;: 8,
            &quot;meetings&quot;: 2,
            &quot;tier&quot;: 2,
            &quot;relegation&quot;: 0,
            &quot;promotion&quot;: 2,
            &quot;relegation_qualification&quot;: 0,
            &quot;promotion_qualification&quot;: 0,
            &quot;recurring&quot;: true,
            &quot;edition&quot;: 1,
            &quot;created_at&quot;: &quot;2022-11-27T19:58:57.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2022-11-27T20:00:23.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;self&quot;: &quot;link-value&quot;,
        &quot;first&quot;: &quot;https://hockeymanager.test/api/competitions?page=1&quot;,
        &quot;last&quot;: &quot;https://hockeymanager.test/api/competitions?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;https://hockeymanager.test/api/competitions?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;https://hockeymanager.test/api/competitions&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 8,
        &quot;total&quot;: 8
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions"></code></pre>
</span>
<form id="form-GETapi-competitions" data-method="GET"
      data-path="api/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions"
                    onclick="tryItOut('GETapi-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions"
                    onclick="cancelTryOut('GETapi-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-competitions--competition_id-">GET api/competitions/{competition_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions--competition_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://hockeymanager.test/api/competitions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://hockeymanager.test/api/competitions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions--competition_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 51
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Klass 1&quot;,
        &quot;country&quot;: &quot;SE&quot;,
        &quot;status&quot;: 10,
        &quot;starts_at&quot;: &quot;2022-11-27T19:58:49.000000Z&quot;,
        &quot;ends_at&quot;: &quot;2022-11-28T23:58:49.000000Z&quot;,
        &quot;type&quot;: 0,
        &quot;max_teams&quot;: 8,
        &quot;meetings&quot;: 2,
        &quot;teams&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;&Aring;storp&quot;,
                &quot;city&quot;: &quot;&Aring;storp&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Lidhult&quot;,
                &quot;city&quot;: &quot;Lidhult&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Tystberga&quot;,
                &quot;city&quot;: &quot;Tystberga&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Persbo&quot;,
                &quot;city&quot;: &quot;Persbo&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Naglarby och Enbacka&quot;,
                &quot;city&quot;: &quot;Naglarby och Enbacka&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Br&auml;nn&ouml;&quot;,
                &quot;city&quot;: &quot;Br&auml;nn&ouml;&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Johannishus&quot;,
                &quot;city&quot;: &quot;Johannishus&quot;,
                &quot;country&quot;: &quot;SE&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Hassela&quot;,
                &quot;city&quot;: &quot;Hassela&quot;,
                &quot;country&quot;: &quot;SE&quot;
            }
        ],
        &quot;table&quot;: [
            {
                &quot;ct_id&quot;: 5,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 5,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 6,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 1,
                &quot;goals_for&quot;: 57,
                &quot;goals_against&quot;: 27,
                &quot;points&quot;: 18
            },
            {
                &quot;ct_id&quot;: 6,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 6,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 6,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 1,
                &quot;goals_for&quot;: 65,
                &quot;goals_against&quot;: 51,
                &quot;points&quot;: 17
            },
            {
                &quot;ct_id&quot;: 1,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 1,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 4,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 3,
                &quot;goals_for&quot;: 68,
                &quot;goals_against&quot;: 54,
                &quot;points&quot;: 12
            },
            {
                &quot;ct_id&quot;: 4,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 4,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 4,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 3,
                &quot;goals_for&quot;: 62,
                &quot;goals_against&quot;: 59,
                &quot;points&quot;: 12
            },
            {
                &quot;ct_id&quot;: 3,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 3,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 3,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 4,
                &quot;goals_for&quot;: 44,
                &quot;goals_against&quot;: 51,
                &quot;points&quot;: 10
            },
            {
                &quot;ct_id&quot;: 7,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 7,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 3,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 4,
                &quot;goals_for&quot;: 46,
                &quot;goals_against&quot;: 55,
                &quot;points&quot;: 8
            },
            {
                &quot;ct_id&quot;: 8,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 8,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 1,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 6,
                &quot;goals_for&quot;: 48,
                &quot;goals_against&quot;: 73,
                &quot;points&quot;: 4
            },
            {
                &quot;ct_id&quot;: 2,
                &quot;competition_id&quot;: 1,
                &quot;team_id&quot;: 2,
                &quot;games_played&quot;: 7,
                &quot;wins&quot;: 1,
                &quot;draws&quot;: 0,
                &quot;losses&quot;: 6,
                &quot;goals_for&quot;: 47,
                &quot;goals_against&quot;: 67,
                &quot;points&quot;: 3
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions--competition_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions--competition_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions--competition_id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions--competition_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions--competition_id-"></code></pre>
</span>
<form id="form-GETapi-competitions--competition_id-" data-method="GET"
      data-path="api/competitions/{competition_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions--competition_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions--competition_id-"
                    onclick="tryItOut('GETapi-competitions--competition_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions--competition_id-"
                    onclick="cancelTryOut('GETapi-competitions--competition_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions--competition_id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions/{competition_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-competitions--competition_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-competitions--competition_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="competition_id"                data-endpoint="GETapi-competitions--competition_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>