<x-main-layout>
	<div class="container verification-page">
		<div class="verification-container">
			<h2>Bevestig je e-mailadres</h2>
			<x-alert />

			<p>Voordat je verder kunt, moet je je e-mailadres bevestigen.</p>
			<p>Een bevestigingslink is naar je e-mailadres gestuurd.</p>

			<form class="form" method="POST" action="{{ route('verification.send') }}">
					@csrf
					<div class="form-control">
						<button class="submit-button" type="submit">Opnieuw versturen</button>
					</div>
			</form>

			<p class="extra-info">Geen e-mail ontvangen? <br>Check je spamfolder of verstuur hem opnieuw.</p>
		</div>
	</div>
</x-main-layout>