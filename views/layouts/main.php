<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\web\JqueryAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\BootstrapAsset;
use kartik\select2\Select2;
use kartik\select2\Select2Asset;

AppAsset::register($this);
BootstrapAsset::register($this);
Select2Asset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::getAlias('@web/bps.png')]);
$this->registerAssetBundle(JqueryAsset::class);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['name'] ?? 'SIMETA', // Gunakan nama yang baru
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top'],
    ]);
    
    if (!Yii::$app->user->isGuest) {
        $role = Yii::$app->user->identity->role;
        $items = [
            ['label' => 'About', 'url' => ['/site/about']],
        ];
    
        if ($role == 0) { // Jika role adalah super admin
            $items[] = ['label' => 'Dashboard', 'url' => ['/site/dashboard']];
            // $items[] = ['label' => 'Buat Survei', 'url' => ['/survei/create']];
            $items[] = ['label' => 'Survei', 'url' => ['/survei/index']];
        } elseif ($role == 1) { // Jika role adalah admin kabkot
            $items[] = ['label' => 'Dashboard', 'url' => ['/site/dashboard']];
        } elseif ($role == 2) { // Jika role adalah user
            $items[] = ['label' => 'Entri Data', 'url' => ['/survei/entri-data']];
        }
    
        $items[] = '<li class="nav-item">'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->nama . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    } else {
        $items[] = ['label' => 'Login', 'url' => ['/site/login']];
    }
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto d-flex align-items-center'], // ms-auto untuk menggeser menu ke kanan, d-flex untuk membuatnya horizontal
        'items' => $items,
        'encodeLabels' => false, // jika ada HTML di label
    ]);
    NavBar::end();
    
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="col-12 text-center">
        <div><strong><span>Sistem Informasi Monitoring Entri Data Mitra 1.0</span></strong></div>
        <div class="copyright">
            &copy; Copyright <strong><span>Tim TI BPS Provinsi Bengkulu</span></strong>. All Rights Reserved.
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
