<?php require_once 'proses_registrasi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-2 mb-4">Form Registrasi IT Club GDSC</h2>        
        <form method="POST">
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM</label> 
                <div class="col-8">
                <input id="nim" name="nim" placeholder="Masukkan NIM" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label> 
                <div class="col-8">
                <input id="nama" name="nama" placeholder="Masukkan Nama" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label> 
                <div class="col-8">
                <input id="email" name="email" placeholder="Masukkan Email" type="text" class="form-control" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Jenis Kelamin</label> 
                <div class="col-8">
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_0" type="radio" class="custom-control-input" value="Pria" required="required"> 
                    <label for="jenis_kelamin_0" class="custom-control-label">Pria</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input name="jenis_kelamin" id="jenis_kelamin_1" type="radio" class="custom-control-input" value="Wanita" required="required"> 
                    <label for="jenis_kelamin_1" class="custom-control-label">Wanita</label>
                </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="domisili" class="col-4 col-form-label">Domisili</label> 
                <div class="col-8">
                <select id="domisili" name="domisili" class="custom-select" required="required">
                    <?php foreach($domisili as $dom): ?>
                        <option value="<?= $dom ?>"><?= $dom ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="program_studi" class="col-4 col-form-label">Program Studi</label> 
                <div class="col-8">
                <select id="program_studi" name="program_studi" class="custom-select" required="required">
                    <?php foreach($program_studi as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Skill Programming</label> 
                <div class="col-8">
                <?php $no=0; foreach($skill as $key => $value): ?>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="skill[]" id="skill_<?= $no ?>" type="checkbox" class="custom-control-input" value="<?= $key .':'. $value ?>"> 
                        <label for="skill_<?= $no ?>" class="custom-control-label"><?= $key ?></label>
                    </div>
                <?php $no++; endforeach; ?>
                </div>
            </div> 
            <div class="form-group row">
                <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <tr class="table-primary">
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Domisili</th>
                <th>Program Studi</th>
                <th>Skill Programming</th>
                <th>Skor</th>
                <th>Predikat</th>
            </tr>
            <?php
            if(isset($_POST['submit'])){
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $domisili = $_POST['domisili'];
                $program_studi = $_POST['program_studi'];
                
                $skill = "-";
                $nama_skill = array();
                $nilai = 0;
                
                if(!empty($_POST['skill'])){
                    $skill = $_POST['skill'];
                    foreach($skill as $s){
                        $pecahan = explode(":", $s);
                        $nama_skill[] = $pecahan[0];
                        $nilai += $pecahan[1];
                    }
                }else{
                    $nama_skill = ["-"];
                }

                $predikat = "";
                if($nilai >= 100 ){
                    $predikat = "Sangat Baik";
                }else if($nilai >= 60 && $nilai < 100 ){
                    $predikat = "Baik";
                }else if($nilai >= 40 && $nilai < 60 ){
                    $predikat = "Cukup";
                }else if($nilai > 0 && $nilai < 40){
                    $predikat = "Kurang";
                }else{
                    $predikat = "Tidak Memadai";
                }

            ?>
            <tr>
                <td><?= $nim; ?></td>
                <td><?= $nama; ?></td>
                <td><?= $email; ?></td>
                <td><?= $jenis_kelamin; ?></td>
                <td><?= $domisili; ?></td>
                <td><?= $program_studi; ?></td>
                <td><?= implode(', ',$nama_skill) ?></td>
                <td><?= $nilai ?></td>
                <td><?= $predikat ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>