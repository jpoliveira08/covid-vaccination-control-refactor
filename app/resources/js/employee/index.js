import EmployeeVaccineRepeater from "../employee-vaccination/repeater/EmployeeVaccineRepeater.js";
import FormatCpfInput from "../utils/format/Cpf.js";

EmployeeVaccineRepeater();

window.deleteRow = (event) => {
    const row = event.target.parentElement.parentElement;
    row.remove();
}

document.addEventListener('DOMContentLoaded', () => {
    FormatCpfInput(document.getElementById("employee-cpf"));
});

