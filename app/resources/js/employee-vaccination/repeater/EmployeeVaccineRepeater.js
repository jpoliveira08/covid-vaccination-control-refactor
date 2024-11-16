import InitializeVaccineVirtualSelect from './InitializeVaccineVirtualSelect.js';

const EmployeeVaccineRepeater = () => {
    let vaccineInputNumber = 0;

    const vaccinesSelect = document.querySelectorAll('.vaccineSelect');
    vaccinesSelect.forEach(vaccineSelect => {
        InitializeVaccineVirtualSelect(
            vaccineSelect,
            `vaccines[${vaccineInputNumber}][id_vaccine]`
        );
    });

    const addVaccineRow = (container) => {
        vaccineInputNumber++;

        const row = createVaccineRow(vaccineInputNumber);
        container.appendChild(row);

        InitializeVaccineVirtualSelect(
            row.querySelector('.vaccineSelect'),
            `vaccines[${vaccineInputNumber}][id_vaccine]`
        );

        row.querySelector('.remove-vaccine').addEventListener('click', () => {
            row.remove();
        });
    };

    const createVaccineRow = (inputNumber) => {
        const row = document.createElement('div');
        row.classList.add('row', 'mb-4', 'vaccine-repeater-item');
        row.innerHTML = `
            <div class="col-md-6">
                <label class="form-label d-block">Vaccine description</label>
                <div class="vaccineSelect"></div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Dose date</label>
                <input type="date" class="form-control" name="vaccines[${inputNumber}][dose_date]">
            </div>
            <div class="col-md-2">
                <label class="form-label">Dose number</label>
                <input type="number" class="form-control" name="vaccines[${inputNumber}][dose_number]">
            </div>
            <div class="col-md-1">
                <label class="form-label"></label>
                <button type="button" class="btn btn-danger form-control mt-2 remove-vaccine">
                    <i class="fa-solid fa-minus"></i>
                </button>
            </div>
        `;
        return row;
    };

    const repeaterContainer = document.getElementById('vaccineRepeaterContainer');
    repeaterContainer.addEventListener('click', (e) => {
        if (e.target.closest('.add-vaccine')) {
            addVaccineRow(repeaterContainer);
        }
    });
}

export default EmployeeVaccineRepeater;
