<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\PostSaving;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Models\Post.
 *
 * @property int         $id
 * @property string      $title
 * @property string      $content
 * @property string      $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereContent($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @mixin \Eloquent
 *
 * @property string      $content_md
 *
 * @method static Builder|Post whereContentMd($value)
 * @method static Builder|Post wherePreview($value)
 *
 * @property string      $content_plain
 * @property string      $preview
 */
class Post extends Model
{
    private const PREVIEW_CHARACTERS_LIMIT = 300;

    protected $perPage = 10;

    protected $dispatchesEvents = [
        'saving' => PostSaving::class,
    ];

    protected $fillable = [
        'title',
        'content_md',
    ];

    public function getPreviewAttribute()
    {
        return Str::limit($this->content_plain, self::PREVIEW_CHARACTERS_LIMIT);
    }
}
