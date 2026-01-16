<section>
    <header>
        <a class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition589*" href="{{ route('perfil.index', Auth::user()->name) }}">Regresar al perfil</a>
        <h2 class="mt-1 text-lg font-medium text-gray-900">
            {{ __('Informacion de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualice la información del perfil y la dirección de correo electrónico de su cuenta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <div class="mt-4">
                <x-input-label for="avatar" value="Foto de perfil" />
                <input type="file" name="avatar" class="mt-1 block w-full">
            </div>

            @if(Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-24 h-24 rounded-full mt-2">
            @endif

            <div class="mt-4">
                <x-input-label for="portada" value="Foto de portada" />
                <input type="file" name="portada" class="mt-1 block w-full">
            </div>

            @if(Auth::user()->portada)
                <img src="{{ asset('storage/' . Auth::user()->portada) }}" class="w-64 h-32 mt-2">
            @endif
        </div>
        

        <div class="mt-4">
            <x-input-label for="bio" value="Descripción" />
            <textarea name="bio"
                    class="mt-1 block w-full h-32"
                    maxlength="320">{{ old('bio', Auth::user()->bio) }}</textarea>
        </div>

        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="username" value="Nombre de usuario" />
            <x-text-input
                id="username"
                name="username"
                type="text"
                class="mt-1 block w-full"
                :value="old('username', $user->username)"
                required
                autofocus 
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
