<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('studystudio.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('s0949759@monmouth.edu');

//Database login details here:
//hostname, user name, password, database name and table name
//Script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'users',
                      /*table name*/'ssusers');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('aGdVA2Kr864o05T');

?>