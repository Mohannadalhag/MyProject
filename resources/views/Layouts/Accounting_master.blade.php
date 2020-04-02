
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
<title>{{ env('APP_NAME','Accounting')}}</title>


<head>
<body>

<h2>@yield('sub_title')</h2>

<div class="btn-group">
        @yield('content')
</div>

</body>
</html>
