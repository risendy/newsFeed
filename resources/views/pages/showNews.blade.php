@extends('layout.app')

@section('sidebar')
    @include('includes.sidebar', ["page"=>1])
@endsection

@section('content')

<div class="wrapper_top">
  <div class="col-md-12">
    <div class="col-md-6 col-md-offset-3">
     <h2> {{$news->title}} </h2>
     <img src="{{$news->urlToImage}}" style="max-width:100%; max-height:100%;">
       <p> 
        <span class="text-left"> 
            published
            <time class="timeago" datetime="{{$news->publishedAt}}">{{$news->publishedAt}}</time>
        </span>
        <span class="pull-right"> Category: {{$news->category}} </span>
       </p>
     <p class="lead"> {{$news->description}} </p>
     <p> 
        <a href="{{$news->url}}">Read more</a>
     </p>
     <p> 
        <a href="{{url('/')}}">Back</a>
     </p>
   </div><!-- End wrapper -->  
 </div><!-- End wrapper -->  
</div><!-- End wrapper -->  

@endsection

@section('bottom_part')
  <div class="bottom_wrapper">
  <div class="row">
      <div class="col-md-12">
          <h4> Comments: </h4>
          @if (Auth::check())
          <form class="form-inline" method="post" action="{{url('storeComment')}}">
              <div class="form-group">
                  {{ csrf_field() }}
                  <textarea type="text" name="body" class="form-control" cols="100" rows="6"/> </textarea>
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                  <input type="hidden" name="news_id" value="{{ $news->id }}" />
              </div>
            </br>
              <div class="form-group">
                  <button type="submit" class="btn btn-default"/>
                    <i class="fa fa-plus"> </i> Add new comment
                  </button>
              </div>
          </form>
          @endif

          @include('pages.commentsDisplay', ['comments' => $news->comments, 'news_id' => $news->id])
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