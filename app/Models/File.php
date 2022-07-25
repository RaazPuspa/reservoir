<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $uuid
 * @phpstan-ignore-next-line
 * @mixin IdeHelperFile
 */
class File extends Model
{
    use HasUuid;
    use SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $fillable = ['path', 'title', 'size', 'name'];

    protected $visible = ['uuid', 'path', 'title', 'size', 'name', 'created_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<callable, null>
     */
    public function size(): Attribute
    {
        return new Attribute(
            get: static function (int $size) {
                $sz = 'BKMGTP';
                $factor = floor((mb_strlen((string) $size) - 1) / 3);

                return sprintf('%.2f %s', $size / (1024 ** $factor), $sz[(int) $factor]);
            },
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<callable, null>
     */
    public function createdAt(): Attribute
    {
        return new Attribute(
            get: static fn (string $createdAt) => Carbon::parse($createdAt)->toDayDateTimeString(),
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Casts\Attribute<callable, null>
     */
    public function downloadUrl(): Attribute
    {
        return new Attribute(
            get: fn () => Storage::disk('public')->url($this->path),
        );
    }
}
