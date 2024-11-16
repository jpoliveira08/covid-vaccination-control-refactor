<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Vaccine\SearchVaccineRequest;
use App\Http\Requests\Vaccine\StoreVaccineRequest;
use App\Http\Requests\Vaccine\UpdateVaccineRequest;
use App\Models\Vaccine;
use App\Services\VaccineService;
use Illuminate\Http\JsonResponse;

class VaccineController extends Controller
{
    public function index()
    {
        return view('vaccine.index');
    }

    public function create()
    {
        return view('vaccine.create');
    }

    public function store(StoreVaccineRequest $request, VaccineService $vaccineService): JsonResponse
    {
        $vaccineService->store($request->validated());

        return response()->json([
            'message' => 'The vaccine was successfully created',
        ]);
    }

    public function show(Vaccine $vaccine)
    {
        return response()->json($vaccine);
    }

    public function destroy(Vaccine $vaccine, VaccineService $vaccineService): JsonResponse
    {
        $vaccineService->destroy($vaccine);

        return response()->json([
            'message' => 'The vaccine was successfully deleted.',
        ]);
    }

    public function update(
        UpdateVaccineRequest $request,
        Vaccine $vaccine,
        VaccineService $vaccineService
    ): JsonResponse {
        $vaccineService->update($request->validated(), $vaccine);

        return response()->json([
            'message' => 'The vaccine was successfully updated.',
        ]);
    }

    public function searchForVirtualSelect(SearchVaccineRequest $request, VaccineService $vaccineService): JsonResponse
    {
        $searchValue = $request->query('search');
        $perPage = $request->query('per_page', 10);

        if (empty($searchValue)) {
            return response()->json([
                'options' => [],
                'total' => 0,
            ]);
        }

        $searchResult = $vaccineService->searchForVirtualSelect($searchValue, $perPage);

        return response()->json([
            'options' => $searchResult['results'],
            'total' => $searchResult['total'],
        ]);
    }
}
