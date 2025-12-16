<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Produk</title>

    <!--FONT Source-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--ICON Source-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!--Source CSS-->
    <link href="css/products.css" rel="stylesheet">

    
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
            <div class="main-title">
                <p class="font-weight-bold">PRODUK NONCHALANT COFFE</p>
            </div>

            <div class="main-feature">

                <div class="feature-left">
                    <button id="button-new" class="add-btn">+ Add</button>
                    <button id="button-disc" class="disc-btn">Discount</button>
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

                <a class="card" href="admin_prod_detail.html">
                    <img src="americano.jpg" alt="image-emp">
                    <p class="name-produk">Hot Americano</p>
                    <p class="price">Rp20.000</p>
                </a>

                <a class="card" href="admin_prod_detail.html">
                    <img src="americano.jpg" alt="image-emp">
                    <p class="name-produk">Hot Americano</p>
                    <p class="price">Rp20.000</p>
                </a>

                <a class="card" href="admin_prod_detail.html">
                    <img src="americano.jpg" alt="image-emp">
                    <p class="name-produk">Hot Americano</p>
                    <p class="price">Rp20.000</p>
                </a>
            </div>

            <!--Pop Up New-->

            <div class="popup-new" id="form-new">
                <div class="form" id="form-apper">
                    

                    <div class="inner-form">

                        <div class="top-part">
                            
                            <div class="editable-name">
                                <span id="finalText" style="display: none;"></span>
                                <textarea id="name-input" placeholder="Nama Produk" rows="1" spellcheck="true"></textarea>
                            </div>

                            <div class="img-container">
                                
                                <img src="default-camera.jpg" id="img-view">
                                
                                <input type="file" accept="image/*" id="input-file" hidden>
                            </div>

                        </div>
                        

                        <div class="input-text">
                            
                            <div class="left-part">

                                <div class="inner-left">
                                    <div class="price-form">
                                        <label class="prc-label">Harga</label>
                                        <div class="inner-prc">
                                            <span class="prefix">Rp</span>
                                            <input type="text" id="prcInput" autocomplete="off" placeholder="0.00">
                                        </div>
                                    
                                    </div>

                                    <div class="size-form">
                                        <label class="size-label">Size</label>
                                        <input type="text" id="sizeInput" style="display: block;" placeholder="">
                                        
                                    </div>

                                    <div class="stock-form">
                                        <label class="stock-label">Stock</label>
                                        <input type="text" id="stockInput" style="display: block;" placeholder="">
                                        
                                    </div>

                                    <div class="cat-form">
                                        <label class="cat-label">Category</label>
                                        <div class="select-box">
                                            <input type="text" class="input-cat" placeholder="" autocomplete="off">
                                            <input type="hidden" name="catId" id="catId">
                                            <ul class="select-options">
                                                <li data-value="1">Kopi</li>
                                                <li data-value="2">Teh</li>
                                                <li data-value="3">Snack</li>
                                                <li data-value="4">Non Coffee</li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="deskripsi-form">
                                <label class="deskripsi-label">Deskripsi</label>

                                    <textarea id="deskripsiInput" style="display: block;"></textarea>
             
                            </div>
                            
                        </div>

                        
                    </div>
                    
                    <div class="btn-popup">
                        <button id="btn-cancel">Cancel</button>
                        <button id="btn-save">Save</button>
                    </div>
                    

                </div>
            </div>

            <!--POP UP DISCOUNT-->

            <div class="popup-dsc" id="popDsc">
                <div class="form-dsc" id="formDsc">
                    <div class="inner-form-dsc">
                        <div class="text-dsc">
                            <div class="name-dsc">
                                <label class="namedsc-label">Discount Name</label>
                                <input type="text" id="nameDscInput" style="display: block;" placeholder="" value="">
                                        
                            </div>

                            <div class="percent-dsc">
                                <label class="prcdsc-label">Percent</label>
                                <div class="inner-prc-dsc">
                                    <input type="text" id="prcDscInput" style="display: block;" placeholder="" value="">
                                    <span class="icon-prc">%</span>
                                </div>
                                
                            </div>
                            
                            <div class="dsc-date">
                                <label class="dsc-date-label">From</label>
                                <input type="date" id="fromInput" style="display: block;" placeholder="" value="">
                                <label class="dsc-date-label">To</label>
                                <input type="date" id="ToInput" style="display: block;" placeholder="" value="">
                            </div>
                        </div>

                        <div class="dsc-item">
                            <table class="table-dsc">
                                <thead >
                                    <tr class="header-table">
                                        <th class="item">
                                            <span>Item</span>
                                        </th>

                                        <th class="delete">
                                            <span class="material-symbols-outlined">settings_input_component</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="schedule-body">
                                    
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <div class="odoo-add-line" onclick="addRow()">
                                                <i class="fa fa-plus-circle"></i> Add a line
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="btn-popup-dsc">
                            <button id="btn-cancel-dsc">Cancel</button>
                            <button id="btn-save-dsc">Save</button>
                        </div>
                    </div>
                </div>
            </div>            
        </main>

    </div>

    



    <!--JS SOURCE-->
    <script src="js/products.js"></script>

</body>
</html>