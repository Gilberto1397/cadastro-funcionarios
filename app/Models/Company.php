<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @property string $name
 * @property string $state
 * @property Employee $employees
 */
class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name', 'state'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'companies_id', 'id');
    }
}
