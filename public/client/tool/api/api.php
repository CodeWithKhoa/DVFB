<?php 
require($_SERVER['DOCUMENT_ROOT'].'/config/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/fb/api/facebook.php');
function cauhinhtds(){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/?fields=run&id='.$_SESSION['id'].'&access_token='.$_SESSION['tokentds'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $js=json_decode($response,true);
    if($js['error']){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=>$js['error']
        )));
    } else{
        $_SESSION['cauhinh']=true;
    }
}
function cauhinhttc(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tuongtaccheo.com/cauhinh/datnick.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: tuongtaccheo.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'origin: https://tuongtaccheo.com',
        'pragma: no-cache',
        'referer: https://tuoengtaccheo.com/cauhinh/facebook.php',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'x-requested-with: XMLHttpRequest',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $_SESSION['cookiettc']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'iddat%5B%5D='.$_SESSION['id'].'&loai=fb');
    
    $response = curl_exec($ch);
    
    curl_close($ch);
    if($response!='1'){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Bạn Chưa Thêm ".$_SESSION['id']." Vào Cấu Hình"
        )));
    }
}
function getjobtds(){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/?fields='.$_SESSION['job'].'&access_token='.$_SESSION['tokentds'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    return $response;

}
function getjobttc(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tuongtaccheo.com/kiemtien'.$_SESSION['job'].'getpost.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: tuongtaccheo.com',
        'accept: application/json, text/javascript, */*; q=0.01',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'pragma: no-cache',
        'referer: https://tuongtaccheo.com/kiemtien/',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'x-requested-with: XMLHttpRequest',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $_SESSION['cookiettc']);
    
    $response = curl_exec($ch);
    
    curl_close($ch);
    return $response;
}
function nhanjobtds(){
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://traodoisub.com/api/coin/?type='.strtoupper($_SESSION['loaijob']).'&id='.$_SESSION['idjob']['id'].'&access_token='.$_SESSION['tokentds'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $js=json_decode($response,true);
    if(isset($js['error'])){
        return "loi";
    } else {
        $_SESSION['tongxujob']=$js['data']['xu'];
        $_SESSION['nhanxujob']=$js['data']['msg'];
        return "success";
    }
}
function nhanjobttc(){
    if($_SESSION['job']=='/camxuccheo/' or $_SESSION['job']=='/camxuccheobinhluan/'){
        $arraydata=array(
            'id'=> $_SESSION['idjob']['idpost'],
            'loaicx'=> strtoupper($_SESSION['loaijob'])
        );
    } else {
        $arraydata=array(
            'id'=> $_SESSION['idjob']['idpost'],
        );
    }
    $data=http_build_query($arraydata);
    $ch = curl_init();
    $url='https://tuongtaccheo.com/kiemtien'.$_SESSION['job'].'nhantien.php';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: tuongtaccheo.com',
        'accept: */*',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'origin: https://tuongtaccheo.com',
        'pragma: no-cache',
        'referer: https://tuongtaccheo.com/kiemtien/camxuccheobinhluan/',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
        'x-requested-with: XMLHttpRequest',
    ]);
    curl_setopt($ch, CURLOPT_COOKIE, $_SESSION['cookiettc']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    
    $response = curl_exec($ch);
    curl_close($ch);
    $js=json_decode($response,true);
    if(isset($js['error'])){
        return "loi";
    } else {
        $_SESSION['tongxujob']=explode(" xu",explode("cộng ",$js['mess'])[1])[0]+$_SESSION['xuttc'];
        $_SESSION['nhanxujob']=explode("cộng ",$js['mess'])[1];
        return "success";
    }
}
if($_POST['tool_type']){
    if($_POST['tool_type']=="tds"){
        $loai='traodoisub';
    } else if($_POST['tool_type']=='ttc') {
        $loai='tuongtaccheo';
    } else {
        exit("Lỗi hệ thống.");
    }
    $add=enc($loai,$_SESSION['key'],"trandangkhoa2006");
    setcookie("type", $add, time() + (86400 * 3), "/"); // Lưu trong 30 ngày
    exit(json_encode(array(
        "status"=>"success",
        "msg"=>$add
    )));
}
if (isset($_POST['stop'])) {
    $username=$_SESSION['username'];
    if (isset($_COOKIE['type'])) {
        session_unset();
        setcookie('type', null, -1, '/');
    }
    $_SESSION['username']=$username;
}

if ($_POST['tokenttc']){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://tuongtaccheo.com/logintoken.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: tuongtaccheo.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'pragma: no-cache',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
    ]);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "access_token=".$_POST['tokenttc']);
    $response = curl_exec($ch);
    
    curl_close($ch);
    $_SESSION['cookiettc']='PHPSESSID'.explode('path=/',explode('PHPSESSID',$response)[1])[0];
    $json= urldecode(explode('%0D%0A%0D%0A',urlencode($response))[1]);
    $js=json_decode($json,true);
    if($js["status"]=='fail'){
        exit("loi");
    } else {
        $_SESSION['userttc']=$js['data']['user'];
        $_SESSION['xuttc']=$js['data']['sodu'];
        exit(json_encode(array(
            "user"=>$js['data']['user'],  
            "xu"=>$js['data']['sodu'], 
        )));
    }
}

if ($_POST['tokentds']){
    $tokentds=$_POST['tokentds'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://traodoisub.com/api/?fields=profile&access_token='.$tokentds);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'authority: traodoisub.com',
        'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
        'accept-language: vi-VN,vi;q=0.9,en-US;q=0.8,en;q=0.7',
        'cache-control: no-cache',
        'pragma: no-cache',
        'sec-ch-ua: "Not/A)Brand";v="99", "Google Chrome";v="115", "Chromium";v="115"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: document',
        'sec-fetch-mode: navigate',
        'sec-fetch-site: none',
        'sec-fetch-user: ?1',
        'upgrade-insecure-requests: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36',
    ]);
    
    $response = curl_exec($ch);
    $js=json_decode($response,true);
    curl_close($ch);
    if(isset($js['error'])){
        exit("loi");
    } else {
        $_SESSION['tokentds']=$tokentds; 
        $_SESSION['usertds']=$js['data']['user'];
        $_SESSION['xutds']=$js['data']['xu'];
        $_SESSION['xutdsdie']=$js['data']['xudie'];
        exit(json_encode(array(
            "user"=>$js['data']['user'],  
            "xu"=>$js['data']['xu'], 
        )));
    }
}

if ($_POST['type'] == "runttc") {
    $cookie = $_POST['cookiefb'];
    $like = $_POST['like'];
    $camxuc = $_POST['camxuc'];
    $follow = $_POST['follow'];
    $comment = $_POST['comment'];
    $share = $_POST['share'];
    $cxcmt = $_POST['cxcmt'];
    $likepage = $_POST['likepage'];
    $joingr = $_POST['joingr'];
    $delay = $_POST['delay'];
    $list_job=[];
    if($cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Vui lòng nhập Cookie"
        )));
    }
    $check=json_decode(thongtin($cookie),true);
    if(isset($check['error'])){
        exit(json_encode(array(
            "status"=>"error",
			'msg'=> "Cookie die",
		)));
    } else {
        $_SESSION['cookiefb']=$cookie;
        $_SESSION['name']=$check['name'];
        $_SESSION['id']=$check['id'];
        $_SESSION['loaitk']=$check['loai'];
    }
    if($like!="false"){
        array_push($list_job,"/");
    }
    if($camxuc!="false"){
        array_push($list_job,"/camxuccheo/");
    } 
    if($follow!="false"){
        array_push($list_job,"/subcheo/");
    }
    if($comment!="false"){
        array_push($list_job,"/cmtcheo/");
    }
    if($share!="false"){
        array_push($list_job,"/sharecheo/");
    }
    if($cxcmt!="false"){
        array_push($list_job,"/camxuccheobinhluan/");
    }
    if($likepage!="false"){
        array_push($list_job,"/likepagecheo/");
    }
    if($joingr!="false"){
        array_push($list_job,"/thamgianhomcheo/");
    }
    if(count($list_job)==0){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập ít nhất 1 job"
        )));
    }
    if($delay==""){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Vui lòng nhập Delay"
        )));
    }
    if(!is_numeric($delay)){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập delay phải là con số"
        )));
    }
    if($delay=="0"){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập delay phải khác 0"
        )));
    }
    $_SESSION["list_job"]=$list_job;
    $_SESSION['delay']=$delay;
    cauhinhttc();
    exit(json_encode(array(
        "status"=>"success",
        "msg"=> "Đã Cấu Hình Thành Công"
    )));
    sleep(4);
}

if ($_POST['type'] == "runtds") {
    $cookie = $_POST['cookiefb'];
    $like = $_POST['like'];
    $camxuc = $_POST['camxuc'];
    $follow = $_POST['follow'];
    $comment = $_POST['comment'];
    $share = $_POST['share'];
    $cxcmt = $_POST['cxcmt'];
    $likepage = $_POST['likepage'];
    $joingr = $_POST['joingr'];
    $delay = $_POST['delay'];
    $list_job=[];
    if($cookie==""){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Vui lòng nhập Cookie"
        )));
    }
    $check=json_decode(thongtin($cookie),true);
    if(isset($check['error'])){
        exit(json_encode(array(
            "status"=>"error",
			'msg'=> "Cookie die",
		)));
    } else {
        $_SESSION['cookiefb']=$cookie;
        $_SESSION['name']=$check['name'];
        $_SESSION['id']=$check['id'];
        $_SESSION['loaitk']=$check['loai'];
    }
    if($like!="false"){
        array_push($list_job,"like");
    }
    if($camxuc!="false"){
        array_push($list_job,"reaction");
    } 
    if($follow!="false"){
        array_push($list_job,"follow");
    }
    if($comment!="false"){
        array_push($list_job,"comment");
    }
    if($share!="false"){
        array_push($list_job,"share");
    }
    if($cxcmt!="false"){
        array_push($list_job,"reactcmt");
    }
    if($likepage!="false"){
        array_push($list_job,"page");
    }
    if($joingr!="false"){
        array_push($list_job,"group");
    }
    if(count($list_job)==0){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập ít nhất 1 job"
        )));
    }
    if($delay==""){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Vui lòng nhập Delay"
        )));
    }
    if(!is_numeric($delay)){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập delay phải là con số"
        )));
    }
    if($delay=="0"){
        exit(json_encode(array(
            "status"=>"error",
            "msg"=> "Nhập delay phải khác 0"
        )));
    }
    $_SESSION["list_job"]=$list_job;
    $_SESSION['delay']=$delay;
    cauhinhtds();
    exit(json_encode(array(
        "status"=>"success",
        "msg"=> "Đã Cấu Hình Thành Công"
    )));
}
if(!$_SESSION['stt']){
    $_SESSION['stt']=1;
}
if(!$_SESSION['sttjob']){
    $_SESSION['sttjob']=0;
}
if ($_POST['type'] == 'worktds') {
    cauhinhtds();
    while (true) {
        if (!isset($_SESSION['job']) or $_SESSION['job']=="") {
            $_SESSION['sljob'] = count($_SESSION['list_job']) - 1;
            
            if ($_SESSION['sttjob'] > $_SESSION['sljob']) {
                $_SESSION['sttjob'] = 0;
            }

            $_SESSION['job'] = $_SESSION['list_job'][$_SESSION['sttjob']];
            $_SESSION['sttjob']++;
            
            $_SESSION['listjob'] = json_decode(getjobtds(), true);
            if (isset($_SESSION['listjob']['error'])) {
                $_SESSION['listjob'] = null;
                $_SESSION['job'] = null;
                continue; // Quay lại để thử lại
            }
            
            $_SESSION['soluongjob'] = count($_SESSION['listjob']) - 1;
            $_SESSION['idjob'] = $_SESSION['listjob'][$_SESSION['soluongjob']];
            $_SESSION['soluongjob']--;
        } else if ($_SESSION['listjob']) {
            if ($_SESSION['soluongjob'] < 0) {
                $_SESSION['listjob'] = null;
                $_SESSION['job'] = null;
                continue; // Quay lại để thử lại
            }
            
            $_SESSION['idjob'] = $_SESSION['listjob'][$_SESSION['soluongjob']];
            $_SESSION['soluongjob']--;
        }
        
        $check = json_decode(thongtin($_SESSION['cookiefb']), true);
        if (isset($check['error'])) {
            exit(json_encode(array(
                "error" => "Cookie Die"
            )));
        }
        
        if($_SESSION['job']=="reaction"){
            $_SESSION['loaijob']=$_SESSION['idjob']['type'];
            cxpro5($_SESSION['idjob']['id'], $_SESSION['loaijob'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="reactcmt") {
            $_SESSION['loaijob']=$_SESSION['idjob']['type']."CMT";
            cxcmtpro5($_SESSION['idjob']['id'], $_SESSION['loaijob'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="like") {
            $_SESSION['loaijob']=strtoupper($_SESSION['job']);
            cxpro5($_SESSION['idjob']['id'], $_SESSION['loaijob'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=='follow'){
            $_SESSION['loaijob']=strtoupper($_SESSION['job']);
            followpro5($_SESSION['idjob']['id'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="comment") {
            $_SESSION['loaijob']=strtoupper($_SESSION['job']);
            commentpro5($_SESSION['idjob']['id'], $_SESSION['idjob']['msg'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="page") {
            $_SESSION['loaijob']=strtoupper($_SESSION['job']);
            likepagepro5($_SESSION['idjob']['id'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="group") {
            $_SESSION['loaijob']=strtoupper($_SESSION['job']);
            grouppro5($_SESSION['idjob']['id'], $_SESSION['cookiefb']);
        }
        
        $nhan=nhanjobtds();
        if($nhan=='success'){
            $trangthai='Success';
        } else {
            $trangthai='Error';
        }
        
        exit(json_encode(array(
            "row" => $_SESSION['stt']++,
            "id" => $_SESSION['idjob']['id'],
            "type" => $_SESSION['loaijob'],
            "status" => $trangthai,
            "xunhan" => $_SESSION['nhanxujob'],
            "xu" => $_SESSION['tongxujob'],
            "note" => $_SESSION['idjob']['msg'],
            "time" => date("H:i:s d/m/Y")
        )));
    }
}
if ($_POST['type'] == 'workttc') {
    cauhinhttc();
    while (true) {
        if (!isset($_SESSION['job']) or $_SESSION['job']=="") {
            $_SESSION['sljob'] = count($_SESSION['list_job']) - 1;
            
            if ($_SESSION['sttjob'] > $_SESSION['sljob']) {
                $_SESSION['sttjob'] = 0;
            }

            $_SESSION['job'] = $_SESSION['list_job'][$_SESSION['sttjob']];
            $_SESSION['sttjob']++;
            $aaa=getjobttc();
            $_SESSION['listjob'] = json_decode($aaa, true);
            if ($aaa=='[]') {
                $_SESSION['listjob'] = null;
                $_SESSION['job'] = null;
                continue; // Quay lại để thử lại
            }
            
            $_SESSION['soluongjob'] = count($_SESSION['listjob']) - 1;
            $_SESSION['idjob'] = $_SESSION['listjob'][$_SESSION['soluongjob']];
            $_SESSION['soluongjob']--;
        } else if ($_SESSION['listjob']) {
            if ($_SESSION['soluongjob'] < 0) {
                $_SESSION['listjob'] = null;
                $_SESSION['job'] = null;
                continue; // Quay lại để thử lại
            }
            
            $_SESSION['idjob'] = $_SESSION['listjob'][$_SESSION['soluongjob']];
            $_SESSION['soluongjob']--;
        }
        
        $check = json_decode(thongtin($_SESSION['cookiefb']), true);
        if (isset($check['error'])) {
            exit(json_encode(array(
                "error" => "Cookie Die"
            )));
        }
        
        if($_SESSION['job']=="/camxuccheo/"){
            $_SESSION['loaijob']=$_SESSION['idjob']['loaicx'];
            cxpro5($_SESSION['idjob']['idpost'], strtoupper($_SESSION['loaijob']), $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="/camxuccheobinhluan/") {
            $_SESSION['loaijob']=$_SESSION['idjob']['loaicx']."CMT";
            cxcmtpro5($_SESSION['idjob']['idpost'], strtoupper($_SESSION['loaijob']), $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="/") {
            $_SESSION['loaijob']=strtoupper('LIKE');
            cxpro5($_SESSION['idjob']['idpost'], $_SESSION['loaijob'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=='/subcheo/'){
            $_SESSION['loaijob']=strtoupper('FOLLOW');
            followpro5($_SESSION['idjob']['idpost'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="/cmtcheo/") {
            $_SESSION['loaijob']=strtoupper('COMMENT');
            commentpro5($_SESSION['idjob']['idpost'], $_SESSION['idjob']['nd'][0], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="/likepagecheo/") {
            $_SESSION['loaijob']=strtoupper('PAGE');
            likepagepro5($_SESSION['idjob']['idpost'], $_SESSION['cookiefb']);
        } else if($_SESSION['job']=="/thamgianhomcheo/") {
            $_SESSION['loaijob']=strtoupper('GROUP');
            grouppro5($_SESSION['idjob']['idpost'], $_SESSION['cookiefb']);
        }
        
        $nhan=nhanjobttc();
        if($nhan=='success'){
            $trangthai='Success';
        } else {
            $trangthai='Error';
        }
        
        exit(json_encode(array(
            "row" => $_SESSION['stt']++,
            "id" => $_SESSION['idjob']['idpost'],
            "type" => $_SESSION['loaijob'],
            "status" => $trangthai,
            "xunhan" => $_SESSION['nhanxujob'],
            "xu" => $_SESSION['tongxujob'],
            "note" => $_SESSION['idjob']['nd'][0],
            "time" => date("H:i:s d/m/Y")
        )));
    }
}

