@extends('dashboard')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" />
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" defer></script>
<section class="w-full my-6 md:my-10">
    <h1 class="text-3xl font-bold mb-8 flex items-center justify-between">Schedule</h1>
    <div id="calendar" class="w-full rounded-md p-4 bg-white"></div>
    <div id="overlay" class="hidden fixed p-4 inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center">
        <button onclick="toggle()" class="absolute top-2 right-2 inline-flex items-center justify-center rounded-md text-white hover:text-grey-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500">
            <svg class="block w-10 h-10 pointer-events-none" fill="currentcolor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path d="M12.45 37.65 10.35 35.55 21.9 24 10.35 12.45 12.45 10.35 24 21.9 35.55 10.35 37.65 12.45 26.1 24 37.65 35.55 35.55 37.65 24 26.1Z" />
            </svg>
        </button>
        <div class="w-full md:w-1/2 rounded-md p-4 bg-white">
            <div class="flex flex-col gap-4">
                <div class="flex-1 flex flex-col gap-2">
                    <label id="title" class="text-xl md:text-2xl mb-2 font-black flex justify-between text-grey-darkest"></label>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <label class="text-md flex justify-between text-grey-darkest">Name</label>
                    <div id="name" class="h-12 text-md flex items-center w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></div>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <label class="text-md flex justify-between text-grey-darkest">Email</label>
                    <div id="email" class="h-12 text-md flex items-center w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></div>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <label class="text-md flex justify-between text-grey-darkest">Phone</label>
                    <div id="phone" class="h-12 text-md flex items-center w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></div>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <label class="text-md flex justify-between text-grey-darkest">Project type</label>
                    <div id="type" class="h-12 text-md flex items-center w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .fc-header-toolbar {
        flex-wrap: wrap;
    }

    .fc-header-toolbar .fc-toolbar-chunk:nth-child(2) {
        text-align: center;
        width: 100%;
        order: -1;
    }

    .fc-header-toolbar button,
    .fc-header-toolbar .fc-icon {
        background-color: #ef4444 !important;
        vertical-align: unset !important;
        font-size: 14px !important;
        border: unset !important;
    }
</style>
<script defer>
    document.addEventListener("DOMContentLoaded", async function() {
        var events = await getSchedules();
        var calendarEl = document.getElementById("calendar");

        var Calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: "dayGridMonth",
            initialDate: Date.now(),
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay,list",
            },
            businessHours: {
                daysOfWeek: [1, 2, 3, 4, 5],
                startTime: "16:00",
                endTime: "19:00",
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault();
                var data = JSON.parse(info.event.id);
                setData(data);
                toggle();
            },
            events: events,
            eventColor: "#ef4444"
        });

        Calendar.render();
        window.c = Calendar;
    });

    async function getSchedules() {
        var req = await fetch("/schedule/view/all");
        var res = await req.json();
        return res.data.map(el => ({
            title: el.name,
            start: `${el.date}T0${el.hour}:00:00`,
            url: "#",
            id: JSON.stringify({
                ...el,
                type: el.project_type
            }),
        }))
    }


    window.addEventListener("resize", function() {
        document.querySelector("#calendar").style.height = window.innerHeight + "px";
    });

    const daysList = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const monthsList = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Aug", "Oct", "Nov", "Dec"];
    let amOrPm;

    function twelveHours(date) {
        if (date.getHours() > 12) {
            amOrPm = "PM";
            let twentyFourHourTime = date.getHours();
            let conversion = twentyFourHourTime - 12;
            return `${conversion}`;
        } else {
            amOrPm = "AM";
            return `${date.getHours()}`;
        }
    }

    function setData(data) {
        const date = new Date(data.date + " 0" + data.hour + ":00:00 pm");
        let _date = date.getDate();
        let month = monthsList[date.getMonth()];
        let year = date.getFullYear();
        let day = daysList[date.getDay()];

        let today = `${_date} ${month} ${year}, ${day}`;
        let hours = twelveHours(date);
        let minutes = date.getMinutes();
        let currentTime = `${hours > 9 ? hours : "0" + hours}:${minutes > 9 ? minutes : "0" + minutes} ${amOrPm}`;

        document.getElementById("title").innerHTML = today + " " + currentTime;
        document.getElementById("name").innerHTML = data["name"];
        document.getElementById("email").innerHTML = data["email"];
        document.getElementById("phone").innerHTML = data["phone"];
        document.getElementById("type").innerHTML = data["type"];
    }

    function toggle() {
        var ovl = document.querySelector("#overlay");
        ovl.classList.toggle("hidden");
    }
</script>

@endsection