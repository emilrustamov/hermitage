window.addEventListener('load', function() {
    let percentageElement = document.getElementById('percentage');
    let progressBarElement = document.getElementById('progress-bar');
    const paths = document.querySelectorAll('#preloaderLogo svg g path');

    // Проверка на существование элементов и функции
    if (!percentageElement || !progressBarElement || !paths.length || typeof loadSvgatorAnimation !== 'function') {
        return; // Если чего-то не хватает, выходим из функции
    }

    let counter = 0;
    let currentIndex = 0;

    // Функция для обновления анимации SVGator
    function updateSvgatorAnimation(progress) {
        loadSvgatorAnimation(progress);
    }

    let interval = setInterval(function() {
        counter += 1;
        percentageElement.innerText = counter + '%';
        progressBarElement.style.width = counter + '%'; // Обновляем ширину прогресс-бара

        // Анимация SVG
        paths.forEach((path, index) => {
            path.style.opacity = index === currentIndex ? '1' : '0.1';
        });
        currentIndex = (currentIndex + 1) % paths.length;

        // Синхронизация анимации SVGator с увеличением счётчика
        updateSvgatorAnimation(counter);

        if (counter === 100) {
            clearInterval(interval);
            setTimeout(function() {
                var preloader = document.getElementById('preloader');
                if (preloader) {
                    preloader.classList.add('hidden');
        
                    setTimeout(function() {
                        preloader.style.display = 'none';
                        var content = document.getElementById('content');
                        if (content) {
                            content.style.display = 'block';
                        }
                    }, 500); // Время плавного исчезновения
                }
            }, 1000); // Добавьте небольшую задержку после завершения анимации
        }
    }, 45); // Скорость увеличения процента (40 мс)
});




document.addEventListener('DOMContentLoaded', function () {

    const elements = document.querySelectorAll('.scroll-effect');
    const handleScroll = () => {
        elements.forEach(element => {
            const rect = element.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top <= windowHeight && rect.bottom >= 0) {
                element.classList.add('visible');

                if (Math.random() > 0.5) {
                    element.classList.add('left');
                } else {
                    element.classList.add('right');
                }
            }
        });
    };

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check on page load

    const scrollToTopButton = document.getElementById('scrollToTopButton');

    // Функция для показа или скрытия кнопки при скролле
    window.addEventListener('scroll', function () {
        if (window.scrollY > 200) { // Показываем кнопку, если прокручено более 300px
            scrollToTopButton.style.display = 'block';
            scrollToTopButton.style.opacity = '0';
            scrollToTopButton.style.transition = 'opacity 0.3s ease-in-out';

            setTimeout(function () {
                scrollToTopButton.style.opacity = '1';
            }, 10); // Немного задержки для плавного эффекта
        } else {
            scrollToTopButton.style.opacity = '0';
            setTimeout(function () {
                scrollToTopButton.style.display = 'none';
            }, 300); // Учитываем время перехода для плавного скрытия
        }
    });

    // Прокрутка наверх при клике на кнопку
    scrollToTopButton.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Плавная прокрутка
        });
    });



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
