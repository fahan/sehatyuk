<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public $app = 'core/layouts/app';
	public $navigation = 'core/elements/navigation';

	public function index()
	{
		$data = [
			'title' => 'Selamat datang di Sehat Yuk',
			'navigation' => $this->navigation,
			'menu' => 'home',
			'page' => 'sites/index'
		];

		$this->load->view($this->app, $data);
	}

	public function puskesmas()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			$data = [
				'title' => 'Daftar Puskesmas | Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'puskesmas',
				'page' => 'puskesmases/index'
			];

		} else {
			$data = [
				'title' => 'Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'puskesmas',
				'id' => $id,
				'page' => 'puskesmases/lihat'
			];
		}

		$this->load->view($this->app, $data);
	}

	public function rumahSakitKhusus()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			$data = [
				'title' => 'Daftar Rumah Sakit Khusus | Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'rsk',
				'page' => 'rsks/index'
			];

		} else {
			$data = [
				'title' => 'Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'rsk',
				'id' => $id,
				'page' => 'rsks/lihat'
			];
		}

		$this->load->view($this->app, $data);
	}

	public function rumahSakitUmum()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			$data = [
				'title' => 'Daftar Rumah Sakit Umum | Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'rsu',
				'page' => 'rsus/index'
			];

		} else {
			$data = [
				'title' => 'Sehat Yuk',
				'navigation' => $this->navigation,
				'menu' => 'rsu',
				'id' => $id,
				'page' => 'rsus/lihat'
			];
		}

		$this->load->view($this->app, $data);
	}

	public function notFound()
	{
		$data = [
			'title' => 'Halaman Tidak Ditemukan | Sehat Yuk',
			'page' => 'sites/error'
		];

		$this->load->view($this->app, $data);
	}

	public function notFoundId()
	{
		$data = [
			'title' => 'ID Tidak Ditemukan | Sehat Yuk',
			'page' => 'sites/no_id'
		];

		$this->load->view($this->app, $data);
	}
}