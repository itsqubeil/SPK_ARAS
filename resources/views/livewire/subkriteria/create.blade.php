<div>
	<div class="mt-6 mx-6">
		<x-form-section submit="store">
			<x-slot name="title">
				{{ $kriteria->name }}
			</x-slot>
			
			<x-slot name="description">
				Tambah jenis nilai kriteria  {{ $kriteria->name }}.
			</x-slot>
			
			<x-slot name="form">
				{{-- input nama sub kriteria --}}
				<div class="col-span-6 sm:col-span-4">
					<x-label for="name" value="Nama Sub Kriteria" />
					<x-input id="name" wire:model="name" type="text" class="mt-1 block w-full" autofocus />
					<x-input-error for="name" class="mt-2" />
				</div>
				{{-- input nilai bobot --}}
				<div class="col-span-6 sm:col-span-4">
					<x-label for="bobot" value="Nilai Bobot" />
					<x-input id="bobot" wire:model="bobot" type="text" class="mt-1 block w-full" autofocus />
					<x-input-error for="bobot" class="mt-2" />
				</div>
				
			</x-slot>
			
			<x-slot name="actions">
				<x-action-message class="mr-3" on="saved">
					Tersimpan.
				</x-action-message>
				
				<x-BUTTON>
					Simpan
				</x-BUTTON>
			</x-slot>
		</x-form-section>
	</div>
	
	<div class="mt-6 mx-6">
		<x-form-section submit="">
			<x-slot name="title">
				Data bobot nilai kriteria
			</x-slot>
			
			<x-slot name="description">
				List bobot nilai kriteria.
			</x-slot>
			
			<x-slot name="form">
				@if (!$kriteria->subkriteria->count())
				<div class="col-span-6 sm:col-span-4">
					Belum ada data sub kriteria.
				</div>
				@else
				<div class="col-span-6">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $kriteria->name }}
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Bobot
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($kriteria->subkriteria as $sub)
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									{{ $sub->name }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									{{ $sub->bobot }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<div class="flex justify-end">
										<x-nav-link class="button" wire:click.prevent="delete({{ $sub->id }})">Hapus</x-nav-link>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@endif			
			</x-slot>
		</x-form-section>
	</div>
</div>
