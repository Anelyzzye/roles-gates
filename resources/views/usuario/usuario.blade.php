@auth
	@can('user')
		<h1>Bienvenido logueado</h1>
	@else
		<h2>No puedes ver esto</h2>
	@endcan
@endauth
