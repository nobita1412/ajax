<?php
	require_once 'database.php';
	$db = new Database();
	$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;
	$limit = isset($_POST['limit']) ? $_POST['limit'] : 0;

	$conn = Database::$conn;
	$sql = "SELECT * FROM posts LIMIT $offset,$limit";
	$result = $conn->query($sql);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
	}

	$html = '';
	if (!empty($data)){
		foreach($data as $item){
			$html .= '<div class="col-sm-4">
                                <div class="items menu" style="height: 270px; padding: 0px !important;">
                                    <div class="inner_content" style="margin: 0px; width: 100% !important;">
                                        <img class="img" src=" ' .$item['post_image'].'">
                                        <div class="img-body" style="text-align: center;">
                                            <h2 style="font-size:24px; padding: 10px;">'.$item['post_name'] .'</h2>
                                            <p class="img-content">'.$item['post_content'] .'
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
		}
	}

	$res = array();
	$res['success'] = 1;
	$res['html'] = $html;
	echo json_encode($res);
	exit();
?>