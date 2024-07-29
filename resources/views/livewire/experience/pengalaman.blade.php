<div>
    <x-button-primary type='button' value='+ Tambah Data' wire:click.prevent='openModal' />
    {{-- {{ $tes }} --}}
    @if (session()->has('message'))
        <x-alert-primary message="{{ session('message') }}" />
    @endif
    <x-table>
        <thead>
            <th>No</th>
            <th>Perusahaan</th>
            <th>Posisi</th>
            <th>Start</th>
            <th>End</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($experience as $index => $ex)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ex->perusahaan }}</td>
                    <td>{{ $ex->job }}</td>
                    {{-- <td>{{date('Y', strtotime($ex->start))}}</td> --}}
                    <td>{{ $ex->start }}</td>
                    <td>{{ $ex->end }}</td>
                    <td>
                        <x-button-primary type="button" wire:click.prevent="editModal('')" value='Edit' />
                        <x-danger-button type="button" value='Delete' wire:click.prevent="confirmDelete('{{$ex->id}}')" />

                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>


    @if ($delModal)
        <x-modal show=1 name='Delete'>
            <div class="text-center">
                <div class="my-5 font-bold ">
                    Yakin Hapus Data?
                </div>
                <div class="text-center my-4">
                    <x-button-secondary wire:click='cancelDel' value="Batal" wire:loading.class="opacity-50"
                        class="mx-2" />
                    <x-danger-button value="Hapus" wire:click="delete('{{ $uuid }}')" class="mx-2" />
                </div>
            </div>
        </x-modal>
    @endif

    @if ($modal)
        <x-modal show=1 name='Add Experience'>
            <div class="p-5">
                <div class="title my-4">
                    <h4 class="font-bold text-2xl">Tambah Experience</h4>
                </div>
                <hr>
                <form wire:submit='save'>
                    <div class="text-start my-4">
                        @php
                            if ($this->check) {
                                $disabled = 'disabled';
                            }
                        @endphp
                        <x-text-input wire:model.live='name' class="w-full my-2" placeholder='Nama Perusahaan...' />
                        <x-text-input wire:model='posisi' class="w-full my-2" placeholder='Posisi...' />
                        <div class="flex gap-2 items-center">
                            <x-text-input wire:model='start' type='date' class="w-full my-2" />
                            <x-text-input wire:model='end' type='date' class="w-full my-2"
                                disabled='{{ $disabled }}' />
                            /
                            <div class="flex items-center gap-2">
                                <x-text-input wire:model.live='check' type='checkbox' id="sekarang" class="my-2" />
                                <label for="sekarang">Sekarang</label>
                            </div>

                        </div>

                    </div>
                    <hr>
                    <div class=" mt-3 flex gap-4">
                        <x-button-secondary type='button' value='Close' wire:click='closeModal'
                            class="flex justify-end" />
                        <x-button-primary value='Submit' wire:loading.attr="disabled" class="flex justify-end" />
                    </div>
                </form>
            </div>
        </x-modal>
    @endif
</div>
