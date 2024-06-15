<div>
    <x-slot:header>
            {{ __('Profile') }}
    </x-slot:header>
    <form wire:submit="update">
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

                </div>
            </div>
        </div>
        <x-form.saved-indicator indicator="showProfileSuccessIndicator">
            {{ __("Profile changed!") }}
        </x-form.saved-indicator>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form.button>{{__('Save')}}</x-form.button>
        </div>
    </form>
    <form wire:submit="changePassword">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">{{ __("Change Password") }}</h2>
        <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <x-form.field>
                <x-form.label for="user.current_password">{{ __('Current password') }}</x-form.label>

                <div class="mt-2">
                    <x-form.input wire:model="user.current_password" name="user.current_password" id="user.password" type="password" required />

                    <x-form.error name="user.current_password" />
                </div>
            </x-form.field>
            <x-form.field>
                <x-form.label for="user.password">{{ __('New password') }}</x-form.label>

                <div class="mt-2">
                    <x-form.input wire:model="user.password" name="user.password" id="user.password" type="password" required />
                    <x-form.error name="user.password" />
                </div>
            </x-form.field>
            <x-form.field>
                <x-form.label for="user.password_confirmation">{{ __('Confirm password') }}</x-form.label>

                <div class="mt-2">
                    <x-form.input wire:model="user.password_confirmation" name="user.password_confirmation" id="user.password_confirmation" type="password" required />

                    <x-form.error name="user.password_confirmation" />
                </div>
            </x-form.field>
        </div>
        <x-form.saved-indicator indicator="showPasswordChangeSuccessIndicator">
            {{ __("Password changed!") }}
        </x-form.saved-indicator>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-form.button>{{__('Change Password')}}</x-form.button>
        </div>
    </form>
</div>