import { Modal } from 'bootstrap'
import EnableInputs from "../utils/EnableInputs.js";
import SendForm from "./SendForm.js";
import DeleteVaccine from "./resources/DeleteVaccine.js";
import EditVaccine from './resources/EditVaccine.js';
import ShowVaccine from "./resources/ShowVaccine.js";

window.createVaccine = function () {
    const modal = new Modal('#vaccineModal');
    modal.show();
};

window.SendForm = SendForm;
window.EditVaccine = EditVaccine;
window.DeleteVaccine = DeleteVaccine;
window.ShowVaccine = ShowVaccine;

let modal = document.getElementById('vaccineModal');
modal.addEventListener('hidden.bs.modal', event => {
    document.getElementById('vaccineForm').reset();
    EnableInputs([
        'vaccine-name',
        'vaccine-batch',
        'vaccine-expiration-date'
    ]);

    document.getElementById('form-method').value = 'POST';
    document.getElementById('vaccine-id').value = '';

    let submitButton = document.getElementById('vaccineSubmitButton');
    submitButton.setAttribute('type', 'submit');
    submitButton.textContent = 'Save';
    submitButton.classList.remove('btn-secondary');
    submitButton.classList.add('btn-success');
})

