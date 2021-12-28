<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    private int $id;

    private $title;

    private $description;

    private $body;

    private $tags;

    private $created_at;

    protected $fillable = [
        'title',
        'description',
        'body',
        'tags',
    ];

    public function __construct()
    {
        // $this->id = $id ?? $statement = DB::select("SHOW TABLE STATUS LIKE 'users'")[0]->Auto_increment;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $tags)
    {
        $this->tags = $tags;
    }

    public function getDate(): ?string
    {
        return $this->created_at;
    }

    public function save(array $options = []): bool
    {
        return DB::table('news')->updateOrInsert($this->fillable, [
            $this->getTitle(),
            $this->getDescription(),
            $this->getBody(),
            $this->getTags(),
        ]);
    }

    public function findById(int $id): ?News
    {
        return $this->fillNews(self::where('id', $id)->first());
    }

    public function findByTitle(string $title): ?News
    {
        return $this->fillNews(self::where('title', 'like', "%$title%")->first());
    }

    public function delete(): bool
    {
        return parent::delete();
    }

    private function fillNews(?News $attributes): News
    {
        if (!is_null($attributes)) {
            $this->id = $attributes['id'];
            $this->setTitle($attributes['title']);
            $this->setDescription($attributes['description']);
            $this->setBody($attributes['body']);
            $this->setTags($attributes['tags']);
            $this->created_at = $attributes['created_at'];
        }

        return new static();
    }
}
