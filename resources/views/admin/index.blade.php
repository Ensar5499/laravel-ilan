<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Admin Yönetim Paneli</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-blue-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam Kullanıcı</p>
                    <p class="text-3xl font-black">{{ $stats['total_users'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam İlan</p>
                    <p class="text-3xl font-black">{{ $stats['total_ads'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-orange-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Bugünkü İlanlar</p>
                    <p class="text-3xl font-black">{{ $stats['new_ads_today'] }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-b-4 border-purple-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Toplam Yorum</p>
                    <p class="text-3xl font-black">{{ $stats['total_comments'] }}</p>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-bold mb-4 italic">Son Eklenen İlanlar</h2>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="p-3 border-b text-sm">Başlık</th>
                            <th class="p-3 border-b text-sm">Kullanıcı</th>
                            <th class="p-3 border-b text-sm">Tarih</th>
                            <th class="p-3 border-b text-sm">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestAds as $ad)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-3 border-b text-sm font-medium">{{ $ad->title }}</td>
                            <td class="p-3 border-b text-sm">{{ $ad->user->name }}</td>
                            <td class="p-3 border-b text-sm text-gray-400">{{ $ad->created_at->diffForHumans() }}</td>
                            <td class="p-3 border-b text-sm">
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('ads.show', $ad->id) }}" class="text-blue-600 hover:underline font-medium">Görüntüle</a>
                                    
                                    {{-- SweetAlert Uyumlu Admin Silme Formu --}}
                                    @can('delete', $ad)
                                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" id="delete-form-{{ $ad->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $ad->id }})" class="text-red-500 hover:text-red-700 font-bold">
                                                Sil
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>