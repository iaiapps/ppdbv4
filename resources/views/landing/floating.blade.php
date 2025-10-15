<!-- Floating Back to Top Button -->
<button id="backToTop" class="btn btn-orange rounded-circle shadow ">
    <i class="bi bi-arrow-up text-white"></i>
</button>

@push('css')
    <style>
        #backToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            display: none;
            /* hidden by default */
            width: 50px;
            height: 50px;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        #backToTop:hover {
            transform: translateY(-5px);
            background-color: #e86f0d;
            /* lebih gelap saat hover */
        }
    </style>
@endpush
@push('scripts')
    <script>
        const backToTop = document.getElementById("backToTop");

        // Tampilkan tombol saat scroll > 200px
        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        });

        // Scroll ke atas saat tombol diklik
        backToTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
@endpush
