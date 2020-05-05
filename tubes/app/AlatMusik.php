<?php require "components/Navbar.php"; ?>

<div id="app">
  <section class="section">
    <div class="container ">
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
                    <input class="input" type="email" placeholder="Pencarian berdasarkan nama" v-model="keyword">
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
  <section class="section has-background-secondary has-margin-top-5">
    <div class="container">
      <div class="columns is-multiline " v-if="sortedData.length > 0">
        <div class="column is-3" v-for="am in sortedData" :key="am.id">
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
      <div class="has-text-centered" v-else>
        <h3 class="title is-3">
          Hasil untuk : <span class="subtitle is-3">{{ keyword }}</span> tidak ditemukan
        </h3>
      </div>

    </div>
  </section>
</div>

<?php require "components/Footer.php"; ?>

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

  axios.get('app/api.php?ep=semua-alat-musik')
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