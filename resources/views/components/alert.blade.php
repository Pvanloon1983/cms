@if (session('success'))
<div class="alert alert-success">
		<div class="message">
			{{ session('success') }}
		</div>
		<div class="close">
			<i class="fa-solid fa-xmark"></i>
		</div>
</div>
@endif

@if (session('error'))
		<div class="alert alert-danger">
			<div class="message">
				{{ session('error') }}
			</div>
			<div class="close">
				<i class="fa-solid fa-xmark"></i>
			</div>
		</div>
@endif

@if (session('status'))
		<div class="alert alert-success">
			<div class="message">
				{{ session('status') }}
			</div>
			<div class="close">
				<i class="fa-solid fa-xmark"></i>
			</div>
		</div>
@endif
