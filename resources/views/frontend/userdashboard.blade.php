<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <title>Document</title>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-family: "Roboto", sans-serif;
            font-family: "Roboto Mono", monospace;
        }

        .w-1200 {
            width: 100%;
            max-width: 1200px;
        }

        input[type="checkbox"] {
            accent-color: #ef4444;
        }

        option:disabled {
            background: rgb(192 190 168);
        }

        option:checked {
            background: #ef4444;
            color: #fff;
        }

        select:not([multiple]),
        #date {
            appearance: none;
            -webkit-appearance: none;
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
        }

        select:not([multiple]) {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath d='M24 30.75 12 18.75 14.15 16.6 24 26.5 33.85 16.65 36 18.8Z'/%3E%3C/svg%3E");
        }

        #date {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath d='M9 44Q7.8 44 6.9 43.1Q6 42.2 6 41V10Q6 8.8 6.9 7.9Q7.8 7 9 7H12.25V4H15.5V7H32.5V4H35.75V7H39Q40.2 7 41.1 7.9Q42 8.8 42 10V41Q42 42.2 41.1 43.1Q40.2 44 39 44ZM9 41H39Q39 41 39 41Q39 41 39 41V19.5H9V41Q9 41 9 41Q9 41 9 41Z'/%3E%3C/svg%3E");
        }

        select[data-lang="AR"],
        #date[data-lang="AR"] {
            background-position: left 1rem center;
        }

        .header [data-lang="AR"] {
            flex-direction: row-reverse;
            text-align: right;
        }

        .header li[data-lang="AR"] {
            margin-right: auto;
            margin-left: unset;
        }

        form [data-lang="AR"] {
            text-align: right;
            justify-content: end;
        }

        form .EN[data-lang="AR"] {
            flex-direction: row-reverse;
        }
    </style>
</head>

<body>
    <header class="header bg-red-500 text-white">
        <nav data-lang="EN" class="w-1200 flex flex-wrap items-center mx-auto md:gap-6 justify-start">
            <div data-lang="EN" class="w-full md:w-max px-4 md:px-0 flex items-center justify-between">
                <div class="flex flex-no-shrink items-center py-4 text-grey-darkest">
                    <span data-lang-id="brand" class="font-black text-xl tracking-tight">Luke Bennett</span>
                </div>
                <button onclick="menu(event)" class="md:hidden inline-flex items-center justify-center rounded-md text-white hover:text-grey-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                    <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <path d="M6 36V33H42V36ZM6 25.5V22.5H42V25.5ZM6 15V12H42V15Z" />
                    </svg>
                    <svg class="block hidden h-6 w-6 pointer-events-none" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <path d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
                    </svg>
                </button>
            </div>
            <ul data-lang="EN" id="menu" class="hidden border-t md:border-none md:flex m-0 w-full md:w-0 md:flex-1 md:w-auto flex-col md:flex-row md:gap-4">
                <li class="px-4 md:px-0 py-2 md:py-0">
                    <a data-lang-id="project" data-lang="EN" href="{{ route('view.project') }}" class="block md:inline-block font-black underline">
                        Project
                    </a>
                </li>
                <li class="px-4 md:px-0 py-2 md:py-0">
                    <a data-lang-id="consult" data-lang="EN" href="{{url('/')}}" class="block md:inline-block">
                        Consult
                    </a>
                </li>
                <li data-lang="EN" class="px-4 md:px-0 py-2 md:py-0 ml-auto">
                    <button id="lang" data-lang="EN" data-lang-id="lang" onclick="setLang(event)" class="langbtn w-full md:w-max text-left">
                        Language: EN
                    </button>
                </li>
            </ul>
        </nav>
    </header>
    <main class="w-1200 mx-auto p-4 md:p-0">@yield('content')</main>
    <script defer>
        function menu(e) {
            const mnu = document.querySelector("#menu");
            const icn = e.target.querySelectorAll("svg");
            const btn = e.target;
            icn.forEach((svg) => {
                svg.classList.toggle("hidden");
            });
            mnu.classList.toggle("hidden");
        }

        function setText(lang) {
            var data = DICT[lang];
            document.querySelectorAll("[data-lang-id]").forEach((el) => {
                var id = el.dataset.langId;
                el.innerHTML = data[id];
                if (el.tagName === "INPUT") el.setAttribute("placeholder", data[id]);
            });
        }

        function setLang(e) {
            var lang = localStorage.getItem("lang");
            lang = lang === "EN" ? "AR" : "EN";
            localStorage.setItem("lang", lang);
            e.target.innerHTML = DICT[lang].lang;
            document.querySelectorAll("[data-lang]").forEach((el) => {
                el.dataset.lang = lang;
            });
            setText(lang);
        }

        (() => {
            var lang = localStorage.getItem("lang");
            lang = lang ? lang : "EN";
            document.querySelector("#lang").innerHTML = DICT[lang].lang;
            document.querySelectorAll("[data-lang]").forEach((el) => {
                el.dataset.lang = lang;
            });
            setText(lang);
        })()
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>
</body>

</html>