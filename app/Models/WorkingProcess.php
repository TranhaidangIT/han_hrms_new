<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WorkingProcess
 * 
 * @property int $id
 * @property string $employee_code
 * @property string|null $work_place
 * @property string|null $work_undertake
 * @property string|null $time
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class WorkingProcess extends Model
{
	protected $table = 'working_processes';
	public $timestamps = false;

	protected $fillable = [
		'employee_code',
		'work_place',
		'work_undertake',
		'time'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
