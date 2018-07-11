<div id="rsu">
	<section class="hero is-light is-bold" style="margin: 52px 0 10px 0">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					RS {{ rsu.nama_rsu }}
				</h1>
				<p class="subtitle">Informas Lengkap</p>
			</div>
		</div>
	</section>

	<div class="columns">
		<div class="column is-10 is-offset-1">
			<div class="has-text-centered" v-if="loading">
				<i class="fas fa-spin fa-spinner title"></i>
				<p class="subtitle">Memuat data...</p>
			</div>

			<article class="message is-dark" v-if="!loading">
				<div class="message-body">
					<div class="field">
						<label class="label">Jenis RSU</label>
						<div class="control">
							<span>{{ rsu.jenis_rsu }}</span>
						</div>
					</div>

					<div class="field">
						<label class="label">Alamat</label>
						<div class="control">
							<p>{{ rsu.location.alamat }}</p>
							<span>
								<button class="button is-link" @click="showMap">Lihat Peta</button>
							</span>
						</div>
					</div>

					<div class="field">
						<label class="label">Website</label>
						<div class="control">
							<span v-if="!rsu.website">-</span>
							<a :href="'http://' + rsu.website" class="has-text-link" v-if="rsu.website" target="_blank">{{ rsu.website }}</a>
						</div>
					</div>

					<div class="field">
						<label class="label">Telpon</label>
						<div class="control">
							<div class="tags">
								<span class="tag is-medium is-rounded" v-for="(t, index) in rsu.telepon">{{ t }}</span>
							</div>
						</div>
					</div>

					<div class="field">
						<label class="label">Fax</label>
						<div class="control">
							<div class="tags">
								<span class="tag is-medium is-rounded" v-for="(f, index) in rsu.faximile">{{ f }}</span>
							</div>
						</div>
					</div>

					<div class="field">
						<label class="label">Email</label>
						<div class="control">
							<span v-if="!rsu.email">-</span>
							<span v-if="rsu.email">{{ rsu.email }}</span>
						</div>
					</div>
				</div>
			</article>

			<a href="<?= base_url('rsu') ?>" class="button is-dark" v-if="!loading">
				<span class="icon">
					<i class="fas fa-arrow-left"></i>
				</span>
				<span>Kembali</span>
			</a>
		</div>
	</div>
</div>

<script>
const rsu = new Vue({
	el: '#rsu',
	data: () => ({
		rsu: {},
		count: '',
		loading: true
	}),

	mounted() {
		this.fetchData()
	},

	methods: {
		fetchData () {
			axios.get('<?= base_url() ?>' + 'api/getRumahSakitUmum?id=' + '<?= $id ?>')
				.then(res => {
					this.count = res.data.count

					if (this.count < 1) {
						window.location.replace("<?= base_url('error404') ?>")

					} else {
						this.rsu = res.data.data[0]
						document.title = this.rsu.nama_rsu + ' | Sehat Yuk'
						this.loading = false
					}
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		},

		showMap () {
			let center = this.rsu.latitude + ',' + this.rsu.longitude
			let url = 'https://www.google.com/maps/search/?api=1&query=' + center
			window.open(url, '_blank')
		}
	}
})
</script>
