@extends('layout.app')

@section('sidebar')
    @include('includes.sidebar', ["page"=>1])
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

                         <span class="timeText">
                           <time class="timeago" datetime="{{$item->publishedAt}}">{{$item->publishedAt}}</time>
                         </span>

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

        {{ $news->links() }} 
        

</div><!-- End wrapper -->

@endsection

@section('bottom_part')
  <div class="bottom_wrapper">
  <div class="row">
      <div class="col-md-12">

        <div class="col-md-8">
            <h4>Buisness</h4>

            @foreach($buisness as $item)
            <div class="media">
              <div class="media-left">

                @if ($item->urlToImage)
                <a href="{{$item->url}}">
                  <img class="media-object" src="{{$item->urlToImage}}" style="width:64px; height:64px;">
                </a>
                @else
                <a href="{{$item->url}}">
                  <img class="media-object" src="http://via.placeholder.com/64x64" style="width:64px; height:64px;">
                </a>
                @endif
              </div>
              <div class="media-body">
                <h4 class="media-heading"><a href="{{$item->url}}">{{$item->title}}</a></h4>
                {{$item->description}}
              </div>
            </div>
            @endforeach 

        </div>

        <div class="col-md-4">
          <h4>Najnowsze</h4>
          <ul class="list-group">

            @foreach($mostRecent as $item)
            <li class="list-group-item">
                <span class="text-orientation-left-css timeago"><time class="timeago" datetime="{{$item->publishedAt}}">{{$item->publishedAt}}</time></span> <p> <a href="{{$item->url}}">{{$item->title}}</a></p>
            </li>
            @endforeach 


          </ul>

          <!-- <h4>Najbardziej popularne</h4>
          <ul class="list-group">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul> -->
        </div>

      </div>
  </div>
  </div>
@endsection

@section('javascript')
    @parent 

    <script type="text/javascript">
      jQuery(document).ready(function() {
          jQuery("time.timeago").timeago();
      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/1.6.1/jquery.timeago.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.5.4/src/loadingoverlay.min.js"></script>
    <script src="https://use.fontawesome.com/4aef0cce73.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection