 <?php
$strAction = Yii::$app->controller->action->id;
$arrAllowed = [
    'login',
    'register',
    'forgot-password'
];
if (! in_array($strAction, $arrAllowed)) {
    ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php
    echo $this->render('metatags');
    echo $this->render('header_script');
    
    ?>
</head>
<body>
<?php
    echo $this->render('header_strip');
    echo $this->render('header');
    ?>
<div class="main-wrap">
  <?php
    echo $content;
    ?>
</div>
	<!--Footer-->
<?php
    echo $this->render('footer');
    echo $this->render('footer_script');
    ?>
</body>
</html>
<?php
} else {
    echo $content;
}

?>

