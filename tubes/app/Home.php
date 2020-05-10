<?php require "components/Navbar.php"; ?>

<section class="section is-medium parallax">
  <div class="container has-text-centered">
    <h1 class="title is-1 has-text-white paralax-title">
      Youudan Musicale
    </h1>
    <p class="subtitle has-text-white">
      Website informasi alat musik
    </p>
  </div>
</section>

<section id="app" class="section has-background-secondary has-margin-top-5">
  <div class="container">

    <h1 class="title is-4 has-text-centered paralax-title">
      Alat Musik
    </h1>
    <p class="subtitle has-text-centered" style="margin-bottom: 4rem">
      Pilih alat musik untuk melihat detail atau pilih semua alat musik untuk menampilkan semua alat musik
    </p>
    <div class="columns is-multiline ">
      <div class="column is-3 is-narrow" v-for="am in alatMusik" :key="am.id">
        <a :href="`?site=alat-musik&detail=${ am.slug }`">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img :src="`storage/img/alat-musik/${am.gambar}`" alt="Placeholder image">
              </figure>
            </div>
            <div class="card-content">
              <div class="media">
                <div class="media-left">
                  <figure class="image is-48x48">
                    <img :src="`storage/img/profile/${am.profile}`" alt="Placeholder image">
                  </figure>
                </div>
                <div class="media-content">
                  <p class="subtitle has-text-weight-bold is-size-7	">{{ am.created_at }}</p>
                  <p class="title is-5">{{ am.nama }}
                    <br>
                    <span class="subtitle is-7">{{ am.nama_user }}</span>
                  </p>
                </div>
              </div>
              <div class="content">
                <span class="is-size-6">{{ am.deskripsi | fm-truncate(28) }}</span>
                <br>
              </div>
              <span class="tag" :class="am.tag">{{ am.jenis }}</span>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="has-text-centered">
      <a class="button" style="margin-bottom: 1rem" href="?site=alat-musik">Semua Alat Musik</a>
    </div>
  </div>
</section>

<?php require "components/Footer.php"; ?>

<script src="assets/js/bulma.js"></script>
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script>
  Vue.filter('fm-truncate', function(value, length) {
    if (!value) return ''
    value = value.toString()
    if (value.length > length) {
      return value.substring(0, length) + "..."
    } else {
      return value
    }
  })
  var app = new Vue({
    el: '#app',
    data: {
      alatMusik: []
    }
  });
  fetch('app/api.php?ep=semua-alat-musik&limit=4')
    .then(response => response.json())
    .then(data => app.alatMusik = data.data.alat_musik);
</script>