 <?php
$strAction = Yii::$app->controller->action->id;

if ('login' != $strAction) {
    ?>
<!DOCTYPE html>
<html>
<head>
 <?php
    echo $this->render('common/header_script');
    ?>
 </head>
<body>
   <?php
    echo $this->render('common/left_side_menu');
    ?>
    <section class="content">
    <?php
    echo $this->render('common/header');
    echo $content;
    echo $this->render('common/footer');
    ?>
    </section>
    <?php echo $this->render('common/footer_script'); ?>
</body>

</html>
<?php
} else {
    echo $content;
}

?>
