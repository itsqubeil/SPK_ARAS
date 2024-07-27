<div class="mt-6 mx-6">
	<x-form-section submit="update">
		<x-slot name="title">
			Edit Kriteria
		</x-slot>
		
		<x-slot name="description">
			Ubah data kriteria.
		</x-slot>
		
		<x-slot name="form">
			{{-- input kode --}}
			<div class="col-span-6 sm:col-span-4">
				<x-label for="kode" value="Kode Kriteria" />
				<x-input id="kode" wire:model="kode" type="text" class="mt-1 block w-full" autofocus />
				<x-input-error for="kode" class="mt-2" />
			</div>
			{{-- input nama alternatif --}}
			<div class="col-span-6 sm:col-span-4">
				<x-label for="name" value="Nama Kriteria" />
				<x-input id="name" wire:model="nama" type="text" class="mt-1 block w-full" />
				<x-input-error for="name" class="mt-2" />
			</div>
			{{-- input lainnya dst --}}
			<div class="col-span-6 sm:col-span-4">
				<x-label for="bobot" value="Bobot Kriteria" />
				<x-input id="bobot" wire:model="bobot" type="number" step="any" class="mt-1 block w-full" />
				<x-input-error for="bobot" class="mt-2" />
			</div>
			<div class="col-span-6 sm:col-span-4">
				<x-label for="type" value="Jenis Kriteria" />
				<x-select id="type" wire:model="type" type="text" class="mt-1 block w-full">
					<option value="1">Benefit</option>
					<option value="0">Cost</option>
				</x-select>
				<x-input-error for="type" class="mt-2" />
			</div>
			
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
