@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="panel panel-default">
        <div class="panel-heading">
        <strong>@if($comment->user) {{ $comment->user->name }} @else guest @endif</strong> 
        commented
        <time class="timeago" datetime="{{$comment->created_at}}">{{$comment->created_at}}</time>
            <reply-button :comment-id="{{$comment->id}}"></reply-button>
        </div>
        <div class="panel-body">
        {{ $comment->body }}
        </div><!-- /panel-body -->
        </div><!-- /panel panel-default -->
        <a href="" id="reply"></a>
        @if (Auth::check())
            <reply-form :comment-id="{{$comment->id}}" :csrf="'{{ csrf_token() }}'" :user-id="{{Auth::user()->id}}" :news-id="{{$news_id}}" :parent-id="{{$comment->id}}" :url-form="'{{url('storeComment')}}'"></reply-form>
        @endif
        @include('pages.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach