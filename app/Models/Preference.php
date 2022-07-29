<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preference extends Model
{
    use HasFactory;

	protected $fillable = [
		'notify_emails',
		'notify',
		'backgrouns_color',
	];

	public function User(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
