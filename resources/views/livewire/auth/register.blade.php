<div>
    <x-slot:header>
            {{ __('Register') }}
    </x-slot:header>
    
    <form wire:submit="store">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form.field>
                        <x-form.label for="user.name">{{ __('Full Name') }}</x-form.label>

                        <div class="mt-2">
                            <x-form.input wire:model="user.name" name="user.name" id="user.name" required />

                            <x-form.error name="user.name" />
                        </div>
                    </x-form.field>

                    <x-form.field>
                        <x-form.label for="user.email">{{ __('Email') }}</x-form.label>

                        <div class="mt-2">
                            <x-form.input wire:model="user.email" name="user.email" id="user.email" type="email" required />

                            <x-form.error name="user.email" />
                        </div>
                    </x-form.field>

                    <x-form.field>
                        <x-form.label for="user.password">{{ __('Password') }}</x-form.label>

                        <div class="mt-2">
                            <x-form.input wire:model="user.password" name="user.password" id="user.password" type="password" required />

                            <x-form.error name="user.password" />
                        </div>
                    </x-form.field>

                    <x-form.field>
                        <x-form.label for="user.password_confirmation">{{ __('Confirm Password') }}</x-form.label>

                        <div class="mt-2">
                            <x-form.input wire:model="user.password_confirmation" name="user.password_confirmation" id="user.password_confirmation" type="password" required />

                            <x-form.error name="user.password_confirmation" />
                        </div>
                    </x-form.field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('news') }}" class="text-sm font-semibold leading-6 text-gray-900">{{ __('Cancel') }}</a>
            <x-form.button>{{__('Register')}}</x-form.button>
        </div>
    </form>
</div>