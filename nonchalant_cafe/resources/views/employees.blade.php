<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nonchalant Coffe Admin Employee</title>

    <!--FONT Source-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--ICON Source-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!--Source CSS-->
    <link href="css/employees.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="grid-container">

        <!--HEADER-->

        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>

            <div class="header-left">
                @auth
                    <h2>Welcome <span class="name">{{ $Auth::employees()->employee_name }}</span></h2>
                @endauth
                
            </div>

            <div class="header-right">
                <div class="user" onclick="subMenu()">
                    <span>{{ $employees['employee_name'] }}</span>
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
                <p class="font-weight-bold">KARYAWAN NONCHALANT COFFE</p>
            </div>

            <div class="main-feature">

                <div class="feature-left">
                    <button id="button-new" class="add-btn">+ Add</button>
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
                            <li class="filter-item"><span>Signature</span></li>
                            <li class="filter-item"><span>Coffe</span></li>
                            <li class="filter-item"><span>Snack</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="main-card">
                @foreach ($employees as $employee)
                    <div class="card">
                        <a href="/employees/{{$employees['employee_id']}}" class="card-link">
                            <img src="timothy chalmeet.jpg" alt="image-emp">
                            <p class="name-emp">{{$employees['employee_name']}}</p>
                            <p class="position-emp">{{$employees['employee_role']}}</p>
                        </a>
                        
                    </div>
                    
                @endforeach

            </div>

            <!--Pop Up New-->

            <div class="popup-new" id="form-new">
                <div class="form" id="form-apper">
                    

                    <div class="inner-form">

                        <div class="top-part">

                            <div class="img-container">
                                
                                <img src="default-camera.jpg" id="img-view">
                                
                                <input type="file" accept="image/*" id="input-file" hidden>
                            </div>
                            
                            <div class="text-top">
                                <div class="editable-name">
                                    <span id="finalText" style="display: none;"></span>
                                    <textarea id="name-input" placeholder="Nama Karyawan" rows="1" spellcheck="true"></textarea>
                                </div>

                                <div class="email-form">
                                    <span class="material-symbols-outlined">mail</span>
                                    <input type="text" id="emailInput" style="display: block;" placeholder="email">
                                            
                                </div>     
                                
                                <div class="phone-form">
                                    <span class="material-symbols-outlined">phone_in_talk</span>
                                    <input type="text" id="phoneInput" style="display: block;" placeholder="Work Phone">
                                            
                                </div>
                            </div>
                            

                        </div>
                        

                        <div class="input-text">
                            
                            <div class="left-part">

                                <div class="inner-left">

                                    <div class="left_title">PERSONAL INFORMATION</div>

                                    <div class="gender-form">
                                        <label class="gdr-label">Gender</label>
                                        <div class="gender-value">
                                            <input type="radio" name="Gender" value="Male" id="genderInput" >Male
                                            <input type="radio" name="Gender" value="Female" id="genderInput" >Female
                                        </div>
                                        
                                    </div>

                                    <div class="address-form">
                                        <label class="address-label">Address</label>
                                        <input type="text" id="addressInput" style="display: block;" placeholder="">
                                        
                                    </div>

                                    <div class="birth-date-form">
                                        <label class="birth-label">Birth Date</label>
                                        <input type="date" id="birthInput" style="display: block;" placeholder="">
                                        
                                    </div>

                                    
                                </div>
                                
                            </div>

                            <div class="right-part">

                                <div class="inner-right">
                                    <div class="left_title">WORK INFORMATION</div>

                                    <div class="role-form">
                                        <label class="role-label">Role</label>
                                        <div class="select-box">
                                            <input type="text" class="input-role" placeholder="" autocomplete="off">
                                            <input type="hidden" name="roleId" id="roleId">
                                            <ul class="select-options">
                                                <li data-value="1">Manager</li>
                                                <li data-value="2">Barista</li>
                                                <li data-value="3">Waiter</li>
                                            </ul>
                                        </div>
                                        
                                    </div>

                                    <div class="salary-form">
                                        <label class="salary-label">Salary</label>
                                        <div class="inner-slr">
                                            <span class="prefix">Rp</span>
                                            <input type="text" id="salaryInput" autocomplete="off" placeholder="0.00">
                                        </div>
                                            
                                    </div>

                                    <div class="join-date-form">
                                        <label class="join-label">Join Date</label>
                                        <input type="date" id="joinInput" style="display: block;" placeholder="">
                                            
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </div>

                        <div class="bottom-part">
                            <table class="table-shift">
                                <thead >
                                    <tr class="header-table">
                                        <th class="day">
                                            <span>Day</span>
                                        </th>

                                        <th class="shift">
                                            <span>Shift</span>
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

                        <div class="btn-popup">
                            <button id="btn-cancel">Cancel</button>
                            <button id="btn-save">Save</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>

    </div>

    <!--JS SOURCE-->
    <script src="js/employees.js"></script>
   
    
</body>
</html>