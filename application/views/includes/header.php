<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />

<?php
			if(isset($cssFiles) && is_array($cssFiles)){
                foreach($cssFiles as $cssFile) {
                    echo '<link href="'.base_url('assets/css/'.$cssFile).'" type="text/css" rel="stylesheet"/>';
                }
            }

            if(isset($jsFiles) && is_array($jsFiles)){
                foreach($jsFiles as $jsFile) {
                    echo '<script src="'.base_url('assets/js/'.$jsFile).'" type="text/javascript"></script>';
                }
            }
        




        ?>
