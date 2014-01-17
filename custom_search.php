/* Will require key(server_key) and cx(search engine id from control panel) */ 

$url = "https://www.googleapis.com/customsearch/v1?key=<my_key>&cx=<cx>&q=test&output=json&num=10&start=0';
$p = wp_remote_get($url);
                
if( json_decode($p['response']['code']) == 200 ){    
     $search_data = json_decode($p['body'])->items;
    
    $post_data = array();
    foreach( $search_data as $search_item ){
        $post_data[]['link'] = $search_item->link;
        //$post_data[]['id'] = url_to_postid($search_item->link);
    }
    echo '<pre>';print_r($post_data);echo '</pre>';exit;
}else{
    echo '<pre>';print_r($p);exit;
}

// Outputs post url
