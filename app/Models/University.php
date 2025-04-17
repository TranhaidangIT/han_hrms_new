<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class University
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $university_name
 * @property string|null $training_country
 * @property string|null $graduate_year
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class University extends Model
{
	protected $table = 'universities';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'university_name',
		'training_country',
		'graduate_year'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
