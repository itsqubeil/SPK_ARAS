<div class="mt-6 mx-6">
    <x-form-section submit="update">
        <x-slot name="title">
            Edit Alternatif
        </x-slot>
        
        <x-slot name="description">
            Ubah detail Alternatif
        </x-slot>
        
        <x-slot name="form">
            {{-- input kode --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="kode" value="Kode Alternatif" />
                <x-input id="kode" wire:model="kode" type="text" class="mt-1 block w-full" autofocus />
                <x-input-error for="kode" class="mt-2" />
            </div>
            {{-- input nama alternatif --}}
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="Nama Alternatif" />
                <x-input id="name" wire:model="nama" type="text" class="mt-1 block w-full" />
                <x-input-error for="name" class="mt-2" />
            </div>
            {{-- input lainnya dst --}}
            
        </x-slot>
        
        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                Tersimpan.
            </x-action-message>
            
            <x-button>
                Simpan
            </x-button>
        </x-slot>
    </x-form-section>
</div>
