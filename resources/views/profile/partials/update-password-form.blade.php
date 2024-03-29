<section>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ __('Update Password') }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>

            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    @error('updatePassword.current_password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
                    @error('updatePassword.password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    @error('updatePassword.password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-success">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
