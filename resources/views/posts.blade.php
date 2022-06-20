
<x-layout>
    <x-slot name="header">
        My Cool Blog
    </x-slot>
    <x-slot name="content">
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{$post->slug}}">
                    {!! $post->title !!}
                </a>
            </h1>

            <p><a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a></p>

            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
    </x-slot>
</x-layout>
