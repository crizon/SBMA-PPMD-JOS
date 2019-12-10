<?php  
require_once('../../DBcontroller.php');


$XID =  $_POST['xID'];
$XJONUM = $_POST['xJO'];
$XSECTION = $_POST['xSection'];
$XNATURE = $_POST['xNature'];
$XLOCATION = $_POST['xLocation'];
$XDS = $_POST['xDateStart'];
$XTS = $_POST['xTimeStart'];
$XDC = $_POST['xDateComp'];
$XTC = $_POST['xTimeComp'];
$XRC = $_POST['xRequestingCompany'];
$XSTATUS = $_POST['xStatus'];
$XCP = $_POST['xContactPerson'];
$XRB = $_POST['xReceivedBy'];
$XEMPLOYEES = $_POST['xEmployees'];
$XFB = $_POST['xFromBLDG'];
$XTB = $_POST['xToBLDG'];

$XPAR = $_POST['xPAR'];
$XPAR_Q = $_POST['xPAR_Q'];
$XICS = $_POST['xICS'];
$XICS_Q = $_POST['xICS_Q'];
$XI_F = $_POST['xI_F'];
$XI_F_Q = $_POST['xI_F_Q'];
$XPO = $_POST['xPO'];

$XFORMS = $_POST['xForms'];
$XITEMS = $_POST['xItems'];
$XREMARKS = $_POST['xRemarks'];

$newSTATUS = 1;
$newerSTATUS = 2;
$newestSTATUS = 3;




if(isset($_POST['submits'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET JOB_ORDER_num=:ZJO,
							SECTION=:Zsection,
							NATURE_OF_WORK=:Znature,
							LOCATION=:Zlocation,
							DATE_STARTED=:ZDS,
							TIME_STARTED=:ZTS,
							DATE_COMPLETED=:ZDC,
							TIME_COMPLETED=:ZTC,
							REQUESTING_COMPANY_DEPARTMENT=:ZRC,
							STATUS=:ZSTATUS,
							CONTACT_PERSON=:ZCP,
							RECEIVED_BY=:ZRB,
							EMPLOYEES=:ZEMPLOYEES,
							DATE_TIME_RECEIVED=:ZDTR,
							FROM_BLDG=:ZFB,
							TO_BLDG=:ZTB,

							PAR=:ZPAR,
							PAR_QTY=:ZPAR_Q,
							ICS=:ZICS,
							ICS_QTY=:ZICS_Q,
							I_F=:ZI_F,
							I_F_QTY=:ZI_F_Q,
							PO_CONTRACT=:ZPO,
							FORMS=:ZFORMS,
							ITEMS=:ZITEMS,

							REMARKS=:ZREMARKS

							WHERE ID=:ZID");
			

			$newjob->bindparam(':ZJO',$XJONUM);
			$newjob->bindparam(':Zsection',$XSECTION);
			$newjob->bindparam(':Znature',$XNATURE);
			$newjob->bindparam(':Zlocation',$XLOCATION);
			$newjob->bindparam(':ZDS',$XDS);
			$newjob->bindparam(':ZTS',$XTS);
			$newjob->bindparam(':ZDC',$XDC);
			$newjob->bindparam(':ZTC',$XTC);
			$newjob->bindparam(':ZRC',$XRC);
			$newjob->bindparam(':ZSTATUS',$XSTATUS);
			$newjob->bindparam(':ZCP',$XCP);
			$newjob->bindparam(':ZRB',$XRB);
			$newjob->bindparam(':ZEMPLOYEES',$XEMPLOYEES);
			$newjob->bindparam(':ZDTR',$XDTR);
			$newjob->bindparam(':ZFB',$XFB);
			$newjob->bindparam(':ZTB',$XTB);

			$newjob->bindparam(':ZPAR',$XPAR);
			$newjob->bindparam(':ZPAR_Q',$XPAR_Q);
			$newjob->bindparam(':ZICS',$XICS);
			$newjob->bindparam(':ZICS_Q',$XICS_Q);
			$newjob->bindparam(':ZI_F',$XI_F);
			$newjob->bindparam(':ZI_F_Q',$XI_F_Q);
			$newjob->bindparam(':ZPO',$XPO);
			$newjob->bindparam(':ZFORMS',$XFORMS);
			$newjob->bindparam(':ZITEMS',$XITEMS);

			$newjob->bindparam(':ZREMARKS',$XREMARKS);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:index.php');
}





elseif(isset($_POST['inprocess'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET JOB_ORDER_num=:ZJO,
							SECTION=:Zsection,
							NATURE_OF_WORK=:Znature,
							LOCATION=:Zlocation,
							DATE_STARTED=:ZDS,
							TIME_STARTED=:ZTS,
							DATE_COMPLETED=:ZDC,
							TIME_COMPLETED=:ZTC,
							REQUESTING_COMPANY_DEPARTMENT=:ZRC,
							STATUS=:ZSTATUS,
							CONTACT_PERSON=:ZCP,
							RECEIVED_BY=:ZRB,
							DATE_TIME_RECEIVED=:ZDTR,
							FROM_BLDG=:ZFB,
							TO_BLDG=:ZTB,

							PAR=:ZPAR,
							PAR_QTY=:ZPAR_Q,
							ICS=:ZICS,
							ICS_QTY=:ZICS_Q,
							I_F=:ZI_F,
							I_F_QTY=:ZI_F_Q,
							PO_CONTRACT=:ZPO,
							FORMS=:ZFORMS,
							ITEMS=:ZITEMS,

							REMARKS=:ZREMARKS

							WHERE ID=:ZID");
			

			$newjob->bindparam(':ZJO',$XJONUM);
			$newjob->bindparam(':Zsection',$XSECTION);
			$newjob->bindparam(':Znature',$XNATURE);
			$newjob->bindparam(':Zlocation',$XLOCATION);
			$newjob->bindparam(':ZDS',$XDS);
			$newjob->bindparam(':ZTS',$XTS);
			$newjob->bindparam(':ZDC',$XDC);
			$newjob->bindparam(':ZTC',$XTC);
			$newjob->bindparam(':ZRC',$XRC);
			$newjob->bindparam(':ZSTATUS',$XSTATUS);
			$newjob->bindparam(':ZCP',$XCP);
			$newjob->bindparam(':ZRB',$XRB);
			$newjob->bindparam(':ZDTR',$XDTR);
			$newjob->bindparam(':ZFB',$XFB);
			$newjob->bindparam(':ZTB',$XTB);

			$newjob->bindparam(':ZPAR',$XPAR);
			$newjob->bindparam(':ZPAR_Q',$XPAR_Q);
			$newjob->bindparam(':ZICS',$XICS);
			$newjob->bindparam(':ZICS_Q',$XICS_Q);
			$newjob->bindparam(':ZI_F',$XI_F);
			$newjob->bindparam(':ZI_F_Q',$XI_F_Q);
			$newjob->bindparam(':ZPO',$XPO);
			$newjob->bindparam(':ZFORMS',$XFORMS);
			$newjob->bindparam(':ZITEMS',$XITEMS);

			$newjob->bindparam(':ZREMARKS',$XREMARKS);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:index.php');
} 





elseif(isset($_POST['finalize'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET JOB_ORDER_num=:ZJO,
							SECTION=:Zsection,
							NATURE_OF_WORK=:Znature,
							LOCATION=:Zlocation,
							DATE_STARTED=:ZDS,
							TIME_STARTED=:ZTS,
							DATE_COMPLETED=:ZDC,
							TIME_COMPLETED=:ZTC,
							REQUESTING_COMPANY_DEPARTMENT=:ZRC,
							STATUS=:ZSTATUS,
							CONTACT_PERSON=:ZCP,
							RECEIVED_BY=:ZRB,
							DATE_TIME_RECEIVED=:ZDTR,
							FROM_BLDG=:ZFB,
							TO_BLDG=:ZTB,

							PAR=:ZPAR,
							PAR_QTY=:ZPAR_Q,
							ICS=:ZICS,
							ICS_QTY=:ZICS_Q,
							I_F=:ZI_F,
							I_F_QTY=:ZI_F_Q,
							PO_CONTRACT=:ZPO,
							FORMS=:ZFORMS,
							ITEMS=:ZITEMS,

							REMARKS=:ZREMARKS

							WHERE ID=:ZID");
			

			$newjob->bindparam(':ZJO',$XJONUM);
			$newjob->bindparam(':Zsection',$XSECTION);
			$newjob->bindparam(':Znature',$XNATURE);
			$newjob->bindparam(':Zlocation',$XLOCATION);
			$newjob->bindparam(':ZDS',$XDS);
			$newjob->bindparam(':ZTS',$XTS);
			$newjob->bindparam(':ZDC',$XDC);
			$newjob->bindparam(':ZTC',$XTC);
			$newjob->bindparam(':ZRC',$XRC);
			$newjob->bindparam(':ZSTATUS',$newSTATUS);
			$newjob->bindparam(':ZCP',$XCP);
			$newjob->bindparam(':ZRB',$XRB);
			$newjob->bindparam(':ZDTR',$XDTR);
			$newjob->bindparam(':ZFB',$XFB);
			$newjob->bindparam(':ZTB',$XTB);

			$newjob->bindparam(':ZPAR',$XPAR);
			$newjob->bindparam(':ZPAR_Q',$XPAR_Q);
			$newjob->bindparam(':ZICS',$XICS);
			$newjob->bindparam(':ZICS_Q',$XICS_Q);
			$newjob->bindparam(':ZI_F',$XI_F);
			$newjob->bindparam(':ZI_F_Q',$XI_F_Q);
			$newjob->bindparam(':ZPO',$XPO);
			$newjob->bindparam(':ZFORMS',$XFORMS);
			$newjob->bindparam(':ZITEMS',$XITEMS);

			$newjob->bindparam(':ZREMARKS',$XREMARKS);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:index.php');
} 







elseif(isset($_POST['checked'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET JOB_ORDER_num=:ZJO,
							SECTION=:Zsection,
							NATURE_OF_WORK=:Znature,
							LOCATION=:Zlocation,
							DATE_STARTED=:ZDS,
							TIME_STARTED=:ZTS,
							DATE_COMPLETED=:ZDC,
							TIME_COMPLETED=:ZTC,
							REQUESTING_COMPANY_DEPARTMENT=:ZRC,
							STATUS=:ZSTATUS,
							CONTACT_PERSON=:ZCP,
							RECEIVED_BY=:ZRB,
							DATE_TIME_RECEIVED=:ZDTR,
							FROM_BLDG=:ZFB,
							TO_BLDG=:ZTB,

							PAR=:ZPAR,
							PAR_QTY=:ZPAR_Q,
							ICS=:ZICS,
							ICS_QTY=:ZICS_Q,
							I_F=:ZI_F,
							I_F_QTY=:ZI_F_Q,
							PO_CONTRACT=:ZPO,
							FORMS=:ZFORMS,
							ITEMS=:ZITEMS,

							REMARKS=:ZREMARKS

							WHERE ID=:ZID");
			

			$newjob->bindparam(':ZJO',$XJONUM);
			$newjob->bindparam(':Zsection',$XSECTION);
			$newjob->bindparam(':Znature',$XNATURE);
			$newjob->bindparam(':Zlocation',$XLOCATION);
			$newjob->bindparam(':ZDS',$XDS);
			$newjob->bindparam(':ZTS',$XTS);
			$newjob->bindparam(':ZDC',$XDC);
			$newjob->bindparam(':ZTC',$XTC);
			$newjob->bindparam(':ZRC',$XRC);
			$newjob->bindparam(':ZSTATUS',$newerSTATUS);
			$newjob->bindparam(':ZCP',$XCP);
			$newjob->bindparam(':ZRB',$XRB);
			$newjob->bindparam(':ZDTR',$XDTR);
			$newjob->bindparam(':ZFB',$XFB);
			$newjob->bindparam(':ZTB',$XTB);

			$newjob->bindparam(':ZPAR',$XPAR);
			$newjob->bindparam(':ZPAR_Q',$XPAR_Q);
			$newjob->bindparam(':ZICS',$XICS);
			$newjob->bindparam(':ZICS_Q',$XICS_Q);
			$newjob->bindparam(':ZI_F',$XI_F);
			$newjob->bindparam(':ZI_F_Q',$XI_F_Q);
			$newjob->bindparam(':ZPO',$XPO);
			$newjob->bindparam(':ZFORMS',$XFORMS);
			$newjob->bindparam(':ZITEMS',$XITEMS);

			$newjob->bindparam(':ZREMARKS',$XREMARKS);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:index.php');
} 





elseif(isset($_POST['onhold'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET JOB_ORDER_num=:ZJO,
							SECTION=:Zsection,
							NATURE_OF_WORK=:Znature,
							LOCATION=:Zlocation,
							DATE_STARTED=:ZDS,
							TIME_STARTED=:ZTS,
							DATE_COMPLETED=:ZDC,
							TIME_COMPLETED=:ZTC,
							REQUESTING_COMPANY_DEPARTMENT=:ZRC,
							STATUS=:ZSTATUS,
							CONTACT_PERSON=:ZCP,
							RECEIVED_BY=:ZRB,
							DATE_TIME_RECEIVED=:ZDTR,
							FROM_BLDG=:ZFB,
							TO_BLDG=:ZTB,

							PAR=:ZPAR,
							PAR_QTY=:ZPAR_Q,
							ICS=:ZICS,
							ICS_QTY=:ZICS_Q,
							I_F=:ZI_F,
							I_F_QTY=:ZI_F_Q,
							PO_CONTRACT=:ZPO,
							FORMS=:ZFORMS,
							ITEMS=:ZITEMS,

							REMARKS=:ZREMARKS

							WHERE ID=:ZID");
			

			$newjob->bindparam(':ZJO',$XJONUM);
			$newjob->bindparam(':Zsection',$XSECTION);
			$newjob->bindparam(':Znature',$XNATURE);
			$newjob->bindparam(':Zlocation',$XLOCATION);
			$newjob->bindparam(':ZDS',$XDS);
			$newjob->bindparam(':ZTS',$XTS);
			$newjob->bindparam(':ZDC',$XDC);
			$newjob->bindparam(':ZTC',$XTC);
			$newjob->bindparam(':ZRC',$XRC);
			$newjob->bindparam(':ZSTATUS',$newestSTATUS);
			$newjob->bindparam(':ZCP',$XCP);
			$newjob->bindparam(':ZRB',$XRB);
			$newjob->bindparam(':ZDTR',$XDTR);
			$newjob->bindparam(':ZFB',$XFB);
			$newjob->bindparam(':ZTB',$XTB);

			$newjob->bindparam(':ZPAR',$XPAR);
			$newjob->bindparam(':ZPAR_Q',$XPAR_Q);
			$newjob->bindparam(':ZICS',$XICS);
			$newjob->bindparam(':ZICS_Q',$XICS_Q);
			$newjob->bindparam(':ZI_F',$XI_F);
			$newjob->bindparam(':ZI_F_Q',$XI_F_Q);
			$newjob->bindparam(':ZPO',$XPO);
			$newjob->bindparam(':ZFORMS',$XFORMS);
			$newjob->bindparam(':ZITEMS',$XITEMS);

			$newjob->bindparam(':ZREMARKS',$XREMARKS);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:index.php');
} 





else{
	header('location:error-new-jo.php');
}


?>