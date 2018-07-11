<div id="puskesmas">
	<section class="hero is-light is-bold" style="margin: 52px 0 10px 0">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					Daftar Puskesmas
				</h1>
				<p class="subtitle">Ada {{ count }} Puskesmas di DKI Jakarta</p>
			</div>
		</div>
	</section>

	<div class="columns">
		<div class="column is-10 is-offset-1">
			<div class="has-text-centered" v-if="loading">
				<i class="fas fa-spin fa-spinner title"></i>
				<p class="subtitle">Memuat data...</p>
			</div>

			<article class="message is-dark" v-for="(puskesmas, index) in puskesmases" v-if="!loading">
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
							<a class="button is-dark" :href="'<?= base_url('puskesmas?id=') ?>' + puskesmas.id">Lihat</a>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>

<script>
const puskesmas = new Vue({
	el: '#puskesmas',
	data: () => ({
		puskesmases: {},
		count: '',
		loading: true
	}),

	mounted() {
		this.fetchData()
	},

	methods: {
		fetchData () {
			axios.get('<?= base_url() ?>' + 'api/getPuskesmas')
				.then(res => {
					this.puskesmases = res.data.data
					this.count = res.data.count
					this.loading = false
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		}
	}
})
</script>
