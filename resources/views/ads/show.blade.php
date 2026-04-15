<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden mb-8 border border-gray-100">
                <div class="p-8 md:p-12">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs font-bold uppercase rounded-full">{{ $ad->category }}</span>
                            <h2 class="text-4xl font-black text-gray-900 mt-2">{{ $ad->title }}</h2>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-black text-green-600">{{ number_format($ad->price, 0, ',', '.') }} TL</p>
                            <p class="text-sm text-gray-400 mt-1">{{ $ad->created_at->format('d.m.Y') }}</p>
                        </div>
                    </div>

                    <div class="prose max-w-none text-gray-700 text-lg mb-10 border-t border-b py-8 leading-relaxed">
                        {!! nl2br(e($ad->description)) !!}
                    </div>

                    <div class="flex items-center justify-between bg-slate-50 p-6 rounded-2xl border border-gray-200">
                        <div class="flex items-center">
                            <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                                {{ substr($ad->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">İlan Sahibi</p>
                                <p class="font-bold text-gray-900 text-lg">{{ $ad->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-3xl p-8 md:p-12 border border-gray-100">
                <h3 class="text-2xl font-bold mb-8 flex items-center">
                    <span class="mr-3">💬</span> Yorumlar ve Sorular
                </h3>

                @auth
                    <form action="{{ route('comments.store', $ad->id) }}" method="POST" class="mb-10">
                        @csrf
                        <textarea name="body" rows="3" class="w-full border-gray-200 rounded-2xl focus:ring-blue-500 focus:border-blue-500 p-4" placeholder="Satıcıya bir soru sor..." required></textarea>
                        <button type="submit" class="mt-3 bg-blue-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">Yorumu Gönder</button>
                    </form>
                @else
                    <div class="bg-blue-50 p-4 rounded-xl text-center text-blue-700 mb-8 border border-blue-100">
                        Yorum yazmak için lütfen <a href="{{ route('login') }}" class="font-bold underline">giriş yapın</a>.
                    </div>
                @endauth

                <div class="space-y-6">
                    @forelse($ad->comments as $comment)
                        <div class="border-l-4 border-blue-500 pl-4 py-3 bg-slate-50 rounded-r-2xl p-4 transition-all hover:bg-slate-100">
                            <div class="flex justify-between mb-1">
                                <p class="font-bold text-gray-900">{{ $comment->user->name }}</p>
                                <span class="text-gray-400 text-xs font-medium">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 leading-relaxed">{{ $comment->body }}</p>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400 italic">
                             Henüz yorum yapılmamış. İlk soruyu sen sor!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>