<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @property string $name
 * @property integer $age
 * @property integer $companies_id
 * @property string $state
 * @property \DateInterval created_at
 * @property \DateTime $updated_at
 * @property Company $company
 */
class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';

    public function company()
    {
        return $this->belongsTo(Company::class, 'companies_id', 'id');
    }

    protected static function booted()
    {
        self::addGlobalScope(static function (Builder $query) {
            return $query->orderBy('id');
        });
    }

    public function scopeActive (Builder $query)
    {
       return $query->orderBy('name', 'desc');
    }
}
