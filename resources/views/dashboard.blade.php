<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('İlanlarım') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold italic">🚀 Yayındaki İlanların</h3>
                        <a href="{{ route('ads.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                            + Yeni İlan Ver
                        </a>
                    </div>

                    @forelse($ads as $ad)
                        <div class="flex justify-between items-center p-4 bg-gray-50 mb-3 rounded-lg border hover:shadow-sm transition">
                            <div>
                                <span class="font-bold text-gray-800">{{ $ad->title }}</span> 
                                <span class="text-sm text-blue-600 font-semibold ml-2">{{ number_format($ad->price, 0, ',', '.') }} TL</span>
                                <p class="text-xs text-gray-400 mt-1">{{ $ad->created_at->diffForHumans() }} eklendi</p>
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('ads.show', $ad->id) }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm transition">
                                    Görüntüle
                                </a>

                                {{-- SweetAlert Uyumlu Silme Butonu --}}
                                @can('delete', $ad)
                                    <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" id="delete-form-{{ $ad->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $ad->id }})" class="text-red-500 hover:text-red-700 font-medium text-sm bg-red-50 px-3 py-1 rounded-md transition">
                                            Sil
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 bg-gray-50 rounded-xl border-2 border-dashed">
                            <p class="text-gray-500 mb-4">Henüz hiç ilan eklememişsin.</p>
                            <a href="{{ route('ads.create') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600">
                                İlk İlanını Hemen Oluştur!
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>