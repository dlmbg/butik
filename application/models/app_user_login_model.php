<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Model untuk manajemen user login
	 **/
	 
	public function cekUserLogin($data)
	{
		//memecah data dari parameter method ke dalam array
		$cek['userid'] 	= mysql_real_escape_string($data['username']);
		//gabungkan hasil input POST dengan key login yang ada di dalam tabel setting
		$cek['password'] 	= md5(mysql_real_escape_string($data['password']).$GLOBALS['key_login']);

		//mengecek data inputan ke dalam database
		$q_cek_login = $this->db->get_where('user_login', $cek);

		//jika hasil lebih dari 0
		if(count($q_cek_login->result())>0)
		{
			//login sukses
			//ambil detail data user dari tabel
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['nama_user_login'] = $qad->nama;
				$sess_data['kode_user'] = $qad->id;
				$sess_data['username'] = $qad->userid;
				$sess_data['level'] = $qad->level;

				//daftarkan ke dalam session
				$this->session->set_userdata($sess_data);
			}
			//arahkan halaman ke controller dashboard
			redirect("dashboard");
		}
		//jika login gagal
		else
		{
			//set pesan gagal login ke session sementara
			//arahkan halaman ke controller login
			$this->session->set_flashdata("result_login","Gagal Login. Username dan Password Tidak Cocok....");
			redirect("login");
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */