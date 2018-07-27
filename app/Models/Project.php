<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    const STATUS_UNCOMMITTED = 'uncommitted';
    const STATUS_PENDING = 'pending';
    const STATUS_PASSED = 'passed';
    const STATUS_DENIED = 'denied';

    public static $statusMap = [
        self::STATUS_UNCOMMITTED => '未提交',
        self::STATUS_PENDING => '审核中',
        self::STATUS_PASSED => '已通过',
        self::STATUS_DENIED => '未通过',
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        return self::$statusMap[$this->status];
    }

    public function getImageUrlAttribute()
    {
        $value = $this->image;

        if (is_null($value)) {
            return 'http://iph.href.lu/400x300';
        }

        if (Str::startsWith($value, ['http://', 'https://', '//'])) {
            return $value;
        }
        return Storage::url($value);
    }
}
