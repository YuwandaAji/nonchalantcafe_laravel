<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nonchalant Coffe Admin Dashboard</title>
    
    <!--FONT Source-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--ICON Source-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!--Source CSS-->
    <link rel="stylesheet" href="css/dashboard.css">
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
                    <img src="img/logo.jpg" alt="logo-brand">
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
            <div class="main-title">
                <p class="font-weight-bold">DASHBOARD NONCHALANT COFFE</p>
            </div>

            <div class="main-card">

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">SALES ORDER</p>
                        <span class="material-symbols-outlined">list_alt</span>
                    </div>
                    <span class="text-primary font-weight-bold">1.000</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">REVENUE</p>
                        <span class="material-symbols-outlined">attach_money</span>
                    </div>
                    <span class="text-primary font-weight-bold">1.000.000</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">FEEDBACK</p>
                        <span class="material-symbols-outlined">feedback</span>
                    </div>
                    <span class="text-primary font-weight-bold">500</span>
                </div>

                <div class="card">
                    <div class="card-inner">
                        <p class="text-primary">TOTAL CUSTOMER</p>
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <span class="text-primary font-weight-bold">10.000</span>
                </div>
            </div>

            <div class="charts">

                <div class="chart-card">
                    <p class="chart-title">Top 5 Produk In This Month</p>
                    <div id="bar-chart"></div>
                </div>

                <div class="chart-card">
                    <p class="chart-title">Sales Per Month</p>
                    <div id="line-chart"></div>
                </div>

            </div>
        </main>
        <!--END MAIN-->
    </div>

    <!--Script-->

    <!--ApexChart-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.js" integrity="sha512-dC9VWzoPczd9ppMRE/FJohD2fB7ByZ0VVLVCMlOrM2LHqoFFuVGcWch1riUcwKJuhWx8OhPjhJsAHrp4CP4gtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Source JS-->
    <script src="js/dashboard.js"></script>
</body>
</html>