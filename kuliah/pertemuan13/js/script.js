const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const containerTable = document.querySelector('.container-table');

// hilangkan tombol cari

tombolCari.style.display = 'none';


// event ketika menuliskan keywod
keyword.addEventListener('keyup', function () {
  // ajax

  // xmlhttprequest
  // const xhr = new XMLHttpRequest();

  // xhr.onreadystatechange = function () {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     containerTable.innerHTML = xhr.response;
  //   }
  // }

  // xhr.open('get', `ajax/ajax_cari.php?keyword=${keyword.value}`);
  // xhr.send();

  fetch(`ajax/ajax_cari.php?keyword=${keyword.value}`)
    .then((response) => response.text())
    .then((response) => (containerTable.innerHTML = response));

});

// preview image untuk tambah dan ubah

function previewImage() {
  const gambar = document.querySelector('.gambar-input');
  const imgPreview = document.querySelector('.img-preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}