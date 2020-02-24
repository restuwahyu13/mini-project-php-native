<?php 

function rajaOngkir($url)
{
    $ch = curl_init();

    curl_setopt_array($ch, array(

        CURLOPT_URL => $url,
        CURLOPT_HTTPHEADER => array("key: 434d3c04fc285d218d740e2a568387e4", "content-type: application/x-www-form-urlencoded"),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_ENCODING => "gzip, deflate, br",
        CURLOPT_HTTP_VERSION => $_SERVER['SERVER_PROTOCOL'],
        CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],

    ));

    $output = curl_exec($ch);

    return $output;

    curl_close($ch);
}


// city rajaongkir
$response = rajaOngkir("http://api.rajaongkir.com/starter/city");
$data = json_decode($response, true);

for ($i = 0; $i < count($data); $i++) {

    $myLoop1 =  $data["rajaongkir"]["results"];
}


// province rajaongkir
$response = rajaOngkir("http://api.rajaongkir.com/starter/province");
$data = json_decode($response, true);

for ($i = 0; $i < count($data); $i++) {


    $myLoop2 =  $data["rajaongkir"]["results"];
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <title> Ngintip - Ongkir </title>

    <!-- icon -->
    <link rel="shortcut icon" href="https://cdn1.iconfinder.com/data/icons/logistic-delivery-cool-vector-2-1/128/20-512.png" type="image/x-icon" />

    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <!-- external css -->
    <link rel="stylesheet" href="style/style.css">

    <!-- jquery ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- external javascript -->
    <script defer src="script/desimal.js"></script>


</head>

<body>

    <!-- content header -->
    <header class="container clearfix mx-auto">
        <!-- image content -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 mt-4 ml-4">
                <img src="https://cdn1.iconfinder.com/data/icons/logistic-delivery-cool-vector-2-1/128/20-512.png" class="img-fluid img-header offset-3 offset-sm-3">
            </div>
        </div>
        <!-- title content -->
        <div class="row">
            <div class="col-lg-8 offset-lg-4 mt-1">
                <h1 class="title-header">Ngintip - Ongkir Pengiriman </h1>
            </div>
        </div>
    </header>

    <!-- form content -->
    <section class="container clearfix mx-auto mt-5">
        <main class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="kot asal" class="label-text mt-1"> Kota Asal</label>
                <select id="kot" class="form-control" name="kota">
                    <optgroup>
                        <option value="pilih">Pilih Kota Anda</option>
                        <?php foreach ($myLoop1 as $value1) : ?>
                        <option value="<?php echo $value1["city_id"] ?>">
                            <?php echo $value1["city_name"] ?>
                        </option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </div>

            <!-- data tujuan -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="prov tujuan" class="label-text mt-2"> Provinsi Tujuan</label>
                <select id="prov" class="form-control" name="prov">
                    <optgroup>
                        <option value="pilih">Pilih Tujuan Anda</option>
                        <?php foreach ($myLoop2 as $value2) : ?>
                        <option value="<?php echo $value2["province_id"] ?>">
                            <?php echo $value2["province"] ?>
                        </option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </div>

            <!-- data kabupaten -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="kab tujuan" class="label-text mt-2">Kabupaten Tujuan</label>
                <select id="kab" class="form-control" name="kabu"></select>
            </div>

            <!-- data jasa pengirimiman -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="kurir" class="label-text mt-2">Jasa Pengiriman</label>
                <select id="kur" class="form-control" name="kurir">
                    <option value="pilih">Pilih Kurir</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
                </select>
            </div>

            <!-- data Berat -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="nilai" class="label-text mt-4">Jumlah Berat (Kg)</label>
                <input type="text" id="ber" class="form-control" name="berat" onfocus="value=''">
            </div>

            <!-- button -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <label for="nilai" class="mt-4 hide" style="opacity:0">aaaaa</label>
                <button id="click" class="btn btn-warning btn-block mt-4 mt-sm-3 mt-lg-0">Cetak Data </button>
            </div>
        </main>
    </section>

    <!-- data table estimasi -->
    <section class="container clearfix mx-auto card-table-content">
        <main class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 offset-lg-6">
                <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg card-table-item">
                    <div class="card mt-5 mt-sm-5 mt-md-5 mt-lg-5">
                        <div class="card-header">
                            <h1 class="card-title mt-3 mt-lg-3 text-center">Estimasi Biaya Pengiriman</h1>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <table class="table table-bordered table-striped table-hovered table-content">
                                    <thead>
                                        <tr>
                                            <th>Paket</th>
                                            <th>Deskripsi</th>
                                            <th>Lama Pengiriman</th>
                                            <th>Ongkir (Rp) </th>
                                        </tr>
                                    </thead>
                                    <tbody id="details2" style="text-align: center;">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                        <small class="cp text-center"> Copyright &copy;2019 | Ngintip Developers
                    </div>
                </footer>
                </small>
        </main>
    </section>

</body>

</html>

<script type="text/javascript">
    try {

        $(document).ready(function() {

            // ketika selectnya diganti nilainya 1 jalankan fungsi ini
            $("#prov").change(function() {

                let prov = $("#prov").val();

                if (prov != "onchange" > 0) {

                    $.ajax({

                        url: "data_kabupaten.php",
                        type: "GET",
                        statusCode: {

                            404: function() {

                                alert("AJAX NOT FIND DATA");
                            }
                        },
                        data: {
                            "prov_id": prov
                        },
                        success: (200, function(data) {

                            $("#kab").html(data);

                        }) //end of success

                    }); //end of ajax request

                } //end of if

            }); //end of event change


            // ketika buttonnya diklik maka jalankan fungsi ini
            $("#click").click(function() {




                var kota = $("#kot").val();
                var kabu = $("#kab").val();
                var kurir = $("#kur").val();
                var berat = $("#ber").val()*1000;


                $.ajax({

                    url: "data_ongkir.php",
                    type: "POST",
                    statusCode: {

                        404: function() {

                            alert("AJAX NOT FIND DATA");
                        }

                    },
                    data: {
                        "kota": kota,
                        "kabu": kabu,
                        "kurir": kurir,
                        "berat": berat,

                    },
                    success: (200, function(data) {

                        // validatsi data
                        let output = $.parseJSON(data);
                        let myKot = document.getElementById("kot").selectedIndex;
                        let myProv = document.getElementById("prov").selectedIndex;
                        let myKur = document.getElementById("kur").selectedIndex;
                        let myField = $("#ber").val();
                        let regex = /[a-z-A-Z-.,/:'"-+\/|{}_+=~`!@#$%^&*()<>?]/g;
                        let regexs = /[^a-z-A-Z-.,/:'"-+\/|{}_+=~`!@#$%^&*() <>?]/g;

                        if (isFinite(myField) && myKot != 'onchange' < 1 && myKur !=
                            'onchange' < 1 && myProv != 'onchange' < 1 && myField.match(
                                regexs)) {

                            // //tampilkan data kedalam tabel 
                            // var myHtml1 = '';

                            // myHtml1 += '<tr>'
                            // myHtml1 += '<td>' + output.rajaongkir.origin_details.city_name + '</td>';
                            // myHtml1 += '<td>' + output.rajaongkir.destination_details.city_name + '</td>';
                            // myHtml1 += '<td>' + output.rajaongkir.query.weight + '</td>';
                            // myHtml1 += '</tr>'

                            // $("#details1").html(myHtml1);


                            let est = output.rajaongkir.results[0].costs;
                            var hari = output['rajaongkir'].results[0].code;
                            let jpaket = [];
                            let desk = [];
                            let lamap = [];
                            let ongk = [];

                            for (let i in est) {

                                jpaket.push(output.rajaongkir.results[0].costs[i]
                                    .service);
                                desk.push(output.rajaongkir.results[0].costs[i]
                                    .description);
                                lamap.push(output.rajaongkir.results[0].costs[i].cost[0]
                                    .etd);
                                ongk.push(output.rajaongkir.results[0].costs[i].cost[0]
                                    .value);

                                // ubah angka menjadi decimal
                                ongk[i] = desimal(ongk[i], ",", ".", 0);

                                if (hari !== 'pos') {

                                    // tambahkan hari 
                                    lamap[i] = lamap[i] + ' Hari';

                                }

                            }


                            //tampilkan data kedalam tabel 
                            var myHtml2 = '';
                            // looping element tags


                            for (let a = 0; a < jpaket.length; a++) {

                                myHtml2 += '<tr>';
                                myHtml2 += '<td>' + jpaket[a] + '</td>';
                                myHtml2 += '<td>' + desk[a] + '</td>';
                                myHtml2 += '<td>' + lamap[a] + '</td>';
                                myHtml2 += '<td>' + ongk[a] + '</td>';
                                myHtml2 += '</tr>';

                            }



                            if (jpaket.length > 0) {

                                swal({

                                    title: 'Horee...',
                                    text: 'Data telah ditemukan',
                                    icon: 'success',
                                    timer: 2000,
                                    buttons: {

                                        button: false

                                    }

                                });

                                $("#details2").html(myHtml2);

                            } else {



                                swal({

                                    title: 'Oops!',
                                    text: 'Data tidak ditemukan',
                                    icon: 'warning',
                                    timer: 2000,
                                    buttons: {

                                        button: false

                                    }

                                });



                                $("#details2").html("");


                            }


                        } //end of if
                        else if (myField.match(regex)) {


                            swal({

                                title: 'Oops!',
                                text: 'Hahaha format salah...',
                                icon: 'warning',
                                button: 'OK'

                            });


                        } else if (myField == "") {

                            swal({

                                title: 'Oops!',
                                text: 'Nilai wajib harus diisi ?',
                                icon: 'warning',
                                button: 'OK'

                            });


                        } else {

                            swal({

                                title: 'Oops!',
                                text: 'Pilih opsi minimal 1',
                                icon: 'warning',
                                button: 'OK'

                            });

                        }

                    }) //end of success

                }); //end of ajax request


            }); //end of event click

        }); //end of document ready

    } catch (err) {

        console.log(err.message + '' + err.name);

    }
</script> 	