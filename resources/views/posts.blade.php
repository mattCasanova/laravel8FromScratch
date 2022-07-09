<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif

    </main>
</x-layout>

{{-- Old posts page
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

            <p>
                By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in
                <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            </p>

            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
    </x-slot> --}}
