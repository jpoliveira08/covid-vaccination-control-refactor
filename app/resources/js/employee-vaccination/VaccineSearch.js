const VaccineSearch = async (searchValue, virtualSelect) => {
    try {
        const response = await fetch(`/vaccine/searchForVirtualSelect?search=${encodeURIComponent(searchValue)}`);

        if (!response.ok) {
            throw new Error('Erro ao buscar vacinas');
        }

        const data = await response.json();

        virtualSelect.setServerOptions(data.options);
    } catch (error) {
        console.error('Erro ao buscar vacinas:', error);
    }
}

export default VaccineSearch;
