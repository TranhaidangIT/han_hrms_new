<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ForeignLanguage
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $foreign_language_name
 * @property string|null $level
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class ForeignLanguage extends Model
{
	protected $table = 'foreign_languages';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'foreign_language_name',
		'level'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
