<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="rsk">
	<section class="hero is-danger is-bold" style="margin-top: 52px">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					RS {{ rsk.nama_rsk }}
				</h1>
				<p class="subtitle">Informasi Lengkap</p>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="columns">
			<div class="column is-10 is-offset-1">
				<div class="has-text-centered" v-if="loading">
					<i class="fas fa-spin fa-spinner title"></i>
					<p class="subtitle">Memuat data...</p>
				</div>

				<article class="message is-danger" v-if="!loading">
					<div class="message-body">
						<div class="field">
							<label class="label">Jenis RSK</label>
							<div class="control">
								<span>{{ rsk.jenis_rsk }}</span>
							</div>
						</div>

						<div class="field">
							<label class="label">Alamat</label>
							<div class="control">
								<p>{{ rsk.location.alamat }}</p>
								<span>
									<button class="button is-danger" @click="showMap">Lihat Peta</button>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label">Website</label>
							<div class="control">
								<span v-if="!rsk.website">-</span>
								<a :href="'http://' + rsk.website" class="has-text-link" v-if="rsk.website" target="_blank">{{ rsk.website }}</a>
							</div>
						</div>

						<div class="field">
							<label class="label">Telepon</label>
							<div class="control">
								<span v-if="rsk.telepon[0] === ''">-</span>

								<div class="tags" v-if="rsk.telepon[0] != ''">
									<span class="tag is-medium is-danger is-rounded" v-for="(t, index) in rsk.telepon">{{ t }}</span>
								</div>
							</div>
						</div>

						<div class="field">
							<label class="label">Fax</label>
							<div class="control">
								<span v-if="rsk.faximile[0] === ''">-</span>

								<div class="tags" v-if="rsk.faximile[0] != ''">
									<span class="tag is-medium is-danger is-rounded" v-for="(f, index) in rsk.faximile">{{ f }}</span>
								</div>
							</div>
						</div>

						<div class="field">
							<label class="label">Email</label>
							<div class="control">
								<span v-if="!rsk.email">-</span>
								<span v-if="rsk.email">{{ rsk.email }}</span>
							</div>
						</div>
					</div>
				</article>

				<a href="<?= base_url('rsk') ?>" class="button is-danger" v-if="!loading">
					<span class="icon">
						<i class="fas fa-arrow-left"></i>
					</span>
					<span>Kembali</span>
				</a>
			</div>
		</div>
	</section>
</div>

<script>
const rsk = new Vue({
	el: '#rsk',
	data: () => ({
		rsk: {},
		count: '',
		loading: true
	}),

	mounted() {
		this.fetchData()
	},

	methods: {
		fetchData () {
			axios.get('<?= base_url() ?>' + 'api/getRumahSakitKhusus?id=' + '<?= $id ?>')
				.then(res => {
					this.count = res.data.count

					if (this.count < 1) {
						window.location.replace("<?= base_url('error404') ?>")

					} else {
						this.rsk = res.data.data[0]
						document.title = 'RS ' + this.rsk.nama_rsk + ' | Sehat Yuk'
						this.loading = false
					}
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		},

		showMap () {
			let center = this.rsk.latitude + ',' + this.rsk.longitude
			let url = 'https://www.google.com/maps/search/?api=1&query=' + center
			window.open(url, '_blank')
		}
	}
})
</script>
