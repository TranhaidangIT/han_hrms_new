<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Employee
 *
 * @property string $employee_code
 * @property string|null $username
 * @property string|null $password
 * @property string|null $full_name
 * @property Carbon|null $birthday
 * @property string|null $hometown
 * @property string|null $image
 * @property int|null $gender
 * @property string|null $ethnic
 * @property string|null $phone_number
 * @property string|null $employee_position_code
 * @property bool $status
 * @property string|null $department_code
 * @property string|null $contract_code
 * @property string|null $specialized_code
 * @property string|null $education_level_code
 * @property string|null $identity_card
 *
 * @property Contract|null $contract
 * @property Department|null $department
 * @property EducationLevel|null $education_level
 * @property EmployeePosition|null $employee_position
 * @property Specialized|null $specialized
 * @property Collection|AfterUniversity[] $after_universities
 * @property Collection|Bonus[] $bonuses
 * @property Collection|Discipline[] $disciplines
 * @property Collection|EducationLevelUpdate[] $education_level_updates
 * @property Collection|EmployeeRotation[] $employee_rotations
 * @property Collection|ForeignLanguage[] $foreign_languages
 * @property QuitJob|null $quit_job
 * @property Collection|Salary[] $salaries
 * @property Collection|SalaryDetail[] $salary_details
 * @property Collection|SalaryUpdate[] $salary_updates
 * @property Collection|ScientificResearchTopic[] $scientific_research_topics
 * @property Collection|ScientificWork[] $scientific_works
 * @property Collection|University[] $universities
 * @property Collection|WorkingProcess[] $working_processes
 *
 * @package App\Models
 */
class Employee extends Authenticatable
{
	protected $table = 'employees';
	protected $primaryKey = 'employee_code';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'birthday' => 'datetime',
		'gender' => 'int',
		'status' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'employee_code',
		'username',
		'password',
		'full_name',
		'birthday',
		'hometown',
		'image',
		'gender',
		'ethnic',
		'phone_number',
		'employee_position_code',
		'status',
		'department_code',
		'contract_code',
		'specialized_code',
		'education_level_code',
		'identity_card'
	];

	public function contract()
	{
		return $this->belongsTo(Contract::class, 'contract_code');
	}

	public function department()
	{
		return $this->belongsTo(Department::class, 'department_code');
	}

	public function education_level()
	{
		return $this->belongsTo(EducationLevel::class, 'education_level_code');
	}

	public function employee_position()
	{
		return $this->belongsTo(EmployeePosition::class, 'employee_position_code');
	}

	public function specialized()
	{
		return $this->belongsTo(Specialized::class, 'specialized_code');
	}

	public function after_universities()
	{
		return $this->hasMany(AfterUniversity::class, 'employee_code');
	}

	public function bonuses()
	{
		return $this->hasMany(Bonus::class, 'employee_code');
	}

	public function disciplines()
	{
		return $this->hasMany(Discipline::class, 'employee_code');
	}

	public function education_level_updates()
	{
		return $this->hasMany(EducationLevelUpdate::class, 'employee_code');
	}

	public function employee_rotations()
	{
		return $this->hasMany(EmployeeRotation::class, 'employee_code');
	}

	public function foreign_languages()
	{
		return $this->hasMany(ForeignLanguage::class, 'employee_code');
	}

	public function quit_job()
	{
		return $this->hasOne(QuitJob::class, 'employee_code');
	}

	public function salaries()
	{
		return $this->hasMany(Salary::class, 'employee_code');
	}

	public function salary_details()
	{
		return $this->hasMany(SalaryDetail::class, 'employee_code');
	}

	public function salary_updates()
	{
		return $this->hasMany(SalaryUpdate::class, 'employee_code');
	}

	public function scientific_research_topics()
	{
		return $this->hasMany(ScientificResearchTopic::class, 'employee_code');
	}

	public function scientific_works()
	{
		return $this->hasMany(ScientificWork::class, 'employee_code');
	}

	public function universities()
	{
		return $this->hasMany(University::class, 'employee_code');
	}

	public function working_processes()
	{
		return $this->hasMany(WorkingProcess::class, 'employee_code');
	}
}
