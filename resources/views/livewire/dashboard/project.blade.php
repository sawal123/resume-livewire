<div>
    @include('components.style-table')
    @if (session()->has('message'))
        <x-alert-primary message="{{ session('message') }}" />
    @endif
    <x-button-primary type='button' value='+ Tambah Data' wire:click.prevent='openModal' />

    <table class="responstable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Skill</th>
                <th>Link</th>
                <th>Category</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @foreach (json_decode($item->tools) as $tool)
                            {{ $tool->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                    <td>
                        {{ $item->link }}
                    </td>
                    <td>
                        {{ $item->category }}
                    </td>
                    <td>
                        <img loading="lazy" class="w-20 rounded-lg"
                            src="{{ asset('storage/thumbnails/' . $item->thumbnail) }}" alt="">
                    </td>
                    <td>
                        <x-button-primary type="button" wire:click.prevent="editModal('{{ $item->uuid }}')"
                            value='Edit' />
                        <x-danger-button type="button" value='Delete'
                            wire:click.prevent="confirmDelete('{{ $item->uuid }}')" />

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($delModal)
        <x-modal show=1>
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


    @if ($open)
        <x-modal show="$open" name='Add Project'>
            <div class="p-5">
                <h1 class="my-4 font-extrabold">{{ $titleModal }}</h1>
                <form wire:submit='{{$submitModal}}'>
                    <div class="">
                        <x-text-input wire:model='name' class="w-full my-2" placeholder='Nama project...' />
                        <small>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </small>
                        <small>
                            @foreach ($tools as $tool)
                                {{ $tool->name }} ,
                            @endforeach
                        </small>
                        @include('livewire.multi-select')
                        <small>
                            @error('select')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </small>

                        <x-text-input wire:model='link' class="w-full my-2" placeholder='Link Url ...' />
                        <x-select category='category'>
                            <option  disabled value="">---Category---</option>
                            <option value="multimedia">Multimedia</option>
                            <option value="programmer">Programmer</option>
                        </x-select>
                        <small>
                            @error('link')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </small>
                        <div class="flex ">
                            @if ($submitModal ==='edit')
                                <div class="mt-5">
                                    <img src="{{ asset('storage/thumbnails/' . $editPro->thumbnail) }}" class="w-20"
                                        alt="">
                                </div>
                            @endif

                            <div class="{{$submitModal === 'edit' ? 'mx-2' : ''}} mt-5">
                                <x-input-file wire:model='img' type='file' class="w-full" />
                                <small>
                                    @error('img')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="flex gap-4">
                        <x-button-secondary type='button' value='Close' wire:click='closeModal'
                            class="flex justify-end" />
                        <x-button-primary value='Submit'  wire:loading.attr="disabled"
                            class="flex justify-end" />
                    </div>
                </form>
            </div>
        </x-modal>
    @endif


</div>
