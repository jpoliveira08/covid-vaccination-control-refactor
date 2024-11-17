import CreateVaccinationRow from "./CreateVaccinationRow.js";
import InitializeVaccineVirtualSelect from "./InitializeVaccineVirtualSelect.js";

const AddVaccinationRow = async (HtmlContainer, inputNumberControl) => {
    const row = CreateVaccinationRow(inputNumberControl);
    HtmlContainer.appendChild(row);

    await InitializeVaccineVirtualSelect(
        row.querySelector('.vaccineSelect'),
        `vaccines[${inputNumberControl}][id_vaccine]`
    );
}

export default AddVaccinationRow;
