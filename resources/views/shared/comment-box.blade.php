<div>
    @auth
        <form action="{{ route('ideas.comments.store', $idea->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name='content'class="fs-6 form-control" rows="1"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
            </div>
        </form>
    @endauth

    @guest

        <h4 class="mt-3">Login to comment!</h4>
    @endguest



    @foreach ($idea->comments as $comment)
        <hr>
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $comment->user->name }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted">Posted in {{ $comment->created_at }} </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
            </div>
        </div>
    @endforeach
