<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'SIMETA';

?>

<div class="site-about" style="text-align: center; margin-top: 30px;">
    <h1 style="margin-bottom: 10px;"><?= Html::encode($this->title) ?></h1>
    
    <!-- Subjudul -->
    <h3 style="font-weight: normal; margin-bottom: 20px;">SISTEM INFORMASI MONITORING ENTRI DATA MITRA</h3>

    <img src="<?= Yii::getAlias('@web') ?>/images/bps.png" alt="Logo SIMETA" width="200" style="margin-bottom: 30px;">

    <section id='about' class='about' style="text-align: justify; margin: 0 auto;">
        <p style='margin-top: 10px'>
            <strong>SIMETA (Sistem Monitoring Entri Data Mitra)</strong> merupakan sebuah sistem monitoring terintegrasi yang dikembangkan oleh Badan Pusat Statistik (BPS) Provinsi Bengkulu. Sistem ini bertujuan untuk memantau, mengontrol, dan mengevaluasi aktivitas entri data yang dilakukan oleh mitra kerja BPS, baik dalam pelaksanaan survei maupun sensus. Dengan SIMETA, BPS Provinsi Bengkulu dapat memastikan bahwa data yang diinput oleh mitra sesuai dengan standar kualitas yang telah ditetapkan.
        </p>
        <p>
            Sistem ini juga dilengkapi dengan fitur-fitur yang memungkinkan pengawasan terhadap ketepatan waktu, kelengkapan, dan akurasi data yang dimasukkan oleh mitra. Selain itu, SIMETA memberikan kemudahan dalam pelaporan dan analisis data, sehingga BPS dapat mengambil keputusan yang cepat dan tepat berdasarkan data yang diperoleh.
        </p>
        <p>
            Melalui penggunaan SIMETA, BPS Provinsi Bengkulu berharap dapat meningkatkan efisiensi dan efektivitas dalam pengelolaan data, serta memastikan bahwa seluruh proses pengumpulan data berjalan secara transparan dan dapat dipertanggungjawabkan dan menjadi salah satu upaya BPS untuk terus meningkatkan kualitas data statistik yang dihasilkan.
        </p>
    </section><!-- End About Section -->

</div>

