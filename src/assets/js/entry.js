const subserviceForm = document.querySelector('.subservice__form');
const specialistForm = document.querySelector('.specialist__form');
const dateForm = document.querySelector('.period__form');

const timeForm = document.querySelector('.period__form__time-list');
const specialistList = document.querySelector('.specialist__list');

const serviceFormBtn = document.getElementById('entry-service-btn');
const specialistFormBtnPrev = document.getElementById('entry-specialist-btn-prev');
const specialistFormBtnNext = document.getElementById('entry-specialist-btn-next');
const dateFormBtnPrev = document.getElementById('entry-date-btn-prev');
const dateFormBtnNext = document.getElementById('entry-date-btn-next');

const DEFAULT_TIME = [
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "12:30",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "16:30",
    "17:00",
    "17:30",
    "18:00",
    "18:30",
]

const allDates = new Map();

const timeArrayLength = DEFAULT_TIME.length;

let subserviceId, specialistId, date, period;

function clearSpecialList () {
    const items = document.querySelectorAll('.specialist__item');
    items.forEach(item => {
        item.remove();
    });
}

function clearTimeList () {
    const items = document.querySelectorAll('.period__form__time-item');
    items.forEach(item => {
        item.remove();
    });
}

function drawSpecialists (id) {
    $.get( `http://beauty/services/getSpecialists.php?id=${id}`, function( data ) {
        const specialists = JSON.parse(data);
        clearSpecialList();
        specialists.forEach((spec) => {
            
            const li = document.createElement('li');
            li.classList.add('specialist__item');
            
            const label = document.createElement('label');
            label.setAttribute('for', `specialist-${spec.id}`);
            
            const input = document.createElement('input');
            input.setAttribute('type', "radio");
            input.setAttribute('name', "specialist");
            input.setAttribute('value', spec.id);
            input.setAttribute('id', `specialist-${spec.id}`);
            input.classList.add('specialist__item__input');
            
            const span = document.createElement('span');
            span.textContent = `${spec.name} ${spec.surname}`;
            
            label.appendChild(input);
            label.appendChild(span);
            
            li.appendChild(label);
            
            specialistList.appendChild(li);
        })
    });
}

function drawTime (id, date) {

    $.get( `http://beauty/services/getValidTime.php?id=${id}&date=${date}`, function( data ) {
        const time = JSON.parse(data);
        clearTimeList();
        DEFAULT_TIME.forEach((timeItem,idx) => {
            const li = document.createElement('li');
            li.classList.add('period__form__time-item');
    
            const input = document.createElement('input');
            input.setAttribute('type', "radio");
            input.setAttribute('id', `time-${idx}`);
            input.setAttribute('name', "time-input");
            input.classList.add('period__form__time-item');
            input.classList.add('hidden_input');
            
            li.appendChild(input);
            
            const label = document.createElement('label');
            label.setAttribute('for', `time-${idx}`);
            label.classList.add('period__form__time-block');
            if (data.includes(timeItem)) {
                label.classList.add('period__form__time-block_inactive');
            }
            label.textContent = timeItem;
    
            li.appendChild(label);
    
            timeForm.appendChild(li);
        })
    });
}

serviceFormBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll('input[name="subservice"]');
    let isAnyChecked = false;
    inputs.forEach(input => {
        if (!input.checked) return;
        isAnyChecked = true;
        subserviceId = input.value;
    })

    if (!isAnyChecked) return;

    drawSpecialists(subserviceId);

    subserviceForm.style.display = "none";
    specialistForm.style.display = "block";
});

specialistFormBtnPrev.addEventListener('click', (e) => {
    e.preventDefault();
    subserviceForm.style.display = "block";
    specialistForm.style.display = "none";
})

specialistFormBtnNext.addEventListener('click', (e) => {
    e.preventDefault();
    const inputs = document.querySelectorAll('input[name="specialist"]');
    let isAnyChecked = false;
    inputs.forEach(input => {
        if (!input.checked) return;
        isAnyChecked = true;
        specialistId = input.value;
    })

    if (!isAnyChecked) return;

    specialistForm.style.display = "none";
    dateForm.style.display = "block";
})

dateFormBtnPrev.addEventListener('click', (e) => {
    e.preventDefault();
    specialistForm.style.display = "block";
    dateForm.style.display = "none";
})

const datepickerInput = document.querySelector('.period__form__datepicker');
const periodPickerList = document.querySelector('.period__form__time-list');

periodPickerList.addEventListener('click', (e) => {
    if (!e.target.closest('.period__form__time-item')) return;
    if (e.target.textContent) {
        period = e.target.closest('.period__form__time-item').textContent;
    }
})

datepickerInput.addEventListener("focusout", (e) => {
    const fullDate = new Date(e.target.value);
    let day = fullDate.getDate();
    let month = fullDate.getMonth() + 1;
    let year = fullDate.getFullYear();
    if (day < 10) {
        day = `0${day}`;
    }
    if (month < 10) {
        month = `0${month}`
    }
    const dateFormated = `${day}-${month}-${year}`;
    date = dateFormated;

    drawTime(specialistId, dateFormated);
})

dateFormBtnNext.addEventListener('click', (e) => {
    e.preventDefault();
    $.ajax({
        url: 'http://beauty/services/bookUp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            date: date,
            period: period,
            subserviceId: subserviceId,
            specialistId: specialistId,
        },
        success: (data) => {
            if (data.success) {
                document.location.href = 'http://beauty/profile.php';
            }
        }
    });      
})
