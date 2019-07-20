@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="panel panel-default">
        <div class="panel-heading">
        <strong>@if($comment->user) {{ $comment->user->name }} @else guest @endif</strong> 
        commented
        <time class="timeago" datetime="{{$comment->created_at}}">{{$comment->created_at}}</time>
        </div>
        <div class="panel-body">
        {{ $comment->body }}
        </div><!-- /panel-body -->
        </div><!-- /panel panel-default -->
        <a href="" id="reply"></a>
        @if (Auth::check())
        <form class="form-inline" method="post" action="{{url('storeComment')}}">
            <div class="form-group">
                {{ csrf_field() }}
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                <input type="hidden" name="news_id" value="{{ $news_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default" value="Reply" />
                    <i class="fa fa-reply"></i> Reply
                </button>
            </div>
        </form>
        @endif
        @include('pages.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach