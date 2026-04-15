<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-800 leading-tight">
            🚀 Adım Adım İlan Ver
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-3xl overflow-hidden flex flex-col md:flex-row">
                
                <div class="md:w-1/3 bg-blue-600 p-8 text-white">
                    <h3 class="text-xl font-bold mb-6 italic underline underline-offset-8 decoration-orange-400">Püf Noktaları</h3>
                    <ul class="space-y-6 text-sm">
                        <li class="flex items-start">
                            <span class="bg-blue-500 p-2 rounded-lg mr-3">1</span>
                            <span><b>Net Başlık:</b> "Satılık telefon" yerine "iPhone 13 - Hatasız" yazın.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-blue-500 p-2 rounded-lg mr-3">2</span>
                            <span><b>Doğru Fiyat:</b> Piyasayı araştırıp fiyat belirlemek daha hızlı satar.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="bg-blue-500 p-2 rounded-lg mr-3">3</span>
                            <span><b>Açıklama:</b> Ürünün kusurlarını veya ekstralarını mutlaka belirtin.</span>
                        </li>
                    </ul>
                </div>

                <div class="md:w-2/3 p-10">
                    <form action="{{ route('ads.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-y-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">İlan Başlığı</label>
                                <input type="text" name="title" class="w-full border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" placeholder="Neyi satıyorsunuz?" required>
                            </div>

                            <div class="grid grid-cols-2 gap-x-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Fiyat (TL)</label>
                                    <input type="number" name="price" class="w-full border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500" placeholder="0" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Kategori</label>
                                    <select name="category" class="w-full border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 text-gray-600">
                                        <option value="Vasita">Vasıta</option>
                                        <option value="Emlak">Emlak</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Diger">Diğer</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Detaylı Açıklama</label>
                                <textarea name="description" rows="5" class="w-full border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500" placeholder="Ürün özelliklerini buraya yazın..." required></textarea>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white font-black py-4 rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 hover:shadow-blue-300 transition-all duration-300 uppercase tracking-widest">
                                İlanı Şimdi Yayınla
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>