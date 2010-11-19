edit
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo 'NIP';?></td>
        <td><?php echo $dosen->nip;?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td><?php echo Form::input('nama', $dosen->nama);?></td>
    </tr>
    <tr>
        <?php
            $curyear = date('Y');
            $tahun_masuks = array();
            for ($i = 5; $i >= 0; --$i) {
                $tahun_masuks[$curyear-$i] = $curyear-$i;
            }

            for ($i = 0; $i <= 5; ++$i) {
                $tahun_masuks[$curyear+$i] = $curyear+$i;
            }
        ?>
        <td><?php echo Form::label('tahun_masuk', 'Tahun Masuk')?></td>
        <td><?php echo Form::select('tahun_masuk', $tahun_masuks, $dosen->tahun_masuk);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td><?php echo Form::input('tempat_lahir', $dosen->tempat_lahir);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tanggal_lahir', 'Tanggal Lahir')?></td>
        <td>
        <?php
        $date = array();
        $date[0] = " ";
        for ($i = 1; $i <= 31; ++$i) {
            $date[$i] = $i;
        }

        $month = array(
            " ",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        );

        $year = array();
        $year[0] = " ";
        for ($i = 1980; $i < date('Y'); ++$i) {
            $year[$i] = $i;
        }

        echo Form::select('tanggal', $date, $dosen->tanggal);
        echo Form::select('bulan', $month, $dosen->bulan);
        echo Form::select('tahun', $year, $dosen->tahun);
        ?>
        </td>
    </tr>
    <tr>
        <td><?php echo Form::label('jenis_kelamin', 'Jenis Kelamin')?></td>
        <td><?php echo Form::select('jenis_kelamin', array('-1' => '', '0' => 'Wanita', '1' => 'Pria'), $dosen->jenis_kelamin);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('alamat', 'Alamat')?></td>
        <td><?php echo Form::input('alamat', $dosen->alamat);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
        <td><?php echo Form::input('no_hp', $dosen->no_hp);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td><?php  echo Form::input('telp_rumah', $dosen->telp_rumah);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td><?php echo Form::input('email', $dosen->email);?></td>
    </tr>


    <tr>
        <td><?php echo Form::button('ubah', 'Ubah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>