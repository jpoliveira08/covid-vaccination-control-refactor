/**
 * Disables HTML input elements based on the provided IDs.
 *
 * @param {string[]} inputsId
 * @constructor
 */
const DisableInputs = (inputsId) => {
    if (!inputsId || inputsId.length === 0) {
        console.error('DisableInputs function called without any input IDs.');
        return;
    }

    inputsId.forEach(inputId => {
        let input = document.getElementById(inputId);
        if (input) {
            input.disabled= true;
        }
    });
}

export default DisableInputs;
