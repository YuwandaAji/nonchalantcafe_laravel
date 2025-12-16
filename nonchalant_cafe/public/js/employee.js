// SIDEBAR TOOGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if (sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}

//  LOGOUT TOOGLE

function subMenu() {
    const submenu = document.getElementById("submenu");
    submenu.classList.toggle("open-menu");
}

// SIDEBAR ITEM ACTIVE

var currentPage = window.location.pathname;
console.log("Current page:", currentPage);

document.querySelectorAll(".sidebar-list-item a").forEach(link => {
        if (currentPage.endsWith(link.getAttribute("href"))) {
            link.parentElement.classList.add("active");
}
    }
)

// POP UP NEW

var buttonEdit = document.getElementById("btnEdit");
var buttonCancel = document.getElementById("btn-cancel");
var buttonSave = document.getElementById("btn-save");
var addPopup = document.getElementById("form-new");

buttonEdit.addEventListener("click", () => {
    addPopup.classList.add("open");
})

buttonCancel.addEventListener("click", () => {
    addPopup.classList.remove ("open");
})

buttonSave.addEventListener("click", () => {

    const formData = collectEditFormData(); 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch(`/employees/${EMPLOYEE_ID}`, {
        method: 'PATCH', 
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Data Karyawan berhasil diperbarui!');
            addPopup.classList.remove ("open");
            window.location.reload(); 
        } else {
            alert('Gagal menyimpan data. Cek error di console.');
        }
    })
    .catch(error => {
        console.error('Error saat menyimpan:', error);
        alert('Terjadi kesalahan koneksi.');
    });
});

function collectEditFormData() {

    

    const name = document.getElementById('name-input').value; 

    const gender = document.querySelector('input[name="Gender"]:checked').value; 
    
    const roleId = document.getElementById('roleId').value; 
    const inputEmail = document.getElementById("emailInput").value;
    const inputPhone = document.getElementById("phoneInput").value;
    const inputAddres = document.getElementById("addressInput").value;
    const inputSalary = document.getElementById("salaryInput").value;
    const inputDay = document.getElementById("inputDay").value;
    const inputShift = document.getElementById("inputShift").value;
    

    return {
        employee_name: name,
        employee_gender: gender === 'Male' ? 1 : 0, 
        employee_role: roleId,
        employee_email: inputEmail,
        employee_phone: inputPhone,
        employee_address: inputAddres,
        employee_salary: inputSalary,
        employee_day: inputDay,
        employee_shift: inputShift

    };
}

// PREVIEW IMAGE UPLOAD

const imgView = document.getElementById("img-view");
const inputFile = document.getElementById("input-file");

document.querySelector(".img-container").addEventListener("click", () => {
    inputFile.click()
});

inputFile.addEventListener("change", function() {
    const file = this.files[0];
    if (file) {
        imgView.src = URL.createObjectURL(file);
        imgView.style.opacity = "1"; 
    }
})

// INPUT NAME

const nameInput = document.getElementById("name-input");

nameInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        e.preventDefault();
        nameInput.blur();
    }
});

// INPUT EMAIL

const inputEmail = document.getElementById("emailInput");


inputEmail.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputEmail.blur()
})

// INPUT NO

const inputPhone = document.getElementById("phoneInput");


inputPhone.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputPhone.blur()
})

// INPUT ADDRESS

const inputAddres = document.getElementById("addressInput");


inputAddres.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputAddres.blur()
})


// INPUT ROLE

const input = document.querySelector('.input-role');
const optionsBox = document.querySelector('.select-options');
const options = optionsBox.querySelectorAll('li');
const hiddenInput = document.getElementById('roleId');

input.addEventListener('focus', () => {
  optionsBox.style.display = 'block';
});

// INPUT SALARY

const inputSalary = document.getElementById("salaryInput");

inputSalary.addEventListener("input", function () {
    let value = this.value.replace(/\D/g, ""); 

    if (value) {
        this.value = new Intl.NumberFormat("id-ID").format(value);
    } else {
        this.value = "";
    }
});

// INPUT DAY

/*const inputDay = document.getElementById("inputDay");


inputDay.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputDay.blur()
})

// INPUT SHIFT

const inputShift = document.getElementById("inputShift");


inputShift.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputShift.blur()
})*/


//INPUT TABEL
function createOptionList(options) {
    let html = '';
    options.forEach(option => {
        html += `<li data-value="${option.value}">${option.label}</li>`;
    });
    return html;
}

function addRow() {
    const tbody = document.getElementById("schedule-body");


    const dayOptionsHtml = createOptionList(DAY_OPTIONS);
    const shiftOptionsHtml = createOptionList(SHIFT_OPTIONS);


    const rowTemplate = `
        <tr class="row-item">
            <td>
                <div class="select-box">
                    <input type="text" class="input-day" placeholder="" autocomplete="off">
                    <input type="hidden" name="dayId" id="dayId">
                    <ul class="select-options">
                        ${dayOptionsHtml} </ul>
                </div>
            </td>
            <td>
                <div class="select-box">
                    <input type="text" class="input-shift" placeholder="" autocomplete="off">
                    <input type="hidden" name="shiftId" id="shiftId">
                    <ul class="select-options">
                        ${shiftOptionsHtml} </ul>
                </div>
            </td>
            <td style="text-align: end; vertical-align: middle;">
                <span class="material-symbols-outlined delete-btn" onclick="deleteRow(this)">
                    delete
                </span>
            </td>
        </tr>
    `;

    tbody.insertAdjacentHTML('beforeend', rowTemplate);
}

// 2. Fungsi Hapus Baris
function deleteRow(btn) {
    const row = btn.closest('tr');
    row.remove();
}

// 3. AUTO RUN: Pasang 1 baris kosong saat halaman dibuka
document.addEventListener("DOMContentLoaded", function() {
    // Cek jika tabel kosong, isi 1 baris
    const tbody = document.getElementById("schedule-body");
    if (tbody && tbody.children.length === 0) {
        addRow();
    }
});

function closeAllSelectOptions() {
  document.querySelectorAll('.select-options').forEach(opt => {
    opt.style.display = 'none';
  });
}

document.addEventListener('click', function (e) {

  if (
    e.target.classList.contains('input-role') ||
    e.target.classList.contains('input-day') ||
    e.target.classList.contains('input-shift')
  ) {
    closeAllSelectOptions();

    const box = e.target.closest('.select-box');
    box.querySelector('.select-options').style.display = 'block';
    return;
  }

  // PILIH OPTION
  if (e.target.closest('.select-options li')) {
    const li = e.target;
    const box = li.closest('.select-box');

    const input = box.querySelector('input[type="text"]');
    const hidden = box.querySelector('input[type="hidden"]');

    input.value = li.textContent.trim();
    hidden.value = li.dataset.value;

    closeAllSelectOptions();
    return;
  }

  // KLIK DI LUAR
  closeAllSelectOptions();
});


document.addEventListener('input', function (e) {
  if (
    e.target.classList.contains('input-role') ||
    e.target.classList.contains('input-day') ||
    e.target.classList.contains('input-shift')
  ) {
    const search = e.target.value.toLowerCase();
    const box = e.target.closest('.select-box');

    box.querySelectorAll('.select-options li').forEach(li => {
      li.style.display = li.textContent.toLowerCase().includes(search)
        ? 'block'
        : 'none';
    });
  }
});


//--------POP UP PRESENSI---------
var buttonPsc = document.getElementById("btnPsc");
var buttonCancelPsc = document.getElementById("btn-cancel-psc");
var buttonSavePsc = document.getElementById("btn-save-psc");
var addPopupPsc = document.getElementById("popupPsc");

buttonPsc.addEventListener("click", () => {
    addPopupPsc.classList.add("open");
})

buttonCancelPsc.addEventListener("click", () => {
    addPopupPsc.classList.remove ("open");
})

buttonSavePsc.addEventListener("click", () => {
   
    const presensiData = collectPresensiFormData(); 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    fetch('/presensi', { 
        method: 'POST', 
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(presensiData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Presensi berhasil dicatat!');
            addPopupPsc.classList.remove ("open"); 

        } else {
            alert('Gagal mencatat presensi. Cek error di console.');
        }
    })
    .catch(error => {
        console.error('Error saat mencatat presensi:', error);
        alert('Terjadi kesalahan koneksi.');
    });
});



function collectPresensiFormData() {

    

    const employeeId = EMPLOYEE_ID; 

    const statusId = document.querySelector('.Inputstatus').value; 
  
    const date = document.getElementById('datePscInput').value; 

    return {
        employee_id: employeeId,
        status_id: statusId,
        date: date,
    };
}

//-----POP UP DELETE----------
var buttonDlt = document.getElementById("btnDelete");
var buttonCancelDlt = document.getElementById("btn-cancel-dlt");
var buttonSaveDlt = document.getElementById("btn-save-dlt");
var addPopupDlt = document.getElementById("popDlt");

buttonDlt.addEventListener("click", () => {
    addPopupDlt.classList.add("open");
})

buttonCancelDlt.addEventListener("click", () => {
    addPopupDlt.classList.remove ("open");
})

buttonSaveDlt.addEventListener("click", () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    

    fetch(`/employees/${EMPLOYEE_ID}`, {
        method: 'DELETE', 
        headers: {
            'X-CSRF-TOKEN': csrfToken, 
            'Content-Type': 'application/json'
        },
    })
    .then(response => {

        if (!response.ok) {
            throw new Error('Gagal menghapus data di server.');
        }
        return response.json();
    })
    .then(data => {

        console.log('Sukses Hapus:', data.message);
        alert(data.message);
        
        addPopupDlt.classList.remove ("open"); 

        window.location.href = '/employees'; 
    })
    .catch((error) => {

        console.error('Error saat menghapus:', error);
        alert('Gagal menghapus karyawan. Silakan cek console untuk detail.');
        addPopupDlt.classList.remove ("open");
    });
});

// --------------CHARTS-----------

// PIE CHART

var pieChartOptions = {
          series: [10, 1, 2, 1,],
          labels: ['Masuk', 'Sakit', 'Izin', 'Tanpa Keterangan'],
          colors: ['#5a321d', '#3f2111ff', '#2d1e16ff', '#151211ff'],
          chart: {
          type: 'donut',
          toolbar: {
            show: false
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieChartOptions);
        pieChart.render();