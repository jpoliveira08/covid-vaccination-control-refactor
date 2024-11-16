<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Vaccine;

class VaccineService
{
    public function store(array $vaccineData)
    {
        return Vaccine::create($vaccineData);
    }

    public function destroy(Vaccine $vaccine)
    {
        return $vaccine->delete();
    }

    public function update(array $vaccineData, Vaccine $vaccine)
    {
        return $vaccine->update($vaccineData);
    }

    public function searchForVirtualSelect($searchValue, $perPage): array
    {
        $vaccines = $this->searchVaccinesPaginated($searchValue, $perPage);

        $options = $vaccines->map(function ($vaccine) {
            $label = "Name: {$vaccine->name}, Batch: {$vaccine->batch}, Expiration date: {$vaccine->expiration_date}";

            return [
                'value' => $vaccine->id,
                'label' => $label,
            ];
        });

        return [
            'results' => $options,
            'total' => $vaccines->total(),
        ];
    }

    private function searchVaccinesPaginated($searchValue, $perPage)
    {
        return Vaccine::where('name', 'like', '%'.$searchValue.'%')
            ->orWhere('batch', 'like', '%'.$searchValue.'%')
            ->paginate($perPage);
    }
}
