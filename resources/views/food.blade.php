@extends('layouts.web')
@section('title_bar', 'Congress Food Menu | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Congress Food Menu</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Congress Food Menu</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!--===== ABOUT AREA STARTS =======-->
<div class="about4-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <!--<div class="col-lg-6">
                <div class="about-images">
                	<div class="row">
                		<div class="col-lg-6 col-md-6">
                			<div class="img1 image-anime reveal">
                				<img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img11.png' }}" alt="" />
                			</div>
                			<div class="space30"></div>
                			<div class="content-box">
                				<h6> Gala Dinner</h6>
                				<div class="space6"></div>
                				<ul>
                					<li>
                						<a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/clock1.svg' }}" alt="" />28, 29, 30 - Nov
                							- 2025</a>
                					</li>
                					<li>
                						<a href="#"><img src="{{ env('APP_URL').'public/asset/img/icons/location1.svg' }}" alt="" />Le Royal
                							Meridian </a>
                					</li>
                				</ul>
                			</div>
                		</div>
                		<div class="col-lg-6 col-md-6">
                			<div class="space44"></div>
                			<div class="img1 image-anime reveal">
                				<img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img12.png' }}" alt="" />
                			</div>
                			<div class="space30"></div>
                			<div class="img1 image-anime reveal">
                				<img src="{{ env('APP_URL').'public/asset/img/all-images/about/about-img13.png' }}" alt="" />
                			</div>
                		</div>
                	</div>
                </div>
                </div>-->
            <div class="col-lg-12">
                <div class="about4-heading  heading7">
                    <h2 class="text-anime-style-3"> Dive into Rich Culinary Heritage Tamilnadu Dishes </h2>
                    <div class="space16"></div>
                    <p><i>Message From Hotel Manager Le Royal Meridian And Dr. N Ahilasamy, Congress President</i>
                    </p>
                    <div class="space16"></div>
                    <p class="mb-3" data-aos="fade-left" data-aos-duration="600">The highly anticipated Rhinocon
                        2025 is set to
                        take place at Le Royal Meridien, Chennai, for three enthralling days of knowledge sharing,
                        networking, and innovation.
                    </p>
                    <p class="mb-3" data-aos="fade-left" data-aos-duration="700">Adding to the enhanching the
                        splendor of
                        Rhinocon 2025, Chief Chef Mr. Daniel Kumar and
                        Dr.N. Ahilasamy, Congress President, have smashingly curated a Healthy and Authentic Tamil
                        Menu for the event. Carefully designed to reflect the rich culinary heritage of Tamil Nadu,
                        the menu will culminate both vegetarian and non-vegetarian Tamilnadu regional delicacies,
                        blending traditional flavors with a health-conscious approach.
                    </p>
                    <p class="mb-3" data-aos="fade-left" data-aos-duration="600">A Culinary Journey Through Tamil
                        Nadu<br />Attendees will savour an exquisite selection of dishes, thoughtfully crafted to
                        render both authenticity and nourishment. 
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="mb-3 mt-3" data-aos="fade-left" data-aos-duration="700">We serve Seafood ,
                                Chicken
                                and Mutton
                                in Lunches and Dinners. We don’t use fresh water fish, but use only Boneless
                                Seafish, Shripms,
                                Sea Crab ( for soup). For Meat we use tender Goat under 8Kg, young Broiler and
                                Country Chicken.
                                No frozen meet or Seafood will be used. Only Fresh catch. 
                            </p>
                            <p class="mb-3" data-aos="fade-left" data-aos-duration="800">Most of the well known
                                healthy Tamil
                                vegetables will be used in cuisine like mouth watering Drumstick, Banana flowers,
                                Banana stem,
                                cow pea, Colocasia, unripe jack fruit and many more
                            </p>
                            <p class="mb-3" data-aos="fade-left" data-aos-duration="900">We serve Low sodium both
                                Veg and Non
                                Veg soups both in all lunches and Dinners, we are sure you will be tempted to taste
                                both soups
                                all time, please do it.
                            </p>
                            <p class="mb-3" data-aos="fade-left" data-aos-duration="900">A variety of seasonal and
                                local Cut
                                fruits will be served in all lunches and Bananas in all Dinners along with Tamil
                                regional
                                desserts like Payasams, Tirunelveli halwa, palkowa and ice cream in dessert counter.
                            </p>
                            <p class="mb-3" data-aos="fade-left" data-aos-duration="900">For Welcome Dinner and Gala
                                Dinners we
                                have Live counters - Tamil traditional Veg and Non veg Kothu parata, Dosa, Idiyapam
                                , various
                                egg preparations like kalaki.
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <div class="zabout4-heading">
                                <ul data-aos="fade-left" data-aos-duration="1000" class="mb-3">
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />We will try to serve in
                                        Banana leaf
                                        buffet as per Tamil culture if possible.
                                    </li>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />We will serve Naan, roti,
                                        Veg khorma/
                                        Dal
                                    </li>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" />We will not serve
                                        Continental nor
                                        Chinese foods
                                    </li>
                                    <li><img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}" alt="" /> Miday Filter Coffee and Tea
                                        will be
                                        served with Tamilnadu authentic snacks like Murukku, Thattai, and piping hot
                                        Vada/
                                        Bajji/Bonda 
                                    </li>
                                </ul>
                                <p class="mb-3" data-aos="fade-left" data-aos-duration="900">We are arranging to
                                    source and
                                    serve the freshest, highest-quality ingredients we can get our hands on. Because
                                    we know a
                                    nutritious and balanced diet does something amazing to your body and mind
                                </p>
                                <h5>Vegetarian Delights</h5>
                                <p class="mb-3" data-aos="fade-left" data-aos-duration="900">Morgankai Paruppu
                                    Charu, Karamani
                                    Kathirikai Kara Kuzhambu, Saivam Mutton Kola Urandai, Kollimali Mooligai Rasam,
                                    Mango
                                    Morgankai Thooku, Kosambari
                                </p>
                                <h5>Non-Vegetarian Specialties</h5>
                                <p class="mb-3" data-aos="fade-left" data-aos-duration="900">Nandu ( Crab ) Charu,
                                    Moolanoor
                                    Kari Biryani, Yera Milagu Charu, Karuveppillai Meen Kuzhambu, Mutton Kothu Kari,
                                    Milagu
                                    Kalakki, Prawns Chukka, Mutton kolla balls
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p class="mb-3" data-aos="fade-left" data-aos-duration="900">Join us at Le Royal
                                Meridien, Chennai,
                                as we celebrate knowledge, innovation, and exquisite Tamil gastronomy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== ABOUT AREA ENDS =======-->




	<!--===== MENU AREA STARTS =======-->
	<div class="foodmenu-area sp3 desktop-view ">
		<div class="container ">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-pink text-center">LUNCH</h3>
					<div class="space20"></div>

					<div class="foodmenu-table " data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th> </th>
										<th>28-Nov-2025</th>
										<th>29-Nov-2025</th>
										<th>30-Nov-2025</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><strong>Soup</strong></td>
										<td>Morgankai Parappu Charu (Drumstick)<br />
											Kurumilagu Attukal Charu (Lamb Leg)<br />
										</td>
										<td>Vazhai Thandu Charu (Bannana stem)<br />
											Yera Milagu Charu (Shrimp peper)<br />
										</td>
										<td>Varamali Thakali Charu (Dry coriander, tomato)<br />
											Kozhi Milagu Charu (Chicken pepper)
										</td>
									</tr>
									<tr>
										<td><strong>Salads</strong></td>
										<td>Garden Greens<br />
											Thenga Manga Sundal (Coconut Mango)<br />
											Samosa Chat,<br />
											Raitha/Pickle/Papad/Curd Rice
										</td>
										<td>Garden Greens<br />
											Kachori Sev Chat<br />
											Manga Uralai Sundal (Mango Potatao)<br />
											Raitha/Pickle/Papad/Curd Rice
										</td>
										<td>Garden Greens<br />
											Thenga velarikai Sundal (Coconut, Peanut)<br />
											Shakarkand ki sev Chat<br />
											Raitha/Pickle/Papad/Curd Rice

										</td>
									</tr>
									<tr>
										<td><strong>NonVeg Mains</strong></td>
										<td>Moolanoor Kari Biryani (Lamb)<br />
											Athur Ayila Meen Kuzhambu (Sea fish Mackrel)<br />
											Karuveppilai Thakali Kozhi Korma (Chicken)

										</td>
										<td>Dindigul Kozhi Biryani (Seerga Samba Chicken)<br />
											Karuveppilai Meen Kuzhambu (Sea fish)<br />
											Sankagiri Kari Kuzhambu (Lamb)
										</td>
										<td>Pallipalayam Kozhi Kuzhambu (Chicken)<br />
											Mapillai Mutton Biryani<br />
											Masala Fried Fish (SI)
										</td>
									</tr>
									<tr>
										<td><strong>Veg Mains</strong></td>
										<td>Paneer Tikka Labadhar<br />
											Thakali Milagu Rasam (Tomato Pepper)<br />
											Pondu Kara Kuzhambu (Spicy Garlic)<br />
											Kodai Melagai Uralai Vadhakal (Chilly Potato fry)<br />
											Vazhaipoo paruppu usali (Banana flower)<br />
											Steamed Rice<br />
											Arisi Paruppu Sadam (Rice Dal)<br/><strong>Indian Breads:</strong> Roti /Naan/Paroota 

										</td>
										<td>Vendakai Moor Kuzhambu (Ladies finger curd)<br />
											Pineapple Rasam<br />
											Nagercoil Avial (Mixed Veg)<br />
											Karamani Katharikai Kara Kuzhambu (Cow pea, Brinjal spicy)<br />
											Dal Makani<br /> Steamed Rice<br />
											Palakai Biryani (Unripe jack fruit)<br/><strong>Indian Breads:</strong> Roti /Naan/Paroota 
										</td>
										<td>Parangikai Kootu (Pumkin)<br />
											Paruupuurandai Kuzhambu (Dal balls)<br />
											Kurumilagu Rasam (Pepper)<br />
											Lasooni Dal Tadka<br />
											Cabbage Carrot Beans Pea Poriyal (Flag fry)<br />
											Steamed Rice<br />
											Kalan Biryani (Mushroom)<br /> <strong>Indian Breads: </strong>Roti /Naan/Paroota 

										</td>
									</tr>
									<tr>
										<td><strong>Desserts</strong></td>
										<td>Godhumai Nei Payasam (Wheat Ghee)<br />
											Fresh Cut Fruits<br />
											Chocolate Ice Cream
										</td>
										<td>Fresh Cut Fruits<br />
											Aval Payasam (Pressed rice)<br />
											Strawberry Ice cream
										</td>
										<td>Fresh Cut Fruits<br />
											Paal khova (Milk)<br />
											Coffee Ice cream
										</td>
									</tr>

								</tbody>
							</table>
						</div>



					</div>
				</div>

				<div class="space50"></div>

			</div>

			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-pink text-center">DINNER</h3>
					<div class="space20"></div>
					<div class="foodmenu-table " data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th> </th>
										<th>28-Nov-2025</th>
										<th>29-Nov-2025</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><strong>Soup</strong></td>
										<td>Kollu Milagu Charu (Horse Gram Pepper)<br />
											Erode Nattu Kozhi Charu (Country chicken)
										</td>
										<td>Broccoli Almond Soup<br />
											Nandu Pepper Charu (Crab)
										</td>
									</tr>
									
										<tr>
										<td><strong>Starters </strong></td>
										<td>Pallipalayam Kalan Varuval  (Mushroom)<br />
                                            Saivam Mutton Kola Urandai ( Veg mutton)<br />
                                            Vendakai Verkadalai Bagoda ( Ladys finger peanut)<br />
                                            Kozhi Chintamani ( Chicken)<br />
                                            Pollachi poricha Meen Varuval  ( Sea fish)  <br />
                                            Yera Sukka ( Prawns)

										</td>
										<td>Kai Kari Kuchi Varuval ( Veggies)<br />
                                            Kongu Thatta Wade <br />
                                            Chettinad Vazhakkai Cutlet ( Bannana)<br />
                                            Mutton Kola Urandai <br />
                                            Pollachi Meen 65 ( Sea fish)<br />
                                            Yera Milagu Varuval ( Shrimp)

										</td>
									</tr>

									<tr>
										<td><strong>Salads</strong></td>
										<td>Garden Greens<br />
											Kosambari (split legumes and cucumber)<br />
											Nilgiri Salad<br />
											Raitha/Pickle/Papad/Curd Rice
										</td>
										<td>
											Garden Greens<br />
											Verkadalai Kara (Peanut)<br />
											Thayir wade (Curd)<br />
											Raitha/Pickle/Papad/Curd Rice
										</td>
									</tr>
									<tr>
										<td><strong>NonVeg Mains </strong></td>
										<td>Kongu Nattu Kozhi Kuzhambu (Country Chicken)<br />
											Mutton Kothu Kari (Minced)
										</td>
										<td>Madurai Kara Kari Kuzhambu (Lamb)<br />
											Pallipalayam Kozhi Peratal (Chicken)
										</td>
									</tr>
									<tr>
										<td><strong>Mains Veg </strong></td>
										<td>Katharikai Mochai Karakuzhambu (Brinjal, Field beans)<br />
											Kollimali Mooligai Rasam (Medicinal herbs)<br />
											Kalayana Sambar<br />
											Cheppankazhangu Kara Varuval (Colocasia)<br />
											Madurai Poricha Kai Kari Korma (Fried Veg)<br />
											Steamed Rice, Kothamalli Sadam (Coriander rice)
										</td>
										<td>Soraka Kadasal (Bottle gourd)<br />
											Kavipoo Pattani Korma (Cauliflower peas)<br />
											Kadama Sambar (Mixed Veg)<br />
											Manga Morgankai Thooku (Mango Drumstick)<br />
											Sundakai Vatha Kuzhambu (Turkey berry)<br />
											Steamed Rice<br /> Donne Kushka
										</td>
									</tr>
									<tr>
										<td><strong>Desserts </strong></td>
										<td>Banana<br />
											EIaneer Payasam (Tender coconut)<br />
											Vanilla Ice Cream
										</td>
										<td>Tirunelveli Halwa<br /> Banana<br />
											Mango Ice Cream
										</td>
									</tr>
									<tr>
										<td><strong>Live Counter</strong></td>
										<td>Kothu Parotta – Veg, Non Veg,<br />
											Muttai Kalakki<br />Milagu Kalakki<br /> Kuzhambu Kalakki (Egg
											preparations)<br />
											Kal Dosa<br /> Bun Parotta<br /> Veechu Parotta<br />
											Three Types of Chutney<br /> sambar<br /> Podi
										</td>
										<td>Iddiyappam – Veg Paya , Salna<br />
											Muttai Kalakki<br /> Milagu Kalakki<br /> Kuzhambu Kalakki (Egg prep)<br />
											Kal Dosa, Bun Parotta<br /> Veechu Parotta<br />
											Three Types of Chutney<br /> Sambar<br /> Podi
										</td>
									</tr>


								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="space50"></div>

			</div>


			<div class="row">
				<div class="col-lg-12">
					<div class="foodmenu-table " data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>

										</th>
										<th>Day 1 - 28-Nov-2025</th>
										<th>Day 2 - 29-Nov-2025</th>
										<th>Day 3 - 30-Nov-2025</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><strong>AMT</strong></td>
										<td>Murukku, Nippattu, Ellu Urandai, Thaen Mittai, <br />Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, <br />
											Vazhakkai Bhaji (Bannana)
										</td>
										<td>Murukku, Nippattu, Ellu Urandai, <br />Thaen Mittai, Kadali Mittai, <br />
											Tea/Coffee/Bakery Biscuit,
											Onion Bonda</td>
										<td>Murukku, Nippattu, Ellu Urandai,<br /> Thaen Mittai, Kadali Mittai, <br />
											Tea/Coffee/Bakery Biscuit, <br />
											Ulundu Vadai </td>
									</tr>
									<tr>
										<td><strong>PMT</strong></td>
										<td>Murukku, Nippattu, Ellu Urandai,<br /> Thaen Mittai, Kadali Mittai,<br />
											Tea/Coffee/Bakery Biscuit, <br />
											Paruppu Vadai </td>
										<td>Murukku, Nippattu, Ellu Urandai,<br /> Thaen Mittai, Kadali Mittai,<br />
											Tea/Coffee/Bakery Biscuit,<br />
											Madras Pakoda</td>
										<td>-------------</td>
									</tr>


								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="space50"></div>

			</div>

		</div>
	</div>
	<!--===== MENU AREA ENDS =======-->



	<!--===== MENU AREA STARTS =======-->
	<div class="schedule-section-area sp3 mobile-view">
		<div class="container ">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-pink text-center">DAY 1 - 28-Nov-2025</h3>
					<div class="space20"></div>

					<div class="schedule mt-3" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>LUNCH</strong></td>
										<th>Soup</th>
										<td>Morgankai Parappu Charu (Drumstick)<br /> Kurumilagu Attukal Charu (Lamb
											Leg)
										</td>
										<th>Salads</th>
										<td>Garden Greens<br /> Thenga Manga Sundal (Coconut Mango)<br /> Samosa
											Chat<br />
											Raitha/Pickle/Papad/Curd Rice</td>
										<th>Non-Veg Mains</th>
										<td>Moolanoor Kari Biryani (Lamb)<br /> Athur Ayila Meen Kuzhambu (Sea Fish
											Mackarel)<br /> Karuveppilai Thakali Kozhi Korma (Chicken)
										</td>
										<th>Veg Mains</th>
										<td>Paneer Tikka Labadhar<br /> Thakali Milagu Rasam (Tomato Pepper)<br /> Pondu
											Kara
											Kuzhambu (Spicy Garlic)<br /> Kodai Melagai Uralai Vadhakal (Chilly Potato
											Fry)<br />
											Vazhaipoo Paruppu Usali (Banana Flower)<br /> Steamed Rice<br />Arisi
											Paruppu Sadam
											(Rice Dal)<br/><strong>Indian Breads:</strong> Roti /Naan/Paroota </td>
										<th>Desserts</th>
										<td>Godhumai Nei Payasam (Wheat Ghee)<br /> Fresh Cut Fruits<br />Chocolate Ice
											Cream
										</td>

									</tr>
									<tr>
										<td><strong>DINNER</strong></td>
										<th>Soup</th>
										<td>Kollu Milagu Charu (Horse Gram Pepper)<br />Erode Nattu Kozhi Charu (Country
											Chicken)</td>
									    <th>Starters </td>
										<td>Pallipalayam Kalan Varuval  (Mushroom)<br />
                                            Saivam Mutton Kola Urandai ( Veg mutton)<br />
                                            Vendakai Verkadalai Bagoda ( Ladys finger peanut)<br />
                                            Kozhi Chintamani ( Chicken)<br />
                                            Pollachi poricha Meen Varuval  ( Sea fish)  <br />
                                            Yera Sukka ( Prawns)

										</td>
										
										<th>Salads</th>
										<td>Garden Greens<br /> Kosambari (Split Legumes and Cucumber)<br /> Nilgiri
											Salad<br />
											Raitha/Pickle/Papad/Curd Rice</td>
										<th>Non-Veg Mains</th>
										<td>Kongu Nattu Kozhi Kuzhambu (Country Chicken)<br /> Mutton Kothu Kari
											(Minced)
										</td>
										<th>Veg Mains</th>
										<td>Katharikai Mochai Karakuzhambu (Brinjal, Field Beans)<br /> Kollimali
											Mooligai
											Rasam (Medicinal Herbs)<br /> Kalayana Sambar<br />Cheppankazhangu Kara
											Varuval
											(Colocasia)<br /> Madurai Poricha Kai Kari Korma (Fried Veg)<br /> Steamed
											Rice<br />
											Kothamalli Sadam (Coriander Rice)</td>
										<th>Desserts</th>
										<td>Banana<br />Elaneer Payasam (Tender Coconut)<br /> Vanilla Ice Cream</td>
										<th>Live Counter</th>
										<td>Kothu Parotta Veg/Non-Veg<br /> Muttai Kalakki<br /> Milagu Kalakki<br />
											Kuzhambu Kalakki
											(Egg Preparations)<br /> Kal Dosa<br /> Bun Parotta<br /> Veechu
											Parotta<br />Three Types of
											Chutney<br /> Sambar<br /> Podi</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>

					<div class="schedule mt-5" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>Snacks (AMT)</strong></td>
										<td> Murukku, Nippattu, Ellu Urandai, Thaen Mittai, Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, Vazhakkai Bhaji (Banana)</td>
									</tr>
									<tr>
										<td><strong>Snacks (PMT)</strong></td>
										<td>Murukku, Nippattu, Ellu Urandai, Thaen Mittai, Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, Paruppu Vadai</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="space50"></div>
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-pink text-center">DAY 2 - 29-Nov-2025</h3>
					<div class="space20"></div>
					<div class="schedule mt-3" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>LUNCH</strong></td>
										<th>Soup</th>
										<td>Vazhai Thandu Charu (Banana Stem)<br /> Yera Milagu Charu (Shrimp Pepper)
										</td>
										<th>Salads</th>
										<td>Garden Greens<br /> Kachori Sev Chat<br /> Manga Uralai Sundal (Mango
											Potato)<br />
											Raitha/Pickle/Papad/Curd Rice</td>
										<th>Non-Veg Mains</th>
										<td>Dindigul Kozhi Biryani (Seeraga Samba Chicken)<br /> Karuveppilai Meen
											Kuzhambu
											(Sea Fish)<br /> Sankagiri Kari Kuzhambu (Lamb)
										</td>
										<th>Veg Mains</th>
										<td>Vendakai Moor Kuzhambu (Ladies Finger Curd)<br /> Pineapple Rasam<br />
											Nagercoil Avial (Mixed Veg)<br /> Karamani Katharikai Kara Kuzhambu (Cow
											Pea, Brinjal
											Spicy)<br /> Dal Makani<br /> Steamed Rice<br /> Palakai Biryani (Unripe
											Jackfruit)<br/><strong>Indian Breads:</strong> Roti /Naan/Paroota </td>
										<th>Desserts</th>
										<td>Fresh Cut Fruits<br /> Aval Payasam (Pressed Rice)<br /> Strawberry Ice
											Cream
										</td>

									</tr>
									<tr>
										<td><strong>DINNER</strong></td>
										<th>Soup</th>
										<td>Broccoli Almond Soup<br /> Nandu Pepper Charu (Crab)</td>
										<th>Starters</th>
										<td>Kai Kari Kuchi Varuval ( Veggies)<br />
                                            Kongu Thatta Wade <br />
                                            Chettinad Vazhakkai Cutlet ( Bannana)<br />
                                            Mutton Kola Urandai <br />
                                            Pollachi Meen 65 ( Sea fish)<br />
                                            Yera Milagu Varuval ( Shrimp)

										</td>
										<th>Salads</th>
										<td>Garden Greens<br /> Verkadalai Kara (Peanut)<br /> Thayir Wade (Curd)<br />
											Raitha/Pickle/Papad/Curd Rice</td>
										<th>Non-Veg Mains</th>
										<td>Madurai Kara Kari Kuzhambu (Lamb)<br />Pallipalayam Kozhi Peratal (Chicken)
										</td>
										<th>Veg Mains</th>
										<td>Soraka Kadasal (Bottle Gourd)<br /> Kavipoo Pattani Korma (Cauliflower
											Peas)<br />
											Kadama Sambar (Mixed Veg)<br /> Manga Morgankai Thooku (Mango
											Drumstick)<br />
											Sundakai Vatha Kuzhambu (Turkey Berry)<br /> Steamed Rice<br /> Donne Kushka
										</td>
										<th>Desserts</th>
										<td>Tirunelveli Halwa<br /> Banana<br /> Mango Ice Cream</td>
										<th>Live Counter</th>
										<td>Iddiyappam & Veg Paya<br /> Salna<br /> Muttai Kalakki<br /> Milagu
											Kalakki<br /> Kuzhambu
											Kalakki (Egg Prep)<br /> Kal Dosa<br /> Bun Parotta<br />Veechu
											Parotta<br />Three Types of Chutney<br /> Sambar, Podi</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>

					<div class="schedule mt-5" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>Snacks (AMT)</strong></td>
										<td> Murukku, Nippattu, Ellu Urandai, Thaen Mittai, Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, Onion Bonda</td>
									</tr>
									<tr>
										<td><strong>Snacks (PMT)</strong></td>
										<td>Murukku, Nippattu, Ellu Urandai, Thaen Mittai, Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, Madras Pakoda</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="space50"></div>

			</div>


			<div class="space50"></div>
			<div class="row">
				<div class="col-lg-12">
					<h3 class="text-pink text-center">DAY 3 - 30-Nov-2025</h3>
					<div class="space20"></div>
					<div class="schedule mt-3" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>LUNCH</strong></td>
										<th>Soup</th>
										<td>Varamali Thakali Charu (Dry Coriander, Tomato)<br /> Kozhi Milagu Charu
											(Chicken
											Pepper)
										</td>
										<th>Salads</th>
										<td>Garden Greens<br /> Thenga Velarikai Sundal (Coconut, Peanut)<br />
											Shakarkand Ki Sev Chat<br /> Raitha/Pickle/Papad/Curd Rice</td>
										<th>Non-Veg Mains</th>
										<td>Pallipalayam Kozhi Kuzhambu (Chicken)<br /> Mapillai Mutton Biryani<br />
											Masala Fried
											Fish (SI)
										</td>
										<th>Veg Mains</th>
										<td>Parangikai Kootu (Pumpkin)<br /> Paruupuurandai Kuzhambu (Dal Balls)<br />
											Kurumilagu
											Rasam (Pepper)<br />Lasooni Dal Tadka<br /> Cabbage Carrot Beans Pea Poriyal
											(Flag Fry)<br /> Steamed Rice<br />Kalan Biryani (Mushroom)<br/><strong>Indian Breads: </strong>Roti /Naan/Paroota </td>
										<th>Desserts</th>
										<td>Fresh Cut Fruits<br /> Paal Khova (Milk)<br /> Coffee Ice Cream
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>

					<div class="schedule mt-5" data-aos="fade-left" data-aos-duration="1000">
						<div class=" text-center  table-responsive">
							<table class="table table-striped">

								<tbody>
									<tr>
										<td><strong>Snacks (AMT)</strong></td>
										<td> Murukku, Nippattu, Ellu Urandai, Thaen Mittai, Kadali Mittai,
											Tea/Coffee/Bakery Biscuit, Ulundu Vadai</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="space50"></div>

			</div>

		</div>
	</div>
	<!--===== MENU AREA ENDS =======-->



@endsection
@section('footer_script')
@endsection