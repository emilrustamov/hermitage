document.addEventListener('DOMContentLoaded', function () {
    // //sidebar
    // var cartIcon = document.getElementById('cartIcon');
    // var sidebar = document.getElementById('sidebar');
    // var closeSidebar = document.getElementById('closeSidebar');

    // // Открываем/закрываем сайдбар при клике на иконку корзины
    // cartIcon.addEventListener('click', function () {
    //     toggleSidebar();
    // });

    // // Закрываем сайдбар при клике на крестик
    // closeSidebar.addEventListener('click', function () {
    //     closeSidebarFunction();
    // });

    // // Закрываем сайдбар при клике вне него
    // window.addEventListener('click', function (event) {
    //     if (event.target !== cartIcon && event.target !== sidebar && !sidebar.contains(event.target)) {
    //         closeSidebarFunction();
    //     }
    // });



    // function closeSidebarFunction() {
    //     sidebar.style.right = '-27%';
    // }

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
   
});

// Проверяем, существует ли элемент с id 'partnersDropdown'
var partnersDropdownToggle = document.getElementById('partnersDropdown');
var partnersDropdownMenu = document.getElementById('partnersMenu');

if (partnersDropdownToggle && partnersDropdownMenu) {
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
}
