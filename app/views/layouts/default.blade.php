  <!doctype html>
  <html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teamwork</title>
    {{ HTML::style('bower_components/foundation/css/foundation.css') }}
  </head>
  <body>
    <div class="row">
      <div class="columns large-12">
        @yield('content')
      </div>
    </div>
    {{ HTML::script('bower_components/jquery/dist/jquery.js') }}
    {{ HTML::script('bower_components/foundation/js/foundation.min.js') }}
    <script>
      $(document).foundation();
    </script>
  </body>
  </html>