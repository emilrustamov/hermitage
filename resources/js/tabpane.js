//custom tabs
document.querySelector('.tab-pane').classList.add('active');

document.querySelectorAll('.tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
        document.querySelectorAll('.tab').forEach(function (t) {
            t.classList.remove('active');
        });
        document.querySelectorAll('.tab-pane').forEach(function (tp) {
            tp.classList.remove('active');
        });

        this.classList.add('active');

        var tabId = this.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
        // Показать или скрыть нужные секции
        if (tabId === 'tab1') {
            document.getElementById('architectureProj').classList.remove('d-none');
            document.getElementById('architectureProj').classList.add('d-flex');
            document.getElementById('designProj').classList.remove('d-flex');
            document.getElementById('designProj').classList.add('d-none');
        } else if (tabId === 'tab2') {
            document.getElementById('architectureProj').classList.remove('d-flex');
            document.getElementById('architectureProj').classList.add('d-none');
            document.getElementById('designProj').classList.remove('d-none');
            document.getElementById('designProj').classList.add('d-flex');
        }
    });
});


function toggleRadio(radio) {
    // Если радиокнопка уже выбрана, снимаем выбор
    if (radio.wasChecked) {
        radio.checked = false;
    }
    // Обновляем состояние wasChecked
    radio.wasChecked = radio.checked;
}

document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', function () {
        const projectType = this.dataset.tab === 'tab1' ? 'Архитектурное проектирование' : 'Дизайн интерьера';
        document.getElementById('projectType').value = projectType;
    });
});