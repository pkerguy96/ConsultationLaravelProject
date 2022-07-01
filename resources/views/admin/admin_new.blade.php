@extends('dashboard')
@section('content')
<section class="w-full my-6 md:my-10">
    <h1 class="text-3xl font-bold mb-8 flex items-center justify-between">Nouveau Admin</h1>
    <div class="w-full rounded-md p-4 bg-white">
        <form action="{{route('create.admin')}}" method="post">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="last-name">
                            <span>Nom</span>
                        </label>
                        <input name="last_name" id="last-name" placeholder="Nom" type="text" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="first-name">
                            <span>Prenom</span>
                        </label>
                        <input name="name" id="first-name" placeholder="Prenom" type="text" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="email">
                            <span>Email</span>
                        </label>
                        <input name="email" id="email" placeholder="Email" type="email" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="password">
                            <span>Mot de passe</span>
                        </label>
                        <div class="relative">
                            <input name="password" id="password" type="text" placeholder="Mot de passe" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                            <span class="absolute flex items-center justify-center inset-y-0 right-0 pr-3">
                                <button class="w-4 h-4 cursor-pointer rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" onclick="copy()" type="button">
                                    <svg class="text-grey-darkest w-4 h-4 group-hover:text-grey-darkest" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.77 122.88">
                                        <g>
                                            <path d="M89.62,13.96v7.73h12.19h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02v0.02 v73.27v0.01h-0.02c-0.01,3.84-1.57,7.33-4.1,9.86c-2.51,2.5-5.98,4.06-9.82,4.07v0.02h-0.02h-61.7H40.1v-0.02 c-3.84-0.01-7.34-1.57-9.86-4.1c-2.5-2.51-4.06-5.98-4.07-9.82h-0.02v-0.02V92.51H13.96h-0.01v-0.02c-3.84-0.01-7.34-1.57-9.86-4.1 c-2.5-2.51-4.06-5.98-4.07-9.82H0v-0.02V13.96v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07V0h0.02h61.7 h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02V13.96L89.62,13.96z M79.04,21.69v-7.73v-0.02h0.02 c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v64.59v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h12.19V35.65 v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07v-0.02h0.02H79.04L79.04,21.69z M105.18,108.92V35.65v-0.02 h0.02c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v73.27v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h61.7h0.02 v0.02c0.91,0,1.75-0.39,2.37-1.01c0.61-0.61,1-1.46,1-2.37h-0.02V108.92L105.18,108.92z"></path>
                                        </g>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex justify-end">
                    <button type="submit" class="px-6 py-2 text-white w-full md:w-48 bg-blue-500 rounded-md hover:bg-blue-400 flex gap-6 items-center justify-center">
                        <span>Creer</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<script defer>
    function copy() {
        var el = document.querySelector("#password");
        el.select();
        document.execCommand("copy");
    }

    const pass = (Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)).slice(10, 20);
    document.querySelector("#password").value = pass;
</script>
@endsection