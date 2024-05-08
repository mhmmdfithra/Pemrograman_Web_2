<?php 
$Mahasiswa="";
$KRSMahasiswa=array(
    array(
        "nama"=>"Ridho",
        "MataKuliah"=>array(
                "Pemrograman I", "Praktikum Pemrograman I", "Pengantar Lingkungan Lahan Basah","Arsitektur Komputer"
            ),
        "SKS"=>array(
            "Pemrograman I"=>2,
            "Praktikum Pemrograman I"=>1,
            "Pengantar Lingkungan Lahan Basah"=>2,
            "Arsitektur Komputer"=>3
        ), 
    ),
    array(
        "nama"=>"Ratna",
        "MataKuliah"=>array(
                "Basis Data I", "Praktikum Basis Data I", "Kalkulus"
            ),
        "SKS"=>array(
            "Basis Data I"=>2,
            "Praktikum Basis Data I"=>1,
            "Kalkulus"=>3
        ), 
    ),
    array(
        "nama"=>"Tono",
        "MataKuliah"=>array(
                "Rekayasa Perangkat Lunak", "Analisis dan Perancangan Sistem", "Komputasi Awan","Kecerdasan Bisnis"
            ),
        "SKS"=>array(
            "Rekayasa Perangkat Lunak"=>3,
            "Analisis dan Perancangan Sistem"=>3,
            "Komputasi Awan"=>3,
            "Kecerdasan Bisnis"=>3
        ), 
    ),
);

function RevisiOrnot($totalsks){
    global $Mahasiswa;
        
    if ($totalsks<7) {
        $Mahasiswa="revisi KRS";
        return true;
    }else{
        $Mahasiswa="Tidak Revisi KRS";
        return false;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK403</title>
    <style>
        th{
            background-color: gainsboro;
            border: 1px solid black;
            outline: none;
            height: 35px;
        }
        td{
            width: 100px;
            border: 1px solid black;
            outline: none;
            padding-left: 6px;

        }
        table{
            border: 1px solid black;
            outline: none;
            border-collapse: collapse;
        }
        .nomor{
            width: 30px;
        }
        .mata-kuliah{
            width: 200px;
        }
        .sks{
            width: 50px;
        }
        .hijau{
            background-color: green;
        }
        .merah{
            background-color: red;
        }
        
    </style>
</head>
<body>
    <table>
        <th>
                No
        </th>
        <th>
                Nama
        </th>
        <th>
            Mata Kuliah diambil
        </th>
        <th>
             SKS
        </th>
        <th>
            Total SKS
        </th>
        <th>
            Keterangan
        </th>
        <?php $no=1; foreach ($KRSMahasiswa as $mhs): ?>
            <?php 
                $jumlahMataKuliah = count($mhs['MataKuliah']);
                $totalSKS = array_sum($mhs['SKS']);
                
            ?>
            <?php foreach ($mhs['MataKuliah'] as $index => $mataKuliah): ?>
                <tr>
                    <?php if ($index === 0): ?>
                        <td class="nomor" rowspan="<?php echo $jumlahMataKuliah; ?>"><?php echo $no++; ?></td>
                        <td class="nama" rowspan="<?php echo $jumlahMataKuliah; ?>"><?php echo $mhs['nama']; ?></td>
                    <?php endif; ?>
                    <td class="mata-kuliah"><?php echo $mataKuliah; ?></td>
                    <td class="sks"><?php echo $mhs['SKS'][$mataKuliah]; ?></td>
                    <?php if ($index === 0): ?>
                        <td class="total" rowspan="<?php echo $jumlahMataKuliah; ?>"><?php echo $totalSKS; ?></td>
                        <?php 
                            $kelas = RevisiOrnot($totalSKS) ? "merah" : "hijau";
                            echo ("<td class=$kelas rowspan=".$jumlahMataKuliah.">$Mahasiswa</td>");
                        ?>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </table>
    
    
    <br>

</body>
</html>
