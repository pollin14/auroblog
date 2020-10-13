<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\PostSaving;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Post.
 *
 * @property int                             $id
 * @property string                          $title
 * @property string                          $content
 * @property string                          $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    private const PREVIEW_CHARACTERS_LIMIT = 300;

    protected $perPage = 10;

    protected $dispatchesEvents = [
        'saving' => PostSaving::class,
    ];

    public function getPreviewAttribute()
    {
        return Str::limit($this->content, self::PREVIEW_CHARACTERS_LIMIT);
    }
}
