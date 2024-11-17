import InitializeVaccineVirtualSelect from './InitializeVaccineVirtualSelect.js';
import AddVaccinationRow from "./AddVaccinationRow.js";

const EmployeeVaccineRepeater = async () => {
    let vaccineInputNumber = 0;

    const vaccinesSelect = document.querySelectorAll('.vaccineSelect');
    vaccinesSelect.forEach(vaccineSelect => {
        InitializeVaccineVirtualSelect(
            vaccineSelect,
            `vaccines[${vaccineInputNumber}][id_vaccine]`
        );
    });

    const repeaterContainer = document.getElementById('vaccineRepeaterContainer');
    repeaterContainer.addEventListener('click', (e) => {
        if (e.target.closest('.add-vaccine')) {
            vaccineInputNumber++;
            AddVaccinationRow(repeaterContainer, vaccineInputNumber);
        }
    });
}

export default EmployeeVaccineRepeater;
