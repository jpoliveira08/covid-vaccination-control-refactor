import EmployeeVaccineRepeater from "../employee-vaccination/repeater/EmployeeVaccineRepeater.js";
import FormatCpfInput from "../utils/format/Cpf.js";
import RemoveVaccination from "../employee-vaccination/repeater/RemoveVaccination.js";

document.addEventListener('DOMContentLoaded', () => {
    EmployeeVaccineRepeater();
    FormatCpfInput(document.getElementById("employee-cpf"));

    window.removeVaccination = RemoveVaccination;
});



