<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Boeking - De BBQ Kar</title>
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="../css/booking.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<?php include '../classes/nav.php'; ?>

	<main class="site-content">
		<section class="hero">
			<div class="hero-inner">
				<h1>Plan Jouw Smaakbeleving</h1>
				<p>Laat de details aan ons over en geniet van ambachtelijk bereid vlees op locatie.</p>
			</div>
		</section>

		<section class="booking-wrap">
			<div class="booking-grid">
				<form class="booking-form" action="#" method="post">
					<div class="card">
						<h2><i class="fa-solid fa-user"></i> Persoonlijke Gegevens</h2>
						<div class="two-col">
							<label>
								Naam
								<input type="text" name="name" placeholder="Uw volledige naam">
							</label>
							<label>
								E-mailadres
								<input type="email" name="email" placeholder="voorbeeld@mail.com">
							</label>
						</div>

						<label>
							Telefoonnummer
							<input type="tel" name="phone" placeholder="+31 6 12345678">
						</label>
					</div>

					<div class="card">
						<h2><i class="fa-solid fa-calendar-days"></i> Evenement Details</h2>
						<div class="two-col">
							<label>
								Gewenste Datum
								<input type="date" name="date">
							</label>
							<label>
								Aantal Personen
								<input type="number" name="people" min="1" placeholder="Min. 10 personen">
							</label>
						</div>

						<label>
							Pakketkeuze
							<select name="package">
								<option value="">Selecteer een pakket</option>
								<option>Basis Pakket</option>
								<option>Signature Pakket</option>
								<option>Premium Pakket</option>
							</select>
						</label>
					</div>

					<div class="card">
						<h2><i class="fa-solid fa-star"></i> Specifieke Wensen</h2>
						<label>
							Opmerkingen of Maatwerk
							<textarea name="notes" rows="6" placeholder="Vertel ons meer over uw evenement, dieetwensen of speciale verzoeken..."></textarea>
						</label>
						<div class="submit-row">
							<button class="btn-primary" type="submit">Aanvraag Versturen <i class="fa-solid fa-arrow-right-long"></i></button>
						</div>
					</div>
				</form>

				<aside class="booking-aside">
					<div class="aside-card">
						<h3>Waarom Kiezen Voor Ons?</h3>
						<ul class="reasons">
							<li><strong>Authentiek Houtvuur</strong><span>Geen gas, alleen echt eikenhout voor die ongeëvenaarde rooksmaak.</span></li>
							<li><strong>Kwaliteitsvlees</strong><span>We werken uitsluitend met lokale slagers en premium selecties.</span></li>
							<li><strong>Zorgeloos Genieten</strong><span>Van opbouw tot afwas; wij regelen alles tot in de puntjes.</span></li>
						</ul>
					</div>
					<div class="aside-image">
						<img src="../assets/images/Barbecue.png" alt="Gesneden vlees">
					</div>
				</aside>
			</div>
		</section>
	</main>

	<?php include '../classes/footer.php'; ?>
</body>

</html>

