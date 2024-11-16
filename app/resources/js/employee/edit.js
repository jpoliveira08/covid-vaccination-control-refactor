import VaccineSearch from "../employee-vaccination/VaccineSearch.js";
import FormatCpfInput from "../utils/format/Cpf.js";

// let selects = document.querySelectorAll('.vaccineSelect');
// selects.forEach(select => {
//     let vaccine = {
//         id: select.dataset.vaccineId,
//         name: select.dataset.vaccineName,
//         batch: select.dataset.vaccineBatch,
//         expirationDate: select.dataset.vaccineExpirationDate,
//     };
//
//     const optionsWithVaccine = {
//         label: `Name: ${vaccine.name}, Batch: ${vaccine.batch}, Expiration date: ${vaccine.expirationDate}`,
//         value: vaccine.id
//     }
//
//     window.VirtualSelect.init({
//         ele: select,
//         options: [vaccine.id ? optionsWithVaccine : {}],
//         name: select.dataset.inputName,
//         autoSelectFirstOption: true,
//         searchPlaceholderText: 'Start typing to search...',
//         maxWidth: '500px',
//         search: true,
//         onServerSearch: VaccineSearch,
//         maxOptions: 100,
//     });
// });
document.addEventListener('DOMContentLoaded', () => {
    FormatCpfInput(document.getElementById("employee-cpf"));
});

