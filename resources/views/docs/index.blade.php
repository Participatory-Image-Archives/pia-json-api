<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('docs/swagger-ui.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('docs/index.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('docs/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('docs/favicon-16x16.png') }}" sizes="16x16" />
  </head>

  <body>
    <div id="swagger-ui"></div>
    <script src="{{ asset('docs/swagger-ui-bundle.js') }}" charset="UTF-8"> </script>
    <script src="{{ asset('docs/swagger-ui-standalone-preset.js') }}" charset="UTF-8"> </script>
    <script src="{{ asset('docs/swagger-initializer.js') }}" charset="UTF-8"> </script>
  </body>
</html>
