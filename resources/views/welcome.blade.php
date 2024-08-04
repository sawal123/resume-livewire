<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hi, Nama saya Sawalinto Saya bekerja sebagai Design Graphic di salah satu perusahaan di kota Medan dan juga Freelancer Web Developer.">
    <meta name="keywords" content="CV Sawalinto, Sawalinto">

    <title>Sawalinto</title>
    <link rel="shortcut icon" href="image/poto1.png">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/@fortawesome/fontawesome-free/css/brands.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/@fortawesome/fontawesome-free/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/@fortawesome/fontawesome-free/css/solid.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/aos/dist/aos.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
</head>

<body>
    @include('home.nav')
    <div class="container ">
        @include('home.home')
        @include('home.about')

        @include('home.skill')


        @include('home.project')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('[data-bs-toggle="popover"]').popover();
        });


        $(document).ready(function () {
            var name = "SAWALINTO";
            function typeName(name, iteration) {
                if (iteration === name.length)
                    return;
                setTimeout(function () {
                    $('.name').text($('.name').text() + name[iteration++]);
                    typeName(name, iteration);
                }, 200);
            }
            typeName(name, 0);
        });


        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;


            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";


        }
        document.getElementById("defaultOpen").click();


        function openProject(event, project) {
            var j, tabcontents, tablinkss;
            tabcontents = document.getElementsByClassName("tabcontents");
            for (j = 0; j < tabcontents.length; j++) {
                tabcontents[j].style.display = "none";
            }
            tablinkss = document.getElementsByClassName("tablinkss");
            for (j = 0; j < tablinkss.length; j++) {
                tablinkss[j].className = tablinkss[j].className.replace(" active", "");
            }
            document.getElementById(project).style.display = "block";
            event.currentTarget.className += " active";


        }
        document.getElementById("defaultPro").click();





        (() => {
            'use strict'

            const getStoredTheme = () => localStorage.getItem('theme')
            const setStoredTheme = theme => localStorage.setItem('theme', theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-bs-theme', 'dark')
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector('#bd-theme')

                if (!themeSwitcher) {
                    return
                }

                const themeSwitcherText = document.querySelector('#bd-theme-text')
                const activeThemeIcon = document.querySelector('.theme-icon-active')
                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon
                // const iconOfActiveBtn = btnToActive.querySelector('i').getAttribute('href')

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                    element.setAttribute('aria-pressed', 'false')
                })

                btnToActive.classList.add('active')
                activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
                activeThemeIcon.classList.add(iconOfActiveBtn)
                activeThemeIcon.dataset.iconActive = iconOfActiveBtn

              
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            setStoredTheme(theme)
                            setTheme(theme)
                            showActiveTheme(theme, true)
                        })
                    })
            })
        })()
    </script>


    <script src="{{asset('node_modules/aos/dist/aos.js')}}"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
