
<?php /**
 * @version     1.0.0
 * @package     com_ojk
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Deepesh <info@convergenceservices.in> - http://www.convergenceservices.in
 */

// no direct access
defined("_JEXEC") or die;
require_once("mpdf/mpdf.php");
require_once("libraries/conv/uknowvaui.php");
$doc=JFactory::getDocument();
$doc->setTitle("Online Joining Kit");
$doc->addScriptDeclaration('
		function printDiv()
{
 	var width  = (screen.width*0.75);
	var height = (screen.height*0.75);
	var left   = (screen.width  - width)/2;
	var top    = (screen.height - height)/2;
	var params = "width="+width+", height="+height;
	params += ", top="+top+", left="+left;
	params += ", directories=no";
	params += ", location=no";
	params += ", menubar=no";
	params += ", resizable=no";
	params += ", scrollbars=yes";
	params += ", status=no";
	params += ", toolbar=no";
	params += ", fullscreen=no";

	if((navigator.appName)=="Microsoft Internet Explorer")
	 {
	  	var mywindow = window.open("");				
	 }
	 else
	 {
		var mywindow = window.open("","Print Results",params);		
	 }
	mywindow.document.write(\"<link type="text/css" href="".JURI::root()."templates/conv_template/css/ojk.css"."" rel="stylesheet"><link type="text/css" href="".JURI::root()."templates/conv_template/css/template.css"."" rel="stylesheet">\"+document.getElementById("ojk").innerHTML);
	mywindow.innerWidth=width;
	mywindow.innerHeight=height;
	mywindow.location.reload();
	mywindow.focus();
	mywindow.print();
}
$conv = jQuery;
$conv(document).ready(function(){
	$conv(window).keydown(function(event) {
		  if(event.ctrlKey && event.keyCode == 80) { 
		    event.preventDefault();
		    printDiv();
		  }
	});
});
		');
$mpdf=new mPDF();

$mpdf->WriteHTML('<style type="text/css">
#header{display:none;}#footer{display:none;}
span.cls_005{font-family:Arial,serif;line-height:40px;font-size:28.0px;color:rgb(192,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_005{font-family:Arial,serif;font-size:28.0px;color:rgb(192,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_006{font-family:Arial,serif;line-height:40px;font-size:22.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_006{font-family:Arial,serif;font-size:22.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_008{font-family:Arial,serif;line-height:40px;font-size:16.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_008{font-family:Arial,serif;font-size:16.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_009{font-family:Courier New,serif;line-height:40px;font-size:16.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_009{font-family:Courier New,serif;font-size:16.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_010{font-family:Times,serif;line-height:40px;font-size:10.0px;color:rgb(166,166,166);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_010{font-family:Times,serif;font-size:10.0px;color:rgb(166,166,166);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_012{font-family:Times,serif;line-height:40px;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_012{font-family:Times,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_018{font-family:Arial,serif;font-size:16.0px;color:rgb(130,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_018{font-family:Arial,serif;font-size:16.0px;color:rgb(130,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_014{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_014{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_011{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_011{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_015{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_015{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_038{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: underline}
div.cls_038{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_016{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_016{font-family:Arial,serif;font-size:10.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_017{font-family:Arial,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_017{font-family:Arial,serif;font-size:14.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_019{font-family:Arial,serif;font-size:10.0px;color:rgb(217,217,217);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_019{font-family:Arial,serif;font-size:10.0px;color:rgb(217,217,217);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_020{font-family:Arial,serif;font-size:10.0px;color:rgb(166,166,166);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_020{font-family:Arial,serif;font-size:10.0px;color:rgb(166,166,166);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_021{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_021{font-family:Arial,serif;font-size:9.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_022{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_022{font-family:Arial,serif;font-size:11.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_025{font-family:Arial,serif;font-size:16.0px;color:rgb(148,53,51);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_025{font-family:Arial,serif;font-size:16.0px;color:rgb(148,53,51);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_002{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_002{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_023{font-family:Arial,serif;font-size:6.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_023{font-family:Arial,serif;font-size:6.5px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_027{font-family:Arial,serif;font-size:8.1px;color:rgb(192,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_027{font-family:Arial,serif;font-size:8.1px;color:rgb(192,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_028{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_028{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_030{font-family:Arial,serif;font-size:8.1px;color:rgb(191,191,191);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_030{font-family:Arial,serif;font-size:8.1px;color:rgb(191,191,191);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_031{font-family:Arial,serif;font-size:8.1px;color:rgb(191,191,191);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_031{font-family:Arial,serif;font-size:8.1px;color:rgb(191,191,191);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_029{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_029{font-family:Arial,serif;font-size:8.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_032{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: none}
div.cls_032{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: none}
span.cls_033{font-family:Arial,serif;font-size:10.0px;color:rgb(166,166,166);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_033{font-family:Arial,serif;font-size:10.0px;color:rgb(166,166,166);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_034{font-family:Arial,serif;font-size:10.0px;color:rgb(217,217,217);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_034{font-family:Arial,serif;font-size:10.0px;color:rgb(217,217,217);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_035{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
div.cls_035{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
span.cls_036{font-family:Arial,serif;font-size:8.1px;color:rgb(192,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_036{font-family:Arial,serif;font-size:8.1px;color:rgb(192,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_037{font-family:Arial,serif;font-size:7.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_037{font-family:Arial,serif;font-size:7.6px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
span.cls_007{font-family:Arial,serif;font-size:18.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
div.cls_007{font-family:Arial,serif;font-size:18.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
</style>
<script type="text/javascript" src="kitimages/wz_jsgraphics.js"></script>
<div id="print" style="text-align: center">
<a class="button" href="javascript:void()" onclick="printDiv();">Print</a>
</div>
<div id="ojk">
<div style="position:relative;left:50%;margin-left:-306px;top:0px;width:612px;height:1004px;border-style:outset;overflow:hidden;">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background01.jpg" width=612 height=1008></div>
<div style="position:absolute;left:86.40px;top:213.23px" class="cls_005"><span class="cls_005">Employee Joining Kit</span></div>
<div style="position:absolute;left:86.41px;top:326.03px" class="cls_006"><span class="cls_006">Welcome to the Capital First family.</span></div>
<div style="position:absolute;left:86.40px;top:353.03px" class="cls_006"><span class="cls_006">Together we shall shape our dreams.</span></div>
<div style="position:absolute;left:86.41px;top:380.03px" class="cls_006"><span class="cls_006">Dreams that will need each day, all the hard work</span></div>
<div style="position:absolute;left:86.40px;top:407.03px" class="cls_006"><span class="cls_006">and Passion you can give...</span></div>
<div style="position:absolute;left:215.40px;top:480.48px" class="cls_008"><span class="cls_008">Our Organizational Values</span></div>
<div style="position:absolute;left:104.40px;top:500.39px" class="cls_009"><span class="cls_009">o</span><span class="cls_008"> Responsibility.</span></div>
<div style="position:absolute;left:104.40px;top:523.20px" class="cls_009"><span class="cls_009">o</span><span class="cls_008"> Integrity.</span></div>
<div style="position:absolute;left:104.40px;top:546.11px" class="cls_009"><span class="cls_009">o</span><span class="cls_008"> Leadership.</span></div>
<div style="position:absolute;left:104.40px;top:569.04px" class="cls_009"><span class="cls_009">o</span><span class="cls_008"> Mutual respect.</span></div>
<div style="position:absolute;left:104.40px;top:591.83px" class="cls_009"><span class="cls_009">o</span><span class="cls_008"> Respect for our Community.</span></div>
<div style="position:absolute;left:470.28px;top:728.16px" class="cls_010"><span class="cls_010">Ver 07-03-2013</span></div>
<div style="position:absolute;left:490.20px;top:762.84px" class="cls_012"><span class="cls_012">Page 1 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:400px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background02.jpg" width=612 height=1008></div>
<div style="position:absolute;left:167.88px;top:68.40px" class="cls_018"><span class="cls_018">FIRST DAY JOINING DOCUMENTS</span></div>
<div style="position:absolute;left:86.40px;top:106.20px" class="cls_014"><span class="cls_014">Dear Member,</span></div>
<div style="position:absolute;left:86.40px;top:118.32px" class="cls_014"><span class="cls_014">Welcome to Capital First!!!</span></div>
<div style="position:absolute;left:86.41px;top:142.44px" class="cls_014"><span class="cls_014">You are required to complete below mentioned requirements to assist in smooth completion of your</span></div>
<div style="position:absolute;left:86.41px;top:154.56px" class="cls_014"><span class="cls_014">joining formalities.</span></div>
<div style="position:absolute;left:86.40px;top:178.68px" class="cls_014"><span class="cls_014">Please furnish the below mentioned mandatory documents for your personal file completion.</span></div>
<div style="position:absolute;left:91.32px;top:206.52px" class="cls_011"><span class="cls_011">Sr.</span></div>
<div style="position:absolute;left:493.20px;top:206.52px" class="cls_011"><span class="cls_011">Submitted</span></div>
<div style="position:absolute;left:116.28px;top:212.28px" class="cls_011"><span class="cls_011">Mandatory Documents</span></div>
<div style="position:absolute;left:91.32px;top:218.04px" class="cls_011"><span class="cls_011">No</span></div>
<div style="position:absolute;left:487.56px;top:218.04px" class="cls_011"><span class="cls_011">Documents</span></div>
<div style="position:absolute;left:95.64px;top:236.88px" class="cls_014"><span class="cls_014">1</span></div>
<div style="position:absolute;left:116.28px;top:236.88px" class="cls_014"><span class="cls_014">5 Passport size photos</span></div>
<div style="position:absolute;left:95.64px;top:255.24px" class="cls_014"><span class="cls_014">2</span></div>
<div style="position:absolute;left:116.28px;top:255.24px" class="cls_014"><span class="cls_014">Signed Offer Letter and Offer Annexure</span></div>
<div style="position:absolute;left:116.28px;top:270.36px" class="cls_014"><span class="cls_014">SSC/ 10th Std/ Matriculation Mark Sheet & Certificate (Mark sheet</span></div>
<div style="position:absolute;left:95.64px;top:276.12px" class="cls_014"><span class="cls_014">3</span></div>
<div style="position:absolute;left:116.28px;top:281.88px" class="cls_014"><span class="cls_014">Mandatory)</span></div>
<div style="position:absolute;left:116.28px;top:293.88px" class="cls_014"><span class="cls_014">HSC/12th Std/ 10+2 Mark Sheet Mark Sheet & Certificate (Mark sheet</span></div>
<div style="position:absolute;left:95.64px;top:299.64px" class="cls_014"><span class="cls_014">4</span></div>
<div style="position:absolute;left:116.28px;top:305.40px" class="cls_014"><span class="cls_014">Mandatory)</span></div>
<div style="position:absolute;left:116.28px;top:317.40px" class="cls_014"><span class="cls_014">Final Year Graduation Mark Sheet Mark Sheet & Certificate (Mark sheet</span></div>
<div style="position:absolute;left:95.64px;top:323.16px" class="cls_014"><span class="cls_014">5</span></div>
<div style="position:absolute;left:116.28px;top:328.92px" class="cls_014"><span class="cls_014">Mandatory)</span></div>
<div style="position:absolute;left:116.28px;top:340.92px" class="cls_014"><span class="cls_014">Post Graduation Mark Sheet- If Any Mark Sheet & Certificate (Mark sheet</span></div>
<div style="position:absolute;left:95.64px;top:346.68px" class="cls_014"><span class="cls_014">6</span></div>
<div style="position:absolute;left:116.28px;top:352.32px" class="cls_014"><span class="cls_014">Mandatory)</span></div>
<div style="position:absolute;left:116.28px;top:364.32px" class="cls_014"><span class="cls_014">Mark Sheet/ Certificates in respect to any other qualifications (Like</span></div>
<div style="position:absolute;left:95.64px;top:370.08px" class="cls_014"><span class="cls_014">7</span></div>
<div style="position:absolute;left:116.28px;top:375.84px" class="cls_014"><span class="cls_014">AMFI/IRDA/NISM/NCFM/BCFM etc.)</span></div>
<div style="position:absolute;left:95.64px;top:391.08px" class="cls_014"><span class="cls_014">8</span></div>
<div style="position:absolute;left:116.28px;top:391.08px" class="cls_014"><span class="cls_014">PAN Card copy</span></div>
<div style="position:absolute;left:95.64px;top:409.32px" class="cls_014"><span class="cls_014">9</span></div>
<div style="position:absolute;left:116.28px;top:409.32px" class="cls_014"><span class="cls_014">AADHAAR Card (Submit within 3 months from date of final offer)</span></div>
<div style="position:absolute;left:92.76px;top:427.68px" class="cls_014"><span class="cls_014">10</span></div>
<div style="position:absolute;left:116.28px;top:427.68px" class="cls_014"><span class="cls_014">Resignation Acceptance letter from your previous employer</span></div>
<div style="position:absolute;left:92.76px;top:445.44px" class="cls_014"><span class="cls_014">11</span></div>
<div style="position:absolute;left:116.28px;top:445.44px" class="cls_014"><span class="cls_014">Proof of Age (Birth Certificate / School leaving certificate)</span></div>
<div style="position:absolute;left:92.76px;top:463.32px" class="cls_014"><span class="cls_014">12</span></div>
<div style="position:absolute;left:116.28px;top:463.32px" class="cls_014"><span class="cls_014">Residence Proof-Permanent Address</span></div>
<div style="position:absolute;left:92.76px;top:481.68px" class="cls_014"><span class="cls_014">13</span></div>
<div style="position:absolute;left:116.28px;top:481.68px" class="cls_014"><span class="cls_014">Residence Proof-Current Address</span></div>
<div style="position:absolute;left:92.76px;top:499.44px" class="cls_014"><span class="cls_014">14</span></div>
<div style="position:absolute;left:116.28px;top:499.44px" class="cls_014"><span class="cls_014">Relieving/ Work experience letter from your previous employer (if issued)</span></div>
<div style="position:absolute;left:86.40px;top:528.72px" class="cls_015"><span class="cls_015">Note:</span></div>
<div style="position:absolute;left:104.40px;top:541.32px" class="cls_015"><span class="cls_015">1.   The above mentioned documents are mandatory and are required to be submitted along with the</span></div>
<div style="position:absolute;left:122.40px;top:553.80px" class="cls_015"><span class="cls_015">‘Joining Kit’ to HR within 3 days from the date of joining.</span></div>
<div style="position:absolute;left:104.40px;top:566.28px" class="cls_015"><span class="cls_015">2.   Do not forget to sign wherever indicated.</span></div>
<div style="position:absolute;left:104.40px;top:578.76px" class="cls_015"><span class="cls_015">3.   Paste the photograph wherever indicated and sign across the photograph (Do not sign on face)</span></div>
<div style="position:absolute;left:104.40px;top:591.24px" class="cls_015"><span class="cls_015">4.   Business Head / Reporting Manager </span><span class="cls_038">MUST</span><span class="cls_015"> sign on pg 3 & pg 8, post checking the completeness</span></div>
<div style="position:absolute;left:122.40px;top:603.72px" class="cls_015"><span class="cls_015">of the Joining Kit and verification of the documents submitted.</span></div>
<div style="position:absolute;left:86.40px;top:628.68px" class="cls_015"><span class="cls_015">Appointment Letter and Salary will be processed post complete documentation and updation of</span></div>
<div style="position:absolute;left:86.40px;top:641.16px" class="cls_015"><span class="cls_015">personal details on HR Space. Non submission or incomplete submission of documents will lead to</span></div>
<div style="position:absolute;left:86.40px;top:653.76px" class="cls_015"><span class="cls_015">appointment letter & salary being withheld till document submission is complete.</span></div>
<div style="position:absolute;left:86.40px;top:677.76px" class="cls_015"><span class="cls_015">Salary account opening:</span></div>
<div style="position:absolute;left:86.40px;top:691.20px" class="cls_014"><span class="cls_014">Salary is credited in the salary account opened with HDFC Bank. If you have a HDFC Bank account,</span></div>
<div style="position:absolute;left:86.40px;top:705.12px" class="cls_014"><span class="cls_014">kindly inform us immediately. Salary is not paid in Cash or by Cheque.</span></div>
<div style="position:absolute;left:86.40px;top:731.04px" class="cls_016"><span class="cls_016">We wish you a great journey with Capital First Limited!</span></div>
<div style="position:absolute;left:86.65px;top:741.24px" class="cls_017"><span class="cls_017">HR Team</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 2 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:600px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background03.jpg" width=612 height=1008></div>
<div style="position:absolute;left:187.08px;top:70.92px" class="cls_018"><span class="cls_018">EMPLOYEE JOINING REPORT</span></div>
<div style="position:absolute;left:86.40px;top:145.68px" class="cls_011"><span class="cls_011">Company ID No.</span></div>
<div style="position:absolute;left:194.40px;top:145.68px" class="cls_011"><span class="cls_011">:</span></div>
<div style="position:absolute;left:230.40px;top:145.68px" class="cls_011"><span class="cls_011" style="text-decoration: underline"> echo $this->employee->company_id</span></div>
<div style="position:absolute;left:86.40px;top:191.76px" class="cls_014"><span class="cls_014">This is to inform that I, <span style="text-decoration: underline"> $father=explode(" ",$this->employee->father_name);echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:288.60px;top:203.28px" class="cls_014"><span class="cls_014">(Full name in capital letters)</span></div>
<div style="position:absolute;left:86.40px;top:226.32px" class="cls_014"><span class="cls_014">have joined my duties as <span style="text-decoration: underline"> echo $this->employee->designation</span>, w.e.f.  <span style="text-decoration: underline"> if(!empty($this->employee->date_of_joining)){echo date("F d, Y",strtotime($this->employee->date_of_joining));}</span></span></div>
<div style="position:absolute;left:247.08px;top:237.72px" class="cls_014"><span class="cls_014">(*Designation)</span></div>
<div style="position:absolute;left:452.16px;top:237.72px" class="cls_014"><span class="cls_014">(DOJ)</span></div>
<div style="position:absolute;left:86.40px;top:260.64px" class="cls_014"><span class="cls_014">at </span><span class="cls_011" style="text-decoration: underline"> echo $this->employee->branch Branch /  Office</span><span class="cls_014">.</span></div>
<div style="position:absolute;left:86.40px;top:295.20px" class="cls_014"><span class="cls_014">*Note: Mention Designation as per Offer Letter</span></div>
<div style="position:absolute;left:86.40px;top:329.64px" class="cls_011"><span class="cls_011">Signature of the Employee: _____________________________</span></div>
<div style="position:absolute;left:86.40px;top:352.68px" class="cls_011"><span class="cls_011">Date: ________________________________</span></div>
<div style="position:absolute;left:86.40px;top:398.64px" class="cls_011"><span class="cls_011">============================================================================</span></div>
<div style="position:absolute;left:164.76px;top:433.08px" class="cls_011"><span class="cls_011">TO BE FILLED BY BUSINESS HEAD / REPORTING MANAGER</span></div>
<div style="position:absolute;left:86.40px;top:456.24px" class="cls_014"><span class="cls_014">The above employee has joined us in accordance and has submitted the mandatory documents as</span></div>
<div style="position:absolute;left:86.40px;top:467.76px" class="cls_014"><span class="cls_014">required.</span></div>
<div style="position:absolute;left:86.40px;top:502.08px" class="cls_011"><span class="cls_011">Verified by Business Head / Reporting Manager </span><span class="cls_014">(only on receipt of required documents)</span></div>
<div style="position:absolute;left:86.40px;top:536.64px" class="cls_011"><span class="cls_011">Name:</span></div>
<div style="position:absolute;left:133.44px;top:536.64px" class="cls_011"><span class="cls_011">______________________________</span></div>
<div style="position:absolute;left:338.40px;top:536.64px" class="cls_011"><span class="cls_011">Designation: _____________________</span></div>
<div style="position:absolute;left:86.40px;top:582.60px" class="cls_011"><span class="cls_011">Signature: _______________________________</span></div>
<div style="position:absolute;left:338.40px;top:582.60px" class="cls_011"><span class="cls_011">Date:</span></div>
<div style="position:absolute;left:396.60px;top:582.60px" class="cls_011"><span class="cls_011">_____________________</span></div>
<div style="position:absolute;left:86.40px;top:628.56px" class="cls_011"><span class="cls_011">Note-</span><span class="cls_014">Any Document not validated handed over to Business Head-forwarded to HR will not be</span></div>
<div style="position:absolute;left:86.40px;top:645.96px" class="cls_014"><span class="cls_014">accepted.</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 3 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:900px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background04.jpg" width=612 height=1008></div>
<div style="position:absolute;left:137.40px;top:72.84px" class="cls_018"><span class="cls_018">GROUP MEDICLAIM INSURANCE POLICY</span></div>
<div style="position:absolute;left:86.40px;top:134.16px" class="cls_011"><span class="cls_011">Employee Name: <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:86.40px;top:168.60px" class="cls_011"><span class="cls_011">Gender:      echo $this->employee->gender</span></div>
<div style="position:absolute;left:175.20px;top:168.60px" class="cls_011"><span class="cls_011"></span></div>
<div style="position:absolute;left:338.40px;top:168.60px" class="cls_011"><span class="cls_011">Company ID No. : <span style="text-decoration: underline"> echo $this->employee->company_id</span></span></div>
<div style="position:absolute;left:86.40px;top:203.16px" class="cls_011"><span class="cls_011">Designation: <span style="text-decoration: underline"> echo $this->employee->designation</span>  &nbsp;&nbsp;&nbsp;&nbsp;Date of birth:   </span><span style="text-decoration: underline"> if(!empty($this->employee->date_of_birth)){echo date("F d, Y",strtotime($this->employee->date_of_birth));}</span></div>
<div style="position:absolute;left:440.40px;top:203.16px" class="cls_019"><span class="cls_019"></span><span class="cls_011" style="text-decoration: underline"> Age:  echo $this->employee->age Years</span></div>
<div style="position:absolute;left:86.40px;top:237.60px" class="cls_011"><span class="cls_011">Department: <span style="text-decoration: underline"> echo $this->employee->department</span>  &nbsp;&nbsp;&nbsp;&nbsp; Date of Joining:   </span><span style="text-decoration: underline"> if(!empty($this->employee->date_of_joining)){echo date("F d, Y",strtotime($this->employee->date_of_joining));}</span></div>
<div style="position:absolute;left:452.04px;top:237.60px" class="cls_019"><span class="cls_019"></span></div>
<div style="position:absolute;left:25px;top:286.56px" class="cls_021"><table><tr><th class="cls_021" style="width:25px;">Sr. No</th><th class="cls_021" style="width:100px;">Dependant`s Name</th><th class="cls_021" style="width:70px;">DOB</th><th class="cls_021" style="width:40px;">Age (in years)</th><th class="cls_021" style="width:35px;">Gender ( M / F )</th><th class="cls_021" style="width:110px;">Relationship</th><th class="cls_021" style="width:65px;">Occupation</th><th class="cls_021" style="width:80px;">Pre-existing illness</th></tr>
<tr><td>1</td><td></td></tr>
</table></div>
<div style="position:absolute;left:377.16px;top:687.60px" class="cls_014"><span class="cls_014">___________________________</span></div>
<div style="position:absolute;left:393.96px;top:699.12px" class="cls_014"><span class="cls_014">Signature of the Employee</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 4 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:1200px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background05.jpg" width="612" height="1008"></div>
<div style="position:absolute;left:83.16px;top:73.32px" class="cls_018"><span class="cls_018">DECLARATION FOR NON SUBMISSION OF RELIEVING</span></div>
<div style="position:absolute;left:233.04px;top:95.88px" class="cls_018"><span class="cls_018">LETTER - FORM 1G</span></div>
<div style="position:absolute;left:86.40px;top:157.08px" class="cls_022"><span class="cls_022">Note: This declaration is valid only for 3 months from date of joining, before which</span></div>
<div style="position:absolute;left:86.40px;top:176.04px" class="cls_022"><span class="cls_022">you are required to submit your formal relieving letter to HR.  This form will not be</span></div>
<div style="position:absolute;left:86.40px;top:195.00px" class="cls_022"><span class="cls_022">accepted in lieu of the relieving letter.</span></div>
<div style="position:absolute;left:86.40px;top:250.20px" class="cls_014"><span class="cls_014">I, <span style="text-decoration: underline"> $father=explode(" ",$this->employee->father_name);echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span> hereby declare that I have resigned from the</span></div>
<div style="position:absolute;left:86.40px;top:296.16px" class="cls_014"><span class="cls_014">Services of (Previous company name) M/s<span style="text-decoration: underline;margin-left:10px;"> if($this->emptimeline->employment_timeline){$max=max(array_keys($this->emptimeline->employment_timeline));echo $this->emptimeline->employment_timeline[$max]["company_name"];}else{if($this->empdetails->employment_history[1]){echo $this->empdetails->employment_history[1]->company_name;}else{echo $this->empdetails->employment_history[0]->company_name;}}</span></span></div>
<div style="position:absolute;left:86.40px;top:342.12px" class="cls_014"><span class="cls_014">and I have been officially discharged from my  duties with effect from the closing hours</span></div>
<div style="position:absolute;left:86.40px;top:365.16px" class="cls_014"><span class="cls_014">of ____________.</span></div>
<div style="position:absolute;left:86.40px;top:411.12px" class="cls_014"><span class="cls_014">I will submit the relieving letter by (mention date) ___________________ .</span></div>
<div style="position:absolute;left:86.40px;top:457.20px" class="cls_014"><span class="cls_014">I also declare that I will be solely responsible for any issues that will arise from my previous</span></div>
<div style="position:absolute;left:86.40px;top:480.12px" class="cls_014"><span class="cls_014">Employer with respect to my relieving order, since I have not submitted the Relieving Letter to</span></div>
<div style="position:absolute;left:86.40px;top:503.28px" class="cls_014"><span class="cls_014">Capital First Limited at the time of joining.</span></div>
<div style="position:absolute;left:86.40px;top:562.20px" class="cls_014"><span class="cls_014">Name of the Employee</span></div>
<div style="position:absolute;left:230.40px;top:562.20px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> $father=explode(" ",$this->employee->father_name);echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:86.40px;top:585.12px" class="cls_014"><span class="cls_014">Company ID No.</span></div>
<div style="position:absolute;left:230.40px;top:585.12px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> echo $this->employee->company_id;</span></span></div>
<div style="position:absolute;left:86.40px;top:608.16px" class="cls_014"><span class="cls_014">Designation (as per Offer Letter): <span style="text-decoration: underline"> echo $this->employee->designation;</span></span></div>
<div style="position:absolute;left:86.40px;top:631.20px" class="cls_014"><span class="cls_014">Department</span></div>
<div style="position:absolute;left:230.40px;top:631.20px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> echo $this->employee->department;</span></span></div>
<div style="position:absolute;left:86.40px;top:665.52px" class="cls_011"><span class="cls_011">Signature of the Employee</span></div>
<div style="position:absolute;left:230.40px;top:665.52px" class="cls_011"><span class="cls_011">: _________________________</span></div>
<div style="position:absolute;left:410.40px;top:665.52px" class="cls_011"><span class="cls_011">Date: _________________</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 5 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:1500px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background06.jpg" width=612 height=1008></div>
<div style="position:absolute;left:121.32px;top:73.44px" class="cls_018"><span class="cls_018">RESIDENCE ADDRESS: DECLARATION FORM</span></div>
<div style="position:absolute;left:86.40px;top:159.36px" class="cls_014"><span class="cls_014">To</span></div>
<div style="position:absolute;left:109.20px;top:159.36px" class="cls_014"><span class="cls_014">:</span></div>
<div style="position:absolute;left:86.40px;top:176.52px" class="cls_014"><span class="cls_014">Human Resources</span></div>
<div style="position:absolute;left:86.40px;top:193.80px" class="cls_014"><span class="cls_014">Mumbai</span></div>
<div style="position:absolute;left:86.40px;top:228.24px" class="cls_014"><span class="cls_014">I, <span style="text-decoration: underline"> $father=explode(" ",$this->employee->father_name);echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span> wish to update my residential address currently</span></div>
<div style="position:absolute;left:86.40px;top:245.52px" class="cls_014"><span class="cls_014">occupied by me for official Records as:</span></div>
<div style="position:absolute;left:89.16px;top:262.80px" class="cls_014"><span class="cls_014"><span style="text-decoration: underline"> if($this->personal->future_communication=="Correspondence"){echo $this->personal->correspondence_address;}else{echo $this->personal->permanent_address;} </span></span></div>
<div style="position:absolute;left:89.16px;top:297.24px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:89.16px;top:331.80px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:86.40px;top:366.24px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:86.40px;top:400.80px" class="cls_014"><span class="cls_014">Pin Code: <span style="text-decoration: underline"> if($this->personal->future_communication=="Correspondence"){echo $this->personal->correspondence_postal_code;}else{echo $this->personal->permanent_postal_code;} </span> Residential Telephone No: <span style="text-decoration: underline"> if($this->personal->future_communication=="Correspondence"){echo $this->personal->correspondence_contact["day"];}else{echo $this->personal->permanent_contact["day"];} </span></span></div>
<div style="position:absolute;left:86.40px;top:435.24px" class="cls_014"><span class="cls_014">Kindly note the same for all official communication and update my personal records accordingly.</span></div>
<div style="position:absolute;left:86.40px;top:488.52px" class="cls_014"><span class="cls_014">Thanking you,</span></div>
<div style="position:absolute;left:86.40px;top:511.44px" class="cls_014"><span class="cls_014">Name of the Employee</span></div>
<div style="position:absolute;left:230.40px;top:511.44px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:86.40px;top:534.48px" class="cls_014"><span class="cls_014">Company ID No.</span></div>
<div style="position:absolute;left:230.40px;top:534.48px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> echo $this->employee->company_id</span></span></div>
<div style="position:absolute;left:86.40px;top:557.52px" class="cls_014"><span class="cls_014">Designation (as per Offer Letter): <span style="text-decoration: underline"> echo $this->employee->designation</span></span></div>
<div style="position:absolute;left:86.40px;top:580.44px" class="cls_014"><span class="cls_014">Department</span></div>
<div style="position:absolute;left:230.40px;top:580.44px" class="cls_014"><span class="cls_014">: <span style="text-decoration: underline"> echo $this->employee->department</span></span></div>
<div style="position:absolute;left:86.40px;top:614.88px" class="cls_011"><span class="cls_011">Signature of the Employee</span></div>
<div style="position:absolute;left:230.40px;top:614.88px" class="cls_011"><span class="cls_011">: _________________________</span></div>
<div style="position:absolute;left:410.40px;top:614.88px" class="cls_011"><span class="cls_011">Date: _________________</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 6 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:1800px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background07.jpg" width=612 height=1008></div>
<div style="position:absolute;left:126.96px;top:73.68px" class="cls_025"><span class="cls_025">DECLARATION OF FIDELITY AND SECRECY</span></div>
<div style="position:absolute;left:89.16px;top:145.80px" class="cls_014"><span class="cls_014"><span style="text-decoration: underline"> $father=explode(" ",$this->employee->father_name);echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span> residing at <span style="text-decoration: underline"> if($this->personal->future_communication=="Correspondence"){echo $this->personal->correspondence_address;}else{echo $this->personal->permanent_address;} </span></span></div>
<div style="position:absolute;left:86.40px;top:168.72px" class="cls_014"><span class="cls_014"> and presently working as <span style="text-decoration: underline"> echo $this->employee->designation</span> do hereby declare and state as follows:</span></div>
<div style="position:absolute;left:86.40px;top:191.76px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:86.40px;top:226.32px" class="cls_002"><span class="cls_002">1.</span></div>
<div style="position:absolute;left:122.40px;top:228.36px" class="cls_014"><span class="cls_014">I do hereby declare that I will faithfully, truly and to the best of my skills and ability, execute</span></div>
<div style="position:absolute;left:122.40px;top:247.44px" class="cls_014"><span class="cls_014">and perform the duties required of me as an employee of Capital First Limited, a Company</span></div>
<div style="position:absolute;left:122.40px;top:264.60px" class="cls_014"><span class="cls_014">registered under the Companies Act, 1956 and having its registered office at Indiabulls</span></div>
<div style="position:absolute;left:122.40px;top:279.84px" class="cls_014"><span class="cls_014">Finance Centre Tower II, 15</span><span class="cls_023"><sup>th</sup></span><span class="cls_014"> Floor Senapati Bapat Marg Elphinston (W) Mumbai 400 013.</span></div>
<div style="position:absolute;left:86.40px;top:316.44px" class="cls_014"><span class="cls_014">2</span></div>
<div style="position:absolute;left:122.40px;top:316.44px" class="cls_014"><span class="cls_014">I declare that in the performance of  my  employment and duties required of me,  I will have</span></div>
<div style="position:absolute;left:122.40px;top:333.60px" class="cls_014"><span class="cls_014">access  to  documents,  files,  systems,  records,  plans,  proposals,  drawings,  designs  in</span></div>
<div style="position:absolute;left:122.40px;top:350.88px" class="cls_014"><span class="cls_014">connection with production, marketing, technology, and computer programming information</span></div>
<div style="position:absolute;left:122.40px;top:368.16px" class="cls_014"><span class="cls_014">relating to the business of the  Company that is proprietary and a trade secret of the</span></div>
<div style="position:absolute;left:122.40px;top:385.44px" class="cls_014"><span class="cls_014">Company (hereinafter called “Trade Secret Information”.</span></div>
<div style="position:absolute;left:86.40px;top:419.88px" class="cls_014"><span class="cls_014">3.</span></div>
<div style="position:absolute;left:122.40px;top:419.88px" class="cls_014"><span class="cls_014">I hold such Trade Secret Information strictly confidential by not, directly or indirectly, making</span></div>
<div style="position:absolute;left:122.40px;top:437.16px" class="cls_014"><span class="cls_014">known, or permitting such Trade Secret Information to be disclosed or made known, to any</span></div>
<div style="position:absolute;left:122.40px;top:454.32px" class="cls_014"><span class="cls_014">person or entity, either inside the Company or otherwise.    I shall faithfully and diligently take</span></div>
<div style="position:absolute;left:122.40px;top:471.60px" class="cls_014"><span class="cls_014">all steps necessary to protect the Company’s Trade Secret Information from being disclosed</span></div>
<div style="position:absolute;left:122.40px;top:488.88px" class="cls_014"><span class="cls_014">to unauthorized persons. Such persons include, but are not necessarily limited to, persons</span></div>
<div style="position:absolute;left:122.40px;top:506.16px" class="cls_014"><span class="cls_014">who are not Company employees, persons who are Company employees but who do not</span></div>
<div style="position:absolute;left:122.40px;top:523.32px" class="cls_014"><span class="cls_014">have a need to know the Trade Secret Information in order to perform their duties, persons</span></div>
<div style="position:absolute;left:122.40px;top:540.60px" class="cls_014"><span class="cls_014">not under a written confidentiality agreement with the Company in regard to the Trade Secret</span></div>
<div style="position:absolute;left:122.40px;top:557.88px" class="cls_014"><span class="cls_014">Information, and persons not directly aware of the proprietary and trade secret nature of the</span></div>
<div style="position:absolute;left:122.40px;top:575.16px" class="cls_014"><span class="cls_014">Trade Secret Information.</span></div>
<div style="position:absolute;left:86.40px;top:609.60px" class="cls_014"><span class="cls_014">4</span></div>
<div style="position:absolute;left:122.40px;top:609.60px" class="cls_014"><span class="cls_014">All documents, files, systems, records, plans, proposals, drawings and designs and items of</span></div>
<div style="position:absolute;left:122.40px;top:626.88px" class="cls_014"><span class="cls_014">information or equipment relating to the Company’s business (“Company Property”) are and</span></div>
<div style="position:absolute;left:122.40px;top:644.16px" class="cls_014"><span class="cls_014">shall remain the property of the Company, including notes, drawings, documents, records,</span></div>
<div style="position:absolute;left:122.40px;top:661.32px" class="cls_014"><span class="cls_014">and files   created in the performance of  my duties of employment or intended to be created</span></div>
<div style="position:absolute;left:122.40px;top:678.60px" class="cls_014"><span class="cls_014">in the performance of my duties of employment.  I shall not under any circumstances remove</span></div>
<div style="position:absolute;left:122.40px;top:695.88px" class="cls_014"><span class="cls_014">such Company property from the Company’s premises without the prior written consent of</span></div>
<div style="position:absolute;left:122.40px;top:713.16px" class="cls_014"><span class="cls_014">the Company.</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 7 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:2000px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background08.jpg" width=612 height=1008></div>
<div style="position:absolute;left:86.40px;top:65.28px" class="cls_014"><span class="cls_014">5</span></div>
<div style="position:absolute;left:122.40px;top:65.28px" class="cls_014"><span class="cls_014">I declare that notwithstanding the termination of my employment with the Company for any</span></div>
<div style="position:absolute;left:122.40px;top:82.56px" class="cls_014"><span class="cls_014">reason whatsoever I will not communicate or allow to be communicated to any person any</span></div>
<div style="position:absolute;left:122.40px;top:99.72px" class="cls_014"><span class="cls_014">information relating to   the Trade Secret Information and affairs of the Company</span></div>
<div style="position:absolute;left:86.40px;top:134.28px" class="cls_014"><span class="cls_014">6.</span></div>
<div style="position:absolute;left:122.40px;top:134.28px" class="cls_014"><span class="cls_014">I shall make a full and frank disclosure of any and all dealings I have or propose to enter</span></div>
<div style="position:absolute;left:122.40px;top:151.56px" class="cls_014"><span class="cls_014">directly or indirectly or through any of my relatives or family members with any of the</span></div>
<div style="position:absolute;left:122.40px;top:168.72px" class="cls_014"><span class="cls_014">Company’s competitors, agents, dealers, vendors, suppliers, sub-contractors, contractors or</span></div>
<div style="position:absolute;left:122.40px;top:186.00px" class="cls_014"><span class="cls_014">the like by whatever name called.</span></div>
<div style="position:absolute;left:86.40px;top:220.56px" class="cls_014"><span class="cls_014">7.</span></div>
<div style="position:absolute;left:122.40px;top:220.56px" class="cls_014"><span class="cls_014">I shall also fully declare the details of my existing or ongoing relationship with any other</span></div>
<div style="position:absolute;left:122.40px;top:237.72px" class="cls_014"><span class="cls_014">company or firm in any capacity whatsoever including but not limited to an Officer, Director,</span></div>
<div style="position:absolute;left:122.40px;top:255.00px" class="cls_014"><span class="cls_014">Consultant or any other personal relationship and details of any commission, abnormal gifts,</span></div>
<div style="position:absolute;left:122.40px;top:272.28px" class="cls_014"><span class="cls_014">remuneration or profits from such relationship.  Any new relationship as aforesaid shall be</span></div>
<div style="position:absolute;left:122.40px;top:289.56px" class="cls_014"><span class="cls_014">created only with the express knowledge and consent of the company.</span></div>
<div style="position:absolute;left:86.40px;top:324.00px" class="cls_014"><span class="cls_014">8.</span></div>
<div style="position:absolute;left:122.40px;top:324.00px" class="cls_014"><span class="cls_014">I shall disclose to the Company any and all information that comes to my knowledge during</span></div>
<div style="position:absolute;left:122.40px;top:341.28px" class="cls_014"><span class="cls_014">my course of employment that concerns me or my fellow colleagues that has or is likely to</span></div>
<div style="position:absolute;left:122.40px;top:358.56px" class="cls_014"><span class="cls_014">have an impact on the Company’s affairs.</span></div>
<div style="position:absolute;left:86.40px;top:393.00px" class="cls_014"><span class="cls_014">9.</span></div>
<div style="position:absolute;left:122.40px;top:393.00px" class="cls_014"><span class="cls_014">I confirm that I will ensure adherence to the aforesaid requirements in relation to the</span></div>
<div style="position:absolute;left:122.40px;top:410.28px" class="cls_014"><span class="cls_014">Company in which I am employed as well as any of its associate/group companies in relation</span></div>
<div style="position:absolute;left:122.40px;top:427.44px" class="cls_014"><span class="cls_014">to which I may be deemed to be associated during the course of my employment.</span></div>
<div style="position:absolute;left:108.60px;top:502.20px" class="cls_011"><span class="cls_011">Signed before: __________________</span></div>
<div style="position:absolute;left:316.20px;top:502.20px" class="cls_011"><span class="cls_011">Signature: _____________________</span></div>
<div style="position:absolute;left:108.48px;top:515.52px" class="cls_014"><span class="cls_014">(Signature by the Reporting Manager /</span></div>
<div style="position:absolute;left:375.84px;top:515.52px" class="cls_014"><span class="cls_014">(Employee’s Signature)</span></div>
<div style="position:absolute;left:111.36px;top:527.04px" class="cls_014"><span class="cls_014">Business Manager)</span></div>
<div style="position:absolute;left:316.20px;top:540.12px" class="cls_011"><span class="cls_011">Name: <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:316.92px;top:574.56px" class="cls_011"><span class="cls_011">Company ID No. : <span style="text-decoration: underline"> echo $this->employee->company_id</span></span></div>
<div style="position:absolute;left:108.48px;top:609.24px" class="cls_014"><span class="cls_014">Date  : ____________________</span></div>
<div style="position:absolute;left:108.60px;top:632.04px" class="cls_014"><span class="cls_014">Place : </span><span class="cls_011"> __________________</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 8 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:2300px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background09.jpg" width=612 height=1008></div>
<div style="position:absolute;left:228.24px;top:73.20px" class="cls_018"><span class="cls_018">CODE OF CONDUCT</span></div>
<div style="position:absolute;left:86.40px;top:111.12px" class="cls_011"><span class="cls_011">1. Private Trade & Employment:</span></div>
<div style="position:absolute;left:86.40px;top:134.28px" class="cls_014"><span class="cls_014">The employee shall devote his/her whole time to Company’s work. No employee shall except with the</span></div>
<div style="position:absolute;left:86.40px;top:145.80px" class="cls_014"><span class="cls_014">prior written permission of the management, engage either directly or indirectly in any trade of</span></div>
<div style="position:absolute;left:86.40px;top:157.32px" class="cls_014"><span class="cls_014">business either with or without remuneration during the course of his/her employment with the</span></div>
<div style="position:absolute;left:86.40px;top:168.72px" class="cls_014"><span class="cls_014">company.</span></div>
<div style="position:absolute;left:104.40px;top:191.76px" class="cls_014"><span class="cls_014">a)   An employee may, however, undertake honorary work, which is social/ charitable/religious</span></div>
<div style="position:absolute;left:122.40px;top:203.28px" class="cls_014"><span class="cls_014">and do not interfere with employees performance of duties.</span></div>
<div style="position:absolute;left:104.40px;top:214.80px" class="cls_014"><span class="cls_014">b)   Confidential matters:</span></div>
<div style="position:absolute;left:122.40px;top:226.32px" class="cls_014"><span class="cls_014">No employee shall be associated in any way with media to reveal business/ technical</span></div>
<div style="position:absolute;left:122.40px;top:237.72px" class="cls_014"><span class="cls_014">information, unless authorized to do so. It is the responsibility of every employee to avoid</span></div>
<div style="position:absolute;left:122.40px;top:249.24px" class="cls_014"><span class="cls_014">actions that may have adverse reaction on any policy/ action of the company.</span></div>
<div style="position:absolute;left:104.40px;top:260.76px" class="cls_014"><span class="cls_014">c)   Gifts from suppliers/ customers:</span></div>
<div style="position:absolute;left:122.40px;top:272.28px" class="cls_014"><span class="cls_014">No employee shall directly or indirectly accept from any suppliers or customers gifts in cash</span></div>
<div style="position:absolute;left:122.40px;top:283.80px" class="cls_014"><span class="cls_014">or kind including any pecuniary advantage/ saving whether in India or abroad.</span></div>
<div style="position:absolute;left:86.40px;top:306.60px" class="cls_011"><span class="cls_011">2. Dealing with Company’s suppliers/ Customers:</span></div>
<div style="position:absolute;left:86.40px;top:329.76px" class="cls_014"><span class="cls_014">a) No employee either directly or indirectly be associated with supplies of goods/ materials/ services</span></div>
<div style="position:absolute;left:86.40px;top:341.28px" class="cls_014"><span class="cls_014">to the company.</span></div>
<div style="position:absolute;left:86.40px;top:352.80px" class="cls_014"><span class="cls_014">b) No employee will have either directly or indirectly any business arrangement outside the ambit or</span></div>
<div style="position:absolute;left:86.40px;top:364.20px" class="cls_014"><span class="cls_014">company’s dealings with the company’s customers, agents and suppliers.</span></div>
<div style="position:absolute;left:86.40px;top:375.72px" class="cls_014"><span class="cls_014">c) Concealment of information with regards to the above will be viewed very seriously by the</span></div>
<div style="position:absolute;left:86.40px;top:387.24px" class="cls_014"><span class="cls_014">management.</span></div>
<div style="position:absolute;left:86.40px;top:410.16px" class="cls_011"><span class="cls_011">3. Misconduct</span></div>
<div style="position:absolute;left:86.40px;top:433.20px" class="cls_014"><span class="cls_014">The following acts will be treated as misconduct:</span></div>
<div style="position:absolute;left:104.40px;top:444.72px" class="cls_014"><span class="cls_014">a)   Willful insubordination/ disobedience either alone/in association with others.</span></div>
<div style="position:absolute;left:104.40px;top:456.24px" class="cls_014"><span class="cls_014">b)   Taking bribes, causing sabotage and willful damage, theft or fraud in connection with</span></div>
<div style="position:absolute;left:122.40px;top:467.76px" class="cls_014"><span class="cls_014">company’s work or property.</span></div>
<div style="position:absolute;left:104.40px;top:479.28px" class="cls_014"><span class="cls_014">c)   Giving to the company false information or concealing information at any point of time,</span></div>
<div style="position:absolute;left:122.40px;top:490.80px" class="cls_014"><span class="cls_014">especially information which would forewarn the company about any harm likely to come</span></div>
<div style="position:absolute;left:122.40px;top:502.20px" class="cls_014"><span class="cls_014">from individual or competitors.</span></div>
<div style="position:absolute;left:104.40px;top:513.72px" class="cls_014"><span class="cls_014">d)   Habitual late attendance or absence from duty.</span></div>
<div style="position:absolute;left:104.40px;top:525.24px" class="cls_014"><span class="cls_014">e)   Habitual neglect of work, or negligence</span></div>
<div style="position:absolute;left:104.40px;top:536.76px" class="cls_014"><span class="cls_014">f)</span></div>
<div style="position:absolute;left:122.40px;top:536.76px" class="cls_014"><span class="cls_014">Smoking in prohibited areas</span></div>
<div style="position:absolute;left:104.40px;top:548.28px" class="cls_014"><span class="cls_014">g)</span></div>
<div style="position:absolute;left:122.40px;top:548.28px" class="cls_014"><span class="cls_014">Refusal to accept any communication from the management.</span></div>
<div style="position:absolute;left:104.40px;top:559.68px" class="cls_014"><span class="cls_014">h)</span></div>
<div style="position:absolute;left:122.40px;top:559.68px" class="cls_014"><span class="cls_014">Acting in a manner intended to bring discredit to the company.</span></div>
<div style="position:absolute;left:104.40px;top:571.20px" class="cls_014"><span class="cls_014">i)</span></div>
<div style="position:absolute;left:122.40px;top:571.20px" class="cls_014"><span class="cls_014">Drinking/ Gambling / Creating nuisance in the premises</span></div>
<div style="position:absolute;left:104.40px;top:582.72px" class="cls_014"><span class="cls_014">j)</span></div>
<div style="position:absolute;left:122.40px;top:582.72px" class="cls_014"><span class="cls_014">Spreading false rumors or other acts of indiscipline</span></div>
<div style="position:absolute;left:104.40px;top:594.24px" class="cls_014"><span class="cls_014">k)</span></div>
<div style="position:absolute;left:122.40px;top:594.24px" class="cls_014"><span class="cls_014">Money lending activities on premises of the company.</span></div>
<div style="position:absolute;left:86.40px;top:605.76px" class="cls_014"><span class="cls_014">I have read and understood clearly the code of conduct and agree to abide by the same.</span></div>
<div style="position:absolute;left:86.40px;top:640.08px" class="cls_011"><span class="cls_011">Accepted:______________________</span></div>
<div style="position:absolute;left:295.80px;top:640.08px" class="cls_011"><span class="cls_011">Name of Employee: <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->first_name." ".$father[0]." ".$this->employee->surname); </span></span></div>
<div style="position:absolute;left:136.32px;top:651.60px" class="cls_011"><span class="cls_011">(Employee’s Signature)</span></div>
<div style="position:absolute;left:86.40px;top:663.12px" class="cls_011"><span class="cls_011">Date :  _____________</span></div>
<div style="position:absolute;left:291.96px;top:663.12px" class="cls_011"><span class="cls_011">Company ID No. : <span style="text-decoration: underline"> echo $this->employee->company_id</span></span></div>
<div style="position:absolute;left:86.40px;top:686.16px" class="cls_011"><span class="cls_011">Branch :_______________</span></div>
<div style="position:absolute;left:490.20px;top:769.06px" class="cls_012"><span class="cls_012">Page 9 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:2500px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background10.jpg" width=612 height=1008></div>
<div style="position:absolute;left:267.60px;top:62.16px" class="cls_011"><span class="cls_011">APPLICATION BLANK</span></div>
<div style="position:absolute;left:460.20px;top:72.36px" class="cls_014"><span class="cls_014">Please paste recent</span></div>
<div style="position:absolute;left:474.96px;top:83.88px" class="cls_014"><span class="cls_014">passport size</span></div>
<div style="position:absolute;left:478.56px;top:95.28px" class="cls_014"><span class="cls_014">Photograph</span></div>
<div style="position:absolute;left:209.28px;top:99.12px" class="cls_014"><span class="cls_014">POSITION <span style="text-decoration: underline"> if($this->personal->position){echo $this->personal->position;} else{echo "__________________";}</span></span></div>
<div style="position:absolute;left:86.52px;top:109.56px" class="cls_027"><span class="cls_027">HUMAN RESOURCES</span></div>
<div style="position:absolute;left:209.28px;top:122.16px" class="cls_014"><span class="cls_014">COMPANY ID NO : <span style="text-decoration: underline"> if($this->employee->company_id){echo $this->employee->company_id;}else{echo "__________________";}</span></span></div>
<div style="position:absolute;left:83.28px;top:165.96px" class="cls_028"><span class="cls_028">NAME <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->surname." ".$this->employee->first_name." ".$father[0]); </span></span></div>
<div style="position:absolute;left:212.28px;top:175.20px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:334.56px;top:175.20px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:452.40px;top:175.20px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:83.28px;top:193.56px" class="cls_028"><span class="cls_028">PERMANENT ADDRESS. <span style="text-decoration: underline"> echo $this->personal->permanent_address</span></span></div>
<div style="position:absolute;left:83.28px;top:221.16px" class="cls_028"><span class="cls_028"> POSTAL CODE:<span style="text-decoration: underline"> echo $this->personal->permanent_postal_code</span> TEL NO.  (DAY) <span style="text-decoration: underline"> echo $this->personal->permanent_contact[day]</span>  (NIGHT) <span style="text-decoration: underline"> echo $this->personal->permanent_contact[night]</span></span></div>
<div style="position:absolute;left:83.28px;top:244.20px" class="cls_028"><span class="cls_028">CORRESPONDENCE  ADDRESS: <span style="text-decoration: underline"> echo $this->personal->correspondence_address</span></span></div>
<div style="position:absolute;left:83.28px;top:262.56px" class="cls_028"><span class="cls_028">POSTAL CODE: <span style="text-decoration: underline"> echo $this->personal->correspondence_postal_code</span> TEL NO.  (DAY) <span style="text-decoration: underline"> echo $this->personal->correspondence_contact[day]</span>  (NIGHT) <span style="text-decoration: underline"> echo $this->personal->correspondence_contact[night]</span></span></div>
<div style="position:absolute;left:83.28px;top:280.92px" class="cls_028"><span class="cls_028">E-MAIL: <span style="text-decoration: underline"> echo $this->personal->email</span> MOBILE NO: <span style="text-decoration: underline"> echo $this->personal->mobile</span></span></div>
<div style="position:absolute;left:454.92px;top:296.88px" class="cls_030"><span class="cls_030"><span style="color:black"> if(!empty($this->personal->date_of_birth)){echo date("d",strtotime($this->personal->date_of_birth));}</span></span></div>
<div style="position:absolute;left:489.96px;top:296.64px" class="cls_031"><span class="cls_031"><span style="color:black"> if(!empty($this->personal->date_of_birth)){echo date("m",strtotime($this->personal->date_of_birth));}</span></span></div>
<div style="position:absolute;left:531.00px;top:296.16px" class="cls_030"><span class="cls_030"><span style="color:black"> if(!empty($this->personal->date_of_birth)){echo date("Y",strtotime($this->personal->date_of_birth));}</span></span></div>
<div style="position:absolute;left:83.28px;top:299.40px" class="cls_028"><span class="cls_028">PLACE OF BIRTH <span style="text-decoration: underline"> echo $this->personal->place_of_birth</span>STATE <span style="text-decoration: underline"> echo $this->personal->state</span>DATE OF BIRTH :</span></div>
<div style="position:absolute;left:83.28px;top:317.76px" class="cls_028"><span class="cls_028">MARITAL STATUS:</span></div>
<div style="position:absolute;left:170.04px;top:315.12px" class="cls_028"> echo $this->personal->marital_status</span></div>
<div style="position:absolute;left:289.68px;top:317.76px" class="cls_028"><span class="cls_028">NATIONALITY : <span style="text-decoration: underline"> echo $this->personal->nationality</span>   BLOOD GROUP <span style="text-decoration: underline"> echo $this->personal->blood_group</span></span></div>
<div style="position:absolute;left:83.28px;top:336.12px" class="cls_028"><span class="cls_028">MARRIED DATE: <span style="text-decoration: underline"> if(!empty($this->personal->date_of_marriage)){echo date("F d, Y",strtotime($this->personal->date_of_marriage));}</span> PAN No:<span style="text-decoration: underline"> echo $this->personal->pan_number;</span>  GENDER:   echo $this->personal->gender;</span></div>
<div style="position:absolute;left:482.28px;top:336.12px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:83.28px;top:354.48px" class="cls_028"><span class="cls_028">AADHAAR Enrollment No: <span style="text-decoration: underline"> echo $this->personal->aadhaar_enrollment_number</span> </span><span class="cls_029">OR</span><span class="cls_028">  AADHAAR No: <span style="text-decoration: underline"> echo $this->personal->aadhaar_number;</span></span></div>
<div style="position:absolute;left:210.12px;top:363.72px" class="cls_028"><span class="cls_028">(submit AADHAAR Card within 3 months from date of final offer )</span></div>
<div style="position:absolute;left:83.28px;top:382.20px" class="cls_028"><span class="cls_028">PASSPORT NO. <span style="text-decoration: underline"> echo $this->personal->passport_number</span></span></div>
<div style="position:absolute;left:103.80px;top:398.76px" class="cls_029"><span class="cls_029">RELATIONSHIP</span></div>
<div style="position:absolute;left:242.88px;top:398.76px" class="cls_029"><span class="cls_029">NAME</span></div>
<div style="position:absolute;left:326.52px;top:398.76px" class="cls_029"><span class="cls_029">AGE</span></div>
<div style="position:absolute;left:388.08px;top:398.76px" class="cls_029"><span class="cls_029">EDUCATION</span></div>
<div style="position:absolute;left:495.60px;top:398.76px" class="cls_029"><span class="cls_029">OCCUPATION</span></div>
<div style="position:absolute;left:82.80px;top:416.40px" class="cls_028"><span class="cls_028">FATHER</span><span style="margin-left:100px"> echo $this->personal->father_details->name</span><span style="margin-left:65px"> echo $this->personal->father_details->age</span><span style="margin-left:55px"> echo $this->personal->father_details->education</span><span style="margin-left:75px"> echo $this->personal->father_details->occupation</span></div>
<div style="position:absolute;left:82.80px;top:433.92px" class="cls_028"><span class="cls_028">MOTHER</span><span style="margin-left:100px"> echo $this->personal->mother_details->name</span><span style="margin-left:60px"> echo $this->personal->mother_details->age</span><span style="margin-left:55px"> echo $this->personal->mother_details->education</span><span style="margin-left:75px"> echo $this->personal->mother_details->occupation</span></div>
<div style="position:absolute;left:82.80px;top:451.44px" class="cls_028"><span class="cls_028">SPOUSE</span><span style="margin-left:100px"> echo $this->personal->spouse_details->name</span><span style="margin-left:65px"> echo $this->personal->spouse_details->age</span><span style="margin-left:55px"> echo $this->personal->spouse_details->education</span><span style="margin-left:75px"> echo $this->personal->spouse_details->occupation</span></div>
<div style="position:absolute;left:85.44px;top:474.48px" class="cls_028"><span class="cls_028">CHILDREN</span></div>
<div style="position:absolute;left:141.96px;top:474.48px" class="cls_028"><span class="cls_028">(1)</span><span style="margin-left:70px"> echo $this->personal->children_details[0]->name</span><span style="margin-left:50px"> echo $this->personal->children_details[0]->age</span><span style="margin-left:40px"> echo $this->personal->children_details[0]->education</span><span style="margin-left:75px"> echo $this->personal->children_details[0]->occupation</span></div>
<div style="position:absolute;left:141.12px;top:492.84px" class="cls_028"><span class="cls_028">(2)</span><span style="margin-left:70px"> echo $this->personal->children_details[1]->name</span><span style="margin-left:50px"> echo $this->personal->children_details[1]->age</span><span style="margin-left:40px"> echo $this->personal->children_details[1]->education</span><span style="margin-left:75px"> echo $this->personal->children_details[1]->occupation</span></div>
<div style="position:absolute;left:141.12px;top:511.32px" class="cls_028"><span class="cls_028">(3)</span><span style="margin-left:70px"> echo $this->personal->children_details[2]->name</span><span style="margin-left:50px"> echo $this->personal->children_details[2]->age</span><span style="margin-left:40px"> echo $this->personal->children_details[2]->education</span><span style="margin-left:75px"> echo $this->personal->children_details[2]->occupation</span></div>
<div style="position:absolute;left:82.80px;top:530.16px" class="cls_028"><span class="cls_028">BROTHER(S)</span></div>
<div style="position:absolute;left:139.32px;top:530.16px" class="cls_028"><span class="cls_028">(1)</span><span style="margin-left:70px"> echo $this->personal->brother_details[0]->name</span><span style="margin-left:50px"> echo $this->personal->brother_details[0]->age</span><span style="margin-left:40px"> echo $this->personal->brother_details[0]->education</span><span style="margin-left:75px"> echo $this->personal->brother_details[0]->occupation</span></div>
<div style="position:absolute;left:140.76px;top:548.64px" class="cls_028"><span class="cls_028">(2)</span><span style="margin-left:70px"> echo $this->personal->brother_details[1]->name</span><span style="margin-left:50px"> echo $this->personal->brother_details[1]->age</span><span style="margin-left:40px"> echo $this->personal->brother_details[1]->education</span><span style="margin-left:75px"> echo $this->personal->brother_details[1]->occupation</span></div>
<div style="position:absolute;left:140.76px;top:567.00px" class="cls_028"><span class="cls_028">(3)</span><span style="margin-left:70px"> echo $this->personal->brother_details[2]->name</span><span style="margin-left:50px"> echo $this->personal->brother_details[2]->age</span><span style="margin-left:40px"> echo $this->personal->brother_details[2]->education</span><span style="margin-left:75px"> echo $this->personal->brother_details[2]->occupation</span></div>
<div style="position:absolute;left:82.80px;top:584px" class="cls_028"><span class="cls_028">SISTER(S)</span></div>
<div style="position:absolute;left:140.28px;top:583px" class="cls_028"><span class="cls_028">(1)</span><span style="margin-left:70px"> echo $this->personal->sister_details[0]->name</span><span style="margin-left:50px"> echo $this->personal->sister_details[0]->age</span><span style="margin-left:40px"> echo $this->personal->sister_details[0]->education</span><span style="margin-left:75px"> echo $this->personal->sister_details[0]->occupation</span></div>
<div style="position:absolute;left:140.76px;top:600px" class="cls_028"><span class="cls_028">(2)</span><span style="margin-left:70px"> echo $this->personal->sister_details[1]->name</span><span style="margin-left:50px"> echo $this->personal->sister_details[1]->age</span><span style="margin-left:40px"> echo $this->personal->sister_details[1]->education</span><span style="margin-left:75px"> echo $this->personal->sister_details[1]->occupation</span></div>
<div style="position:absolute;left:140.76px;top:620px" class="cls_028"><span class="cls_028">(3)</span><span style="margin-left:70px"> echo $this->personal->sister_details[2]->name</span><span style="margin-left:50px"> echo $this->personal->sister_details[2]->age</span><span style="margin-left:40px"> echo $this->personal->sister_details[2]->education</span><span style="margin-left:75px"> echo $this->personal->sister_details[2]->occupation</span></div>
<div style="position:absolute;left:82.80px;top:653.88px" class="cls_028"><span class="cls_028">APPROXIMATE FAMILY INCOME:  RS. <span style="text-decoration: underline"> echo $this->personal->family_income</span>  PER ANNUM</span></div>
<div style="position:absolute;left:195.36px;top:669.24px" class="cls_028"><span class="cls_028">IN CASE OF AN EMERGENCY WHO SHOULD BE INFORMED?</span></div>
<div style="position:absolute;left:55.80px;top:689.88px" class="cls_028"><span class="cls_028">Name: <span style="text-decoration: underline"> echo $this->personal->emergency_details[0]->name</span></span></div>
<div style="position:absolute;left:316.80px;top:689.88px" class="cls_028"><span class="cls_028">Name: <span style="text-decoration: underline"> echo $this->personal->emergency_details[1]->name</span></span></div>
<div style="position:absolute;left:55.80px;top:703.68px" class="cls_028"><span class="cls_028">Contact Number: <span style="text-decoration: underline"> echo $this->personal->emergency_details[0]->contact</span></span></div>
<div style="position:absolute;left:316.80px;top:703.68px" class="cls_028"><span class="cls_028">Contact Number: <span style="text-decoration: underline"> echo $this->personal->emergency_details[1]->contact</span></span></div>
<div style="position:absolute;left:55.80px;top:717.48px" class="cls_028"><span class="cls_028">Relationship: <span style="text-decoration: underline"> echo $this->personal->emergency_details[0]->relation</span></span></div>
<div style="position:absolute;left:316.80px;top:717.48px" class="cls_028"><span class="cls_028">Relationship: <span style="text-decoration: underline"> echo $this->personal->emergency_details[1]->relation</span></span></div>
<div style="position:absolute;left:55.80px;top:731.28px" class="cls_028"><span class="cls_028">Address: <span style="text-decoration: underline"> echo $this->personal->emergency_details[0]->address</span></span></div>
<div style="position:absolute;left:316.80px;top:731.28px" class="cls_028"><span class="cls_028">Address: <span style="text-decoration: underline"> echo $this->personal->emergency_details[1]->address</span></span></div>
<div style="position:absolute;left:55.80px;top:745.08px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:316.80px;top:745.08px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:485.76px;top:769.06px" class="cls_012"><span class="cls_012">Page 10 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:2800px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:absolute;left:-150px;top:240px;-webkit-transform: rotate(270deg);
-moz-transform: rotate(270deg);
-o-transform: rotate(270deg);
writing-mode: lr-tb;">
<table border="solid" style="font-family: Arial,serif">
	<tr>
		<td colspan="10">
			<center>E D U C A T I O N&nbsp;&nbsp;&nbsp;&nbsp;D E T A I L S</center>
		</td>
		
	</tr>
	<tr>
		<td rowspan="2">
			<label>QUALIFICATION TYPE</label>
		</td>
		<td rowspan="2">
			<label>STATUS<br/>(PASS/FAIL/PURSUING)</label>
		</td>
		<td colspan="2" style="text-align: center">
			<label>PERIOD</label>
		</td>
		<td rowspan="2">
			<label>NAME AND ADDRESS OF THE COLLEGE/INSTITUTE</label>
		</td>
		<td rowspan="2">
			<label>BOARD / UNIVERSITY WITH LOCATION</label>
		</td>
		<td rowspan="2">
			<label>ROLL NO. / REGISTRATION NO</label>
		</td>
		<td rowspan="2">
			<label>DIVISION/%MARKS/CGPA</label>
		</td>
		<td rowspan="2">
			<label>YEAR OF PASSING</label>
		</td>
		<td rowspan="2">
			<label>SPECIAL MAJOR SUBJECTS</label>
		</td>
	</tr>
	<tr>
	<td>
	<label>FROM (YEAR)</label></td>
	<td>
	<label>TO (YEAR)</label>
	</td>
	</tr>
	<tr>
		<td>
			<label>SSC OR EQUIVALENT(PLS SPECIFY)</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->ssc_details->result_status</td><td style="text-align: center"> echo $this->educational->ssc_details->from_year</td><td style="text-align: center"> echo $this->educational->ssc_details->to_year</td><td style="text-align: center"> echo $this->educational->ssc_details->college_name</td><td style="text-align: center"> echo $this->educational->ssc_details->university_name</td>
		<td style="text-align: center"> echo $this->educational->ssc_details->reg_number</td><td style="text-align: center"> echo $this->educational->ssc_details->marks</td><td style="text-align: center"> echo $this->educational->ssc_details->year_of_passing</td><td style="text-align: center"> echo $this->educational->ssc_details->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>HSC OR EQUIVALENT(PLS SPECIFY)</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->hsc_details->result_status</td><td style="text-align: center"> echo $this->educational->hsc_details->from_year</td><td style="text-align: center"> echo $this->educational->hsc_details->to_year</td><td style="text-align: center"> echo $this->educational->hsc_details->college_name</td><td style="text-align: center"> echo $this->educational->hsc_details->university_name</td>
		<td style="text-align: center"> echo $this->educational->hsc_details->reg_number</td><td style="text-align: center"> echo $this->educational->hsc_details->marks</td><td style="text-align: center"> echo $this->educational->hsc_details->year_of_passing</td><td style="text-align: center"> echo $this->educational->hsc_details->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>GRADUATION DEGREE OBTAINED</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->graduation_details[0]->result_status</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->from_year</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->to_year</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->college_name</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->university_name</td>
		<td style="text-align: center"> echo $this->educational->graduation_details[0]->reg_number</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->marks</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->year_of_passing</td><td style="text-align: center"> echo $this->educational->graduation_details[0]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>I YEAR</label>
		</td>
		<td style="text-align: center"> echo $this->educational->graduation_details[1]->result_status</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->from_year</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->to_year</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->college_name</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->university_name</td>
		<td style="text-align: center"> echo $this->educational->graduation_details[1]->reg_number</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->marks</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->year_of_passing</td><td style="text-align: center"> echo $this->educational->graduation_details[1]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>II YEAR</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->graduation_details[2]->result_status</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->from_year</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->to_year</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->college_name</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->university_name</td>
		<td style="text-align: center"> echo $this->educational->graduation_details[2]->reg_number</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->marks</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->year_of_passing</td><td style="text-align: center"> echo $this->educational->graduation_details[2]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>III YEAR</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->graduation_details[3]->result_status</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->from_year</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->to_year</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->college_name</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->university_name</td>
		<td style="text-align: center"> echo $this->educational->graduation_details[3]->reg_number</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->marks</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->year_of_passing</td><td style="text-align: center"> echo $this->educational->graduation_details[3]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>POST GRAD UATION OBTAINED</label>
		</td>	
		<td style="text-align: center"> echo $this->educational->post_graduation_details[0]->result_status</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->from_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->to_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->college_name</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->university_name</td>
		<td style="text-align: center"> echo $this->educational->post_graduation_details[0]->reg_number</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->marks</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->year_of_passing</td><td style="text-align: center"> echo $this->educational->post_graduation_details[0]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>I YEAR</label>
		</td>	
		<td style="text-align: center"> echo $this->educational->post_graduation_details[1]->result_status</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->from_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->to_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->college_name</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->university_name</td>
		<td style="text-align: center"> echo $this->educational->post_graduation_details[1]->reg_number</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->marks</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->year_of_passing</td><td style="text-align: center"> echo $this->educational->post_graduation_details[1]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>II YEAR</label>
		</td>
		<td style="text-align: center"> echo $this->educational->post_graduation_details[2]->result_status</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->from_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->to_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->college_name</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->university_name</td>
		<td style="text-align: center"> echo $this->educational->post_graduation_details[2]->reg_number</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->marks</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->year_of_passing</td><td style="text-align: center"> echo $this->educational->post_graduation_details[2]->major_subjects</td>
	</tr>
	<tr>
		<td>
			<label>III YEAR</label>
		</td>		
		<td style="text-align: center"> echo $this->educational->post_graduation_details[3]->result_status</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->from_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->to_year</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->college_name</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->university_name</td>
		<td style="text-align: center"> echo $this->educational->post_graduation_details[3]->reg_number</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->marks</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->year_of_passing</td><td style="text-align: center"> echo $this->educational->post_graduation_details[3]->major_subjects</td>
	<tr>
		<td>
			<label>ANY OTHER QUALIFICATION PHD / ACA / ACS</label>
		</td>
		<td style="text-align: center"> echo $this->educational->other_qualification->result_status</td><td style="text-align: center"> echo $this->educational->other_qualification->from_year</td><td style="text-align: center"> echo $this->educational->other_qualification->to_year</td><td style="text-align: center"> echo $this->educational->other_qualification->college_name</td><td style="text-align: center"> echo $this->educational->other_qualification->university_name</td>
		<td style="text-align: center"> echo $this->educational->other_qualification->reg_number</td><td style="text-align: center"> echo $this->educational->other_qualification->marks</td><td style="text-align: center"> echo $this->educational->other_qualification->year_of_passing</td><td style="text-align: center"> echo $this->educational->other_qualification->major_subjects</td>
	</tr>		
</table></div>
<div style="position:absolute;left:499.20px;top:950px" class="cls_012"><span class="cls_012">Page 11 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:3100px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background12.jpg" width=612 height=1008></div>
<div style="position:absolute;left:60.96px;top:68.40px" class="cls_032"><span class="cls_032">Employment History (Most Recent Previous Employer)-1</span></div>
<div style="position:absolute;left:68.40px;top:86.88px" class="cls_014"><span class="cls_014">Company Name:</span><br/><span> echo $this->empdetails->employment_history[0]->company_name</span></div>
<div style="position:absolute;left:397.80px;top:86.88px" class="cls_014"><span class="cls_014">Company ID No./Employee code</span><br/><span> echo $this->empdetails->employment_history[0]->company_id</span></div>
<div style="position:absolute;left:68.40px;top:121.92px" class="cls_014"><span class="cls_014">Company Address (Main office & branch where worked)</span><br/><span> echo $this->empdetails->employment_history[0]->company_address</span></div>
<div style="position:absolute;left:397.80px;top:121.92px" class="cls_014"><span class="cls_014">Company Telephone No.</span><br/><span> echo $this->empdetails->employment_history[0]->company_contact</span></div>
<div style="position:absolute;left:68.40px;top:168.36px" class="cls_014"><span class="cls_014">From Date</span><br/><span> echo $this->empdetails->employment_history[0]->from_date</span></div>
<div style="position:absolute;left:162.84px;top:168.36px" class="cls_014"><span class="cls_014">To Date</span><br/><span> echo $this->empdetails->employment_history[0]->to_date</span></div>
<div style="position:absolute;left:257.64px;top:168.36px" class="cls_014"><span class="cls_014">Designation on Leaving</span><br/><span> echo $this->empdetails->employment_history[0]->designation_on_leaving</span></div>
<div style="position:absolute;left:397.80px;top:168.36px" class="cls_014"><span class="cls_014">HR Grade:</span><br/><span> echo $this->empdetails->employment_history[0]->hr_grade</span></div>
<div style="position:absolute;left:68.40px;top:179.88px" class="cls_033"><span class="cls_033"></span></div>
<div style="position:absolute;left:162.84px;top:179.88px" class="cls_033"><span class="cls_033"></span></div>
<div style="position:absolute;left:68.40px;top:208.92px" class="cls_014"><span class="cls_014">Department:</span><br/><span> echo $this->empdetails->employment_history[0]->department</span></div>
<div style="position:absolute;left:198.84px;top:208.92px" class="cls_014"><span class="cls_014">No. of persons reporting to</span></div>
<div style="position:absolute;left:348.24px;top:208.92px" class="cls_014"><span class="cls_014">Main Job Responsibilities / Accountabilities</span><br/><span> echo $this->empdetails->employment_history[0]->job_responsibilities</span></div>
<div style="position:absolute;left:198.84px;top:220.32px" class="cls_014"><span class="cls_014">you: </span><span> echo $this->empdetails->employment_history[0]->reporting_persons</span></div>
<div style="position:absolute;left:68.40px;top:254.64px" class="cls_014"><span class="cls_014">Reason for Leaving:</span><br/><span> echo $this->empdetails->employment_history[0]->reason_for_leaving</span></div>
<div style="position:absolute;left:68.40px;top:302.88px" class="cls_014"><span class="cls_014">Salary Amount</span><br/><span> echo $this->empdetails->employment_history[0]->salary_amount</span></div>
<div style="position:absolute;left:348.24px;top:302.88px" class="cls_014"><span class="cls_014">Salary Type</span></div>
<div style="position:absolute;left:375.96px;top:318.72px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[0]->salary_type</span></span></div>
<div style="position:absolute;left:375.96px;top:334.68px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:375.96px;top:350.52px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:68.40px;top:365.52px" class="cls_014"><span class="cls_014">Achievements:</span><br/><span> echo $this->empdetails->employment_history[0]->achievements</span></div>
<div style="position:absolute;left:68.40px;top:423.96px" class="cls_011"><span class="cls_011">Supervisor Name</span><br/><span> echo $this->empdetails->employment_history[0]->supervisor_name</span></div>
<div style="position:absolute;left:221.16px;top:423.96px" class="cls_011"><span class="cls_011">Designation</span><br/><span> echo $this->empdetails->employment_history[0]->supervisor_designation</span></div>
<div style="position:absolute;left:348.24px;top:423.96px" class="cls_011"><span class="cls_011">Supervisor Contact No.</span><br/><span> echo $this->empdetails->employment_history[0]->supervisor_contact</span></div>
<div style="position:absolute;left:348.24px;top:453.36px" class="cls_011"><span class="cls_011">Supervisor Email id.</span><br/><span> echo $this->empdetails->employment_history[0]->supervisor_email</span></div>
<div style="position:absolute;left:68.40px;top:483.00px" class="cls_014"><span class="cls_014">Employment Mode</span></div>
<div style="position:absolute;left:221.16px;top:483.00px" class="cls_014"><span class="cls_014">Nature of Employment</span></div>
<div style="position:absolute;left:348.24px;top:483.00px" class="cls_014"><span class="cls_014">Employment posting status</span></div>
<div style="position:absolute;left:101.16px;top:498.96px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[0]->employment_mode1</span></span></div>
<div style="position:absolute;left:249.96px;top:498.96px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[0]->nature_of_employment1</span></span></div>
<div style="position:absolute;left:378.84px;top:498.96px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[0]->employment_posting_status1</span></span></div>
<div style="position:absolute;left:101.28px;top:515.28px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:249.96px;top:514.92px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:378.84px;top:513.36px" class="cls_014"><span class="cls_014"></span><span class="cls_023"><sup>#</sup></span></div>
<div style="position:absolute;left:69.24px;top:530.64px" class="cls_014"><span class="cls_014">Deputed to (Client name)</span><br/><span> echo $this->empdetails->employment_history[0]->deputed_to</span></div>
<div style="position:absolute;left:221.16px;top:530.64px" class="cls_014"><span class="cls_014">Client address and contact details</span><br/><span> echo $this->empdetails->employment_history[0]->client_address</span></div>
<div style="position:absolute;left:69.24px;top:575.16px" class="cls_014"><span class="cls_014">Supporting documents</span></div>
<div style="position:absolute;left:251.16px;top:576.60px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[0]->supporting_documents[0]</span></span></div>
<div style="position:absolute;left:411.84px;top:576.60px" class="cls_014"><span class="cls_014"></span> echo $this->empdetails->employment_history[0]->supporting_documents[1]</div>
<div style="position:absolute;left:251.28px;top:592.92px" class="cls_014"><span class="cls_014"></span> echo $this->empdetails->employment_history[0]->supporting_documents[2]</div>
<div style="position:absolute;left:412.44px;top:592.92px" class="cls_014"><span class="cls_014"></span> echo $this->empdetails->employment_history[0]->supporting_documents[3]</div>
<div style="position:absolute;left:411.36px;top:604.80px" class="cls_014"><span class="cls_014"></span> echo $this->empdetails->employment_history[0]->supporting_documents[4]</div>
<div style="position:absolute;left:251.28px;top:609.24px" class="cls_014"><span class="cls_014"></span> echo $this->empdetails->employment_history[0]->supporting_documents[5]</div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 12 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:3200px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background13.jpg" width=612 height=1008></div>
<div style="position:absolute;left:64.20px;top:88.20px" class="cls_032"><span class="cls_032">Previous Employer 2</span></div>
<div style="position:absolute;left:68.40px;top:106.68px" class="cls_014"><span class="cls_014">Company Name:</span><br/><span> echo $this->empdetails->employment_history[1]->company_name</span></div>
<div style="position:absolute;left:397.80px;top:106.68px" class="cls_014"><span class="cls_014">Company ID No./Employee code</span><br/><span> echo $this->empdetails->employment_history[1]->company_id</span></div>
<div style="position:absolute;left:68.40px;top:141.72px" class="cls_014"><span class="cls_014">Company Address (Main office & branch where worked)</span><br/><span> echo $this->empdetails->employment_history[1]->company_address</span></div>
<div style="position:absolute;left:397.80px;top:141.72px" class="cls_014"><span class="cls_014">Company Telephone No.</span><br/><span> echo $this->empdetails->employment_history[1]->company_contact</span></div>
<div style="position:absolute;left:68.40px;top:188.16px" class="cls_014"><span class="cls_014">From Date</span><br/><span> echo $this->empdetails->employment_history[1]->from_date</span></div>
<div style="position:absolute;left:162.84px;top:188.16px" class="cls_014"><span class="cls_014">To Date</span><br/><span> echo $this->empdetails->employment_history[1]->to_date</span></div>
<div style="position:absolute;left:257.64px;top:188.16px" class="cls_014"><span class="cls_014">Designation on Leaving</span><br/><span> echo $this->empdetails->employment_history[1]->designation_on_leaving</span></div>
<div style="position:absolute;left:397.80px;top:188.16px" class="cls_014"><span class="cls_014">HR Grade:</span><br/><span> echo $this->empdetails->employment_history[1]->hr_grade</span></div>
<div style="position:absolute;left:68.40px;top:199.68px" class="cls_034"><span class="cls_034"></span></div>
<div style="position:absolute;left:162.84px;top:199.68px" class="cls_034"><span class="cls_034"></span></div>
<div style="position:absolute;left:68.40px;top:228.72px" class="cls_014"><span class="cls_014">Department:</span><br/><span> echo $this->empdetails->employment_history[1]->department</span></div>
<div style="position:absolute;left:198.84px;top:228.72px" class="cls_014"><span class="cls_014">No. of persons reporting to</span></div>
<div style="position:absolute;left:348.24px;top:228.72px" class="cls_014"><span class="cls_014">Main Job Responsibilities / Accountabilities</span><br/><span> echo $this->empdetails->employment_history[1]->job_responsibilities</span></div>
<div style="position:absolute;left:198.84px;top:240.12px" class="cls_014"><span class="cls_014">you: </span><span> echo $this->empdetails->employment_history[1]->reporting_persons</span></div>
<div style="position:absolute;left:68.40px;top:274.44px" class="cls_014"><span class="cls_014">Reason for Leaving:</span><br/><span> echo $this->empdetails->employment_history[1]->reason_for_leaving</span></div>
<div style="position:absolute;left:68.40px;top:322.56px" class="cls_014"><span class="cls_014">Salary Amount</span><br/><span> echo $this->empdetails->employment_history[1]->salary_amount</span></div>
<div style="position:absolute;left:348.24px;top:322.56px" class="cls_014"><span class="cls_014">Salary Type</span></div>
<div style="position:absolute;left:375.96px;top:338.52px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->salary_type</span></span></div>
<div style="position:absolute;left:375.96px;top:354.48px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:375.96px;top:370.32px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:68.40px;top:385.32px" class="cls_014"><span class="cls_014">Achievements:</span><br/><span> echo $this->empdetails->employment_history[1]->achievements</span></div>
<div style="position:absolute;left:68.40px;top:443.76px" class="cls_011"><span class="cls_011">Supervisor Name</span><br/><span> echo $this->empdetails->employment_history[1]->supervisor_name</span></div>
<div style="position:absolute;left:221.16px;top:443.76px" class="cls_011"><span class="cls_011">Designation</span><br/><span> echo $this->empdetails->employment_history[1]->supervisor_designation</span></div>
<div style="position:absolute;left:348.24px;top:443.76px" class="cls_011"><span class="cls_011">Supervisor Contact No.</span><br/><span> echo $this->empdetails->employment_history[1]->supervisor_contact</span></div>
<div style="position:absolute;left:348.24px;top:473.16px" class="cls_011"><span class="cls_011">Supervisor Email id.</span><br/><span> echo $this->empdetails->employment_history[1]->supervisor_email</span></div>
<div style="position:absolute;left:68.40px;top:502.80px" class="cls_014"><span class="cls_014">Employment Mode</span></div>
<div style="position:absolute;left:221.16px;top:502.80px" class="cls_014"><span class="cls_014">Nature of Employment</span></div>
<div style="position:absolute;left:348.24px;top:502.80px" class="cls_014"><span class="cls_014">Employment posting status</span></div>
<div style="position:absolute;left:101.16px;top:518.76px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->employment_mode2</span></span></div>
<div style="position:absolute;left:249.96px;top:518.76px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->nature_of_employment2</span></span></div>
<div style="position:absolute;left:378.84px;top:518.76px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->employment_posting_status2</span></span></div>
<div style="position:absolute;left:101.28px;top:535.08px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:249.96px;top:534.72px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:378.84px;top:533.16px" class="cls_014"><span class="cls_014"></span><span class="cls_023"><sup>#</sup></span></div>
<div style="position:absolute;left:69.24px;top:550.44px" class="cls_014"><span class="cls_014">Deputed to (Client name)</span><br/><span> echo $this->empdetails->employment_history[1]->deputed_to</span></div>
<div style="position:absolute;left:221.16px;top:550.44px" class="cls_014"><span class="cls_014">Client address and contact details</span><br/><span> echo $this->empdetails->employment_history[1]->client_address</span></div>
<div style="position:absolute;left:69.24px;top:594.96px" class="cls_014"><span class="cls_014">Supporting documents</span></div>
<div style="position:absolute;left:251.16px;top:596.40px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[0]</span></span></div>
<div style="position:absolute;left:411.84px;top:596.40px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[1]</span></span></div>
<div style="position:absolute;left:251.28px;top:612.72px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[2]</span></span></div>
<div style="position:absolute;left:412.44px;top:612.72px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[3]</span></span></div>
<div style="position:absolute;left:411.36px;top:624.60px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[4]</span></span></div>
<div style="position:absolute;left:251.28px;top:629.04px" class="cls_014"><span class="cls_014"><span> echo $this->empdetails->employment_history[1]->supporting_documents[5]</span></span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 13 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:3500px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:absolute;width:780px;left:-150px;top:450px;-webkit-transform: rotate(270deg);
-moz-transform: rotate(270deg);
-o-transform: rotate(270deg);
writing-mode: lr-tb;">
<table border="solid">
	<tr>
		<td colspan="10">
			<center>CONTINUED FROM PAGE NO 13 (Previous Page)</br>
START FROM THE JOBS MENTIONED ON PAGE NO 13 AND WORK BACKWORDS. PLEASE ALSO INDICATE GAPS IN EMPLOYMENT IF ANY</center>
		</td>
		
	</tr>
	<tr>
		<td rowspan="2">
			<label>SR NO.</label>
		</td>
		<td rowspan="2">
			<label>NAME & ADDRESS OF THE COMPANY WITH TEL NO. & REPORTING MANAGER</label>
		</td>
		<td rowspan="2">
			<label>COMPANY`S/ BUSINESS TURNOVER</label>
		</td>
		<td rowspan="2">
			<label>DESIGNATION & GRADE</label>
		</td>
		<td rowspan="2">
			<label>NO. OF PERSONS REPORTING TO YOU</label>
		</td>
		<td colspan="2" style="text-align: center">
			<label>TENURE</label>
		</td>
		<td rowspan="2">
			<label>MAJOR JOB RESPONSIBILITIES</label>
		</td>
		<td rowspan="2">
			<label>REASON FOR CHANGE</label>
		</td>
	</tr>
	<tr>
	<td><label>FROM</label>
	</td>
	<td><label>TO</label>
	</td>
	</tr>
	 foreach($this->emptimeline->employment_timeline as $key=>$eachtime){
	<tr>
		<td style="text-align: center">
			<label> echo $key+3;</label>
		</td>		
		<td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][company_name]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][company_turnover]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][designation]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][reporting_persons]</td>
		<td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][tenure_from]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][tenure_to]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][responsibilities]</td><td style="text-align: center"> echo $this->emptimeline->employment_timeline[$key][reason_for_change]</td>
	</tr>
	 } 
	<tr>
		<td colspan="10">
			<label>TOTAL WORK EXPERIENCE: <span style="text-decoration: underline"> echo $this->emptimeline->total_experience</span>  TOTAL RELEVANT WORK EXPERIENCE: <span style="text-decoration: underline"> echo $this->emptimeline->total_relevant_experience</span></label>
		</td>		
	<tr>
	
</table></div>
<div style="position:absolute;left:499.20px;top:820px" class="cls_012"><span class="cls_012">Page 14 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:3800px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background15.jpg" width=612 height=1008></div>
<div style="position:absolute;left:227.28px;top:96.00px" class="cls_035"><span class="cls_035">DECLARATION OF AUTHENTICITY</span></div>
<div style="position:absolute;left:72.84px;top:146.88px" class="cls_014"><span class="cls_014">I, <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->surname." ".$this->employee->first_name." ".$father[0]); </span> declare that all information provided by</span></div>
<div style="position:absolute;left:72.84px;top:169.80px" class="cls_014"><span class="cls_014">me in this `Employee Joining Kit` and `Application Blank` is valid and true and I undertake to furnish </span><span class="cls_011">Capital</span></div>
<div style="position:absolute;left:72.84px;top:192.72px" class="cls_011"><span class="cls_011">First Limited</span><span class="cls_014"> with the relevant proofs in support of my employment track record.</span></div>
<div style="position:absolute;left:63.00px;top:238.80px" class="cls_014"><span class="cls_014">I understand and agree that if at any point in time </span><span class="cls_011">Capital First Limited </span><span class="cls_014">ascertains any of the aforementioned</span></div>
<div style="position:absolute;left:63.00px;top:261.84px" class="cls_014"><span class="cls_014">information false and/or incorrect; it may take any appropriate action as deemed fit. In such an event, I fully</span></div>
<div style="position:absolute;left:63.00px;top:284.88px" class="cls_014"><span class="cls_014">understand that this could lead to forfeiture of my employment with the Company and hereby indemnify the</span></div>
<div style="position:absolute;left:63.00px;top:307.80px" class="cls_014"><span class="cls_014">Company of the same.</span></div>
<div style="position:absolute;left:72.84px;top:369.84px" class="cls_011"><span class="cls_011">Signature: ___________________________</span></div>
<div style="position:absolute;left:144.96px;top:381.36px" class="cls_011"><span class="cls_011">(Employee`s Signature)</span></div>
<div style="position:absolute;left:72.84px;top:415.80px" class="cls_011"><span class="cls_011">Location: ____________________________</span></div>
<div style="position:absolute;left:72.84px;top:461.88px" class="cls_011"><span class="cls_011">Date: ______________________________</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 15 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:4100px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background16.jpg" width="612" height="1008"></div>
<div style="position:absolute;left:225.12px;top:70.80px" class="cls_035"><span class="cls_035">SCREENING AUTHORIZATION</span></div>
<div style="position:absolute;left:229.92px;top:98.40px" class="cls_022"><span class="cls_022">To whomsoever it may concern</span></div>
<div style="position:absolute;left:72.84px;top:146.88px" class="cls_014"><span class="cls_014">I, <span style="text-decoration: underline"> echo strtoupper($this->employee->title." ".$this->employee->surname." ".$this->employee->first_name." ".$father[0]); </span>, fully understand that all the</span></div>
<div style="position:absolute;left:195.24px;top:146.88px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:300.84px;top:146.88px" class="cls_014"><span class="cls_014"></span></div>
<div style="position:absolute;left:106.32px;top:158.40px" class="cls_036"><span class="cls_036"></span></div>
<div style="position:absolute;left:216.72px;top:158.40px" class="cls_036"><span class="cls_036"></span></div>
<div style="position:absolute;left:324.72px;top:158.40px" class="cls_036"><span class="cls_036"></span></div>
<div style="position:absolute;left:72.84px;top:167.64px" class="cls_014"><span class="cls_014">representations made by me in this Application Blank along with their supporting documental proofs would</span></div>
<div style="position:absolute;left:72.84px;top:190.68px" class="cls_014"><span class="cls_014">have to be verified in accordance with the Company’s screening mandate.</span></div>
<div style="position:absolute;left:72.84px;top:236.52px" class="cls_014"><span class="cls_014">I  hereby  authorize </span><span class="cls_011"> Capital  First  Limited </span><span class="cls_014"> and/or  any  of  its  subsidiaries,  affiliates,  vendors,  and/or  any</span></div>
<div style="position:absolute;left:72.84px;top:259.56px" class="cls_014"><span class="cls_014">person/organization acting on its behalf, to verify all information furnished on my </span><span class="cls_011">Application Blank</span><span class="cls_014"> and</span></div>
<div style="position:absolute;left:72.84px;top:282.60px" class="cls_014"><span class="cls_014">generate a report of the findings.</span></div>
<div style="position:absolute;left:72.84px;top:328.56px" class="cls_014"><span class="cls_014">This form also authorizes the bearer to be provided with full details of my previous educational history</span></div>
<div style="position:absolute;left:72.84px;top:351.60px" class="cls_014"><span class="cls_014">and/or employment records held by any university, college, company or business with whom I have</span></div>
<div style="position:absolute;left:72.84px;top:374.64px" class="cls_014"><span class="cls_014">previously been associated. This information may include the details of the qualification completed, dates</span></div>
<div style="position:absolute;left:72.84px;top:397.56px" class="cls_014"><span class="cls_014">of employment, designation details, remuneration and an evaluation of my performance, competencies and character.</span></div>
<div style="position:absolute;left:72.84px;top:443.64px" class="cls_014"><span class="cls_014">Any other pertinent information requested by the individual presenting this authority, may also be kindly</span></div>
<div style="position:absolute;left:72.84px;top:466.56px" class="cls_014"><span class="cls_014">furnished to complete the course of the verification.</span></div>
<div style="position:absolute;left:72.84px;top:524.04px" class="cls_011"><span class="cls_011">Signature: _________________________________</span></div>
<div style="position:absolute;left:161.64px;top:535.44px" class="cls_011"><span class="cls_011">(Employee`s Signature)</span></div>
<div style="position:absolute;left:72.84px;top:570.00px" class="cls_011"><span class="cls_011">Location: _____________________________</span></div>
<div style="position:absolute;left:72.84px;top:615.96px" class="cls_011"><span class="cls_011">Date:</span></div>
<div style="position:absolute;left:126.84px;top:615.96px" class="cls_011"><span class="cls_011">_____________</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 16 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:4500px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background17.jpg" width=612 height=1008></div>
<div style="position:absolute;left:311.64px;top:55.32px" class="cls_028"><span class="cls_028">PERIOD</span></div>
<div style="position:absolute;left:127.92px;top:61.08px" class="cls_028"><span class="cls_028">NAME AND ADDRESS OF</span></div>
<div style="position:absolute;left:433.44px;top:61.08px" class="cls_028"><span class="cls_028">NATURE OF TRAINING/</span></div>
<div style="position:absolute;left:136.32px;top:70.32px" class="cls_028"><span class="cls_028">THE ORGANISATION</span><br/><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->professional_details->organisation_details</span></div>
<div style="position:absolute;left:438.84px;top:70.32px" class="cls_028"><span class="cls_028">TASK CARRIED OUT</span><br/><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->professional_details->nature_of_training</span></div>
<div style="position:absolute;left:289.32px;top:76.08px" class="cls_028"><span class="cls_028">FROM</span><br/><br/><br/><span style="margin-left: -13px"> echo $this->technical->professional_details->from_date</span></div>
<div style="position:absolute;left:349.56px;top:76.08px" class="cls_028"><span class="cls_028">TO</span><br/><br/><br/><span style="margin-left: -13px"> echo $this->technical->professional_details->to_date</span></div>
<div style="position:absolute;left:137.76px;top:204.00px" class="cls_028"><span class="cls_028">HARDWARE</span><br/><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->computer_skills->hardware</span></div>
<div style="position:absolute;left:278.76px;top:204.00px" class="cls_028"><span class="cls_028">UTILITIES/LANG. KNOWN</span><br/><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->computer_skills->utilities</span></div>
<div style="position:absolute;left:419.76px;top:204.00px" class="cls_028"><span class="cls_028">SYSTEMS/APPLICATIONS SOFTWARE</span><br/><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->computer_skills->software</span></div>
<div style="position:absolute;left:157.68px;top:320.16px" class="cls_028"><span class="cls_028" style="margin-left: 175px;">SPEAK</span></div>
<div style="position:absolute;left:247.56px;top:320.16px" class="cls_028"><span class="cls_028" style="margin-left: 180px;">READ</span></div>
<div style="position:absolute;left:348.96px;top:320.16px" class="cls_028"><span class="cls_028"  style="margin-left: 165px;">WRITE</span></div>
<div style="position:absolute;left:98.40px;top:335.16px" class="cls_028"><span class="cls_028"> echo $this->technical->languages[0]->languages;</span><span style="margin-left: 200px;"> if($this->technical->languages[0]->languages){if($this->technical->languages[0]->speak=="Speak"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 80px;"> if($this->technical->languages[0]->read=="Read"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 70px;"> if($this->technical->languages[0]->write=="Write"){echo "Yes";}else{echo "No";}} </span></div>
<div style="position:absolute;left:98.40px;top:354.60px" class="cls_028"><span class="cls_028"> echo $this->technical->languages[1]->languages;</span><span style="margin-left: 200px;"> if($this->technical->languages[1]->languages){if($this->technical->languages[1]->speak=="Speak"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 80px;"> if($this->technical->languages[1]->read=="Read"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 70px;"> if($this->technical->languages[1]->write=="Write"){echo "Yes";}else{echo "No";}} </span></div>
<div style="position:absolute;left:98.40px;top:372.12px" class="cls_028"><span class="cls_028"> echo $this->technical->languages[2]->languages;</span><span style="margin-left: 200px;"> if($this->technical->languages[2]->languages){if($this->technical->languages[2]->speak=="Speak"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 80px;"> if($this->technical->languages[2]->read=="Read"){echo "Yes";}else{echo "No";} </span><span style="margin-left: 70px;"> if($this->technical->languages[2]->write=="Write"){echo "Yes";}else{echo "No";}} </span></div>
<div style="position:absolute;left:98.40px;top:388.32px" class="cls_028"><span class="cls_028">Mother tongue/Language spoken at home: </span><span style="text-decoration: underline"> echo $this->technical->languages[0]->mother_tongue</span></div>
<div style="position:absolute;left:104.28px;top:408.12px" class="cls_028"><span class="cls_028">SPORTS/SOCIAL ACTIVITIES</span></div>
<div style="position:absolute;left:247.08px;top:408.12px" class="cls_028"><span class="cls_028">PROFESSIONAL MEMBERSHIPS</span><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->extra_activities->professional_membership</span></div>
<div style="position:absolute;left:446.28px;top:408.12px" class="cls_028"><span class="cls_028">OTHER ACTIVITIES</span><br/><span style="width: 120px;float:left;word-wrap:break-word;"> echo $this->technical->extra_activities->other_activities</span></div>
<div style="position:absolute;left:105.36px;top:430.20px" class="cls_028"><span class="cls_028">GAMES</span><span style="margin-left:20px;width:60px;word-wrap:break-word;"> echo $this->technical->extra_activities->games </span></div>
<div style="position:absolute;left:105.12px;top:447.12px" class="cls_028"><span class="cls_028">SOCIAL</span><span style="margin-left:20px;width:60px;word-wrap:break-word;"> echo $this->technical->extra_activities->social </span></div>
<div style="position:absolute;left:98.04px;top:456.36px" class="cls_028"><span class="cls_028">ACTIVITIES</span></div>
<div style="position:absolute;left:102.00px;top:471.96px" class="cls_028"><span class="cls_028">HOBBIES</span><span style="margin-left:20px;width:60px;word-wrap:break-word;"> echo $this->technical->extra_activities->hobbies </span></div>
<div style="position:absolute;left:103.44px;top:486.72px" class="cls_028"><span class="cls_028">(1)HAVE YOU BEEN NAMED IN A POLICE</span></div>
<div style="position:absolute;left:323.16px;top:486.60px" class="cls_028"><span class="cls_028">(4) ARE YOU UNDER ANY SERVICE BOND?</span></div>
<div style="position:absolute;left:103.44px;top:497.28px" class="cls_028"><span class="cls_028">INVESTIGATION/  ENQUIRY?</span></div>
<div style="position:absolute;left:323.16px;top:513.60px" class="cls_028"><span class="cls_028">(5) HAVE YOU APPLIED TO US EARLIER?</span></div>
<div style="position:absolute;left:98.04px;top:517.80px" class="cls_028"><span class="cls_028"><span style="width:150px;text-decoration:underline;float:left;word-wrap:break-word;"> echo $this->technical->general_info->investigation->explain</span></span></div>
<div style="position:absolute;left:98.04px;top:531.60px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:319.56px;top:531.96px" class="cls_028"><span class="cls_028">If YES, PLEASE MENTION YEAR, BUSINESS</span></div>
<div style="position:absolute;left:319.56px;top:541.20px" class="cls_028"><span class="cls_028">AND ROLE</span></div>
<div style="position:absolute;left:100.32px;top:546.36px" class="cls_028"><span class="cls_028">(2 )WERE YOU ASKED TO RESIGN / TERMINATED</span></div>
<div style="position:absolute;left:319.56px;top:550.32px" class="cls_028"><span class="cls_028"></span></div>
<div style="position:absolute;left:98.04px;top:555.60px" class="cls_028"><span class="cls_028">FROM YOUR SERVICES ANY</span></div>
<div style="position:absolute;left:98.04px;top:564.84px" class="cls_028"><span class="cls_028">TIME?</span><span style="margin-left:10px;text-decoration:underline;"> echo $this->technical->general_info->asked_to_resign->explain</span></div>
<div style="position:absolute;left:319.56px;top:560px" class="cls_028"><span class="cls_028"><span style="margin-left:10px;width:150px;text-decoration:underline;float:left;word-wrap:break-word;"> echo $this->technical->general_info->applied_before->explain</span></span></div>
<div style="position:absolute;left:98.88px;top:583.80px" class="cls_028"><span class="cls_028">(3)  HAS ANY ENQUIRY BEEN CONDUCTED AGAINST</span></div>
<div style="position:absolute;left:323.16px;top:583.68px" class="cls_028"><span class="cls_028">(6) DO YOU SUFFER FROM ANY CHRONIC ILLNESS??</span><span style="margin-left: 32px;text-decoration:underline;"><br/> echo $this->technical->general_info->illness->explain</span></div>
<div style="position:absolute;left:98.88px;top:594.48px" class="cls_028"><span class="cls_028">YOU WITH REGARDS TO FRAUD OR MISCONDUCT BY</span></div>
<div style="position:absolute;left:98.88px;top:605.04px" class="cls_028"><span class="cls_028">ANY PAST EMPLOYER/COMPANY?</span></div>
<div style="position:absolute;left:98.04px;top:625.44px" class="cls_028"><span class="cls_028">IF YES, PROVIDE DETAILS <span style="margin-left:10px;width:150px;text-decoration:underline;float:left;word-wrap:break-word;"> echo $this->technical->general_info->enquiry->explain</span></span></div>
<div style="position:absolute;left:330.96px;top:625.20px" class="cls_028"><span class="cls_028">(7) ANY REGULAR MEDICATION?   IF YES, KINDLY MENTION</span></div>
<div style="position:absolute;left:323.16px;top:643.56px" class="cls_028"><span class="cls_028"><span style="margin-left:10px;width:150px;text-decoration:underline;float:left;word-wrap:break-word;"> echo $this->technical->general_info->medication->explain</span></span></div>
<div style="position:absolute;left:54.84px;top:676.44px" class="cls_028"><span class="cls_028">DO YOU KNOW ANYONE WORKING IN CAPITAL FIRST LIMITED?</span></div>
<div style="position:absolute;left:387.84px;top:676.44px" class="cls_028"><span class="cls_028">IF YES, GIVE DETAILS <span style="text-decoration: underline"> echo $this->technical->general_info->recognise->explain</span></span></div>
<div style="position:absolute;left:54.84px;top:687.00px" class="cls_028"><span class="cls_028">__________________________________________________________________________________________________________________</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 17 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:4700px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background18.jpg" width=612 height=1008></div>
<div style="position:absolute;left:294.60px;top:63.72px" class="cls_014"><span class="cls_014">Form "F"</span></div>
<div style="position:absolute;left:252.84px;top:91.20px" class="cls_015"><span class="cls_015">[See sub-rule (1) of rule 6]</span></div>
<div style="position:absolute;left:263.28px;top:110.40px" class="cls_015"><span class="cls_015">Gratuity Nomination</span></div>
<div style="position:absolute;left:85.08px;top:129.48px" class="cls_015"><span class="cls_015">To _____________________________________________________________</span></div>
<div style="position:absolute;left:85.08px;top:148.68px" class="cls_015"><span class="cls_015">[Give here name or description of the establishment with full address]</span></div>
<div style="position:absolute;left:87.96px;top:170.76px" class="cls_015"><span class="cls_015">I. Shri/Shrimati/Kumari______________________________whose particulars are given</span></div>
<div style="position:absolute;left:87.96px;top:181.68px" class="cls_015"><span class="cls_015">in the statement below,</span></div>
<div style="position:absolute;left:255.82px;top:181.68px" class="cls_015"><span class="cls_015">[Name in full here]</span></div>
<div style="position:absolute;left:85.08px;top:219.96px" class="cls_015"><span class="cls_015">hereby nominate the person(s) mentioned below to receive the gratuity payable after my death as</span></div>
<div style="position:absolute;left:85.08px;top:230.88px" class="cls_015"><span class="cls_015">also the gratuity standing to my credit in the event of my death before that amount has become</span></div>
<div style="position:absolute;left:85.08px;top:241.80px" class="cls_015"><span class="cls_015">payable, or having become payable has not been paid and direct that the said amount of gratuity</span></div>
<div style="position:absolute;left:85.08px;top:252.72px" class="cls_015"><span class="cls_015">shall be paid in proportion indicated against the name(s) of the nominee(s).</span></div>
<div style="position:absolute;left:95.16px;top:271.92px" class="cls_015"><span class="cls_015">2.</span></div>
<div style="position:absolute;left:122.53px;top:271.92px" class="cls_015"><span class="cls_015">I hereby certify that the person(s) mentioned is a/are member(s) of my family within the</span></div>
<div style="position:absolute;left:122.52px;top:282.84px" class="cls_015"><span class="cls_015">meaning of clause (h) of section (2) of the Payment of Gratuity Act, 1972.</span></div>
<div style="position:absolute;left:95.16px;top:301.92px" class="cls_015"><span class="cls_015">3.</span></div>
<div style="position:absolute;left:122.53px;top:301.92px" class="cls_015"><span class="cls_015">I hereby declare that I have no family within the meaning of clause (h) of section (2) of the</span></div>
<div style="position:absolute;left:122.52px;top:312.84px" class="cls_015"><span class="cls_015">said Act.</span></div>
<div style="position:absolute;left:95.16px;top:332.04px" class="cls_015"><span class="cls_015">4.</span></div>
<div style="position:absolute;left:126.96px;top:334.92px" class="cls_015"><span class="cls_015">(a)  My father/mother/parents is/are not dependant on me.</span></div>
<div style="position:absolute;left:126.84px;top:351.12px" class="cls_015"><span class="cls_015">(b)  my husband`s father/mother/parents is/are not dependant on my husband.</span></div>
<div style="position:absolute;left:95.16px;top:373.20px" class="cls_015"><span class="cls_015">5.</span></div>
<div style="position:absolute;left:122.53px;top:373.20px" class="cls_015"><span class="cls_015">I have excluded my husband from my family by a notice dated the _________ to the</span></div>
<div style="position:absolute;left:122.52px;top:384.12px" class="cls_015"><span class="cls_015">Controlling Authority in terms of the proviso to clause (h) of section 2 of the said Act.</span></div>
<div style="position:absolute;left:95.16px;top:403.32px" class="cls_015"><span class="cls_015">6.</span></div>
<div style="position:absolute;left:122.53px;top:403.32px" class="cls_015"><span class="cls_015">Nomination made herein invalidates my previous nomination.</span></div>
<div style="position:absolute;left:284.88px;top:422.40px" class="cls_015"><span class="cls_015">Nominee(s)</span></div>
<div style="position:absolute;left:124.44px;top:445.20px" class="cls_037"><span class="cls_037">Sr.</span></div>
<div style="position:absolute;left:150.96px;top:445.20px" class="cls_037"><span class="cls_037">Name in full with full address</span></div>
<div style="position:absolute;left:284.64px;top:445.20px" class="cls_037"><span class="cls_037">Relationship with</span></div>
<div style="position:absolute;left:371.04px;top:445.20px" class="cls_037"><span class="cls_037">Age of nominee</span></div>
<div style="position:absolute;left:457.56px;top:445.20px" class="cls_037"><span class="cls_037">Proportion by</span></div>
<div style="position:absolute;left:123.24px;top:454.32px" class="cls_037"><span class="cls_037">No.</span></div>
<div style="position:absolute;left:183.12px;top:454.32px" class="cls_037"><span class="cls_037">of nominee(s)</span></div>
<div style="position:absolute;left:292.92px;top:454.32px" class="cls_037"><span class="cls_037">the employee</span></div>
<div style="position:absolute;left:465.72px;top:454.32px" class="cls_037"><span class="cls_037">which the</span></div>
<div style="position:absolute;left:454.44px;top:463.44px" class="cls_037"><span class="cls_037">gratuity will be</span></div>
<div style="position:absolute;left:471.96px;top:472.56px" class="cls_037"><span class="cls_037">shared</span></div>
<div style="position:absolute;left:126.60px;top:508.92px" class="cls_037"><span class="cls_037">1.</span></div>
<div style="position:absolute;left:126.60px;top:540.24px" class="cls_037"><span class="cls_037">2.</span></div>
<div style="position:absolute;left:126.60px;top:571.44px" class="cls_037"><span class="cls_037">3.</span></div>
<div style="position:absolute;left:126.60px;top:602.76px" class="cls_037"><span class="cls_037">4.</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 18 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:4900px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background19.jpg" width=612 height=1008></div>
<div style="position:absolute;left:288.48px;top:75.60px" class="cls_015"><span class="cls_015">Statement</span></div>
<div style="position:absolute;left:95.16px;top:94.68px" class="cls_015"><span class="cls_015">1.</span></div>
<div style="position:absolute;left:122.53px;top:94.68px" class="cls_015"><span class="cls_015">Name of employee in full.</span></div>
<div style="position:absolute;left:95.16px;top:113.88px" class="cls_015"><span class="cls_015">2.</span></div>
<div style="position:absolute;left:122.53px;top:113.88px" class="cls_015"><span class="cls_015">Sex.</span></div>
<div style="position:absolute;left:95.16px;top:132.96px" class="cls_015"><span class="cls_015">3.</span></div>
<div style="position:absolute;left:122.53px;top:132.96px" class="cls_015"><span class="cls_015">Religion.</span></div>
<div style="position:absolute;left:95.16px;top:152.16px" class="cls_015"><span class="cls_015">4.</span></div>
<div style="position:absolute;left:122.53px;top:152.16px" class="cls_015"><span class="cls_015">Whether unmarried/married/widow/widower.</span></div>
<div style="position:absolute;left:95.16px;top:171.24px" class="cls_015"><span class="cls_015">5.</span></div>
<div style="position:absolute;left:122.53px;top:171.24px" class="cls_015"><span class="cls_015">Department/Branch/Section where employed.</span></div>
<div style="position:absolute;left:95.16px;top:190.44px" class="cls_015"><span class="cls_015">6.</span></div>
<div style="position:absolute;left:122.53px;top:190.44px" class="cls_015"><span class="cls_015">Post held with Ticket or Serial No., if any.</span></div>
<div style="position:absolute;left:95.16px;top:209.52px" class="cls_015"><span class="cls_015">7.</span></div>
<div style="position:absolute;left:122.53px;top:209.52px" class="cls_015"><span class="cls_015">Date of appointment.</span></div>
<div style="position:absolute;left:95.16px;top:228.72px" class="cls_015"><span class="cls_015">8.</span></div>
<div style="position:absolute;left:122.53px;top:228.72px" class="cls_015"><span class="cls_015">Permanent address.</span></div>
<div style="position:absolute;left:87.96px;top:250.80px" class="cls_015"><span class="cls_015">Village __________</span></div>
<div style="position:absolute;left:202.66px;top:250.80px" class="cls_015"><span class="cls_015">Thana __________     Sub-division _________     Post Office ________</span></div>
<div style="position:absolute;left:87.96px;top:266.88px" class="cls_015"><span class="cls_015">District _________</span></div>
<div style="position:absolute;left:202.66px;top:266.88px" class="cls_015"><span class="cls_015">State ____________</span></div>
<div style="position:absolute;left:87.96px;top:288.96px" class="cls_015"><span class="cls_015">Place</span></div>
<div style="position:absolute;left:390.72px;top:291.96px" class="cls_015"><span class="cls_015">Signature/Thumb impression</span></div>
<div style="position:absolute;left:429.48px;top:308.16px" class="cls_015"><span class="cls_015">of the employee</span></div>
<div style="position:absolute;left:89.04px;top:330.24px" class="cls_015"><span class="cls_015">Date</span></div>
<div style="position:absolute;left:258.60px;top:349.32px" class="cls_015"><span class="cls_015">Declaration by witnesses</span></div>
<div style="position:absolute;left:85.08px;top:368.52px" class="cls_015"><span class="cls_015">Nomination signed/thumb impressed before me.</span></div>
<div style="position:absolute;left:85.08px;top:387.60px" class="cls_015"><span class="cls_015">Name in full and full</span></div>
<div style="position:absolute;left:224.07px;top:387.60px" class="cls_015"><span class="cls_015">Signature of witnesses.</span></div>
<div style="position:absolute;left:85.08px;top:406.80px" class="cls_015"><span class="cls_015">Address of witnesses.</span></div>
<div style="position:absolute;left:85.08px;top:425.88px" class="cls_015"><span class="cls_015">1.</span></div>
<div style="position:absolute;left:224.05px;top:425.88px" class="cls_015"><span class="cls_015">1.</span></div>
<div style="position:absolute;left:85.08px;top:445.08px" class="cls_015"><span class="cls_015">2.</span></div>
<div style="position:absolute;left:224.05px;top:445.08px" class="cls_015"><span class="cls_015">2.</span></div>
<div style="position:absolute;left:85.08px;top:464.16px" class="cls_015"><span class="cls_015">Place</span></div>
<div style="position:absolute;left:85.08px;top:483.24px" class="cls_015"><span class="cls_015">Date</span></div>
<div style="position:absolute;left:253.08px;top:502.44px" class="cls_015"><span class="cls_015">Certificate by the employer</span></div>
<div style="position:absolute;left:85.08px;top:521.52px" class="cls_015"><span class="cls_015">Certified that the particulars of the above nomination have been verified and recorded in this</span></div>
<div style="position:absolute;left:85.08px;top:532.56px" class="cls_015"><span class="cls_015">establishment.</span></div>
<div style="position:absolute;left:85.08px;top:551.64px" class="cls_015"><span class="cls_015">Employer`s Reference No., if any.</span></div>
<div style="position:absolute;left:321.60px;top:570.84px" class="cls_015"><span class="cls_015">Signature</span></div>
<div style="position:absolute;left:402.02px;top:570.84px" class="cls_015"><span class="cls_015">of</span></div>
<div style="position:absolute;left:447.26px;top:570.84px" class="cls_015"><span class="cls_015">the</span></div>
<div style="position:absolute;left:498.51px;top:570.84px" class="cls_015"><span class="cls_015">employer/</span></div>
<div style="position:absolute;left:321.60px;top:581.76px" class="cls_015"><span class="cls_015">officer authorised</span></div>
<div style="position:absolute;left:321.60px;top:600.84px" class="cls_015"><span class="cls_015">Designation</span></div>
<div style="position:absolute;left:85.08px;top:620.04px" class="cls_015"><span class="cls_015">Date</span></div>
<div style="position:absolute;left:321.60px;top:620.04px" class="cls_015"><span class="cls_015">Name</span></div>
<div style="position:absolute;left:378.25px;top:620.04px" class="cls_015"><span class="cls_015">and</span></div>
<div style="position:absolute;left:425.30px;top:620.04px" class="cls_015"><span class="cls_015">address</span></div>
<div style="position:absolute;left:490.95px;top:620.04px" class="cls_015"><span class="cls_015">of</span></div>
<div style="position:absolute;left:529.96px;top:620.04px" class="cls_015"><span class="cls_015">the</span></div>
<div style="position:absolute;left:321.60px;top:630.96px" class="cls_015"><span class="cls_015">establishment</span></div>
<div style="position:absolute;left:415.81px;top:630.96px" class="cls_015"><span class="cls_015">or</span></div>
<div style="position:absolute;left:455.90px;top:630.96px" class="cls_015"><span class="cls_015">rubber</span></div>
<div style="position:absolute;left:516.75px;top:630.96px" class="cls_015"><span class="cls_015">stamp</span></div>
<div style="position:absolute;left:321.60px;top:641.88px" class="cls_015"><span class="cls_015">thereof.</span></div>
<div style="position:absolute;left:234.24px;top:660.96px" class="cls_015"><span class="cls_015">Acknowledgement by the employee</span></div>
<div style="position:absolute;left:85.08px;top:680.16px" class="cls_015"><span class="cls_015">Received the duplicate copy of nomination in Form "F" filed by me and duly certified by the employer.</span></div>
<div style="position:absolute;left:85.08px;top:732.12px" class="cls_015"><span class="cls_015">Date</span></div>
<div style="position:absolute;left:424.32px;top:732.12px" class="cls_015"><span class="cls_015">Signature of the employee</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 19 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:5200px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background20.jpg" width=612 height=1008></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 20 of 21</span></div>
</div>

<div style="position:relative;left:50%;margin-left:-306px;top:5500px;width:612px;height:1004px;border-style:outset;overflow:hidden">
<div style="position:relative;left:0px;top:0px">
<img src="kitimages/background21.jpg" width=612 height=1008></div>
<div style="position:absolute;left:209.52px;top:88.08px" class="cls_018"><span class="cls_018">MY TALENTED BUDDIES</span></div>
<div style="position:absolute;left:63.00px;top:131.64px" class="cls_022"><span class="cls_022">Employee Name: ____________________________________ Company ID: ______________</span></div>
<div style="position:absolute;left:63.00px;top:161.76px" class="cls_014"><span class="cls_014">We are happy to have you on board and would also welcome some of the talented people you know within</span></div>
<div style="position:absolute;left:63.00px;top:179.04px" class="cls_014"><span class="cls_014">the industry. Kindly provide reference details of your colleagues/friends/acquaintances who may be suitable</span></div>
<div style="position:absolute;left:63.00px;top:196.20px" class="cls_014"><span class="cls_014">for a role at Capital First Limited. Your reference would be kept confidential.</span></div>
<div style="position:absolute;left:63.00px;top:230.64px" class="cls_011"><span class="cls_011">Reference- 1</span></div>
<div style="position:absolute;left:63.00px;top:247.92px" class="cls_011"><span class="cls_011">Name:</span><span class="cls_014"> ______________________________________      </span><span class="cls_011">Contact Number:</span><span class="cls_014"> _______________</span></div>
<div style="position:absolute;left:63.00px;top:265.08px" class="cls_011"><span class="cls_011">Email Id:</span><span class="cls_014"> ____________________________________      </span><span class="cls_011">Location:</span><span class="cls_014"> ____________________</span></div>
<div style="position:absolute;left:63.00px;top:282.36px" class="cls_011"><span class="cls_011">Current Organization: ______________________</span></div>
<div style="position:absolute;left:321.96px;top:282.36px" class="cls_011"><span class="cls_011">Relationship:</span><span class="cls_014"> ____________________________</span></div>
<div style="position:absolute;left:63.00px;top:299.64px" class="cls_011"><span class="cls_011">Current Profile:</span><span class="cls_014"> _________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:317.04px" class="cls_014"><span class="cls_014">_______________________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:345.84px" class="cls_011"><span class="cls_011">Reference- 2</span></div>
<div style="position:absolute;left:63.00px;top:363.12px" class="cls_011"><span class="cls_011">Name:</span><span class="cls_014"> ______________________________________      </span><span class="cls_011">Contact Number:</span><span class="cls_014"> _______________</span></div>
<div style="position:absolute;left:63.00px;top:380.40px" class="cls_011"><span class="cls_011">Email Id:</span><span class="cls_014"> ____________________________________      </span><span class="cls_011">Location:</span><span class="cls_014"> ____________________</span></div>
<div style="position:absolute;left:63.00px;top:397.56px" class="cls_011"><span class="cls_011">Current Organization: ______________________</span></div>
<div style="position:absolute;left:321.96px;top:397.56px" class="cls_011"><span class="cls_011">Relationship:</span><span class="cls_014"> ____________________________</span></div>
<div style="position:absolute;left:63.00px;top:414.84px" class="cls_011"><span class="cls_011">Current Profile:</span><span class="cls_014"> _________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:432.24px" class="cls_014"><span class="cls_014">_______________________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:466.56px" class="cls_011"><span class="cls_011">Reference- 3</span></div>
<div style="position:absolute;left:63.00px;top:483.84px" class="cls_011"><span class="cls_011">Name:</span><span class="cls_014"> ______________________________________      </span><span class="cls_011">Contact Number:</span><span class="cls_014"> _______________</span></div>
<div style="position:absolute;left:63.00px;top:501.12px" class="cls_011"><span class="cls_011">Email Id:</span><span class="cls_014"> ____________________________________      </span><span class="cls_011">Location:</span><span class="cls_014"> ____________________</span></div>
<div style="position:absolute;left:63.00px;top:518.40px" class="cls_011"><span class="cls_011">Current Organization: ______________________</span></div>
<div style="position:absolute;left:321.96px;top:518.40px" class="cls_011"><span class="cls_011">Relationship:</span><span class="cls_014"> ____________________________</span></div>
<div style="position:absolute;left:63.00px;top:535.56px" class="cls_011"><span class="cls_011">Current Profile:</span><span class="cls_014"> _________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:552.96px" class="cls_014"><span class="cls_014">_______________________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:587.28px" class="cls_011"><span class="cls_011">Reference- 4</span></div>
<div style="position:absolute;left:63.00px;top:604.56px" class="cls_011"><span class="cls_011">Name:</span><span class="cls_014"> ______________________________________      </span><span class="cls_011">Contact Number:</span><span class="cls_014"> _______________</span></div>
<div style="position:absolute;left:63.00px;top:621.84px" class="cls_011"><span class="cls_011">Email Id:</span><span class="cls_014"> ____________________________________      </span><span class="cls_011">Location:</span><span class="cls_014"> ____________________</span></div>
<div style="position:absolute;left:63.00px;top:639.12px" class="cls_011"><span class="cls_011">Current Organization: ______________________</span></div>
<div style="position:absolute;left:321.96px;top:639.12px" class="cls_011"><span class="cls_011">Relationship:</span><span class="cls_014"> ____________________________</span></div>
<div style="position:absolute;left:63.00px;top:656.28px" class="cls_011"><span class="cls_011">Current Profile:</span><span class="cls_014"> _________________________________________________________________________</span></div>
<div style="position:absolute;left:63.00px;top:673.68px" class="cls_014"><span class="cls_014">_______________________________________________________________________________________</span></div>
<div style="position:absolute;left:275.16px;top:689.51px" class="cls_007"><span class="cls_007">Thank you</span></div>
<div style="position:absolute;left:275.29px;top:733.67px" class="cls_007"><span class="cls_007">HR Team</span></div>
<div style="position:absolute;left:499.20px;top:769.54px" class="cls_012"><span class="cls_012">Page 21 of 21</span></div>
</div>
</div>
 echo JHTML::_("form.token");
<input type="hidden" name="id" value="">
<input type="hidden" name="employee_id" value=" echo OjkHelper::getEmployeeId();">
</form>');
$mpdf->Output();
exit;
?>