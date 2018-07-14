<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="puskesmas">
	<section class="hero is-danger is-bold" style="margin-top: 52px">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					{{ puskesmas.nama_Puskesmas }}
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
							<label class="label">Alamat</label>
							<div class="control">
								<span>{{ puskesmas.location.alamat }}</span>
							</div>
						</div>

						<div class="field">
							<label class="label">Kepala Puskesmas</label>
							<div class="control">
								<span>{{ puskesmas.kepala_puskesmas }}</span>
							</div>
						</div>

						<div class="field">
							<label class="label">Telepon</label>
							<div class="control">
								<span v-if="puskesmas.telepon[0] === ''">-</span>

								<div class="tags" v-if="puskesmas.telepon[0] != ''">
									<span class="tag is-medium is-danger is-rounded" v-for="(t, index) in puskesmas.telepon">{{ t }}</span>
								</div>
							</div>
						</div>

						<div class="field">
							<label class="label">Fax</label>
							<div class="control">
								<span v-if="puskesmas.faximile[0] === ''">-</span>
								
								<div class="tags" v-if="puskesmas.faximile[0] != ''">
									<span class="tag is-medium is-danger is-rounded" v-for="(f, index) in puskesmas.faximile">{{ f }}</span>
								</div>
							</div>
						</div>

						<div class="field">
							<label class="label">Email</label>
							<div class="control">
								<span>{{ puskesmas.email }}</span>
							</div>
						</div>
					</div>
				</article>

				<a href="<?= base_url('puskesmas') ?>" class="button is-danger" v-if="!loading">
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
const puskesmas = new Vue({
	el: '#puskesmas',
	data: () => ({
		puskesmas: {},
		count: '',
		loading: true
	}),

	mounted() {
		this.fetchData()
	},

	methods: {
		fetchData () {
			axios.get('<?= base_url() ?>' + 'api/getPuskesmas?id=' + '<?= $id ?>')
				.then(res => {
					this.count = res.data.count

					if (this.count < 0) {
						window.location.replace("<?= base_url('error404') ?>")

					} else {
						this.puskesmas = res.data.data[0]
						document.title = this.puskesmas.nama_Puskesmas + ' | Sehat Yuk'
						this.loading = false
					}
						
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		}
	}
})
</script>
