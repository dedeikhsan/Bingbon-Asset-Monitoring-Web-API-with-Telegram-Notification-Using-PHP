<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/ef76144caf.js" crossorigin="anonymous"></script>

    <title>Crypto Bingbon</title>
</head>

<body>
    <div class="container title">
        <h3 class="text-center mt-5">LIVE COIN BINGBON</h3>
        <hr style="width: 250px;">
    </div>

    <div class="container">
        <p>
            <i class="fas fa-clock"><b> Update data dalam: <span id="timer">00:00</span> Detik</b></i>
        </p>
        <p>
            <i class="fas fa-coins"><b> Total aset: 48</b></i>
        </p>
    </div>

    <div class="container mt-5">
        <table class="table table-sm text-center shadow p-3 mb-5 bg-white rounded" style="font-family: Poppins, Cursive;">
            <thead>
                <tr>
                    <th scope=" col">No</th>
                    <th scope="col">Aset</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Last Price</th>
                    <th scope="col">High</th>
                    <th scope="col">Low</th>
                    <th scope="col">Last < Low</th>
                    <th scope="col">Last > High</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "setting.php";
                require_once "notification.php";

                $no = 1;
                global $aset;
                foreach ($data['data'] as $row) {
                ?>
                    <?php if (is_array($row)) { ?>

                        <?php foreach ($row as $rows) { ?>

                            <tr>

                                <td><?= $no++;  ?></td>
                                <td><?php $aset = $rows['base_currency'];
                                    echo $aset; ?></td>
                                <td><?= $rows['quote_currency']; ?></td>
                                <td><?= $rows['last_price']; ?></td>
                                <td><?= $rows['high']; ?></td>
                                <td><?= $rows['low']; ?></td>

                                <?php if ($rows['last_price'] > $rows['low']) { ?>
                                    <td class="bg-success text-white"><?= $rows['last_price'] - $rows['low']; ?></td>
                                <?php } else if ($rows['last_price'] < $rows['low']) { ?>
                                    <td class="bg-danger text-red"><?= $rows['last_price'] - $rows['low']; ?></td>
                                <?php } else { ?>
                                    <td class="bg-success text-white"><?= "Safe"; ?></td>
                                <?php } ?>

                                <?php if ($rows['last_price'] > $rows['high']) { ?>
                                    <td class="bg-primary text-white"><?= $rows['last_price'] - $rows['high']; ?></td>
                                <?php } else if ($rows['last_price'] < $rows['high']) { ?>
                                    <td class="bg-success text-white"><?= $rows['high'] - $rows['last_price']; ?></td>
                                <?php } ?>



                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <footer class="mt-5 mb-5">
        <div class="container text-center">
            <p style="font-family: Poppins, Cursive; font-size: 14px;"><span style="font-weight: 600;">@Copyright</span> 2021 | API Kelompok 6.</p>
        </div>
    </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>