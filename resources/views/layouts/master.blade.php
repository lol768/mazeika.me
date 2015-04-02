<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Merriweather"/>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
        @yield('stylesheets')

        <title>{{ $title }} | mazeika.me</title>
    </head>

    <body>
        <div class="content">
            <header class="header">
                <a href="{{ url('/') }}">
                    <h1 class="header-heading">mazeika.me</h1>

                    <h4 class="header-heading header-subtitle muted">Technology / Life</h4>
                </a>
            </header>

            <div class="body-container">
                <main class="main">
                    @yield('content')
                </main>

                <aside class="sidebar">
                    <ul class="sidebar-contacts">
                        <li>
                            <a class="link" href="https://twitter.com/bionicrm">Twitter</a>
                        </li>

                        <li>
                            <a class="link" href="https://www.facebook.com/bionicrm">Facebook</a>
                        </li>

                        <li>
                            <a class="link" href="https://github.com/bionicrm">GitHub</a>
                        </li>
                    </ul>

                    {!! Form::open(['class' => 'sidebar-form', 'url' => route('subscribe'), 'method' => 'GET']) !!}
                        <label class="sidebar-form-item sidebar-form-label" for="subscribe-email">Subscribe</label>
                        <input id="subscribe-email" class="sidebar-form-item sidebar-form-text" type="email" name="email" placeholder="Your email" maxlength="255" required/>
                        <input class="sidebar-form-item sidebar-form-button" type="submit" value="Submit"/>
                    {!! Form::close() !!}
                </aside>
            </div>
        </div>

        @yield('scripts')
    </body>
</html>