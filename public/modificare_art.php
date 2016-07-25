<?php 

include_once "../inc/functions.php";
include '../inc/db.php';
include_once "../inc/validations.php";

session_start();

$conn = db_connect(array(
			'database' => 'blog_curs_php',
			'pass' => 'root',
		));
		
if (isset($_POST['titlu'])) {
		if (isset($_POST['ref']))
			$ref = $_POST['ref'];
		$error = NULL;
		$namedError = array();
		if (!checkText($_POST['titlu'], $error, 3, 200))
			$namedError['titlul'] = $error; 
		
		if (!checkText($_POST['continut'], $error, 3, 10000))
			$namedError['descrierea'] = $error;
		
		$path = 'images/retete.jpg';
		if (!empty($_FILES['caleImg']['name'])) {
			if (!checkImgFile('caleImg', $error)) {
				$namedError['img'] = $error;
			}
			if (empty($namedError)) {
				$path = 'images/' . time(). '_' . $_SESSION['user'] . '_' . $_FILES['caleImg']['name'];
				if (!move_uploaded_file($_FILES['caleImg']['tmp_name'], $path)) {
					$namedError['img'] = 'Nu se poate salva fisierul la calea curenta.';
				}
			}
		}
		//print_r($namedError);
		if (empty($namedError)) {
			$conn = db_connect(array(
				'database' => 'blog_curs_php',
				'pass' => 'root',
			));
			//echo $_POST['titlu'] , PHP_EOL;
			//echo $_POST['continut'] , PHP_EOL;
			//echo $path, PHP_EOL;die;						
			
			if(!empty($_FILES['caleImg']['name']))
			{				
				$query = 'UPDATE articole SET titlu=:titlul,continut=:descrierea,caleImg=:path where ID=:ID';				
				db_update($conn, $query, array(
					':titlul' => $_POST['titlu'],
					':descrierea' => $_POST['continut'],            
					':path' => $path,
					':ID' => $_GET['ID'],
				));		
			}
			else{
				$query2 = 'SELECT caleImg FROM articole where ID=:id';			
				$result = db_select($conn, $query2, array(
					':id' => $_GET['ID'],
				));
				$path = $result[0]['caleImg'];
				$query = 'UPDATE articole SET titlu=:titlul,continut=:descrierea,caleImg=:path where ID=:ID';				
				db_update($conn, $query, array(
					':titlul' => $_POST['titlu'],
					':descrierea' => $_POST['continut'],            
					':path' => $path,
					':ID' => $_GET['ID'],
				));	
			}
			header('Location: /view.php?ID='. $_GET['ID'].'#n');
			//showForm($ref);
			exit;
		} else {
			showForm($ref, $namedError, $_POST);
		}
} else {
	
	$query = 'SELECT titlu,continut,caleImg FROM articole where id=:id';
			$result = db_select($conn, $query, array(
				':id' => $_GET['ID'],
	));
	//print_r($result);die;
	echo template('page_tpl', array(
        'page_title' => 'Modificare reteta culinara',
        'content' => template('adaugare_art_tpl', array(            
            'values' =>$result[0],
        )),
    ));
}
	
	
function showForm($ref, $error, $values = NULL) {
    echo template('page_tpl', array(
        'page_title' => 'Adaugare retete culinare',
        'content' => template('adaugare_art_tpl', array(
            'ref' => $ref,
            'error' => $error,
            'values' => $values,
        )),
    ));
}