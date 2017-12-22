<?php
session_start();
	
$targetDir = 'data';
$today_date=date('d');
	if(!isset($_COOKIE['user_token']))
	{
		$cookie_name='user_token';
		$cookie_value=time().md5(rand(1000,9999));
		$_SESSION['user_token']=$cookie_value;
		setcookie($cookie_name, $cookie_value, time() + (7200), "/");
		
	}
	else{
		}	
	if (!file_exists($targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/original')) 
	{
    mkdir($targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/original', 0777, true);

	}
	
	if (!file_exists($targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/compress')) {
    mkdir($targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/compress', 0777, true);

	}
		
$main_dir_original=$targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/original/';
$main_dir_compress=$targetDir.'/'.$today_date.'/'.$_SESSION['user_token'].'/compress/';
    
    if (!empty($_FILES)) {
		
     $targetFile = $main_dir_original. $_FILES['file']['name'];
     move_uploaded_file($_FILES['file']['tmp_name'],$targetFile);
	 
	 $path_to_uncompressed_file = $main_dir_original. $_FILES['file']['name'];
$path_to_compressed_file = $main_dir_compress. $_FILES['file']['name'];

// this will ensure that $path_to_compressed_file points to compressed file
// and avoid re-compressing if it's been done already
	if (!file_exists($path_to_compressed_file))
	 {
	
	//checkfile extension
	$file_ext=strtolower(end(explode('.',$targetFile)));
		if($file_ext=='png')
		{
	
    	        file_put_contents($path_to_compressed_file, compress_png($path_to_uncompressed_file));
		}
		else
		{
		 file_put_contents($path_to_compressed_file, compress_jpeg($path_to_uncompressed_file));
	
		}
		}
	}
	
	
	//function for compress
	
	
	
	function compress_png($path_to_png_file, $max_quality = 66)
{
    if (!file_exists($path_to_png_file)) 
	{
        throw new Exception("File does not exist: $path_to_png_file");
    }

    
$min_quality = 45;

$compressed_png_content = shell_exec("pngquant --quality=$min_quality-$max_quality - < ".escapeshellarg(    $path_to_png_file));

	if (!$compressed_png_content) 
	{
        throw new Exception("Conversion to compressed PNG failed. Is pngquant 1.8+ installed on the server?");
    }

    return $compressed_png_content;
}


function compress_jpeg($path_to_jpeg_file, $max_quality = 66)
{
    if (!file_exists($path_to_jpeg_file)) 
	{
        throw new Exception("File does not exist: $path_to_png_file");
    }

$min_quality = 45;

$compressed_jpeg_content = shell_exec("jpegoptim --max=$max_quality --strip-all --all-progressive - < ".escapeshellarg($path_to_jpeg_file));

    if (!$compressed_jpeg_content)
	 {
        throw new Exception("Conversion to compressed JPEG failed. Is jpegoptima problem on the server?");
    }

    return $compressed_jpeg_content;
}
	

	
    ?>