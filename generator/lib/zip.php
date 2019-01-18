<?php
// membuat function zip
function create_zip($files = array(), $folderpath){
        // mengecek apabila extension zip ada atau tidak
        if(extension_loaded('zip')){    
            $zip = new ZipArchive();                    //Zip Library
            $zip_name = "tmp/mhs_".time().".zip";            // membuat nama Zip yang akan di dowload
 
            //membuat zip file (ZIPARCHIVE::CREATE)
            $zip->open($zip_name, ZipArchive::CREATE);
 
            foreach($files as $file){    
                $zip->addFile($folderpath . $file);    
            }
            $zip->close();
 
        	//mendownload zip jika file sudah di create
        	if(file_exists($zip_name)){
            	header('Content-type: application/zip');
            	header('Content-Disposition: attachment; filename="'.$zip_name.'"');
            	readfile($zip_name);
            	//delete file setelah download selesai
            	//unlink($zip_name);
        	}
			else {
				echo "Gagal bro";
			}	
    	}else{
        	echo "ZIP extension is not installed in your server!!";
    	}
}
  
?>