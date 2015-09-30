@extends('layouts.default')

@section('title', 'About')

@section('content')
	
	<div class="row app-container mg-top">
		<div class="col s12 box-content white" id="about">
<h4>MaePaySoh FAQ</h4>
<ol>
<li>			
<p class="question">Q. What is MaePaySoh?</p>
<p>MaePaySoh (“Let’s Vote!”) is an initiative that taps the talent of local Myanmar developers to help voters access essential information for Myanmar’s upcoming general elections.</p>
</li>
<li>
<p class="question">Q. Why MaePaySoh?</p>
<p>Myanmar’s general elections will be held on November 8, 2015. What do voters need to know about electoral processes, political parties, and candidates? Knowledge and awareness of the electoral process, the political parties, and the candidates is fundamental to ensure informed civic participation.</p>
 
<p>Recent survey research suggests that voter and civic education remain crucial needs. Seventy-six percent of the public does not know that Myanmar’s parliamentary bodies make laws. Only 12% of the public know that the president is elected by the Union Parliament. Eligible voters also report feeling substantially uninformed about many aspects relating to the upcoming elections, including the mechanics of voting: from how the mark the ballot to where and when to vote. Respondents reported feeling least informed about participating political parties and legislative candidates.</p>
</li>
<li>
<p class="question">Q. How will MaePaySoh benefit voters?</p>
<p>The MaePaySoh initiative aims to provide non-partisan voter information that voters can use to understand the electoral process and make informed choices. MaePaySoh will do so through a range of mobile and web applications powered by the MaePaySoh API, providing voters access to essential information about elections processes, the political parties, and the candidates.</p>
</li>
<li>
<p class="question">Q. What is the MaePaySoh API?</p>
<p>The MaePaySoh Application Programming Interface (API) makes it possible for developers to easily access a public and open source database that contains data sets relevant to Myanmar’s upcoming general elections, and to design and build mobile and web apps, or other digital tools, to help voters access essential elections information.</p>
</li>
<li>
<p class="question">Q. What kind of information will be available through the MaePaySoh API?</p>
<p>Working together with the Union Election Commission (UEC) of Myanmar, and local civil society organizations Charity Oriented Myanmar (COM) and the Open Myanmar Initiative (OMI), we are compiling a public database of information about the 6000+ candidates for national and state/region parliamentary seats, the 93 political parties contesting the elections, and answers to voters’ frequently asked questions about the functions of government institutions, electoral processes, and how to vote.</p>
</li>
<li>
<p class="question">Q. How will apps be disseminated to voters?</p>
<p>Mobile and web applications developed using the MaePaySoh API will be showcased at MaePaySoh.org and available for download on the GooglePlay store. Winning apps will be promoted through social media platforms like Facebook, and used by civil society organizations involved in voter education efforts.</p>
</li>
<li>
<p class="question">Q. How will MaePaySoh benefit developers?</p>
<p>The MaePaySoh initiative supports local Myanmar developers by providing them with the tools that they need to build compelling, and valuable web services, SMS tools, and Android mobile apps that voters can use to learn more about the 2015 election. Together with local developer communities Phandeeyar, GDG Yangon, and Geek Girls, MaePaySoh delivered a series of technical trainings on topics relating to the development of API-driven applications: MaePaySoh API Design Sprint, Node.Js Tutorial, Building Android Apps with Web Tech, and Facebook Developers Tools.</p>

<p>The MaePaySoh Hack Challenge will provide a unique platform for local developers to showcase their talent while contributing to public access to elections information. </p>
</li>
<li>
<p class="question">Q. Who is MaePaySoh?</p>
<p>The MaePaySoh initiative is made possible through the support and collaboration of a number of organizations, institutions, and individuals, including the Union Election Commission of Myanmar (UEC), Charity Oriented Myanmar (COM), Open Myanmar Initiative (OMI), Phandeeyar, Google Developer Group, Myanmar Geek Girls, and The Asia Foundation. The MaePaySoh API was built by Myanmar companies Hexcores and Zwenexsys.</p>
 </li>
<li>
<p class="question">Q. Who is funding MaePaySoh?</p>
<p>The MaePaySoh initiative is funded by the Australian Department of Foreign Affairs and Trade and The Asia Foundation. </p>
</li>
</ol>

<h4>မဲေပးစို႔အေၾကာင္း မၾကာခဏေမးေလ့ရွိေသာ ေမးခြန္းႏွင္႔အေၿဖမ်ား</h4>

<ol>
<li>
<p class="question">ေမး - မဲေပးစို႔ (MaePaySoh) ဆိုတာဘာလဲ?</p>
<p>မဲေပးစို႔(“Let’sVote!”)သည္ ျမန္မာႏိုင္ငံတြင္မၾကာမီက်င္းပေတာ႔မည့္ အေထြေထြေရြးေကာက္ပြဲမ်ား အတြက္ လိုအပ္ေသာသတင္းအခ်က္အလက္မ်ားကို မဲဆႏၵရွင္မ်ားရရိွႏိုင္ရန္အတြက္ ေဒသခံျမန္မာ developer မ်ားကအကူအညီေပးႏိုင္ရန္ အစပ်ိဳးေနသည္႔ ကနဦးေျခလွမ္းတစ္ရပ္ ျဖစ္သည္။ </p>
</li>
<li>
<p class="question">ေမး - ဘာလုိေၾကာင့္ မဲေပးစို႔ ၿဖစ္လာသလဲ?</p>
<p>ျမန္မာႏိုင္ငံ၏ အေထြေထြေရြးေကာက္ပြဲမ်ားကို ၂၀၁၅ခုႏွစ္ ႏိုဝင္ဘာလ(၈)ရက္ေန႔တြင္ က်င္းပ ေတာ႔မည္ျဖစ္ပါသည္။ မဲဆႏၵရွင္မ်ားအေနႏွင့္ ေရြးေကာက္ပြဲလုပ္ငန္းစဥ္မ်ား၊ ႏိုင္ငံေရးပါတီမ်ားအေၾကာင္း၊ ကိုယ္စားလွယ္ေလာင္းမ်ားအေၾကာင္းကိုမည္မွ်သိရွိထားပါသနည္း?ေရြးေကာက္ပြဲလုပ္ငန္းစဥ္မ်ား၊ ႏိုင္ငံေရး ပါတီမ်ားႏွင့္ ကိိုယ္စားလွယ္ေလာင္းမ်ားအေၾကာင္း အသိပညာေပးၿခင္းႏွင္႔ သိရိွနားလည္မႈသည္ ႏိုင္ငံသားမ်ား ပါဝင္မႈေသခ်ာေစရန္အတြက္အေၿခခံက်လွပါသည္။
မၾကာေသးမီကထုတ္ေဝခဲ႔ေသာစစ္တမ္းမ်ားအရ မဲဆႏၵရွင္မ်ားႏွင္႔ ႏိုင္ငံသားအခြင္႔အေရးမ်ား အေၾကာင္းပညာေပးၿခင္း(ၿပည္သူ႔နီတိ)သည္ အေရးပါေသာ လိုအပ္ခ်က္မ်ားအျဖစ္ဆက္လက္တည္ရွိေနသည္။ လူထု၏ ၇၆%သည္ ျမန္မာႏိုင္ငံတြင္ လႊတ္ေတာ္မ်ားမွ ဥပေဒမ်ားျပဌာန္းသည္ကိုမသိရိွၾကေပ။ လူထု၏ ၁၂% သည္သာ သမၼတကို ျပည္ေထာင္စုလႊတ္ေတာ္မွ ေရြးေကာက္ေၾကာင္း သိရွိၾကသည္။ မဲေပးပိုင္ခြင္႔ရိွေသာ မဲဆႏၵရွင္မ်ားသည္လာမည့္ေရြးေကာက္ပြဲဆိုင္ရာ က႑အမ်ားအျပားၿဖစ္သည္႔ မည္သည္႔ေနရာတြင္မည္သို႔ မဲေပးရမည္ကို မသိရိွၾကဟု ဆိုၾကသည္။ေျဖဆိုသူမ်ားသည္ ေရြးေကာက္ပြဲတြင္ပါဝင္မည့္ ႏိုင္ငံေရးပါတီ မ်ားႏွင့္ဥပေဒျပဳေရြးေကာက္ခံ ကိုယ္စားလွယ္မ်ား အေၾကာင္းကို သိရိွမႈအနည္းဆုံး ဟု ေျဖဆိုၾကသည္။ </p>
</li>
<li>
<p class="question">ေမး - မဲေပးစို႔သည္ မဲဆႏၵရွင္မ်ားကို ဘယ္လိုအက်ိဳးၿပဳမလဲ?</p>
<p>မဲေပးစို႔၏ကနဦးအစပ်ိဳးေျခလွမ္းသည္ မဲဆႏၵရွင္မ်ားအား ေရြးေကာက္ပြဲလုပ္ငန္းစဥ္မ်ား အေၾကာင္းကိုပိုမိုနားလည္လာၿပီးေရြးခ်ယ္မႈမ်ားၿပဳလုပ္ႏိုင္ရန္ ဘက္လိုက္မႈမရွိသည္႔ သတင္းအခ်က္အလက္မ်ား ေပးအပ္သြားရန္ ရည္ရြယ္သည္။ MaePaySoh API မွ အေထာက္အပံ့ေပးထားသည့္ mobile ႏွင့္ web applicationမ်ားကိုအသံုးၿပဳ၍ အေရးၾကီးသည္႔သတင္းအခ်က္အလက္မ်ားၿဖစ္သည္႔ ေရြးေကာက္ပြဲ လုပ္ငန္းစဥ္မ်ား၊ ႏိုင္ငံေရးပါတီမ်ားႏွင့္ ကိုယ္စားလွယ္ေလာင္းမ်ားအေၾကာင္းကိုမဲဆႏၵရွင္မ်ားထံ ေပးပို႔သြား မည္ျဖစ္သည္။ </p>
</li>
<li>
<p class="question">ေမး - MaePaySoh API ဆိုတာဘာလဲ?</p>
<p class="question">MaePaySoh Application Programming Interface (API)သည္ developer မ်ားအား အမ်ားၿပည္သူႏွင့္ဆိုင္ေသာ အမ်ားၿပည္သူအသုံးၿပဳႏုိင္ေသာ open source databse ကို အလြယ္တကူ access လုပ္ႏိုင္ၿပီး မဲဆႏၵရွင္မ်ားထံသိို႔ အေရးၾကီးသည္႔ သတင္းအခ်က္အလက္မ်ားကို ေပးပို႔ရန္ mobile ႏွင္႔ web application မ်ား၊ ဝက္ဘ္ဆိုက္မ်ား (သို႔) အျခားေသာ ဒစ္ဂ်စ္တယ္ ပစၥည္းမ်ားကိုဒီဇိုင္းေရးဆဲြကာ တည္ေဆာက္ရန္လုပ္ေဆာင္ေပးသည္။ ဤ database၌ ျမန္မာႏိုင္ငံတြင္မၾကာမီက်င္းပေတာ႔မည့္ အေထြေထြေရြးေကာက္ပြဲႏွင္႔ သက္ဆိုင္သည့္ အခ်က္အလက္မ်ား ပါဝင္သည္။ </p>
</li>
<li>
<p class="question">ေမး - MaePaySoh API မွာ ဘယ္လိုသတင္းအခ်က္အလက္ေတြ ရႏိုင္မလဲ?</p>
<p>ျမန္မာႏိုင္ငံ၏ ျပည္ေထာင္စုေရြးေကာက္ပြဲေကာ္မရွင္(UEC)၊ အရပ္ဘက္အဖြဲ႔အစည္းမ်ားျဖစ္ေသာ 
ဒါန-ေရွ႔ေဆာင္ၿမန္မာ (Charity-Oriented Myanmar) ႏွင့္ Open Myanmar Initiative (OMI) တို႔ႏွင့္ အတူ တကြပူးေပါင္းလုပ္ေဆာင္ျပီး ၿပည္ေထာင္စုအဆင္႔အပါအဝင္ ၿပည္နယ္ႏွင္႔႔တိုင္းလႊတ္ေတာ္ေနရာမ်ားအတြက္ ေရြးေကာက္ခံကိုယ္စားလွယ္ေလာင္း ၆၀၀၀ ေက်ာ္ခန္႔၏အခ်က္အလက္မ်ား၊ ေရြးေကာက္ပြဲမ်ားတြင္ ယွဥ္ၿပိဳင္မည့္ႏိုင္ငံေရးပါတီမ်ား၊အစိုးရအင္စတီက်ဴးရွင္းမ်ား၏ လုပ္ငန္းတာဝန္မ်ားအေၾကာင္း၊ ေရြးေကာက္ပြဲ ျဖစ္စဥ္မ်ားႏွင္႔ မည္သို႔မဲေပးရမည္စသည္တို႔ပါဝင္သည့္ မဲဆႏၵရွင္မ်ားမၾကာခဏေမးတတ္သည့္ ေမးခြန္း မ်ားႏွင္႔အေျဖမ်ား(Frequently Asked Questions)ကို အမ်ားၿပည္သူaccessလုပ္ႏိုင္ေသာ ဤdatabaseတြင္ ေပါင္းစည္းထည္႔ ထားပါသည္။ </p>
</li>
<li>
<p class="question">ေမး - app မ်ားကို မဲေပးသူမ်ားထံေရာက္ေအာင္ ဘယ္လိုလုပ္မလဲ?</p>
<p>MaePaySoh API ကို အသံုးျပဳျပီး ေရးဆြဲခဲ့သည့္ mobile ႏွင့္ web application မ်ားကို MaePaySoh.org တြင္ ျပသထားမည္ျဖစ္ၿပီး GooglePlay store မွ ေဒါင္းလုတ္ရယူႏိုင္မည္ျဖစ္သည္။ အႏိုင္ရ ေသာ app မ်ားကို Facebook ကဲ့သို႔ ဆိုရွယ္မီဒီယာ ပလက္ေဖာင္းမ်ားမွ ေၾကညာေပးသြားမည္ျဖစ္ျပီး မဲဆႏၵရွင္ပညာေပးေရးလုပ္ငန္းမ်ားတြင္ ပ ါဝင္ေဆာင္ရြက္ေနသည္႔ အရပ္ဘက္အဖြဲ႔အစည္းမ်ားကလည္း
အသံုးျပဳသြားမည္ျဖစ္သည္။  </p>
</li>
<li>
<p class="question">ေမး - မဲေပးစို႔သည္ developer မ်ားကို ဘယ္လိုအက်ိဳးၿပဳမလဲ?</p>
<p>မဲေပးစို႔ ကနဦးေျခလွမ္းသည္ ၂၀၁၅ေရြးေကာက္ပြဲအေၾကာင္း မဲေပးသူမ်ား ေလ့လာႏိုင္မည့္ အသုံးဝင္သည့္ web ဝန္ေဆာင္မႈမ်ား၊ SMS ကိရိယာမ်ားႏွင့္ Android mobile app မ်ားကို ဖန္တီးႏိုင္ရန္ လိုအပ္သည့္ tools မ်ားကို  ေဒသခံျမန္မာ developer မ်ားအား ေပးအပ္မည္ျဖစ္သည္။ ျပည္တြင္းအေျခစိုက္ developer community မ်ားျဖစ္သည့္ ဖန္တီးရာ၊ GDG Yangon ႏွင့္ Geek Girls တို႔ႏွင့္အတူမဲေပးစို႔မွေန၍  API applicationမ်ားႏွင့္သက္ဆိုင္သည့္ သင္တန္းမ်ားကို သင္ၾကားပို႔ခ်ခဲ႔ၿပီးၿဖစ္သည္။ ထိုသင္တန္းမ်ားမွာ MaePaySoh API Design Sprint, Node.Js Tutorial, Building Android Apps with Web Tech, ႏွင့္ Facebook Developers Tools စသည္တို႔ျဖစ္သည္။
မဲေပးစို႔ Hack Challenge သည္ ေဒသခံျမန္မာdeveloperမ်ား၏ အရည္အခ်င္းကိုထုတ္ေဖာ္ ျပသႏုိင္မည္႔ထူးၿခားသည္႕platformတစ္ခုျဖစ္ျပီး တစ္ဖက္တြင္လည္း ေရြးေကာက္ပြဲဆိုင္ရာသတင္းအခ်က္ အလက္မ်ားကို လူထုထံေရာက္ရိွေစရန္လုပ္ေဆာင္သြားႏုိင္မည္ၿဖစ္သည္။</p>
</li>
<li>
<p class="question">ေမး - မဲေပးစို႔မွာ ဘယ္သူေတြပါလဲ?</p>
<p>ျမန္မာႏိုင္ငံ၏ ျပည္ေထာင္စုေရြးေကာက္ပြဲေကာ္မရွင္ (UEC)၊ ဒါန-ေရွ႔ေဆာင္ၿမန္မာ (Charity- Oriented Myanmar)၊ Open Myanmar Initiative (OMI)၊ ဖန္တီးရာ၊ Google Developer Group၊ Myanmar Greek Girls၊ Myanmar Information Management System (MIMU)၊ the International Foundation for Electoral Systems (IFES) ႏွင့္ The Asia Foundation စသည့္ အသင္းအဖြဲ႔မ်ား၊ အင္စတီက်ဴးရွင္းမ်ားႏွင့္ လူပုဂၢိဳလ္မ်ား ၏ အေထာက္အပံ့ႏွင့္ ပူးေပါင္းမႈေၾကာင့္ မဲေပးစို႔ ကနဦးေျခလွမ္း ျဖစ္ေပၚလာျခင္းျဖစ္ပါသည္။ MaePaySoh API ကို ျမန္မာကုမၸဏီမ်ားျဖစ္ေသာ Hexcores ႏွင့္ Zwenexsys တို႔က ဖန္တီးထားပါသည္။ </p>
</li>
<li>
<p class="question">ေမး - ေမးေပးစို႔ကို ဘယ္အဖဲြ႔အစည္းေတြကေငြေထာက္ပ့ံထားသလဲ?</p>
<p>မဲေပးစို႔ ကနဦးေျခလွမ္းကို Australian Department of Foreign Affairs and Trade ႏွင္႔ The Asia Foundation ၏ေငြေၾကးေထာက္ပံ့မႈၿဖင္႔ အေကာင္အထည္ေဖာ္ပါသည္။</p>
</li>
</ol>
 				

		</div>
	</div>
@endsection