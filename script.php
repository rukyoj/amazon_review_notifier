<?php
include('simple_html_dom.php');	//Html dom parser from: https://sourceforge.net/projects/simplehtmldom/files/simple_html_dom.php

$product_id= "B01BGFBUC4";	//Amazon product ID

$url = "http://www.amazon.com/One-Persons-Craziness-R-T-Ojas-ebook/product-reviews/".$product_id."/ref=cm_cr_dp_see_all_btm?ie=UTF8&showViewpoints=1&sortBy=recent";

$html = file_get_html($url);

foreach($html->find('div[class=a-row averageStarRatingIconAndCount]') as $review) {

	$amazonReviewCount = intval($review->children(1)->innertext);
    
}


$this->load->database();

//assuming you already have the table: 'amazon' created in your database, and product id already entered.
$query = $this->db->query("SELECT review_count FROM amazon WHERE product_id='".$product_id."'");

$currentReviewCount = $query->row()->review_count;


if ( $currentReviewCount != $amazonReviewCount){

	$newReviews = $amazonReviewCount - $currentReviewCount;
	mail("me@rtojas.com", $newReviews. " New Reviews for Book", $url);
	
	$sql = "UPDATE amazon SET review_count=".$amazonReviewCount." WHERE product_id='".$product_id."'";

	$this->db->query($sql);
}

 $this->db->close();
?>