<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AfterUniversity
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $specialized_master
 * @property string|null $training_place_master
 * @property string|null $degree_year_master
 * @property string|null $specialized_doctorate
 * @property string|null $training_place_doctorate
 * @property string|null $degree_year_doctorate
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class AfterUniversity extends Model
{
	protected $table = 'after_universities';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'specialized_master',
		'training_place_master',
		'degree_year_master',
		'specialized_doctorate',
		'training_place_doctorate',
		'degree_year_doctorate'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
