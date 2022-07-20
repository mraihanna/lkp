// notif aja
const flashDataMenu = $('.flash-data-menu').data('flashdata');
if (flashDataMenu) {
    Swal.fire({
        title : 'Data Menu',
        text  : 'New Menu Has Been ' + flashDataMenu,
        icon  : 'success'
    });
}

const flashDataSubMenu = $('.flash-data-submenu').data('flashdata');
if (flashDataSubMenu) {
    Swal.fire({
        title : 'Data Sub Menu',
        text  : 'New Sub Menu Has Been ' + flashDataSubMenu,
        icon  : 'success'
    });
}

const flashDataRole = $('.flash-data-role').data('flashdata');
if (flashDataRole) {
    Swal.fire({
        title : 'Data Role',
        text  : 'New Role Has Been ' + flashDataRole,
        icon  : 'success'
    });
}

const flashDataUnitKerja = $('.flash-data-unit-kerja').data('flashdata');
if (flashDataUnitKerja) {
    Swal.fire({
        title : 'Data Unit Kerja',
        text  : 'New Unit Kerja Has Been ' + flashDataUnitKerja,
        icon  : 'success'
    });
}

const flashDataJabatan = $('.flash-data-jabatan').data('flashdata');
if (flashDataJabatan) {
    Swal.fire({
        title : 'Data Jabatan',
        text  : 'New Jabatan Has Been ' + flashDataJabatan,
        icon  : 'success'
    });
}

const flashDataLogin = $('.flash-data-login').data('flashdata');
if (flashDataLogin) {
    Swal.fire({
        icon: 'success',
        title: 'Login Success',
        showConfirmButton: false,
        timer: 1500
    })
}

const flashDataLogout = $('.flash-data-logout').data('flashdata');
if (flashDataLogout) {
    Swal.fire({
        icon: 'success',
        title: 'Logout' + flashDataLogout,
        showConfirmButton: false,
        timer: 1500
    })
}

const flashDataRegister = $('.flash-data-register').data('flashdata');
if (flashDataRegister) {
    Swal.fire({
        title : 'Data Employee',
        text  : 'New Employee Has Been ' + flashDataRegister,
        icon  : 'success'
    });
}

const flashDataReport = $('.flash-data-report').data('flashdata');
if (flashDataReport) {
    Swal.fire({
        title : 'Data Daily Report',
        text  : 'New Report Has Been ' + flashDataReport,
        icon  : 'success'
    });
}

const flashDataSatuanKerja = $('.flash-data-satuan-kerja').data('flashdata');
if (flashDataSatuanKerja) {
    Swal.fire({
        title : 'Data Satuan kerja',
        text  : 'New Satuan Kerja Has Been ' + flashDataSatuanKerja,
        icon  : 'success'
    });
}

const flashDataPerusahaan = $('.flash-data-perusahaan').data('flashdata');
if (flashDataPerusahaan) {
    Swal.fire({
        title : 'Profil Perusahaan ',
        text  : 'Profile Perusahan Has Been ' + flashDataPerusahaan,
        icon  : 'success'
    });
}

const flashDataGagal = $('.flash-data-gagal').data('flashdata');
if (flashDataGagal) {
    Swal.fire({
        title : 'Gambar Gagal',
        text  : flashDataGagal,
        icon  : 'error'
    });
}

// confirm
$('.tombol-hapus-menu').on('click', function(e) {
  e.preventDefault();

  const href = $(this).attr('href')

  Swal.fire({
      title: 'Are you sure?',
      text: "Data Menu Will Be Deleted",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          document.location.href = href;
      }
  })
});

$('.tombol-hapus-submenu').on('click', function(e) {
  e.preventDefault();

  const href = $(this).attr('href')

  Swal.fire({
      title: 'Are you sure?',
      text: "Data Sub Menu Will Be Deleted",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          document.location.href = href;
      }
  })
});

$('.tombol-hapus-role').on('click', function(e) {
  e.preventDefault();

  const href = $(this).attr('href')

  Swal.fire({
      title: 'Are you sure?',
      text: "Data Role Will Be Deleted",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          document.location.href = href;
      }
  })
});

$('.tombol-hapus-unit-kerja').on('click', function(e) {
  e.preventDefault();

  const href = $(this).attr('href')

  Swal.fire({
      title: 'Are you sure?',
      text: "Data Unit kerja Will Be Deleted",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          document.location.href = href;
      }
  })
});

$('.tombol-hapus-jabatan').on('click', function(e) {
  e.preventDefault();

  const href = $(this).attr('href')

  Swal.fire({
      title: 'Are you sure?',
      text: "Data Jabatan Will Be Deleted",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          document.location.href = href;
      }
  })
});

function submitForm(form){
    Swal.fire({
        title: 'Are you sure?',
        text: "Data Employee Will Be Added",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, add it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
    return false;
}

$('.tombol-hapus-satuan-kerja').on('click', function(e) {
    e.preventDefault();
  
    const href = $(this).attr('href')
  
    Swal.fire({
        title: 'Are you sure?',
        text: "Data Satuan Kerja Will Be Deleted",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
  });