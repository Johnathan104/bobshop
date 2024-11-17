<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4/dist/fancybox.umd.js"></script>
    <title>Galeri Gambar</title>
    <style>
       /* Style untuk galeri */
        .gallery-container {
            position: relative;
            max-width: 90%;
            margin: 0 auto;
            padding: 20px 0;
            overflow: hidden;
        }

        .gallery {
            display: flex;
            overflow-x: hidden;
            gap: 20px;
            white-space: nowrap;
            padding: 20px 0;
            scroll-behavior: smooth;
        }

        .gallery a {
            display: inline-block;
            flex: 0 0 auto;
        }

        .gallery img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease;
            pointer-events: none;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        .gallery::-webkit-scrollbar {
            height: 8px;
        }
        .gallery::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }
        .gallery::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="gallery-container" id="gallery">
        <div class="gallery" id="galleryItems">
            <a href="./assets/img/gallery1.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery1.jpg" alt="Gallery Image 1"/>
            </a>
            <a href="./assets/img/gallery2.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery2.jpg" alt="Gallery Image 2"/>
            </a>
            <a href="./assets/img/gallery3.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery3.jpg" alt="Gallery Image 3"/>
            </a>
            <a href="./assets/img/gallery4.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery4.jpg" alt="Gallery Image 4"/>
            </a>
            <a href="./assets/img/gallery5.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery5.jpg" alt="Gallery Image 5"/>
            </a>
            <a href="./assets/img/gallery6.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery6.jpg" alt="Gallery Image 6"/>
            </a>
            <a href="./assets/img/gallery7.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery7.jpg" alt="Gallery Image 7"/>
            </a>
            <a href="./assets/img/gallery8.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery8.jpg" alt="Gallery Image 8"/>
            </a>
            <a href="./assets/img/gallery1.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery1.jpg" alt="Gallery Image 1"/>
            </a>
            <a href="./assets/img/gallery2.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery2.jpg" alt="Gallery Image 2"/>
            </a>
            <a href="./assets/img/gallery3.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery3.jpg" alt="Gallery Image 3"/>
            </a>
            <a href="./assets/img/gallery4.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery4.jpg" alt="Gallery Image 4"/>
            </a>
            <a href="./assets/img/gallery5.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery5.jpg" alt="Gallery Image 5"/>
            </a>
            <a href="./assets/img/gallery6.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery6.jpg" alt="Gallery Image 6"/>
            </a>
            <a href="./assets/img/gallery7.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery7.jpg" alt="Gallery Image 7"/>
            </a>
            <a href="./assets/img/gallery8.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery8.jpg" alt="Gallery Image 8"/>
            </a>
            <a href="./assets/img/gallery1.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery1.jpg" alt="Gallery Image 1"/>
            </a>
            <a href="./assets/img/gallery2.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery2.jpg" alt="Gallery Image 2"/>
            </a>
            <a href="./assets/img/gallery3.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery3.jpg" alt="Gallery Image 3"/>
            </a>
            <a href="./assets/img/gallery4.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery4.jpg" alt="Gallery Image 4"/>
            </a>
            <a href="./assets/img/gallery5.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery5.jpg" alt="Gallery Image 5"/>
            </a>
            <a href="./assets/img/gallery6.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery6.jpg" alt="Gallery Image 6"/>
            </a>
            <a href="./assets/img/gallery7.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery7.jpg" alt="Gallery Image 7"/>
            </a>
            <a href="./assets/img/gallery8.jpg" data-fancybox="gallery">
                <img src="./assets/img/gallery8.jpg" alt="Gallery Image 8"/>
            </a>
        </div>
    </div>

    <script>
        Fancybox.bind("[data-fancybox='gallery']", {
            Carousel: {
                infinite: true,
            }
        });

        // Fungsi auto-scroll dengan efek looping tanpa batas
        function autoScrollGallery() {
            const gallery = document.querySelector('#galleryItems');
            const scrollAmount = 1;
            
            setInterval(() => {
                gallery.scrollBy({ left: scrollAmount, behavior: 'smooth' });

                // Jika sudah mencapai akhir, scroll kembali ke awal dengan instan
                if (gallery.scrollLeft >= gallery.scrollWidth - gallery.offsetWidth) {
                    gallery.scrollTo({ left: 0, behavior: 'instant' });
                }
            }, 20); // Atur kecepatan scroll otomatis (20ms)
        }

        // Memulai auto-scroll saat halaman dimuat
        document.addEventListener('DOMContentLoaded', autoScrollGallery);
    </script>
</body>
</html>
