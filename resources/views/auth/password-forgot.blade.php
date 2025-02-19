<x-main-layout>
	<div class="form-page">
		<div class="form-box">
		<h1>Wachtwoord vergeten?</h1>		
		<form class="form" action="{{ route('password.request') }}" method="POST">
			<p class="sub-text">Vul je e-mailadres in en we sturen je een link om je wachtwoord opnieuw in te stellen.</p>
			<x-alert />
			@csrf
			<div class="form-control">
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" value="{{ old('email') }}">
				@error('email')
					<p class="validation-error">{{ $message }}</p>
				@enderror
			</div>
			<div class="form-control">
				<button class="submit-button" type="submit">Verzenden</button>
			</div>
		</form>
		</div>
	</div>

</x-main-layout>