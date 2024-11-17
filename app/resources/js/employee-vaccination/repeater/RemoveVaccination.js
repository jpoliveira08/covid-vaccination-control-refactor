const RemoveVaccination = (event) => {
    let removeButton = event.currentTarget;
    let vaccinationRow = removeButton.closest('.vaccine-repeater-item');

    vaccinationRow.remove();
}

export default RemoveVaccination;
