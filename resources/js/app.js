import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.start();

// resources/js/app.js

function changeMonth(direction) {
    const button = event.currentTarget;
    const currentYear = parseInt(button.dataset.year);
    const currentMonth = parseInt(button.dataset.month);
    let newYear = currentYear;
    let newMonth = currentMonth + direction;

    if (newMonth > 12) {
        newMonth = 1;
        newYear += 1;
    } else if (newMonth < 1) {
        newMonth = 12;
        newYear -= 1;
    }

    const url = `?year=${newYear}&month=${newMonth}`;
    window.location.href = url;
}

