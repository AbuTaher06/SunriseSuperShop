
<div class="search-style-1">
    <form action="{{ route('product.search') }}">
        <input type="text" name="search" placeholder="Search for items..." value="{{ request('search') }}">
    </form>
</div>
