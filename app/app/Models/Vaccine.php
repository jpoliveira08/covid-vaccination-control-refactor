<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    protected $guarded = [];

    public function employees()
    {
        return $this->belongsToMany(
            related: Employee::class,
            table: 'employees_vaccinations',
            foreignPivotKey: 'id_employee',
            relatedPivotKey: 'id_vaccine',
        )
            ->withPivot(['dose_number', 'dose_date'])
            ->withTimestamps();
    }
}
