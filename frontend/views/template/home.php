<?php
 if(count($block)){
            foreach ($block as $value) {
                echo $this->render('block/'.$value['block'].'.php', ['model' => $value['model']]);
            } 
        }
     

