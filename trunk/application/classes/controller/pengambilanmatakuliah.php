<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pengambilanmatakuliah extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Pengambilan matakuliah";
    }

    public function action_ambil($nim) {
        $this->template->title = "Ambil matakuliah";

        if (isset ($_POST['ambil'])) {
            // hapus data yang telah ada
            $pengambilanmks = new Model_Pengambilanmk();
            $pengambilanmks->where('semester', '=', $_POST['semester_ambil'])
                    ->where('nim_mahasiswa', '=', $nim)
                    ->delete_all();

            // simpan data
            foreach ($_POST['ambil'] as $key => $val) {
                $pengambilanmks = new Model_Pengambilanmk();
                $pengambilanmks->kode_kuliah    = $key;
                $pengambilanmks->nim_mahasiswa  = $nim;
                $pengambilanmks->semester       = $_POST['semester_ambil'];
                $pengambilanmks->save();
            }
        }

        $matakuliahs = new Model_Matakuliah();
        $mahasiswa = new Model_Mahasiswa($nim);
        $pengambilanmks = new Model_Pengambilanmk();

        $this->template->content->matakuliahs = $matakuliahs->find_all();
        $this->template->content->mahasiswa = $mahasiswa;
        $this->template->content->pengambilanmks = $pengambilanmks;
    }

    public function action_ksm($nim) {
        $this->template->title = "KSM";
        $matakuliahs = array();
        $pengambilanmks = new Model_Pengambilanmk();
        $pengambilanmks = $pengambilanmks
                            ->where('nim_mahasiswa', '=', $nim)
                            ->where('semester', '=', 2)
                            ->find_all();
        foreach ($pengambilanmks as $pengambilanmk) {
            $kode = $pengambilanmk->kode_kuliah;
            $matakuliah = new Model_Matakuliah($kode);
            $matakuliahs[] = $matakuliah;
        }

        $this->template->content->matakuliahs = $matakuliahs;
    }

    public function action_transkrip() {
        $this->template->title = "Transkrip mahasiswa";
    }

    public function action_inputnilai($kode_mata_kuliah = NULL) {
        $this->template->title = "Inputnilai mahasiswa";
    }

    public function action_jadwal($nim) {
        $this->template->title = "Jadwal Kuliah";
    }
} // End Pengambilan matakuliah