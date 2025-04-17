<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ScientificWork
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $scientific_works_name
 * @property string|null $year
 * @property string|null $magazine_name
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class ScientificWork extends Model
{
	protected $table = 'scientific_works';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'scientific_works_name',
		'year',
		'magazine_name'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
