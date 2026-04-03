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



        <div class="tabs d-none">
            <button class="tab-btn active" data-tab="hallA">HALL A</button>
            <button class="tab-btn" data-tab="hallB">HALL B</button>
            <button class="tab-btn" data-tab="hallC">HALL C</button>
            <button class="tab-btn" data-tab="hallD">HALL D</button>
        </div>


        <!-- KURINJI HALL A -->
        <div id="hallA" class="tab-content active">
            <table class="schedule">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">
                            Kurinji Hall
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <h5>Day 1 - 28 Nov, Friday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time"><b style="font-weight:800">Time</b></th>
                        <th class="session"><b style="font-weight:800">Session</b></th>
                        <th class="faculty"><b style="font-weight:800">Faculty</b></th>
                        <th class="Chairperson"><b style="font-weight:800">Chairperson</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00AM – 09:00AM</td>
                        <td class="session" data-label="Session">Sunrise Update – Gross & Endoscopic Anatomy of the Lateral Wall of the Nose</td>
                        <td class="faculty" data-label="Faculty"> Dr. Prahlada N B</td>
                        <td class="Chairperson" data-label="Chairperson"> Prof. Dr. M.N. Shankar<br>Dr. Krishna Kumar</td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">09:00AM – 01:00PM</td>
                        <td class="session" data-label="Session"> Cadaveric Dissection Demonstration </td>
                        <td class="faculty" data-label="Faculty">Dr. T. N. Janakiram</td>
                        <td class="Chairperson" data-label="Chairperson">Dr. Gana Nathan<br>Dr. Thalapathy Ramkumar<br>Dr. James Peter Leynden </td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">01:00PM - 02:00PM</td>
                        <td class="session" data-label="Session"> Lunch</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center">
                            <b>Interactive Surgical Video Sessions (02:00PM - 05:00PM)</b>
                        </td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">02:00PM – 02:15PM</td>
                        <td class="session" data-label="Session">Multiport external sinusotomy and repair of CSF leak</td>
                        <td class="faculty" data-label="Faculty">Dr. Thulasi Das</td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="4">
                            Dr.Suresh Kumar Dodi<br>Dr.Dharma Varthina
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:15PM – 02:30PM</td>
                        <td class="session" data-label="Session">Challenges in Management of CSF Rhinorrhea</td>
                        <td class="faculty" data-label="Faculty">Dr.Suma Radhakrishnan</td>

                    </tr>


                    <tr>
                        <td class="time" data-label="Time">02:30PM – 02:45PM</td>
                        <td class="session" data-label="Session">Three Steps of Basic FESS</td>
                        <td class="faculty" data-label="Faculty">Dr. V. Anand</td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:45PM – 03:00PM</td>
                        <td class="session" data-label="Session">Secondary Rhinoplasty with Closed Approach</td>
                        <td class="faculty" data-label="Faculty">Dr. Ignazio Tasca</td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:00PM – 03:15PM</td>
                        <td class="session" data-label="Session">Strategies in the Management of a Crooked Nose</td>
                        <td class="faculty" data-label="Faculty">Dr. Brajendra Baser</td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="4">
                            Dr. Alaguvadivel<br>Dr. Rajan Kumar
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:15PM – 03:30PM</td>
                        <td class="session" data-label="Session">Optic nerve fenestration in IIH</td>
                        <td class="faculty" data-label="Faculty">Dr. Sandeep Bansal</td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:30PM – 03:45PM</td>
                        <td class="session" data-label="Session">Surgical management of central skull base osteomyelitis or surgical management of anterior skull base malignancy - Trans cribriform approach</td>
                        <td class="faculty" data-label="Faculty">Dr. Regi Thomas</td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:45PM – 04:00PM</td>
                        <td class="session" data-label="Session">Endoscopic Septoplasty</td>
                        <td class="faculty" data-label="Faculty">Dr. Monjurul Alam MD</td>

                    </tr>
                    <!-- --------------------------------------------------------------------------------------------- -->
                    <tr>
                        <td class="time" data-label="Time">04:00PM – 04:15PM</td>
                        <td class="session" data-label="Session">Endoscopic Transpterygoid Approach</td>
                        <td class="faculty" data-label="Faculty">Dr. Madhu Priya</td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="4">Dr.Balakrishnan Thirumaran<br>
                            Dr.L.Somu</td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15PM – 04:30PM</td>
                        <td class="session" data-label="Session">Carlyon's Window</td>
                        <td class="faculty" data-label="Faculty">Dr. Vinod Felix</td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:30PM – 04:45PM</td>
                        <td class="session" data-label="Session">Sterberg Canal CSF Leaks</td>
                        <td class="faculty" data-label="Faculty">Dr. Sathyanarayanan JD</td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:45PM – 05:00PM</td>
                        <td class="session" data-label="Session">Endoscopic Repair of Choanal Atresia by Crossover Flap Technique</td>
                        <td class="faculty" data-label="Faculty">Dr. Shakuntala Ghosh</td>

                    </tr>
                    <!-- ------------------------------------------------------------------------------------------------ -->
                    <tr>
                        <td class="time" data-label="Time">05:30PM – 06:30PM</td>
                        <td class="session" data-label="Session">Hands-on Training – Microdebrider on Sheep Head</td>
                        <td class="Chairperson" data-label="Faculty"><b>Course Directors:</b>
                            <p>Dr.V.Anand</p>
                            <p>Dr.Udaya Kumar</p>
                        </td>
                        <td class="faculty" data-label="Chairperson"></td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">07:30PM - 10:30PM</td>
                        <td class="session" data-label="Session">Faculty Cum Paid Dinner</td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
            </table>


            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 2 – 29 Nov, Saturday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00AM – 09:00AM</td>
                        <td class="session" data-label="Session"><b>Instructional Course on Frontal Sinus Surgery</b></td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr Nishit J Shah</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Bharathi Mohan</p>
                            <p>Dr. Venugopal Mohankumar</p>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="4">Invited Talks (09:00AM - 10:30AM)</td>

                    </tr>
                    <tr>
                        <td class="time" data-label="Time">09:00AM – 09:15AM</td>
                        <td class="session" data-label="Session">Anatomy based intuitive Endoscopic Sinus Surgery</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Benjamin S. A. Campomanes Jr.</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Jaya Prakash Maiya<br>
                            Dr.Ramani Raj<br>
                            Dr.Pathma Letchumanan
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:15AM – 09:30AM</td>
                        <td class="session" data-label="Session">Tackling Peri-Operative issues in Endoscopic Sinus Surgery</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Shibu George</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:30AM – 09:45AM</td>
                        <td class="session" data-label="Session">Endoscopic management of Pediatrics Skull Base Tumours</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Radhamadhab Sahu</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:45AM – 10:00AM</td>
                        <td class="session" data-label="Session">ENDOSCOPIC TRANSNASAL SUPRA TUBAL APPROACH TO ANTERIOR INFERIOR PETROUS APEX (AIPA)</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sreeramamoorthy</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:00AM – 10:15AM</td>
                        <td class="session" data-label="Session">Idiopathic intracranial hypertension in spontaneous CSF rhinorrhoea</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rupa Vedantam</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:15AM – 10:30AM</td>
                        <td class="session" data-label="Session">Visual outcomes after optic nerve Fenestration in cases of BIH</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anuragini Gupta</p>
                        </td>

                    </tr>
                    <!-- --------------------------------------------------------------------------------------- -->
                    <tr>
                        <td class="time" data-label="Time">10:30AM – 11:15AM</td>
                        <td class="session" data-label="Session">
                            <b>Dr Ashok Kumar Gupta Oration:</b> Approaches to the sphenoid sinus and skull base – Tips and tricks for the basic and advanced surgeon
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Soma Subramanian</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Rohit Sharma</p>
                            <p>Dr. Ajay Jain</p>
                            <p>Dr. Ahilasamy</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">11:15AM – 12:00PM</td>
                        <td class="session" data-label="Session">
                            <b>All India Rhinology Society Oration:</b> Extradural cartilage inlay in the repair of skull base defects
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr P Thulasi Das</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Ashok Kumar Gupta</p>
                            <p>Dr. Mohnish Grover</p>
                            <p>Dr. Sanjay Sood</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00PM – 12:45PM</td>
                        <td class="session" data-label="Session">Panel Discussion on Challenges in Rhinology Practice</td>
                        <td class="faculty" data-label="Faculty">
                            <b>Moderator:</b>
                            <p>Prof. Ashok Kumar Gupta</p>
                            <b>Panelists:</b>
                            <p>Dr. Rahul Aggarwal</p>
                            <p>Dr. Davinder Rai</p>
                            <p>Dr. Vinod Felix</p>
                            <p>Dr. Satyawati Mohindra</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Ranjana Kumari</p>
                            <p>Dr. Balaji</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:45PM – 01:15PM</td>
                        <td class="session" data-label="Session">
                            <b>Keynote Address 1:</b> Stentless Endoscopic DCR: 20 years experience
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Harvinder Singh</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Kirubananthan</p>
                            <p>Dr. V. Anand</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">01:15PM – 01:30PM</td>
                        <td class="session" data-label="Session">
                            <b>CROSS FIRE:</b><br>
                            Septoplasty Vs Functional Septorhinoplasty for nose blockage<br>
                            “Simple Fix or Complete Reconstruction? Rethinking Surgery for Nasal Blockage”
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <b>Moderator:</b>
                            <p>Dr. Atul Jain</p>
                            <p>Dr. Achal Gulati vs</p>
                            <p>Dr. Brajendra Baser vs</p>
                            <p>Dr. Ajay Jain</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Arul Sundharesh Kumar</p>
                            <p>Dr. Dhinakaran</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30PM – 01:45PM</td>
                        <td class="session" data-label="Session">Draf Procedure</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Davinder Rai</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="2">
                            <p>Dr.Tamilarasan<br>
                                Dr.V.Saravana Selvan</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:45PM – 02:00PM</td>
                        <td class="session" data-label="Session">Orbital Transposition Approach</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kittichai Limwattana</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------------------------------------ -->

                    <tr>
                        <td class="time" data-label="Time">02:00PM – 03:00PM</td>
                        <td class="session" data-label="Session" colspan="3">
                            <b>Inauguration</b>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:00PM – 03:45PM</td>
                        <td class="session" data-label="Session">
                            <b>Dr. L. S. Ojha / Dr. B. K. Ojha Memorial Panel Discussion</b><br>
                            Sinonasal Tumors: A 360 Degree Perspective
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <b>Moderator:</b>
                            <p>Dr. Rohit Sharma</p>
                            <b>Panelists:</b>
                            <p>Dr. Jaimanti Bakshi</p>
                            <p>Dr. Kiruba Shankar</p>
                            <p>Dr. Regi Thomas</p>
                            <p>Dr. Jagdeep Thakur</p>
                            <p>Dr. Venkat Karthikeyan</p>
                            <p>Dr. Suresh Kumar M</p>


                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Alagu Vadivel</p>
                            <p>Prof. M.K. Mohindroo</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time" colspan="3">Invited Talks (03:45PM - 05:15PM)</td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:45PM – 04:00PM</td>
                        <td class="session" data-label="Session">
                            Epistaxis not to miss Stamm's S point
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ekambar C Reddy</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="3">
                            <p>Dr.Ahmed Hassan Tohow<br>
                                Dr.Sathya</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:00PM – 04:15PM</td>
                        <td class="session" data-label="Session">
                            Selection and Care of Rhinology Instruments
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. V. Anand</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15PM – 04:30PM</td>
                        <td class="session" data-label="Session">
                            How to avoid complications in FESS: A practical guide
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Gaurav Gupta</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">04:30PM – 04:45PM</td>
                        <td class="session" data-label="Session">
                            Pituitary and other central skull base lesions
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Mohnish Grover</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="3">
                            <p>Dr.Rakesh Kumar<br>
                                Dr.Savitha Srilanka</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:45PM – 05:00PM</td>
                        <td class="session" data-label="Session">
                            Transorbital Endoscopic skull base surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Vinod Felix</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">05:00PM – 05:15PM</td>
                        <td class="session" data-label="Session">
                            Trans Sphenoid Surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Nishit J Shah</p>
                        </td>

                    </tr>
                    <!-- -------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">05:30PM – 06:30PM</td>
                        <td class="session" data-label="Session">
                            <b>Hands-on Training – Coblational on Sheep Head</b><br>
                            <b>Course Directors:</b>
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anand Raju</p>
                            <p>Dr. Jagadeesh Marthandam</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">06:30PM – 07:30PM</td>
                        <td class="session" data-label="Session">
                            General Body Meeting
                        </td>
                        <td class="faculty" data-label="Faculty">—</td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">07:30PM – 10:30PM</td>
                        <td class="session" data-label="Session">
                            Gala Dinner with Culturals
                        </td>
                        <td class="faculty" data-label="Faculty">—</td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>

            <!-- ----------------------------------------------------------------------------------- -->

            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 3 - 30 Nov, Sunday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time" rowspan="5">08:00AM – 09:00AM</td>
                        <td class="session" data-label="Session">
                            Panel Discussion on When Faces Fracture: The Art and Science of Repair
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Mayuresh Verma</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="7">
                            Dr.Revadi<br>
                            Dr.K.Ravi ESI
                        </td>
                    </tr>

                    <tr>

                        <td class="session" data-label="Session">
                            Fronto-Naso-Orbito Ethmoid Fracture: My Approach & Technique in Management
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Jayanth Kumar Prakash</p>
                        </td>

                    </tr>

                    <tr>

                        <td class="session" data-label="Session">Essentials of Imaging in Facial Trauma</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Prahlada N B</p>
                        </td>

                    </tr>

                    <tr>

                        <td class="session" data-label="Session">Mid face, Zygomaticomaxillary fractures</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sunil Nema</p>
                        </td>

                    </tr>

                    <tr>

                        <td class="session" data-label="Session">Midface and Orbital fractures</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Nathan J A</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:00AM – 09:15AM</td>
                        <td class="session" data-label="Session">
                            Optimizing the outcomes of Functional Endoscopic Sinus Surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ajay Jain</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:15AM – 09:30AM</td>
                        <td class="session" data-label="Session">Total Maxillectomy without Scar</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Jagdeep Thakur</p>
                        </td>

                    </tr>

                    <!-- ----------------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">09:30AM – 10:00AM</td>
                        <td class="session" data-label="Session"><b>Keynote Address 2</b></td>
                        <td class="faculty" data-label="Faculty">

                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="2">
                            <p>Dr.Mohnish Grover<br>
                                Dr.Anthony Irudhayarajan</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:00AM – 10:30AM</td>
                        <td class="session" data-label="Session"><b>Keynote Address 3</b></td>
                        <td class="faculty" data-label="Faculty">

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:30AM – 11:15AM</td>
                        <td class="session" data-label="Session">
                            <b>Dr VP Sood and Smt Udhi Devi Oration:</b><br>
                            Functional Rhinosetopasty: A Philosophy
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ignazio Tasca</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Sanjeev Arora</p>
                            <p>Dr. MG Rajinigandh</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">11:15AM – 12:00PM</td>
                        <td class="session" data-label="Session">
                            <b>Panel Discussion on Sinusitis in Today’s Era</b>
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <b>Moderator:</b>
                            <p>Dr. Meenesh Juvekar</p>

                            <b>Panelists:</b>
                            <p>Dr. Rijuneeta</p>
                            <p>Dr. Meenakshi Jain</p>
                            <p>Dr. Sanjeev Arora</p>
                            <p>Dr. Palaniappan</p>
                            <p>Dr. Ashraful Islam MD</p>
                            <p>Dr. Gaurav Medikeri</p>


                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Edwin Liyambo</p>
                            <p>Dr. Kiran</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00PM – 12:15PM</td>
                        <td class="session" data-label="Session">The Orbit and ENT Surgeon</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Gaurav Medikeri</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="2">
                            <p>Dr.Sachin Patel<br>
                                Dr.Krishna Sundhar</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:15PM – 12:30PM</td>
                        <td class="session" data-label="Session">Management of Orbital Involvement in Sinonasal Malignancies</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kaberi Kakati</p>

                        </td>

                    </tr>
                    <!-- ------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">12:30PM – 01:30PM</td>
                        <td class="session" data-label="Session">Yagdarshan Rai AIRS Resident Quiz – Finals</td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sathyanarayanan JD</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30PM – 02:30PM</td>
                        <td class="session" data-label="Session">Valedictory & Prize Distribution</td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- MULLAI HALL  -->
        <div id="MULLAI HALL" class="tab-content active">
            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">
                            <p>MULLAI HALL</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <h5>Day 1 - 28 Nov, Friday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">09:00AM – 12:00AM</td>
                        <td class="session" data-label="Session">
                            Mrs. Neena Saharia Junior Consultant Award Paper – Batch 1
                        </td>
                        <td class="faculty" data-label="Faculty">

                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00PM – 01:00PM</td>
                        <td class="session" data-label="Session">
                            Yagdarshan Rai AIRS Resident Quiz – Prelims
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sathyanarayan</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                    <tr>

                        <td class="session" data-label="Session" colspan="4">Invited Talks(1:00PM-5:00PM)</td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:00PM – 01:15PM</td>
                        <td class="session" data-label="Session">
                            CHOANAL ATRESIA: How I do it
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sandeep Kumar</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="5">
                            <p>Dr.Adenji<br>
                                Dr.Karthikeyan</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:15PM – 01:30PM</td>
                        <td class="session" data-label="Session">
                            Surgical Techniques of Adenoidectomy: Optimizing Outcomes in OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sankara Subramanian</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30PM – 01:45PM</td>
                        <td class="session" data-label="Session">
                            Quantifying Nasal Resistance: Clinical Applications of Rhinomanometry in OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Vijaya Krishnan</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:45PM – 02:00PM</td>
                        <td class="session" data-label="Session">
                            NASO ORBITAL LESIONS, TRANS ORBITAL APPROACH. OUR MADHUMANI EXPERIENCE
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Manideep</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:00PM – 02:15PM</td>
                        <td class="session" data-label="Session">
                            Seeing the Unseen: Endoscopic Management of Sphenoid Fungal Sinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Abhilash Alex</p>
                        </td>

                    </tr>

                    <!-- ---------------------------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">02:15PM – 02:30PM</td>
                        <td class="session" data-label="Session">
                            Posterior Table Frontal Sinus CSF Leak Repair
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Khageswar Rout</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="5">
                            Dr.V.J.Vikram<br>Dr.Prince
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:30PM – 02:45PM</td>
                        <td class="session" data-label="Session">
                            Role of Ipsilateral Naso septal flap in lateral recess of sphenoid
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ashwin V G</p>
                        </td>

                    </tr>
                    <tr>
                        <td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
                        <td class="session" data-label="Session">
                            Functional Single Portal Hypophyseal Access
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sachin Patel</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:00 PM – 03:15 PM</td>
                        <td class="session" data-label="Session">
                            When turbinates turn troublesome: Role of inferior turbinoplasty in obstruction relief and the emerging role of PRP as an adjuvant therapy in allergic rhinitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Vijayasuandaram S</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:15 PM – 03:30 PM</td>
                        <td class="session" data-label="Session">
                            Emerging trends in management of rhino-orbital mucormycosis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Maj. Prasanna</p>
                        </td>

                    </tr>

                    <!-- --------------------------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">03:30 PM – 03:45 PM</td>
                        <td class="session" data-label="Session">
                            Endoscopic DCR – How to Improve the Results
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Venkatram Reddy</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Kachoran<br>
                            Dr.Palaniappan
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:45 PM – 04:00 PM</td>
                        <td class="session" data-label="Session">
                            A new technique in functional endoscopic sinus surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Santhosh Shivaswamy</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
                        <td class="session" data-label="Session">
                            How I Approach Nasal Obstruction in My Practice
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Deepak Haldipur</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
                        <td class="session" data-label="Session">
                            Endoscopic Approaches to the Maxillary Sinus
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. V. Narendrakumar</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:30 PM – 04:45 PM</td>
                        <td class="session" data-label="Session">
                            TONES – Transorbital Neuroendoscopic Surgery – A Cadaveric Approach
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ashima Saxena</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:45 PM – 05:00 PM</td>
                        <td class="session" data-label="Session">
                            Unconventional Approaches to Maxillary Sinus
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Bhanu Bhardwaj</p>
                        </td>

                    </tr>

                    <!-- -------------------------------------------------------------------->
                    <tr>
                        <td class="time" data-label="Time">05:30 PM – 06:30 PM</td>
                        <td class="session" data-label="Session">
                            Hands-on Training – Balloon Sinuplasty and Tuboplasty
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <b>Course Directors:</b>
                            <p>Dr. Santhosh Shivasamy</p>
                            <p>Dr. Dinesh Kumar Rajendran</p>
                            <p>Dr. Ritu Gupta</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>
            <!-- ----------------------------------------------------------------------->
            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 2 - 29 Nov, Saturday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 09:00 AM</td>
                        <td class="session" data-label="Session">
                            Sunrise Update – Radiological Anatomy & Anatomical Variations of PNS & Anterior Skull Base
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Prahlada N B</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Semmana Selvan</p>
                            <p>Dr. Senthil Raj</p>
                            <p>Dr. Porkodi</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:00 AM – 10:00 AM</td>
                        <td class="session" data-label="Session">
                            Dr. I.S. Gupta Senior Consultant Award Paper
                        </td>
                        <td class="faculty" data-label="Faculty">

                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:00 AM – 10:15 AM</td>
                        <td class="session" data-label="Session">
                            Endoscopic management of Sphenoid Sinuses extending to infratemporal fossa and the surgical challenges
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anjan Kumar Sahoo</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="2">
                            <p>Dr. Parthiban Maharajan<br>Dr.Kalidas</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:15 AM – 10:30 AM</td>
                        <td class="session" data-label="Session">
                            Paediatric Skull Base Surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Paresh P Naik</p>

                        </td>

                    </tr>

                    <!-- ----------------------------------------------------------------- -->

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Ashok Kumar Gupta & AIRS Oration at Hall A(10:30 AM – 12:00 PM)
                        </td>
                        <td class="faculty" data-label="Faculty">
                        </td>

                    </tr>
                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Invited Talks(12:00PM-1:30PM)
                        </td>
                        <td class="faculty" data-label="Faculty">
                        </td>

                    </tr>


                    <tr>
                        <td class="time" data-label="Time">12:00 PM – 12:15 PM</td>
                        <td class="session" data-label="Session">
                            Diagnostic and therapeutic dilemma in nose and PNS tumours – Institutional experience
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Jaimanti Bakshi</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.K.Krishna Kumar<br>
                            Dr.Vijayasundharam S
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:15 PM – 12:30 PM</td>
                        <td class="session" data-label="Session">
                            Eustachian Tube Dysfunction and Role of Nasal Endoscopy in its Management
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Avinava Ghosh</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:30 PM – 12:45 PM</td>
                        <td class="session" data-label="Session">
                            Orbital Decompression
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Monika Sood</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:45 PM – 01:00 PM</td>
                        <td class="session" data-label="Session">
                            Management of Chronic Rhinosinusitis based on Endotypes & Phenotypes
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Shakuntala Ghosh</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:00 PM – 01:15 PM</td>
                        <td class="session" data-label="Session">
                            Pediatric Balloon Sinoplasty
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ritu Gupta</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:15 PM – 01:30 PM</td>
                        <td class="session" data-label="Session">
                            Endoscopic Orbital Decompression
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anukaran Mahajan</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------------------------- -->

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Symosium on Pituatry & CSF Leak (01:30PM - 03:00PM)
                        </td>
                        <td class="faculty" data-label="Faculty">
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30 PM – 01:45 PM</td>
                        <td class="session" data-label="Session">
                            Surgical nuances in Endoscopic Pituitary Surgery with newer modalities to save Normal Pituitary Gland
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Radhamadhab Sahu</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Siddique<br>
                            Dr.Krishna Kuamr K
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:45 PM – 02:00 PM</td>
                        <td class="session" data-label="Session">
                            Mastering the master gland: Multidisciplinary pituitary service
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Natarajan Saravanappa</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:00 PM – 02:15 PM</td>
                        <td class="session" data-label="Session">
                            Endoscopic Endonasal Approach to Pituitary
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kittichai Mongkolkul</p>
                            <p>Dr. Siddique</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:15 PM – 02:30 PM</td>
                        <td class="session" data-label="Session">
                            Optimizing Surgical Management of Sphenoid Lateral Recess CSF Leaks: Clinical Insights Using the Virk Modified Classification System
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ravi Shankar</p>
                            <p>Dr. Krishna Kumar K</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:30 PM – 02:45 PM</td>
                        <td class="session" data-label="Session">
                            Management of frontal sinus CSF leaks
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Mohammad Noushad</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
                        <td class="session" data-label="Session">
                            Non-traumatic CSF Rhinorrhoea – Our Experience
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rajashekar M</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------------------------- -->
                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Symposium on Rhinoplasty(3:00PM-5:15PM)</td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>



                    <tr>
                        <td class="time" data-label="Time">03:00 PM – 03:15 PM</td>
                        <td class="session" data-label="Session">
                            Lateral Crural Release: Potential workhouse for nasal tip deformities
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Jaskaran Singh</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="8">
                            Dr.Kannappan<br>
                            Dr.Ilambharathi
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:15 PM – 03:30 PM</td>
                        <td class="session" data-label="Session">
                            Rhinoplasty in Children: Current Status
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Brajendra Baser</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:30 PM – 03:45 PM</td>
                        <td class="session" data-label="Session">
                            Septal perforation repair – open vs. endoscopic techniques
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Baskaran Ranganathan</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
                        <td class="session" data-label="Session">
                            Understanding Rhinoplasty: The basics
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Imtaz Majid Qazi</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
                        <td class="session" data-label="Session">
                            Tip and Dorsum of Nose
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Manmohan V Jagade</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:30 PM – 04:45 PM</td>
                        <td class="session" data-label="Session">
                            Straight nose – Breathe free with a Beautiful nose
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Prince Peter Dhas</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:45 PM – 05:00 PM</td>
                        <td class="session" data-label="Session">
                            Total anatomical nasal skeletal reconstruction using a new autologous graft –
                            the tent-shaped fibular contoured bone graft
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Devisha Agarwal</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">05:00 PM – 05:15 PM</td>
                        <td class="session" data-label="Session">
                            Starting rhinoplasty: challenges and how to overcome
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Amardeep Singh</p>
                        </td>

                    </tr>

                    <!-- Hands-on Training Section -->
                    <tr>
                        <td class="time" data-label="Time">05:30 PM – 06:30 PM</td>
                        <td class="session" data-label="Session">
                            Hands-on Training – Olfaction Testing
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><strong>Course Directors:</strong></p>
                            <p>Dr. Regi Kurien</p>
                            <p>Dr. Lalee Varghese</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>


            <!-- ---------------------------------------------------------------- -->

            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 3 - 30 Nov, Sunday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 08:45 AM</td>
                        <td class="session" data-label="Session">
                            Panel Discussion on Allergy
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><strong>Moderator:</strong> Dr. Sarika Verma</p>
                            <p><strong>Panelists:</strong></p>
                            <p>Dr. Pathma Letchumannan</p>
                            <p>Dr. Nitika Gupta</p>
                            <p>Dr. Kasyapi Nagaraju</p>
                            <p>Dr. Ashim Desai</p>
                            <p>Dr. Sunitha Chapola</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Noushad</p>
                            <p>Dr. Ahilasamy</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">08:45 AM – 09:30 AM</td>
                        <td class="session" data-label="Session">
                            Panel Discussion on CSF Leak
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><strong>Moderator:</strong> Dr. Venkatram Reddy</p>
                            <p><strong>Panelists:</strong></p>
                            <p>Dr. Tomasz Gotlib</p>
                            <p>Prof. Dr. M.N. Shankar</p>
                            <p>Dr. Shankar Narayanan</p>
                            <p>Dr. Vinod Felix</p>
                            <p>Dr. ThalapathY Ramkumar</p>
                            <p>Dr. Thulasi Das</p>
                            <p>Dr. Maj. Prasanna</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. M.K. Rajasekar</p>
                            <p>Dr. Natraj P</p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <h5>Invited Talks (09:30AM - 10:30PM)</h5>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:30 AM – 09:45 AM</td>
                        <td class="session" data-label="Session">
                            Frontal Sinus approaches
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Hitesh Verma</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="3">
                            <p>Dr.Jeeva<br>
                                Dr.Diwagar</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:45 AM – 10:00 AM</td>
                        <td class="session" data-label="Session">
                            Tips and Tricks of Pituitary Adenoma Surgery as ENT Surgeon
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Manish Saroch</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:15 AM – 10:30 AM</td>
                        <td class="session" data-label="Session">
                            NCCT of PNS and Its Use as a Roadmap for Better Surgical Outcome
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rakesh Kumar</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------ -->

                    <tr>
                        <td colspan="4">
                            Dr VP Sood and Smt Udhi Devi Oration at Hall A (10:30AM - 11:15AM)
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            Invited Talks (11:15AM - 12:45PM)
                        </td>
                    </tr>


                    <tr>
                        <td class="time" data-label="Time">11:15 AM – 11:30 AM</td>
                        <td class="session" data-label="Session">
                            Chronic Rhinosinusitis: Optimizing outcomes
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Amit Rana</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Murugesha Pandiyan<br>
                            Dr.Nagarajan
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">11:30 AM – 11:45 AM</td>
                        <td class="session" data-label="Session">
                            The Supremacy of Endoscopic Pre Lacrimal Approach for Maxillary Lesions
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Neha Sharma</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">11:45 AM – 12:00 PM</td>
                        <td class="session" data-label="Session">
                            Endonasal Approaches for Craniopharyngioma
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Roopesh</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00 PM – 12:15 PM</td>
                        <td class="session" data-label="Session">
                            Improving outcome of DCR
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Baisakhi Bakat</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:15 PM – 12:30 PM</td>
                        <td class="session" data-label="Session">
                            Balloon Eustachian Tuboplasty
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rajendran Dinesh Kumar</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:30 PM – 12:45 PM</td>
                        <td class="session" data-label="Session">
                            Endoscopic filler injection for patulous eustacian tube
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Wiradh Chitsuthipakan</p>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>


        <!-- MARUTHAM HALL  -->
        <div id="MARUTHAM HALL" class="tab-content active">
            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">
                            <p>Marutham Hall</p>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <h5>Day 1 - 28 Nov, Friday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">09:00AM-01:00PM</td>
                        <td class="session" data-label="Session">
                            Dr. Adesh Saxena and Dr. Mitra Saxena Resident Award Paper – Batch 1 (09:00 AM – 01:00 PM)
                        </td>
                        <td class="faculty" data-label="Faculty">

                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                    <tr>

                        <td class="session" data-label="Session" colspan="4">
                            Invited Talks (01:30PM - 04:45PM)
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30 PM – 01:45 PM</td>
                        <td class="session" data-label="Session">
                            Role of Allergic Rhinitis in OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Satyawati Mohindra</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Wirach Chitsuthipakorn<br>
                            Dr.Lo Ren Hui
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:45 PM – 02:00 PM</td>
                        <td class="session" data-label="Session">
                            Fungal mucoceles of paranasal sinus with compressive optic neuropathy – a case series
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ajaiy M</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:00 PM – 02:15 PM</td>
                        <td class="session" data-label="Session">
                            DORSAL PRESERVATION RHINOPLASTY IN INDIA: REALITY CHECK AND TWO RELIABLE TECHNIQUES FOR IDEAL CASES
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ilambarathi</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:15 PM – 02:30 PM</td>
                        <td class="session" data-label="Session">
                            Rhinology of Reconstruction of large dival defects
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kiruba Shankar</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:30 PM – 02:45 PM</td>
                        <td class="session" data-label="Session">
                            Skin Prick Test in Allergy Patients
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rashmi Agarwal</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
                        <td class="session" data-label="Session">
                            Meningoencephalocele – Endoscopic Excision
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rohit Sharma</p>
                        </td>

                    </tr>

                    <!-- --------------------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">03:00 PM – 03:15 PM</td>
                        <td class="session" data-label="Session">
                            Evaluation of Allergen sensitisation and personalised allergen avoidance measures in AR: A geographical and integrated management approach
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Nayanjyoti Sarma</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="7">
                            Dr.Senthilraj Retinasekharan<br>Dr.Kornkiat Snidvongs
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:15 PM – 03:30 PM</td>
                        <td class="session" data-label="Session">
                            Modern Endoscopic Adenoidectomies: A comprehensive analysis of Coblation vs Microdebrider & Beyond
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Shruti Baruah</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:30 PM – 03:45 PM</td>
                        <td class="session" data-label="Session">
                            Enhancing CPAP Adherence: The Role of the Nose
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sandeep Bansal</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:45 PM – 04:00 PM</td>
                        <td class="session" data-label="Session">
                            When the Nose Lands in Court: Lessons from Medico-Legal Realities
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Krishan Rajbhar</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
                        <td class="session" data-label="Session">
                            Navigating skull base endoscopic solutions for complex pathologies
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ramakrishnan V</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
                        <td class="session" data-label="Session">
                            The predictive role of Lund Mackey scoring in surgical treatment of chronic sinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Gautam Bir Singh</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:30 PM – 04:45 PM</td>
                        <td class="session" data-label="Session">
                            Impact of Salvage Surgery on Recurrent Sinonasal Cancers
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Suresh M</p>
                        </td>

                    </tr>

                    <!-- ---------------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">05:30 PM – 06:30 PM</td>
                        <td class="session" data-label="Session">
                            Hands-on Training – Rhinomanometry
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><strong>Course Director:</strong> Dr. Srinivas Kishore S</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>

            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 2 - 29 Nov, Saturday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 09:00 AM</td>
                        <td class="session" data-label="Session">
                            Instructional Course on Transnasal endoscopic approaches to the lateral sphenoid recess
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Tomasz Gotlib</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr.Udhaya Kumar</p>
                            <p>Dr. Kittichai Limwattana</p>
                        </td>
                    </tr>


                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            <b>Symposium on Modern Approach to Sinonasal Disorders(09:00 AM – 10:30 AM)</b>
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:15 AM – 09:30 AM</td>
                        <td class="session" data-label="Session">
                            Carolyn’s Window Draf 2A: Direct Access to the Frontal Sinus
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kachorn Seerisrikachorn</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="5">
                            <p>Dr.Ravi Shankar</p>
                            <p>Dr.Roopa</p>
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:30 AM – 09:45 AM</td>
                        <td class="session" data-label="Session">
                            The appropriate extent of ESS for managing CRS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Komkiat Snidvongs</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:45 AM – 10:00 AM</td>
                        <td class="session" data-label="Session">
                            Rethinking Rhinitis: The Role of Neuromarkers
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Dichapong Kanjanawasee</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:00 AM – 10:15 AM</td>
                        <td class="session" data-label="Session">
                            Impact of Preoperative Systemic Steroids on Tissue Eosinophils in CRSwNP
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Vorachai Pooldum</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:15 AM – 10:30 AM</td>
                        <td class="session" data-label="Session">
                            The Afterburn: Managing Radiation-induced Rhinosinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Prem Wungcharoen</p>
                        </td>

                    </tr>

                    <!-- --------------------------------------------------------------- -->

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            <b>Ashok Kumar Gupta & AIRS Oration at Hall A (10:30 AM – 12:00 PM)</b>
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            <b>Symposium on Fungal Sinusitis(12:00 PM – 01:15 PM)</b>
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00 PM – 12:15 PM</td>
                        <td class="session" data-label="Session">
                            Allergic Fungal Rhinosinusitis: a threat to recurrence
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ashraful Islam MD</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="5">
                            Dr.Leena Rajam
                            Dr.Shenbagavalli
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:15 PM – 12:30 PM</td>
                        <td class="session" data-label="Session">
                            Acute invasive fungal sinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Regi Kurien</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:30 PM – 12:45 PM</td>
                        <td class="session" data-label="Session">
                            Conidiobolomycosis: a less-known invasive fungal sinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Lalee Varghese</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:45 PM – 01:00 PM</td>
                        <td class="session" data-label="Session">
                            Granulomatous diseases of the nose
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Pookamala</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:00 PM – 01:15 PM</td>
                        <td class="session" data-label="Session">
                            Fungal Rhinosinusitis – Question Answer
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Aru Handa</p>
                        </td>

                    </tr>

                    <!-- ----------------------------------------- -->

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            <b>Invited Talks(01:15 PM – 02:45 PM)</b>
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:15 PM – 01:30 PM</td>
                        <td class="session" data-label="Session">
                            Endonasal Endoscopic DCR
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Milind M. Navalakhe</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="6">
                            Dr.Harsimran<br>
                            Dr.Harmindar Singh Tuli
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:30 PM – 01:45 PM</td>
                        <td class="session" data-label="Session">
                            Frontal Sinus Corridors
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Jaskaran Singh</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">01:45 PM – 02:00 PM</td>
                        <td class="session" data-label="Session">
                            Two and a Half Decades of Experience in Transnasal Endoscopic Excision of Juvenile Nasopharyngeal Angiofibroma: Evolution, Outcomes, and Lessons Learned
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Devang Gupta</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:00 PM – 02:15 PM</td>
                        <td class="session" data-label="Session">
                            Trans Sphenoid Surgery
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Nishit J Shah</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:15 PM – 02:30 PM</td>
                        <td class="session" data-label="Session">
                            Surgery for Chronic Rhinosinusitis – Is it curative or myth?
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Divya Aggarwal</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">02:30 PM – 02:45 PM</td>
                        <td class="session" data-label="Session">
                            From Endoscope to Algorithm: The AI Revolution in Rhinology
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Krishan Rajbhar</p>
                        </td>

                    </tr>

                    <!-- ------------------------------------------------------------ -->

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            <b>Symposium on Allergy & Immunology(02:45 PM – 04:30 PM)</b>
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">02:45 PM – 03:00 PM</td>
                        <td class="session" data-label="Session">
                            Biologics for CRS & Immunotherapy for Allergic Rhinitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Peter Leyden</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="7">
                            Dr.Balakrishnan Thirumaran<br>
                            Dr.Baskaran Ranganathan
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:00 PM – 03:15 PM</td>
                        <td class="session" data-label="Session">
                            Diagnosis and management of local allergic rhinitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Minh P. Hoang MD</p>

                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:15 PM – 03:30 PM</td>
                        <td class="session" data-label="Session">
                            Efficacy of Immunotherapy in Allergic Disease
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sarika Verma</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:30 PM – 03:45 PM</td>
                        <td class="session" data-label="Session">
                            Allergy Diagnosis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Nitika Gupta</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:45 PM – 04:00 PM</td>
                        <td class="session" data-label="Session">
                            Pharmacotherapy in Allergic disease
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Kasyapi Nagaraju</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:00 PM – 04:15 PM</td>
                        <td class="session" data-label="Session">
                            Chronic Rhinosinusitis
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ashim Desai</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">04:15 PM – 04:30 PM</td>
                        <td class="session" data-label="Session">
                            Biologics use in ENT
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sunita Chapola</p>
                        </td>

                    </tr>

                    <!-- ----------------------------------------- -->

                    <tr>
                        <td class="time" data-label="Time">05:30 PM – 06:30 PM</td>
                        <td class="session" data-label="Session">
                            Hands-on Training – Facial Trauma
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><b>Course Directors:</b></p>
                            <p>Dr. Prahlada N B</p>
                            <p>Dr. Mayuresh Verma</p>
                            <p>Dr. Jayanth Kumar Prakash</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>


            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 3 - 30 Nov, Sunday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 08:45 AM</td>
                        <td class="session" data-label="Session">
                            Panel Discussion on Rhinoplasty
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><b>Moderator:</b> Bajendra Baser</p>
                            <p><b>Panelists:</b></p>
                            <p>Dr. Kannapan</p>
                            <p>Dr. Ignazio Tasca</p>
                            <p>Dr. Manmohan V Jagade</p>
                            <p>Dr. Prince Peter Dhas</p>
                            <p>Dr. Ilambharathi</p>

                        </td>
                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Yoganand</p>
                            <p>Dr. Rakesh</p>
                        </td>
                    </tr>

                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Symposium on Obstructive Sleep Apnea(8:45-11:00)
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">08:45 AM – 09:00 AM</td>
                        <td class="session" data-label="Session">
                            From Adenoids to Airways: Insights in Pediatric OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Rajesh Gudipudi</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson" rowspan="7">
                            Dr.Anand Das<br>
                            Dr.Shruti Baruah
                        </td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:00 AM – 09:15 AM</td>
                        <td class="session" data-label="Session">
                            OSAS in Syndromic Children: Nasal Considerations
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anukaran Mahajan</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:15 AM – 09:30 AM</td>
                        <td class="session" data-label="Session">
                            Recent Advances in Assessing Nasal Function in OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Vijaya Krishnan</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:30 AM – 09:45 AM</td>
                        <td class="session" data-label="Session">
                            Pivotal Role of Nasal Surgery in OSAS
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Sanu P Moideen</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">09:45 AM – 10:00 AM</td>
                        <td class="session" data-label="Session">
                            Maximizing Treatment Outcomes in OSA – Role of the Nose
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Srinivas Kishore S</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:00 AM – 10:15 AM</td>
                        <td class="session" data-label="Session">
                            An Neglected Entity in OSA – Role of Sphenopalatine Fold in OSA
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Anand Raju</p>
                        </td>

                    </tr>

                    <tr>
                        <td class="time" data-label="Time">10:15 AM – 10:30 AM</td>
                        <td class="session" data-label="Session">
                            Role of Nasal Surgery in Adult OSA
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p>Dr. Ashwin Menon</p>
                        </td>

                    </tr>
                    <!-- ----------------------------------------------- -->
                    <tr>

                        <td class="session" data-label="Session" colspan="3">
                            Dr VP Sood and Smt Udhi Devi Oration at Hall A(10:30AM-11:15AM)
                        </td>

                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                    <tr>
                        <td class="time" data-label="Time">11:15AM-12:00PM</td>
                        <td class="session" data-label="session">

                            Panel Discussion on Central Skull base Osteomyelitis
                        </td>
                        <td class="faculty" data-label="faculty">
                            <strong>Moderator:</strong> Dr. Regi Thomas
                            <strong>Panelists</strong>
                            <p>Dr. Raghunandan</p>
                            <p>Dr. Vinod Felix</p>
                            <p>Dr. Priscilla Rupali</p>
                            <p>Dr. Gaurav Medikire</p>
                            <p>Dr. Kiruba Shankar</p>
                            <p>Dr. Bharathi Mohan</p>
                        </td>

                        <td class="Chairperson" data-label="Chairperson">
                            <p>Dr. Senthil Kumar</p>
                            <p>Dr. George Thomas</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- NEITHAL HALL  -->
        <div id=" NEITHAL HALL " class="tab-content active">
            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 2 - 29 Nov, Satruday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 12:00 PM</td>
                        <td class="session" data-label="Session">
                            Dr. Adesh Saxena and Dr. Mitra Saxena Resident Award Paper – Batch 2
                        </td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00 PM – 03:00 PM</td>
                        <td class="session" data-label="Session">
                            Mrs. Neena Saharia Junior Consultant Award Paper – Batch 2
                        </td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">03:00 PM – 05:00 PM</td>
                        <td class="session" data-label="Session">
                            Dr. Arvind Soni Video Award Session
                        </td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">05:30 PM – 06:30 PM</td>
                        <td class="session" data-label="Session">
                            Hands-on Training – Allergy Skin Prick Testing
                        </td>
                        <td class="faculty" data-label="Faculty">
                            <p><b>Course Directors:</b></p>
                            <p>Dr. Sarika Verma</p>
                            <p>Dr. Nitika Gupta</p>
                            <p>Dr. Sunita Chapola</p>
                        </td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- PAALAI HALL  -->
        <div id=" PAALAI HALL " class="tab-content active">
            <table class="schedule mt-2">
                <thead>
                    <tr>
                        <th colspan="4">
                            <h5>Day 2 - 29 Nov, Satruday</h5>
                        </th>
                    </tr>
                    <tr>
                        <th class="time">Time</th>
                        <th class="session">Session</th>
                        <th class="faculty">Faculty</th>
                        <th class="Chairperson">Chairperson</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="time" data-label="Time">08:00 AM – 12:00 PM</td>
                        <td class="session" data-label="Session">
                            Dr. Anoop Raj Poster Award Session – Batch 1
                        </td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
                    </tr>

                    <tr>
                        <td class="time" data-label="Time">12:00 PM – 04:00 PM</td>
                        <td class="session" data-label="Session">
                            Dr. Anoop Raj Poster Award Session – Batch 2
                        </td>
                        <td class="faculty" data-label="Faculty"></td>
                        <td class="Chairperson" data-label="Chairperson"></td>
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