<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="puskesmas">
	<section class="hero is-danger is-bold" style="margin: 52px 0 10px 0">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					Daftar Puskesmas
				</h1>
				<p class="subtitle" v-if="loading">
					<i class="fas fa-spin fa-spinner title"></i>
				</p>
				<p class="subtitle" v-if="!loading">Ada {{ count }} Puskesmas di DKI Jakarta</p>
			</div>
		</div>
	</section>

	<section class="section has-text-centered" v-if="loading">
		<i class="fas fa-spin fa-spinner title"></i>
		<p class="subtitle">Memuat data...</p>
	</section>

	<section class="section" v-if="!loading">
		<div class="columns is-mobile">
			<div class="column is-10 is-offset-1">
				<div class="field">
					<div class="control has-icons-right">
						<input class="input" type="text" v-model="query" placeholder="Cari nama puskesmas disini..." @input="fetchData">
						<span class="icon is-small is-right">
							<i class="fas fa-search"></i>
						</span>
					</div>
				</div>

				<hr>

				<div class="box has-text-centered" v-if="!found">
					<p class="title">
						<i class="fas fa-sad-tear fa-2x"></i>
					</p>
					<p class="subtitle">
						Puskesmas <strong>{{ query }}</strong> tidak ditemukan
					</p>
				</div>

				<article class="message is-danger" v-for="(puskesmas, index) in newPuskesmases" v-if="!loading && newPuskesmases && found">
					<div class="message-header">
						<p>{{ puskesmas.nama_Puskesmas }}</p>
					</div>
					<div class="message-body">
						<div class="field">
							<label class="label">Alamat</label>
							<div class="control">
								<span>{{ puskesmas.location.alamat }}</span>
							</div>
						</div>
						<div class="field">
							<div class="control">
								<a class="button is-danger" :href="'<?= base_url('puskesmas?id=') ?>' + puskesmas.id">Lihat</a>
							</div>
						</div>
					</div>
				</article>
			</div>
		</div>
	</section>
</div>

<script>
const puskesmas = new Vue({
	el: '#puskesmas',
	data: () => ({
		puskesmases: [],
		newPuskesmases: [],
		count: '',
		query: '',
		found: '',
		loading: true
	}),

	mounted() {
		this.getData()
	},

	methods: {
		getData () {
			axios.get('<?= base_url() ?>' + 'api/getPuskesmas')
				.then(res => {
					this.puskesmases = res.data.data
					this.count = res.data.data.length
					this.fetchData()
					this.loading = false
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		},

		fetchData () {
			this.loading = true

			this.newPuskesmases = []
			let query = this.query.toLowerCase()
			this.puskesmases.map((puskesmas) => {
				if (puskesmas.nama_Puskesmas.toLowerCase().indexOf(query) !== -1) {
					this.newPuskesmases.push(puskesmas)
				}
			})

			if (this.newPuskesmases.length < 1) {
				this.found = false

			} else {
				this.found = true
			}

			this.loading = false
		}
	}
})
</script>
