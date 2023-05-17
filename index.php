<!DOCTYPE html>
<html>
<head>
    <title>Multiple Page HTML</title>
    <style>
        .page {
            display: none;
        }
        
        .active {
            display: block;
        }
    </style>
    <script>
        function showPage(pageId) {
            var pages = document.getElementsByClassName('page');
            for (var i = 0; i < pages.length; i++) {
                pages[i].classList.remove('active');
            }

            document.getElementById(pageId).classList.add('active');
        }
        $( document ).ready(function() {
            //saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
            $("#ipk").change(function(){
                if(document.getElementById('ipk').value < 3){
                    $("#berkas").attr('disabled', false);
                    $("#submit").attr('disabled', false);
                }
            });
        });
    </script>
</head>
<body>
    <nav>
        <a href="#" onclick="showPage('page1')">Pilih Beasiswa</a>
        <a href="#" onclick="showPage('page2')">Isi data</a>
        <a href="#" onclick="showPage('page3')">Hasil</a>
    </nav>
<!-- -------------------------------------------------------------------------------------------------- -->
    <form method="POST" enctype="multipart/form-data" action="submit.php">
        <div id="page1" class="page active">
            <h1>Pilih Beasiswa</h1>
            <div>
                <table>
                    <tr>
                        <td><b>Pilihan Beasiswa</b></td>
                        <td>Daftar</td>
                        <td>Hasil</td>
                    </tr>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td>Selamat datang!\nSilakan memilih jenis beasiswa:</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" value="Akademik" name="beasiswa_jenis">Beasiswa Akademik
                            <input type="radio" value="NonAkademik" name="beasiswa_jenis">Beasiswa Non-akademik
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
<!-- -------------------------------------------------------------------------------------------------- -->

        <div id="page2" class="page">
            <h1>Isi Data</h1>

            <div>
                <p>Daftar Beasiswa</p>
                <p>Registrasi Beasiswa</p>
                <table>
                    <tr>
                        <td>Masukkan nama:</td>
                        <td><input type="text" id="nama" name="nama"></td>
                    </tr>
                    <tr>
                        <td>Masukkan email:</td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td>Nomor HP:</td>
                        <td><input type="number" id="hp" name="hp"></td>
                    </tr>
                    <tr>
                        <td>Semester Saat ini:</td>
                        <td>
                            <select name="semester" id="selsemester">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>IPK Terakhir</td>
                        <td><input type="number" id="ipk" name="ipk"></td>
                    </tr>
                    <tr>
                        <td>Berkas</td>
                        <td><input type="file" id="berkas" name="berkas"></td>
                    </tr>
                    <tr>
                        <td>
                            <input id="submit" type="submit">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
<!-- -------------------------------------------------------------------------------------------------- -->

    <div id="page3" class="page">
        <h1>Hasil</h1>
        
        <table>
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>email</td>
                <td>HP</td>
                <td>Semester</td>
                <td>IPK</td>
                <td>Berkas</td>
                <td>Status Ajuan</td>
            </tr>
            <?php
                // Include config file
                require_once "conn.php";

                // Attempt select query execution
                $sql = "SELECT * FROM user";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['nama'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['hp'] . "</td>";
                                    echo "<td>" . $row['semester'] . "</td>";
                                    echo "<td>" . $row['ipk'] . "</td>";
                                    echo "<td>" . $row['status_ajuan'] . "</td>";
                                    echo "<td>" . $row['berkas'] . "</td>";
                                    // echo "<td>";
                                        // echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                        // echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                        // echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                    // echo "</td>";
                                echo "</tr>";
                            }
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                // Close connection
                mysqli_close($conn);
                ?>
                    
        </table>
    </div>

</body>
</html>