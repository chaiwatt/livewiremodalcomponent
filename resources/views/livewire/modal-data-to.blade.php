<div>
    <div wire:ignore.self class="modal fade" id="modal-data-to" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ ($action === 'store') ? 'Create account' : 'Edit Account' }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" wire:model.defer="state.name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" wire:model.defer="state.email">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-cloud-upload-alt"></i>
                            {{ ($action === 'store') ? 'Save' : 'Save Changes' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@push('js')
    <script>
        (function($){

            $(document).on('livewire:load', function() {

                Livewire.on('modalClose', (modalId) => {
                    $(modalId).modal('hide')
                })
            
            })

        })(jQuery)
    </script>
@endpush
