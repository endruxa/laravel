@foreach($articles as $article)
        <section>
            <h2>
                <a href="{{ route('blog.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
            </h2>
            <div>{{ $article->description }}</div>
            <div class="tag-list">
                    <a class="label {{ getLabelClass() }}" href="{{ route('tag', ['tag_slug' => $tag->slug]) }}">
                        {{ $tag->title }}
                    </a>
            </div>
        </section>
@endforeach

{{ $articles->render() }}




