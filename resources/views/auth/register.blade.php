<x-layouts>
    <form class="form" method="POST" action="{{ route('register') }}">
        <h2>Créer un compte</h2>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label class="label" for="name" :value="__('Name')" />
            <input class="inputBox" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label  class="label" for="email" :value="__('Email')" />
            <input class="inputBox" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label  class="label" for="password" :value="__('Password')" />

            <input class="inputBox" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label  class="label" for="password_confirmation" :value="__('Confirm Password')" />

            <input class="inputBox" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="btn">
                {{ __('Créer un compte') }}
            </x-primary-button>
        </div>
    </form>

</x-layouts>
