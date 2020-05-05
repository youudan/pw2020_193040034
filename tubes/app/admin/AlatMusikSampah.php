<?php
if ($_SESSION['role'] !== 'admin') {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}
?>

<div id="app">
  <div class="container is-fluid">
    <div class="columns">
      <div class="column is-2">
        <section class="section">
          <?php require "app/admin/components/Sidebar.php"; ?>
        </section>
      </div>
      <div class="column">

        <section class="section">
          <div class="container is-fluid">
            <div class="box">
              <div class="columns">
                <div class="column is-8 is-12-mobile">
                  <div class="field is-horizontal">
                    <div class="field-label is-normal">
                      <label class="label">Pencarian </label>
                    </div>
                    <div class="field-body">
                      <div class="field">
                        <p class="control is-loading">
                          <input class="input" type="text" placeholder="Pencarian berdasarkan nama" v-model="keyword">
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="column is-12-mobile">
                  <div class="field is-horizontal">
                    <div class="field-label is-normal">
                      <label class="label">Filter </label>
                    </div>
                    <div class="field-body">
                      <a class="button is-dark" @click="doSort('nama')">Nama<span v-if="sort.field=='nama'">&nbsp;[{{ sort.desc? 'Z-A' : 'A-Z' }}]</span></a>
                      <a class="button is-dark" style="margin-left: 1rem" @click="doSort('created_at')">Tanggal<span v-if="sort.field=='created_at'">&nbsp;[{{ sort.desc? 'Terbaru' : 'Terlama' }}]</span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="section has-background-secondary has-margin-top-5" style="margin-top: -3rem">

          <div class="container is-fluid">
            <div v-if="sortedData.length > 0">
              <div class="box" v-for="am in sortedData" :key="am.slug">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img :src="`storage/img/alat-musik/${am.gambar}`" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>{{ am.nama }}</strong> <small>{{ am.nama_user }}</small> <small>{{ am.created_at }}</small>
                        <br>
                        {{ am.deskripsi | fm-truncate(84) }}
                      </p>
                      <span class="tag" :class="am.tag">{{ am.jenis }}</span>
                      <div class="is-pulled-right" style="margin-top: 1rem">
                        <a :href="`admin.php?site=alat-musik-kembalikan&slug=${ am.slug }`" class="button is-success">Kembalikan</a>
                        <a :href="`admin.php?site=alat-musik-hapus-permanen&slug=${ am.slug }`" class="button is-danger" onclick="return confirm('anda akan mengahpus permanen data ini?')">Hapus Permanen</a>
                      </div>
                    </div>

                  </div>
                </article>
              </div>
            </div>

            <div class="has-text-centered" v-else>
              <h3 class="title is-3">
                Hasil untuk : <span class="subtitle is-3">{{ keyword }}</span> tidak ditemukan
              </h3>
            </div>
          </div>
        </section>


      </div>
    </div>


  </div>
</div>

<script src="assets/js/bulma.js"></script>
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
      keyword: null,
      sort: {
        field: '',
        desc: true
      },
      alatMusik: []
    },
    computed: {
      hasilQuery() {
        if (this.keyword) {
          return this.alatMusik.filter((item) => {
            return this.keyword.toLowerCase().split(' ').every(v => item.nama.toLowerCase().includes(v))
          })
        } else {
          return this.alatMusik
        }
      },
      sortedData() {
        if (!this.sort.field) {
          return this.hasilQuery
        }
        return this.hasilQuery.concat().sort((a, b) => {
          if (this.sort.desc) {
            return a[this.sort.field] > b[this.sort.field] ? -1 : 1
          } else {
            return a[this.sort.field] > b[this.sort.field] ? 1 : -1
          }
        })
      }
    },
    methods: {
      doSort(field) {
        if (field == this.sort.field) {
          this.sort.desc = !this.sort.desc
        } else {
          this.sort.field = field;
          this.sort.desc = true;
        }
      }
    }
  })

  axios.get('app/api.php?ep=semua-alat-musik-sampah')
    .then(function(response) {
      let {
        data
      } = response.data;
      app.alatMusik = data.alat_musik
    })
    .catch(function(error) {
      console.log(error);
    });
</script>