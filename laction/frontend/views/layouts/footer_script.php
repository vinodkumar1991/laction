<!-- Script START -->
<script
	src="<?php echo Yii::getAlias('@fasset').'/js/owl.carousel.js'?>"></script>
<script
	src="<?php echo Yii::getAlias('@fasset').'/js/jquery.magnific-popup.min.js'; ?>"></script>
<script
	src="<?php echo Yii::getAlias('@fasset').'/js/jquery.ajaxchimp.min.js'; ?>"></script>
<script
	src="https://maps.googleapis.com/maps/api/js?key=<?php echo Yii::$app->params['google_api_key']; ?>"></script>
<script src="<?php echo Yii::getAlias('@fasset').'/js/map.js'; ?>"></script>
<script src="<?php echo Yii::getAlias('@fasset').'/js/custom.js'; ?>"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>