<?php
date_default_timezone_set('America/Sao_Paulo');

//QUERY LOGADO
@$user_log = "select * from user where user ='$logado'";
$result = $conn->query($user_log);
$login = $result->fetch_assoc();

$userid = $login['id'];
$username = $login['user'];
$useremail = $login['email'];
$usergender = $login['gender'];
$userdescr = $login['descr'];
$usercity = $login['city'];
$userstate = $login['state'];
$myage = $login['age'];
$mycontact = $login['contact'];


//MY DATES
@$myevents = "select * from dates where creator_id ='$userid' ORDER BY `id` DESC ";
$result1 = $conn->query($myevents);
$myevents_ = $result1->fetch_assoc();
$myevents_desc = $myevents_['date_desc'];
$myevents_city = $myevents_['city'];
$myevents_state = $myevents_['state'];

//AVATAR
@$avatar = "select * from photos where userid ='$userid' ORDER BY `id` DESC ";
$result2 = $conn->query($avatar);
$useravatar = $result2->fetch_assoc();
$myavatar = $useravatar['name'];

//MYALBUM
@$photos = "select * from album where userid ='$userid' ORDER BY `id` DESC LIMIT 3";
$result3 = $conn->query($photos);
$useralbum = $result3->fetch_assoc();
$myalbum = $useralbum['name'];

//DATES INFO

@$date_info_id = $_GET['dateid'];
@$events_info = "select * from dates where id ='$date_info_id' ";
$result4 = $conn->query($events_info);
$date_info = $result4->fetch_assoc();
$date_info_desc = $date_info['date_desc'];
$date_info_city = $date_info['city'];
$date_info_state = $date_info['state'];
$date_info_creator = $date_info['creator_desc'];
$date_info_creator_id = $date_info['creator_id'];

//USERS DATES INFO
@$user_info = "select * from user where id ='$date_info_creator_id' ";
$result5 = $conn->query($user_info);
$userdateinfo = $result5->fetch_assoc();

//$username = $userdateinfo['user'];

//AVATAR USER DATE
@$avatar_date_info = "select * from photos where userid ='$date_info_creator_id' ORDER BY `id` DESC ";
$result6 = $conn->query($avatar_date_info);
$useravatar_date = $result6->fetch_assoc();

//MYALBUM DATE
@$photos_date = "select * from album where userid ='$date_info_creator_id' ORDER BY `id` DESC LIMIT 3";
$result7 = $conn->query($photos_date);
$useralbum_date = $result7->fetch_assoc();

// BUSCA DE DATES

@$a1 = $_GET['a1'];
@$a2 = $_GET['a2'];
@$a3 = $_GET['a3'];
@$a4 = $_GET['a4'];

@$busca_date = $_GET['dateid'];
@$busca_date_info = "select * from dates where state ='$a1' and city ='$a2' and creator_gender ='$a3' and type ='$a4' ORDER BY `id` DESC";
$result8 = $conn->query($busca_date_info);
$date_info_results = $result8->fetch_assoc();
//$date_search_creator_id = $date_info_results['creator_id'];

//USERS DATES INFO BUSCA
//@$v1 = "select * from user where id ='$date_search_creator_id' ";
//$result9 = $conn->query($v1);
//$x1 = $result9->fetch_assoc();


//NOTIFICAÇÕES


@$noti = "select * from notifications WHERE creator_id ='$userid' OR int_id ='$userid' ORDER BY `id` DESC";
$result9 = $conn->query($noti);
$notifications = $result9->fetch_assoc();


//}else{
    //if ($notifications['int_id'] = $userid ) {
       // $aviso= "te odeia";  }

//}

@$user_info_noti1 = "select * from user where id ='$date_info_creator_id' ";
$result5 = $conn->query($user_info);
$userdateinfo = $result5->fetch_assoc();

//WALLET

$walletverifica = "SELECT * from wallet where userid = '$userid'";
$resultwallet = $conn->query($walletverifica);
$mywallet = $resultwallet->fetch_assoc();
$mycredits = $mywallet['credits'];

//INFORMAÇÃO PARA OS PERFIS


//DATES INFO

@$info_profile = $_GET['xid'];
@$data_profile = "select * from user where id ='$info_profile' ";
$result10 = $conn->query($data_profile);
$data_info_profile = $result10->fetch_assoc();
$date_profile_desc = $data_info_profile['descr'];
$date_profile_city = $data_info_profile['city'];
$date_profile_state = $data_info_profile['state'];
$date_profile_age = $data_info_profile['age'];
$date_profile_name = $data_info_profile['user'];
$date_profile_contact = $data_info_profile['contact'];

// DATES INFO AVATAR
@$avatar2 = "select * from photos where userid ='$info_profile' ORDER BY `id` DESC ";
$result11 = $conn->query($avatar2);
$useravatar2 = $result11->fetch_assoc();
$myavatar2 = $useravatar2['name'];

//DATES INFO MYALBUM
@$photos2 = "select * from album where userid ='$info_profile' ORDER BY `id` DESC LIMIT 3";
$result12 = $conn->query($photos2);
$useralbum2 = $result12->fetch_assoc();
$myalbum2 = $useralbum2['name'];

?>