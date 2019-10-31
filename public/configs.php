<?php

require_once '../bootstrap.php';

if(isset($_POST['dados']) && !empty($_POST['dados'])){

  $request = json_decode($_POST['dados'],true);

  $conn->beginTransaction(); 

  $ids = array_column($request, 'id');
  $array_filter = array_filter($ids);
  $ids_list = implode(',', $array_filter);


  $delete = $conn->prepare("DELETE FROM config WHERE id NOT IN (" . $ids_list .")");

  $delete->execute();

  foreach ($request as $key => $value) {
      
    if ($value['id'] <> null) {
        
      $query = $conn->prepare("UPDATE config 
                              SET queue = '". $value['name'] ."', 
                              sla = ".$value['sla'].", 
                              window = ".$value['window'].", 
                              refresh = ".$value['refresh'].", 
                              metric_id = ".$value['metric']." 
                              WHERE id = " . $value['id']);
    }else{
        
      $query = $conn->prepare("INSERT INTO config (queue, sla, window, refresh, metric_id) VALUES ('". $value['name'] ."', ".$value['sla'].", ".$value['window'].", ".$value['refresh'].", ".$value['metric'] .")");
      
    }
    $query->execute();    
  }
  $conn->commit();
  
   return;
}else{
    
    $sth = $conn->prepare(
        <<<QUERY
      SELECT id, queue, sla, window, refresh, metric_id
      FROM config
      QUERY
        );
    $sth->execute();
    $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($data);
}


