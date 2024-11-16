const VaccineHelper = (vaccineData) => {
    const fillVaccineInputs = () => {
        const inputName = document.getElementById('vaccine-name');
        const inputBatch = document.getElementById('vaccine-batch');
        const inputExpirationDate = document.getElementById('vaccine-expiration-date');

        inputName.value = vaccineData.name;
        inputBatch.value = vaccineData.batch;
        inputExpirationDate.value = vaccineData.expiration_date;
    }

    return {
        fillVaccineInputs
    }
}

export default VaccineHelper;
