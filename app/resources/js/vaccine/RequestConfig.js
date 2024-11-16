const RequestConfig = (method = 'POST', body) => {
    body.append('_method', method);

    return {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: body
    };
}

export default RequestConfig;
