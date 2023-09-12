<?php 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
 function labels_menu(){

    $lmsg = array(  

        1 => "New",
        2 => "Edit",
        3 => "Approve",
        4 => "Disapprove",
        5 => "Trash",
        6 => "Preview",
        7 => "Waiting for approval",
        8 => "Default",
        9 => "Menus",
        10 => "Back",
        11 => "Media",
        12 => "Category",
        13 => "Blogs",
        14 => "Cancel",
        15 => "Save",
        16 => "Approve Status",
        17 => "View only Set",
        18 => "View only unset",
        19 => "View All",
        20 => "Latest News",
        21 => "Latest  Press Releases",
        22 => "Unset Default",
        23 => "Topic",
        24 => "Glossary",
        25 => "View",
        26 => "CMS Activate",
        27 => "Experience Certificate",
        28 => "Salary Certificate",
        29 => "Employee Status",
        30 => "Reject",
        31 => "OTP Enable",
        32 => "Import",
        33 => "Export",
        34 => "Apply DDL/DCL",
        35 => "My Account",
        36 => "Leave",
);

return  $lmsg;

}



function incre($id){

    $id = $id+1;

    return $id;
}


 function getTopNavCat(){
    $result=DB::table('menus')
    ->where(['publish'=>1])
    ->orderBy('ordering', 'asc')
            ->get();
            $arr=[];
    foreach($result as $row){
        $arr[$row->id]['name']=$row->name;
        $arr[$row->id]['parent']=$row->parent;
        $arr[$row->id]['path']=$row->path;
        $arr[$row->id]['article_id']=$row->article_id;
    }
    $str=buildTreeView($arr,0);
    return $str;
}

$html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul id="mySidenav" class="sidenav" data-menu-style="horizontal">';
				}else{
					$html.='<ul class="sub-menu" style="display: none;">';
				}
				
			}
			if($level==$prelevel){
				$html.='';
			}
			// $html.='<li><a href="'.$data['path'].'">'.$data['name'].'</a>';
            // $html.='<li><a href="'.$data['name'].'/'.Crypt::encryptString($data['article_id']).'">'.$data['name'].'</a>';
            // $html.='<li><a href="'.$data['name'].'&'.Crypt::encryptString($data['article_id']).'">'.$data['name'].'</a>';
           
            if($data['name'] == 'Home'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }
            elseif($data['name'] == 'Regions'){
                $html.=' <a href="#">'.$data['name'].'</a>';
            }
            elseif($data['name'] == 'Login'){

                if(Session::has('EMPUSERNAME') || Session::has('BOUSERNAME') || Session::has('FOUSERNAME') || Session::has('COMMUSERNAME')){

                    $html .= '<ul class="sub-menu">

                
                            <li>

                            <a href="/logout">Logout</a>

                        </li>

                        </ul>';

                }else{
                     $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
                }
                          

            }
            
            
            elseif($data['name'] == 'Contact'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }elseif($data['name'] == 'Africa'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }
            elseif($data['name'] == 'Asia'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }
            elseif($data['name'] == 'Europe'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }
            elseif($data['name'] == 'Americas'){
                $html.='<a href="'.$data['path'].'">'.$data['name'].'</a>';
            }                  
            else{
                $html.='<a href="/'.$data['name'].'&'.Crypt::encryptString($data['article_id']).'">'.$data['name'].'</a>';
            }
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</ul></ul>';
	}
	return $html;
}


function rename_win($oldfile,$newfile) {
    if (!rename($oldfile,$newfile)) {
       if (copy ($oldfile,$newfile)) {
          unlink($oldfile);
          return TRUE;
       }
       return FALSE;
    }
    return TRUE;
 }


 function userIP(){

    $userIP = $_SERVER['REMOTE_ADDR'];

    $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$userIP);
    // $res = file_get_contents('https://www.iplocate.io/api/lookup/103.97.96.192');
    $res = json_decode($res);

    return $res->postal_code;
   
}

function dateDiffInDays($date1, $date2) {  
       $diff = strtotime($date2) - strtotime($date1); 
           return abs(round($diff / 86400)); 
        }