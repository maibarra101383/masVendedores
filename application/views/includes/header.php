<!DOCTYPE html>
<html lang="en"><img src="<?=base_url('assets/imagenes/m2.jpg');?>"align="right" WIDTH=200 HEIGHT=100 />
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
            </head>
    <body>
       <?php if ($this->session->userdata('usuario')): ?>
                        <div id="welcome">
                            <p>Bienvenido:</p><strong><?= "&nbsp".$this->session->userdata('nombre_completo'); ?></strong>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </header>
    <div id="wrapper">

        




    
