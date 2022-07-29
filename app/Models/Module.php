<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

	protected $fillable = [
		'name',
	];

	public function course(): BelongsTo
	{
		return $this->BelongsTo(Course::class);
	}

	public function lessons(): HasMany
	{
		return $this->hasMany(Lesson::class);
	}
}
