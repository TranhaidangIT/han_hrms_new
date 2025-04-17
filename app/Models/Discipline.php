<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Discipline
 * 
 * @property int $id
 * @property string $employee_code
 * @property Carbon|null $discipline_date
 * @property string|null $reason
 * @property float|null $discipline_money
 * 
 * @property Employee $employee
 *
 * @package App\Models
 */
class Discipline extends Model
{
	protected $table = 'disciplines';
	public $timestamps = false;

	protected $casts = [
		'discipline_date' => 'datetime',
		'discipline_money' => 'float'
	];

	protected $fillable = [
		'employee_code',
		'discipline_date',
		'reason',
		'discipline_money'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'employee_code');
	}
}
