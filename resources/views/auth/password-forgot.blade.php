<x-main-layout>
	<div class="container form-page">
		<h1>Wachtwoord vergeten</h1>
		<form class="form" action="{{ route('password.request') }}" method="POST">
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

</x-main-layout>