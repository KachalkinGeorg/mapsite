<?php


function create_index () {

	$map = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

		$lastmod = date( "Y-m-d" );		

		$map .= "<sitemap>\n<loc>".$_SERVER['DOCUMENT_ROOT']."/uploads/sitemap1.xml</loc>\n<lastmod>".$lastmod."</lastmod>\n</sitemap>\n";
		$map .= "</sitemapindex>";
		
		return $map;

}

function create_map () {

	$map  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
	if ($_REQUEST['main'] == 1) {
		$map .= gk_main();
	}
	if ($_REQUEST['cat'] == 1) {	
		$map .= gk_cat();
	}
	if ($_REQUEST['news'] == 1) {		
		$map .= gk_news();
	}
	if ($_REQUEST['stat'] == 1) {		
		$map .= gk_stat();
	}
	$map .= "</urlset>";

	return $map;

}

function gk_cat() {
	global $mysql, $config, $catz, $catmap;
        foreach ($catmap as $id => $altname) {
			$cat_pr = $_REQUEST['cat_pr'] ? $_REQUEST['cat_pr'] : '0.7';
			$loc = generateLink('news', 'by.category', array('category' => $altname, 'catid' => $id), array(), false, true);
			$link = htmlspecialchars($loc);
            $output .= "\t<url>\n";
            $output .= "\t\t<loc>" . $link . "</loc>\n";
			$lm = $mysql->record("select date(from_unixtime(max(postdate))) as pd from " . prefix . "_news");
            $output .= "\t\t<lastmod>" . $lm['pd'] . "</lastmod>\n";
            $output .= "\t\t<priority>" . floatval($cat_pr) . "</priority>\n";
            $output .= "\t\t<changefreq>daily</changefreq>\n";
            $output .= "\t</url>\n";
            if ($_REQUEST['catp'] == 1) {
				$catp_pr = $_REQUEST['catp_pr'] ? $_REQUEST['catp_pr'] : '0.7';
                $cn = ($catz[$altname]['number'] > 0) ? $catz[$altname]['number'] : $config['number'];
                $pages = ceil($catz[$altname]['posts'] / $cn);
                for ($i = 2; $i <= $pages; $i++) {
					$loc = generateLink('news', 'by.category', array('category' => $altname, 'catid' => $id, 'page' => $i), array(), false, true);
					$link = htmlspecialchars($loc);
                    $output .= "\t<url>\n";
                    $output .= "\t\t<loc>" . $link . "</loc>\n";
                    $output .= "\t\t<lastmod>" . $lm['pd'] . "</lastmod>\n";
                    $output .= "\t\t<priority>" . floatval($catp_pr) . "</priority>\n";
                    $output .= "\t\t<changefreq>daily</changefreq>\n";
                    $output .= "\t</url>\n";
                }
            }
        }
		return $output;
    }
	
function gk_news() {
	global $mysql, $config;
	$news_pr = $_REQUEST['news_pr'] ? $_REQUEST['news_pr'] : '0.5';
    $query = "select id, postdate, author, author_id, alt_name, editdate, catid from " . prefix . "_news where approve = 1 order by id desc";
    foreach ($mysql->select($query, 1) as $rec) {
		$loc = newsGenerateLink($rec, false, 0, true);
		$link = htmlspecialchars($loc);
		$output .= "\t<url>\n";
		$output .= "\t\t<loc>" . $link . "</loc>\n";
		$output .= "\t\t<lastmod>" . strftime("%Y-%m-%d", max($rec['editdate'], $rec['postdate'])) . "</lastmod>\n";
		$output .= "\t\t<priority>" . floatval($news_pr) . "</priority>\n";
		$output .= "\t\t<changefreq>daily</changefreq>\n";
		$output .= "\t</url>\n";	
	}
	return $output;
}

function gk_stat() {
	global $mysql, $config;
	$stat_pr = $_REQUEST['stat_pr'] ? $_REQUEST['stat_pr'] : '0.3';
        $query = "select id, alt_name from " . prefix . "_static where approve = 1";
        foreach ($mysql->select($query, 1) as $rec) {
            $loc = generatePluginLink('static', '', array('altname' => $rec['alt_name'], 'id' => $rec['id']), array(), false, true);
			$link = htmlspecialchars($loc);
            $output .= "\t<url>\n";
            $output .= "\t\t<loc>" . $link . "</loc>\n";
			$lm = $mysql->record("select date(from_unixtime(max(postdate))) as pd from " . prefix . "_news");
            $output .= "\t\t<lastmod>" . $lm['pd'] . "</lastmod>\n";
            $output .= "\t\t<priority>" . floatval($stat_pr) . "</priority>\n";
            $output .= "\t\t<changefreq>weekly</changefreq>\n";
            $output .= "\t</url>\n";
        }
	return $output;
}
	
function gk_main() {
	global $mysql, $config;
	
    if ($config['number'] < 1) $config['number'] = 5;
	$main_pr = $_REQUEST['main_pr'] ? $_REQUEST['main_pr'] : '1';

	$loc = generateLink('news', 'main', array(), array(), false, true);
	$link = htmlspecialchars($loc);
	$output .= "\t<url>\n";
	$output .= "\t\t<loc>" . $link . "</loc>\n";
	$lm = $mysql->record("select date(from_unixtime(max(postdate))) as pd from " . prefix . "_news");
	$output .= "\t\t<lastmod>" . $lm['pd'] . "</lastmod>\n";
	$output .= "\t\t<priority>" . floatval($main_pr) . "</priority>\n";
	$output .= "\t\t<changefreq>daily</changefreq>\n";
	$output .= "\t</url>\n";
	if ($_REQUEST['mainp'] == 1) {
		$main_p_pr = $_REQUEST['main_p_pr'] ? $_REQUEST['main_p_pr'] : '0.5';
            $cnt = $mysql->record("select count(*) as cnt from " . prefix . "_news");
            $pages = ceil($cnt['cnt'] / $config['number']);
            for ($i = 2; $i <= $pages; $i++) {
				$loc = generateLink('news', 'main', array('page' => $i), array(), false, true);
				$link = htmlspecialchars($loc);
                $output .= "\t<url>\n";
                $output .= "\t\t<loc>" . $link . "</loc>\n";
                $output .= "\t\t<lastmod>" . $lm['pd'] . "</lastmod>\n";
                $output .= "\t\t<priority>" . floatval($main_p_pr) . "</priority>\n";
                $output .= "\t\t<changefreq>daily</changefreq>\n";
                $output .= "\t</url>\n";
            
        }
	}
		return $output;
    }