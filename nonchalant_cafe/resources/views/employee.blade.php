<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Timothée Chalmette</title>

    <!--FONT Source-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--ICON Source-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!--Source CSS-->
    <link href="css/employee.css" rel="stylesheet">
</head>
<body>
    <div class="grid-container">

        <!--HEADER-->

        <header class="header">
            <div class="menu-icon" onclick="openSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>

            <div class="header-left">
                <h2>Welcome <span class="name">{{ $employee->employee_name }}</span></h2>
            </div>

            <div class="header-right">
                <div class="user" onclick="subMenu()">
                    <span>{{ $employee->employee_name }}</span>
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
            

            <div class="main-feature">

                <div class="emp-name">
                    <p class="font-weight-bold">{{ $employee->employee_name }}</p>
                </div>

                <div class="feature-right">
                    <button id="btnPsc">Presensi</button>
                    <button id="btnEdit">Edit</button>
                    <button id="btnDelete">Delete</button>
                </div>
            </div>

            <div class="main-info-emp">
                <div class="img-emp">
                    <img src="timothy chalmeet3.jpg" alt="img-emp" class="image-emp">
                </div>

                <div class="info-mid">
                    <div class="info-work">
                        <p class="info-title">Informasi Pekerjaan</p>
                        <div class="info-inti">
                            <p>Role: <span>{{ $employee->employee_role }}</span></p>
                            <p>Gaji: <span>Rp {{ $employee->employee_salary }}</span></p>
                        </div>
                        
                    </div>

                    <div class="info-emp">
                        <p class="info-title">Data Karyawan</p>
                        <div class="info-inti">
                            <p>Nama: <span>{{ $employee->employee_name }}</span></p>
                            <p>EmpID: <span>{{ $employee->employee_id }}</span></p>
                            <p>Gender: <span>{{ $employee->gender_text }}</span></p>
                            <p>Email: <span>{{ $employee->employee_email }}</span></p>
                            <p>No.Hp: <span>{{ $employee->employee_number }}</span></p>
                            <p>Alamat: <span>{{ $employee->employee_address }}</span></p>
                            <p>Tgl Lhr: <span>{{ $employee->employee_date_born }}</span></p>
                        </div>
                    </div>
                    
                </div>

                <div class="info-right">

                    <div class="shift-emp">
                        <p class="info-title">Jadwal Shift</p>
                        <div class="info-inti">
                            <p>Siang: <span>{{ $shift_siang }}</span></p>
                            <p>Malam: <span>{{ $shift_malam }}</span></p>
                        </div>
                        
                    </div>

                    <div class="chart">
                        <p class="chart-title">Performa Kehadiran</p>
                        <div id="pie-chart"></div>
                    </div>
                </div>
            </div>

            <!--Pop Up Edit-->

            <div class="popup-new" id="form-new">
                <div class="form" id="form-apper">
                    

                    <div class="inner-form">

                        <div class="top-part">

                            <div class="img-container">
                                
                                <img src="timothy chalmeet.jpg"img-view">
                                
                                <input type="file" accept="image/*" id="input-file" hidden>
                            </div>
                            
                            <div class="text-top">
                                <div class="editable-name">
                                    <span id="finalText" style="display: none;"></span>
                                    <textarea id="name-input" placeholder="Nama Karyawan" rows="1" spellcheck="true">{{ $employee->employee_name }}</textarea>
                                </div>

                                <div class="email-form">
                                    <span class="material-symbols-outlined">mail</span>
                                    <input type="text" id="emailInput" style="display: block;" placeholder="email" value={{ $employee->employee_email  }}>
                                            
                                </div>     
                                
                                <div class="phone-form">
                                    <span class="material-symbols-outlined">phone_in_talk</span>
                                    <input type="text" id="phoneInput" style="display: block;" placeholder="Work Phone" value={{ $employee->employee_number }}>
                                            
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
                                            <input type="radio" name="Gender" value="Male" id="genderInput" @checked($employee->employee_gender == 1) >Male
                                            <input type="radio" name="Gender" value="Female" id="genderInput" @checked($employee->employee_gender == 0)>Female
                                        </div>
                                        
                                    </div>

                                    <div class="address-form">
                                        <label class="address-label">Address</label>
                                        <input type="text" id="addressInput" style="display: block;" placeholder="" value={{ $employee->employee_Addres  }}>
                                        
                                    </div>

                                    <div class="birth-date-form">
                                        <label class="birth-label">Birth Date</label>
                                        <input type="date" id="birthInput" style="display: block;" placeholder="" value={{ $employee->employee_date_born  }} >
                                        
                                    </div>

                                    
                                </div>
                                
                            </div>

                            <div class="right-part">

                                <div class="inner-right">
                                    <div class="left_title">WORK INFORMATION</div>

                                    <div class="role-form">
                                        <label class="role-label">Role</label>
                                        <div class="select-box">
                                            <input type="text" class="input-role" placeholder="" autocomplete="off" value="{{ $employee->employee_role  }}">
                                            <input type="hidden" name="roleId" id="roleId" value="{{ $employee->employee_role }}">
                                            <ul class="select-options">
                                                <option value=""disabled selected hidden></option>
                                                @foreach ($roles as $role)
                                                    <li 
                                                        data-value="{{ $role->value }}" 
                                                        data-label="{{ $role->label() }}"
                                                        class="{{ $role->value == $employee->employee_role ? 'selected' : '' }}"
                                                    >
                                                        {{ $role->label() }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                    </div>

                                    <div class="salary-form">
                                        <label class="salary-label">Salary</label>
                                        <div class="inner-slr">
                                            <span class="prefix">Rp</span>
                                            <input type="text" id="salaryInput" autocomplete="off" placeholder="0.00" value={{ $employee->employee_salary  }}>
                                        </div>
                                            
                                    </div>

                                    <div class="join-date-form">
                                        <label class="join-label">Join Date</label>
                                        <input type="date" id="joinInput" style="display: block;" placeholder="" value={{ $employee->employee_date_join  }}>
                                            
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

            <!--POP UP PRESENSI-->
            <div class="popup-psc" id="popupPsc">
                <div class="form-psc" id="apperPsc">
                    <div class="inner-psc">
                
                        <div class="text-psc">
                            

                            <div class="nama-psc">
                                <label class="psc-label">Nama</label>
                                <input type="text" id="namePscInput" style="display: block;" placeholder="">
                            </div>

                            <div class="status-psc">
                                <label class="status-psc-label">Status</label>
                                <select class="Inputstatus" name="status[]">
                                    <option value=""disabled selected hidden></option>
                                    @foreach ($statuses as $status)
                                        <option 
                                            value="{{ $status->value }}" 
                                            @selected($status->value == $employee->employee_status_id)
                                        >
                                            {{ $status->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="date-psc">
                                <label class="date-psc-label">Tanggal</label>
                                <input type="date" id="datePscInput" style="display: block;" placeholder="" value={{ $employee->presence->presence_date }}>
                            </div>

                            
                        </div>
                        
                        <div class="btn-psc">
                            <button id="btn-cancel-psc">Cancel</button>
                            <button id="btn-save-psc">Save</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--POP UP DELETE-->

            <div class="pop-dlt" id="popDlt">
                <div class="form-dlt" id="apperDlt">
                    <div class="inner-dlt">
                        <div class="text-dlt">
                            <p>Apakah Kamu yakin ingin menghapus Karyawan  ini?</p>
                        </div>
                    </div>

                    <div class="btn-dlt">
                        <button id="btn-cancel-dlt">Cancel</button>
                        <button id="btn-save-dlt">Yes</button>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <!--Script-->

    <!--ApexChart-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.js" integrity="sha512-dC9VWzoPczd9ppMRE/FJohD2fB7ByZ0VVLVCMlOrM2LHqoFFuVGcWch1riUcwKJuhWx8OhPjhJsAHrp4CP4gtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const ROLE_OPTIONS = @json($roles->map(fn($role) => ['value' => $role->value, 'label' => $role->label()]));
        const DAY_OPTIONS = @json($days->map(fn($day) => ['value' => $day->value, 'label' => $day->label()]));
        const SHIFT_OPTIONS = @json($shifts->map(fn($shift) => ['value' => $shift->value, 'label' => $shift->label()]));
    </script>
    <script>
        const EMPLOYEE_ID = {{ $employee->id }};
    </script>
    <!--JS SOURCE-->
    <script src="js/employee.js"></script>
</body>
</html>