<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FitLab</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>

<body>
  <div class="container" id="app">
    <user-form-component magento_api_url="{{env('magento_api_url')}}"
    admin_username="{{env('admin_username')}}"
    admin_password="{{env('admin_password')}}"
    rule_id="{{env('rule_id')}}"
    ></user-form-component>
  </div>
  <script defer src="{{ asset('js/app.js') }}"></script>
</body>

</html>
