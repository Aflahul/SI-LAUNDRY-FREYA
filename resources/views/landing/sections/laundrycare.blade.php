<section id="laundrycare" class="py-24 bg-latar">
    <div class="container max-w-screen-xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col lg:flex-row items-end justify-between mb-12 gap-6">
            <div class="max-w-2xl space-y-4">
                <h2 class="text-4xl lg:text-5xl font-black text-garis tracking-tight">Laundry Care</h2>
                <p class="text-gray-500 text-lg">Tips & trik seputar perawatan pakaian agar tetap awet dan bersih maksimal.</p>
            </div>
            <div class="flex gap-4">
                <button id="panahkiri" class="w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:text-sudah hover:border-sudah transition-all">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <button id="panahkanan" class="w-12 h-12 rounded-full bg-sudah flex items-center justify-center text-white hover:scale-110 transition-all shadow-lg shadow-sudah/20">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>

        <div id="cardartikel" class="flex gap-8 overflow-x-auto pb-12 hide-scrollbar snap-x">
            @foreach ($artikel as $data)
                <div class="snap-center">
                    <a href="#" class="block min-w-[20rem] max-w-[20rem] bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2 group article-link"
                        data-title="{{ $data->judul }}" data-date="{{ $data->created_at->format('d M Y') }}"
                        data-content="{{ html_entity_decode($data->Isi) }}">
                        <div class="relative h-48 overflow-hidden">
                            @if ($data->foto)
                                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->judul }}">
                            @else
                                <img class="w-full h-full object-cover" src="{{ asset('assets/img/default-img.jpg') }}" alt="default">
                            @endif
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-black uppercase tracking-widest text-sudah shadow-sm">Tips</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-2">{{ $data->created_at->format('d M Y') }}</p>
                            <h4 class="text-xl font-bold text-garis mb-3 line-clamp-2 group-hover:text-sudah transition-colors">{{ $data->judul }}</h4>
                            <div class="text-sm text-gray-500 line-clamp-3 leading-relaxed mb-6">
                                {!! Str::limit(strip_tags(html_entity_decode($data->Isi)), 100) !!}
                            </div>
                            <div class="flex items-center text-sudah font-bold text-xs uppercase tracking-widest gap-2">
                                Baca Selengkapnya
                                <i class="fas fa-arrow-right text-[10px] transition-transform group-hover:translate-x-1"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modern Modal -->
    <div id="modal" class="fixed inset-0 z-[60] flex justify-center items-center p-4 bg-garis/80 backdrop-blur-sm hidden animate-fade-in">
        <div class="bg-white w-full max-w-4xl max-h-[90vh] rounded-[3rem] shadow-2xl overflow-hidden flex flex-col animate-scale-up">
            <div class="relative h-64 sm:h-80 w-full shrink-0">
                <img id="modalImage" src="" alt="" class="w-full h-full object-cover">
                <button id="modalClose" class="absolute top-6 right-6 w-12 h-12 bg-white/20 hover:bg-white/40 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-8 lg:p-12 overflow-y-auto">
                <p id="modalDate" class="text-xs font-black uppercase tracking-widest text-sudah mb-4"></p>
                <h3 id="modalTitle" class="text-3xl lg:text-4xl font-black text-garis mb-8 tracking-tight"></h3>
                <div id="modalContent" class="prose prose-lg max-w-none text-gray-600 leading-relaxed"></div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const articleLinks = document.querySelectorAll(".article-link");
        const modal = document.getElementById("modal");
        const modalTitle = document.getElementById("modalTitle");
        const modalDate = document.getElementById("modalDate");
        const modalImage = document.getElementById("modalImage").querySelector("img");
        const modalContent = document.getElementById("modalContent");
        const modalClose = document.getElementById("modalClose");
        const cardContainer = document.getElementById('cardartikel');
        const leftArrow = document.getElementById('panahkiri');
        const rightArrow = document.getElementById('panahkanan');

        // Fungsi untuk menggerakkan container ke kiri
        function scrollLeft() {
            cardContainer.scrollLeft -= 200; // Sesuaikan dengan lebar konten yang ingin digerakkan
        }

        // Fungsi untuk menggerakkan container ke kanan
        function scrollRight() {
            cardContainer.scrollLeft += 200; // Sesuaikan dengan lebar konten yang ingin digerakkan
        }

        // Tambahkan event listener untuk tombol panah kiri
        leftArrow.addEventListener('click', scrollLeft);

        // Tambahkan event listener untuk tombol panah kanan
        rightArrow.addEventListener('click', scrollRight);

        // Fungsi untuk menutup modal
        function closeModal() {
            modal.classList.add("hidden");
        }

        // Tambahkan event listener untuk tombol tutup
        modalClose.addEventListener("click", closeModal);

        // Tambahkan event listener untuk latar belakang gelap (menutup modal ketika di klik di luar konten modal)
        modal.addEventListener("click", function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        articleLinks.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const title = this.dataset.title;
                const date = this.dataset.date;
                const content = this.dataset.content;
                const imageSrc = this.querySelector("img").getAttribute("src");

                modalTitle.textContent = title;
                modalDate.textContent = date;
                modalImage.setAttribute("src", imageSrc); // Set the image source
                modalContent.innerHTML = content;
                modal.classList.remove("hidden");
            });
        });
    });
</script>
