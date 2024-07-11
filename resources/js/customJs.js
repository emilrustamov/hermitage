document.addEventListener('DOMContentLoaded', function () {
    //sidebar
    var cartIcon = document.getElementById('cartIcon');
    var sidebar = document.getElementById('sidebar');
    var closeSidebar = document.getElementById('closeSidebar');

    // Открываем/закрываем сайдбар при клике на иконку корзины
    cartIcon.addEventListener('click', function () {
        toggleSidebar();
    });

    // Закрываем сайдбар при клике на крестик
    closeSidebar.addEventListener('click', function () {
        closeSidebarFunction();
    });

    // Закрываем сайдбар при клике вне него
    window.addEventListener('click', function (event) {
        if (event.target !== cartIcon && event.target !== sidebar && !sidebar.contains(event.target)) {
            closeSidebarFunction();
        }
    });

    function toggleSidebar() {
        var sidebarStyle = window.getComputedStyle(sidebar);
        var sidebarRight = sidebarStyle.getPropertyValue('right');

        if (sidebarRight === '0px' || sidebarRight === '0') {
            sidebar.style.right = '-27%';
        } else {
            sidebar.style.right = '0';
        }
    }

    function closeSidebarFunction() {
        sidebar.style.right = '-27%';
    }

    const dropdownToggle = document.getElementById('languageDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    dropdownToggle.addEventListener('click', function () {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    dropdownItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            const selectedLang = this.getAttribute('data-lang');
            const currentPath = window.location.pathname.split('/').slice(2).join('/'); // Игнорируем первый сегмент (текущий язык)
            const newUrl = `/${selectedLang}/${currentPath}`;
            window.location.href = newUrl;
        });
    });

    // Закрытие выпадающего списка при клике вне его
    window.addEventListener('click', function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });

    // fadein items
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.intersectionRatio > 0.3) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3  // задаем порог в 20% высоты элемента
    });

    const fadeElements = document.querySelectorAll('.scroll-fade-in');
    fadeElements.forEach(element => {
        observer.observe(element);
    });
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





    //partnersDropdown
    var partnersDropdownToggle = document.getElementById('partnersDropdown');
    var partnersDropdownMenu = document.getElementById('partnersMenu');

    partnersDropdownToggle.addEventListener('click', function () {
        if (partnersDropdownMenu.style.display === 'none') {
            partnersDropdownMenu.style.display = 'block';
        } else {
            partnersDropdownMenu.style.display = 'none';
        }
    });

    document.addEventListener('click', function (event) {
        if (!partnersDropdownToggle.contains(event.target) && !partnersDropdownMenu.contains(event.target)) {
            partnersDropdownMenu.style.display = 'none';
        }
    });



});

