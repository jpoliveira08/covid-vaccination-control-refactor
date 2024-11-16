const UrlBuilder = (method, idVaccine = null) => {
    const url = '/vaccine';

    const methodsWithId = ['PUT', 'DELETE'];

    const build = () => {
        if (methodsWithId.includes(method) && idVaccine) {
            return `${url}/${idVaccine}`;
        }

        return url;
    }

    return { build };
}

export default UrlBuilder;
