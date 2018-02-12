<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homepage</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>

<body>
    @section('sidebar')

    @show

    @section('content')

    @show

    @section('bottom_part')

    @show

</body>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 footer_wrapper">
            Powered by <a href="https://newsapi.org/">newsApi.org</a>
        </div>
    </div>
</div>
</footer>

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://brm.io/js/libs/matchHeight/jquery.matchHeight-min.js"></script>


<script type="text/javascript">
    (function() {
        $(function() {
            $('.thumbnail').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });
    })();
</script>
@show

</html>