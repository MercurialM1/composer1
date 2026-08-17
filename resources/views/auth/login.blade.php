<x-guest-layout>

    {{-- Стили страницы: фон, анимация появления, шрифт заголовка --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Unbounded:wght@500;700&display=swap');

        [x-cloak] { display: none !important; }
        .font-display { font-family: 'Unbounded', system-ui, sans-serif; }

        body { background-color: #eef3f1; }
        body::before {
            content: "";
            position: fixed; inset: 0;
            pointer-events: none;
            background:
                radial-gradient(620px 420px at 10% -6%, rgba(12, 122, 104, .16), transparent 62%),
                radial-gradient(540px 400px at 104% 106%, rgba(242, 165, 65, .14), transparent 62%),
                radial-gradient(rgba(16, 32, 29, .06) 1px, transparent 1px);
            background-size: auto, auto, 22px 22px;
        }

        .card-shadow {
            box-shadow: 0 1px 2px rgba(16, 32, 29, .05),
            0 16px 40px -16px rgba(16, 32, 29, .22);
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: none; }
        }
        .rise   { opacity: 0; animation: rise .45s ease-out forwards; }
        .rise-1 { animation-delay: .05s }
        .rise-2 { animation-delay: .12s }
        .rise-3 { animation-delay: .19s }
        .rise-4 { animation-delay: .26s }
        .rise-5 { animation-delay: .33s }

        @media (prefers-reduced-motion: reduce) {
            .rise { animation: none; opacity: 1; }
        }
    </style>

    <div class="rise">
        <div class="card-shadow relative overflow-hidden rounded-xl border border-[#dfe7e4] bg-white">

            {{-- Фирменная полоска --}}
            <div class="h-1.5 w-full bg-gradient-to-r from-[#0c7a68] via-[#12a189] to-[#f2a541]"></div>

            {{-- Session Status --}}
            <x-auth-session-status class="px-8 pt-5 sm:px-10" :status="session('status')" />

            <div class="px-8 pb-8 pt-7 sm:px-10">

                {{-- Шапка --}}
                <div class="rise rise-1 flex items-center gap-3.5">
                    <div class="grid h-12 w-12 shrink-0 place-items-center rounded-lg bg-[#0c7a68] text-white shadow-lg shadow-[#0c7a68]/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="font-display text-[22px] font-medium leading-tight tracking-tight text-[#10201d]">
                            С возвращением
                        </h1>
                        <p class="mt-1 text-sm text-[#5b6b67]">Войдите, чтобы продолжить работу</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}" class="mt-7">
                    @csrf

                    {{-- Email --}}
                    <div class="rise rise-2">
                        <x-input-label for="email" :value="__('Электронная почта')" />
                        <x-text-input id="email"
                                      class="mt-1 block w-full transition focus:!border-[#0c7a68] focus:!ring-[#0c7a68]/30"
                                      type="email" name="email" :value="old('email')"
                                      required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="rise rise-3 mt-5" x-data="{ show: false, caps: false }">
                        <x-input-label for="password" :value="__('Пароль')" />

                        <div class="relative mt-1">
                            <x-text-input id="password"
                                          class="block w-full pe-11 transition focus:!border-[#0c7a68] focus:!ring-[#0c7a68]/30"
                                          x-bind:type="show ? 'text' : 'password'"
                                          name="password"
                                          required autocomplete="current-password"
                                          @keyup="caps = $event.getModifierState('CapsLock')"
                                          @blur="caps = false" />

                            {{-- Показать / скрыть пароль --}}
                            <button type="button"
                                    @click="show = !show"
                                    x-bind:aria-label="show ? 'Скрыть пароль' : 'Показать пароль'"
                                    class="absolute inset-y-0 right-0 grid w-10 place-items-center text-[#8a9a95] transition hover:text-[#0c7a68]">
                                <svg x-show="!show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>
                            </button>
                        </div>

                        {{-- Подсказка про Caps Lock --}}
                        <p x-show="caps" x-cloak
                           class="mt-2 inline-flex items-center gap-1.5 rounded border border-amber-200 bg-amber-50 px-2 py-1 text-xs text-amber-800">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 3 4 12h4v6h8v-6h4L12 3Z"/></svg>
                            Включён Caps Lock
                        </p>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Запомнить меня + забыли пароль --}}
                    <div class="rise rise-4 mt-6 flex items-center justify-between gap-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-[#0c7a68] shadow-sm focus:ring-[#0c7a68]"
                                   name="remember">
                            <span class="ms-2 text-sm text-[#5b6b67]">{{ __('Запомнить меня') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-[#0c7a68] underline-offset-4 transition hover:text-[#0a6355] hover:underline"
                               href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                        @endif
                    </div>

                    {{-- Кнопка входа --}}
                    <div class="rise rise-5 mt-7">
                        <x-primary-button class="w-full justify-center !rounded-md !py-3 transition-all duration-200 !bg-[#0c7a68] hover:!bg-[#0a6355] hover:-translate-y-px hover:shadow-lg hover:shadow-[#0c7a68]/25 active:translate-y-0">
                            {{ __('Войти') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Ссылка на регистрацию, если включена --}}
        @if (Route::has('register'))
            <p class="rise rise-5 mt-6 text-center text-sm text-[#5b6b67]">
                Нет аккаунта?
                <a href="{{ route('register') }}"
                   class="font-semibold text-[#0c7a68] underline-offset-4 transition hover:text-[#0a6355] hover:underline">
                    Зарегистрируйтесь
                </a>
            </p>
        @endif
    </div>
</x-guest-layout>
