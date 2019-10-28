require('./bootstrap');
require('./initMaterialize');
const { init } = require('./init');

document.addEventListener('DOMContentLoaded', function() {
    init();
});
