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

    <title>Admin Pannel</title>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            font-family: "Roboto", sans-serif;
            font-family: "Roboto Mono", monospace;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="md:hidden bg-red-500">
        <nav class="nav w-1200 flex flex-wrap items-center mx-auto md:gap-6 justify-between md:justify-start px-4">
            <div class="flex flex-no-shrink items-center py-3 text-white mr-4">
                <span class="font-semibold text-xl tracking-tight">Creator</span>
            </div>
            <button onclick="menu(event)" class="md:hidden ml-4 inline-flex items-center justify-center rounded-md text-white hover:text-grey-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
                <svg class="block h-6 w-6 pointer-events-none" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path d="M6 36V33H42V36ZM6 25.5V22.5H42V25.5ZM6 15V12H42V15Z" />
                </svg>
                <svg class="block hidden h-6 w-6 pointer-events-none" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                    <path d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
                </svg>
            </button>
        </nav>
    </header>
    <div class="flex">
        <aside id="menu" class="w-full border-t md:border-none md:w-64 fixed md:relative hidden md:block z-10">
            <div class="sticky top-0 overflow-y-auto p-3 md:py-0 h-screen bg-red-500">
                <div class="hidden md:flex flex-no-shrink items-center justify-center mt-3 mb-5 text-white">
                    <span class="font-semibold text-xl tracking-tight">Creator</span>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a href="{{route('view.profile')}}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M28.4 26.65H36.9V24.15H28.4ZM28.4 32.3H36.9V29.8H28.4ZM29.2 14H41Q42.2 14 43.1 14.9Q44 15.8 44 17V41Q44 42.2 43.1 43.1Q42.2 44 41 44H7Q5.8 44 4.9 43.1Q4 42.2 4 41V17Q4 15.8 4.9 14.9Q5.8 14 7 14H18.85V7Q18.85 5.8 19.75 4.9Q20.65 4 21.85 4H26.2Q27.4 4 28.3 4.9Q29.2 5.8 29.2 7ZM21.85 17H26.2V7H21.85ZM17.7 29.8Q18.85 29.8 19.625 29.025Q20.4 28.25 20.4 27.1Q20.4 25.95 19.625 25.175Q18.85 24.4 17.7 24.4Q16.55 24.4 15.775 25.175Q15 25.95 15 27.1Q15 28.25 15.775 29.025Q16.55 29.8 17.7 29.8ZM11.6 35.65H23.55V34.95Q23.55 34.05 23.1 33.35Q22.65 32.65 21.95 32.4Q20.35 31.85 19.45 31.675Q18.55 31.5 17.7 31.5Q16.75 31.5 15.675 31.725Q14.6 31.95 13.25 32.4Q12.5 32.65 12.05 33.35Q11.6 34.05 11.6 34.95Z" />
                            </svg>
                            <span class="font-semibold text-md">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings') }}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M19.4 44 18.4 37.7Q17.45 37.35 16.4 36.75Q15.35 36.15 14.55 35.5L8.65 38.2L4 30L9.4 26.05Q9.3 25.6 9.275 25.025Q9.25 24.45 9.25 24Q9.25 23.55 9.275 22.975Q9.3 22.4 9.4 21.95L4 18L8.65 9.8L14.55 12.5Q15.35 11.85 16.4 11.25Q17.45 10.65 18.4 10.35L19.4 4H28.6L29.6 10.3Q30.55 10.65 31.625 11.225Q32.7 11.8 33.45 12.5L39.35 9.8L44 18L38.6 21.85Q38.7 22.35 38.725 22.925Q38.75 23.5 38.75 24Q38.75 24.5 38.725 25.05Q38.7 25.6 38.6 26.1L44 30L39.35 38.2L33.45 35.5Q32.65 36.15 31.625 36.775Q30.6 37.4 29.6 37.7L28.6 44ZM24 30.5Q26.7 30.5 28.6 28.6Q30.5 26.7 30.5 24Q30.5 21.3 28.6 19.4Q26.7 17.5 24 17.5Q21.3 17.5 19.4 19.4Q17.5 21.3 17.5 24Q17.5 26.7 19.4 28.6Q21.3 30.5 24 30.5Z" />
                            </svg>
                            <span class="font-semibold text-md">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.list') }}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M1.9 40V35.3Q1.9 33.55 2.8 32.125Q3.7 30.7 5.3 30Q8.95 28.4 11.875 27.7Q14.8 27 17.9 27Q21 27 23.9 27.7Q26.8 28.4 30.45 30Q32.05 30.7 32.975 32.125Q33.9 33.55 33.9 35.3V40ZM36.9 40V35.3Q36.9 32.15 35.3 30.125Q33.7 28.1 31.1 26.85Q34.55 27.25 37.6 28.025Q40.65 28.8 42.55 29.8Q44.2 30.75 45.15 32.15Q46.1 33.55 46.1 35.3V40ZM17.9 23.95Q14.6 23.95 12.5 21.85Q10.4 19.75 10.4 16.45Q10.4 13.15 12.5 11.05Q14.6 8.95 17.9 8.95Q21.2 8.95 23.3 11.05Q25.4 13.15 25.4 16.45Q25.4 19.75 23.3 21.85Q21.2 23.95 17.9 23.95ZM28.4 23.95Q27.85 23.95 27.175 23.875Q26.5 23.8 25.95 23.6Q27.15 22.35 27.775 20.525Q28.4 18.7 28.4 16.45Q28.4 14.2 27.775 12.475Q27.15 10.75 25.95 9.3Q26.5 9.15 27.175 9.05Q27.85 8.95 28.4 8.95Q31.7 8.95 33.8 11.05Q35.9 13.15 35.9 16.45Q35.9 19.75 33.8 21.85Q31.7 23.95 28.4 23.95Z" />
                            </svg>
                            <span class="font-semibold text-md">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('schedule.view') }}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M24 28Q23.15 28 22.575 27.425Q22 26.85 22 26Q22 25.15 22.575 24.575Q23.15 24 24 24Q24.85 24 25.425 24.575Q26 25.15 26 26Q26 26.85 25.425 27.425Q24.85 28 24 28ZM16 28Q15.15 28 14.575 27.425Q14 26.85 14 26Q14 25.15 14.575 24.575Q15.15 24 16 24Q16.85 24 17.425 24.575Q18 25.15 18 26Q18 26.85 17.425 27.425Q16.85 28 16 28ZM32 28Q31.15 28 30.575 27.425Q30 26.85 30 26Q30 25.15 30.575 24.575Q31.15 24 32 24Q32.85 24 33.425 24.575Q34 25.15 34 26Q34 26.85 33.425 27.425Q32.85 28 32 28ZM24 36Q23.15 36 22.575 35.425Q22 34.85 22 34Q22 33.15 22.575 32.575Q23.15 32 24 32Q24.85 32 25.425 32.575Q26 33.15 26 34Q26 34.85 25.425 35.425Q24.85 36 24 36ZM16 36Q15.15 36 14.575 35.425Q14 34.85 14 34Q14 33.15 14.575 32.575Q15.15 32 16 32Q16.85 32 17.425 32.575Q18 33.15 18 34Q18 34.85 17.425 35.425Q16.85 36 16 36ZM32 36Q31.15 36 30.575 35.425Q30 34.85 30 34Q30 33.15 30.575 32.575Q31.15 32 32 32Q32.85 32 33.425 32.575Q34 33.15 34 34Q34 34.85 33.425 35.425Q32.85 36 32 36ZM9 44Q7.8 44 6.9 43.1Q6 42.2 6 41V10Q6 8.8 6.9 7.9Q7.8 7 9 7H12.25V4H15.5V7H32.5V4H35.75V7H39Q40.2 7 41.1 7.9Q42 8.8 42 10V41Q42 42.2 41.1 43.1Q40.2 44 39 44ZM9 41H39Q39 41 39 41Q39 41 39 41V19.5H9V41Q9 41 9 41Q9 41 9 41Z" />
                            </svg>
                            <span class="font-semibold text-md">Schedule</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view_projects') }}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M13.05 21.7 24.05 4 35.05 21.7ZM35.3 44Q31.6 44 29.1 41.5Q26.6 39 26.6 35.3Q26.6 31.6 29.1 29.1Q31.6 26.6 35.3 26.6Q39 26.6 41.5 29.1Q44 31.6 44 35.3Q44 39 41.5 41.5Q39 44 35.3 44ZM6 42.75V27.55H21.2V42.75Z" />
                            </svg>
                            <span class="font-semibold text-md">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.logout')}}" class="flex items-center text-white gap-2 p-2 w-full rounded-lg hover:bg-gray-50 hover:bg-opacity-25">
                            <svg class="w-6 h-6" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                <path d="M9 42Q7.8 42 6.9 41.1Q6 40.2 6 39V9Q6 7.8 6.9 6.9Q7.8 6 9 6H23.55V9H9Q9 9 9 9Q9 9 9 9V39Q9 39 9 39Q9 39 9 39H23.55V42ZM33.3 32.75 31.15 30.6 36.25 25.5H18.75V22.5H36.15L31.05 17.4L33.2 15.25L42 24.05Z" />
                            </svg>
                            <span class="font-semibold text-md">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="max-w-full flex-1 p-4">@yield('content')</main>
    </div>
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