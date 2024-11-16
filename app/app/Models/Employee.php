<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $guarded = [];

    public function vaccines()
    {
        return $this->belongsToMany(
            related: Vaccine::class,
            table: 'employees_vaccinations',
            foreignPivotKey: 'id_employee',
            relatedPivotKey: 'id_vaccine',
        )
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
