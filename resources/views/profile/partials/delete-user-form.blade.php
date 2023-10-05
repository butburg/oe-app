<section class="space-y-6">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ __('Delete Account') }}</h2>
        </div>
        <div class="card-body">
            <p class="card-text">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">{{ __('Delete Account') }}</button>
        </div>
    </div>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h2 class="modal-title">{{ __('Are you sure you want to delete your account?') }}</h2>
                    </div>

                    <div class="modal-body">
                        <p>
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                            @error('userDeletion.password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
