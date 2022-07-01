@extends('dashboard')
@section('content')

<section class="w-full my-6 md:my-10">
    <h1 class="text-3xl font-bold mb-8 flex items-center justify-between">Profile</h1>
    <div class="w-full rounded-md p-4 bg-white">
        <form action="{{ route('update.admin') }}" method="post">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="admin_id">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="last-name">
                            <span>Nom</span>
                        </label>
                        <input name="name" value="{{$data->name}}" id="last-name" placeholder="{{$data->name}}" type="text" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="first-name">
                            <span>Prenom</span>
                        </label>
                        <input name="last_name" value="{{$data->last_name}}" id="first-name" placeholder="{{$data->last_name}}" type="text" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <label class="flex justify-between text-grey-darkest" for="email">
                        <span>Email</span>
                    </label>
                    <input name="email" value="{{$data->email}}" id="email" placeholder="{$data->email}}" type="email" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                </div>
                <div class="flex-1 flex justify-end">
                    <button type="submit" class="px-6 py-2 text-white w-full md:w-48 bg-blue-500 rounded-md hover:bg-blue-400 flex gap-6 items-center justify-center">
                        <span>Sauvgarder</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection