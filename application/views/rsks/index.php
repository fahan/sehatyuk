<div id="rsk">
	<section class="hero is-light is-bold" style="margin: 52px 0 10px 0">
		<div class="hero-body">
			<div class="container wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.8s">
				<h1 class="title">
					Daftar Rumah Sakit Khusus
				</h1>
				<p class="subtitle">Ada {{ count }} RS Khusus di DKI Jakarta</p>
			</div>
		</div>
	</section>

	<div class="columns is-mobile">
		<div class="column is-10 is-offset-1">
			<div class="has-text-centered" v-if="loading">
				<i class="fas fa-spin fa-spinner title"></i>
				<p class="subtitle">Memuat data...</p>
			</div>

			<article class="message is-dark" v-for="(rsk, index) in rsks" v-if="!loading">
				<div class="message-header">
					<p>RS {{ rsk.nama_rsk }}</p>
				</div>
				<div class="message-body">
					<div class="field">
						<label class="label">Alamat</label>
						<div class="control">
							<span>{{ rsk.location.alamat }}</span>
						</div>
					</div>
					<div class="field">
						<div class="control">
							<a class="button is-dark" :href="'<?= base_url('rsk?id=') ?>' + rsk.id">Lihat</a>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>

<script>
const rsk = new Vue({
	el: '#rsk',
	data: () => ({
		rsks: {},
		count: '',
		loading: true
	}),

	mounted() {
		this.fetchData()
	},

	methods: {
		fetchData () {
			axios.get('<?= base_url() ?>' + 'api/getRumahSakitKhusus')
				.then(res => {
					this.rsks = res.data.data
					this.count = res.data.count
					this.loading = false
					// console.log(res.data)
				})

				.catch(err => {
					alert('Terjadi error. Silahkan refresh halaman atau coba lagi nanti.')
				})
		}
	}
})
</script>
