/**
 * Enables HTML input elements based on the provided IDs.
 *
 * @param {string[]} inputsId
 * @constructor
 */
const EnableInputs = (inputsId) => {
    if (!inputsId || inputsId.length === 0) {
        console.error('EnableInputs function called without any input IDs.');
        return;
    }

    inputsId.forEach(inputId => {
        let input = document.getElementById(inputId);
        if (input) {
            input.disabled= false;
        }
    });
}

export default EnableInputs;
