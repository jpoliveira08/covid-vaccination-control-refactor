import {Modal} from "bootstrap";
import VaccineHelper from "../VaccineHelper.js";

const EditVaccine = async (idVaccine) => {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        const vaccineHelper = VaccineHelper(vaccineData);
        vaccineHelper.fillVaccineInputs();

        const modal = new Modal('#vaccineModal');
        modal.show();

        document.getElementById('form-method').value = 'PUT';
        document.getElementById('vaccine-id').value = idVaccine;
    } catch (error) {
        console.error(error);
    }
}

export default EditVaccine;
