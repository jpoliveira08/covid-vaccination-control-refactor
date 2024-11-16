import {Modal} from "bootstrap";
import FetchRequest from "./FetchRequest.js";
import UrlBuilder from "./UrlBuilder.js";

const SendForm = async (event) => {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const formMethod = document.getElementById('form-method').value;
    const idVaccine = document.getElementById('vaccine-id').value;
    const url = UrlBuilder(formMethod, idVaccine).build();
    try {
        const response = await FetchRequest(url, formMethod, formData);
        toastr.success(response.message);

        const modal = new Modal('#vaccineModal');
        modal.hide();
        window.setTimeout(function () {
            window.location.reload();
        }, 800);
    } catch (error) {
        if (error.status === 422) {
            let errorMessages = '';
            Object.keys(error.errors).forEach((field) => {
                errorMessages += `${error.errors[field].join(', ')}<br>`;
            });

            toastr.warning(errorMessages);
            return;
        }

        toastr.error('Contact system administrator.');
        console.error(error);
    }
}

export default SendForm;
