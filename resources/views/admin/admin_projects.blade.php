@extends('dashboard')
@section('content')
<section class="w-full my-6 md:my-10">
    <div class="w-full flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold flex items-center justify-between">Projects list</h1>
    </div>
    <div class="w-full rounded-md bg-white overflow-x-auto">
        <table class="w-full whitespace-no-wrap bg-white">
            <thead>
                <tr class="text-xs font-bold tracking-wide uppercase text-left border-b border-grey-darkest text-grey-darkest">
                    <th class="px-4 py-3 text-center">Name</th>
                    <th class="px-4 py-3 text-center">Email</th>
                    <th class="px-4 py-3 text-center">Phone</th>
                    <th class="px-4 py-3 text-center">Project type</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-darkest">
                @forelse ( $data as $row)
                <tr class="text-grey-darkest">
                    <td class="px-4 py-3 text-sm text-center">
                        {{$row->name}}
                    </td>
                    <td class="px-4 py-3 text-xs text-center">
                        {{$row->email}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{$row->phone}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{$row->project_type}}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex gap-2 items-center justify-center text-sm">
                            <button class="flex items-center justify-between text-sm font-medium leading-5 rounded-lg text-grey-darkest focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <path d="M39.7 14.7 33.3 8.3 35.4 6.2Q36.25 5.35 37.525 5.375Q38.8 5.4 39.65 6.25L41.8 8.4Q42.65 9.25 42.65 10.5Q42.65 11.75 41.8 12.6ZM37.6 16.8 12.4 42H6V35.6L31.2 10.4Z" />
                                </svg>
                            </button>
                            <button class="flex items-center justify-between text-sm font-medium leading-5 rounded-lg text-grey-darkest focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <path d="M13.05 42Q11.85 42 10.95 41.1Q10.05 40.2 10.05 39V10.5H8V7.5H17.4V6H30.6V7.5H40V10.5H37.95V39Q37.95 40.2 37.05 41.1Q36.15 42 34.95 42ZM18.35 34.7H21.35V14.75H18.35ZM26.65 34.7H29.65V14.75H26.65Z" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="text-grey-darkest">
                    <h1>Theres no projects submitted.</h1>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</section>
@endsection