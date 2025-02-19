<x-main-layout>
	<div class="form-page">
		<div class="form-box">
		<h1>Inloggen</h1>
		<form class="form" action="{{ route('login') }}" method="POST">
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
				<label for="password">Wachtwoord</label>
				<input type="password" name="password" id="password">
				@error('password')
					<p class="validation-error">{{ $message }}</p>
				@enderror
			</div>
				<div class="form-control">
					<button class="submit-button" type="submit">Inloggen</button>
				</div>
				<div class="form-info">
					Nog geen account? <a href="{{ route('register') }}">Registeren</a>
				</div>
				<div class="form-info">
					Wachtwoord vergeten? <a href="{{ route('password.request') }}">Klik hier</a>
				</div>
		</form>
		</div>
	</div>

</x-main-layout>