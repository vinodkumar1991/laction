<?php
echo $this->render('/Home_Module_Banner', []);
echo $this->render('/Home_Module_Content', [
    'home_videos' => $home_videos
]);
