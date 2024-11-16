import VaccineHelper from "../VaccineHelper.js";
import DisableInputs from "../../utils/DisableInputs.js";
import {Modal} from "bootstrap";

const ShowVaccine = async (idVaccine) => {
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

        let submitButton = document.getElementById('vaccineSubmitButton');
        submitButton.setAttribute('type', 'button');
        submitButton.setAttribute('data-bs-dismiss', 'modal');
        submitButton.textContent = 'Close';
        submitButton.classList.remove('btn-success');
        submitButton.classList.add('btn-secondary');


        const modal = new Modal('#vaccineModal');
        modal.show();
    } catch (error) {
        console.error(error);
    }
}

export default ShowVaccine;
