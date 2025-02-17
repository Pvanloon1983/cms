<x-main-layout>
	<div class="container form-page">
		<h1>Wachtwoord resetten</h1>
			<form class="form" action="{{ route('password.update') }}" method="POST">
			<x-alert />
			@csrf

			<input type="hidden" name="token" value="{{ $token }}">
			<div class="form-control">
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" value="{{ old('email', request()->query('email')) }}">
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
			<div class="form-control">
				<button class="submit-button" type="submit">Wachtwoord resetten</button>
			</div>
		</form>
	</div>

</x-main-layout>