const CreateVaccinationRow = (inputNumberControl) => {
    const row = document.createElement('div');

    row.classList.add('row', 'mb-4', 'vaccine-repeater-item');
    row.innerHTML = `
            <div class="col-md-6">
                <label class="form-label d-block">Vaccine description</label>
                <div class="vaccineSelect"></div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Dose date</label>
                <input type="date" class="form-control" name="vaccines[${inputNumberControl}][dose_date]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dose number</label>
                <input type="number" class="form-control" name="vaccines[${inputNumberControl}][dose_number]">
            </div>
            <div class="col-md-1">
                <label class="form-label"></label>
                <button type="button" class="btn btn-danger form-control mt-2" onclick="removeVaccination(event)">
                    <i class="fa-solid fa-minus"></i>
                </button>
            </div>
        `;
    return row;
}

export default CreateVaccinationRow;
