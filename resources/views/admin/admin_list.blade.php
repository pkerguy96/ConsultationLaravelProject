@extends('dashboard')
@section('content')
<section class="w-full my-6 md:my-10">
    <div class="w-full flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold flex items-center justify-between">Liste Admins</h1>
        <a href="{{route('Add.admin')}}" class="rounded-md hover:bg-gray-50 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-6 h-6 text-grey-darkest" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path d="M25.5 29.1H28.5V22.5H35.1V19.5H28.5V12.9H25.5V19.5H18.9V22.5H25.5ZM13 38Q11.8 38 10.9 37.1Q10 36.2 10 35V7Q10 5.8 10.9 4.9Q11.8 4 13 4H41Q42.2 4 43.1 4.9Q44 5.8 44 7V35Q44 36.2 43.1 37.1Q42.2 38 41 38ZM7 44Q5.8 44 4.9 43.1Q4 42.2 4 41V10H7V41Q7 41 7 41Q7 41 7 41H38V44Z" />
            </svg>
        </a>
    </div>
    <div class="w-full rounded-md bg-white overflow-x-auto">
        <table class="w-full whitespace-no-wrap bg-white">
            <thead>
                <tr class="text-xs font-bold tracking-wide uppercase text-left border-b border-grey-darkest text-grey-darkest">
                    <th class="px-4 py-3 text-center">Nom</th>
                    <th class="px-4 py-3 text-center">Prenom</th>
                    <th class="px-4 py-3 text-center">Email</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-darkest">
                @forelse ( $admins as $row)
                <tr class="text-grey-darkest">

                    <td class="px-4 py-3 text-sm text-center">
                        {{ $row->name }}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{ $row->last_name }}
                    </td>
                    <td class="px-4 py-3 text-xs text-center">
                        {{ $row->email }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2 items-center justify-center text-sm">
                            <a href="{{route('modify.admin',$row->id)}}" class="flex items-center justify-between text-sm font-medium leading-5 rounded-lg text-grey-darkest focus:outline-none focus:shadow-outline-gray" aria-label="Edit">

                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <path d="M39.7 14.7 33.3 8.3 35.4 6.2Q36.25 5.35 37.525 5.375Q38.8 5.4 39.65 6.25L41.8 8.4Q42.65 9.25 42.65 10.5Q42.65 11.75 41.8 12.6ZM37.6 16.8 12.4 42H6V35.6L31.2 10.4Z" />
                                </svg>

                            </a>
                            <a href="{{route('delete.admin',$row->id)}}" class="flex items-center justify-between text-sm font-medium leading-5 rounded-lg text-grey-darkest focus:outline-none focus:shadow-outline-gray" aria-label="Delete">

                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <path d="M13.05 42Q11.85 42 10.95 41.1Q10.05 40.2 10.05 39V10.5H8V7.5H17.4V6H30.6V7.5H40V10.5H37.95V39Q37.95 40.2 37.05 41.1Q36.15 42 34.95 42ZM18.35 34.7H21.35V14.75H18.35ZM26.65 34.7H29.65V14.75H26.65Z" />
                                </svg>

                            </a>
                        </div>
                    </td>


                </tr>
                @empty
                <tr class="text-grey-darkest">
                    <h1>No Admin Is Currently Added</h1>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection