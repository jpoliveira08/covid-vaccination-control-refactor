import {Modal} from "bootstrap";
import DisableInputs from "../../utils/DisableInputs.js";
import VaccineHelper from "../VaccineHelper.js";

const DeleteVaccine = async (idVaccine) => {
    try {
        const response = await fetch(`/vaccine/${idVaccine}`);

        const vaccineData = await response.json();

        const vaccineHelper = VaccineHelper(vaccineData);
        vaccineHelper.fillVaccineInputs();
        DisableInputs([
            'vaccine-name',
            'vaccine-batch',
            'vaccine-expiration-date'
        ]);

        const modal = new Modal('#vaccineModal');
        modal.show();

        document.getElementById('form-method').value = 'DELETE';
        document.getElementById('vaccine-id').value = idVaccine;
    } catch (error) {
        console.error(error);
    }
}

export default DeleteVaccine;
