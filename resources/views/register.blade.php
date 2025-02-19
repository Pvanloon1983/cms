<x-main-layout>
	<div class="form-page">
		<div class="form-box">
			<h1>Maak een account aan</h1>
			<form class="form" action="{{ route('register') }}" method="POST">
				<x-alert />
				@csrf
				<div class="form-control">
					<label for="first_name">Voornaam</label>
					<input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
					@error('first_name')
					<p class="validation-error">{{ $message }}</p>
					@enderror
				</div>
				<div class="form-control">
					<label for="last_name">Achternaam</label>
					<input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
					@error('last_name')
					<p class="validation-error">{{ $message }}</p>
					@enderror
				</div>
				<div class="form-control">
					<label for="email">E-mail</label>
					<input type="email" name="email" id="email" value="{{ old('email') }}">
					@error('email')
					<p class="validation-error">{{ $message }}</p>
					@enderror
				</div>
				<div class="form-control">
					<label for="password">Wachtwoord</label>
					<input type="password" name="password" id="password">
					@error('password')
					<p class="validation-error">{{ $message }}</p>
					@enderror
				</div>
				<div class="form-control">
					<label for="password_confirmation">Wachtwoord Bevestigen</label>
					<input type="password" name="password_confirmation" id="password_confirmation">
				</div>
				<div class="btn-info-box">
					<div class="form-control">
						<button class="submit-button" type="submit">Registreren</button>
					</div>
					<div class="form-info">
						<a href="{{ route('login') }}">Inloggen</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</x-main-layout>