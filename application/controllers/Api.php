<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public $curl;

	public function __construct()
	{
		parent::__construct();
		$this->curl = curl_init();
	}

	public function getRumahSakitUmum()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/rumahsakitumum",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}

		} else {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/rumahsakitumum/".$id,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}
		}
	}
	
	public function getRumahSakitKhusus()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/rumahsakitkhusus",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}

		} else {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/rumahsakitkhusus/".$id,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}
		}		
	}
	
	public function getPuskesmas()
	{
		$id = $this->input->get('id');

		if (!isset($id)) {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/puskesmas",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}

		} else {
			curl_setopt_array($this->curl, [
				CURLOPT_URL => "http://api.jakarta.go.id/v1/puskesmas/".$id,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"Authorization: API_KEY"
				],
			]);

			$response = curl_exec($this->curl);
			$err = curl_error($this->curl);

			curl_close($this->curl);

			if ($err) {
				echo "cURL Error #: " . $err;
			} else {
				echo $response;
			}
		}
	}
}
