<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['title_web'] = 'Login | Sistem Informasi Perpustakaan';
        $this->load->view('login_view', $this->data);
    }

    public function adduser()
    {

        $this->form_validation->set_rules('user', 'User', 'required|trim|is_unique[tbl_login.user]', ['required' => 'Wajib Diisi', 'is_unique' => 'Username Sudah Terdaftar']);
        $this->form_validation->set_rules('lahir', 'Lahir', 'required|trim|alpha', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi', 'alpha' => 'Hanya Bisa Huruf Saja']);
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required|trim', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi']);
        $this->form_validation->set_rules('jenkel', 'Jenkel', 'required|trim', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi']);
        $this->form_validation->set_rules('pass', 'Pass', 'required|trim', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi']);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim|numeric|max_length[12]', ['required' => 'Wajib Diisi', 'trim' => 'Jangan Ada Spasi', 'numeric' => 'Hanya Bisa Angka', 'max_length' => 'Maksimal 12 Digit']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_login.email]', ['required' => 'Wajib Diisi', 'valid_email' => 'Masukan Email Yang Benar', 'is_unique' => 'Email sudah terdaftar']);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Form Register Akun';
            $this->load->view('register', $data);
        } else {
            // format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
            $id = $this->M_login->buat_kode('tbl_login', 'AG', 'id_login', 'ORDER BY id_login DESC LIMIT 1');
            $nama = htmlentities($this->input->post('nama', TRUE));
            $user = htmlentities($this->input->post('user', TRUE));
            $pass = md5(htmlentities($this->input->post('pass', TRUE)));
            $level = htmlentities($this->input->post('level', TRUE));
            $jenkel = htmlentities($this->input->post('jenkel', TRUE));
            $telepon = htmlentities($this->input->post('telepon', TRUE));
            $status = htmlentities($this->input->post('status', TRUE));
            $alamat = htmlentities($this->input->post('alamat', TRUE));
            $email = $_POST['email'];
            $dd = $this->db->query("SELECT * FROM tbl_login WHERE user = '$user' OR email = '$email'");
            if ($dd->num_rows() > 0) {
                $this->session->set_flashdata('pesan', 'gagal');
                redirect(base_url('login/adduser'));
            } else {
                // setting konfigurasi upload
                $nmfile = "user_" . time();
                $config['upload_path'] = './assets_style/image/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['file_name'] = $nmfile;
                // load library upload
                $this->load->library('upload', $config);
                // upload gambar 1
                $this->upload->do_upload('gambar');
                $result1 = $this->upload->data();
                $result = array('gambar' => $result1);
                $data1 = array('upload_data' => $this->upload->data());
                $data = array(
                    'anggota_id' => $id,
                    'nama' => $nama,
                    'user' => $user,
                    'pass' => $pass,
                    'level' => $level,
                    'tempat_lahir' => $_POST['lahir'],
                    'tgl_lahir' => $_POST['tgl_lahir'],
                    'level' => $level,
                    'email' => $_POST['email'],
                    'telepon' => $telepon,
                    'foto' => $data1['upload_data']['file_name'],
                    'jenkel' => $jenkel,
                    'alamat' => $alamat,
                    'tgl_bergabung' => date('Y-m-d')
                );
                $this->db->insert('tbl_login', $data);

                $this->session->set_flashdata('pp', '<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
                redirect(base_url());
            }
        }
    }
    public function auth()
    {
        $user = htmlspecialchars($this->input->post('user', TRUE), ENT_QUOTES);
        $pass = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);
        // auth
        $proses_login = $this->db->query("SELECT * FROM tbl_login WHERE user='$user' AND pass = md5('$pass')");
        $row = $proses_login->num_rows();
        if ($row > 0) {
            $hasil_login = $proses_login->row_array();

            // create session
            $this->session->set_userdata('masuk_perpus', TRUE);
            $this->session->set_userdata('level', $hasil_login['level']);
            $this->session->set_userdata('ses_id', $hasil_login['id_login']);
            $this->session->set_userdata('anggota_id', $hasil_login['anggota_id']);
            echo '<script>window.location="' . base_url() . 'dashboard";</script>';
        } else {
            $this->session->set_flashdata('error', 'Error');
            redirect(base_url('login'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>window.location="' . base_url() . '";</script>';
    }
}
