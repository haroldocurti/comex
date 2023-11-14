// formScript.js

// Show/hide fields based on the selected product type
const hardwareFields = document.getElementById('hardwareFields');
const gamesFields = document.getElementById('gamesFields');
const hardwareRadio = document.getElementById('hardware');
const gamesRadio = document.getElementById('games');

hardwareRadio.addEventListener('change', function () {
    hardwareFields.style.display = 'block';
    gamesFields.style.display = 'none';
});

gamesRadio.addEventListener('change', function () {
    hardwareFields.style.display = 'none';
    gamesFields.style.display = 'block';
});
function toggleAddressInput() {
    const addressFields = document.getElementById('addressFields');
    const addressOption = document.getElementById('addressOption');

    if (addressOption.value === 'yes') {
        addressFields.style.display = 'block';
    } else {
        addressFields.style.display = 'none';
    }
}
