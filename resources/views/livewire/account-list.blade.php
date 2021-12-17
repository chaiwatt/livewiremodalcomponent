<div>
    <div class="row">
        <div>
            <a href="#" class="btn btn-info mb-2" data-toggle="modal" data-target="#modal-data-to" wire:click="$emit('eventAction', 'store')">เพิ่ม </a>
        </div>

        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-right">Option</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($accounts as $account)
                        <tr>
                            <td scope="row">{{ $account->name }}</td>
                            <td>{{  $account->email }}</td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-data-to" wire:click="$emit('eventAction', 'edit', {{ $account }})">Edit</button>
                                <button class="btn btn-sm btn-danger" wire:click="$emit('eventAction', 'delete', {{ $account }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach

        
                </tbody>
              </table>
        </div>
    </div>
    <livewire:modal-data-to />
</div>
