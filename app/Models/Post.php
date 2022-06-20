<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(public $title, public $slug, public $excerpt, public $date, public $body)
    {
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->slug,
                    $document->excerpt,
                    $document->date,
                    $document->body()
                );
            })
            ->sortByDesc('date');
        });
    }

    public static function find(string $slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail(string $slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
