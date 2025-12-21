<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Page</title>
    <!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/homepage.css">

 
    <!-- Alpinejs -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
     
     <!-- App -->
     <script src="src/app.js"></script>
    </head>

    

  <body>
    <!-- Navbar Start -->
     <nav class="navbar">
      <img src="img/logo.jpg" alt="logo" class="logo">

      <div class="navbar-nav">
        <a href="#Home">Home</a>
        <a href="#about">About</a>
        <a href="#menu">Menu</a>
        {{-- Cek apakah yang login adalah Customer --}}
    @if(Auth::guard('customer')->check())
        <a href="{{ route('customer.profile') }}">Profile ({{ Auth::guard('customer')->user()->customer_name }})</a>
    
    {{-- Cek apakah yang login adalah Employee/Cashier --}}
    @elseif(Auth::guard('employee')->check())
        <a href="{{ route('cashier.dashboard') }}">Dashboard Kasir</a>
    
    {{-- Jika belum login sama sekali --}}
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
        {{-- <a href="{{ route('login') }}">Login</a> --}}
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="{{ route('customer.profile') }}">
    <i data-feather="user"></i>
</a>
        <a href=""><i data-feather="shopping-cart"></i></i></a>
        <a href="#" id="coffe-menu"><i data-feather="menu"></i></i></a>
      </div>

      <!-- Search Form Start -->
       <div class="search-form">
        <input type="search" id="search-box" placeholder="cari disini...">
        <label for="search-box"><i data-feather="search"></i></label>
       </div>
      <!-- Search Form End -->

      <!-- Cart Section start-->
       <div class="shopping-cart">
        <div class="cart-item">
          <img src="img/Menu/cappucino.jpeg" alt="Cappucino">
          <div class="detail-pesanan">
            <h3>Cappucino</h3>
            <div class="item-price">14K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
          <img src="img/Menu/cappucino.jpeg" alt="Cappucino">
          <div class="detail-pesanan">
            <h3>Cappucino</h3>
            <div class="item-price">14K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
          <img src="img/Menu/cappucino.jpeg" alt="Cappucino">
          <div class="detail-pesanan">
            <h3>Cappucino</h3>
            <div class="item-price">14K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
       </div>
     <!-- Cart section end -->

     </nav>
    <!-- Navbar End -->

    <!-- Hero section start -->
      <section class="hero" id="Home">
        <main class="content">
          <h1>Rasakan<span>Ketenangan</span> di setiap Tegukan</h1>
          <p>Temukan biji kopi pilihan dari kebun terbaik dunia. Kami menyajikan lebih dari sekadar secangkir Kopi, kami menyajikan sebuah ketenangan murni dari secangkir kopi</p>
          <a href="{{ url('/cart') }}" class="cta">Beli Sekarang</a>
        </main>
      </section>
    <!-- Hero section end -->

    <!-- About Section start -->
     <section id="about" class="about">
      <h2><span> Tentang</span> Kami</h2>
      <div class="row">
        <div class="about-img">
          <img src="{{ asset('/img/customer/tentangkami.jpeg') }}">
        </div>
        <div class="content">
          <h3>Kenapa harus Nonchalant Coffe?</h3>
          <p>Nonchalant coffe bukan hanya sebagai penyedia kopi, melainkan sebagai filosofi hidup, sikap tenang, santai, dan apa adanya tanpa harus tergesa-gesa oleh arus. Karena itulah nama "Nonchalant" dipilih karena mencerminkan elegansi, ketenangan, serta kebebasan dalam menikmati hidup yang sederhana namun bermakna</p>
        </div>
      </div>
     </section>
    <!-- About Section End -->

    <!-- Menu section start -->
     <section id="menu" class="menu">
      <h2><span>Menu</span> Kami</h2>
      <p>Setiap biji memiliki cerita. Kami memilihnya langsung dari petani lokal, memastikan kualitas premium dan jejak yang berkelanjutan. Kami ingin memberikan kualitas yang tinggi untuk anda.</p>
      <div class="row">
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/espreso.jpg') }}" alt="Espresso" class="menu-card-img">
          <h3 class="menu-card-title">- Espresso -</h3>
          <p class="menu-card-price">IDR 15K</p>
        </div>
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/americano.jpeg') }}" alt="Americano" class="menu-card-img">
          <h3 class="menu-card-title">- Americano -</h3>
          <p class="menu-card-price">IDR 12K</p>
        </div>
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/cappucino.jpeg') }}" alt="Cappucino" class="menu-card-img">
          <h3 class="menu-card-title">- Cappucino -</h3>
          <p class="menu-card-price">IDR 14K</p>
        </div>
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/croissants.jpeg') }}" alt="Croissants" class="menu-card-img">
          <h3 class="menu-card-title">- Croissants -</h3>
          <p class="menu-card-price">IDR 23K</p>
        </div>
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/waffles.jpeg') }}" alt="Waffles" class="menu-card-img">
          <h3 class="menu-card-title">- Waffles -</h3>
          <p class="menu-card-price">IDR 25K</p>
        </div>
        <div class="menu-card">
          <img src="{{ asset('/img/customer/Menu/nonchawidch.jpeg') }}" alt="nonchawidch" class="menu-card-img">
          <h3 class="menu-card-title">- Nonchawidch -</h3>
          <p class="menu-card-price">IDR 39K</p>
        </div>
      </div>
     </section>
    <!-- Menu section end -->

     <!-- Products Section start -->
    <!-- <section class="products" id="products">
      <h2><span>Online</span> Delivery</h2>
      <p>
        Nikmati cita rasa kafe tanpa harus meninggalkan rumah. Pesan sekarang, dan biarkan aroma kopi segar menemani Anda dalam hitungan menit.
      </p>

      <div class="row">
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/americano.jpeg" alt="Americano" />
          </div>
          <div class="product-content">
            <h3>Americano</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 12K <span>IDR 24K</span></div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/espreso.jpg" alt="Espresso" />
          </div>
          <div class="product-content">
            <h3>Espresso</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 15K <span>IDR 30K</span></div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/cappucino.jpeg" alt="Cappucino" />
          </div>
          <div class="product-content">
            <h3>Cappucino</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="product-price">IDR 14K <span>IDR 29K</span></div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/croissants.jpeg" alt="Croissants" />
          </div>
          <div class="product-content">
            <h3>Croissants</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 23K <span>IDR 32K</span></div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/waffles.jpeg" alt="Waffles" />
          </div>
          <div class="product-content">
            <h3>Wafffles</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="product-price">IDR 25K <span>IDR 39K</span></div>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#"><i data-feather="shopping-cart"></i></a>
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/Menu/nonchawidch.jpeg" alt="Nonchawidch" />
          </div>
          <div class="product-content">
            <h3>Cappucino</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="product-price">IDR 39K <span>IDR 50K</span></div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Products Section end -->

    <!-- Contact section start -->
     <section id="contact" class="contact">
      <h2><span>Kontak</span> Kami</h2>
      <p>Terima kasih telah memilih kualitas. Kami berjanji akan terus menyajikan kopi terbaik dari bumi, langsung ke cangkir Anda. Mari bergabung dalam komunitas kami!</p>
      <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15829.256096235058!2d112.72667499999997!3d-7.318578550000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb6551205733%3A0x32a9d1800d0cfc47!2sKetintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1760061098576!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama">
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="email">
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="no hp">
          </div>
          <button type="submit" class="btn">kirim pesan</button>
        </form>
      </div>
    </section>

     <!-- Contact section end -->
     
     <!-- Footer start -->
      <footer>
        <div class="socials">
          <a href="#"><i data-feather="instagram"></i></a>
          <a href="#"><i data-feather="twitter"></i></a>
          <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
          <a href="#Home">Home</a>
          <a href="#about">Tentang kami</a>
          <a href="#menu">Menu</a>
          <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
          <p>Created by <a href="">kelompokSepuluh</a>. | &copy;2025</p>
        </div>

      </footer>
    <!-- Footer End -->

    <!-- Modal Box Item Detail Start -->
     <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/Menu/cappucino.jpeg" alt="Cappucino">
          <div class="product-content">
            <h3>Cappucino</h3>
            <p>Cappuccino bukan sekadar kopi, melainkan keseimbangan sempurna antara tiga elemen utama: espresso, susu panas, dan busa susu (foam) tebal. Di kedai kami, kami menghidangkan Cappuccino dengan standar emas Italia: sepertiga espresso, sepertiga susu panas, dan sepertiga busa susu yang velvety dan lembut.</p>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
            </div>
            <div class="product-price"> IDR 14K <span>IDR 24K</span></div>
            <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
          </div>
        </div>
      </div>
     </div>
    <!-- Modal Box Item Detail End -->


    <!-- Feather Icons -->
<script>
  feather.replace()
</script>
    <!-- Javascript -->
     <script src="css/homepage.js"></script>
    <script>
      feather.replace();
    </script>
  </body>
</html>
