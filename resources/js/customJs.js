document.addEventListener('DOMContentLoaded', function () {
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


   //partnersDropdown
   var partnersDropdownToggle = document.getElementById('partnersDropdown');
    var partnersDropdownMenu = document.getElementById('partnersMenu');

    partnersDropdownToggle.addEventListener('click', function() {
        if (partnersDropdownMenu.style.display === 'none') {
            partnersDropdownMenu.style.display = 'block';
        } else {
            partnersDropdownMenu.style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!partnersDropdownToggle.contains(event.target) && !partnersDropdownMenu.contains(event.target)) {
            partnersDropdownMenu.style.display = 'none';
        }
    });
});

