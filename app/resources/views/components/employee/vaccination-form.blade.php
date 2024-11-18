<div id="vaccineRepeaterContainer">
    @forelse ($vaccinations as $i => $vaccination)
        <div class="row mb-4 vaccine-repeater-item">
            <div class="col-md-6">
                <label class="form-label d-block">Vaccine description</label>
                <div
                    class="vaccineSelect"
                    data-vaccine-id="@isset($vaccination['id_vaccine']){{$vaccination['id_vaccine']}}@endisset"
                ></div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Dose date</label>
                <input type="date" class="form-control" name="vaccines[{{$i}}][dose_date]" value="@isset($vaccination['dose_date']){{$vaccination['dose_date']}}@endisset">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dose number</label>
                <input type="number" class="form-control" name="vaccines[{{$i}}][dose_number]" value="@isset($vaccination['dose_number']){{$vaccination['dose_number']}}@endisset">
            </div>
            <div class="col-md-1">
                <label class="form-label"></label>
                @if($i > 0)
                    <button type="button" class="btn btn-danger form-control mt-2 remove-vaccine" onclick="removeVaccination(event)">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                @else
                    <button type="button" class="btn btn-primary form-control mt-2 add-vaccine">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                @endif
            </div>
        </div>
    @empty
        <div class="row mb-4 vaccine-repeater-item">
            <div class="col-md-6">
                <label class="form-label d-block">Vaccine description</label>
                <div class="vaccineSelect"></div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Dose date</label>
                <input type="date" class="form-control" name="vaccines[0][dose_date]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dose number</label>
                <input type="number" class="form-control" name="vaccines[0][dose_number]">
            </div>
            <div class="col-md-1">
                <label class="form-label"></label>
                <button type="button" class="btn btn-primary form-control mt-2 add-vaccine">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>
    @endforelse
</div>
