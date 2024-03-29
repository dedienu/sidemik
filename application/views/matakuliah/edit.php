<script type="text/javascript">
    $(document).ready(function() {
        $("#edit_mata_kuliah_form").validate();
    });
</script>

<h2>Edit Mata Kuliah</h2>
<?php echo Form::open(NULL, array('method'=>'post', 'id'=>'edit_mata_kuliah_form'));?>
<table>
    <tr>
        <td><?php echo 'Kode';?></td>
        <td><?php echo $matakuliah->kode;?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama Mata Kuliah')?></td>
        <td><?php echo Form::input('nama', $matakuliah->nama, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('jumlah_sks', 'Jumlah SKS')?></td>
        <td><?php echo Form::select('jumlah_sks', $select_jumlah_sks, $matakuliah->jumlah_sks, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('deskripsi', 'Deskripsi')?></td>
        <td><?php echo Form::textarea('deskripsi', $matakuliah->deskripsi);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tingkat', 'Tingkat')?></td>
        <td><?php echo Form::select('tingkat', array(''=>' ','1'=>'1', '2'=>'2', '3'=>'3'), $matakuliah->tingkat, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('semester_buka', 'Semester Buka')?></td>
        <td><?php echo Form::select(
                'semester_buka',
                array('0'=>'Semester ganjil dan genap','1'=>'Semester ganjil', '2'=>'Semester genap'),
                $matakuliah->semester_buka
                );?>
        </td>
    </tr>
    <tr>
        <td><?php echo Form::button('edit', 'Ubah')?></td>
        <td></td>
    </tr>
</table>