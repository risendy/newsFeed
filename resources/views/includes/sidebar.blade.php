<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Menu</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="@if ($page==1) active @endif"><a href="{{route('homepage')}}">Home</a></li>
        <li class="@if ($page==2) active @endif"><a href="{{route('type', ['id'=>2])}}">Business</a></li>
        <li class="@if ($page==3) active @endif"><a href="{{route('type', ['id'=>3])}}">Health</a></li>
        <li class="@if ($page==4) active @endif"><a href="{{route('type', ['id'=>4])}}">Science</a></li>
        <li class="@if ($page==5) active @endif"><a href="{{route('type', ['id'=>5])}}">Sports</a></li>
        <li class="@if ($page==6) active @endif"><a href="{{route('type', ['id'=>6])}}">Technology</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>