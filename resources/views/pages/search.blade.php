@extends('layout.app')

@section('sidebar')
    @include('includes.sidebar', ["page"=>1, "searchText"=>$searchText])
@endsection

@section('content')

<div class="wrapper_top">

        @foreach ($news->chunk(4) as $chunkedNews)

            <div class="row equal">

            @foreach($chunkedNews as $item)

            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    @if ($item->urlToImage)
                      <img data-holder-rendered="true" src="{{$item->urlToImage}}">
                    @else
                      <img data-holder-rendered="true" src="http://via.placeholder.com/460x300">
                    @endif

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