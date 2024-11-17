import VaccineSearch from '../VaccineSearch.js';

const InitializeVaccineVirtualSelect = async (element, inputName) => {
    let vaccineId = element.dataset.vaccineId;
    let options = {};

    if (vaccineId) {
        try {
            const response = await fetch(`/vaccine/${vaccineId}`);
            if (!response.ok) {
                throw new Error('Erro ao buscar vacinas');
            }

            const data = await response.json();

            options = {
                label: `Name: ${data.name}, Batch: ${data.batch}, Expiration date: ${data.expiration_date}`,
                value: data.id
            }
        } catch (error) {
            console.error('Erro ao buscar vacinas:', error);
        }
    }

    await window.VirtualSelect.init({
        ele: element,
        options: [options],
        maxWidth: '500px',
        search: true,
        name: inputName,
        onServerSearch: VaccineSearch,
        autoSelectFirstOption: true,
        searchPlaceholderText: 'Start typing to search...',
        maxOptions: 100,
    });
}

export default InitializeVaccineVirtualSelect;
