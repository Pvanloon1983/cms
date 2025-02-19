<x-main-layout>
	<div class="verification-page">
		<div class="verification-container">
			<h2>Bevestig je e-mailadres</h2>
			<x-alert />
			
			<p>We hebben een bevestigingslink naar je e-mailadres gestuurd. Klik op de link in de e-mail om verder te gaan.</p>
			
			<form class="form" method="POST" action="{{ route('verification.send') }}">
					@csrf
					<div class="form-control">
							<button class="submit-button" type="submit">Opnieuw verzenden</button>
					</div>
			</form>
			
			<p class="extra-info">Geen e-mail ontvangen? Controleer je spamfolder of klik op 'Opnieuw verzenden'.</p>			
		</div>
	</div>
</x-main-layout>