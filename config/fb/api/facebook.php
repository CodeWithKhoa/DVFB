<?php
function checkurl($url) {
    $containsWhitespace = false;

    for ($i = 0; $i < strlen($url); $i++) {
        if ($url[$i] === ' ' || $url[$i] === "\n" || $url[$i] === "\r") {
            $containsWhitespace = true;
            break;
        }
    }

    if ($containsWhitespace) {
        $encodedUrl = urlencode($url);

        if (strpos($encodedUrl, '%20') !== false) {
            $urlDecoded = urldecode(str_replace('%20', '', $encodedUrl));
            $url = $urlDecoded;
        }

        if (strpos($encodedUrl, '%0A') !== false) {
            $urlDecoded = urldecode(str_replace('%0A', '', $encodedUrl));
            $url = $urlDecoded;
        }

        if (strpos($encodedUrl, '%0D') !== false) {
            $urlDecoded = urldecode(str_replace('%0D', '', $encodedUrl));
            $url = $urlDecoded;
        }
    }

    return $url;
}

function chuyenwww($id,$cookie){
    if($id!=""){
	$url  = "https://www.facebook.com/" . $id . "";
	$head = array(
		"Host: www.facebook.com",
		"upgrade-insecure-requests: 1",
		"save-data: on",
		"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
		"accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9",
		"sec-fetch-site: same-origin",
		"sec-fetch-mode: navigate",
		"sec-fetch-user: ?1",
		"sec-fetch-dest: document",
		"accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
	);
	$ch   = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_POST => 1,
		CURLOPT_HTTPGET => true,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_HEADER => true,
		CURLOPT_COOKIE => $cookie,
		CURLOPT_ENCODING => TRUE
	));
	$data = curl_exec($ch);
	curl_close($ch);
	$cat1="
reporting-endpoints";
	$url = checkurl(explode("location: ",explode($cat1,$data)[0])[1]);
    } else {
        $url="https://www.facebook.com/";
    }
	if ($url == '') {
	} else {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: www.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'cache-control: max-age=0',
            'referer: https://www.facebook.com/'.$id,
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: same-origin',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 824',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
	}
}
function chuyenmbasic($id,$cookie){
    if($id==null){
        $url="https://mbasic.facebook.com/home.php";
    } else {
    	$url  = "https://mbasic.facebook.com/" . $id . "";
    	$head = array(
    		"Host: mbasic.facebook.com",
    		"upgrade-insecure-requests: 1",
    		"save-data: on",
    		"user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
    		"accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    		"sec-fetch-site: same-origin",
    		"sec-fetch-mode: navigate",
    		"sec-fetch-user: ?1",
    		"sec-fetch-dest: document",
    		"accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    	);
    	$ch   = curl_init();
    	curl_setopt_array($ch, array(
    		CURLOPT_URL => $url,
    		CURLOPT_FOLLOWLOCATION => false,
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_POST => 1,
    		CURLOPT_HTTPGET => true,
    		CURLOPT_SSL_VERIFYPEER => 0,
    		CURLOPT_HTTPHEADER => $head,
    		CURLOPT_HEADER => true,
    		CURLOPT_COOKIE => $cookie,
    		CURLOPT_ENCODING => TRUE
    	));
    	$data = curl_exec($ch);
    	curl_close($ch);
    	$url = checkurl(explode("location: ",explode("_rdr",$data)[0])[1]."_rdr");
    }
	if ($url == 'rdr') {
	} else {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: mbasic.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'cache-control: max-age=0',
            'referer: https://www.facebook.com/khoatran31122006/posts/pfbid05RbaRSrbrDEg3LAa8GHHuJB4RSzSQaXn1p5cG8aF7ffAo5mvwaMDuiZhvzc5iD1ql',
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: same-origin',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 824',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
	}
}
function cxpro5($id,$loai,$cookie){
    $loai=strtolower($loai);
    if($loai=='like'){
        $idcx='1635855486666999';
    } else if($loai=='love'){
        $idcx='1678524932434102';
    } else if($loai=='care'){
        $idcx='613557422527858';
    } else if($loai=='haha'){
        $idcx='115940658764963';
    } else if($loai=='wow'){
        $idcx='478547315650144';
    } else if($loai=='sad'){
        $idcx='908563459236466';
    } else if($loai=='angry'){
        $idcx='444813342392137';
    } else{
        return 'loi';
    }
	$laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
	$post=chuyenwww($id,$cookie);
	$idpost=explode('"',explode('feedback":{"id":"',$post)[1])[0];
	$iduser=explode('"',explode('USER_ID":"',$post)[1])[0];
	$dataarray =array(
		'av'=>$iduser,
		'__user'=>$iduser,
		'__a'=>'1',
		'__req'=>'r',
		'__hs'=>'19547.HYP%3Acomet_pkg.2.1..2.1',
		'dpr'=>'1.5',
		'__ccg'=>'EXCELLENT',
		'__rev'=>'1007810501',
		'__s'=>'yeq0gi:tco699:2onhxn',
		'__hsi'=>'7253773222810833952',
		'__dyn'=>'7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y11xfxmu3W3y1MBx_y8lz83qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
		'__csr'=>'g8cv3Rha7j8z4kGNDsGeylddbFsJtFsy_jSyrXhQAJ9ql2klLpAAyxh99aAXGlVeGDlWmAp9ai8yLz9HWggGUFpolyV99GVVoyUSi6XBxqXgG4AmbpUuxyibzHjy8rwBxy3mUjCBCUJ0wwDBBG1jyUixmbwxzEgG1uHxi7XwpUO68bE5K487K0AU4u0MUkw8Wi0J8y585S3G2a0y802jZw0b2W09Hw1QK2K3S0R40REy0Ao2Ug4q6o1N4016nw3oO013G02T607zQ053U0ojw6Pw7-g3qw3Mo4u',
		'__comet_req'=>'15',
		'fb_dtsg'=>$fb_dtsg,
		'jazoest'=>$jazoest,
		'lsd'=>'UlVKQ5dsRDTq-30sf75r_J',
		'__spin_r'=>'1007810501',
		'__spin_b'=>'trunk',
		'__spin_t'=>'1688899988',
		'fb_api_caller_class'=>'RelayModern',
		'fb_api_req_friendly_name'=>'CometUFIFeedbackReactMutation',
		'variables'=>' {"input":{"attribution_id_v2":"CometSinglePostRoot.react,comet.post.single,via_cold_start,1688900686979,690147,,","feedback_id":"'.$idpost.'","feedback_reaction_id":"'.$idcx.'","feedback_source":"OBJECT","is_tracking_encrypted":true,"tracking":["AZWg8NFr5ouyc4CUf8XGfeq4rGfz8Z4v0B2RN3PCs3xMp2bOa_LJSNXi5jZd7ZZBgyniNe6UY9DiCIPkQsKuQ9vg6CqY_hCybnofGlHjCet5X0lKe2Wh7EQgVmMrdVm2mmATWUIpjGaXg2rIsvHkNXp42mxSmnbgCugzy_7shg6KcVe37q6MCIIO-YBJjE0YRGKZxjkCSMbMq7nofyRQhHUYf9gdl0SoxDePXK3rswSifr47XPQ6cyYu5njaWOvSo6SdsI6cF9CNqZ9_OPoKOhWdhWccA1xnet7UvPody81rsainyFJWN6YGj0-X9zIvyXDT2XwXXJYqdZQs7Xe1sZAancN0Sh434ktHxZ0CPYsve5uVafSvBdrZjfBTj5GvB1aXyHj0yATrNi_arRMXUQmh3rggKfp9Ytr9WBNx2oXu5NyK-AC767bP-9cYMHT3ZshhVArSENugLXaadCTwA_8r6Ho41ER-49aDqMPhS8lG4d3pPB73W0xA4Qt_1c-TFtpjsL6YmfT8vac8hjTDDa1_yjF74f-XLsJA16jE0FOBQROZVYp1MkZ24nEz6A5e0pWZuMBqAF8z_SJMkiRCsViNW60gFuUOvW6Yj6xA8-o6-5STeO8AG1LSm8CEmNFRutG23VgrGOacBbBl6H3S_ox-nUA5yW2HvBeWFFjchW-IxyligHt3pUg2VAZg9Tk6nZpMa0zpUITTTcG3YesoxmNGZZXAuKapOswWvtLymkNTHN4D8xLuvkzfDBgZl3eipJ-24TsjTzSr0_5l145rwXrv0qG31ZzC0-HSYrlvxNrT3GvQpErHig3k7LGDHqGsLn5lt1Pvazfrz-wx3p-G4CdnL3vtXbzFezkkAi00o9qw1YLPT40zUcP7do1p-eHFB_fS-y9KQhI46ife7LmlqayXlG2joGNAGICnzmDW2vDA8KmXeBk50VthqlAtTrWQC_zKQIGWgukpzvpdkaakS83-1eEiEHxD1Wm_kyN98C7hy4bxM3VaAamM5Z5xuW6IpHGvUr9CTb7FeZAk-BTlGKh8RHIykgp6NGYzysYy0e3VKhqPAWAXgnBF6P-XLheezf2F3maCRUgz2Q3x5WOe_jdUOzsJ0kuKLVMYanii481FDNLQkGwbfXUC3FP_XB8PZ6SDl4EcULLE2XNHuRpiolyIO6NvC-b7MWveUqK5UVtv0F-RLECC3pOCpUNes_km_n5N9xXIWT5BR86GWXk_7RjDRKUFzILwwnSkcK0d3wrrGXPAsbYG3JN9Vqlh6X6ylUB2iGMlbOVcObECQrUwcpCu"],"session_id":"88831eec-9874-491f-a768-c40a493e5443","actor_id":"'.$iduser.'","client_mutation_id":"1"},"useDefaultActor":false,"scale":1.5}',
		'server_timestamps'=>'true',
		'doc_id'=>'6658674364165057'
	);
	$data= http_build_query($dataarray);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'authority: www.facebook.com',
		'accept: */*',
		'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
		'content-type: application/x-www-form-urlencoded',
		'origin: https://www.facebook.com',
		'referer: https://www.facebook.com/permalink.php?story_fbid=pfbid021kRobVhtEAeKSjPSLuKcbDMzww1KE6MzFca2gJsLSNiSqtpoHm2v8gfDP4k5ghVAl&id=100092434255680',
		'sec-ch-prefers-color-scheme: light',
		'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
		'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
		'sec-ch-ua-mobile: ?0',
		'sec-ch-ua-platform: "Windows"',
		'sec-ch-ua-platform-version: "15.0.0"',
		'sec-fetch-dest: empty',
		'sec-fetch-mode: cors',
		'sec-fetch-site: same-origin',
		'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
		'viewport-width: 824',
		'x-asbd-id: 129477',
		'x-fb-friendly-name: CometUFIFeedbackReactMutation',
		'x-fb-lsd: UlVKQ5dsRDTq-30sf75r_J',
	]);
	curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$response = curl_exec($ch);
	curl_close($ch);
	if(strpos($response,'for (;;);')!==false){
	    return  'loi';
	}
	$js=json_decode($response,true);
	if(isset($js['errors'])){
	    $tt= $js['errors'][0]['description_raw']['__html'];
	    if(strpos($tt,'.<br /><br /')!==false){
	        $tt=explode('.<br /><br /',$tt)[0];
	    }
	    return $tt;
	} else { 
	    return 'success';
	}
}
function followpro5($id,$cookie){
	$laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
	$idfb=json_decode(thongtin($cookie),true)['id'];
    $arraydata=array(
    	'av'=>$idfb,
    	'__user'=>$idfb,
    	'__a'=>'1',
    	'__req'=>'m',
    	'__hs'=>'19548.HYP:comet_pkg.2.1..2.1',
    	'dpr'=>'1.5',
    	'__ccg'=>'EXCELLENT',
    	'__rev'=>'1007810940',
    	'__s'=>'v7q5gt:xae0lj:d3gekh',
    	'__hsi'=>'7253994215508312979',
    	'__dyn'=>'7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
    	'__csr'=>'gmM-NIvf9nHbd5ldOQB5ROihshRN3ZsJFuIF2tPs_EhJpbnaBRRO4imQIyLZHpq-8ChFaRh9q-WyWWQWQLipEk89yk9KUO9yaCVUpV4uFoOBGAQTHCDKu8KidmZ8xVpoJDhvxqby8GcyEmx69y8xaeFa6WrgCm5pUixadKmbxu58giG9zFETxeaDBzFUCmFEkBy8lhUO4EgxR0Bxu5-vwg48DokzFbwhojx248ixi2au2OfwAwyyqxicx2bAyU4u2226262i4omw8G19ypEC5HzU8oW2q3B0rUvwgK00ChA01Xgw0NXw4wwaS0y9QaAo1u81BU1iaw2rofU2Fx2u3ap0aWu0B87m3N0Ww7Mg09caa0inw1QS0azUmwjA0Yoa83zg0EW0f280oi6k0s26EjVB804YFU0pVDw1g-0su0vcw1Ox55oG1zhA0DU1981TQ0To0Ym2m2q',
    	'__comet_req'=>'15',
    	'fb_dtsg'=>$fb_dtsg,
    	'jazoest'=>$jazoest,
    	'lsd'=>'qFuw8xshiqllvkUPBorimp',
    	'__spin_r'=>'1007810940',
    	'__spin_b'=>'trunk',
    	'__spin_t'=>'1688952142',
    	'fb_api_caller_class'=>'RelayModern',
    	'fb_api_req_friendly_name'=>'CometUserFollowMutation',
    	'variables'=>'{"input":{"attribution_id_v2":"ProfileCometTimelineListViewRoot.react,comet.profile.timeline.list,via_cold_start,1688952140736,73739,190055527696468,","subscribe_location":"PROFILE","subscribee_id":"'.$id.'","actor_id":"'.$idfb.'","client_mutation_id":"1"},"scale":1.5}',
    	'server_timestamps'=>'true',
    	'doc_id'=>'6261418267245544'
    );
    $data=http_build_query($arraydata);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/'.$id,
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 982',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: CometUserFollowMutation',
        'x-fb-lsd: qFuw8xshiqllvkUPBorimp',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function likepagepro5($id,$cookie){
	$laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
    $idfb=json_decode(thongtin($cookie),true)['id'];
    $arraydata=array(
        'av'=> $idfb,
        '__user'=> $idfb,
        '__a'=> '1',
        '__req'=> '16',
        '__hs'=> '19548.HYP:comet_pkg.2.1..2.1',
        'dpr'=> '1.5',
        '__ccg'=> 'EXCELLENT',
        '__rev'=> '1007810955',
        '__s'=> 'pvn0xd:5jd4eo:b81udn',
        '__hsi'=> '7254013782900998924',
        '__dyn'=> '7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz81s8hwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
        '__csr'=> 'gjOOhcAmNJNsYBuIIT4ldOQB5OiijT4tsg-LlmBWOA8TdPC4rmjROFtttpbCiOa_SJBH-qquiykh4HXGVWJpaQLipkfA8qExyrKcyoy9VUpVpWBzaGGjBmKquby8ydmZ9p-VoJKQnUWubxecyEmx69y8xaeKErFJ2polDxa4ESVoK5Ukx2WyoymqdUjyFVo89qCximu5Aucxa48twyK5UnV-10gy8gkzGBwhojx23y2au2OfwAwyyqxicx2bAyU4u2226262i4omw8G17UCq9xqU-26ewCwVga84q7U4i00ChA01Xgw0NXw4wwaS0y9QaAo1u81BU1iaw2dodUfU2Fx2u3ap0aWu0B87m3N02aQ02j2yw4BU0tdw2E-5E4V0f62y0UQ0aew3My064xB070xG4-pi03XE0u5Dw1Ju0vcw1Ox55oG1zhA0DU1981TQ0To0Si1wwBwCw',
        '__comet_req'=> '15',
        'fb_dtsg'=> $fb_dtsg,
        'jazoest'=> $jazoest,
        'lsd'=> 'fAwis84Cp3h2iTbFol7X1O',
        '__spin_r'=> '1007810955',
        '__spin_b'=> 'trunk',
        '__spin_t'=> '1688956698',
        'fb_api_caller_class'=> 'RelayModern',
        'fb_api_req_friendly_name'=> 'CometProfilePlusLikeMutation',
        'variables'=> '{"input":{"is_tracking_encrypted":false,"page_id":"'.$id.'","source":null,"tracking":null,"actor_id":"'.$idfb.'","client_mutation_id":"1"},"scale":1.5}',
        'server_timestamps'=> 'true',
        'doc_id'=> '4867271226642619',
    );
    $data=http_build_query($arraydata);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/profile.php?id=100094436145486&sk=followers',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 982',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: CometProfilePlusLikeMutation',
        'x-fb-lsd: fAwis84Cp3h2iTbFol7X1O',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function cxcmtpro5($id,$loai,$cookie){
    $loai=strtolower(explode("CMT",$loai)[0]);    
    if($loai=='like'){
        $idcx='1635855486666999';
    } else if($loai=='love'){
        $idcx='1678524932434102';
    } else if($loai=='care'){
        $idcx='613557422527858';
    } else if($loai=='haha'){
        $idcx='115940658764963';
    } else if($loai=='wow'){
        $idcx='478547315650144';
    } else if($loai=='sad'){
        $idcx='908563459236466';
    } else if($loai=='angry'){
        $idcx='444813342392137';
    } else{
        return 'loi';
    }
    $laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
	$post=chuyenwww($id,$cookie);
	$idcmt=explode('"',explode('feedback":{"id":"',explode('XFBCommentReactionActionLink',$post)[1])[1])[0];
	$idfb=json_decode(thongtin($cookie),true)['id'];
    $dataarray=array(
        'av'=> $idfb,
        '__user'=> $idfb,
        '__a'=> '1',
        '__req'=> 'l',
        '__hs'=> '19548.HYP:comet_pkg.2.1..2.1',
        'dpr'=> '1.5',
        '__ccg'=> 'GOOD',
        '__rev'=> '1007811011',
        '__s'=> 'fb5af2:050uwa:piyrme',
        '__hsi'=> '7254090843497520040',
        '__dyn'=> '7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
        '__csr'=> 'gbIvffWNdsJldORsQAj9fsJttOfRRlFulp5tPs_EhJpbHaBRHRWimQJqL_HozXCADqORGnnKEKKJeK_ipEk88gB2rKcyoyFK2eiFqBzamGhbiHCDKu8y8RrXmumGyUGnUsBy8GcyEmx66QEiG6XjyFolDxa4ESVoK2O4oy5okUjyFVoWu9y9EkBy8lhUO4EbE9EnxvDU9UogytxiewjEjx23y2G3O2i2a9G2648KibwhU888o4q4omx-0J8gyoqzU8oW2q3B0rUvwh802p6g07J2037K0i20Ho0tKw_waC49UcFA0HFU2kwtof43G0v100AMEE08to0Gm5E4V07-g0EW0f280oi6k0s26EjVB80fKw43Dw1DCu053U1NU1YO07a4klyE6d6g2vw4Aw7vg3tw3No9o9E',
        '__comet_req'=> '15',
        'fb_dtsg'=> $fb_dtsg,
        'jazoest'=> $jazoest,
        'lsd'=> 'iIZW0gxaN_YCBKIMJ9onFM',
        '__spin_r'=> '1007811011',
        '__spin_b'=> 'trunk',
        '__spin_t'=> '1688974640',
        'fb_api_caller_class'=> 'RelayModern',
        'fb_api_req_friendly_name'=> 'CometUFIFeedbackReactMutation',
        'variables'=> '{"input":{"attribution_id_v2":"CometSinglePostRoot.react,comet.post.single,via_cold_start,1688974641085,42941,,","feedback_id":"'.$idcmt.'","feedback_reaction_id":"'.$idcx.'","feedback_source":"OBJECT","is_tracking_encrypted":true,"tracking":["AZVnN1iykTtOLOP_UENYvu7866K4Vw2_M0Q0rQ8myuwM-EUrbppRouLZgVPP_6N4vI7if2h14-fG8PlhtjST53A63KtiA_x0Z4XwCVTQkdKgjy-7a9INk4Im4sdocfjAWkdQnfgepUEJydEC9SbGnqQsWe8FJPZNKCk5oAqAb9aa6hGlBczxIql9k2BPQQ3leqBguOlFvwLhtD8JKmwDh6taDxO4wuABOQr7oXwawKwDzX4lJXwuxOTpLxn_ZD7XnZeBfez4KBgqtBK3yNvBHaA453l3Gr2GL0ismVB4Ssd5Cm7hWIZYsQxjat69by2zlGA6QuLMf07MmYc3tW7VqBvbLpDLdsCRrlS4y0UzNX46VRUvwYBoOPYt3C7YTOb4eQJrJUgaC8ZDfm_uG9n9XF__W3j1kFJkvlJLx9g7bhCkYk_LWETeAKHKhZ1m4jGt4WdnUiZWrFoEDzAmuomTlcHBwFqmg5olD7GkM-y0BOysqhvvlwXqKTGyCt4ApVwqjInJA37MlU6yuY4sTVDiSfWR-46-4w1tOy-zuFuHhVXLhU4Xp8q2IApw-Mo4ys-0G0QtNOHFigAaJf0lqFa6uSUQluUT4Ihb9o5vbpzLq7xcyevmIxcMsVZ9JI3YQTplAudLaBnMIBJHHvaB8T3yASTMCwOPwGFJR4Ru5HMN6Gu-__ke1w7xGu5Pns6m2DdOgFYoI4HAHd19T3hCQoquZN-B0liNrmQeXlm5-GYBCluPu_FwwUZTYI9fiDKXVWOBeo-Qv8crN1hxYaBF2wmocTv1cbcQb3Vayf7aMs71MmTvNfQj1U67_fXyiIZveO5ITzhqY06bXowzK_ugnLhAYThF5IOHKEP74XBoADt8UNbTwi3ObGfDwaQtMfjFHrN_ht9flbfIxfJdJckKZ5PAwiyTceGwLcCteXrt68Fwjcm13hTdkSUeaDGtMKAHRJKerPdd9D2I5l96_6Tlp0qyOjolehRnbeK-s2fD6baL7aJpcKat2u7VIhEaGOjrY9rvntJI0aHt8CEbryKwaBL3FhFyQ8QDFbDRaaVwTGISfIJeEcTcx6DJAgAcNPIZ9rTgpSw3iVxQoqzctGvNKs78xg0_IEycjn8yT1_fidDJKt_4lWUi2LPYIQKzy9g-clteYYI1TjjpcwQESQcIzkkpe1QbLyZLJt5wGaL4v4Tc10WZ-xxxuJA0sFKALzpghT2BeIarwbT8etiasf99E9gSaz5ydgZbQrEBiCZeHZxaaboKR0i8DIqgxN1SWXwORUQ7U5Ai1c88lIcLUi0Vg-qbyXPWrO6oPcUVilqGX5ON4mtiKRo3Ditk-cp16zefqr8zkjta4Jb55lLF74b94QfEVok2mHQbgrBKdM48s3SI9Z6oDBKUs91O71oGuIq_EE4xNBqOMQtB4AMpP8Sd_dZq-OhCFYk0rywRFIaolBF6EWa1hDbtRAmQwC2Qf3Qlv9HbeR3B3XvyMgnVMfezEcyYyqJAH2dbiPsBt--5fy4SL5zzGysfugQuwBk0Z0qVjQMvTZ2eGdiXZeBEs6SZLY9TGw6q4OM3u5zGJ9aMefYzLYxxGa3LSNlAT5rzNOC8PZw0XwxO0uZnVaLblUdCkqqemapVq1n2OF9WT_ynMOO_ogi-gXTCSsbKS_cKLPngZKYwfD4"],"session_id":"c6cef0c9-92d5-4b88-8e64-8e26a5f833d2","actor_id":"'.$idfb.'","client_mutation_id":"1"},"useDefaultActor":false,"scale":1.5}',
        'server_timestamps'=> 'true',
        'doc_id'=> '6658674364165057'
    );
    $data=http_build_query($dataarray);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/'.$id,
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 982',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: CometUFIFeedbackReactMutation',
        'x-fb-lsd: iIZW0gxaN_YCBKIMJ9onFM',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else if(strpos($response,'errors')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function sharepro5($id,$cookie){
    $laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
    $idfb=json_decode(thongtin($cookie),true)['id'];
    $arraydata=array(
        'av'=> $idfb,
        '__user'=> $idfb,
        '__a'=> '1',
        '__req'=> 'u',
        '__hs'=> '19548.HYP:comet_pkg.2.1..2.1',
        'dpr'=> '1.5',
        '__ccg'=> 'EXCELLENT',
        '__rev'=> '1007811075',
        '__s'=> '7n71ms:050uwa:xwpxk0',
        '__hsi'=> '7254111004869628337',
        '__dyn'=> '7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
        '__csr'=> 'gbf2tSIAG5ndvsBndOlf5jn4Pfird99FqODkgZnuSyCqWKyqiFAQVbhdYyQv_ihp8xVmRDiGhaOyeARWrF6z96ucJ5y8CqaxC8Ax54KqiHZ4hfy5GbgNGqqFVKqih7F38S8UbbwgUjDCmvDCLgDBzVoy5oWbwUjUuDwyCUJ5gO7UK8x6mcykiiey8ap89ooGmbz8ixx7AwhA3CWwLwxzoiwSwBwCzQq14xq2u6EK2m3e8wlE764ohxG2GbwnoqBAwZxW6VaxW7U-2O00CtQ01Xgw0NXw4wwaS07rEfU2Fx2u3ap0aWu0B87m3N0Ww7Mg09caa027m0aBxq1eg1_A0aew3My064xB070xG4-pi03XE10VU0pVDw1g-0su0vcw1Ox55oG1zhA0DU1981TQ0To0Si1wwBwCw',
        '__comet_req'=> '15',
        'fb_dtsg'=> $fb_dtsg,
        'jazoest'=> $jazoest,
        'lsd'=> 'ymHT63_j3GnX-vVOLLTJba',
        '__spin_r'=> '1007811075',
        '__spin_b'=> 'trunk',
        '__spin_t'=> '1688979334',
        'fb_api_caller_class'=> 'RelayModern',
        'fb_api_req_friendly_name'=> 'useCometFeedToFeedReshare_FeedToFeedMutation',
        'variables'=> '{"input":{"attachments":{"link":{"share_scrape_data":"{\"share_type\":22,\"share_params\":['.$id.']}"}},"audiences":{"undirected":{"privacy":{"allow":[],"base_state":"EVERYONE","deny":[],"tag_expansion_state":"UNSPECIFIED"}}},"is_tracking_encrypted":true,"navigation_data":{"attribution_id_v2":"CometSinglePostRoot.react,comet.post.single,via_cold_start,1688979335144,374963,,"},"source":"www","tracking":["AZWBgCAq46Nrhid6XrBCe_PyNXUazUMnUkUvYTL1oylOZ6OVgcvgTXIP00a0BlZvQxNDRh3COnKvJhqqu5qT9mh_mgpZ6bfqE3t6Mv4W24NuI318HnSBWKq73eNNaot4rxx84Sb3RflloSkWlxYpOraLqGEfdnhXeHvKGSopFu4HcHPCmqkFsHZUAbeNeqU7tcmCwqNCHNxwmiFIccjsjtN0XFkc-lt096AmcvOhLfqvZnI1ZUUA8Vqhmcphhy1P9VcOYYUnmFcvSaZDvSgNn3S8-ayRK73pe46xZ8UpTFnq1KwBAcH-yA7UNB73Ihd1-SjZFq7Cuyu2xDpXBW5YRLJOWnA7Yqf9EesCu8Ol_eXCICAqF6GPzz9O5QQnepf6vSwJ4dLuF5QtIC7q1EqrIAZaASXiAeu_Pxl_A0lQL39cZwa8axnLKOg6-1iyxQv3PNo"],"actor_id":"'.$idfb.'","client_mutation_id":"2"},"renderLocation":"homepage_stream","scale":1.5,"privacySelectorRenderLocation":"COMET_STREAM","useDefaultActor":false,"displayCommentsContextEnableComment":null,"feedLocation":"NEWSFEED","displayCommentsContextIsAdPreview":null,"displayCommentsContextIsAggregatedShare":null,"displayCommentsContextIsStorySet":null,"displayCommentsFeedbackContext":null,"feedbackSource":1,"focusCommentID":null,"UFI2CommentsProvider_commentsKey":"CometModernHomeFeedQuery","__relay_internal__pv__IsWorkUserrelayprovider":false,"__relay_internal__pv__IsMergQAPollsrelayprovider":false,"__relay_internal__pv__StoriesArmadilloReplyEnabledrelayprovider":false,"__relay_internal__pv__StoriesRingrelayprovider":false}',
        'server_timestamps'=> 'true',
        'doc_id'=> '6321456657936174'
    );
    $data=http_build_query($arraydata);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/'.$id,
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 982',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: ComposerStoryCreateMutation',
        'x-fb-lsd: 7RVYg3WnZKmG3nL2F5Q4aX',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else if(strpos($response,'errors')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function grouppro5($id,$cookie){
    $laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
    $idfb=json_decode(thongtin($cookie),true)['id'];
    $arraydata=array(
        'av'=> $idfb,
        '__user'=> $idfb,
        '__a'=> '1',
        '__req'=> 'e',
        '__hs'=> '19548.HYP:comet_pkg.2.1..2.1',
        'dpr'=> '1.5',
        '__ccg'=> 'EXCELLENT',
        '__rev'=> '1007811075',
        '__s'=> 'gz4sge:3qjabc:ozo9pk',
        '__hsi'=> '7254114071732007919',
        '__dyn'=> '7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
        '__csr'=> 'gb3s9FH9axi4TT9lPsyPNkRNcPQD4hfiHaKBP9ltW9cpHGWfkKjjjihcIBkA_JmuGBiBrmtaFbinVqQDWvFaUOhGiUyQm8gyqayUS8AzGhbh4iLRAhfy5Gqh3kFFGDKKp9qhWgObyJ0HKm1hDCheKiKiZ2umfBy8O8yWyUboFfxWu2a8yQlemEoxa8x6mcymV8GUy2Ci2m6aByUO4EohV8iwPgqy8lKEhxSaxmexa3q2m2qfhE4i5EK6UqyU9ocUzwl8G13xy9wzxG2GbwnoqBAwZxW6V88ovzU8U059S017yg07J2037K0S84u0Ho0iyw2OUfU2Fx2u3ap0pU4qu0B87m3N0Ww7Mg0B60i4Ox501q6yw0xRw2FomwjA0vV0vjw22E0Y8w1x8pg1M8qxfCkw0-W0geu06upU0kfw77w7P80sEhhmawoQp09-0ii0tZ0dS0dAwo89o9E',
        '__comet_req'=> '15',
        'fb_dtsg'=> $fb_dtsg,
        'jazoest'=> $jazoest,
        'lsd'=> 'tzKkH9RNTJMs6fCNalq1GM',
        '__spin_r'=> '1007811075',
        '__spin_b'=> 'trunk',
        '__spin_t'=> '1688980048',
        'qpl_active_flow_ids'=> '25305590,431626709',
        'fb_api_caller_class'=> 'RelayModern',
        'fb_api_req_friendly_name'=> 'GroupCometJoinForumMutation',
        'variables'=> '{"feedType":"DISCUSSION","groupID":"'.$id.'","imageMediaType":"image/x-auto","input":{"action_source":"GROUP_MALL","attribution_id_v2":"CometGroupDiscussionRoot.react,comet.group,via_cold_start,1688980049490,201293,2361831622,","group_id":"'.$id.'","group_share_tracking_params":{"app_id":"2220391788200892","exp_id":"null","is_from_share":false},"actor_id":"'.$idfb.'","client_mutation_id":"1"},"inviteShortLinkKey":null,"isChainingRecommendationUnit":false,"isEntityMenu":true,"scale":1.5,"source":"GROUP_MALL","renderLocation":"group_mall","__relay_internal__pv__GlobalPanelEnabledrelayprovider":false,"__relay_internal__pv__GroupsCometEntityMenuChannelsrelayprovider":false,"__relay_internal__pv__GroupsCometEntityMenuUseChatThumbnailsrelayprovider":false,"__relay_internal__pv__GroupsCometHasLeftRailNavImprovementrelayprovider":false,"__relay_internal__pv__GroupsCometGroupChatLazyLoadLastMessageSnippetrelayprovider":false}',
        'server_timestamps'=> 'true',
        'doc_id'=> '6096541867139832',
        'fb_api_analytics_tags'=> '["qpl_active_flow_ids=25305590,431626709"]'  
    );
    $data=http_build_query($arraydata);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/groups/'.$id.'/',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 982',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: GroupCometJoinForumMutation',
        'x-fb-lsd: tzKkH9RNTJMs6fCNalq1GM',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else if(strpos($response,'errors')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function commentpro5($id,$text,$cookie){
        $laymbasic=chuyenmbasic('',$cookie);
	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$laymbasic)[1])[0];
	$jazoest=explode('"',explode('jazoest" value="',$laymbasic)[1])[0];
	if($fb_dtsg==''){
    	$mbasic=chuyenmbasic('10111007623865331',$cookie);
    	$fb_dtsg=explode('"',explode('fb_dtsg" value="',$mbasic)[1])[0];
    	$jazoest=explode('"',explode('jazoest" value="',$mbasic)[1])[0];
	}
    $www=chuyenwww($id,$cookie);
    $idpost=explode('"',explode('FullUFIRenderer","feedback":{"id":"',$www)[1])[0];
    $idfb=json_decode(thongtin($cookie),true)['id'];
    $arraydata=array(
        'av'=> $idfb,
        '__user'=> $idfb,
        '__a'=> '1',
        '__req'=> 's',
        '__hs'=> '19548.HYP:comet_pkg.2.1..2.1',
        'dpr'=> '1.5',
        '__ccg'=> 'EXCELLENT',
        '__rev'=> '1007811165',
        '__s'=> 'dvuyzx:yqeqqt:ja8csd',
        '__hsi'=> '7254148292729941327',
        '__dyn'=> '7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx609vCxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y1MBx_y88E3qxWm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1Fw',
        '__csr'=> 'gbcaTqOiN5ndvsBhn8IYldsjcZSPiiqGIFRPflTJEFCKHECAGpdeiQjv8J7-QAmi8ulIxQGAKRgyhduCWhEOhDzbhoy9CyEpy98Ct4KqiHWAhfy5GbgRaqqFVKqih7F38mUbbwlVVA9VVHQ9Vo-m8xmeyUe4-7FU8FKbhkcwHy8hAgO9BAzEy2Ci2m6aByUO4EohV84p0VKEbUbUiwSwBwCzQq14xq2u6EK2m3e8wlE762e6EaEK1txGmi3S7ErAwxx-fw09Gh00uQ80cuU1882Jw1SW3-0GogDwOCg2KDw9i1RwYgeE1Y402j2yw0xRw2FomwjA0vV02zE0Y8w1x8pg1M8qxfCkw0-W0geu06upU0kfw77w7P80sEhhmawoQp09-0ii0tZ0dS0dAwo89o9E', '__comet_req'=> '15',
        'fb_dtsg'=> $fb_dtsg,
        'jazoest'=> $jazoest,
        'lsd'=> 'mrCjocrDT-zMtej3JMiGCX',
        '__spin_r'=> '1007811165',
        '__spin_b'=> 'trunk',
        '__spin_t'=> '1688988016',
        'fb_api_caller_class'=> 'RelayModern',
        'fb_api_req_friendly_name'=> 'CometUFICreateCommentMutation',
        'variables'=> '{"displayCommentsFeedbackContext":null,"displayCommentsContextEnableComment":null,"displayCommentsContextIsAdPreview":null,"displayCommentsContextIsAggregatedShare":null,"displayCommentsContextIsStorySet":null,"feedLocation":"PERMALINK","feedbackSource":2,"focusCommentID":null,"groupID":null,"includeNestedComments":false,"input":{"attachments":null,"feedback_id":"'.$idpost.'","formatting_style":null,"message":{"ranges":[],"text":"'.$text.'"},"attribution_id_v2":"CometSinglePostRoot.react,comet.post.single,via_cold_start,1688932012369,993234274,,","is_tracking_encrypted":true,"tracking":["AZX84v7ETSTR2qsSb6-_S22fCv8AjgHeP4VA5JWffxb5Z73CNDw6_I6uYpiSkuoXqB6gRfl38hVcpHnMhvH9MuQfvIVlJTtbaEr7JHP09SobSWjedC_cQzRPmkMN7wEnNXQDMtKLejfNeZpSakBbOP6kluO_00u5anG5eOFADy2eCV5n-EQm2MyanDC0cr1I93uVIQnCWA1ESwUCpsXK9riRIDHI_b0bif7jNV-HUhD9p5fyc0KcBeCDoAUTHYFYDOxziAOdeAlVMYC8578shEpTw_x3-9xLk7jwTD5VpsGByUUOCpyLEFqEnnkqIjO_4ipY6RIYPM91Ppfb6KJWBU_PJhvcyzXo5URfBZ0BqOGI4iScG63Z0l0LqxLuOHXxI1R6ckcCPKbsEVr99yJGccLlEpcDprEZh_n6Auh83i2xlV4eRWvJD3XlWu1vBqEm2B6_Q37omFz05bybh7kU0o5S8iQ3L5CX6nj0oSDdwB-9xKQkZZVVDieyurmAWUxhF98Sd_8D41ygdEqQYTCf7YlX5DEkhNMMw6YVfYNNWYJXis1Ii6ZPpeO0nHVXwcJNCo5MghjskUozne2DHxSRTaAB8RT4u73Yb2fOhUfDMImbbli4I8S6U-zLPdptELuaq3GarA1gfCMnXrgSoWqKuaMjVZYFCjhQdnrEGFm5WwUgbiPFXhmT-9rvsJTQU701SQQLjOoyyba1S8hkSq77pUX3O3HwQPnVZbjm-rEtrxtgkzc_Oqxzn1hh8LBoQzv5da0guPDyTsGXHdzO1yhGTQZ88rOTG2YH8T5cmmRcI5AOWLnofI0UuVBjXD9W60izOLyDTBl2D8c1dARAapDz7jlM68uSmX_TNQhEjAcM00KZkzjw0LNn_UKgcgu1_gYrnRiWtkmEnf4HzeefJ3J81qAfbCsl7qXOBNSP6fbwhlWwWKgaSvVcqvu6eoOB1nAxfjnFQcC22KiyoX8eIXH4pmCFttWN4HjJTSgzlu4K8eZ0XRyWZUuYlsPkjHInMMjRaaL4OV2IWZxrjfsAbwRjHMEa1QA2XgiSzYfzoXQYi2Z8gKf1_4_kL6kUBky6WAfuIuwP3IOSDXYX0qIflgfopG6RyiPx-mr7S3Th3zvNweN8FcBxS5eeQHwcSV8BqoJEBLSuO5UmsCYhPjSgFwYVDE2KazUikE3Jc-0v1WzWbP46uK5ARrYgXPLNkQ1cdRXEo3eK4","{\"assistant_caller\":\"comet_above_composer\",\"conversation_guide_session_id\":\"63b9371a-aa48-433f-J424-ee4Y400ac0f7\",\"conversation_guide_shown\":null}"],"feedback_source":"OBJECT","idempotence_token":"client:52423e6a-'.rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999).'-d53466d52d7f","session_id":"1183e633-58d9-4c90-adb8-043iua30eba78","actor_id":"'.$idfb.'","client_mutation_id":"3"},"inviteShortLinkKey":null,"renderLocation":null,"scale":1.5,"useDefaultActor":false,"UFI2CommentsProvider_commentsKey":"CometSinglePostRoute"}',
        'server_timestamps'=> 'true',
        'doc_id'=> '9623116691096335'    
    );
    $data=http_build_query($arraydata);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/LongKhanhthanhphotre/posts/pfbid02ZWutKwUibDEV3P9dR7TmLttKiTwBvZFXKyXDvBwGc2M94XfcjfkFxS1JEKMcBQxtl',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 998',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: CometUFICreateCommentMutation',
        'x-fb-lsd: mrCjocrDT-zMtej3JMiGCX',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'for (;;);')!==false){
        return 'loi';
    } else if(strpos($response,'errors')!==false){
        return 'loi';
    } else {
        return 'success';
    }
}
function randomhoten($loai){
    $hoConTrai = array('Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Đặng', 'Bùi');
    $hoConGai = array('Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Đặng', 'Bùi');
    $ho = array('Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Đặng', 'Bùi');
    
    $tenDemConTrai = array('Văn', 'Đình', 'Hoài', 'Thành', 'Đức', 'Hữu','Đăng');
    $tenDemConGai = array('Thị', 'Như', 'Mỹ', 'Kim', 'Phương', 'Thu');
    $tenDem = array('Văn', 'Đình', 'Hoài', 'Thành', 'Đức', 'Hữu','Đăng','Thị', 'Như', 'Mỹ', 'Kim', 'Phương', 'Thu');
    
    $tenConTrai = array('An', 'Bình', 'Cường', 'Đức', 'Hải', 'Long', 'Minh', 'Nam', 'Quang', 'Tuấn','Khoa');
    $tenConGai = array('An', 'Bích', 'Cẩm', 'Đào', 'Hà', 'Lan', 'Mỹ', 'Ngọc', 'Phương', 'Thu');
    $ten = array('An', 'Bình', 'Cường', 'Đức', 'Hải', 'Long', 'Minh', 'Nam', 'Quang', 'Tuấn','Khoa','An', 'Bích', 'Cẩm', 'Đào', 'Hà', 'Lan', 'Mỹ', 'Ngọc', 'Phương', 'Thu');
    
    $randomHo = '';
    $randomTenDem = '';
    $randomTen = '';
    if ($loai === 'nam') {
        $randomHo = $hoConTrai[array_rand($hoConTrai)];
        $randomTenDem = $tenDemConTrai[array_rand($tenDemConTrai)];
        $randomTen = $tenConTrai[array_rand($tenConTrai)];
    } else if($loai=='ten'){
        $randomHo = $ho[array_rand($ho)];
        $randomTenDem = $tenDem[array_rand($tenDem)];
        $randomTen = $ten[array_rand($ten)];
    }else {
        $randomHo = $hoConGai[array_rand($hoConGai)];
        $randomTenDem = $tenDemConGai[array_rand($tenDemConGai)];
        $randomTen = $tenConGai[array_rand($tenConGai)];
    }
    
    $hoTen = $randomHo . ' ' . $randomTenDem . ' ' . $randomTen;
    return $hoTen;
}
function getalltokenpage($cookie){
    $token=laytoken($cookie);
    if($token=='loi'){
        exit(json_encode(array(
            "status"=>"error",
            "message"=> "Bạn vui lòng tắt 2 Fa"
        )));
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/me/accounts?access_token='.$token);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: graph.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $js=json_decode($response,true);
    $data=$js['data'];
    $tong=[];
    $thongtin=[];
    foreach ($data as $dataa){
        $token=$dataa['access_token'];
        $name=$dataa['name'];
        $id=$dataa['id'];
        $thong=array(
            'id'=>$id,
            'name'=>$name,
            'access_token'=>$token
        );
        array_push($thongtin,$thong);
    }
    return $thongtin;
}
function shareao($id,$token,$cookie){
    if($token){
        $url='https://graph.facebook.com/me/feed?method=POST&link=https://m.facebook.com/'.$id.'&published=0&access_token='.$token;
    } else {
        $token=laytoken($cookie);
        if($token=='loi'){
            exit(json_encode(array(
                "status"=>"error",
                "message"=> "Bạn vui lòng tắt 2 Fa"
            )));
        } else {
            $url='https://graph.facebook.com/me/feed?method=POST&link=https://m.facebook.com/'.$id.'&published=0&access_token='.$token;
        }
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: graph.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $js=json_decode($response,true);
    if(isset($js['id'])){
        return $js['id'];
    }
    return "loi";
}
function laytoken($cookie) {
    $head= array("Connection: keep-alive","Keep-Alive: 300","authority: business.facebook.com","ccept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7","accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5","cache-control: max-age=0","upgrade-insecure-requests: 1","accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9","sec-fetch-site: none","sec-fetch-mode: navigate","sec-fetch-user: ?1","sec-fetch-dest: document");
$ch=curl_init();
	curl_setopt_array($ch , array(
		CURLOPT_URL => "https://business.facebook.com/business_locations",
		CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
		CURLOPT_COOKIE => $cookie,
		CURLOPT_HTTPHEADER => $head,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_TIMEOUT => 60,
		CURLOPT_CONNECTTIMEOUT => 60,
		CURLOPT_FOLLOWLOCATION => TRUE
	));
	$access = curl_exec($ch);
	curl_close($ch);
$access_token = 'EAAG'.explode('","', explode('EAAG', $access)[1])[0];
if(strlen($access_token) > 5){
	return $access_token;
} else {
	return 'loi';
}
}
function addtimkiem($cookie){
    $name=urlencode(randomhoten('ten'));
    $url='https://mbasic.facebook.com/search/people/?q='.$name.'&source=filter';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 981',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $urladd="https://mbasic.facebook.com/a/friends/add/?encrypted_id".str_replace('amp;','',explode('"',explode('href="/a/friends/add/?encrypted_id',$response)[6])[0]);
    $idadd=explode('&',explode('subject_id=',$urladd)[1])[0];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urladd);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 981',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/profile.php?id='.$idadd);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 981',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $name=explode('<head><title>',explode('</title><meta',$response)[0])[1];
    if(strpos($response,'a/friendrequest/cancel/?')!==false){
        return array(
            "id"=>$idadd,
            "name"=>$name
            );
    } else {
        return "error";
    }
}
function regpr5($loai,$id,$cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'referer: https://mbasic.facebook.com/khoatran31122006',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.198", "Google Chrome";v="114.0.5735.198"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: same-origin',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 987',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);

    $response = curl_exec($ch);

    curl_close($ch);
    if($loai=='nam'){
        $name=randomhoten('nam');
    } else {
        $name=randomhoten('nu');
    }
    $fb_dtsg=explode('"',explode('fb_dtsg" value="',$response)[1])[0];
    $jazoest=explode('"',explode('jazoest" value="',$response)[1])[0];
    $data = array(
        'av' => $id,
        '__user' => $id,
        '__a' => '1',
        '__req' => '29',
        '__hs' => '19537.HYP:comet_pkg.2.1..2.1',
        'dpr' => '3',
        '__ccg' => 'GOOD',
        '__rev' => '1007770133',
        '__s' => 'ncgqgj:a6l563:viccv1',
        '__hsi' => '7250100209650760091',
        '__dyn' => '7AzHJ16UW5Eb8ng5K8G6EjBWobVo66u2i5U4e2C17xt3odEnz8K361twYwJyE24wJwpUe8hwaG0Z82_CxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3iU8o4Wm7-8wywoE7u7FoarCwLyESE6CawVwwwOg2cwMwhEkxe3u364UrwFg662S269wkopg6C13w',
        '__csr' => 'grMDdMzEiD4N25YhMz9bEABZtR4NDSPlbMznHWFq7vGpbbJLGHTqjV4BTmJFljFTQTahqlp4ikymRXiGjdt29J7AG_Tpu8Dirppu9AbUCVemhGWAKFTirXKcUB6V8CFdaKmLBDF5iKlBGFKZ1y6HDG9Azqy5F394bGKczUSq4k2OuVoPKumFUSbBCg8p-4FEaoLt4KHy8abBgjG9hqyQmrUy7UB4K8wNwFxKdgjxa8UVogxi6UkCx22m3u2Si4oaKEhxK4rGfwDyoS2udCwg44UbE8omzU989okxPzE7q1hzU5K9yu02fW01esw0ARg0ep4013Dw0JeU1O81_U7S05-E8Uao2dwDCyoqgfK0zA1_w8C0wE0chEkO00Cs805aU0W6vgepE1j86q0heX81iw13C1og0smg0jxw7jzUbo1EAqjgat7yvU1LA0na0KE14yZ4p8V1i0z8gw2_o8o18o750',
        '__comet_req' => '15',
        'fb_dtsg' => $fb_dtsg,
        'jazoest' => $jazoest,
        'lsd' => 'I0ETNin6tqFHlLPVsGcuzh',
        '__spin_r' => '1007770133',
        '__spin_b' => 'trunk',
        '__spin_t' => '1688045498',
        'fb_api_caller_class' => 'RelayModern',
        'fb_api_req_friendly_name' => 'AdditionalProfilePlusCreationMutation',
        'variables' => json_encode(array(
            'input' => array(
                'bio' => 'Trần Đăng Khoa',
                'categories' => array('530553733821238'),
                'creation_source' => 'comet',
                'name' => $name,
                'page_referrer' => 'launch_point',
                'actor_id' => $id,
                'client_mutation_id' => '5'
            )
        )),
        'server_timestamps' => 'true',
        'doc_id' => '5296879960418435'
    );

    $data_string = http_build_query($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.facebook.com/api/graphql/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: www.facebook.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://www.facebook.com',
        'referer: https://www.facebook.com/pages/creation?ref_type=launch_point',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.198", "Google Chrome";v="114.0.5735.198"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 897',
        'x-asbd-id: 129477',
        'x-fb-friendly-name: AdditionalProfilePlusCreationMutation',
        'x-fb-lsd: I0ETNin6tqFHlLPVsGcuzh',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    $response = curl_exec($ch);
    $js=json_decode($response,true);
    curl_close($ch);
    if(isset($js['data']['additional_profile_plus_create']['additional_profile'])){
        $idpage= $js['data']['additional_profile_plus_create']['additional_profile']['id'];
        return $idpage."|".$name;
    } else if(isset($js['errors'])){
        return "hanche";
    } else {
        return "loi";
    }
}
function chocbb($cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/pokes/?ref_component=mbasic_bookmark&ref_page=XMenuController');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 987',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'/pokes/inline/?')==false){
        return 'end';        
    } else {
        $link='https://mbasic.facebook.com/pokes/inline/?'.str_replace('amp;','',explode('"',explode('/pokes/inline/?',$response)[1])[0]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: mbasic.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: none',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 987',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $response = curl_exec($ch);
        curl_close($ch);
        return explode('&',explode('poke_target=',$link)[1])[0];
    }
}
function gettokenpage($idpage, $cookie) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://business.facebook.com/business_locations/?page_id=' . $idpage);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority: business.facebook.com',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
    'cache-control: max-age=0',
    'sec-ch-prefers-color-scheme: light',
    'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
    'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-ch-ua-platform-version: "15.0.0"',
    'sec-fetch-dest: document',
    'sec-fetch-mode: navigate',
    'sec-fetch-site: same-origin',
    'sec-fetch-user: ?1',
    'upgrade-insecure-requests: 1',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    'viewport-width: 987',
  ]);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  $response = curl_exec($ch);
  curl_close($ch);
  if (strpos($response, "EAAG") !== false) {
    $token_me = "EAAG" . explode('"', explode('EAAG', $response)[1])[0];
    $ch = curl_init();
    $url = 'https://graph.facebook.com/v3.1/' . $idpage . '?fields=access_token&access_token=' . $token_me;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: graph.facebook.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
      'cache-control: max-age=0',
      'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-fetch-dest: document',
      'sec-fetch-mode: navigate',
      'sec-fetch-site: none',
      'sec-fetch-user: ?1',
      'upgrade-insecure-requests: 1',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($response, true);
    $token = $json['access_token'];
    $id = $json['id'];
    return $token;
  } else {
    return "Id Page Sai !!!";
  }
}

function kiem_tra_so($chuoi) {
    if($chuoi==''){
        return false;
    }
    $do_dai = strlen($chuoi);
    for ($i = 0; $i < $do_dai; $i++) {
        if (!is_numeric($chuoi[$i])) {  // Kiểm tra xem ký tự có phải là con số hay không
            return false;
        }
    }
    return true;
}
function thongtin($cookie){
	$www=chuyenwww('',$cookie);
	if($response!="0"){
		$id='{"ACCOUNT_ID"'.explode('}',explode('{"ACCOUNT_ID"',$www)[1])[0]."}";
		$js=json_decode($id,true);
		$id=$js['ACCOUNT_ID'];
		$id_user=$js['USER_ID'];
		$name=$js['NAME'];
		if($id== null or $name == null){
    		return json_encode(array(
    			'error'=> "Cookie die",
    		));
		} else if($id==$id_user){
			return json_encode(array(
				'name'=> $name,
				'id'=> $id_user,
				'loai'=>'profile'
			));
		} else {
			return json_encode(array(
				'name'=> $name,
				'id'=> $id_user,
				'loai'=>'page'
			));
		}
	} else {
		return json_encode(array(
			'error'=> "Cookie die",
		));
	}
}
function spamib($idsp,$nd,$cookie){
    $id=json_decode(thongtin($cookie),true)['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/messages/read/?tid='.$idsp);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: same-origin',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 987',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    if(strpos($response,'messages/send/?')!==false){
        $url='https://mbasic.facebook.com/messages/send/?'.str_replace('amp;','',explode('"',explode('/messages/send/?',$response)[1])[0]);
        $fb_dtsg=explode('"',explode('fb_dtsg" value="',$response)[1])[0];
        $jazoest=explode('"',explode('jazoest" value="',$response)[1])[0];
        $send='Gửi';
        if(strpos($response,'tids" value="')!==false){
        $tids=explode('"',explode('tids" value="',$response)[1])[0];
        $wwwupp=explode('"',explode('wwwupp" value="',$response)[1])[0];
        $platform_xmd=explode('"',explode('platform_xmd" value="',$response)[1])[0];
        $cver=explode('"',explode('cver" value="',$response)[1])[0];
        $csid=explode('"',explode('csid" value="',$response)[1])[0];
        } else {
            $tids="";
            $wwwupp='';
            $platform_xmd='';
            $cver='';
            $csid='';
        }
        $data='fb_dtsg='.$fb_dtsg.'&jazoest='.$jazoest.'&body='.urlencode($nd).'&send='.$send.'&tids='.$tids.'&wwwupp='.$wwwupp.'&platform_xmd='.$platform_xmd.'&referrer=&ctype=&cver='.$cver.'&csid='.$csid;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: mbasic.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'cache-control: max-age=0',
            'content-type: application/x-www-form-urlencoded',
            'origin: https://mbasic.facebook.com',
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: same-origin',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 987',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        return'success';
    } else {
        return 'error';
    }
}
function getpostnuoifb($cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/home.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
        'cache-control: max-age=0',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 987',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    if(strpos($response,'href="/photo.php?fbid=')!==false){
        $id=explode('&',explode('href="/photo.php?fbid=',$response)[1])[0];
        if(kiem_tra_so($id)!==false){
            return $id;
        }
    } else{
        return "end";
    }
}
function adddiaphuong($diaphuong,$cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/friends/center/mbasic/');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: mbasic.facebook.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: max-age=0',
        'sec-ch-prefers-color-scheme: light',
        'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
        'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-ch-ua-platform-version: "15.0.0"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
        'viewport-width: 1010',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    $response = curl_exec($ch);
    curl_close($ch);
    $links=[];
    if (strpos($response, 'href="/a/friends/add/?') !== false) {
        $id=explode('&',explode('subject_id=',$response)[1])[0];
        $a=explode('href="/a/friends/add/?',$response);
        $xoa='https://mbasic.facebook.com/friends/pymk/xout/sync/?uid'.str_replace('amp;','',explode('"',explode('/friends/pymk/xout/sync/?uid',$response)[1])[0]);
        $a=explode('"',explode('href="/a/friends/add/?',$response)[1])[0];
        $a="https://mbasic.facebook.com/a/friends/add/?".str_replace("amp;","",$a);
        curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/profile.php?id='.$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: mbasic.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'cache-control: max-age=0',
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: none',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 987',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $response = curl_exec($ch);
        curl_close($ch);
        if(strpos($response,$diaphuong)!==false){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $a);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'authority: mbasic.facebook.com',
                'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
                'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
                'sec-ch-prefers-color-scheme: light',
                'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
                'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
                'sec-ch-ua-mobile: ?0',
                'sec-ch-ua-platform: "Windows"',
                'sec-ch-ua-platform-version: "15.0.0"',
                'sec-fetch-dest: document',
                'sec-fetch-mode: navigate',
                'sec-fetch-site: none',
                'sec-fetch-user: ?1',
                'upgrade-insecure-requests: 1',
                'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
                'viewport-width: 987',
            ]);
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
            $response1 = curl_exec($ch);
            curl_close($ch);
            if(strpos($response1,'Tài khoản của bạn hiện bị hạn chế')!==false){
            return "block";
            exit();
            }
        return $id;
    } else {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $xoa);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'authority: mbasic.facebook.com',
            'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'sec-ch-prefers-color-scheme: light',
            'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
            'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-ch-ua-platform-version: "15.0.0"',
            'sec-fetch-dest: document',
            'sec-fetch-mode: navigate',
            'sec-fetch-site: none',
            'sec-fetch-user: ?1',
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
            'viewport-width: 987',
        ]);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        $response = curl_exec($ch);
        curl_close($ch);
        return 'xoa';
    }
    } else {
        return 'end';
    }
}
function addnuoifb($cookie){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/friends/center/mbasic/');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: mbasic.facebook.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
      'cache-control: max-age=0',
      'sec-ch-prefers-color-scheme: light',
      'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
      'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-ch-ua-platform-version: "15.0.0"',
      'sec-fetch-dest: document',
      'sec-fetch-mode: navigate',
      'sec-fetch-site: none',
      'sec-fetch-user: ?1',
      'upgrade-insecure-requests: 1',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
      'viewport-width: 1010',
  ]);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  $response = curl_exec($ch);
  curl_close($ch);
  $links=[];
  if (strpos($response, 'href="/a/friends/add/?') !== false) {
      $a=explode('href="/a/friends/add/?',$response);
      $a=explode('"',explode('href="/a/friends/add/?',$response)[1])[0];
      $a="https://mbasic.facebook.com/a/friends/add/?".str_replace("amp;","",$a);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $a);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'authority: mbasic.facebook.com',
      'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
      'accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
      'sec-ch-prefers-color-scheme: light',
      'sec-ch-ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"',
      'sec-ch-ua-full-version-list: "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.134", "Google Chrome";v="114.0.5735.134"',
      'sec-ch-ua-mobile: ?0',
      'sec-ch-ua-platform: "Windows"',
      'sec-ch-ua-platform-version: "15.0.0"',
      'sec-fetch-dest: document',
      'sec-fetch-mode: navigate',
      'sec-fetch-site: none',
      'sec-fetch-user: ?1',
      'upgrade-insecure-requests: 1',
      'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36',
      'viewport-width: 987',
  ]);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  $response1 = curl_exec($ch);
  curl_close($ch);
  if(strpos($response1,'Tài khoản của bạn hiện bị hạn chế')!==false){
    return "block";
    exit();
  }
  $id=explode('&',explode('subject_id=',$response)[1])[0];
  return $id;
  } else {
      return 'end';
  }
}
function nuoifbcx($id,$type,$cookie){

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
  curl_setopt($ch, CURLOPT_ENCODING, '');
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
:'));
  $page = curl_exec($ch);
  if(strpos($page,"reactions/picker/?is_permalink")!==false){
    $link=explode('"',explode('reactions/picker/?is_permalink',$page)[1])[0];
    $link=str_replace('amp;','',$link);
  }
  $link = 'https://mbasic.facebook.com/reactions/picker/?is_permalink' . $link;
  curl_setopt($ch, CURLOPT_URL, $link);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $cx = curl_exec($ch);
  $haha = explode('<a href="', $cx);
  if ($type == 'LIKE') {
      $haha2 = explode('" style="display:block"', $haha[1])[0];
  } elseif ($type == 'LOVE') {
      $haha2 = explode('" style="display:block"', $haha[2])[0];
  } elseif ($type == 'CARE') {
      $haha2 = explode('" style="display:block"', $haha[3])[0];
  } else if ($type == 'HAHA') {
      $haha2 = explode('" style="display:block"', $haha[4])[0];
  } else if ($type == 'WOW') {
      $haha2 = explode('" style="display:block"', $haha[5])[0];
  } else if ($type == 'SAD') {
      $haha2 = explode('" style="display:block"', $haha[6])[0];
  } elseif ($type == 'ANGRY') {
      $haha2 = explode('" style="display:block"', $haha[7])[0];
  }
  $link2 = html_entity_decode($haha2);
  curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com' . $link2);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
function camxuc($id, $type, $cookie) 
{
    $ch = curl_init();
    if (strpos($id, '_')) {
        $uid = explode('_', $id, 2);
        $id2 = 'story.php?story_fbid=' . $uid[1] . '&id=' . $uid[0];
    } else {
        $id2 = $id;
    }
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id2);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
	:'));
    $page = curl_exec($ch);
    if ($id2 != $id && explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0]) {
        $get = explode('&amp;origin_uri=', explode('amp;ft_id=', $page, 2)[1], 2)[0];
    } else {
        $get = $id2;
    }
    $link = 'https://mbasic.facebook.com/reactions/picker/?is_permalink=1&ft_id=' . $get;
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $cx = curl_exec($ch);
    $haha = explode('<a href="', $cx);
    if ($type == 'LIKE') {
        $haha2 = explode('" style="display:block"', $haha[1])[0];
    } elseif ($type == 'LOVE') {
        $haha2 = explode('" style="display:block"', $haha[2])[0];
    } elseif ($type == 'CARE') {
        $haha2 = explode('" style="display:block"', $haha[3])[0];
    } else if ($type == 'HAHA') {
        $haha2 = explode('" style="display:block"', $haha[4])[0];
    } else if ($type == 'WOW') {
        $haha2 = explode('" style="display:block"', $haha[5])[0];
    } else if ($type == 'SAD') {
        $haha2 = explode('" style="display:block"', $haha[6])[0];
    } elseif ($type == 'ANGRY') {
        $haha2 = explode('" style="display:block"', $haha[7])[0];
    }
    $link2 = html_entity_decode($haha2);
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com' . $link2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function huyfollow($id, $cookie)
{
    $ch = curl_init();
    if (strpos($id, '_')) {
        $uid = explode('_', $id, 2);
        $id2 = 'story.php?story_fbid=' . $uid[1] . '&id=' . $uid[0];
    } else {
        $id2 = $id;
    }

    $header = array(
        "Host:mbasic.facebook.com",
        "user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "cookie:$cookie",
    );
       
    $linkbv = 'https://mbasic.facebook.com/' . $id2;
    curl_setopt($ch, CURLOPT_URL, $linkbv);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
                    :'));
    // json_decode(curl_exec($ch), true);
    $post = curl_exec($ch);

    
    $link = explode('<a href="/a/subscriptions/remove?subject_id=', $post)[1];
    $link = explode('"', $link)[0];
    $link = html_entity_decode($link);
    $link = "https://mbasic.facebook.com/a/subscriptions/remove?subject_id=".$link;
    // echo $link;
    // die();
    $linkreac1 = $link;
    $header = array(
        "Host:mbasic.facebook.com",
        "user-agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36",
        "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "referer:$linkbv",
        "cookie:$cookie",
    );
       
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $linkreac1);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $page = curl_exec($ch);
    $aa = $page;
 
    return $aa;
}
function follow($idtest, $cookie)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $idtest . '?_rdr');
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "upgrade-insecure-requests: 1";
  $head[] = "sec-ch-ua-mobile: ?0";
  $head[] = "sec-fetch-user: ?1";
  $head[] = "sec-fetch-site: none";
  $head[] = "sec-fetch-dest: document";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36');
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_REFERER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $access = curl_exec($ch);
  $url1 = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
  if (strpos($access, '/a/subscribe.php?') !== false) {
    $haha = explode('<a href="', $access);
    //$haha2 = null;
    //echo 1;
    for ($v = 0; $v < count($haha); $v++) {
      if (strpos($haha[$v], '/a/subscribe.php?') !== false) {
        $haha2 = explode('" class=', $haha[$v])[0];
        break;
      }
    }
    //if()
    $link2 = html_entity_decode($haha2);
    // echo $url1;
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com' . $link2 . '&_rdr');
    curl_setopt($ch, CURLOPT_REFERER, $url1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $fl = curl_exec($ch);
    //echo curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    curl_close($ch);
    return $fl;
  } else {
    curl_close($ch);
    return 'error';
    //return $access;
  }
}
function comment($id,$cookie,$msg){
    $mr = curl_init();
    $head = [
    	"Host:mbasic.facebook.com",
    	'sec-ch-ua:"Google Chrome";v="87", " Not;A Brand";v="99", "Chromium";v="87"',
    	"sec-ch-ua-mobile:?1",
    	"cache-control:max-age=0",
    	"upgrade-insecure-requests:1",
    	"dnt:1",
    	"save-data:on",
    	"user-agent:Mozilla/5.0 (Linux; Android 8.1.0; SM-G610F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.101 Mobile Safari/537.36",
    	"accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    	"sec-fetch-site:same-origin",
    	"sec-fetch-mode:navigate",
    	"sec-fetch-user:?1",
    	"sec-fetch-dest:document",
    	"referer:https://mbasic.facebook.com/",
    	"accept-language:vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5",];
    curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/$id");
    curl_setopt($mr, CURLOPT_COOKIE, $cookie);
    curl_setopt($mr, CURLOPT_HTTPHEADER, $head);
    curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($mr, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($mr, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($mr, CURLOPT_FOLLOWLOCATION, TRUE);
    $mr2 = curl_exec($mr);
    $fb_dtsg = explode('"',explode('fb_dtsg" value="',$mr2)[1])[0];
    $jazoest = explode('"',explode('jazoest" value="',$mr2)[1])[0];
    $cmt = explode('"',explode('action="/a/comment.php?',$mr2)[1])[0];
    $text = "fb_dtsg=".$fb_dtsg."&jazoest=".$jazoest."&comment_text=".$msg;
    curl_setopt($mr, CURLOPT_URL, "https://mbasic.facebook.com/a/comment.php?".htmlspecialchars_decode($cmt));
    curl_setopt($mr, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($mr, CURLOPT_POSTFIELDS, $text);
    $mr2 = curl_exec($mr);
    curl_close($mr);
    return $mr2;
}
function likepage($id, $cookie)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/' . $id);
    $head[] = "Connection: keep-alive";
    $head[] = "Keep-Alive: 300";
    $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $head[] = "Accept-Language: en-us,en;q=0.5";
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14');
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect
	:'));
    $page = curl_exec($ch);
    if (explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0]) {
        $get = explode('&amp;refid=', explode('pageSuggestionsOnLiking=1&amp;gfid=', $page)[1])[0];
        $link = 'https://mbasic.facebook.com/a/profile.php?fan&id=' . $id . '&origin=page_profile&pageSuggestionsOnLiking=1&gfid=' . $get . '&refid=17';
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
    } else{
        $response="error";
    }
    curl_close($ch);
    return $response;
}
function share($id, $cookie)
{
    $url  = "https://mbasic.facebook.com/" . $id . "";
    $head = array(
        "Host: mbasic.facebook.com",
        "upgrade-insecure-requests: 1",
        "save-data: on",
        "user-agent: Mozilla/5.0 (Linux; Android 10; SM-A125F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: same-origin",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_ENCODING => TRUE
    ));
    $data = curl_exec($ch);
    if (strpos($data, "xs=deleted") == true) {
        return json_encode(array(
            'error'=> "Cookie die",
        ));
        exit();
    }

    $one = explode("location: ", $data);
    $two = explode("rdr", $one[1]);
    $url = $two[0] . "rdr";
    if ($url == 'rdr') {
    } else {
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_HTTPGET => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => $head,
            CURLOPT_HEADER => true,
            CURLOPT_ENCODING => TRUE
        ));
        $a = curl_exec($ch);
        curl_close($ch);
        $data            = explode('"', explode('<a href="/composer/mbasic/?c_src=share&amp;', $a)[1])[0];
        $l1 = explode('amp;', $data)[0];
        $l2 = explode('amp;', $data)[1];
        $l3 = explode('amp;', $data)[2];
        $l4 = explode('amp;', $data)[3];
        $l5 = explode('amp;', $data)[4];
        $l6 = explode('amp;', $data)[5];
        $l7 = explode('amp;', $data)[6];
        $l8 = explode('amp;', $data)[7];
        $l9 = explode('amp;', $data)[8];
        $l10 = explode('amp;', $data)[9];
        $l11 = explode('amp;', $data)[10];
        $link = "https://mbasic.facebook.com/composer/mbasic/?c_src=share&" . $l1 . "" . $l2 . "" . $l3 . "" . $l4 . "" . $l5 . "" . $l6 . "" . $l7 . "" . $l8 . "" . $l9 . "" . $l10 . "" . $l11 . "";
    }
    #begin
    $head = array(
        "Host: mbasic.facebook.com",
        "cache-control: max-age=0",
        "save-data: on",
        "upgrade-insecure-requests: 1",
        "user-agent: Mozilla/5.0 (Linux; Android 10; SM-A125F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36",
        "referer: https://mbasic.facebook.com/home.php",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: none",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $link,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_ENCODING => TRUE
    ));
    $data = curl_exec($ch);
    curl_close($ch);
    $a            = explode('" id="composer_form"', explode('<form method="post" action="', $data)[1])[0];
    $a1 = explode('amp;', $a)[0];
    $a2 = explode('amp;', $a)[1];
    $a3 = explode('amp;', $a)[2];
    $a4 = explode('amp;', $a)[3];
    $link2 = "https://mbasic.facebook.com" . $a1 . "" . $a2 . "" . $a3 . "" . $a4 . "&ref=dbl";
    $fb_dtsg            = explode('" autocomplete="off"', explode('name="fb_dtsg" value="', $data)[1])[0];
    $jazoest            = explode('" autocomplete="off"', explode('name="jazoest" value="', $data)[1])[0];
    $target            = explode('"', explode('name="target" value="', $data)[1])[0];
    $csid            = explode('"', explode('name="csid" value="', $data)[1])[0];
    $privacyx            = explode('"', explode('name="privacyx" value="', $data)[1])[0];
    $cver            = explode('"', explode('name="cver" value="', $data)[1])[0];
    $m            = explode('"', explode('name="m" value="', $data)[1])[0];
    $shared_from_post_id            = explode('"', explode('name="shared_from_post_id" value="', $data)[1])[0];
    $cscr            = explode('"', explode('name="c_src" value="', $data)[1])[0];
    $referrer            = explode('"', explode('name="referrer" value="', $data)[1])[0];
    $ctype            = explode('"', explode('name="ctype" value="', $data)[1])[0];
    $sid            = explode('"', explode('name="sid" value="', $data)[1])[0];
    $waterfall_source            = explode('"', explode('name="waterfall_source" value="', $data)[1])[0];
    #break;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $t = date('d-m-Y | H:i:s');
    $data = "comment=&m=oneclick&privacyx=" . $privacyx . "&sid=" . $sid . "&shareID=" . $sid . "&fs=1&fr=null&internal_preview_image_id=null&should_share_post=false&direct=true&_ft_=" . $l11 . "&fb_dtsg=" . $fb_dtsg . "&jazoest=" . $jazoest . "__dyn=1KQEGiFo525Ujwh8-F42mml3onxG6UO3m2i5UfXwNwTwKwSwMxWUW16wZxm6Uhx6485-0SUhxm3O0AE8o11E52q3q5U2nweS787S78K1Jwt8-0lm68WUS2F0EU6i12wm8qwk888C0NEeo5Wq3q0H8-7E2swp82vwAwmE2ewnE2Lw5dw&__csr=&__req=7&__a=AYmQRaSRpckx8Ugg8YkSOfYUUczZWHGSt_e3GRCVZ-yzwoxI0JMFbt_4bf2bG-XPk4FOLrTs5QEGOofdlpo6f5hUReNVHgYej0SSg1hYsLZoMQ&__user=" . $target . "";
    $header = array(
        "Host: m.facebook.com",
        "content-length: " . strlen($data),
        "origin: https://m.facebook.com",
        "x-requested-with: XMLHttpRequest",
        "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Kiwi Chrome/68.0.3438.0 Safari/537.36",
        "x-response-format: JSONStream",
        "content-type: application/x-www-form-urlencoded",
        "accept: */*",
        "referer: https://m.facebook.com/"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://m.facebook.com/a/sharer.php',
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_ENCODING => TRUE
    ));
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function joingroup($id, $cookie)
{
    $url  = "https://mbasic.facebook.com/groups/" . $id . "";
    $head = array(
        "Host: mbasic.facebook.com",
        "upgrade-insecure-requests: 1",
        "save-data: on",
        "user-agent: Mozilla/5.0 (Linux; Android 10; SM-A125F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: same-origin",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_ENCODING => TRUE
    ));
    $a = curl_exec($ch);
    if (strpos($a, "xs=deleted") == true) {
        return json_encode(array(
            'error'=> "Cookie die",
        ));
        exit();
    }
    $data            = explode('"', explode('/a/group/join/', $a)[1])[0];
    $l1 = explode('amp;', $data)[0];
    $l2 = explode('amp;', $data)[1];
    $l3 = explode('amp;', $data)[2];
    $fb_dtsg            = explode('" autocomplete="off"', explode('name="fb_dtsg" value="', $a)[1])[0];
    $jazoest            = explode('" autocomplete="off"', explode('name="jazoest" value="', $a)[1])[0];

    $link = "https://mbasic.facebook.com/a/group/join/" . $l1 . "" . $l2 . "" . $l3 . "";
    if ($link == 'https://mbasic.facebook.com/a/group/join/') {
    } else {
        $data = "fb_dtsg=" . $fb_dtsg . "&jazoest=" . $jazoest . "";
        $header = array(
            "Host: mbasic.facebook.com",
            "content-length: " . strlen($data),
            "cache-control: max-age=0",
            "origin: https://mbasic.facebook.com",
            "upgrade-insecure-requests: 1",
            "content-type: application/x-www-form-urlencoded",
            "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Kiwi Chrome/68.0.3438.0 Safari/537.36",
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
            "referer: " . $url . ""
        );
        $ch   = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_COOKIE => $cookie,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_ENCODING => TRUE,
            CURLOPT_FOLLOWLOCATION => true
        ));
        $cc = curl_exec($ch);
        $location = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);
    }
    return $cc;
}

function reaction_cmt($id, $idfb, $type, $cookie)
{
    $url  = "https://mbasic.facebook.com/" . $id . "";
    $head = array(
        "Host: mbasic.facebook.com",
        "upgrade-insecure-requests: 1",
        "save-data: on",
        "user-agent: Mozilla/5.0 (Linux; Android 10; SM-A125F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Mobile Safari/537.36",
        "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*" . "/" . "*;q=0.8,application/signed-exchange;v=b3;q=0.9",
        "sec-fetch-site: same-origin",
        "sec-fetch-mode: navigate",
        "sec-fetch-user: ?1",
        "sec-fetch-dest: document",
        "accept-language: vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5"
    );
    $ch   = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HTTPGET => true,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => $head,
        CURLOPT_HEADER => true,
        CURLOPT_COOKIE => $cookie,
        CURLOPT_ENCODING => TRUE
    ));
    $data = curl_exec($ch);
    $one = explode("location: ", $data);
    $two = explode("rdr", $one[1]);
    $url = $two[0] . "rdr";
    if ($url == 'rdr') {
    } else {
        $idpost = explode('&id=', $url)[0];
        $idvictim = explode('&id=', $url)[1];
        curl_close($ch);
        if (strpos($data, "xs=deleted") == true) {
            //print "\033[1;37m→\033[1;31m Die Cookie !!!\n";
            //exit();
        }
        $head = array(
            "Host: mbasic.facebook.com",
            "cache-control: max-age=0",
            "sec-ch-ua-mobile: ?1",
            "save-data: on",
            "upgrade-insecure-requests: 1",
            "user-agent: Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.72 Mobile Safari/537.36",
            "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
            "sec-fetch-site: none",
            "sec-fetch-mode: navigate",
            "sec-fetch-user: ?1",
            "sec-fetch-dest: document"
        );
        $ch   = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'https://mbasic.facebook.com/reactions/picker/?ft_id=' . $id . '&origin_uri=https://mbasic.facebook.com/' . $idvictim . '/posts/' . $idpost . '/?app=fbl&fbt_id=' . $id . '&lul&av=' . $idfb . '&__tn__=R',
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_HTTPGET => true,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER => $head,
            CURLOPT_HEADER => true,
            CURLOPT_COOKIE => $cookie,
            CURLOPT_ENCODING => TRUE
        ));
        $cx = curl_exec($ch);
        $haha = explode('<a href="', $cx);
        if ($type == 'LOVE') {
            $haha2 = explode('" style="display:block"', $haha[2])[0];
        } else if ($type == 'CARE') {
            $haha2 = explode('" style="display:block"', $haha[3])[0];
        } else if ($type == 'HAHA') {
            $haha2 = explode('" style="display:block"', $haha[4])[0];
        } else if ($type == 'WOW') {
            $haha2 = explode('" style="display:block"', $haha[5])[0];
        } else if ($type == 'SAD') {
            $haha2 = explode('" style="display:block"', $haha[6])[0];
        } else {
            $haha2 = explode('" style="display:block"', $haha[7])[0];
        }
        if ($type == 'LIKE') {
            $data            = explode('"', explode('<a href="/ufi/reaction/?ft_ent_identifier=', $cx)[1])[0];
            curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com/ufi/reaction/?ft_ent_identifier=' . htmlspecialchars_decode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $x=curl_exec($ch);
            curl_close($ch);
        } else {
            $link2 = html_entity_decode($haha2);
            curl_setopt($ch, CURLOPT_URL, 'https://mbasic.facebook.com' . $link2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $x = curl_exec($ch);
            $location = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
            curl_close($ch);
        }
    }
    return $x;
}
?>