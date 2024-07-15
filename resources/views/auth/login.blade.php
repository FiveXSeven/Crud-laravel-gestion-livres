<x-layouts>
    <form class="form" method="POST" action="{{ route('login') }}">
        <h2>Connexion</h2>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="label" for="email" :value="__('Email')" />
            <input class="inputBox" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="label" for="password" :value="__('Password')" />

            <input class="inputBox" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <x-primary-button class="btn">
            {{ __('Se Connecter') }}
        </x-primary-button>
    </form>
</x-layouts>
