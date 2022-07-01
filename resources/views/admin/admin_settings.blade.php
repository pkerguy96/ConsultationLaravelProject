@extends('dashboard')
@section('content')

<section class="w-full my-6 md:my-10">
    <h1 class="text-3xl font-bold mb-8 flex items-center justify-between">Changer mot de passe</h1>
    <div class="w-full rounded-md p-4 bg-white">
        <form action="{{ route('update.password') }}" method="post">
            @csrf
            <div class="flex flex-col gap-4">
                <div class="flex-1 flex flex-col gap-2">
                    <label class="flex justify-between text-grey-darkest" for="old-password">
                        <span>Ancien mot de passe</span>
                    </label>
                    <input id="old-password" name="old_password" placeholder="Ancien mot de passe" type="password" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                </div>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="new-password">
                            <span>Nouveau mot de passe</span>
                        </label>
                        <input id="new-password" name="password" placeholder="Nouveau mot de passe" type="password" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <label class="flex justify-between text-grey-darkest" for="confirm-password">
                            <span>Confirmer mot de passe</span>
                        </label>
                        <input id="confirm-password" name="password" placeholder="Confirmer mot de passe" type="password" class="h-10 w-full bg-gray-50 text-grey-darkest px-4 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500" />
                    </div>
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