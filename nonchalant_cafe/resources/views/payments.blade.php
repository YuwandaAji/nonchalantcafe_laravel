<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Payments</title>

    <!--FONT Source-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--ICON Source-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!--Source CSS-->
    <link href="css/payments.css" rel="stylesheet">
</head>
<body>
    <div class="grid-container">

        <!--HEADER-->

        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>

            <div class="header-left">
                <h2>Welcome <span class="name">Yuwanda Aji</span></h2>
            </div>

            <div class="header-right">
                <div class="user" onclick="subMenu()">
                    <span>Yuwanda Aji</span>
                    <img src="german_sparrow.jpg" alt="profil_image" cla>
                </div>
            </div>

            <div class="submenu-wrap" id="submenu">
                <div class="submenu">
                    <a href="login_nonchalant.html" class="submenu-link">
                        <span class="material-symbols-outlined">logout</span>
                        <p>Log Out</p>
                    </a>
                </div>
            </div>

        </header>
        <!--END HEADER-->

        <!--SIDEBAR-->

        <aside id="sidebar">
            <div class="sidebar-title">
                <div class="sidebar-brand">
                    <img src="logo_new.jpg" alt="logo-brand">
                    <p>NONCHALANT COFFE</p>
                </div>
                <span class="material-symbols-outlined" onclick="closeSidebar()">close</span>
            </div>

            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">dashboard</span>
                    <a href="/">Dashboard</a> 
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">supervisor_account</span>
                    <a href="/employees">Karyawan</a>  
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">groups</span>
                    <a href="/customers">Customer</a>  
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">local_cafe</span>
                    <a href="/products">Produk</a>  
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">payments</span>
                    <a href="/payments">Pembayaran</a>  
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">list_alt</span>
                    <a href="/orders">Pesanan</a>  
                </li>
                <li class="sidebar-list-item">
                    <span class="material-symbols-outlined">feedback</span>
                    <a href="/feedbacks">Feedback</a>  
                </li>
            </ul>
        </aside>
        <!--END SIDEBAR-->

        <!--MAIN-->

        <main class="main-container">

            <div class="main-feature">

                <div class="main-title">
                    <p class="font-weight-bold">PEMBAYARAN NONCHALANT COFFE</p>
                </div>

                <div class="feature-right">
                    <form class="search">
                        <input type="search" placeholder="Search" class="search-input">
                        <button type="submit">
                            <span class="material-symbols-outlined">search</span>
                        </button>
                    </form>

                    <div class="filter-container">
                        <div class="filter" id="btnFilter">
                            <span class="material-symbols-outlined">filter_list</span>
                        </div>

                        <ul class="menu-filter" id="filter">
                            <li class="filter-item"><span>Harga Murah</span></li>
                            <li class="filter-item"><span>Harga Mahal</span></li>
                            <li class="filter-item"><span>Makanan</span></li>
                            <li class="filter-item"><span>Minuman</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="main-card">

                <a href="admin_pay_detail.html" class="card">
                    <img src="ovo.png" alt="image-emp">
                    <div class="inner-card">
                        <p class="name-pay">OVO</p>
                        <div class="status">
                            <span class="material-symbols-outlined">fiber_manual_record</span>
                            <span>Aktif</span>
                        </div>
                        
                    </div>
                    
                </a>

                <a href="admin_pay_detail.html" class="card">
                    <img src="ovo.png" alt="image-emp">
                    <div class="inner-card">
                        <p class="name-pay">OVO</p>
                        <div class="status">
                            <span class="material-symbols-outlined">fiber_manual_record</span>
                            <span>Aktif</span>
                        </div>
                        
                    </div>
                    
                </a>

                <a href="admin_pay_detail.html" class="card">
                    <img src="ovo.png" alt="image-emp">
                    <div class="inner-card">
                        <p class="name-pay">OVO</p>
                        <div class="status">
                            <span class="material-symbols-outlined">fiber_manual_record</span>
                            <span>Aktif</span>
                        </div>
                        
                    </div>
                    
                </a>
            </div>
        </main>

    </div>

    <!--JS SOURCE-->
    <script src="js/payments.js"></script>
</body>
</html>