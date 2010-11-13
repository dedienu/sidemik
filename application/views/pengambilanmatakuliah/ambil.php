<?php
$semester_ambils = array();
$semester_ambil = 2;
for ($i = 1; $i < 9; ++$i) {
    $semester_ambils[$i] = $i;
}
?>

<?php echo Form::open(NULL, array('method' => 'post'))?>
<?php echo Form::select('semester_ambil', $semester_ambils, 2);?>
<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>Ambil</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="3"><?php echo Form::submit('ambil', 'Ambil'); ?></td>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ($matakuliahs as $matakuliah) {
        ?>
        <tr>
            <td><?php  echo $matakuliah->kode; ?></td>
            <td><?php echo $matakuliah->nama; ?></td>
            <td>
                <?php
                $ambil;
                $result = $pengambilanmks
                            ->where('nim_mahasiswa', '=', $mahasiswa->nim)
                            ->where('kode_kuliah', '=', $matakuliah->kode)
                            ->where('semester', '=', $semester_ambil)
                            ->find();
                if ($result->id != NULL) {
                    $ambil = 'ya';
                } else {
                    $ambil = 'tidak';
                }
                echo Form::select("ambil[$matakuliah->kode]", array('tidak' => 'Tidak', 'ya' => 'Ya'), $ambil)
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php echo Form::close() ?>