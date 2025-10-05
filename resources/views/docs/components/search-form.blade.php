<form action="{{ route('docs') }}" method="GET" class="search-form">
    <div class="search-box">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher dans la doc…"
            class="form-control" />
        <label for="text">Recherche</label>
    </div>

    <button type="submit" class="btn primary">Rechercher</button>
</form>
