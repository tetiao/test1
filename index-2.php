<?php
/* diubah tety*/
/* diubah 2 */
/* diubah 5 */
include 'config/connect.php';
include 'action/cobafriendcode.php';
include 'library/PHPMailerAutoload.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//include 'action/auto_delete_user1.php';
//include 'action/auto_delete_user2.php';

/* script menentukan hari */
$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
$hr = $array_hr[date('N')];

/* script menentukan tanggal */
$tgl= date('j');
/* script menentukan bulan */
$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bln = $array_bln[date('n')];
/* script menentukan tahun */
$thn = date('Y');

/* script menentukan waktu server*/
$dat_server = mktime(date('G'), date('i'), date('s'), date('n'), date('j'), date('Y'));
$diff_gmt = substr(date('O',$dat_server),1,2);
$datdif_gmt = 60 * 60 * $diff_gmt;
if (substr(date('O',$dat_server),0,1) == "+") {
    $dat_gmt = $dat_server - $datdif_gmt;
} else {
    $dat_gmt = $dat_server + $datdif_gmt; }

// Hitung perbedaan GMT dengan waktu Indonesia (GMT+7) // karena perbedaan waktu adalah dalam jam, maka kita jadikan detik
$datdif_id = 60 * 60 * 7;
$dat_id = $dat_gmt + $datdif_id;
$waktu = date('H:i:s', $dat_id);

/* script perintah keluaran*/


if($hr=='Selasa' && $waktu =='10:00:00'){
    include 'action/auto_cv_check_user1.php';
} else {

}

/* CEK AKTIVASI OTOMATIS */
/*if($hr=='Rabu' && $waktu =='14:55:00'){
    include 'action/auto_activation_check_user1.php';
    include 'action/auto_activation_check_user2.php';
}else {

}*/

//$hasil=mysql_fetch_array($result_check);



session_start();
$url = $_SESSION['url'];
unset($_SESSION['url']);

$url_candidat = $_SESSION['url_candidat'];
unset($_SESSION['url_candidat']);

$url_new_vac = $_SESSION['url_new_vac'];
unset($_SESSION['url_new_vac']);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

 <!-- Start of kerjabilitascom Zendesk Widget script -->
    <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(c){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("//assets.zendesk.com/embeddable_framework/main.js","kerjabilitascom.zendesk.com");
        /*]]>*/</script>
    <!-- End of kerjabilitascom Zendesk Widget script -->

    <title>Kerjabilitas</title>
<link rel="manifest" href="manifest.json">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/Icon.png"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="js/bootstrap.js"/>
    <link rel="stylesheet" href="js/bootstrap.min.js"/>
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/jquery.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css"/>


    <!-- New Template Included -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="analytics/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="analytics/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="analytics/admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="analytics/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="analytics/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="analytics/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="analytics/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - te..xt editor -->
    <link rel="stylesheet" href="analytics/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- start Mixpanel -->
    <script type="text/javascript">
        (function(f,b){
            if(!b.__SV){
                var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){
                    function f(b,h){
                        var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){
                            b.push([h].concat(Array.prototype.slice.call(arguments,0)))}
                    }
                    var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){
                        var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a
                    };
                    c.people.toString=function(){
                        return c.toString(1)+".people (stub)"
                    };
                    i="disable track track_pageview track_links track_forms register register_once alias unregister " +
                        "identify name_tag set_config people.set people.set_once people.increment people.append people." +
                        "union people.track_charge people.clear_charges people.delete_user".split(" ");

                    for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])
                };
                b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof
                    MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";
                e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
        mixpanel.init("1b9929ef661390e441f06160e38739fe");
    </script>
    <!-- end Mixpanel -->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-58941878-2', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>

<!-- QUERY KIRIM LOWONGAN TUTUP KE INFO@KERJABILITAS.COM -->
<?php
$idt = date("Ymd");

// Get CLose Vacancy Data
$vac_query = mysql_query("SELECT * FROM vacancy WHERE publish LIKE 'yes' AND confirm LIKE 'yes' AND report_vac_close LIKE 'no'
AND DATEDIFF(CURDATE(), idt_vac_close) >= 0 ORDER BY id_vacancy");
$vac_rows = mysql_num_rows($vac_query);
// Get Employer Data
// $emp_query = mysql_query("SELECT * FROM employer WHERE id_employer = '$id_employer' OR recruitment_mail like 'info@kerjabilitas.com' ");
if($vac_rows > 0){
 include 'action/auto_vacancy_close_information.php';
} else {
    //nothing to do
}

?>


<script type="text/javascript">
    mixpanel.track("Registered", {"Gender": "Male", "Age": 21});
</script>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">www.kerjabilitas.com</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--
<div id="adds" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bdcolor text-center" style="color: #000000; font-family: fonts/OpenSans-Regular.ttf; font-size: 15px; padding-top: 5px; padding-bottom: 5px">
    <div class="ads col-xs-10 col-sm-8 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-2 col-md-offset-3 col-lg-offset-3">
        Unduh Aplikasi Kerjabilitas</b> &nbsp;&nbsp;
        <a href="https://play.google.com/store/apps/details?id=kerjabilitas.com.kerjabilitaslauncher" target="_blank">
            <img src="img/GooglePlay.png" width="125" alt="GooglePlay"/>
        </a>
    </div>
    <div class="ads col-xs-2 col-sm-2 col-md-3 col-lg-3 text-right">
        <div onclick="addsx()">
            <b style="color: #000000">
                <span class="glyphicon glyphicon-remove-circle"></span>
            </b>
        </div>
    </div>
</div>

<script type="text/javascript">
    function addsx(){
        var values="";
        values = "";
        document.getElementById("adds").innerHTML = values;
    }
</script>
-->

<div class="navbar-inverse">
    <div class="row clearfix">
        <div class="container col-xs-12 col-sm-5 col-md-4 col-lg-4 col-lg-offset-1">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="main_page/kerjabilitas-hiring.php"><img src="img/kerjabilitas-logo.png" alt="logo_mkpd" class="img img-responsive"/></a>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-5 col-lg-offset-1">
            <br/>
            <form method="POST" action="action/user1_login.php" >
                <input class="form-control" type="hidden" name="id" value="<?php print $_SESSION['dua']; ?>" />
                <input class="form-control" type="hidden" name="candidat" value="<?php print $_SESSION['candidat']; ?>" />
                <input class="form-control" type="hidden" name="newvac" value="<?php print $_SESSION['new_vac']; ?>" />

                <input class="form-control" type="hidden" name="url" value="<?php print $url; ?>" />
                <input class="form-control" type="hidden" name="url_candidat" value="<?php print $url_candidat; ?>" />
                <input class="form-control" type="hidden" name="url_new_vac" value="<?php print $url_new_vac; ?>" />

                <input class="form-control" type="hidden" name="exc" value="<?php print $_SESSION['exc']; ?>" />

                <div class="form-group col-xs-12 col-sm-6 col-md-5" style="font-size: 10px">
                    <input class="form-control" type="email" name="user1_email" placeholder="Email" />
                </div>
                <div class="form-group col-xs-12 col-sm-6 col-md-5">
                    <input class="form-control" type="password" name="user1_password" placeholder="Kata Sandi" />
                    <a href="main_page/user_forget_password.php" style="color: #ffffff; font-size: 12px">
                        <span class="fa fa-lock"></span>
                        Lupa kata sandi ?</a>
                </div>
                <div class="text-right col-xs-12 col-sm-12 col-md-2">
                    <button type="submit" class="btn btn-default btn-flat" name = "submit_login">
                        <span class="fa fa-unlock-alt"></span>
                        MASUK
                    </button>
                </div>
            </form>
            <br/>&nbsp;
        </div>
    </div>
</div>

<br><br><br><br><br><br>
<div class="container">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <p align="justify"><h3><b>Jaringan sosial karir disabilitas pertama di Indonesia!</b></h3></p>
                <p align="justify">
                <h4>Kini kamu bisa saling terhubung untuk mencari peluang berkarya dan berdaya bersama.</h4>
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12" style="font-size: 12px"><br>
                <img src="img/people/banner.jpg" alt="" class="img img-responsive">
            </div>

            <!--
            <div class="text-center col-xs-12 col-sm-3 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0" style="font-size: 24px; color: #000000">
                <br/>
                <b>SELAMAT HARI IBU</b>
            </div> -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: #fafafc">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="border-radius: 7px>
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-12 column">
                            <h3 class="text-center">
                                <b>Daftar di sini - GRATIS !</b>
                            </h3><br>
                        </div>
                    </div>

                    <form action="action/user1_register.php" method="POST">
                        <?php
                        $idt = date("Ymd");
                        ?>
                        <input type="hidden" name="idt" value="<?php print $idt;?>">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-6 column" style="padding-right: 15px">
                                <div class="form-group">
                                    <input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 column" style="padding-left: 15px">
                                <div class="form-group">
                                    <input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control" required="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 column">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="" >
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 column">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="">
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    <!-- TANGGAL LAHIR-->
                                    <label>Tanggal Lahir</label><br/>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px; margin-bottom: 5px">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 0px; padding-right: 3px; margin-bottom: 5px">
                                        <select style="font-size: 12px" class="form-control" name="tanggal" id="tanggal" required="">
                                            <option value="">Tanggal</option>
                                            <?php for ($i=1; $i<=31; $i++) {?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 0px; padding-right: 3px; margin-bottom: 5px">
                                        <select style="font-size: 12px" class="form-control" name="bulan" id="bulan" required="">
                                            <option value="">Bulan</option>
                                            <?php
                                            $bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                            ?>
                                            <?php
                                            for($n=1; $n<=12; $n++){
                                                ?>
                                                <option value="<?php echo $bln[$n];?>"><?php echo $bln[$n];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="padding: 0px; padding-right: 3px; margin-bottom: 5px">
                                        <select style="font-size: 12px" class="form-control" name="tahun" id="tahun" required="">
                                            <option value="">Tahun</option>
                                            <?php
                                            for ($j=1955; $j<=1998; $j++){?>
                                                <option value="<?php echo $j ?>"><?php echo $j; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                </div>
                                    <br/><br/>


                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required="">
                                        <option value="">- Pilih -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Disabilitas</label>
                                    <select id="disability" name="disability" class="form-control" required="" onclick="myFunction()">
                                        <option value="">---</option>
                                        <?php
                                        $disable_query = mysql_query("SELECT * FROM disability");
                                        while ($disable_result = mysql_fetch_array($disable_query)){ ?>
                                            <option value="<?php echo $disable_result['disability_name'] ?>"><?php echo $disable_result['disability_name'] ?></option>
                                            <?php }
                                        ?>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>

                                    <br>

                                    <div id="divdisa">


                                    </div>
                                    <!--
                                    // for(var k = 1; k < 2; k++){
                                    // document.getElementById("div").appendChild(i);
                                    // }
                                    -->
                                    <script type="text/javascript">

                                        function myFunction() {
                                            var disability = document.getElementById("disability").value;
                                            //document.getElementById("demo").innerHTML = disability;
                                            var teks = "";
                                            var teks2 = "";
                                            teks = "<input type='text' id='iddisability' class='form-control' name='disability2'>";
                                            if(disability == 'Lainnya'){
                                                 /* var i = document.createElement("INPUT");
                                                 i.setAttribute("type", "text");
                                                 i.setAttribute("value","");
                                                 i.setAttribute("class","form-control");
                                                 i.setAttribute("name","disability2"); */

                                                document.getElementById("divdisa").innerHTML = teks;


                                                //document.getElementById("div").innerHTML = i;
                                            } else{
                                                document.getElementById("divdisa").innerHTML = teks2;
                                            }
                                        }
                                    </script>

                                </div>


                                <div class="form-group">
                                    <p align="justify">
                                        Dengan mendaftar, Anda telah menyetujui <a href="main_page/syaratketentuan.php" target="_blank">Syarat & Ketentuan</a> Kerjabilitas.
                                    </p>
                                    <hr style="border-color: #ffffff"/>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" name="user1_register" value="Simpan" class="btn btn-primary btn-lg btn-flat" onclick="goog_report_conversion()">
                                        <span class="fa fa-save"></span> Daftar
                                    </button>
                                </div>
                    </form>

                    

                    <div class="form-group">
                        <a href = "register/user2_register.php" class=" btn btn-block btn-lg btn-success btn-flat">
                            <span class="fa fa-briefcase"></span> Penyedia kerja daftar di sini
                        </a>
                    </div>

                    <div class="form-group">
                        <a href = "main_page/resend_email_activation.php" class=" btn btn-block btn-lg btn-danger btn-flat">
                             <span class="fa fa-refresh"></span> Kirim Ulang Email Aktivasi
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
<br/><br/>
</div>

<div class="row clearfix bdcolor text-center"><br/>
    <div class="grid cs-style-3 col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-left">
            <b style="font-size: 30px">Kursus Online. </b>
            Tingkatkan kemampuan kamu dengan mengakses pustaka di bawah ini !
            <hr/>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-0 col-lg-offset-1">
            <figure>
                <h4 class="text-center"><a href="http://www.pustaka.kerjabilitas.com/index.php/tips-karir" target="_blank"><b>Tips Karir</b></a></h4>
                <img src="img/icon-tips-karir-bg.png" alt="Logo Tips Karir" class="img img-responsive">
                <figcaption>
                    <br>
                    <a href="http://www.pustaka.kerjabilitas.com/index.php/tips-karir" target="_blank" type="button" class="btn btn-danger">
                        Kunjungi
                    </a>
                </figcaption>
            </figure>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-2 col-xs-offset-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
            <figure>
                <h4 class="text-center"><a href="http://pustaka.kerjabilitas.com/index.php/buku-elektronik" target="_blank"><b>Buku-E</b></a></h4>
                <img src="img/2.png" alt="Logo Buku Elektronik" class="img img-responsive">
                <figcaption>
                    <br>
                    <a href="http://pustaka.kerjabilitas.com/index.php/buku-elektronik" target="_blank" type="button" class="btn btn-danger">
                        Kunjungi
                    </a>
                </figcaption>
            </figure>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-0 col-lg-offset-0">
            <figure>
                <h4 class="text-center"><a href="http://www.pustaka.kerjabilitas.com/index.php/buku-bicara" target="_blank"><b>Buku Suara</b></a></h4>
                <img src="img/1.png" alt="Logo Buku Suara" class="img img-responsive">
                <figcaption>
                    <br>
                    <a href="http://www.pustaka.kerjabilitas.com/index.php/buku-bicara" target="_blank" type="button" class="btn btn-danger">
                        Kunjungi
                    </a>
                </figcaption>
            </figure>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-2 col-xs-offset-2 col-sm-offset-0 col-md-offset-2 col-lg-offset-0">
            <figure>
                <h4 class="text-center"><a href="http://www.pustaka.kerjabilitas.com/index.php/siniar" target="_blank"><b>Podcast</b></a></h4>
                <img src="img/3.png" alt="Logo Podcast" class="img img-responsive">
                <figcaption>
                    <br>
                    <a href="http://www.pustaka.kerjabilitas.com/index.php/siniar" target="_blank" type="button" class="btn btn-danger">
                        Kunjungi
                    </a>
                </figcaption>
            </figure>
        </div>
        <div class="col-xs-8 col-sm-4 col-md-4 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-0 col-lg-offset-0">
            <figure>
                <h4 class="text-center"><a href="http://www.pustaka.kerjabilitas.com/index.php/videos" target="_blank"><b>Video</b></a></h4>
                <img src="img/4.png" alt="Logo Video" class="img img-responsive">
                <figcaption>
                    <br>
                    <a href="http://www.pustaka.kerjabilitas.com/index.php/videos" target="_blank" type="button" class="btn btn-danger">
                        Kunjungi
                    </a>
                </figcaption>
            </figure>
        </div>
    </div>
</div>

<!--Start Supported by -->
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
            <h3 style="color: #808080">Didukung oleh</h3>
            <hr/>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="col-xs-12 col-sm-6 col-lg-4">
            <a href="https://www.ciptamedia.org" target="_blank">
                <img src="img/supporter/cipta-media.png" alt="icon-cipta-media-seluler" width="300" class="img img-responsive  center-block center-block"/>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-lg-4">
            <a href="https://www.techsoup.asia/id" target="_blank">
                <img src="img/supporter/techsoup-asia.png" alt="icon-techsoup" width="300" class="img img-responsive  center-block"/>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-lg-4">
            <a href="https://www.microsoft.com/" target="_blank">
                <img src="img/supporter/microsoft.png" alt="icon-microsoft" width="300" class="img img-responsive  center-block"/>
            </a>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br/></div>

        <div class="col-xs-12 col-sm-6 col-lg-3">
            <a href="http://www.google.com" target="_blank">
                <img src="img/supporter/Google.png" alt="logo_google" width="150" class="img img-responsive  center-block"/>
            </a>
        </div>
        <br/>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <a href="http://www.nakertrans.jogjaprov.go.id" target="_blank">
                <img src="img/supporter/disnakertransdiy.png" alt="icon-disnakertrans-diy" width="150" class="img img-responsive  enter-block center-block"/>
            </a>
        </div>
        <br/>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <a href="http://www.dewaweb.com/" target="_blank">
                <img src="img/supporter/dewaweb.png" alt="icon-dewaweb" width="150" class="img img-responsive  center-block"/>
            </a>
        </div>
        <br/>
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <a href="http://infokerja-jatim.com/" target="_blank">
                <img src="img/supporter/Logo Disnakertansduk Surabaya.jpg" alt="icon Disnakertansduk Surabaya " width="150" class="img img-responsive  center-block"/>
            </a>
        </div>

        <div class="col-xs-12 col-lg-12"><br/><br/></div>
    </div>
</div>
<!-- End Supported by -->

<!-- Start Covered by -->
<div class="row clearfix bdcolor">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
            <h3 style="color: #808080">Diliput oleh</h3>
            <hr style="border-color: #ffffff"/>
        </div>
    </div>
</div>
<div class="row clearfix bdcolor"><br/>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!--Kompas-->
        <div class="col-xs-12 col-sm-6 col-lg-3 text-center">
            <a href="http://print.kompas.com/galeri/foto/detail/2015/06/29/Situs-Pencari-Kerja-Disabilitas" target="_blank">
                <img src="img/covered/logo-kompas.png" alt="icon-ecc-ugm" width="150" class="img"/>
            </a>
        </div>
        <!--TechnoID-->
        <div class="col-xs-12 col-sm-6 col-lg-3 text-center">
            <a href="http://www.techno.id/startup/kerjabilitascom-jadi-media-informasi-kerja-untuk-kaum-disabilitas-150628t.html" target="_blank">
                <img src="img/covered/technoid-logo.png" alt="icon-dewaweb" width="150" class="img"/>
            </a>
        </div>
        <!--Bisnis.com-->
        <div class="col-xs-12 col-sm-6 col-lg-3 text-center">
            <a href="http://surabaya.bisnis.com/read/20150628/1/81590/kerjabilitas.com-ini-info-kerja-buat-penyandang-disabilitas" target="_blank">
                <img src="img/covered/bisnis.com-logo.png" alt="icon-techsoup" width="150" class="img"/>
            </a>
        </div>
        <!--Malang Post-->
        <div class="col-xs-12 col-sm-6 col-lg-3 text-center">
            <a href="https://dailysocial.id/post/kerjabilitas/" target="_blank">
                <img src="img/covered/DailySocial-Logo-Grey.png" alt="icon-dewaweb" width="200" class="img"/>
            </a>
        </div>
        <!--Merdeka-->
        <div class="col-xs-12 col-sm-6 col-lg-4 text-center"><br/>
            <a href="http://www.merdeka.com/peristiwa/hari-terhubung-disabilitas-para-difabel-protes-lewat-teater.html" target="_blank">
                <img src="img/covered/merdeka-logo.png" alt="icon-dewaweb" width="150" class="img"/>
            </a>
        </div>
        <!--Solider-->
        <div class="col-xs-12 col-sm-6 col-lg-4 text-center">
            <a href="http://solider.or.id/2015/11/27/kerjabilitascom-dorong-hak-difabel-dalam-akses-terhadap-pekerjaan" target="_blank">
                <img src="img/covered/solider.png" alt="icon-solider" width="175"/>
            </a>
        </div>
        <!--TVRI-->
        <div class="col-xs-12 col-sm-6 col-lg-4 text-center"><br/>
            <a href="https://id.techinasia.com/kerjabilitas-sebagai-penghubung-antara-penyandang-disabilitas-dengan-penyedia-kerja/" target="_blank">
                <img src="img/covered/techinasia-logo.png" alt="icon-solider" width="175"/>
            </a>
        </div>
        <div class="col-xs-12 col-lg-12"><br/><br/></div>
    </div>
</div>
<!-- End Covered by -->

<!-- Start Our Clients
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
            <h3 style="color: #808080">Klien Kami :</h3>
            <hr/>
        </div>
    </div>
</div>
<div class="row clearfix bdcolor"><br/>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

</div>
<!-- End Our Clients -->

<table class="table table-responsive">
    <tr>
        <td bgcolor="#2a2a2a">
            <div class="row clearfix">
                <div class="col-md-1 column"></div>
                <div class="col-md-10 column">
                    <div class="row clearfix">
                        <div style="padding-bottom: 10px; color: #ffffff" class="col-md-4 batasfooter">
                            <h4><b>Apa itu kerjabilitas ?</b></h4>
                            <p>
                                Kerjabilitas adalah sebuah jaringan sosial karir yang
                                menghubungkan penyandang disabilitas dengan
                                penyedia kerja inklusi di Indonesia.
                            </p>
                            <h4><a href="main_page/kerjabilitas.php" target="_blank">Selengkapnya »</a></h4>
                            <br/>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left: 0px">
                                Diakselerasi oleh <br/>
                                <a href="https://developers.google.com/startups/accelerator/" target="_blank">
                                    <img src="img/supporter/launchpad-logo.png" width="300" alt="logo-launchpad"/>
                                </a>
                            </div>
                        </div>
                        <div style="padding-bottom: 75px; color: #ffffff" class="col-md-4 batasfooter"><br><br>
                            <ul class="item">
                                <li><a href="main_page/tentang_kami.php" target="_blank">Tentang Kami</a></li>
                                <li><a href="main_page/syaratketentuan.php" target="_blank">Syarat & Ketentuan</a></li>
                                <li><a href="main_page/contact_us.php" target="_blank">Hubungi Kami</a></li>
                                <li><a href="main_page/faq.php" target="_blank">FAQ</a></li>
                                <li><a href="http://www.pustaka.kerjabilitas.com" target="_blank">Pustaka</a></li>
                                <li><a href="main_page/kerjabilitas-hiring.php">Karir</a></li>
                            </ul>
                            &nbsp;
                        </div>
                        <div class="col-md-4 column">
                            <h4 style="color: #ffffff;"><b>Kontak kami</b></h4>
                            <p style=" color: #ffffff;">Lembaga Saujana<br>
                                Jl. Sidikan Gg.Wijaya Kusuma 82A, Sorosutan<br>
                                Yogyakarta  DI Yogyakarta 55162<br>
                                INDONESIA<br>
                                Telp. +62 (0)274 418958
                            </p>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" style="padding-left: 0px; padding-right: 0px"><br/>
                                <a href="http://www.facebook.com/kerjabilitas" target="_blank"><img src="img/icon-facebook2.png" onmouseout="this.src='img/icon-facebook2.png'" onmouseover="this.src='img/icon-facebook.png'" alt="icon facebook"></a>
                                <a href="http://www.twitter.com/kerjabilitas" target="_blank"><img src="img/icon-twitter2.png" onmouseout="this.src='img/icon-twitter2.png'" onmouseover="this.src='img/icon-twitter.png'" alt="icon facebook"></a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7" style="padding-left: 0px; padding-right: 0px; color: #ffffff; padding-top: 0px">
                                Unduh Aplikasi Kerjabilitas <br/>
                                <a href="https://play.google.com/store/apps/details?id=kerjabilitas.com.kerjabilitaslauncher" target="_blank">
                                    <img src="img/GooglePlay.png" width="125" alt="GooglePlay"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>

    <tr>
        <td bgcolor="#2a2a2a" align="center" style="color: #ffffff; border-color:#4a4a4a;">
            Ciptaan disebarluaskan di bawah Lisensi Creative Commons Atribusi-Berbagi Serupa 4.0 Internasional. <br>
            Dibuat dan dikelola oleh <a href="http://www.saujana.org">Saujana.org</a>
        </td>
    </tr>
</table>

<!-- Google AdWards -->
<script type="text/javascript">
    /* <![CDATA[ */
    goog_snippet_vars = function() {
        var w = window;
        w.google_conversion_id = 948166540;
        w.google_conversion_label = "BWfkCO3j8mQQjL-PxAM";
        w.google_conversion_value = 1.00;
        w.google_conversion_currency = "USD";
        w.google_remarketing_only = false;
    }
    // DO NOT CHANGE THE CODE BELOW.
    goog_report_conversion = function(url) {
        goog_snippet_vars();
        window.google_conversion_format = "3";
        var opt = new Object();
        opt.onload_callback = function() {
            if (typeof(url) != 'undefined') {
                window.location = url;
            }
        }
        var conv_handler = window['google_trackConversion'];
        if (typeof(conv_handler) == 'function') {
            conv_handler(opt);
        }
    }
    /* ]]> */
</script>
<script type="text/javascript"
        src="//www.googleadservices.com/pagead/conversion_async.js">
</script>

</body>
</html>
