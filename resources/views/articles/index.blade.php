<!DOCTYPE html>
<html>
<head>
    <title>Arcticles</title>
</head>
<body>
    <span>Статьи</span>

    <form action="{{ route('articles.index') }}" method="get">
        <label for="slug">Код:</label>
        <input type="text" name="slug" id="slug" value="{{ request('slug') }}" />
        <br>
        <label for="title">Название:</label>
        <input type="text" name="title" id="title" value="{{ request('title') }}" />
        <br>
        <label for="tag">Тег:</label>
        <input type="text" name="tag" id="tag" value="{{ request('tag') }}" />
        <br>
        <button type="submit">Фильтр</button>
    </form>

    <ul>
        @foreach ($articles as $article)
            <li>
                {{ $article->title }}<br>
                <em>Код:</em> {{ $article->slug }}<br>
                <em>Дата создания:</em> {{ $article->created_at }}<br>
                @if (request('slug') && $article->slug === request('slug'))
                    <em>Теги:</em>
                    @forelse ($article->tags->sortBy('name') as $tag)
                        {{ $tag->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @empty
                        Нет тегов
                    @endforelse
                @endif
            </li>
        @endforeach
    </ul>
    {{ $articles->links() }}
</body>
</html>
