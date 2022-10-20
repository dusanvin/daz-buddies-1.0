<x-guest-layout>

    <style>

        #btn-helfende, #btn-lehrende {
            background-color: rgb(31, 41, 55);
        }
        #btn-helfende:active, #btn-lehrende:active {
            background-color: rgb(107, 114, 128) !important;
        }
        #btn-helfende:focus, #btn-lehrende:focus {
            background-color: rgb(107, 114, 128) !important;
        }
        #btn-helfende:hover, #btn-lehrende:hover {
            background-color: rgb(107, 114, 128) !important;
        }
        #privacy_statement:checked, #user_agreement:checked {
            background-color: rgb(124, 58, 237) !important;
        }
        #privacy_statement:focus, #user_agreement:focus {
            background-color: rgb(124, 58, 237) !important;
            --tw-ring-color: rgb(124, 58, 237) !important;
        }

    </style>

    <script>

        var selected = null;

        role_button_ids = [
            "btn-helfende",
            "btn-lehrende"
        ];

        function setRole(id) {
            selected = id;
            console.log(selected);
            role_button_ids.forEach(role_button_id => document.getElementById(role_button_id).style.backgroundColor = null);
            document.getElementById(id).style.backgroundColor = 'rgb(107, 114, 128)';
            document.getElementById('role').value = id;
        }

    </script>

    <x-auth-card>

        <x-slot name="logo">

            <a href="/">

                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />

            </a>

        </x-slot>

        <!-- Validation Errors -->

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <!-- Validation Errors -->

        <!-- Registrierungsform -->

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <!-- Vorname -->

            <div>

                <x-label for="firstname" :value="__('Vorname*')" />

                <x-input id="firstname" class="block mt-2 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />

            </div>

            <!-- Vorname -->
            
            <!-- Nachname -->

            <div class="mt-4">

                <x-label for="lastname" :value="__('Nachname*')" />

                <x-input id="lastname" class="block mt-2 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />

            </div>

            <!-- Nachname -->

            <!-- Rolle -->

            <div class="mt-4">

                <x-label for="role" :value="__('Rolle*')" />

                <input id="role" type="hidden" name="role"></input>

                <x-button id="btn-helfende" type="button" class="mt-2" onclick=setRole(this.id)>Helfende</x-button>

                <x-button id="btn-lehrende" type="button" class="mt-2" onclick=setRole(this.id)>Lehrende</x-button>

            </div>

            <!-- Rolle -->

            <!-- Email Addresse -->

            <div class="mt-4">

                <x-label for="email" :value="__('Email-Adresse*')" />

                <x-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required />

            </div>

            <!-- Email Addresse -->

            <!-- Passwort -->

            <div class="mt-4">

                <x-label for="password" :value="__('Passwort*')" />

                <x-input
                    id="password"
                    class="block mt-2 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password"
                />

            </div>

            <!-- Passwort -->

            <!-- Confirm Password -->

            <div class="mt-4">

                <x-label for="password_confirmation" :value="__('Passwort bestätigen*')" />

                <x-input
                    id="password_confirmation"
                    class="block mt-2 w-full"
                    type="password"
                    name="password_confirmation" required
                />

            </div>

            <!-- Confirm Password -->

            <!-- Nutzungsbedingungen -->

            <div class="mt-4">

                <div class="block text-sm text-gray-700">

                    <input id="user_agreement" type="checkbox" name="user_agreement">

                    Ich habe die <a href="#" style="color: rgb(124, 58, 237);" class="hover:underline">Nutzungsbedingungen</a> gelesen und erkläre mich damit einverstanden.*

                </div>

            </div>

            <!-- Nutzungsbedingungen -->

            <!-- Datenschutzerklärung -->

            <div class="mt-4">

                <div class="block text-sm text-gray-700">

                    <input id="privacy_statement" type="checkbox" name="privacy_statement">

                        Ich habe die <a href="https://www.uni-augsburg.de/de/impressum/datenschutz/" style="color: rgb(124, 58, 237);" class="hover:underline">Datenschutzerklärung</a> gelesen und willige in die Verarbeitung meiner Daten ein.*

                </div>

            </div>

            <!-- Datenschutzerklärung -->

            <!-- Hinweis -->

            <div class="mt-8 mb-8">

                <div class="block font-medium text-xs text-gray-700">

                    <p>* Alle Angaben sind zwingend für die Registrierung erforderlich.</p>

                </div>

            </div>

            <!-- Hinweis -->

            <div class="flex items-center justify-end mt-4">

                <a class="hover:underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">

                    {{ __('Bereits registriert?') }}

                </a>

                <x-button class="ml-4">

                    {{ __('Registrieren') }}

                </x-button>

            </div>

            <!-- Hinweis -->

        </form>

        <!-- Registrierungsform -->

    </x-auth-card>
    
</x-guest-layout>
