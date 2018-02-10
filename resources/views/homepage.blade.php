@extends('layout.app')

@section('sidebar')
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
            <li class="active"><a href="{{route('homepage')}}">Home</a></li>
            <li class=""><a href="{{route('homepage')}}">World</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
@endsection

@section('content')

<div class="wrapper_top">

        @foreach ($news->chunk(4) as $chunkedNews)

            <div class="row equal">

            @foreach($chunkedNews as $item)

            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img data-holder-rendered="true"
                         src="{{$item->urlToImage}}">

                    <div class="caption">
                        <h3 id="thumbnail-label"><a href="{{$item->url}}">{{$item->title}}</a><a class="anchorjs-link"
                                                                                       href="#thumbnail-label"><span
                                class="anchorjs-icon"></span></a></h3>

                        <p>{{$item->description}}</p>

                    </div>
                </div>
            </div>

            

            @endforeach 

            </div>
   

        @endforeach 
        

</div><!-- End wrapper -->

@endsection

@section('bottom_part')
  <div class="bottom_wrapper">
  <div class="row">
      <div class="col-md-12">

        <div class="col-md-8">
            <h4>World</h4>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="...">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
        </div>

        <div class="col-md-4">
          <h4>Najnowsze</h4>
          <ul class="list-group">
            <li class="list-group-item">
                <span class="text-orientation-left-css">11:12, Kielce</span> <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            </li>
            <li class="list-group-item">
                <span class="text-orientation-left-css">11:12, Kielce</span> <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            </li>
            <li class="list-group-item">
                <span class="text-orientation-left-css">11:12, Kielce</span> <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
            </li>
          </ul>

          <h4>Najbardziej popularne</h4>
          <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>

      </div>
  </div>
  </div>
@endsection

@section('javascript')
    @parent 

    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>
    <script src="https://use.fontawesome.com/4aef0cce73.js"></script>
@endsection