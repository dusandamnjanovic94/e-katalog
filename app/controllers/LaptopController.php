<?php
 /**
 * Klasa kontrolera sajta za rad sa laptopovima
 */
 
class LaptopController extends Controller {
    
     /**
     * Laptop metod  za rad sa  laptopove prikazuje spisak svih  laptopova
     */
    function laptop($page = 0) {
       
       
        
        $laptop = LaptopModel::getAllPaged($page);
        for($i=0;$i<count($laptop);$i++){
                         
            $laptop[$i]->fotografija = LaptopModel::getLaptopImages($laptop[$i]->laptop_id);
            $laptop[$i]->specifikacija = LaptopModel::getAllQuantifiedDetails($laptop[$i]->laptop_id);

           // var_dump($laptop);die();
        }
        $this->set('laptop', $laptop);
		
    }

     
}
