@extends('layouts.web')
@section('title_bar', 'Conference Program | RHINOCON 2025')
@section('breadcrumb')

<style>
		:root {
			--bg: #f7fafc;
			--card: #ffffff;
			--muted: #6b7280;
			--accent: #AD0E60;
			--radius: 10px;
			--pad: 14px;
		}

		/* Tabs */
		.tabs {
			display: flex;
			flex-wrap: wrap;
			gap: 8px;
			justify-content: center;
			/* 👈 centers the tabs */
			margin-bottom: 20px;
		}

		.tab-btn {
			background: var(--card);
			border: 1px solid rgba(15, 23, 42, 0.1);
			padding: 8px 16px;
			border-radius: var(--radius);
			cursor: pointer;
			font-weight: 600;
			transition: all 0.25s;
		}

		.tab-btn.active {
			background: var(--accent);
			color: #fff;
			border-color: var(--accent);
		}

		.tab-content {
			display: none;
			animation: fadeIn 0.4s ease;
		}

		.tab-content.active {
			display: block;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(4px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		/* Table */
		table.schedule {
			width: 100%;
			border-collapse: collapse;
			background: var(--card);
			border-radius: var(--radius);
			overflow: hidden;
			box-shadow: 0 6px 18px rgba(2, 6, 23, 0.06);
			table-layout: auto;
		}

		table.schedule thead h5 {
			color: #AD0E60 !important;
			text-align: center;
		}

		table.schedule th,
		table.schedule td {
			text-align: left;
			padding: 12px 16px;
			font-size: 15px;
			line-height: 1.35;
			border: 1px solid rgba(21, 22, 25, 0.08);
			word-break: break-word;
		}

		table.schedule thead th {
			color: var(--muted);
			background: linear-gradient(180deg, rgba(0, 0, 0, 0.02), transparent);
			font-weight: 600;
		}



		table.schedule th.time,
		table.schedule td.time {
			white-space: nowrap;
			/* keep times on one line */
			width: auto;
			/* remove fixed width */
		}

		table.schedule th.faculty,
		table.schedule td.faculty {
			width: 180px;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
		}

		/* Responsive */
		@media(max-width:600px) {
			table.schedule thead {
				display: none;
			}

			table.schedule,
			table.schedule tbody,
			table.schedule tr,
			table.schedule td {
				display: block;
				width: 100%;
			}

			table.schedule tr {
				margin: 12px 0;
				background: var(--card);
				padding: var(--pad);
				border-radius: var(--radius);
				box-shadow: 0 4px 12px rgba(2, 6, 23, 0.05);
			}

			table.schedule td {
				display: flex;
				gap: 8px;
				padding: 8px 10px;
			}

			table.schedule td::before {
				content: attr(data-label);
				flex: 0 0 90px;
				font-weight: 600;
				color: var(--muted);
				font-size: 13px;
			}
		}
	</style>
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Conference Program</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Conference Program</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="team10-section-area sp1">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-6 m-auto">
    			<div class="heading7 text-center space-margin60">
    				<h5>Program</h5>
    				<div class="space20"></div>
    				<h2 class="text-anime-style-3">Preliminary Scientific Program </h2>
    			</div>
    		</div>
    	</div>
    
    
    
			<div class="tabs">
				<button class="tab-btn active" data-tab="hallA">HALL A</button>
				<button class="tab-btn" data-tab="hallB">HALL B</button>
				<button class="tab-btn" data-tab="hallC">HALL C</button>
				<button class="tab-btn" data-tab="hallD">HALL D</button>
			</div>

		
			<!-- HALL A -->
			<div id="hallA" class="tab-content active">
				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>FRIDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">08:00AM – 09:00AM</td>
							<td class="session" data-label="Session">Sunrise Update – Gross & Endoscopic Anatomy of the Lateral Wall of the Nose</td>
							<td class="faculty" data-label="Faculty"> Dr. Prahlada N B</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM – 01:00PM</td>
							<td class="session" data-label="Session"> Cadaveric Dissection Demonstration </td>
							<td class="faculty" data-label="Faculty">Dr. T. N. Janakiram</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:00PM - 02:00PM</td>
							<td class="session" data-label="Session" colspan="2"> Lunch</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:00PM - 05:00PM)</td>
							<td class="session text-center" data-label=" Session" colspan="2"> <strong>Interactive
									Surgical
									Video Sessions </strong></td>
						</tr>

						<tr>
							<td class="time" data-label="Time">02:00PM - 02:15PM</td>
							<td class="session" data-label="Session"> Multiport external frontal sinusotomy and repair of CSF leak</td>
							<td class="faculty" data-label="Faculty">Dr.Thulasi Das</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 02:15PM - 02:30PM C</td>
							<td class="session" data-label="Session"> Challenges in Management of CSF Rhinnorea</td>
							<td class="faculty" data-label="Faculty">Dr.Suma Radhakrishnan</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:30PM - 02:45PM</td>
							<td class="session" data-label="Session">Three Steps of Basic FESS </td>
							<td class="faculty" data-label="Faculty">Dr.V.Anand</td>
						</tr>

						<tr>
							<td class="time" data-label="Time"> 02:45PM - 03:00PM</td>
							<td class="session" data-label="Session"> Secondary Rhinoplasty with Closed Approach </td>
							<td class="faculty" data-label="Faculty"> Dr.Ignazio Tasca</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 03:00PM - 03:15PM </td>
							<td class="session" data-label="Session"> Strategies in the management of a crooked nose
							</td>
							<td class="faculty" data-label="Faculty"> Dr.Brajendra Baser</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:15PM - 03:30PM F</td>
							<td class="session" data-label="Session">Frontal sinus corridoors ( video presentation )
							</td>
							<td class="faculty" data-label="Faculty"> Dr.Jaskaran Singh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:30PM - 03:45PM</td>
							<td class="session" data-label="Session">Surgical management of central skull base osteomyelitis or surgical management
							</td>
							<td class="faculty" data-label="Faculty">Dr. Regi Thomas </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 03:45PM - 04:00PM  </td>
							<td class="session" data-label="Session">Endoscopic Septoplasty
							</td>
							<td class="faculty" data-label="Faculty">Dr.Monjurul Alam MD </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:00PM - 04:15PM  </td>
							<td class="session" data-label="Session">Trans Sphenoid Surgery
							</td>
							<td class="faculty" data-label="Faculty">Dr.Nishit J Shah</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:15PM - 04:30PM  </td>
							<td class="session" data-label="Session">Carlyon's Window
							</td>
							<td class="faculty" data-label="Faculty">Dr.Vinod Felix</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:30PM - 04:45PM  </td>
							<td class="session" data-label="Session">>Sterberg Canal CSF Leaks
							</td>
							<td class="faculty" data-label="Faculty">Dr.Sathyanarayanan JD</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:45PM - 05:00PM  </td>
							<td class="session" data-label="Session">Endoscopic Repair of Choanal Atresia by Crossover Flap Technique
							</td>
							<td class="faculty" data-label="Faculty">Dr.Shakuntala Ghosh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 05:30PM - 06:30PM  </td>
							<td class="session" data-label="Session">Hands-on Training – Microdebrider on Sheep Head
							</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b>
												<P>Dr.V.Anand</P>	
												<P>Dr.Udaya Kumar</P></td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 07:00PM</td>
							<td class="session" data-label="Session">Faculty Cum Paid Dinner
							</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
					</tbody>
				</table>


				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SATURDAY</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time"> 08:00AM  – 09:00AM </td>
							<td class="session" data-label="Session">Instructional Course on Frontal Sinus
									Surgery</td>
							<td class="faculty" data-label="Faculty"> Dr Nishit J Shah </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> </td>
							<td class="session text-center" data-label="Session" colspan="2"> <strong>Talks 1 (09:00 -
									10:30)</strong> </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 09:00AM  - 09:15AM  </td>
							<td class="session" data-label="Session"> Anatomy based intuitive Endoscopic Sinus Surgery
							</td>
							<td class="faculty" data-label="Faculty"> Dr. Benjamin S. A. Campomanes Jr.</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 09:15AM  - 09:30AM </td>
							<td class="session" data-label="Session">Tackling Peri-Operative issues in Endoscopic Sinus
								Surgery </td>
							<td class="faculty" data-label="Faculty">Dr.Shibu George </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 09:30AM  - 09:45AM </td>
							<td class="session" data-label="Session">Endoscopic management of Pediatrics Skull Base
								Tumours</td>
							<td class="faculty" data-label="Faculty">Dr.Radhamadhab Sahu </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 09:45AM - 10:00AM </td>
							<td class="session" data-label="Session"> </td>
							<td class="faculty" data-label="Faculty"> Dr. Meghanadh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:00AM - 10:15AM </td>
							<td class="session" data-label="Session"> Idiopathic intracranial hypertension in
								spontaneous CSF rhinorrhoea</td>
							<td class="faculty" data-label="Faculty"> Dr.Rupa Vedantam</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:15AM - 10:30AM</td>
							<td class="session" data-label="Session"> Visual outcomes after optic nerve Fenestration in
								cases of BIH</td>
							<td class="faculty" data-label="Faculty"> Dr.Anuragini Gupta</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 10.30AM - 11.15PM </td>
							<td class="session" data-label="Session">Dr Ashok Kumar Gupta Oration: Chairperson :
									<p>Dr.Rohit Sharma</p> 
									<p>Dr. Ajay Jain</p>
									<p>Dr.Ahilasamy</p></td>
							<td class="faculty" data-label="Faculty"> Prof. Dr.Tevfik Metin Onerci</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 11:15AM - 12:00PM</td>
							<td class="session" data-label="Session"> All India Rhinology Society Oration:
									Extradural
									cartilage inlay in the repair of skull
									base defects. Chairpersons: Dr. Ashok Kumar Gupta, Dr. Mohnish Grover, Dr.
									Sanjay Sood</td>
							<td class="faculty" data-label="Faculty"> Dr P Thulasi Das</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 12:00 PM- 12:45PM </td>
							<td class="session" data-label="Session">Panel 1: Challenges in Rhinology practice
									Moderator: Professor Ashok Kumar Gupta </td>
							<td class="faculty" data-label="Faculty">Dr Bachi Hathiram<br />
								Dr. Davinder Rai<br />
								Dr Sanjay Sood<br />
								Dr. Vinod Felix<br />
								</td>
						</tr>

						<tr>
							<td class="time" data-label="Time">12:45PM- 01:15PM</td>
							<td class="session" data-label="Session">Key note address 1 - Spontaneous csf leak:
									how
									guidelines can change your practice</td>
							<td class="faculty" data-label="Faculty"> Prof. Christos Georgalas</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 01:15PM - 01:30PM</td>
							<td class="session" data-label="Session">CROSS FIRE: Moderator : Dr. Atul
									Jain<br />
								Septoplaty Vs Functional Septorhinoplasty for nose blockade<br />
								“Simple Fix or Complete Reconstruction? Rethinking Surgery for Nasal Blockage” </td>
							<td class="faculty" data-label="Faculty"> Dr. Achal Gulati Vs Dr Brajendra
								Baser Vs Dr. Ajay Jain </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 01:30PM - 01:45PM </td>
							<td class="session" data-label="Session"> Draf Procedure</td>
							<td class="faculty" data-label="Faculty"> Dr. Davinder Rai</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:45PM - 02:00PM </td>
							<td class="session" data-label="Session"> Orbital transposition approach</td>
							<td class="faculty" data-label="Faculty"> Dr. Kittichai Limwattana </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 02:00PM - 03:00PM </td>
							<td class="text-center session" data-label="Session" colspan="2">
								<strong>Inaguration</strong>
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 03:00PM - 03:45PM </td>
							<td class="session" data-label="Session">Dr. L. S. Ojha / Dr. B. K. Ojha Memorial
									Panel
									Discussion<br />Rhinocerebral tumours- Moderator: Dr. Rohit Sharma </td>
							<td class="faculty" data-label="Faculty">Dr.Jaimanti Bakshi<br />
								Dr. Prathmesh Pai<br />
								Dr. Regi Thomas<br />
								Dr. Jagdeep Thakur<br />
								
								Dr. Venkat Karthikeyan<br />
								Dr. Suresh Kumar M<br />
								 </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> </td>
							<td class="session text-center" colspan="2" data-label="Session"><strong> Talks 2 (03:45 -
									04:30) Need Extra 30 mins</strong></td>
						</tr>

						<tr>
							<td class="time" data-label="Time"> 03:45PM - 04:00PM </td>
							<td class="session" data-label="Session">Epistaxis not to miss Stamm's S point</td>
							<td class="faculty" data-label="Faculty"> Dr. Ekambar C Reddy</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:00 - 04:15</td>
							<td class="session" data-label="Session"> Selection and Care of Rhinology Instruments
							</td>
							<td class="faculty" data-label="Faculty"> Dr.V.Anand</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:15 - 04:30 </td>
							<td class="session" data-label="Session">How to avoid complications in FESS: A practical guide</td>
							<td class="faculty" data-label="Faculty"> Dr. Gaurav Gupta </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">  </td>
							<td class="session" data-label="Session">Symosium on Skull Base Surgery (4:30-06:00)</td>
							<td class="faculty" data-label="Faculty">  </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:30PM - 04:45PM</td>
							<td class="session" data-label="Session"> Piutitary and other central skull base lesion </td>
							<td class="faculty" data-label="Faculty">Dr. Mohnish grover </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:45PM - 05:00PM </td>
							<td class="session" data-label="Session"> Paediatric Skull base surgery</td>
							<td class="faculty" data-label="Faculty"> Dr.Paresh P Naik <br />Dr.V.Anand</td>
						</tr>
						


						<tr>
							<td class="time" data-label="Time"> 05:00PM - 05:15PM </td>
							<td class="session" data-label="Session"> Transorbital Endoscopic skull base surgery</td>
							<td class="faculty" data-label="Faculty"> Dr.Vinod Felix</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 05:15PM - 05:30PM </td>
							<td class="session" data-label="Session"> ENDOSCOPIC TRANSNASAL SUPRA TUBAL APPROACH TO
								ANTERIOR INFERIOR
								PETROUS APEX(AIPA)</td>
							<td class="faculty" data-label="Faculty">Dr.Sreeramamurthy </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 05:30PM - 05:45PM</td>
							<td class="session" data-label="Session"> Role of Ipsilateral Nasoseptal flap in lateral
								recess of sphenoid Meningoencephalocele</td>
							<td class="faculty" data-label="Faculty">Dr.Ashwin V G </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 05:45PM - 06:00PM</td>
							<td class="session" data-label="Session"> endoscopic transpterygoid approach </td>
							<td class="faculty" data-label="Faculty"> Dr. Madhu Priya </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 06:00PM – 07:00PM</td>
							<td class="session" data-label="Session"> General Body Meeting</strong> </td>
							<td class="faculty" data-label="Faculty"> </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 07:00PM</td>
							<td class="session" data-label="Session">Gala Dinner with Culturals</td>
							<td class="faculty" data-label="Faculty"> </td>
						</tr>
					</tbody>
				</table>


				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SUNDAY</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time" rowspan="6"> 08:00AM – 09:00 AM </td>
							<td class="session" data-label="Session"> Panel Discussion on When Faces Fracture:
									The Art
									and Science of Repair</td>
							<td class="faculty" data-label="Faculty"> Dr.Mayuresh Verma </td>
						</tr>
						<tr>
							<td class="session" data-label="Session">Fronto Naso orbito ethmoid complex fractures</td>
							<td class="faculty" data-label="Faculty"> Dr. Jayanth Kumar Prakash </td>
						</tr>
						<tr>
							<td class="session" data-label="Session">Essentials of Imaging in Facial Trauma
							</td>
							<td class="faculty" data-label="Faculty"> Dr.Prahlada N B </td>
						</tr>
						<tr>
							<td class="session" data-label="Session">Management principles mandibular fractures
							</td>
							<td class="faculty" data-label="Faculty">Dr. Anbu Chezian </td>
						</tr>
						<tr>
							<td class="session" data-label="Session">Mid face, Zygomaticomaxillary fractures
							</td>
							<td class="faculty" data-label="Faculty"> Dr.Sunil Nema(Bhilai) </td>
						</tr>
						<tr>
							<td class="session" data-label="Session">Pan facial trauma
							</td>
							<td class="faculty" data-label="Faculty"> Dr. Nathan J A</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 09:00AM  - 09:30AM </td>
							<td class="session" data-label="Session"> Plenary Talk 1 - Stentless Endoscopic DCR:
									20
									years experience</td>
							<td class="faculty" data-label="Faculty"> Dr.Harvinder Singh</td>
						</tr>

						<tr>
							<td class="time" data-label="Time"> 09:30AM  - 10:00AM  </td>
							<td class="session" data-label="Session"> Plenary Talk 2 - The Sphenoid sinus -
									Basic and
									advanced approaches </td>
							<td class="faculty" data-label="Faculty"> Dr. Soma Subramanian</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 10.00 AM - 10.30AM </td>
							<td class="session" data-label="Session">Key Note address 2 : Complication on
									FESS</td>
							<td class="faculty" data-label="Faculty"> Prof. Dr.Jim Keat Siow</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 10.30AM  - 11.15AM </td>
							<td class="session" data-label="Session"> Dr VP Sood and Smt Udhi Devi Oration:
									Functional
									Rhinoseptoplasty: A Philosphy
									Chairperson- Dr. Sanjeev Arora, Dr. MG Rajinigandh </td>
							<td class="faculty" data-label="Faculty"> Dr.Ignazio Tasca</td>
						</tr>

						<tr>
							<td class="time" data-label="Time"> 11.15AM  - 12.00 PM </td>
							<td class="session" data-label="Session"> Panel: Sinusitis in today's era :
									Moderator : Dr.
									Meenesh Juvekar</td>
							<td class="faculty" data-label="Faculty"> Dr Rinjuneeta<br />
								Dr. Meenakshi Jain<br />
								Dr. Sanjeev Arora<br />
								Dr.Palaniappan<br />
								Dr.Revi Kumar<br />
								Dr. Senthil Kanitha<br />
								</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 12:00PM - 12:15PM </td>
							<td class="session" data-label="Session"> The Orbit and ENT Surgeon
							</td>
							<td class="faculty" data-label="Faculty">Dr.Gaurav Medikeri</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:15PM - 12:30PM </td>
							<td class="session" data-label="Session"> Management of Orbital Involvement in Sinonasal Malignancies
							</td>
							<td class="faculty" data-label="Faculty">Dr Kaberi Kakati </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:30PM - 02:00PM </td>
							<td class="session" data-label="Session"> Resident Quiz final
							</td>
							<td class="faculty" data-label="Faculty">Dr.Sathyanarayanan JD</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:00PM - 03:00PM </td>
							<td class="session" data-label="Session"> Valedictory & Prize Distribution
							</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- HALL B -->
			<div id="hallB" class="tab-content">
				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>FRIDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center " data-label="Session"><strong>Invited Talks (02:00PM - 05:00PM) </strong></td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:00PM - 02:15PM</td>
							<td class="session" data-label="Session">FRONTAL TREPHINE SAFE, SURE, SIMPLE TECHNIQUE FOR DIFFICULT FRONTAL REC</td>
							<td class="faculty" data-label="Faculty"> Dr.Madhu Sudana Rao C</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:15 PM – 02:30 PM </td>
							<td class="session" data-label="Session">Bilateral rhinolith, a rare case reporty</td>
							<td class="faculty" data-label="Faculty">Dr. Mohamed Osama Hegazy</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:30 PM – 02:45 PM</td>
							<td class="session" data-label="Session"> Endoscopic repair of unilateral choanal atresia: septal cross over flap technique </td>
							<td class="faculty" data-label="Faculty">Dr. Mohamed Abdelmoneam Salem</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
							<td class="session" data-label="Session">When Turbinates Turn Troublesome: Role of Inferior Turbinoplasty in Obstruction</td>
							<td class="faculty" data-label="Faculty">Dr. Vijay Sundhar</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:00 PM – 03:15 PM </td>
							<td class="session" data-label="Session">Emerging trends in management of rhino-orbital mucormycosis</td>
							<td class="faculty" data-label="Faculty">Dr. Maj. Prasanna</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:15 PM – 03:30 PM</td>
							<td class="session" data-label="Session"> Functional Single Portal Hypophyseal Access </td>
							<td class="faculty" data-label="Faculty">Dr. Sachin Patel</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 03:30 PM – 03:45 PM</td>
							<td class="session" data-label="Session">A new technique in functional endoscopic sinus surgery</td>
							<td class="faculty" data-label="Faculty">Dr. Santosh Shivaswamy</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 03:45 PM – 04:00 PM </td>
							<td class="session" data-label="Session">How I Approach Nasal Obstruction in My Practice </td>
							<td class="faculty" data-label="Faculty"> Dr. Deepak Haldipur</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
							<td class="session" data-label="Session"> Endoscopic Approaches to the Maxillary Sinus</td>
							<td class="faculty" data-label="Faculty"> Dr. V. Narendrakumar </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
							<td class="session" data-label="Session">Post Op Management of Sinus Surgery</td>
							<td class="faculty" data-label="Faculty">Dr. Rajeev Pachauri </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:30 PM – 04:45 PM</td>
							<td class="session" data-label="Session">Angiofibroma</td>
							<td class="faculty" data-label="Faculty">Dr. Anjan Kumar Sahoo</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 04:45 PM – 05:00 PM</td>
							<td class="session" data-label="Session">Unconventional Approaches to Maxillary Sinus</td>
							<td class="faculty" data-label="Faculty"> Dr. Bhanu Bhardwaj</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 05:30 PM – 06:30 PM</td>
							<td class="session" data-label="Session">Hands-on Training – Allergy Skin Prick Testing</td>
							<td class="faculty" data-label="Faculty"> <b>Course Directors:</b>
												  <p>Dr.Sarika Verma</p>
												  <p>Dr.Subir Jain</p>
												  <p>Dr.Sunita Chapola</p></td>
						</tr>
						
					</tbody>
				</table>

				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SATURDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">08:00AM – 09:00 AM </td>
							<td class="session" data-label="Session">Sunrise Update – Radiological Anatomy &
									Anatomical
									Variations of PNS & Anterior Skull Base </td>
							<td class="faculty" data-label="Faculty">Dr. Prahaladha N B</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM – 10:30AM</td>
							<td class="session" data-label="Session">Dr. I S Gupta Senior Consultant Award Paper
								</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> </td>
							<td class="session" data-label="Session">Ashok Kumar Gupta and AIRS Oration at Hall A(10:00AM-12:00PM)</td>
							
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center " colspan="2" data-label="Session"><strong>Invited Talks(12:00PM-1:30PM)
								</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:00PM - 12:15PM</td>
							<td class="session" data-label="Session">Diagnostic and therapeutic dilemna in nose and PNS
								tumours- Institutional experience </td>
							<td class="faculty" data-label="Faculty">Dr Jaimanti Bakshi</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:15 PM – 12:30 PM</td>
							<td class="session" data-label="Session">Eustachian Tube Dysfunction and Role of Nasal Endoscopy in its Management </td>
							<td class="faculty" data-label="Faculty">Dr. Avinava Ghosh </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 12:30 PM – 12:45 PM</td>
							<td class="session" data-label="Session">Endoscopic Repair of Anterior Septal Perforation using Anterior Ethmoidal Artery  </td>
							<td class="faculty" data-label="Faculty">Dr. Shakuntala Ghosh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:45 PM – 01:00 PM </td>
							<td class="session" data-label="Session">Orbital Decompression </td>
							<td class="faculty" data-label="Faculty">Dr. Monika Sood</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:00 PM – 01:15 PM</td>
							<td class="session" data-label="Session">Frontal Sinus approaches </td>
							<td class="faculty" data-label="Faculty">Dr. Hitesh Verma</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:15 PM – 01:30 PM </td>
							<td class="session" data-label="Session">Pediatric Balloon sinuplasty </td>
							<td class="faculty" data-label="Faculty">Dr. Ritu Gupta</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center " data-label="Session" colspan="2"><strong>Symosium on
									Pituatry & CSF Leak(1:30PM-3:00PM)</strong> </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 01:30 PM – 01:45 PM</td>
							<td class="session" data-label="Session">Surgical nuances in Endoscopic Pituitary Surgery with newer modalities to save vision </td>
							<td class="faculty" data-label="Faculty">Dr. Radhamadhab Sahu</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:45 PM – 02:00 PM</td>
							<td class="session" data-label="Session">Mastering the master gland : Multidisciplinary
								pituitary service</td>
							<td class="faculty" data-label="Faculty">Dr. Natarajan Saravanappa</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:00 PM – 02:15 PM </td>
							<td class="session" data-label="Session">Endoscopic Endonasal Approach to Pituitary</td>
							<td class="faculty" data-label="Faculty">Dr. Kittichai Mongkolkul</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:15 PM – 02:30 PM</td>
							<td class="session" data-label="Session">Optimizing Surgical Management of Sphenoid Lateral Recess CSF Leaks: Clinical Insights using the Wirk Modified Classification System </td>
							<td class="faculty" data-label="Faculty">Dr. Ravi Shankar </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> 02:30 PM – 02:45 PM</td>
							<td class="session" data-label="Session">Management of Frontal sinus CSF leaks</td>
							<td class="faculty" data-label="Faculty">Dr. Mohammad Noushad</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
							<td class="session" data-label="Session"> Non-traumatic CSF Rhinorrhea – Our Experience </td>
							<td class="faculty" data-label="Faculty">Dr.Rajasekar M K</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session  text-center " colspan="2" data-label="Session"><strong>Symposium on
									Rhinoplasty(03:00 – 05:15)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:00PM - 03:15PM</td>
							<td class="session" data-label="Session"> Lateral Crural Release: Potential workhorse for nasal tip deformities </td>
							<td class="faculty" data-label="Faculty">Dr. Jaskaran Singh </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:15PM - 03:30PM</td>
							<td class="session" data-label="Session">Rhinoplasty in Children: Current Status.</td>
							<td class="faculty" data-label="Faculty">Dr. Brajendra Baser</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:30PM - 03:45PM</td>
							<td class="session" data-label="Session">Septal perforation repair - open vs. endoscopic
								techniques.<br>
								Key Principles in Rhinoplasty</td>
							<td class="faculty" data-label="Faculty">Dr.Baskaran Ranganathan</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:45 PM- 04:00PM</td>
							<td class="session" data-label="Session">Tip Surgery in Aesthetic Rhinoplasty</td>
							<td class="faculty" data-label="Faculty">Dr. Kshitij Patil</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:00PM - 04:15PM</td>
							<td class="session" data-label="Session">Understanding Rhinoplasty: The basics</td>
							<td class="faculty" data-label="Faculty">Dr. Imtiaz Majid Qazi</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:15PM - 04:30PM</td>
							<td class="session" data-label="Session">Tip and Dorsum of Nose</td>
							<td class="faculty" data-label="Faculty">Dr. Manmohan V Jagade</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:30PM - 04:45PM</td>
							<td class="session" data-label="Session">Straight nose - Breath free with a Beautiful nose
							</td>
							<td class="faculty" data-label="Faculty">Dr. Prince Peter Dhas</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:45PM - 05:00PM</td>
							<td class="session" data-label="Session">Advanced Nasal Skeletal Reconstruction using a New Autologous Graft – The Dr. Devisha Technique </td>
							<td class="faculty" data-label="Faculty">Dr. Devisha Agarwal</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">05:00PM - 05:15PM</td>
							<td class="session" data-label="Session">Starting rhinoplasty: challenges and how to
								overcome</td>
							<td class="faculty" data-label="Faculty">Dr. Amardeep Singh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">05:30PM-6:30PM</td>
							<td class="session" data-label="Session">Hands-on Training – Coblation on Sheep Head</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b><br>
												Dr.Anand Raju<br>
												Dr.Jagadeesh Marthandam</td>
						</tr>
					</tbody>
				</table>

				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SUNDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">08:00AM – 08:30AM</td>
							<td class="session" data-label="Session">Panel Discussion on Allergy</td>
							<td class="faculty" data-label="Faculty"><b>Moderator:</b>Dr. Sarika Verma<b><br>Panelist:</b>
								<p>Dr.Padma</p>
								<p>Dr.Nitika Gupta</p>
								<p>Dr.Subir Jain</p>
								<p>Dr.Ashim Desai</p>
								<p>Dr.Sunitha Chapola</p>
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">08:30AM - 09:00AM</td>
							<td class="session" data-label="Session">Panel Discussion on CSF Leak</td>
							<td class="faculty" data-label="Faculty"><b>Moderator:</b>Dr. Venkatram Reddy<b><br>Panelist:</b>
								<P>Dr.Nishit J Shah</P>
								<p>Dr.Janakiram</p>
								<P>Dr.Shankar Narayanan</P>
								<P>Dr.Vinod Felix</p>
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM - 10:15AM</td>
							<td class="session text-center" colspan="2" data-label="Session"><b>Talk 4</b></td>

						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM - 09:15AM</td>
							<td class="session" data-label="Session"></td>
							<td class="faculty" data-label="Faculty">Dr. Jagdeep Thakur
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:15AM - 09:30AM</td>
							<td class="session" data-label="Session">Optimizing the outcomes of Functional Endoscopic
								Sinus Surgery</td>
							<td class="faculty" data-label="Faculty">Dr. Ajay Jain
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:30AM - 09:45AM</td>
							<td class="session" data-label="Session">Endoscopic Orbital Decompression</td>
							<td class="faculty" data-label="Faculty">Dr. Anukaran Mahajan
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:45AM - 10:00AM</td>
							<td class="session" data-label="Session"></td>
							<td class="faculty" data-label="Faculty">Dr. Munish Saroch
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:00AM - 10:15AM</td>
							<td class="session" data-label="Session"></td>
							<td class="faculty" data-label="Faculty">Dr. Punit
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:15AM - 10:30AM</td>
							<td class="session" data-label="Session">NCCT of PNS and Its Use as a Roadmap for Better Surgical Outcome</td>
							<td class="faculty" data-label="Faculty">Dr Rakesh Kumar
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session" data-label="Session">Dr VP Sood and Smt Udhi Devi Oration at Hall A (10:30AM - 11:15AM) </td>
							
							
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session" data-label="Session">Invited Talks (11:15AM - 12:45PM) </td>
							
							
						</tr>
						<tr>
							<td class="time" data-label="Time">11:15AM - 11:30AM</td>
							<td class="session" data-label="Session"> </td>
							<td class="faculty" data-label="Faculty">Dr. Amit Rana
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">11:30AM - 11:45AM</td>
							<td class="session" data-label="Session"> </td>
							<td class="faculty" data-label="Faculty">Dr. Neha Sharma
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">11:45AM - 12:00PM</td>
							<td class="session" data-label="Session">Coblation Vs Powered (Microdebrider assisted)
								Adenoidectomy- a comprehensive analysis </td>
							<td class="faculty" data-label="Faculty">Dr. Shruti Barua
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:00PM - 12:15PM</td>
							<td class="session" data-label="Session"> Improving outcome of DCR</td>
							<td class="faculty" data-label="Faculty">Dr. Baisukhi Bahot
							</td>
						</tr>
						
						<tr>
							<td class="time" data-label="Time">12:15PM - 12:30PM</td>
							<td class="session" data-label="Session"> Balloon Eustachian Tuboplasty</td>
							<td class="faculty" data-label="Faculty">Dr. Rajendran Dinesh Kumar
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:30PM - 12:45PM</td>
							<td class="session" data-label="Session"> Endoscopic filler injection for patulous eustacian
								tube.</td>
							<td class="faculty" data-label="Faculty">Dr. Wiradh Chitsuthipakan
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- HALL C -->
			<div id="hallC" class="tab-content">
				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>FRIDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="3" class="text-center"><strong>Invited Talks(02:00PM - 05:00PM)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:00 PM – 02:15 PM </td>
							<td class="session" data-label="Session">Dorsal Preservation Rhinoplasty in India: Reality Check and Two Reliable Techniques </td>
							<td class="faculty" data-label="Faculty">Dr. Ilambarathi </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:15 PM – 02:30 PM</td>
							<td class="session" data-label="Session">Rhinology of Reconstruction of Large Clival Defects </td>
							<td class="faculty" data-label="Faculty">Dr. Kiruba Shankar</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:30 PM – 02:45 PM</td>
							<td class="session" data-label="Session"> Skin Prick Test in Allergy Patients</td>
							<td class="faculty" data-label="Faculty">Dr. Rashmi Agarwal  </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
							<td class="session" data-label="Session">Eustachian Tube Dysfunction and Role of Nasal Endoscopy in its Management</td>
							<td class="faculty" data-label="Faculty">Dr. Avinava Ghosh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:00 PM – 03:15 PM </td>
							<td class="session" data-label="Session">Evaluation of Allergen Sensitisation and Personalised Allergen Avoidance Measures</td>
							<td class="faculty" data-label="Faculty"> Dr. Nayanyoti Sarma </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:15 PM – 03:30 PM </td>
							<td class="session" data-label="Session">Modern Endoscopic Adenoidectomies: A Comprehensive Analysis of Coblation vs Microdebrider</td>
							<td class="faculty" data-label="Faculty">Dr. Shruti Baruah</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:30 PM – 03:45 PM</td>
							<td class="session" data-label="Session">Fungal Mucoceles of Paranasal Sinus with Compressive Optic Neuropathy – A Case Series </td>
							<td class="faculty" data-label="Faculty"> Dr. Ajaiy M  </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:45 PM – 04:00 PM </td>
							<td class="session" data-label="Session">Fungal Sinusitis</td>
							<td class="faculty" data-label="Faculty">Prof. Dr. Shashikant</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
							<td class="session" data-label="Session">When the Nose Lands in Court: Lessons from Medico-Legal Realities</td>
							<td class="faculty" data-label="Faculty">Dr. Krishan Rajbhar</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
							<td class="session" data-label="Session">Navigating the Skull Base – Endoscopic Solutions for Complex Pathologies</td>
							<td class="faculty" data-label="Faculty"> Dr. Ramakrishnan V  </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:30 PM – 04:45 PM</td>
							<td class="session" data-label="Session">The Predictive Role of Lund Mackay Scoring in Surgical Treatment of Chronic Sinusitis</td>
							<td class="faculty" data-label="Faculty">Dr. Gautam Bir Singh</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:45 PM – 05:00 PM </td>
							<td class="session" data-label="Session">Sinonasal Tumors, Both Benign and Malignant</td>
							<td class="faculty" data-label="Faculty">Dr. Suresh M </td>
						</tr>
						<tr>
							<td class="time" data-label="Time">05:30PM – 06:30PM </td>
							<td class="session" data-label="Session">Hands-on Training – Olfaction Testing</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b>
												 <p>Dr.Regi Kurien</p>
												 <p>Dr.Lalee Varghese</p></td>
						</tr>

					</tbody>
				</table>

				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SATURDAY</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time"> 08:00AM – 09:00AM</td>
							<td class="session" data-label="Session"> Instructional Course on Transnasal
									endoscopic
									approaches to the lateral sphenoid recess</td>
							<td class="faculty" data-label="Faculty"> Dr. Tomasz Gotlib </td>
						</tr>
						<tr>
							<td class="time" data-label="Time"> </td>
							<td class="session text-center " data-label="Session" colspan="2"> <strong>Symposium on
									Modern Approach to Sinonasal
									Disorders(09:00AM - 10:30 AM)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM-09:15AM </td>
							<td class="session" data-label="Session">Endotyping in chronic rhinosinusitis.</td>
							<td class="faculty" data-label="Faculty">Dr.Lisa Mary Cherian</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:15AM - 09:30AM </td>
							<td class="session" data-label="Session">Carolyn’s Window Draf 2A: Direct Access to the
								Frontal Sinus</td>
							<td class="faculty" data-label="Faculty">Dr.Kachorn Seresirikachorn</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:30AM - 09:45AM </td>
							<td class="session" data-label="Session">The appropriate extent of ESS for managing CRS</td>
							<td class="faculty" data-label="Faculty">Dr.Kornkiat Snidvongs</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:45AM - 10:00AM</td>
							<td class="session" data-label="Session">Rethinking Rhinitis: The Role of Neuromarkers</td>
							<td class="faculty" data-label="Faculty">Dr.Dichapong Kanjanawasee</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:00AM - 10:15AM </td>
							<td class="session" data-label="Session">Impact of Preoperative Systemic Steroids on Tissue
								Eosinophils in CRSwNP</td>
							<td class="faculty" data-label="Faculty">Dr.Vorachai Pooldum</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:15AM - 10:30AM </td>
							<td class="session" data-label="Session">The Afterburn: Managing Radiation-induced
								Rhinosinusitis</td>
							<td class="faculty" data-label="Faculty">Dr.Prem Wungcharoen</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center " data-label="Session" colspan="2"> <strong>Ashok Kumar Gupta & AIRS Oration at Hall A (10:30AM - 12:00PM)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center " data-label="Session" colspan="2"> <strong>Symposium on
									Fungal Sinusitis(12:00PM-01:30 PM)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:00PM - 12:15PM</td>
							<td class="session" data-label="Session">Allergic Fungal Rhinosinusitis: a threat to
								recurrence</td>
							<td class="faculty" data-label="Faculty">Dr.Ashraful Islam MD</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:15PM - 12:30PM</td>
							<td class="session" data-label="Session">Acute invasive fungal sinusitis</td>
							<td class="faculty" data-label="Faculty">Dr.Regi Kurien</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:30PM - 12:45PM</td>
							<td class="session" data-label="Session">Conidiobolomycosis- a less known invasive fungal
								sinusitis</td>
							<td class="faculty" data-label="Faculty">Dr.Lalee Varghese</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">12:45PM- 01:00PM</td>
							<td class="session" data-label="Session">Fungal rhinosinusitis</td>
							<td class="faculty" data-label="Faculty">Dr.Vijayasundaram S</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:00PM- 01:15PM</td>
							<td class="session" data-label="Session">Granulomatous diseases of the nose</td>
							<td class="faculty" data-label="Faculty">Dr. Pookamala</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">1:15PM - 1:30PM</td>
							<td class="session" data-label="Session">Fungal rhinosinusitis-Question Answer</td>
							<td class="faculty" data-label="Faculty">Dr. Aru Handa</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">01:30PM - 02:15P</td>
							<td class="session" data-label="Session">Panel Discussion on Central Skull base Osteomyelitis</td>
							<td class="faculty" data-label="Faculty"><b>Moderator:</b> Dr.Regi Thomas
												<p><b>Panelist:</b></p>
												<p>Dr.Raghunandhan</p>
												<p>Dr.Vinod Felix</p>
												<p>Dr.Priscilla Rupali</p>
												<p>Dr.Gaurav Medikire</p>
												<p>Dr.Janakiram</p></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:15PM - 02:30PM</td>
							<td class="session" data-label="Session">Trans Sphenoid Surgery</td>
							<td class="faculty" data-label="Faculty">Dr.Nishit J Shah</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:30PM - 02:45PM</td>
							<td class="session" data-label="Session">Surgery for Chronic Rhinosinusitis-Is it curative or Myth?</td>
							<td class="faculty" data-label="Faculty">Dr. Divya Aggarwal</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">02:45PM - 03:00PM</td>
							<td class="session" data-label="Session">From Endoscope to Algorithm: The AI Revolution in Rhinology</td>
							<td class="faculty" data-label="Faculty">Dr.Krishan Rajbhar</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center" data-label="Session" colspan="2"><strong>Symposium on
									Allergy & Immunology(03:00PM – 05:00PM)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:00PM - 03:15PM</td>
							<td class="session" data-label="Session">Biologics for CRS & Immunotheraphy for Allergic
								Rhinitis</td>
							<td class="faculty" data-label="Faculty">Dr.Peter Leyden</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:15PM - 03:30PM</td>
							<td class="session" data-label="Session">Diagnosis and management of local allergic rhinitis
							</td>
							<td class="faculty" data-label="Faculty">Dr.Minh P. Hoang MD</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:30PM - 03:45PM</td>
							<td class="session" data-label="Session">Efficacy of Immunotherapy in Allergic Disease</td>
							<td class="faculty" data-label="Faculty">Dr.Sarika Verma</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">03:45PM - 04:00PM</td>
							<td class="session" data-label="Session">Allergy Diagnosis</td>
							<td class="faculty" data-label="Faculty">Dr.Nitika Gupta</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:00PM - 04:15PM</td>
							<td class="session" data-label="Session">Allergy & ENT</td>
							<td class="faculty" data-label="Faculty">Dr.Subir Jain</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:15PM - 04:30PM</td>
							<td class="session" data-label="Session">Allergy in Clinical Practice</td>
							<td class="faculty" data-label="Faculty">Dr.Ashim Desai</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:30PM - 04:45PM</td>
							<td class="session" data-label="Session">Biologics use in ENT</td>
							<td class="faculty" data-label="Faculty">Dr.Sunita Chapola</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">04:45PM - 05:00PM</td>
							<td class="session" data-label="Session">Pattern of Allergen sensitisation in patients with
								moderate -severe Persistent Allergic Rhinitis in different states of North East India
							</td>
							<td class="faculty" data-label="Faculty">Dr. Nayanjoyti Sarma</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">05:30PM - 06:30PM</td>
							<td class="session" data-label="Session">Hands-on Training – Facial Trauma</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b>
												 <p>Dr.Prahlada N B</p>
												 <p>Dr.Mayuresh Verma</p>
												 <p>Dr. J A Nathan</p></td>
						</tr>
					</tbody>
				</table>

				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SUNDAY</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">08:00AM - 08:15AM</td>
							<td class="session" data-label="Session"> Endonasal Endoscopic DCR Can contribute by sharing
								complications management and prevention</td>
							<td class="faculty" data-label="Faculty"> Dr. Milind M. Navalakhe</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">08:15AM – 09:00AM</td>
							<td class="session" data-label="Session"> Panel DIscussion on Rhinoplasty -
									Moderator:
									Bajendra Baser</td>
							<td class="faculty" data-label="Faculty"> <b>Panelist:</b>
								<p>Dr.Kannapan</p>
								<p>Dr.Kshitij Patil</p>
								<p>Dr.Ignazio Tasca</p>
								<p>Dr.ManMohan V Jagdev</p>
								<p>Dr.Prince Peter Dhas</p>
								<p>Dr.Ilambharathi</p>
							</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session text-center" colspan="2" data-label="Session"> <strong>Symposium on
									Obstructive Sleep Apnea(09:00 – 10:45)</strong></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:00AM - 09:15AM</td>
							<td class="session" data-label="Session">From Adenoids to Airways: Insights in Pediatric
								OSAS</td>
							<td class="faculty" data-label="Faculty">Dr.Rajesh Gudipudi</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:15AM - 09:30AM</td>
							<td class="session" data-label="Session">OSAS in Syndromic Children: Nasal Considerations
							</td>
							<td class="faculty" data-label="Faculty">Dr.Anukaran Mahajan</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:30AM - 09:45AM</td>
							<td class="session" data-label="Session">Recent Advances in Assessing Nasal Function in OSAS
							</td>
							<td class="faculty" data-label="Faculty">Dr.Vijaya Krishnan</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">09:45AM - 10:00AM</td>
							<td class="session" data-label="Session">Enhancing CPAP Adherence: The Role of the Nose</td>
							<td class="faculty" data-label="Faculty">Dr.Dipankar Datta</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:00AM - 10:15AM</td>
							<td class="session" data-label="Session">An Neglected Entity in OSA - Role of Salphingopharyngeal fold in OSA</td>
							<td class="faculty" data-label="Faculty">Dr.Anand Raju</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:15AM - 10:30AM</td>
							<td class="session" data-label="Session">Pivotal Role of Nasal Surgery in OSAS</td>
							<td class="faculty" data-label="Faculty">Dr.Sanu P Moideen</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">10:30PM - 10:45PM</td>
							<td class="session" data-label="Session">Maximizing treatment outcomes in OSA - Role of the
								nose</td>
							<td class="faculty" data-label="Faculty">Dr.Srinivas kishore S</td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session" data-label="Session">Dr VP Sood and Smt Udhi Devi Oration at Hall A (10:30AM - 11:15AM)</td>
							
						</tr>
					</tbody>
				</table>

			</div>

			<!-- HALL D -->
			<div id="hallD" class="tab-content">
				<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>FRIDAY</h5>
							</th>
						</tr>
						<tr>
							<th class="time">Time</th>
							<th class="session">Session</th>
							<th class="faculty">Faculty</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">02.00PM - 05.00AM</td>
							<td class="session" data-label="Session"><strong>Resident Quiz Prelimns</strong>
							</td>
							<td class="faculty" data-label="Faculty">Dr.Sathyanarayanan JD</td>
						</tr>
						<tr>
							<td class="time" data-label="Time">05.30PM - 06.30AM</td>
							<td class="session" data-label="Session"><strong>Hands-on Training – Balloon Sinuplasty and Tuboplasty</strong>
							</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b>
												 <p>Dr.Santhosh Shivasamy</p>
												 <p>Dr.Dinesh Kumar Rajendran</p>
												 <p>Dr.Ritu Gupta</p></td>
						</tr>
						
					</tbody>
				</table>
							<table class="schedule">
					<thead>
						<tr>
							<th colspan="3">
								<h5>SATURDAY</h5>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="time" data-label="Time">09.00AM - 10.30AM</td>
							<td class="session" data-label="Session">Mrs Neena Saharia Junior Consultant Award
									paper
							</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">11:00AM - 1:00PM</td>
							<td class="session" data-label="Session">Dr. Adesh Saxena and Dr. Mita Saxena
									Resident Award
									paper - Batch 1</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">1:00PM - 3.00PM</td>
							<td class="session" data-label="Session">Dr. Adesh Saxena and Dr. Mita Saxena
									Resident Award
									paper - Batch 2</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">3:30PM - 4:30PM PM</td>
							<td class="session" data-label="Session">Dr. Arvind Soni Video Award
									Session</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time"></td>
							<td class="session" data-label="Session"><b>Dr Anoop Raj Poster Award session:</b> Please
								enquire at reception for judges timings for their visit.</td>
							<td class="faculty" data-label="Faculty"></td>
						</tr>
						<tr>
							<td class="time" data-label="Time">5:30PM - 6:30PM PM</td>
							<td class="session" data-label="Session">Hands-on Training – Rhinomanometry</td>
							<td class="faculty" data-label="Faculty"><b>Course Directors:</b>
												<p>Dr.Srinivas Kishore S</p></td>
						</tr>
					</tbody>
				</table>

			</div>
			</div>
			</div>
			<script>
				// Tabs interactivity
				const tabButtons = document.querySelectorAll('.tab-btn');
				const tabContents = document.querySelectorAll('.tab-content');

				tabButtons.forEach(btn => {
					btn.addEventListener('click', () => {
						tabButtons.forEach(b => b.classList.remove('active'));
						tabContents.forEach(c => c.classList.remove('active'));
						btn.classList.add('active');
						document.getElementById(btn.dataset.tab).classList.add('active');
					});
				});
			</script>
    
@endsection

@section('footer_script')
@endsection