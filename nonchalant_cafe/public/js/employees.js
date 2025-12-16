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

// FILTER MENU

var btnFilter = document.getElementById("btnFilter");
var Filter = document.getElementById("filter");

btnFilter.addEventListener("click", () => {
    Filter.classList.toggle("open")
})


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

var buttonNew = document.getElementById("button-new");
var buttonCancel = document.getElementById("btn-cancel");
var buttonSave = document.getElementById("btn-save");
var addPopup = document.getElementById("form-new");

buttonNew.addEventListener("click", () => {
    addPopup.classList.add("open");
})

buttonCancel.addEventListener("click", () => {
    addPopup.classList.remove ("open");
})

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

input.addEventListener('input', () => {
  const search = input.value.toLowerCase();

  options.forEach(option => {
    const text = option.textContent.toLowerCase();
    option.style.display = text.includes(search) ? 'block' : 'none';
  });
});

options.forEach(option => {
  option.addEventListener('click', () => {
    input.value = option.textContent;
    hiddenInput.value = option.dataset.value;
    optionsBox.style.display = 'none';
  });
});

// Klik di luar → tutup
document.addEventListener('click', e => {
  if (!e.target.closest('.select-box')) {
    optionsBox.style.display = 'none';
  }
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
})*/

// INPUT SHIFT

/*const inputShift = document.getElementById("inputShift");


inputShift.addEventListener("keydown", (e) => {
    if (e.key === "Enter") inputShift.blur()
})*/

// Input SELECT2

function addRow() {
    const tbody = document.getElementById("schedule-body");

    // HTML Template (Perhatikan class 'clean-input')
    const rowTemplate = `
        <tr class="row-item">
            <td>
                <div class="select-box">
                    <input type="text" class="input-day" placeholder="" autocomplete="off">
                    <input type="hidden" name="dayId" id="dayId">
                    <ul class="select-options">
                        <li data-value="1">Senin</li>
                        <li data-value="2">Selasa</li>
                        <li data-value="3">Rabu</li>
                    </ul>
                </div>
            </td>
            <td>
                <div class="select-box">
                    <input type="text" class="input-shift" placeholder="" autocomplete="off">
                    <input type="hidden" name="shiftId" id="shiftId">
                    <ul class="select-options">
                        <li data-value="1">Siang</li>
                        <li data-value="2">Malam</li>
                    </ul>
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
